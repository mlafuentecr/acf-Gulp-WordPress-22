<?php get_header(); ?>

<main class="bg-white text-black pg-404" role="main">
  <div class="container py-5">
    <div class="d-flex flex-wrap justify-content-between text-white my-5">





      <?php if ( have_posts() ) : ?>
      <header class="header">
        <h1 class="entry-title text-black mb-5 ">
          <?php printf( esc_html__( 'Search Results for: %s', 'rootstrap' ), get_search_query() ); ?></h1>
      </header>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php 
          $post_id = get_the_ID();
          ///
          $excerpt              = get_the_excerpt($post_id);
          $featured_link        = get_permalink($post_id);
          $featured_img_url     = get_the_post_thumbnail_url($post_id, 'full'); 
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


        <div class="card mb-5 ">

          <a class="card-link" href="<?php echo  get_permalink( $post_id ); ?>" rel="noopener noreferrer">
            <div class="card-img mb-4 zoom_img" style="background-image: url(<?php echo $featured_img_url; ?>);">
            </div>
          </a>

          <div class="card-body  p-0  ">

            <a class="card-link text-gray" href="<?php echo  get_permalink( $post_id ); ?>" rel="noopener noreferrer">
              <div class="title link_main_style text-black links-with-line  ">
                <?php echo $row->post_title; ?>
              </div>
            </a>

            <!-- Show excerpt -->
            <div class="content text-gray"> <?php echo  $excerpt; ?></div>
            <!-- Show Author info -->
            <div class="author  py-4 d-flex ">

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
          </div>

          <!-- end card-body -->
        </div>

        <?php endwhile; ?>
      </div>
      <div class="nav nav-tag d-flex col-12">
        <?php get_template_part( 'inc/parts/nav', 'below' ); ?>
      </div>
      <?php else : ?>

      <article id="post-0" class="post no-results not-found">
        <header class="header">
          <h1 class="entry-title" itemprop="name"><?php esc_html_e( 'Nothing Found', 'blankslate' ); ?></h1>
        </header>
        <div class="entry-content" itemprop="mainContentOfPage">
          <p><?php esc_html_e( 'Sorry, nothing matched your search. Please try again.', 'blankslate' ); ?></p>
          <?php get_search_form(); ?>
        </div>
      </article>
      <?php endif; ?>


    </div>
  </div>
</main>
<?php get_footer(); ?>
