<?php
/**
 * @package Fusion_Extension_Post_Details
 */
/**
 * Plugin Name: Fusion : Extension - Post Details
 * Plugin URI: http://www.agencydominion.com/fusion/
 * Description: Post Details Extension Package for Fusion.
 * Version: 1.2.1
 * Author: Agency Dominion
 * Author URI: http://agencydominion.com
 * Text Domain: fusion-extension-post-details
 * Domain Path: /languages/
 * License: GPL2
 */
 
/**
 * FusionExtensionPostDetails class.
 *
 * Class for initializing an instance of the Fusion Post Details Extension.
 *
 * @since 1.0.0
 */


class FusionExtensionPostDetails	{ 
	public function __construct() {
						
		// Initialize the language files
		add_action('plugins_loaded', array($this, 'load_textdomain'));
		
		// Enqueue front end scripts and styles
		add_action('wp_enqueue_scripts', array($this, 'front_enqueue_scripts_styles'));
		
	}
	
	/**
	 * Load Textdomain
	 *
	 * @since 1.2.1
	 *
	 */
	 
	public function load_textdomain() {
		load_plugin_textdomain( 'fusion-extension-post-details', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
	
	/**
	 * Enqueue JavaScript and CSS on Front End pages.
	 *
	 * @since 1.0.0
	 *
	 */
	 
	public function front_enqueue_scripts_styles() {
		wp_enqueue_style( 'fsn_post_details', plugin_dir_url( __FILE__ ) . 'includes/css/fusion-extension-post-details.css', false, '1.0.0' );
	}
	
}

$fsn_extension_post_details = new FusionExtensionPostDetails();

//EXTENSIONS

//post details
require_once('includes/extensions/post-details.php');

?>