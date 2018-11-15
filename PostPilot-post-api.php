<?php
/**
 * Plugin Name: PostPilot
 * Description: A delivery wire between your PostPilot account and your WordPress-based site. After authentication, your PostPilot assignments will be delivered to your WordPress site under a Pending Draft.
 * Plugin URI: https://www.postpilot.io
 * Author: PostPilot
 * Author URI: https://www.postpilot.io
 * Version: 1.0
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

require_once( dirname( __FILE__ ) . '/class-pdel-hmac-auth.php' );
require_once( dirname( __FILE__ ) . '/class-presto-post-api.php' );
require_once( dirname( __FILE__ ) . '/class-pdel-options.php' );

add_action( 'rest_api_init', function () {
	$secret = PDel_Options::get_secret();
	$auth = new PDel_HMAC_Auth( $secret );
	( new Presto_Post_API( $auth ) )->register_routes();
} );

new PDel_Options();
