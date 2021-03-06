<?php
/*---------------------------------------------------------*/
/*  
/*---------------------------------------------------------*/
$pageFields = get_fields();
//If dont fin color in acf then use defaulth put it in a css variable datacolor is for menu color
$blog_headline_bg_color = $pageFields['blog_headline_background_color'] ?: '#F66252';
get_header();
?>

<main id="blog-single" class='single-post getColor' role="main"
  style="--my-color-var: <?php echo $blog_headline_bg_color; ?>;" data-color='<?php echo $blog_headline_bg_color; ?>'>
  <div class="container-900 m-auto">
    <?php 
if ( have_posts() ) : 
  while ( have_posts() ) : the_post(); 
    get_template_part( 'inc/parts/content', 'single' );
   // if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } 
  endwhile; 
else: 
    _e( 'Sorry, no pages matched your criteria.', 'roostrap' ); 
endif; 
     ?>

  </div>


<?php 
set_query_var( 'totalLatest', 6); 
echo get_template_part('/inc/parts/content', 'latespost'); 
 ?>



</main>


<?php get_footer(); ?>
