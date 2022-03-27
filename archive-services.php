<?php
/*
Template Name:  Page Services
 Since we have services has a CPT the root is /services/name_pg
 so then we can't make a template-services.php intead we need do a archive
 and from there call the page services that has the same name has CPT
*/
defined( 'ABSPATH' ) || exit;
get_header(); 
$the_query = new WP_Query( array( 'page_id' => 9329 ) );

?>

<main class="main-content services">

  <?php  if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
  <?php
  the_content();
  // form
  get_template_part("/inc/parts/content","form");?>
  <?php endwhile; ?>
  <!-- end of the loop -->
  <!-- pagination here -->

  <?php wp_reset_postdata(); ?>

  <?php else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

</main>


<?php get_footer(); ?>
