class Topic < ActiveRecord::Base
  belongs_to :user

  # In theory, we shouldn't have to block on this function, even though we do.
  def add_message msg
    if msg.nil?
      return false
    end

    return self.add_message_id msg.id
  end

  def add_message_id id
    @key = "#{self.user}:#{self}"

    if id.nil?
      return false
    end

    Padrino.cache.rpush @key, id

    return true
  end

  # Gets most resent messages
  def messages count = 50
    @key = "#{self.user}:#{self}"

    max = Padrino.cache.llen @key
    max = 0 if max.nil?
    min = [0, max-count].max

    if min != max
      ids = Padrino.cache.lrange(@key, min, max)
    end

    ids = [] if ids.nil?

    return Message.where(:id => ids)
  end

  def to_s
    return self.name
  end

  def name= x
    super(Topic.filter_name(x))
  end

  def self.filter_name name
    return "" if name.nil?

    return name.gsub(%r{\s}, '_').downcase
  end
end
