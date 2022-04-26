<?php
/*
Template Name: Page Servicesx 
*/

get_header();
?>

<main class="main-content services">

  <?php  
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 

  the_content();
  get_template_part("/inc/parts/content","form");?>
  <?php 	} // end while
} // end if ?>
</main>


<?php 



?>


<?php get_footer(); ?>
