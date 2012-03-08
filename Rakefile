
require File.expand_path('../config/boot.rb', __FILE__)
require 'padrino-core/cli/rake'

PadrinoTasks.init

task :local do
  Kernel.exec("bundle exec shotgun")
end

namespace :ar do
  namespace :migrate do
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
