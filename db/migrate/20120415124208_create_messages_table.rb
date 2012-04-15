class CreateMessagesTable < ActiveRecord::Migration
  def change
    create_table :messages do |t|
        t.string :owner
        t.string :topic
        t.text   :text

        t.integer :user_id

        t.timestamps
      end
  end
end

