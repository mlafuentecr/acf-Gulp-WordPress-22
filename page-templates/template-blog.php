<?php
/*
Template Name:  Blog
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*---------------------------------------------------------*/
/*  ACF Page our-value
/*---------------------------------------------------------*/
$pageFields = get_fields();
$blog_headline_bg_color = $pageFields['blog_headline_background_color'] ?: 'black';
$blog_headline_height = $pageFields['blog_headline_hight'] ?: '600px';
$blog_headline_text_color = $pageFields['blog_headline_text_color'] ?: 'white';
$feature_article = $pageFields['feature_article'];

//Feature post
$feature_article_id = $feature_article[0]->ID;
$excerpt = get_the_excerpt($feature_article_id);
$feature_date = get_the_date( 'dS M Y', $feature_article_id );
$featured_link =  get_permalink($feature_article_id);
//Author
$author_id = $feature_article[0]->post_author;
$user_info = get_userdata($author_id);
$user_name = $user_info->display_name;
$user_email = $user_info->user_email;
$author_url = get_author_posts_url($author_id);
$author_Img_url = get_avatar_url( get_the_author_meta( $author_id  ), 90 );


 // The Query
 $args = array(
  'posts_per_page'  => $post_quantity-1, 
  'post__not_in' => array($feature_article_id),
  'orderby'         => 'post_date',
  'order'           => 'DESC',
  'post_type'       => 'post', 
  'post_status'     => 'publish'
  );

  $the_query = new WP_Query( $args );
?>

<main id="blog" style="color: <?php echo $blog_headline_text_color; ?>;  ">


  <header class='main-header ' style='background-color:<?php echo $blog_headline_bg_color; ?>'
    data-color='<?php echo $blog_headline_bg_color; ?>'>
    <div class='container'>
      <div class="row  row-cols-1  row-cols-md-2 d-flex flex-wrap align-content-center justify-content-center "
        style="min-height:<?php echo $blog_headline_height; ?>px;">
        <div class="col my-5 d-flex  justify-content-around flex-column">

          <h1 class="mb-5">
            <a class='links-with-line' href="<?php echo $featured_link; ?>">
              <?php echo $feature_article[0]->post_title; ?>
            </a>
          </h1>

          <?php if($excerpt): ?><div class="excerpt"><?php echo $excerpt ; ?></div><?php endif; ?>

          <div class="author-info d-flex mt-5">
            <a href="<?php echo $author_url; ?>">
              <div class="author-img ">
                <img class='lazyload rounded-circle' src='<?php echo $author_Img_url; ?>'
                  alt='<?php echo $user_nicename; ?>' />
              </div>
              <div class="author-name-date mx-3">
                <p class="author-name m-0 p-0"><?php echo $user_name; ?></p>
                <p class="author-post-date m-0 p-0">

                <div class="author_date"><?php echo date("F j, Y", strtotime($feature_date)) . " - "; ?></div>
                <div class="author_time_reading">
                  <?php echo ' '. get_field( 'time_estimation', $feature_article_id) ?: '5'; ?> min
                  read
                </div>


                </p>
              </div>
            </a>
          </div>



        </div>
        <div class="col my-5  d-flex align-items-center align-content-center">
          <a href="<?php echo $featured_link; ?>">
            <?php echo get_the_post_thumbnail( $feature_article_id, 'full' ); ?>
          </a>
        </div>
      </div>
    </div>
  </header>


  <?php 
  //LATES POSTS
get_template_part("/inc/parts/loops/loop-getlatespost");
?>


</main>

<?php get_footer(); ?>
