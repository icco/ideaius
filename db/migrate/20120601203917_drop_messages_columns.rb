class DropMessagesColumns < ActiveRecord::Migration
  def change
    remove_column :messages, :owner
    remove_column :messages, :topic
  end
end
