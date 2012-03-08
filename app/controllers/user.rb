Ideaus.controllers :user do
  layout :main

  get :edit do
    if !session[:user]
      redirect '/user/new'
    end

    render 'user/edit', :locals => { :user => User.find_by_id(session[:user]) }
  end
end
