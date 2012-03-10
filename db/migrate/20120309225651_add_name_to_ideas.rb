class AddNameToIdeas < ActiveRecord::Migration
  def change
    change_table :ideas do |t|
      t.string :name
    end
  end
end
