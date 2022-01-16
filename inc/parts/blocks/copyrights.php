<div class="copyrights"><?php echo date('Y');?> © Rootstrap </div>


<?php
      // Frontpage Style I WILL ADDit IN SASS GLOBAL A BLOCK.SCSS
      //Add style to backend 
      function addCssBackend(){
        $blockPath = '/dist/css/blocks_backend.css';
        wp_enqueue_style("special-tag-css",  get_template_directory().$blockPath ,array(),'1.0.0','all');
      }
      add_action( 'wp_enqueue_scripts', 'addCssBackend' );
?>
