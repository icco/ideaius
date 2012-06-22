class User < ActiveRecord::Base
  has_many :messages
  has_many :topics

  def topics
    topics = super
    if topics.empty?
      topic = Topic.new
      topic.name = "default"
      topic.user_id = self.id
      topic.private = true
      topic.save
      topics.push topic
    end

    msg_ids = Message.where(:user_id => self.id).select('id').map(&:id)
    more_topics = Topic.find_by_message_ids(msg_ids)

    # Union the two together
    return (topics | more_topics).delete_if {|i| i.nil? }
  end

  def to_s
    return self.username
  end

  def self.allowed? query
    # TODO(icco): Move to a static file.
    valid_github_users = %w{
      alexbaldwin
      cloudwalking
      dmpatierno
      frewsxcv
      icco
      mgius
    }

    return valid_github_users.include? query[:github]
  end
end
