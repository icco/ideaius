Stackius.helpers do
  def logged_in!
    user = get_user
    if user.nil?
      redirect '/logout'
    end

    return user
  end

  def get_user
    if session[:user]
      user = User.find_by_id(session[:user])
      if !user.nil?
        return user
      end
    end

    return nil
  end
end
