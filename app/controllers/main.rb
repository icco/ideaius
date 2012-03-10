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

    page_user = User.find_by_username(params['username'])
    if page_user
      ideas = Idea.where(:users_id => page_user.id)
      render "idea/index", :locals => { :ideas => ideas, :user => user }
    else
      404
    end
  end

  get '/:username/:project' do
    # get project page
    page_user = User.find_by_username(params['username'])
    Idea.where(:users_id => page_user.id, :name => params['project']).to_json
  end
end
