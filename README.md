# stackus

Forkable chatrooms.

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
