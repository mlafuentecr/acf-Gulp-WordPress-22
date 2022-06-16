<?php

//RICH TEXT
function my_custom_format_script_register() {
  
  $blockPath = $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/js/rich-text.js';
  wp_register_script( 'block-rich-text',
                      $blockPath,
                      array( 'wp-rich-text','wp-editor','wp-element' ),
                      false, false);

  wp_enqueue_script('block-rich-text');
}

add_action( 'init', 'my_custom_format_script_register' );


//Add style to editor
// function my_custom_format_enqueue_assets_editor() {
// $blockPath = '/dist/css/blocks_backend.css';
// wp_enqueue_script( 'block-rich-text' );
// wp_enqueue_style("block-rich-text", get_template_directory().$blockPath ,array(), $GLOBALS['THEME_MLM_VER'],'all');

// }
// add_action( 'enqueue_block_editor_assets', 'my_custom_format_enqueue_assets_editor' );
/*-----------------------------------------------------------------*/
//     ADD tiny_mce block-rich-text in General GUTENBER
/*-----------------------------------------------------------------*/

// function enqueue_block_editor_assets() {

//    // Load the compiled blocks into the editor.
//     wp_enqueue_script(
//       'rich-text-js',
//       $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/js/rich-text.js',
//       array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor' ),
//       $GLOBALS['THEME_MLM_VER'],
//       true
//     );

// }
// add_action( 'enqueue_block_editor_assets', 'enqueue_block_editor_assets' );





///load CSS
function load_stylesheets(){    
  $blockBackendCss = '/dist/css/custom-editor-style.css';
  wp_enqueue_style('editor-style',   $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/custom-editor-style.css' );
}
add_action('admin_init', 'load_stylesheets');

?>
