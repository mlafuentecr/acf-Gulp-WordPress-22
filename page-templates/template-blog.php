<?php
/*
Template Name:  Blog
 */
defined('ABSPATH') || exit;
get_header();

/*---------------------------------------------------------*/
/*  ACF Page our-value
/*---------------------------------------------------------*/
$pageFields               = get_fields();
$blog_headline_bg_color   = $pageFields['blog_headline_background_color'] ?: 'black';
$blog_headline_height     = $pageFields['blog_headline_hight'] ?: '600px';
$blog_headline_text_color = $pageFields['blog_headline_text_color'] ?: 'white';
$feature_article          = $pageFields['feature_article'];

//Feature post
$feature_article_id = $feature_article[0]->ID;
$excerpt            = get_the_excerpt($feature_article_id);
$feature_date       = get_the_date('dS M Y', $feature_article_id);
$featured_link      = get_permalink($feature_article_id);
//Author

$authorId = $feature_article[0]->post_author;
$user     = get_userdata($authorId);
$data     = get_field('author_info', 'user_' . $authorId);

$name               = $data['data']['author_name_and_lastname'];
$author_profession  = $data['data']['author_profession'];
$author_description = $data['data']['author_description'];
$author_picture     = $data['author_picture'];
$author_url         = get_author_posts_url($authorId);

// The Query for lates article
$args = array(
 'posts_per_page' => $post_quantity - 1,
 'post__not_in'   => array($feature_article_id),
 'orderby'        => 'post_date',
 'order'          => 'DESC',
 'post_type'      => 'post',
 'post_status'    => 'publish',
);

$the_query = new WP_Query($args);

?>


<main id="blog" style="color: <?php echo $blog_headline_text_color; ?>;  ">


  <header class='main-header getColor' style='background-color:<?php echo $blog_headline_bg_color; ?>'
    data-color='<?php echo $blog_headline_bg_color; ?>'>
    <div class='container'>
      <div class="row  row-cols-1  row-cols-md-2 d-flex flex-wrap align-content-center justify-content-center "
        style="min-height:<?php echo $blog_headline_height; ?>px;">
        <div class="col my-5 d-flex  justify-content-around flex-column">
          <div class="taglist col-12 col-md-10 text-white">
            <?php
set_query_var('postId', $feature_article_id);
echo get_template_part('/inc/parts/list', 'tags');
?>
          </div>
          <h1 class="my-2">
            <a class='links-with-line' href="<?php echo $featured_link; ?>">
              <?php echo $feature_article[0]->post_title; ?>
            </a>
          </h1>

          <?php if ($excerpt): ?><div class="excerpt"><?php echo $excerpt; ?></div><?php endif; ?>


          <div class="author-info d-flex">
            <a href="<?php echo $author_url; ?>">
              <div class="author-img ">
                <img class='lazyload rounded-circle' src='<?php echo $author_picture['url']; ?>'
                  alt='<?php echo $name; ?>' />
              </div>
              <div class="author-name-date mx-3">
                <p class="author-name m-0 p-0"><?php echo $name; ?></p>
                <div class="author-post-date m-0 p-0">

                  <div class="author_date"><?php echo date("F j, Y", strtotime($feature_date)) . " - "; ?></div>
                  <div class="author_time_reading">
                    <?php echo ' ' . get_field('time_estimation', $feature_article_id) ?: '5'; ?> min
                    read
                  </div>


                </div>
              </div>
            </a>
          </div>



        </div>
        <div class="col my-5  d-flex align-items-center align-content-center">
          <a href="<?php echo $featured_link; ?>">
            <?php echo get_the_post_thumbnail($feature_article_id, 'full'); ?>
          </a>
        </div>
      </div>
    </div>
  </header>

  <!-- //getlatespost -->
  <div class="container  ">
    <h3 class="smalltitle my-5 col-12">LATEST ARTICLES </h3>
    <?php get_template_part("/inc/parts/content", "latespost"); ?>
  </div>

  <!-- //Newsletter -->
  <?php echo $pageFields['news_letter']; ?>

  <!-- feature article -->
  <?php echo get_template_part('/inc/parts/content', 'featureArticle'); ?>


  <!-- Meet the TEam -->
  <?php echo get_template_part('/inc/parts/slider', 'authorQuery'); ?>

  <!-- GET FORM -->
  <div class="bg-black">
    <?php get_template_part("/inc/parts/content", "form"); ?>
  </div>




</main>

<?php get_footer(); ?>
