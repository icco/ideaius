Stackius.helpers do
  def logged_in!
    user = get_user
    if user.nil?
      redirect '/logout'
    end

    return user
  end

  def get_user
    if session[:user]
      user = User.find_by_id(session[:user])
      if !user.nil?
        return user
      end
    end

    return nil
  end

  def gravatar email
    options = {
      #:default => '/images/default_gravatar.png'
      :default => :identicon
    }
    url = Gravatar.new(email).image_url(options)
    return url
  end

  # To help us not dump scary stuff, but still autolink links.
  def h text
    # Clean out html
    out = Sanitize.clean text

    # Link links
    out = out.gsub( %r{http(s)?://[^\s<]+} ) { |url| "<a href='#{url}'>#{url}</a>" }

    # Link Twitter Handles
    out = out.gsub(/@(\w+)/) {|a| "<a href=\"http://twitter.com/#{a[1..-1]}\"/>#{a}</a>" }

    # Link Hash tags
    out = out.gsub(/#(\w+)/) {|hash| link_to hash, url(:hash, :index, hash[1..-1]) }

    return out
  end
end
