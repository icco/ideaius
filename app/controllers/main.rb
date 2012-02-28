# Everything located at /

Ideaus.controller do
  layout :main
  
  get '/' do
    ideas = Idea.all
    render :index, :locals => { :ideas => ideas }
  end
end
