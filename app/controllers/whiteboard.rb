Ideaus.controllers :whiteboard do
  layout :main

  get :new do
    user = logged_in!
    render 'whiteboard/new', :locals => { :user => user }
  end
end
