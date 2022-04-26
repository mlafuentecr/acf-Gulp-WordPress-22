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
          foreach( $feature_articles as $post ) {?>
        <?php 
     
          $id = $post->ID;
          ///
          $excerpt              = get_the_excerpt($id);
          $featured_link        = get_permalink($id);
          $featured_img_url     = get_the_post_thumbnail_url($id, 'full'); 
          //Author
          $authorId             = get_post_field('post_author' , $id);
          $user                 = get_userdata($authorId);
          $data                 = get_field('author_info', 'user_'. $authorId);
          
          $name                 = $data['data']['author_name_and_lastname'];
          $author_profession    = $data['data']['author_profession'];
          $author_description   = $data['data']['author_description'];
          $author_picture       = $data['author_picture'];
          $author_url           = get_author_posts_url($authorId);
         
          $cols             = $pageFields['cols'] ?: 3;
          $add_title        = $pageFields['add_title'] ?: true;
          $add_excerpt      = $pageFields['add_excerpt'] ?: true;
          $add_author       = $pageFields['add_author_info'] ?: true;


          echo get_template_part('/inc/parts/card', 'latespost'); 

          
          }
      }
      ?>

      </div>

    </div>
  </section>
