set :repo_url, 'git@github.com:jminguely/hschumacher.git'

# Hardcodes branch to always be master
# This could be overridden in a stage config file
set :branch, :master

# Use :debug for more verbose output when troubleshooting
set :log_level, :info

# Apache users with .htaccess files:
# it needs to be added to linked_files so it persists across deploys:
set :linked_files, fetch(:linked_files, []).push('.env', 'htdocs/.htaccess')
set :linked_dirs, fetch(:linked_dirs, []).push('htdocs/content/uploads')
set :linked_dirs, fetch(:linked_dirs, []).push('storage/framework/sessions')

