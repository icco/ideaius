class Idea < ActiveRecord::Base
  belongs_to :user

  def save
    if self.name.nil?
      self.name = self.text[0..10].gsub(%r{\s}, '-').downcase
    end

    return super
  end
end
