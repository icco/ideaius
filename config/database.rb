##
# Database config for relational db.
prefix = "ideaus"

connections = {
  :development => "sqlite://db/#{prefix}_development.db",
  :test => "sqlite://db/#{prefix}_test.db",
  :production => ENV['DATABASE_URL']
}

# Setup our logger
ActiveRecord::Base.logger = logger

# Include Active Record class name as root for JSON serialized output.
ActiveRecord::Base.include_root_in_json = true

# Store the full class name (including module namespace) in STI type column.
ActiveRecord::Base.store_full_sti_class = true

# Use ISO 8601 format for JSON serialized times and dates.
ActiveSupport.use_standard_json_time_format = true

# Don't escape HTML entities in JSON, leave that for the #json_escape helper.
# if you're including raw json in an HTML page.
ActiveSupport.escape_html_entities_in_json = false

  p "test 1"

# Now we can estabilish connection with our db
if connections[Padrino.env]
  url = URI(connections[Padrino.env])
  options = {
    :adapter => url.scheme,
    :host => url.host,
    :port => url.port,
    :database => url.path[1..-1],
    :username => url.user,
    :password => url.password
  }
  case url.scheme
  when "sqlite"
    options[:adapter] = "sqlite3"
    options[:database] = url.host + url.path
  when "postgres"
    options[:adapter] = "postgresql"
  end

  # Log what we are connecting to.
  logger.push " DB: #{options.inspect}", :devel

  ActiveRecord::Base.establish_connection(options)
else
  logger.push("No database configuration for #{Padrino.env.inspect}", :fatal)
end
  p "test 2"

##
# Redis Database Config
redis_connections = {
  :development => "redis://localhost:6379",
  :test => "redis://localhost:6379",
  :production => ENV['DATABASE_URL']
}

if redis_connections[Padrino.env]
  p "test 3"
  options = {
    :adapter => url.scheme,
    :host => url.host,
    :port => url.port,
    :username => url.user,
    :password => url.password
  }
  REDIS = Redis.new(options)

  # Test that DB is there, although we'll never get here if Redis server is MIA.
  REDIS.set("server:alive", "yes.")
  logger.push("NO REDIS at #{redis_connections[Padrino.env]}", :fatal) if REDIS.get("server:alive") != "yes."
else
  logger.push("No redis configuration for #{Padrino.env.inspect}", :fatal)
end
