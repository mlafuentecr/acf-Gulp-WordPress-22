<?php
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {


    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
      /*
        acf_add_options_page(array(
            'page_title'    => __('FAQS'),
            'menu_title'    => __('FAQs'),
            'menu_slug'     => 'faqs',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'icon_url'      => 'dashicons-screenoptions',
            'position'      => 6
        ));
        */
   
        acf_add_options_page(array(
            'page_title' 	=> __('Testimonial'),
            'menu_title'    => __('Testimonial'),
            'menu_slug'     => 'testimonial',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'icon_url'      => 'dashicons-screenoptions',
            'position'      => 6
        ));
    }
}
