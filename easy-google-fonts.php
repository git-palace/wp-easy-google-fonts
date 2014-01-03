<?php
/**
 * Plugin Name: Easy Google Fonts
 * Description: A simple and easy way to add google fonts to your WordPress theme.
 * Version: 1.2.3
 * Author: Titanium Themes
 * Author URI: http://www.titaniumthemes.com
 * License: GPL2
 * 
 */

/**
 * Theme Font Generator
 *
 * This file is responsible for enabling custom google
 * fonts to be generated in the WordPress Admin Area. 
 * This plugin has been completely rewritten from the
 * ground up to boost performance.
 * 
 * @package   Easy_Google_Fonts
 * @author    Sunny Johal - Titanium Themes <support@titaniumthemes.com>
 * @license   GPL-2.0+
 * @link      http://wordpress.org/plugins/easy-google-fonts/
 * @copyright Copyright (c) 2013, Titanium Themes
 * @version   1.2.3
 * 
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Include Class Files
 *
 * Loads required classes for this plugin to function.
 *
 * @since 1.2
 * @version 1.2.3
 * 
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-easy-google-fonts.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-egf-font-utilities.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-egf-posttype.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-egf-register-options.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-easy-google-fonts-admin.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-egf-customizer.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-egf-admin-controller.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-egf-ajax.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-egf-frontend.php' );

/**
 * Load Plugin Text Domain
 *
 * Required in order to make this plugin translatable.
 *
 * @since 1.2
 * @version 1.2.3
 * 
 */
function easy_google_fonts_text_domain() {
	load_plugin_textdomain( 'easy-google-fonts', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'easy_google_fonts_text_domain' );

/**
 * Create Easy_Google_Fonts Instance
 *
 * Creates a new Easy_Google_Fonts class instance when
 * the 'plugins_loaded' action is fired.
 *
 * @since 1.2
 * @version 1.2.3
 * 
 */
add_action( 'plugins_loaded', array( 'Easy_Google_Fonts', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'EGF_Font_Utilities', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'EGF_Posttype', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'EGF_Register_Options', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'EGF_Customizer', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'Easy_Google_Fonts_Admin', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'EGF_Ajax', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'EGF_Frontend', 'get_instance' ) );

/**
 * Register Activation/Deactivation Hooks
 * 
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 * 
 * @since 1.2
 * @version 1.2.3
 * 
 */
register_activation_hook( __FILE__, array( 'Easy_Google_Fonts', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Easy_Google_Fonts', 'deactivate' ) );