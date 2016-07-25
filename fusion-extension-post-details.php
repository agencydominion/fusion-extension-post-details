<?php
/**
 * @package Fusion_Extension_Post_Details
 */
/**
 * Plugin Name: Fusion : Extension - Post Details
 * Plugin URI: http://fusion.1867dev.com
 * Description: Post Details Extension Package for Fusion.
 * Version: 1.0.0
 * Author: Agency Dominion
 * Author URI: http://agencydominion.com
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
		load_plugin_textdomain( 'fusion-extension-post-details', false, plugin_dir_url( __FILE__ ) . 'languages' );
		
		// Enqueue front end scripts and styles
		add_action('wp_enqueue_scripts', array($this, 'front_enqueue_scripts_styles'));
		
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