<?php
/*
Template Name: landing page
*/
defined( 'ABSPATH' ) || exit;
get_header(); 
?>

<main class="landing-pg bg-white">
  <?php the_content(); ?>
  <!-- sec6 Why clientName?  -->
  <?php  get_template_part('/inc/parts/content', 'general-footer');   ?>
</main>


<?php get_footer(); ?>
