Ideaus.controllers :auth do

  # For development testing
  post '/developer/callback' do
    params.to_json
  end

  # Twitter Callback
  get '/twitter/callback' do
    params.to_json
  end

  # Github callback
  get '/github/callback' do
    params.to_json
  end
end
