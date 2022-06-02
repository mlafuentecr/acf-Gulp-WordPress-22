<?php
/*---------------------------------------------------------*/
/*  
/*---------------------------------------------------------*/
$pageFields = get_fields();
//If dont fin color in acf then use defaulth put it in a css variable datacolor is for menu color
$blog_headline_bg_color = $pageFields['blog_headline_background_color'] ?: '#F66252';

$cols             = $pageFields['cols'] ?: 3;
$add_title        = $pageFields['add_title'] ?: true;
$add_excerpt      = $pageFields['add_excerpt'] ?: true;
$add_author       = $pageFields['add_author_info'] ?: true;



get_header();


$term = get_queried_object();
$the_query = new WP_Query( array(
     'tag_id' => $term->term_id,
  )); 
  //how many articles
  $count = $the_query->found_posts;
?>

<main id="primary">

  <section class="author-page card-invert ">

    <header class="author-header">
      <div class="container">
        <div class="row row-cols-1  row-cols-md-2 py-5 ">
          
          <h1>TAG: <?php echo $term->name; ?></h1>
        </div>
      </div>
    </header><!-- .entry-header -->

    <section class="cards-section py-5">
      <div class="container">
        <p class="h7 text-center my-4 text-black">
          Other articles you might like :
        </p>

        <div
          class="row row-cols-1 row-cols-sm-1 row-cols-md-<?php echo $cols; ?> g-3  <?php echo  $getPosts ?   'get_posts_wrap' :  'get_pages_wrap'  ?>">
         
          <?php 
          
  while ( $the_query->have_posts() ) : $the_query->the_post(); 
      //acf
      $excerpt  = get_the_excerpt();
      //wp
      $post     = get_post();
      ?>

          <div class="col my-5">


            <?php 
     $image_id = get_post_thumbnail_id( $post->ID );
     $alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
    ?>
            <div class="card post-<?php echo $post->ID; ?> bg-transparent ">
              <a class="card-link " href="<?php echo  get_permalink(  $post->ID ); ?>" rel="noopener noreferrer">
                <div class="card-img mb-4 zoom_img" role="img" aria-label="<?php echo $alt_text; ?>"
                  style="background-image: url(<?php   echo get_the_post_thumbnail_url( $post->ID ); ?>);">
                </div>
              </a>

              <div class="card-body  p-0  ">
                <?php if($add_title): ?>
                <a class="card-link text-gray" href="<?php echo   get_permalink(   $post->ID ); ?>"
                  rel="noopener noreferrer">
                  <div class="title link_main_style links-with-line text-black">
                    <?php  echo $post->post_title; ?>
                  </div>
                </a>
                <?php endif; ?>

                <!-- Show excerpt -->
                <div class="content text-gray">
                  <?php 
            if($add_excerpt):
            if( $pageFields['small_description']['excerpt'] ){
              echo $pageFields['small_description']['excerpt'];
            }else{
              echo $excerpt;
            }
            endif;
            ?>
                </div>

                <!-- Show Author info -->
                <?php  if($add_author): ?>
                <div class="author mt-3 py-4 d-flex borderY-2 ">
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

                    <div class="col-12 author_name">
                      <a href="<?php echo $author_url;  ?>" target="_blank"
                        rel="noopener noreferrer"><?php echo $name; ?>
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
                <?php endif; ?>

                <?php 
            //  <!-- Show TAGS NEW -->
            //get_template_part( 'inc/parts/list', 'tags' );
            ?>

            <?php 
              // Show Categories 
            // set_query_var( 'postId', absint( $post->ID ) ); 
            // get_template_part( 'inc/parts/list', 'categories' ); 
            ?> 


              </div>
              <!-- end card-body -->
            </div>
            <!-- end card -->

          </div>

          <?php  endwhile;  ?>
        </div>

      </div>
    </section>

    <div class="col-12  m-auto py-5 text-center text-black">
      <a aria-label="latest post" class='rs_link_underline m-auto text-black' href="/latest-post/" class="link">
        View Latest Posts</a>
    </div>
  </section>


</main><!-- #main -->



<?php 
    wp_reset_postdata();
    get_sidebar();
    get_footer();
?>
