source :rubygems

gem "activerecord", :require => "active_record"
gem "erubis", "~> 2.7.0"
gem "json"
gem "multi_json"
gem "omniauth-github" # https://github.com/intridea/omniauth-github
gem "omniauth-twitter" # https://github.com/arunagw/omniauth-twitter
gem "rack", "~> 1.4.1"
gem "rack-less"
gem "rake"
#gem "sinatra-activerecord", :require => "sinatra/activerecord"
gem "sinatra-flash", :require => "sinatra/flash"

# Padrino
gem "padrino"

# Database
group :production do
  gem "pg"
end

# For dev.
group :development, :test do
  gem "heroku"
  gem "shotgun"
  gem "sqlite3"
end
