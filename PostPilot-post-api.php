<?php
/**
 * Plugin Name: PostPilot
 * Plugin URI: https://www.PostPilot.io/
 * Description: Delivering your PostPilot assignments from your PostPilot account to your Wordpress-based site.
 * Version: 1.0
 * Author: postpilot
 * Author URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

require_once( dirname( __FILE__ ) . '/class-hmac-auth.php' );
require_once( dirname( __FILE__ ) . '/class-presto-post-api.php' );
require_once( dirname( __FILE__ ) . '/Options.class.php' );

add_action( 'rest_api_init', function () {
	$secret = Options::get_secret();
	$auth = new HMAC_Auth( $secret );
	( new Presto_Post_API( $auth ) )->register_routes();
} );

new Options();
