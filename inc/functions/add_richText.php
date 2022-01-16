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
  $blockPath = '/src/css/block-rich-text.css';
  wp_enqueue_script( 'block-rich-text' );
  wp_enqueue_style("block-rich-text", get_template_directory_uri().$blockPath ,array(),'1.0.0','all');

}
add_action( 'enqueue_block_editor_assets', 'my_custom_format_enqueue_assets_editor' );

//Add style to Frontpage I WILL ADD IN SASS GLOBAL A BLOCK.SCSS
// function specialTagCSS(){    
//   wp_enqueue_style("special-tag-css",get_template_directory_uri().$blockPath ,array(),'1.0.0','all');
//   }
//   add_action( 'wp_enqueue_scripts', 'specialTagCSS' );
