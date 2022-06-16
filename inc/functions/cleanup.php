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
 add_filter('the_generator', 'mlm_remove_version');

//Remove WPSEO_VERSION
if (defined('WPSEO_VERSION')) {
    add_action('wp_head',function() { ob_start(function($o) {
   return preg_replace('/\n?<.*?yoast seo plugin.*?>/mi','',$o);
}); },~PHP_INT_MAX);
}


// /* 0.7 remove WordPress REST API,
// -------------------------------------------------------------- */


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
