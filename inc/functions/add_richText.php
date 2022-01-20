<?php


//RICH TEXT
function my_custom_format_script_register() {
  
    $blockPath = '/src/js/block-rich-text.js';
    wp_register_script( 'block-rich-text',
                        get_template_directory_uri() . $blockPath,
                        array( 'wp-rich-text','wp-editor','wp-element' ),
                        false, false);
  
    wp_enqueue_script('block-rich-text');
}

add_action( 'init', 'my_custom_format_script_register' );


//Add style to editor
function my_custom_format_enqueue_assets_editor() {
  $blockPath = '/dist/css/blocks_backend.css';
  wp_enqueue_script( 'block-rich-text' );
  wp_enqueue_style("block-rich-text", get_template_directory().$blockPath ,array(), $GLOBALS['THEME_MLM_VER'],'all');

}
add_action( 'enqueue_block_editor_assets', 'my_custom_format_enqueue_assets_editor' );


/*-----------------------------------------------------------------*/
//     ADD BTN WITH FORMATS
/*-----------------------------------------------------------------*/

function wpb_mce_buttons_2($buttons) {
  array_unshift($buttons, 'styleselect');
  return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');


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

);

// Insert the array, JSON ENCODED, into 'style_formats'
$init_array['style_formats'] = json_encode( $style_formats );  
   
return $init_array;  
   
} 

add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );



function add_editor_styles_sub_dir() {
add_editor_style( get_template_directory() . '/dist/css/blocks_backend.css', $GLOBALS['THEME_MLM_VER'],'all' );
}
add_action( 'after_setup_theme', 'add_editor_styles_sub_dir' );

?>
