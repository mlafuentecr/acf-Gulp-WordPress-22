<?php
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$authorId     =  $curauth->data->ID;
$user         = get_userdata($authorId);
$data         = get_field('author_info', 'user_'. $authorId);

$name                 = $data['data']['author_name_and_lastname'];
$author_profession    = $data['data']['author_profession'];
$author_description   = $data['data']['author_description'];
$author_picture       = $data['author_picture'];

$cols             = $pageFields['cols'] ?: 3;
$add_title        = $pageFields['add_title'] ?: true;
$add_excerpt      = $pageFields['add_excerpt'] ?: true;
$add_author       = $pageFields['add_author_info'] ?: true;


$the_query = new WP_Query( array(
  'author'          => $authorId,
)); 
?>
<section class="author-page card-invert ">

  <header class="author-header">
    <div class="container">
      <div class="row row-cols-1  row-cols-md-2 py-5 ">

        <div class="author-img col-1 col-md-4 text-center ">
          <?php echo  '<img class="rounded-circle" width="185px" src="'. $author_picture['url'] .'" alt="'. $author_picture['alt'] .'" >' ?>
        </div>

        <div class="content col-1 col-md-6 d-flex flex-column justify-content-center">
          <div class="author-name ">
            <h3><?php echo $name; ?></h3>
          </div>
          <div class="author-bio">
            <?php echo $author_profession; ?>
            <dd><?php echo $author_description; ?></dd>
          </div>
        </div>


      </div>
    </div>
  </header><!-- .entry-header -->

  <section class="cards-section py-5">
    <div class="container">
      <p class="h7 text-center my-4 text-black">
        ARTICLES by <?php echo $name; ?>
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
                <div class="title link_main_style links-with-line">
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
              <?php endif; ?>

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

        <?php endwhile;  ?>
      </div>

    </div>
  </section>
</section>
