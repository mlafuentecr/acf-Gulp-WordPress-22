  <!-- feature article -->
  <?php 
  $pageFields = get_fields($GLOBALS['blog']);
  $features_articles_col  = $pageFields['features_articles_columns'] ?: 2;
  $feature_articles       = $pageFields['feature_articles'];
  $article_title          = $pageFields['article_title'];
  $view_all_articles      = $pageFields['view_all_features_articles'];
  ?>
  <section class="feature_article my-5">
    <div class="container">
      <h3 class='smalltitle mb-5 col-12'><?php echo $pageFields['article_title']; ?></h3>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-<?php echo $features_articles_col; ?>">
        <?php 
      if( $feature_articles ) {
          foreach( $feature_articles as $row ) {?>
        <?php 
     
          $post_id = $row->ID;
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
        <?php }
      }
      ?>

      </div>

    </div>
  </section>
