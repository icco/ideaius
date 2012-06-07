# stackius

Stackius is a weird product, but it started out as wikidea, a site for collaborating on ideas. Then it turned into ideaius, a site for sharing ideas. Then it turned into stackius, a site for forkable chatrooms. Now though, stackius is casual project management.

## MVP

 * Ability to post messages to a topic
 * Ability to select messages and create a new topic with the selected messages
 * Ability to post links to images and have them show up inline

## Data design

This is going to be incredibly read heavy. Data design might be similar to Twitter lists... but not really.

  * Write once objects
    * Messages - text, user who posted them, timestamps, unique id
  * Update on occasion
    * Users - username, timestamps, password, email
    * topics - private, name, owner, other meta
  * Write a lot
    * Join table / association between Messages and Topics.
      * I could just duplicate the messages when forking to another topic, but it'd be nice to have some sort of relation between the new and old topic.
      * Megastore equivalent in Ruby?
      * Redis?


## Config

 For posterities sake...

    DATABASE_URL        => postgres://qwebfvikat:JWgZUEc05wfNSdGxNeBp@ec2-23-21-64-58.compute-1.amazonaws.com/qwebfvikat
    GEM_PATH            => vendor/bundle/ruby/1.9.1
    GITHUB_KEY          => a4fbed9a31303b15b385
    GITHUB_SECRET       => b3b4593c945d493d8ea76cde1e265b2c20e462d5
    LANG                => en_US.UTF-8
    PATH                => bin:vendor/bundle/ruby/1.9.1/bin:/usr/local/bin:/usr/bin:/bin
    RACK_ENV            => production
    REDISTOGO_URL       => redis://redistogo:f305593b6858899cfefd11d135ade894@drum.redistogo.com:9236/
    SHARED_DATABASE_URL => postgres://qwebfvikat:JWgZUEc05wfNSdGxNeBp@ec2-23-21-64-58.compute-1.amazonaws.com/qwebfvikat
    TZ                  => America/Los_Angeles

## Thoughts

 * <https://devcenter.heroku.com/articles/statsmix>
 * focus more on topic discussion? Thought organization?
 * Switch to Sets? Or did I do that already?
 * better dragging UI
 * posting via email, txt, mobile app
 * daily email of new posts in default (or maybe threads you're following?)


