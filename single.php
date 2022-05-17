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

  <div class="get_latest_posts ">
    <div class="container  <?php echo $margen; ?>">
      <h7 class='col-12 mt-5  text-uppercase text-center d-flex'> <b class='text-center col-12'>Other articles you might
          like
        </b></h7>
      <div class="  row row-cols-1 row-cols-sm-1 row-cols-md-3 g-3  ">

        <?php 
   // The Query
   $args = array(
    'posts_per_page'  => 5, 
    'orderby'         => 'post_date',
    'order'           => 'DESC',
    'post_type'       => 'post', 
    'post_status'     => 'publish'
    );

    $the_query = new WP_Query( $args );

          while ( $the_query->have_posts() ) : $the_query->the_post(); 
            $post     = get_post();
            echo get_template_part('/inc/parts/card', 'latespost'); 
          endwhile; 
         ?>
        <div class="col-12  m-auto my-5 text-center text-black">
          <a aria-label="latest post" class='rs_link_underline m-auto text-black' href="/latest-post/" class="link">
            View Latest Posts</a>
        </div>
      </div>
    </div>
  </div>

</main>


<?php get_footer(); ?>
