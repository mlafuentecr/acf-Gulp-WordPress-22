<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value 
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();

?>


<!-- 0 banner -->
<section class="intro-banner"
  style="background-image: url('<?php echo get_template_directory_uri()."/inc/images/home-stat-backgr-1.jpg"; ?>');">
  <div class="container-xl">
    <div class="row">
      <article class="headline">
        <h2><?php the_title(); ?></h2>
      </article>
    </div>
  </div>
</section>


<!--  cotent -->
<section class="intro-banner">
  <div class="container-xl">
    <div class="row">
      <?php  the_content(); ?>
    </div>
  </div>
</section>


<?php   edit_post_link(__('Edit This page'));  ?>
