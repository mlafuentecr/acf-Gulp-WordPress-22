<?php

defined( 'ABSPATH' ) || exit;
get_header(); 

?>


<div class="intern-pg  pt-5">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
  <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
