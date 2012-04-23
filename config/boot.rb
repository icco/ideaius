# Defines our constants
PADRINO_ENV  = ENV["PADRINO_ENV"] ||= ENV["RACK_ENV"] ||= "development"  unless defined?(PADRINO_ENV)
PADRINO_ROOT = File.expand_path('../..', __FILE__) unless defined?(PADRINO_ROOT)

# Load our dependencies
require 'rubygems' unless defined?(Gem)
require 'bundler/setup'
Bundler.require(:default, PADRINO_ENV)

##
# Enable devel logging
#
Padrino::Logger::Config[:development] = { :log_level => :devel, :stream => :stdout }

##
# Enable Redis and caching
#
redis_connections = {
  :development => "redis://localhost:6379",
  :test => "redis://localhost:6379",
  :production => ENV['REDISTOGO_URL']
}

if redis_connections[Padrino.env]
  url = URI(redis_connections[Padrino.env])
  options = {
    :adapter => url.scheme,
    :host => url.host,
    :port => url.port,
    :username => url.user,
    :password => url.password
  }

  logger.push " Redis: #{options.inspect}", :devel

  Padrino.cache = Padrino::Cache::Store::Redis.new(::Redis.new(options))

  # Test that DB is there, although we'll never get here if Redis server is MIA.
  Padrino.cache.set("server:alive", "yes.")
  logger.push("No Redis at #{redis_connections[Padrino.env]}", :fatal) if Padrino.cache.get("server:alive") != "yes."
else
  logger.push("No Redis configuration for #{Padrino.env.inspect}", :fatal)
end

Padrino.before_load do
end

Padrino.load!
