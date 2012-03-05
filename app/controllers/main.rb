# Everything located at /

Ideaus.controller do
  layout :main

  get '/' do
    ideas = Idea.all
    render 'idea/new', :locals => { :ideas => ideas }
  end
end
