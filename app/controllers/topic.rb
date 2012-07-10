Stackius.controllers :topic do
  layout :main

  # TODO(icco): Wheee
  post :'messages.json' do
    @user = logged_in!

    @topic = Topic.where(:id => params[:topic_id]).first

    if @topic
      data = []
      @topic.messages.each do |msg|
        data[msg.id] =  partial "topic/message", :locals => { :msg => msg }
      end

      content_type 'text/plain'
      return data.to_json
    else
      404
    end
  end

  post :fork do
    @user = logged_in!

    old_topic = Topic.find_by_id params["topic_id"]
    new_topic_name = Topic.filter_name params['new_topic_name']
    messages = params["message_id"]

    if messages.nil? or new_topic_name.nil? or messages.empty?
      redirect "/#{@user.username}/#{old_topic.name}"
    end

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

  # TODO(icco): add post parameter validation.
  post :'copy_msg.json' do
    @user = logged_in!

    user = User.where(:username => params["topic"]["user"]).first

    if !user
      return {:status => 'fail'}.to_json
    end

    @topic = Topic.where(:user_id => user.id, :name => params["topic"]["name"]).first
    if !@topic
      @topic = Topic.new
      @topic.name = params["topic"]["name"]
      @topic.user_id = user.id
      @topic.private = true
      @topic.save
    end

    @topic.add_message_id params["message_id"]

    return {:status => 'success'}.to_json
  end
end
