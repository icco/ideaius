Ideaus.controllers :idea do
  layout :main
  
  post :new do
    i = Idea.new
    i.text = params["idea"]
    i.users_id = session[:user]
    i.save

    redirect "/idea/"
  end

  get :new do
    user = logged_in!

    render 'idea/new', :locals => { :user => user }
  end
end
