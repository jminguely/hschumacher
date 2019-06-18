set :application, 'hschumacher.minguely.ch'

set :stage, :staging
set :branch, :dev

set :deploy_to, -> { "/home/jminguely/www/#{fetch(:application)}" }

set :opcache_file_url, "https://hschumacher.minguely.ch/opcache_clear.php"

# Extended Server Syntax
# ======================
server 'ssh-jminguely.alwaysdata.net', user: 'jminguely', roles: %w{web app db}

fetch(:default_env).merge!(wp_env: :staging)

SSHKit.config.command_map[:composer] = "php #{shared_path.join("composer.phar")}"
