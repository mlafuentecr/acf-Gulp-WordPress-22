<?php 
  // Load values and assign defaults.
  if(is_page( 'Blog' )){
    $id = get_the_ID();
    $pageFields       = get_fields($id);
  }else{
    $pageFields       = get_fields();
  }
  $view_all_articles= $pageFields['view_all_articles']; 
  $add_container    = $pageFields['add_container']; 
  $add_headline     = $pageFields['add_headline']; 
  $margen           = $pageFields['margen']; 
  $headline         = $pageFields['headline'];
  $post_quantity    = $pageFields['post_quantity']-1;
 
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
    'post_status'     => 'publish'
    );

    $the_query = new WP_Query( $args );


if ( $the_query->have_posts() ) : 
   
?>
<div class="get_latest_posts ">

  <div class="container  <?php echo $margen; ?>">
    <!-- if have headline on -->
    <?php if($add_headline): ?>
    <header class='col-12 mt-5 '> <?php echo $headline; ?> </header>
    <?php  endif; ?>
    <div
      class="  row row-cols-1 row-cols-sm-1 row-cols-md-<?php echo $cols; ?> g-3  <?php echo  $getPosts ?   'get_posts_wrap' :  'get_pages_wrap'  ?>">

      <?php 
      while ( $the_query->have_posts() ) : $the_query->the_post(); 
        $post     = get_post();
        echo get_template_part('/inc/parts/card', 'latespost'); 
      endwhile; 
      
      ?>
    </div>

    <div class="col text-center">
      <a class='rs_link_underline m-auto' href="/latest-post/" class="link"> View more articles </a>
    </div>
  </div>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
