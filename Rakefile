require File.expand_path('../config/boot.rb', __FILE__)
require 'padrino-core/cli/rake'

PadrinoTasks.init

desc "Run a local server."
task :local do
  Bundler.clean_exec("shotgun -p 4567 -s thin")
end

task :default do
  puts "THERE IS NO DEFAULT!"
end

namespace :ar do
  namespace :migrate do
    desc "Create a new db migration."
    task :new do
      # YYYYMMDDHHMMSS_create_products.rb
      date = Time.now.strftime("%Y%m%d%H%M%S")
      filename = "db/migrate/#{date}_new_migration.rb"
      f = File.new(filename, File::CREAT|File::TRUNC|File::RDWR, 0644)
      f.close

      puts filename
    end
  end
end
