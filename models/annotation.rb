class Annotation < ActiveRecord::Base
  belongs_to :message
  has_one :user
end
