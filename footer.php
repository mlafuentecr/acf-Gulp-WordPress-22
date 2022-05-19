<!-- footer -->
<script type="text/javascript" src="https://app.termly.io/embed.min.js" data-auto-block="on"
  data-website-uuid="097ae153-7870-4783-a192-e2b268cc4a9c"></script>
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
