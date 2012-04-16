Ideaus.controllers :message do
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

    @topic.add_message @msg

    redirect "/#{@user.username}/#{@topic.name}"
  end
end
