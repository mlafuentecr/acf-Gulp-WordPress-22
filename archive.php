<?php 

get_header(); 
$categoryName = single_term_title("", false);
?>
<main id="archive" role="main">
  <section class="category-page card-invert bg-white ">

    <header class=" bg-dark text-white">
      <div class="container">
        <div class="row row-cols-1  py-5 ">
          <div class="content col-1 col-md-6 d-flex flex-column justify-content-center">
            <h1 class="entry-title">
              <?php echo 'Currently browsing category '.$categoryName; ?>.
            </h1>
          </div>

        </div>
      </div>
    </header><!-- .entry-header -->

    <section class="cards-section py-5">
      <div class="container">

        <?php 
          $query = new WP_Query( array( 'category_name' => $categoryName ) );
          
          if ( $query->have_posts() ) :
            echo '   <div class="cards-articles"> <div class="row row-cols-1 row-cols-md-3">';
            while ( $query->have_posts() ) :
              $query->the_post();
           ?>

        <div class="col mb-5">
          <div class="card  bg-transparent  ">

            <a class="card-link" href="<?php echo get_permalink(); ?>">
              <div class="card-img mb-4 zoom_img"
                style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
              </div>
            </a>

            <div class="card-body  p-0  ">
              <a class="card-link" href="<?php echo get_permalink(); ?>">
                <div class="title link_main_style text-black"> <?php echo get_the_title(); ?> </div>
              </a>
              <p class="card-text  text-gray"><?php echo wp_trim_words( get_the_excerpt(), 40, '...' ); ?></p>


              <!-- Show Author info -->
              <div class="author mt-3 py-3 d-flex borderY-2">
                <?php 
                  $authorId     = $post->post_author; 
                  $user         = get_userdata($authorId);
                  $data         = get_field('author_info', 'user_'. $authorId);
                  $link         = home_url().'/blog/author/'.$user->user_nicename;
                  
                  $name                 = $data['data']['author_name_and_lastname'];
                  $author_profession    = $data['data']['author_profession'];
                  $author_description   = $data['data']['author_description'];
                  $author_picture       = $data['author_picture'];
                  ?>
                <div class="author_pic px-2" style="background-image: url(<?php echo $author_picture['url']; ?>);">
                </div>
                <div class="px-2 flex-grow-1 ">
                  <div class="col-12 author_name"><a href="<?php echo $link; ?>" target="_blank"
                      rel="noopener noreferrer"><?php echo $name; ?></a>
                  </div>

                  <div class="author_data d-flex">
                    <div class="author_date"><?php echo date("F j, Y", strtotime($post->post_date)) . "<br>"; ?></div>
                    <div class="author_time_reading"> <?php echo get_field( 'time_estimation', $post->ID) ?: '5'; ?>
                      min read
                    </div>

                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>

        <?php 
          endwhile; 
          echo '   </div> </div>';

          wp_reset_postdata();
        endif; 
        ?>

      </div>
    </section>
  </section>
</main>

<?php get_footer(); ?>
