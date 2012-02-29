# Everything located at /

Ideaus.controller do
  layout :main

  get '/' do
    ideas = Idea.all
    render :index, :locals => { :ideas => ideas }
  end

  # Twitter Callback
  get '/auth/twitter/callback' do

    params.to_json
  end

  get '/auth/github/callback' do

    params.to_json
  end
end
