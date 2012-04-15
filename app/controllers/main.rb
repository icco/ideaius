Ideaus.controller do
  layout :main

  get :index do
    if session[:user]
      @user = User.find_by_id session[:user]
      redirect "/#{@user.username}"
    else
      render :index
    end
  end

  get '/logout' do
    session[:user] = nil
    redirect '/'
  end

  # This is for all user pages. We keep it here instead of the user controller
  # because we want to have them at / not /user/
  #
  # NOTE: Low priority makes it so other things run before us.
  # http://www.padrinorb.com/guides/controllers#prioritized-routes
  get %r{/(\w+)/?}, :priority => :low do
    @user = logged_in!

    username =  params[:captures][0].gsub('/', '')

    page_user = User.find_by_username(username)
    if page_user
      render "user/index"
    else
      404
    end
  end

  # This is for all user topics. We keep them here because we don't want them to be at /topic/
  get %r{/(\w+)/(\S+)/?}, :priority => :low do
    @user = logged_in!

    topic_owner = params[:captures][0]
    topic_name  = params[:captures][1].gsub('/', '')

    # get project page
    page_user = User.find_by_username(topic_owner)
    if page_user
      @topic = Topic.where(:user_id => page_user.id, :name => topic_name).first

      if @topic.nil? and topic_name == "default"
        @topic = Topic.new
        @topic.name = "default"
        @topic.user_id = page_user.id
        @topic.private = true
        @topic.save
      end

      if @topic
        render "topic/index", :locals => { }
      end
    end

    404 # In all other cases. 404 This bitch.
  end
end
