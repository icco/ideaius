class Stackius < Padrino::Application
  register LessInitializer
  register Padrino::Rendering
  register Padrino::Mailer
  register Padrino::Helpers

  register Padrino::Cache # includes helpers
  enable :caching         # turns on caching

  # Because we need to make sure ActiveRecord cleans up after itself.
  use ActiveRecord::ConnectionAdapters::ConnectionManagement

  # Test that DB is there, although we'll never get here if Redis server is MIA.
  Padrino.cache.set("server:alive", "yes.")
  logger.push("NO REDIS at #{redis_connections[Padrino.env]}", :fatal) if Padrino.cache.get("server:alive") != "yes."

  use Rack::Session::Cookie
  use OmniAuth::Builder do
    provider :developer if PADRINO_ENV == "development"
    provider :twitter,  ENV['TWITTER_KEY'],  ENV['TWITTER_SECRET']
    provider :github,   ENV['GITHUB_KEY'],   ENV['GITHUB_SECRET'], scope: "user,gist"
  end

  set :show_exceptions, true

  use Rack::Lint
end
