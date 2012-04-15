class User < ActiveRecord::Base
  has_many :messages
  has_many :topics

  def to_s
    return self.username
  end
end
