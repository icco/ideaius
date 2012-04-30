Stackius.controllers :topic do
  layout :main

  post :fork do
    @user = logged_in!

    old_topic = Topic.find_by_id params["topic_id"]
    new_topic_name = Topic.filter_name params['new_topic_name']
    messages = params["message_id"]

    @topic = Topic.where(:user_id => @user.id, :name => new_topic_name).first
    if @topic.nil?
      @topic = Topic.new
      @topic.name = new_topic_name
      @topic.user_id = @user.id
      @topic.private = true
      @topic.save
    end

    messages.each do |msg_id|
      @topic.add_message_id msg_id 
    end

    redirect "/#{@user.username}/#{@topic.name}"
  end
end
