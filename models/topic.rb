class Topic < ActiveRecord::Base
  belongs_to :user

  def add_message msg
    REDIS.set("foo", "bar")

    p REDIS.get("foo")
  end

  def to_s
    return self.name
  end
end
