<?php
  // Exit if accessed directly.
  defined('ABSPATH') || exit;
  get_header();

  /*-----------------------------------------------------------------------------------*/
  /*  ACF Page Homepage 
  /*-----------------------------------------------------------------------------------*/

?>
<?php
 get_template_part('/inc/parts/slider', 'home');  
 if ( have_posts() ) : while ( have_posts() ) : the_post(); 
  the_content();
  endwhile; endif; 
  get_footer(); 
?>
