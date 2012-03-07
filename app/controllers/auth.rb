Ideaus.controllers :auth do

  # For development testing
  post '/developer/callback' do
    auth = request.env['omniauth.auth']
    logger.push("Developer: #{auth.inspect}", :devel)

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
    auth = request.env['omniauth.auth']
    logger.push("Twitter: #{auth.inspect}", :devel)

    user = User.find_by_github auth['screen_name']

    if user.nil?
      user = User.new
      user.twitter = auth['screen_name']
    end

    user.save # this could be all bad.

    session[:user] = user.id

    redirect '/'
  end

  # Github callback
  get '/github/callback' do
    auth = request.env['omniauth.auth']
    logger.push("Github: #{auth.inspect}", :devel)

    user = User.find_by_github auth['nickname']
    user = User.find_by_email auth['email'] if user.nil?

    if user.nil?
      user = User.new
      user.email = auth['email']
    end

    if user.github.nil?
      user.github = auth['nickname']
    end

    user.save # this could be all bad.

    session[:user] = user.id

    redirect '/'
  end

  get '/failure' do
    flash[:notice] = params[:message]
    redirect '/'
  end
end
