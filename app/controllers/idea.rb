Ideaus.controllers :idea do
  layout :main
  
  post :index do
    i = Idea.new
    i.text = params["idea"]
    i.users_id = session[:user]
    i.save

    redirect "/idea/"
  end

  get :index do
    user = logged_in!

    ideas = Idea.all
    render "idea/index", :locals => { :ideas => ideas, :user => user }
  end

  get :new do
    user = logged_in!

    render 'idea/new', :locals => { :user => user }
  end
end
