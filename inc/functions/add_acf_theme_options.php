<?php
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

	// Check function exists.
	if ( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> __('director Website Settings'),
			'menu_title'    => __('global'),
			'menu_slug'     => 'global',
			'capability'    => 'edit_posts',
			//'parent_slug'	=> 'options-general.php',
			'redirect'      => false,
			'icon_url'      => 'dashicons-screenoptions',
			'position'      => 1
		));
	}
}
