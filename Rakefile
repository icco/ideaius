require 'rubygems'
require 'bundler'
require 'rake/clean'

# This should bring in padrino...
require File.expand_path("../config/boot.rb", __FILE__)

CLEAN.include("db/*.db")

namespace :db do

  desc "Bring database schema up to par."
  task :migrate do
    # Stolen from: https://github.com/padrino/padrino-framework/blob/master/padrino-gen/lib/padrino-gen/padrino-tasks/sequel.rb
    ::Sequel.extension :migration
    ::Sequel::Migrator.run Sequel::Model.db, "db/migrate", :target => 0
    ::Sequel::Migrator.run Sequel::Model.db, "db/migrate"

    puts "Migrated!"
  end

  desc "Delete the database"
  task :erase do
    Sequel::Model.db.tables.each do |table|
      if table != :schema_info
        Sequel::Model.db[table].truncate
      end
    end
  end

  desc "Dumps the database"
  task :dump do
    Sequel::Model.db.tables.each do |table|
      if table != :schema_info
        p Sequel::Model.db[table].all
      end
    end
  end
end
