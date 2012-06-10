class Telephone < ActiveRecord::Migration
  def up
    alter_table :users do |t|
      t.string :telephone
    end
  end
end
