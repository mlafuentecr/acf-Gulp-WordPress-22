<?php


// //RICH TEXT special_underline
// function special_underline() {
  
//     $blockPath = '/src/js/block-rich-text.js';
//     wp_register_script( 'special_underline',
//                         get_template_directory_uri() . $blockPath,
//                         array( 'wp-rich-text','wp-editor','wp-element' ),
//                         false, false);
  
//     wp_enqueue_script('block-rich-text');
// }

// add_action( 'init', 'special_underline' );



/*-----------------------------------------------------------------*/
//     ADD tiny_mce FORMATS
/*-----------------------------------------------------------------*/
//add place to the tinymce for styles
function wpb_mce_button($buttons) {
  array_unshift($buttons, 'styleselect');
  return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_button');


function my_mce_before_init_insert_formats( $init_array ) {  
  // Define the style_formats array
  $style_formats = array(  

    array(  
      'title' => 'Uppercase',  
      'block' => 'span',  
      'classes' => 'text-upperCase',
      'wrapper' => true,
      'styles' => array(
        'textTransform' => 'uppercase'
    )
    ),  
    array(  
      'title' => 'Capital text',  
      'block' => 'span',  
      'classes' => 'text-capital',
      'wrapper' => true,
      'styles' => array(
        'textTransform' => 'capitalize'
    )
    ),

    //This is not gutenber but tinymce
    array(  
      'title' => 'rs_underline',  
      'block' => 'span',  
      'classes' => 'rs_underline',
      'wrapper' => true,
      'styles' => array(
        'text-decoration' => 'underline'
    )
    ),

  );

  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );  
  return $init_array;  
   
} 

add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


?>
