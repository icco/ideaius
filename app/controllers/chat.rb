Ideaus.controllers :chat do
  layout :main

  post :new, :provides => [:json] do
    user = logged_in!

    if user.id != params['user']
      403
    end

    idea = Idea.find_by_id(params['idea'])
    text = params['text']

    return { :text => text, :idea => idea, :user => user }.to_json
  end
end
