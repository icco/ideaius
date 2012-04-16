class Topic < ActiveRecord::Base
  belongs_to :user

  def add_message msg
    p msg
  end

  def to_s
    return self.name
  end
end
