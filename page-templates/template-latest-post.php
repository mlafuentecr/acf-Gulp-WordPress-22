<?php
/*
Template Name: Latest Post 
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
  // Load values and assign defaults.
  $pageFields       = get_fields();
  $post_quantity     = $pageFields['post_quantity']-1;
  $posts_per_page    = $pageFields['posts_per_page'] ?: 3;

  $title             = $pageFields['title'];
  $content           = $pageFields['content'];

  $cols             = $pageFields['cols'] ?: 3;
  $add_title        = $pageFields['add_title'] ?: true;
  $add_excerpt      = $pageFields['add_excerpt'] ?: true;
  $add_author       = $pageFields['add_author_info'] ?: true;

  // The Query
  $args = array(
    'posts_per_page'  => $post_quantity, 
    'orderby'         => 'post_date',
    'order'           => 'DESC',
    'post_type'       => 'post', 
    'post_status'     => 'publish',

    );

    $the_query = new WP_Query( $args );
     // Get max pages and current page out of the current query, if available.
     $totalPgs   = isset( $the_query->max_num_pages ) ? $the_query->max_num_pages : 1;

?>
<main id="latest-post" class="blog-internal bg-white ">
  <!-- headline -->
  <?php if($add_title): ?>
  <header class=" bg-dark text-white <?php echo $margen; ?>">
    <div class="container">
      <div class="row row-cols-1  py-5 ">
        <div class="content col-12 col-md-12 d-flex flex-column justify-content-center">
          <h1 class="entry-title"> <?php echo $title; ?></h1>
          <div class="content"><?php echo $content; ?></div>
        </div>
      </div>
    </div>
  </header>
  <?php endif ?>

  <?php if ( $the_query->have_posts() ) :  ?>
  <div class="get_latest_posts ">
    <div class="container  <?php echo $margen; ?>">

      <!-- if have headline on -->
      <?php if($add_headline): ?>
      <header class='col-12 mt-5 '> <?php echo $headline; ?> </header>
      <?php  endif; ?>
      <div data-test="<?php  echo $paged = get_query_var( 'paged', 1 );  ?>"
        data-offset="<?php echo $post_quantity+1; ?>" data-max="<?php echo $totalPgs; ?>"
        data-posts_per_page="<?php echo $posts_per_page; ?>" data-currentPg="1" class=" text-black post-list row row-cols-1 row-cols-sm-1 row-cols-md-<?php echo $cols; ?> g-3
        <?php echo  $getPosts ?   'get_posts_wrap' :  'get_pages_wrap'  ?>">

        <?php 
          while ( $the_query->have_posts() ) : $the_query->the_post(); 
            $post     = get_post();
            echo get_template_part('/inc/parts/card', 'latespost'); 
          endwhile; 
         ?>
      </div>

    </div>
  </div>
  <?php endif; ?>

  <div class="text-center title">
    <button class='my-5 load-more-post rs_link_underline m-auto'> Load more articles </button>
  </div>
</main>



<?php get_footer(); ?>
