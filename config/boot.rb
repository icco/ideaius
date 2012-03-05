puts "In boot file."

# Defines our constants
PADRINO_ENV  = ENV["PADRINO_ENV"] ||= ENV["RACK_ENV"] ||= "development"  unless defined?(PADRINO_ENV)
PADRINO_ROOT = File.expand_path('../..', __FILE__) unless defined?(PADRINO_ROOT)

puts "Past constants."

# Load our dependencies
require 'rubygems' unless defined?(Gem)
require 'bundler/setup'
Bundler.require(:default, PADRINO_ENV)

puts "Past bundler."

##
# Enable devel logging
#
Padrino::Logger::Config[:development] = { :log_level => :devel, :stream => :stdout }
Padrino::Logger.log_static = true

Padrino.load!
