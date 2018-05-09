# WP-401-On-Failed-Login
 This plugin Sends Header Status 401 When Login Fails.

## Installation
### ziped
Export zip into wp-content/plugins and enable it.
Server side for this plugin is a fail2bun patch like: [fail2ban-wordpress-login](https://github.com/alonisser/fail2ban-wordpress-login).

### composer
at your composer.json, at the repositories section add:
```
 {
  "type": "composer",
  "url":  "https://repo.fury.io/drorisrael/"
 }
```

and then run `$composer require wp-401-on-failed-login`

### wp CLI
run :`$wp plugin install https://github.com/amitrahav/WP-401-On-Failed-Login/archive/master.zip --activate`

## REST-API
removing `wp/v2/users` defualt endpoint, and hooking 401 into rest api auth error. 
