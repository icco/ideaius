#!/usr/bin/env rackup
# encoding: utf-8

# This file can be used to start Padrino,
# just execute it from the command line.

a = File.expand_path("../config/boot.rb", __FILE__)
p a
p __FILE__
require a

run Padrino.application
