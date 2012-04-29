Stackius.controllers :topic do
  layout :main

  post :fork do
    @user = logged_in!
    @topic = Topic.new

    old_topic = Topic.find_by_id params["topic_id"]
    messages = params["message_id"]

    @topic.name = old_topic.name + "_fork"
    @topic.user_id = @user.id
    @topic.private = true
    @topic.save

    messages.each do |msg_id|
      @topic.add_message_id msg_id 
    end

    redirect "/#{@user.username}/#{@topic.name}"
  end
end
