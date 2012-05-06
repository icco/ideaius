class Message < ActiveRecord::Base
  belongs_to :user

  def created_at
    time = super

    return time.nil? ? time : time.getlocal
  end
end
