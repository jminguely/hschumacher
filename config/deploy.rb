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

# In your config/deploy.rb file add the following task
namespace :deploy do
	desc 'Create a temporary PHP file to clear the opcache.'
	task :clear_cache do
	 	on roles(:app) do
	 		within fetch(:release_path) do
				opcache_file = "#{fetch(:release_path)}/htdocs/opcache_clear.php"
				execute :touch, "#{opcache_file}"
				execute :chmod, "-R 644 #{opcache_file}"
				execute :echo, "'<?php opcache_reset(); ?>' > #{opcache_file}"
				execute :curl, "-s #{fetch(:opcache_file_url)} "
			end
		end
	end
end
after 'deploy:finishing', 'deploy:clear_cache'