Ideaus.controllers :user do
  layout :main

  get '/new' do
    if !session[:user]
      render 'user/new'
    else
      redirect '/user/edit'
    end
  end

  post '/new' do
  end

  get '/edit' do
    if !session[:user]
      redirect '/user/new'
    end

    render 'user/edit', :locals => { :user => User.find_by_id(session[:user]) }
  end

  post '/edit' do
  end
end
