Stackius.controllers :twilio do
  post :sms do
    render 'twilio/sms'
  end

  post :call do
    render 'twilio/call'
  end

  post :'call/end' do
    ""
  end
end
