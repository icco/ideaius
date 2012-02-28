Ideaus.controllers :idea do
  layout :main
  
  post :index do
    p params
    i = Idea.new
    i.text = params["idea"]
    i.save

    redirect "/idea/"
  end

  get :index do
    "<pre>#{Idea.all.to_json}</pre>"
  end
end
