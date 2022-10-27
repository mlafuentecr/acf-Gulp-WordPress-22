<?php
// https://developer.wordpress.org/themes/customize-api/customizer-objects/
//https://director-wp-develop.docksal.site/wp/wp-admin/customize.php?return=%2Fwp%2Fwp-admin%2Fthemes.php
function blogpress_theme_colors_section( $wp_customize ) {
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'header_image' );
	$wp_customize->remove_section( 'background_image' );
	//$wp_customize->remove_section( 'title_tagline' );

}
add_action( 'customize_register', 'blogpress_theme_colors_section' );


function director_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on director, use a find and replace
		* to change 'director' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'director', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	//$post_formats = array('aside','image','gallery','video','audio','link','quote','status');
	//add_theme_support( 'post-formats', $post_formats);

	//thumbnails
	add_theme_support( 'post-thumbnails' );
		//thumbnails size for news
		add_image_size( 'news', '920', '470', true );
		//thumbnails size for news
		add_image_size( 'other', '920', '600', true );
	//thumbnails ENDS

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	/** custom background **/
	$bg_defaults = array(
		'default-image'          => '',
		'default-preset'         => 'default',
		'default-size'           => 'cover',
		'default-repeat'         => 'no-repeat',
		'default-attachment'     => 'scroll',
	);
	//add_theme_support( 'custom-background', $bg_defaults );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 43,
			'width'       => 93,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	/*-----------------------------------------------------------------------------------*/
	/* Increase the Maximum File Upload Size
	/*-----------------------------------------------------------------------------------*/

	@ini_set('upload_max_size', '1M');
	@ini_set('post_max_size', '1M');
	@ini_set('max_execution_time', '300');

	/*-----------------------------------------------------------------------------------*/
	/* LIMIT IMAGES IF THEY ARE TOO BIG
	/*-----------------------------------------------------------------------------------*/

	function deny_giant_images( $file ) {

		$type = explode( '/',$file['type' ]);

		if ( $type[0] == 'image' ){
			list( $width, $height, $imagetype, $hwstring, $mime, $rgb_r_cmyk, $bit ) = getimagesize( $file['tmp_name'] );
			if ( $width * $height > 3200728 ) {
				// I added 100,000 as sometimes there are more rows/columns than visible pixels depending on the format
				$file['error'] = 'This image is too large, resize it prior to uploading, ideally below 0.6MP or 2048x1536';
			}
		}
		return $file;
	}
	add_filter( 'wp_handle_upload_prefilter','deny_giant_images' );

	/*-----------------------------------------------------------------------------------*/
	/* EXCERPT
	/*-----------------------------------------------------------------------------------*/
	function director_excerpt_length($length) {
		//  if (is_front_page() && is_home()) {
		//   return 50;
		//  } else {
		//   return 20;
		//  }
		return 50;
	}
	add_filter('excerpt_length', 'director_excerpt_length', 999);

	//Add excerpt to pages
	add_post_type_support( 'page', 'excerpt' );

	/*-----------------------------------------------------------------------------------*/
	/* svg
	/*-----------------------------------------------------------------------------------*/
	function wpcontent_svg_mime_type( $mimes = array() ) {
		$mimes['svg']  = 'image/svg+xml';
		$mimes['svgz'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter( 'upload_mimes', 'wpcontent_svg_mime_type' );




	/*-----------------------------------------------------------------------------------*/
	/* remove term descriptions from post CATEGORY
	/*-----------------------------------------------------------------------------------*/
function ut_hide_cat_descr() { ?>

	<style type="text/css">
		 .term-description-wrap {
				 display: none;
		 }
	</style>

<?php } 

add_action( 'admin_head-term.php', 'ut_hide_cat_descr' );
add_action( 'admin_head-edit-tags.php', 'ut_hide_cat_descr' );



}
add_action( 'after_setup_theme', 'director_setup' );
