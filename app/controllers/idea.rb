Ideaus.controllers :idea do
  layout :main
  
  post :new do
    user = logged_in!

    i = Idea.new
    i.text = params["idea"]
    i.users_id = user.id
    i.save

    redirect "/#{user.username}"
  end

  get :new do
    user = logged_in!

    render 'idea/new', :locals => { :user => user }
  end
end
