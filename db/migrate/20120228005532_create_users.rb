class CreateUsers < ActiveRecord::Migration
  def change
    create_table :users do |t|
      t.string :email
      t.string :github
      t.string :twitter

      t.timestamps
    end
  end
end
