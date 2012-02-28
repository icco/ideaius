Ideaus.controllers :idea do
  layout :main
  
  post :index do
    params.inspect
  end

  get :index do
    Idea.all.inspect
  end
end
