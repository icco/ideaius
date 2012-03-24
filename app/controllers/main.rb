Ideaus.controller do
  layout :main

  get :index do
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

  # NOTE: Low priority makes it so other things run before us.
  # http://www.padrinorb.com/guides/controllers#prioritized-routes
  get %r{/(\w+)/?}, :priority => :low do
    # get user profile page.
    user = logged_in!

    username =  params[:captures][0].gsub('/', '')

    page_user = User.find_by_username(username)
    if page_user
      ideas = Idea.where(:user_id => page_user.id)

      # Auto generate name field
      ideas.each {|i| if i.name.nil? then i.save end }

      render "idea/index", :locals => { :ideas => ideas, :user => user }
    else
      404
    end
  end

  get %r{/(\w+)/(\S+)/?}, :priority => :low do
    user = logged_in!

    p params
    username = params[:captures][0]
    project =  params[:captures][1].gsub('/', '')

    # get project page
    page_user = User.find_by_username(username)

    if !page_user.nil?
      Idea.where(:user_id => page_user.id, :name => project).to_json
    else
      404
    end
  end
end
