class Topic < ActiveRecord::Base
  belongs_to :user

  def to_s
    return self.name
  end
end
