class Topic < ActiveRecord::Base
  belongs_to :user

  @@key = "#{self.user}:#{self}"

  # In theory, we shouldn't have to block on this function, even though we do.
  def add_message msg
    if msg.nil?
      return false
    end

    REDIS.sadd @@key, msg.id
    return REDIS.scard @@key
  end

  # Gets most resent messages
  def messages count = 50
    ids = []
    REDIS.multi do
      max = REDIS.scard @@key
      min = Math.max(0, max-count)
      ids = REDIS.lrange(@@key, min, max)
    end
  end

  def to_s
    return self.name
  end
end
