class AddUsersToIdeas < ActiveRecord::Migration
  change_table :ideas do |t|
    t.references :users
  end
end
