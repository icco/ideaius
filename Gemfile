source :rubygems

gem "activerecord", :require => "active_record"
gem "erubis"
gem "gravatar-ultimate"
gem "json"
gem "less"
gem "multi_json"
gem "omniauth-github" # https://github.com/intridea/omniauth-github
gem "pony"
gem "rack"
gem "rack-less"
gem "rake"
gem "sinatra-flash", :require => "sinatra/flash"
gem "therubyracer"
gem "thin"

# Monitoring
gem 'newrelic_rpm'

# Padrino
gem "padrino", :git => "git://github.com/padrino/padrino-framework.git"

# Database
gem "redis"
group :production do
  gem "pg"
end

# For dev.
group :development, :test do
  gem "heroku"
  gem "shotgun"
  gem "sqlite3"
end
