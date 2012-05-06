class Message < ActiveRecord::Base
  belongs_to :user

  def created_at
    return super.getlocal
  end
end
