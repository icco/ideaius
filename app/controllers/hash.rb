Stackius.controllers :hash do
  layout :main

  get :index do
    404
  end

  get :index, :with => :string do
    @user = logged_in!
    @hash = "##{params[:string]}"
    @messages = Message.where("text LIKE '%#{@hash}%'")

    return render "hash/index", :locals => { }
  end
end
