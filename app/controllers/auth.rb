Ideaus.controllers :auth do

  # For development testing
  post '/developer/callback' do
    email = params["email"]
    user = User.findByEmail email

    if user.nil?
      user = User.new
      user.email = email
      user.save
    end

    session[:user] = user.id

    redirect '/'
  end

  # Twitter Callback
  get '/twitter/callback' do
    params.to_json
  end

  # Github callback
  get '/github/callback' do
    params.to_json
  end
end
