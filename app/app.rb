class Stackius < Padrino::Application
  register LessInitializer
  register Padrino::Rendering
  register Padrino::Mailer
  register Padrino::Helpers

  use Rack::Session::Cookie
  use OmniAuth::Builder do
    provider :developer if PADRINO_ENV == "development"
    provider :twitter,  ENV['TWITTER_KEY'],  ENV['TWITTER_SECRET']
    provider :github,   ENV['GITHUB_KEY'],   ENV['GITHUB_SECRET'], scope: "user,gist"
  end

  set :show_exceptions, true

  use Rack::Lint
end
