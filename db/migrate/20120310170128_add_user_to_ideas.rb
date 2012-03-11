class AddUserToIdeas < ActiveRecord::Migration
  def change
    rename_column :ideas, :users_id, :user_id
  end
end
