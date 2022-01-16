<?php
      //RIch Text
      // Frontpage Style I WILL ADDit IN SASS GLOBAL A BLOCK.SCSS
      //Add style to backend 
      function block_textlineCSS(){
        $blockPath = '/dist/css/blocks_backend.css';
        wp_enqueue_style("block-text-line",  get_template_directory().$blockPath ,array(),$GLOBALS['THEME_MLM_VER'],'all');
      }
      add_action( 'wp_enqueue_scripts', 'block_textlineCSS' );
?>
