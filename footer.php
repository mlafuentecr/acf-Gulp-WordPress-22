<!-- footer -->

<?php     
      
    if ( get_post_type() === 'services' ) {
    // for landing pages
    get_template_part( '/inc/parts/footer','landing_pg');
    } else {
      //For the site and blog
      get_template_part( '/inc/parts/footer','regular');
    }
  
  ?>
