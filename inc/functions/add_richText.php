<?php

//RICH TEXT
function my_custom_format_script_register() {
  $blockPath =   get_template_directory_uri() .'/dist/js/_rich-text.js';
  wp_register_script( 'block-rich-text',
                      $blockPath,
                      array( 'wp-rich-text','wp-editor','wp-element' ),
                      false, false);

  wp_enqueue_script('block-rich-text');
}

add_action( 'init', 'my_custom_format_script_register' );




///load CSS
function load_stylesheets(){    
  wp_enqueue_style('editor-style',    get_template_directory_uri() . '/dist/css/utilities/custom-editor-style.min.css' );
}
add_action('admin_init', 'load_stylesheets');

