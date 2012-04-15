##
# Setup global project settings for your apps. These settings are inherited by every subapp. You can
# override these settings in the subapps as needed.
#
Padrino.configure_apps do
  # enable :sessions
  set :session_secret, '9aa70c5254a4b35960f0c639fa195b9f9884335706c965ddceb44f8babc51e0a'
end

# Mounts the core application for this project
Padrino.mount("Ideaus").to('/')
