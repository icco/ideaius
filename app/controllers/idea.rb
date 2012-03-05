Ideaus.controllers :idea do
  layout :main
  
  post :index do
    i = Idea.new
    i.text = params["idea"]
    i.save

    redirect "/idea/"
  end

  get :index do
    ideas = Idea.all
    render "idea/index", :locals => { :ideas => ideas }
  end

  get :new do
    render 'idea/new'
  end
end
