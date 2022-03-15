<?php
/*
Template Name:  Services
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

?>

<main class="main-content services">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
    the_content();
    // form 
    get_template_part("/inc/parts/content","form"); 
  endwhile; else: ?>
  <p>Sorry, no posts matched your criteria.</p>
  <?php endif; ?>

</main>


<?php get_footer(); ?>
