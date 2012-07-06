Stackius.controllers :hash do
  get :index do
    404
  end

  get '/:string' do
    @messages = Message.where("text LIKE '%##{params[:string]}%'")

    return render "hash/index", :locals => { }
  end
end
