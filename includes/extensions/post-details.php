<?php
/**
 * @package Fusion_Extension_Post_details
 */

/**
 * Post Details Extension.
 *
 * Function for adding a Post Details element to the Fusion Engine
 *
 * @since 1.0.0
 */

add_action('init', 'fsn_init_post_details', 12);
function fsn_init_post_details() {
 
 	//OUTPUT SHORTCODE
 	function fsn_post_details_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'show_title' => '',
			'show_author' => '',
			'show_date' => '',
			'show_categories' => '',
			'show_tags' => ''
		), $atts ) );
		
		global $post;
		
		$output = '<div class="fsn-post-details '. fsn_style_params_class($atts) .'">';
		
			$output .= !empty($show_title) ? '<h1 class="post-title">'. $post->post_title .'</h1>' : '';
			if (!empty($show_author) || !empty($show_date) || !empty($show_categories) || !empty($show_tags)) {
				$author = !empty($show_author) ? true : false;
				$date = !empty($show_date) ? true : false;
				$categories = !empty($show_categories) ? true : false;
				$tags = !empty($show_tags) ? true : false;
				$args = array(
					'author' => $author,
					'date' => $date,
					'categories' => $categories,
					'tags' => $tags
				);
				$output .= '<footer class="post-metadata">';
					$output .= fsn_get_post_meta($args);
				$output .= '</footer>';
			}
		
		$output .= '</div>';
		
		return $output;
	}
	add_shortcode('fsn_post_details', 'fsn_post_details_shortcode');
 
	//MAP SHORTCODE
	if (function_exists('fsn_map')) {
		fsn_map(array(
			'name' => __('Post Details', 'fusion-extension-post-details'),
			'shortcode_tag' => 'fsn_post_details',
			'description' => __('Add post details. Use the options below to select which details from this post are displayed.', 'fusion-extension-post-details'),
			'icon' => 'title',
			'params' => array(
				array(
					'type' => 'checkbox',
					'param_name' => 'show_title',
					'label' => __('Title', 'fusion-extension-post-details')
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'show_author',
					'label' => __('Author', 'fusion-extension-post-details')
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'show_date',
					'label' => __('Date', 'fusion-extension-post-details')
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'show_categories',
					'label' => __('Categories', 'fusion-extension-post-details')
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'show_tags',
					'label' => __('Tags', 'fusion-extension-post-details')
				)
			)
		));
	}
}
 
?>