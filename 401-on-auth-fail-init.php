<?php
/**
 * Plugin Name: 401 On Failed Login
 * Plugin URI : https://github.com/amitrahav/WP-401-On-Failed-Login
 * Description: This plugin Sends Header Status 401 When Login Fail s.
 * Version: 1.0.1
 * Author: Amit Rahav
 * License: MIT
 */

function add_empty_field_handling( $user ) {
  if ( is_wp_error( $user ) && !isset($_GET['loggedout'])) {
    do_action( 'wp_login_failed', $user );
  }
  return $user;
}
add_filter('authenticate','add_empty_field_handling', 31, 1);

function header_auth_error( $username ) {
  status_header( 401 );
  nocache_headers();
}
add_action( 'wp_login_failed', 'header_auth_error' );



// removing users api endpoint to reduce chance of bruteforce
add_filter('rest_endpoints', function($endpoints) {
  if ( isset( $endpoints['/wp/v2/users'] ) )
    unset( $endpoints['/wp/v2/users'] );

  return $endpoints;
});


add_filter( 'rest_authentication_errors', function( $result ) {
  do_action( 'wp_login_failed' );
});