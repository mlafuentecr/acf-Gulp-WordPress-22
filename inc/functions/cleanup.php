<?php

// /*-----------------------------------------------------------------------------------*/
// /* REMOVE GENERATOR VERSION NUMBER
// /*-----------------------------------------------------------------------------------*/
// Removes the emoji
remove_action('wp_head',                'print_emoji_detection_script', 7);
remove_action('admin_print_scripts',    'print_emoji_detection_script');
remove_action('wp_print_styles',        'print_emoji_styles');
remove_action('admin_print_styles',     'print_emoji_styles');
remove_filter('the_content_feed',       'wp_staticize_emoji');
remove_filter('comment_text_rss',       'wp_staticize_emoji');
remove_filter('wp_mail',                'wp_staticize_emoji_for_email');

//Remove wp ver
function mlm_remove_version()
{
    return '';
}
//add_filter('the_generator', 'mlm_remove_version');

//Remove revslider_meta_tag
function remove_revslider_meta_tag()
{
    return '';
}

// /* 0.7 remove  WordPress REST API,
// -------------------------------------------------------------- */
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('rest_api_init', 'wp_oembed_register_route');

// // Disable REST API link tag
remove_action('wp_head', 'rest_output_link_wp_head', 10);

// // Disable oEmbed Discovery Links
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

// // Disable REST API link in HTTP headers
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
//Removes the wlwmanifest link
remove_action('wp_head', 'wlwmanifest_link');
//Removes the RSD link
remove_action('wp_head', 'rsd_link');
// Removes the WP shortlink
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// Removes the canonical links
remove_action('wp_head', 'rel_canonical');
// Removes the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links_extra', 3);
// Removes links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'feed_links', 2);
// Removes the index link
remove_action('wp_head', 'index_rel_link');
// Removes the prev link
remove_action('wp_head', 'parent_post_rel_link');
// Removes the start link
remove_action('wp_head', 'start_post_rel_link');
// Removes the relational links for the posts adjacent to the current post
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
// Removes the WordPress version i.e. -
remove_action('wp_head', 'wp_generator');

// /* 0.6  Deregister CSS file
// -------------------------------------------------------------- */
// I can add this in webpack later
// gutember wp-block-library-css  wp-includes/css/dist/block-library/style.min.css?ver=5.7
// /* wp-embed It relates specifically to embeding WordPress posts from other people's blogs/websites. Embedding WordPress posts inside WordPress posts: so meta! This feature was introduced in WordPress 4.4.
// -------------------------------------------------------------- */
//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);




/*-----------------------------------------------------------------------------------*/
/*  acf
/*-----------------------------------------------------------------------------------*/
// disable acf css on front-end acf forms
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
 
function my_deregister_styles() {
  wp_deregister_style( 'acf' );
  wp_deregister_style( 'acf-field-group' );
  wp_deregister_style( 'acf-global' );
  wp_deregister_style( 'acf-input' );
  wp_deregister_style( 'acf-datepicker' );
  wp_deregister_style( 'acf-timepicker' );
  wp_deregister_style( 'wp-color-picker' );
  wp_deregister_style( 'select2' );
  wp_deregister_style( 'iris-css' );
  wp_deregister_style( 'contact-form-7' );
 

}
add_action( 'wp_enqueue_scripts', 'my_deregister_scripts', 1000 );
 function my_deregister_scripts() {
    wp_deregister_script( 'select2' );
    wp_deregister_script( 'acf-pro-input' );
    wp_deregister_script( 'acf-input' );
    wp_deregister_script( 'acf' );
    wp_deregister_script( 'jquery-ui-datepicker' );
    ///puede dar problemas de jquery
    //wp_deregister_script( 'acf' );
    wp_deregister_script( 'jquery-migrate' );
    wp_deregister_script( 'jquery-core' );
}




/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
   }
   add_action( 'init', 'disable_emojis' );
   
   /**
    * Filter function used to remove the tinymce emoji plugin.
    * 
    * @param array $plugins 
    * @return array Difference betwen the two arrays
    */
   function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
    return array();
    }
   }
   
   /**
    * Remove emoji CDN hostname from DNS prefetching hints.
    *
    * @param array $urls URLs to print for resource hints.
    * @param string $relation_type The relation type the URLs are printed for.
    * @return array Difference betwen the two arrays.
    */
   function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
   
   $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }
   
   return $urls;
   }


/**
 * Disable comments
 */
add_action( 'admin_init', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
