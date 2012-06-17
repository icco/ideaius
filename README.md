# stackius

Originally an idea sharing site, named ideaius. It has since transformed into a poorly named project management site, named stackius.

## MVP

 * Ability to post messages to a topic
 * Ability to select messages and create a new topic with the selected messages
 * Ability to annotate discussions
 * Search

## Data design

This is going to be incredibly read heavy. Data design might be similar to Twitter lists... but not really.

  * Write once objects
    * Messages - text, user who posted them, timestamps, unique id
    * Annotations
  * Update on occasion
    * Users - username, timestamps, password, email
    * topics - private, name, owner, other meta
  * Write a lot
    * Join table / association between Messages and Topics.
      * I could just duplicate the messages when forking to another topic, but it'd be nice to have some sort of relation between the new and old topic.
      * Megastore equivalent in Ruby?
      * Redis?

## Thoughts

 * <https://devcenter.heroku.com/articles/statsmix>
 * focus more on topic discussion? Thought organization?
 * better dragging UI
 * posting via email, txt, mobile app
 * daily email of new posts in default (or maybe threads you're following?)

## History

In [2008](https://github.com/icco/ideaius/commit/ad7f82098ec408e67b26fd405dd5dda294b64c1b), I coded up a little site called wikidea. The site grew a little and became ideaius. I pitched it to a commitee at school and was given $100, which I never cashed. I then also stopped working on the project except for small things here and there. Near the end of 2011, [I picked it back up](https://github.com/icco/ideaius/commit/da9c4a4ccdcd6744d3eeb8d0817e5c062a30a936). I switched from PHP to Ruby and created a simple site. After long discussions with @dmpatierno, I changed the name to Stackius and started working on something closer to chat, and further away from a wiki.
