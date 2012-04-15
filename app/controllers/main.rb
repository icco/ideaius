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
      "<pre>#{page_user.inspect}</pre>"
    else
      404
    end
  end

  # This is for all user topics. We keep them here because we don't want them to be at /topic/
  get %r{/(\w+)/(\S+)/?}, :priority => :low do
    @user = logged_in!

    username = params[:captures][0]
    project =  params[:captures][1].gsub('/', '')

    # get project page
    page_user = User.find_by_username(username)
    if !page_user.nil?
      @topic = Topic.where(:user_id => page_user.id, :name => project).first
      if !@topic.nil?
        "<pre>#{@topic.inspect}</pre>"
      end
    end

    # In all other cases. 404 This bitch.
    404
  end
end
