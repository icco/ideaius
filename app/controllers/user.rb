Ideaus.controllers :user do
  layout :main

  get :new do
    redirect '/'
  end

  get :edit do
    user = logged_in!

    render 'user/edit', :locals => { :user => user }
  end

  post :edit do
    user = logged_in!

    user.username = params["username"]
    user.email = params["email"]
    user.github = params["github"]
    user.twitter = params["twitter"]
    user.save

    redirect url(:user, :edit)
  end
end
