class Telephone < ActiveRecord::Migration
  def change
    alter_table :users do |t|
      t.string :telephone
    end
  end
end
