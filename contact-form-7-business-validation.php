<?php
/*
Plugin Name: Contact Form 7 Business Email Validation
Plugin URI: https://hkvlaanderen.com
Description: Validate business email for your forms!
Author: Hendrik Vlaanderen
Author URI: https://hkvlaanderen.com
Text Domain: contact-form-7-business-validation
Domain Path: /languages/
Version: 1.0
*/

define( 'WPCF7BV_PLUGIN', __FILE__ );

define( 'WPCF7BV_PLUGIN_DIR', untrailingslashit( dirname( WPCF7BV_PLUGIN ) ) );

define( 'WPCF7BV_PLUGIN_URL',
    untrailingslashit( plugins_url( '', WPCF7BV_PLUGIN ) ) );

require_once WPCF7BV_PLUGIN_DIR . '/validation.php';
