class Idea < ActiveRecord::Base
  belongs_to :user

  def name
    return super.nil? ? self.id : super
  end
end
