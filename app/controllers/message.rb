Stackius.controllers :message do
  layout :main

  post :new do
    @user = logged_in!
    @topic = Topic.find_by_id params["topic_id"]

    if @topic.nil? or @user.nil?
      error 404
    end

    @msg = Message.new
    @msg.text = params["text"]
    @msg.user_id = @user.id
    @msg.save

    p "adding: #{@msg.id}"
    @topic.add_message @msg

    redirect "/#{@topic.user}/#{@topic.name}"
  end
end
