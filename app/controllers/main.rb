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

  # TODO: figure out how to do non-catchall routes...
  get '/:username' do
    # get user profile page.
    user = logged_in!

    ideas = Idea.where(:users_id => user.id)
    render "idea/index", :locals => { :ideas => ideas, :user => user }
  end

  #get '/:username/:project' do
  #  # get project page
  #end
end
