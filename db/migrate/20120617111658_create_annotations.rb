class CreateAnnotations < ActiveRecord::Migration
  def change
    create_table :annotations do |t|
      t.text :text
      t.integer :user_id
      t.integer :message_id

      t.timestamps
    end
  end
end
