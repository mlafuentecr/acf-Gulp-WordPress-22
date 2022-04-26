<!-- footer -->

<?php     
      $template = get_post_meta( $post->ID, '_wp_page_template', true );
   
    if ( get_post_type() === 'services' || $template === 'page-templates/template-landing_page.php' ) {
      // for landing pages
     get_template_part( '/inc/parts/footer','services');
    } else {
      //For the site and blog
      get_template_part( '/inc/parts/footer','regular');
    }
  
  ?>
