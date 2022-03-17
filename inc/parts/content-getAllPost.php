<?php 
 
$pageFields       = get_fields();
$view_all_articles= $pageFields['view_all_articles']; 
$add_container    = $pageFields['add_container']; 
$add_headline     = $pageFields['add_headline']; 
$margen           = $pageFields['margen']; 
$headline         = $pageFields['headline'];
$add_excerpt      = $pageFields['add_excerpt'];
$cols             = $pageFields['cols'];
$post_quantity    = $pageFields['post_quantity'];

$add_title        = $pageFields['add_title'];
$add_excerpt      = $pageFields['add_excerpt'];
$add_author       = $pageFields['add_author_info']; 


// The Query
$args = array(
  'posts_per_page'  => 3, 
  'orderby'         => 'post_date',
  'order'           => 'DESC',
  'post_type'       => 'post', 
  'post_status'     => 'publish'
  );

  $the_query = new WP_Query( $args );
 

?>

<h1>HACER UN JS QUE CARGUE AL SCROLL</h1>
<main class="bg-white post-list" data-page="<?php echo $post_quantity  ? get_query_var('paged') : 1;  ?>"
  data-max="<?php echo $wp_query->max_num_pages;  ?>">
  <header class=" bg-dark text-white">
    <div class="container">
      <div class="row row-cols-1  py-5 ">
        <div class="content col-1 col-md-6 d-flex flex-column justify-content-center">
          <h1 class="entry-title">
            <?php the_title(  ); ?>
          </h1>
        </div>
      </div>
    </div>
  </header><!-- .entry-header -->

  <div class="container py-5">
    <div
      class="postInsert row row-cols-1  row-cols-md-3 g-3  <?php echo  $getPosts ?   'get_posts_wrap' :  'get_pages_wrap'  ?>">
      <?php 
      if ( $the_query->have_posts() ) : 
    while ( $the_query->have_posts() ) : $the_query->the_post(); 
        $post     = get_post();
        echo get_template_part('/inc/parts/card', 'getlatespost'); 
       endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>

    <button type="button" class="btn btn-primary load-more-post"> Load More</button>


</main>
