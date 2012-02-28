class IdeasAreText < ActiveRecord::Migration
  change_table :ideas do |t|
    t.remove :text
    t.text :text
  end
end
