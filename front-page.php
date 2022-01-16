<?php
  // Exit if accessed directly.
  defined('ABSPATH') || exit;
  get_header();

  /*-----------------------------------------------------------------------------------*/
  /*  ACF Page Homepage 
  /*-----------------------------------------------------------------------------------*/

?>
<?php include_once(get_template_directory() . '/inc/parts/slider_home.php'); ?>

<?php the_field('home_banner_intro'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
