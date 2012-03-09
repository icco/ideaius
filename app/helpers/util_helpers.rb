Ideaus.helpers do
  def logged_in!
    if !session[:user]
      redirect '/user/new'
    else
      return User.find_by_id(session[:user])
    end
  end
end

