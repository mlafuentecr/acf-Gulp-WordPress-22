<?php


/*-----------------------------------------------------------------*/
//     ADD tiny_mce block-rich-text in General GUTENBER
/*-----------------------------------------------------------------*/

function enqueue_block_editor_assets() {

   // Load the compiled blocks into the editor.
    wp_enqueue_script(
      'rich-text-js',
      get_template_directory_uri().'/dist/js/rich-text.js',
      array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor' ),
      $GLOBALS['THEME_MLM_VER'],
      true
    );

}
//add_action( 'enqueue_block_editor_assets', 'enqueue_block_editor_assets' );





///load CSS
function load_stylesheets(){    
  $blockBackendCss = '/dist/css/custom-editor-style.css';
  wp_enqueue_style('editor-style',   get_template_directory_uri() .'/dist/css/custom-editor-style.css' );
}
add_action('admin_init', 'load_stylesheets');

?>
