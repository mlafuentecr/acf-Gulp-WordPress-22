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
<main class="bg-white post-list" data-page="<?php echo get_query_var('paged') ? get_query_var('paged') : 1;  ?>"
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
    <div class="row row-cols-1  row-cols-md-3 g-3  <?php echo  $getPosts ?   'get_posts_wrap' :  'get_pages_wrap'  ?>">
      <?php 
      if ( $the_query->have_posts() ) : 
    while ( $the_query->have_posts() ) : $the_query->the_post(); 
        //acf
        $excerpt  = get_the_excerpt();
        //wp
        $post     = get_post();
        ?>

      <div class="col my-5">

        <div class="card post-<?php echo $post->ID; ?> bg-transparent ">
          <a class="card-link " href="<?php echo  get_permalink(  $post->ID ); ?>" rel="noopener noreferrer">
            <div class="card-img mb-4 zoom_img"
              style="background-image: url(<?php   echo get_the_post_thumbnail_url( $post->ID ); ?>);">
            </div>
          </a>

          <div class="card-body  p-0  ">

            <a class="card-link text-gray" href="<?php echo   get_permalink(   $post->ID ); ?>"
              rel="noopener noreferrer">
              <div class="title text-dark link_main_style links-with-line">
                <?php  echo $post->post_title; ?>
              </div>
            </a>


            <!-- Show excerpt -->
            <div class="content text-gray">
              <?php 
             
              if( $pageFields['small_description']['excerpt'] ){
                echo $pageFields['small_description']['excerpt'];
              }else{
                echo $excerpt;
              }
            
              ?>
            </div>

            <!-- Show Author info -->

            <div class="author mt-3 py-4 d-flex borderY-2">
              <?php  
                $post_id = $row->ID;
                   //Author
                $authorId             = get_post_field('post_author' , $post_id);
                $user                 = get_userdata($authorId);
                $data                 = get_field('author_info', 'user_'. $authorId);
                
                $name                 = $data['data']['author_name_and_lastname'];
                $author_profession    = $data['data']['author_profession'];
                $author_description   = $data['data']['author_description'];
                $author_picture       = $data['author_picture'];
                $author_url           = get_author_posts_url($authorId);
              
              
              ?>
              <div class="author_pic px-2" style='background-image: url("<?php echo $author_picture['url']; ?>");'>
              </div>

              <div class="px-2 flex-grow-1 ">

                <div class="col-12 author_name text-black">
                  <a href="<?php echo $author_url;  ?>" target="_blank" rel="noopener noreferrer"><?php echo $name; ?>
                  </a>
                </div>

                <div class="author_data d-flex">
                  <div class="author_date">
                    <?php echo date("F j, Y", strtotime($post->post_date)) . "<br>"; ?>
                  </div>
                  <div class="author_time_reading">
                    <?php echo get_field( 'time_estimation', $post->ID) ?: '5'; ?> min read
                  </div>
                </div>

              </div>
            </div>


            <!-- Show Categories -->
            <div class="categories mt-3">
              <?php 
                $categories = get_the_category( $post->ID );
                if ( ! empty( $categories ) ) {
                    foreach( $categories as $category ) {
                      echo '<a href="'. get_category_link( $category->term_id ) .'"  alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"target="_blank" rel="noopener noreferrer">' . esc_html( $category->name ) . '</a>';
                    }
                  }
                ?>
            </div>

          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>


      <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>

    <button type="button" class="btn btn-primary load-more-post"> Load More</button>


</main>
