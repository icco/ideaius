##
# Database config
prefix = "ideaus"

ActiveRecord::Base.configurations[:development] = {
  :adapter => 'sqlite3',
  :database => Padrino.root('db', "#{prefix}_development.db")
}

ActiveRecord::Base.configurations[:test] = {
  :adapter => 'sqlite3',
  :database => Padrino.root('db', "#{prefix}_test.db")
}

if ENV['DATABASE_URL'] && uri = URI.parse(ENV['DATABASE_URL'])
  ActiveRecord::Base.configurations[:production] = {
    :adapter  => uri.scheme,
    :host     => uri.host,
    :port     => uri.port,
    :prefix   => prefix, # database name or prefix
    :suffix   => nil,
    :join     => '_',
    :username => uri.user,
    :password => uri.password
  }
end

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

# Now we can estabilish connection with our db
p ActiveRecord::Base.configurations[Padrino.env]
if ActiveRecord::Base.configurations[Padrino.env]
  ActiveRecord::Base.establish_connection(ActiveRecord::Base.configurations[Padrino.env])
end
