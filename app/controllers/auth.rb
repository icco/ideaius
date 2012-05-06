Stackius.controllers :auth do

  # For development testing
  post '/developer/callback' do
    auth = request.env['omniauth.auth']
    auth = auth.info
    logger.push(" Developer: #{auth.inspect}", :devel)
    p auth["email"]

    email = auth["email"]
    user = User.find_by_email email
    p user

    if user.nil?
      user = User.new
      user.email = email
      user.username = auth["name"]
      user.save
    end

    session[:user] = user.id

    redirect '/'
  end

  # Github callback
  get '/github/callback' do
    auth = request.env['omniauth.auth']
    auth = auth.info
    logger.push(" Github: #{auth.inspect}", :devel)

    user = User.find_by_github auth['nickname']
    user = User.find_by_email auth['email'] if user.nil?

    if user.nil? and User.allowed?({:github => auth['nickname']})
      user = User.new
      user.email = auth['email']
      user.username = auth['nickname']
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
