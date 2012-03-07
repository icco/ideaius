class User < ActiveRecord::Base
  def self.findByEmail email
    where("email = ?", email).first
  end

  def self.findById id
    where("id = ?", id).first
  end

  def self.findByUsername name
    where("username = ?", name).first
  end
end
