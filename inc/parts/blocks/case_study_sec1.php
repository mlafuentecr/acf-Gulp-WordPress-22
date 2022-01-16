<?php
 // $btnRegister = get_field('registrate', 'option');
?>
<header
  class="case_study_sec_1 container gap-5 case_study_header  d-flex flex-wrap py-5 align-content-center text_white_1 text-center text-md-start mr-5">
  <?php if ( get_field('client_title') ) : ?>
  <h1 class="col col-12 col-md-9 "><?php echo get_field('client_title'); ?></h1>
  <?php endif; ?>

  <div class="col col-12  col-md-2">
    clients
    MasterClass
    duration
    Ongoing
    team
    50+ developers
    and designers</div>
</header>


<?php
      // Frontpage Style I WILL ADDit IN SASS GLOBAL A BLOCK.SCSS
      //Add style to backend 
      function block_text_caseStudy1_css() {
           $blockPath = '/dist/css/blocks_backend.css';
        wp_enqueue_style("block_caseStudy1",  get_template_directory().$blockPath ,array(),$GLOBALS['THEME_MLM_VER'],'all');
    }
    add_action( 'wp_enqueue_scripts', 'block_text_caseStudy1_css' );
    

?>
