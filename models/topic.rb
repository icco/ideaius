class Topic < ActiveRecord::Base
  belongs_to :user

  def initialize
    super

    @key = "#{self.user}:#{self}"
  end

  # In theory, we shouldn't have to block on this function, even though we do.
  def add_message msg
    if msg.nil?
      return false
    end

    return self.add_message_id msg.id
  end

  def add_message_id id
    if id.nil?
      return false
    end

    Padrino.cache.sadd @key, id

    return true
  end

  # Gets most resent messages
  def messages count = 50
    @key = "#{self.user}:#{self}"

    ids = Padrino.cache.smembers @key
    ids = [] if ids.nil?

    return Message.where(:id => ids).order(:created_at).limit(count)
  end

  def to_s
    return self.name
  end

  def name= x
    super(Topic.filter_name(x))
  end

  def self.filter_name name
    return "" if name.nil?
    return name.gsub(%r{\s}, '_').gsub(%r{\W}, '').downcase
  end

  def self.find_by_message_ids ids
    require 'digest/bubblebabble'
    tmp_key = Digest.bubblebabble(Digest::SHA1::hexdigest(rand(36**8).to_s(36))).split(//).sample(10).join
    Padrino.cache.sadd tmp_key, ids

    topics = []
    Padrino.cache.keys("*:*").each do |key|
      if Padrino.cache.type(key) == "set"
        intersection = Padrino.cache.sinter key, tmp_key

        if !intersection
          user_name, topic_name = key.split(":")
          user = User.where(:username => user_name).first
          topic = Topic.where(:user_id => user, :name => topic_name).first
          topics.push topic
        end
      end
    end

    return topics
  end
end
