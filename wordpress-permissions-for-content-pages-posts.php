<?php
/*
Plugin Name:  Content Permissions for Pages & Posts
Plugin URI:   https://profiles.wordpress.org/paramsheoran
Description:  Basic WordPress plugin for hiding content to logged in users or visitors only based on easy shortcodes.
Version:      1.0
Author:       Param Sheoran
Author URI:   https://paramsheoran.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  paramplug
Domain Path:  /languages
*/

/* Shortcode for Content Visible to Guest Visitors Publically */ 

add_shortcode( 'cpp_guests', 'visitor_check_shortcode' );

function visitor_check_shortcode( $atts, $content = null ) {
	 if ( ( !is_user_logged_in() && !is_null( $content ) ) || is_feed() )
		return $content;
	return '';
}
  
/* To Use :  [cpp_guests] Here is some content for Guests. [/cpp_guests]*/



/* Shortcode for Content Visible to Logged In Users Only */ 


add_shortcode( 'cpp_users', 'member_check_shortcode' );

function member_check_shortcode( $atts, $content = null ) {
	 if ( is_user_logged_in() && !is_null( $content ) && !is_feed() )
		return $content;
	return ' Sorry !! you must be logged in to view this content.';
}

/* To Use :  [cpp_users] Here is content for Logged In users only. [/cpp_users]*/


