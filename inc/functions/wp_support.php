<?php
/*-----------------------------------------------------------------------------------*/
/* Add Enable support for Post Thumbnails on posts and pages.
/*-----------------------------------------------------------------------------------*/
add_theme_support('post-thumbnails');
/*-----------------------------------------------------------------------------------*/
/* Increase the Maximum File Upload Size
/*-----------------------------------------------------------------------------------*/

@ini_set('upload_max_size', '1M');
@ini_set('post_max_size', '1M');
@ini_set('max_execution_time', '300');

/*-----------------------------------------------------------------------------------*/
/* Add Custom Logo
/*-----------------------------------------------------------------------------------*/

add_theme_support('custom-logo', array(
 'height' => 100,
 'width' => 400,
 'flex-height' => true,
 'flex-width' => true,
 'header-text' => array('site-title', 'site-description'),
));

/* uso
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
echo $image[0];
 */

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support('automatic-feed-links');

add_theme_support('title-tag');

/** automatic feed link*/
add_theme_support( 'automatic-feed-links' );

/** tag-title **/
add_theme_support( 'title-tag' );

/** post formats */
$post_formats = array('aside','image','gallery','video','audio','link','quote','status');
add_theme_support( 'post-formats', $post_formats);

/** post thumbnail **/
add_theme_support( 'post-thumbnails' );

/** HTML5 support **/
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

/** refresh widgest **/
add_theme_support( 'customize-selective-refresh-widgets' );
    

// Add custom size
add_image_size('brand-slider-image-size', 1024, 580, true);


//LIMIT IMAGES IF THEY ARE TOO BIG
function deny_giant_images($file){
  $type = explode('/',$file['type']);

  if($type[0] == 'image'){
      list( $width, $height, $imagetype, $hwstring, $mime, $rgb_r_cmyk, $bit ) = getimagesize( $file['tmp_name'] );
      if($width * $height > 3200728){ // I added 100,000 as sometimes there are more rows/columns than visible pixels depending on the format
          $file['error'] = 'This image is too large, resize it prior to uploading, ideally below 0.6MP or 2048x1536';
      }
  }
  return $file;
}
add_filter('wp_handle_upload_prefilter','deny_giant_images');




/*-----------------------------------------------------------------------------------*/
/* EXCERPT
/*-----------------------------------------------------------------------------------*/
function my_excerpt_length($length)
{
//  if (is_front_page() && is_home()) {
//   return 50;
//  } else {
//   return 20;
//  }
return 20;
}
add_filter('excerpt_length', 'my_excerpt_length', 999);





add_theme_support('title-tag');

add_theme_support('html5', array(
 'search-form',
 'comment-form',
 'comment-list',
 'gallery',
 'caption',
));

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
/* editor-styles blocks
/*-----------------------------------------------------------------------------------*/
add_theme_support('editor-styles');
add_editor_style( 'style-editor.css' );
