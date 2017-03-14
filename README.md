# WP-401-On-Failed-Login
 This plugin Sends Header Status 401 When Login Fails.

## Installation
Export zip into wp-content/plugins and enable it.
Server side for this plugin is a fail2bun patch like: [fail2ban-wordpress-login](https://github.com/alonisser/fail2ban-wordpress-login).

## REST-API
removing `wp/v2/users` defualt endpoint, and hooking 401 into 