Stackius.helpers do
  def logged_in!
    if session[:user]
      user = User.find_by_id(session[:user])
      if !user.nil?
        return user
      else
        redirect '/logout'
      end
    end

    redirect '/user/new'
  end
end

