# Everything located at /

Ideaus.controller do
  layout :main

  get '/' do
    if session[:user]
      redirect '/idea/new'
    else
      render :index
    end
  end

  get '/logout' do
    session[:user] = nil
    redirect '/'
  end

  get '/:username' do
    # get user profile page.
  end

  get '/:username/:project' do
    # get project page
  end
end
