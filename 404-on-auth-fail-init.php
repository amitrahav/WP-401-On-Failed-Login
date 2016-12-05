<?php
/**
 * Plugin Name: 401 On Failed Login
 * Plugin URI : https://github.com/amitrahav/WP-401-On-Failed-Login
 * Description: This plugin Sends Header Status 401 When Login Fail s.
 * Version: 1.0.0
 * Author: Amit Rahav
 * Author URI: http://danielpataki.com
 * License: GPL3
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
