<?php
/*
Template Name: blog
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$pageFields      = get_fields();
$post_feature_id = get_field('featured_blog_post');

$requestCat = $_GET['category'] ? $_GET['category'] : null;
$searchData = $_GET['search'] ? $_GET['search'] : null;
$pageId     = get_queried_object_id();
$postFields = get_fields($post_feature_id);
$paged      = (get_query_var('paged')) ? get_query_var('paged') : 1;
$categories = get_categories();

//Look for custom title if not get post title
$postTitle = get_the_title($post_feature_id);
function postTitle($postTitle)
{
 if (get_field('title', $post_feature_id)) {
  echo '<h1>' . get_field('title', $post_feature_id) . '</h1>';
 } else {
  echo '<h1>' . $postTitle . '</h1>';
 }
}

/*------------------------------------------*/
/*  Query['preview_content']
/*------------------------------------------*/
// Full wp pagination example
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if (!$searchData) {

 $args = array(
  'post_type'      => 'post',
  'category_name'  => $requestCat,
  'posts_per_page' => 9,
  'paged'          => $paged,
  'post_status'    => 'publish',
  'post__not_in'   => array($post_feature_id),
  'meta_query'     => array(
   array('key' => 'post_type', 'value' => $pageFields['relationship'], 'compare' => 'LIKE'),
  ),
 );
 $query = new WP_Query($args);
} else {
 $argsOne = array(
  'post_type'      => 'post',
  'category_name'  => $requestCat,
  'posts_per_page' => -1,
  'paged'          => $paged,
  'post_status'    => 'publish',
  's'              => $searchData,
  'meta_query'     => array(
   array('key' => 'post_type', 'value' => $pageFields['relationship'], 'compare' => 'LIKE'),
  ),
 );
 $argsTwo = array(
  'post_type'      => 'post',
  'category_name'  => $requestCat,
  'posts_per_page' => -1,
  'paged'          => $paged,
  'post_status'    => 'publish',
  'meta_query'     => array(
   'relation' => 'AND',
   array('key' => 'preview_content', 'value' => $searchData, 'compare' => 'LIKE'),
   array('key' => 'post_type', 'value' => $pageFields['relationship'], 'compare' => 'LIKE'),
  ),
 );
 $queryOne          = new WP_Query($argsOne);
 $queryTwo          = new WP_Query($argsTwo);
 $query             = new WP_Query();
 $query->posts      = array_unique(array_merge($queryOne->posts, $queryTwo->posts), SORT_REGULAR);
 $query->post_count = count($query->posts);
}

function catGroup()
{
 foreach ((get_the_category())  as  $key => $category) {
   $key >1 ? $com=',': $com='';
  if ($category->name !== 'Blog') {
   echo '<span  >' . $com. ' '.$category->name ." </span>";
  }
 }
}
function catName()
{
 $arr = '';
 foreach ((get_the_category()) as $category) {
  if ($category->name !== 'Blog') {
   $arr .= $category->slug . ' ';
  }
 }
 return $arr;
}
function truncate($str, $width)
{
 return strtok(wordwrap($str, $width, "...\n"), "\n");
}

?>

<div id="blog-pg" class="intern-pg">



  <section class="group intro-banner">
    <div class="container-xl">

      <div class="row">

        <article class="content">

          <p class='subtitle'><?php echo $pageFields['blog_intro_title']; ?></p>
          <?php postTitle($postTitle); ?>
          <?php if ($postFields['preview_content']): ?>
          <p class="banner-content"> <?php echo $postFields['preview_content']; ?></p>
          <?php endif; ?>

          <a href="<?php echo get_permalink($post_feature_id) ?>" class="arrow">
            <?php echo $pageFields['link_name_full_post'] ?>
          </a>

        </article>
        <div class="picture">
          <?php echo get_the_post_thumbnail($post_feature_id, 'large'); ?>
        </div>
      </div>
    </div>
  </section>



  <!-- DESKTOP MENU -->
  <div class="container moveup">
    <div class="row ">
      <ul class="box desktop menu ">

        <li class="labelMenu">
          Category: <?php if ($requestCat): ?>
          <?php echo get_category_by_slug($requestCat)->name; ?>
          <?php else: ?>
          <span>All</span>
          <?php endif; ?>
        </li>

        <li class="post-cat__item">
          <a href="<?php echo get_page_link($pageId) ?>"
            class="post-cat__link <?php if (!$requestCat && !$searchData): echo 'active';endif; ?>">
            All
          </a>
        </li>

        <?php foreach ($categories as $category): if ($category->slug !== 'blog'): ?>
        <li class="post-cat__item">
          <a href="<?php echo get_page_link($pageId) . '?category=' . $category->slug ?>"
            class="post-cat__link <?php if ($requestCat == $category->slug && !$searchData): echo 'post-cat__link_active';endif; ?>">
            <?php echo $category->name ?>
          </a>
        </li>
        <?php endif;endforeach; ?>


        <div class="post-cat__search">
          <?php include get_template_directory() . '/inc/parts/searchform-blog.php'; ?>
        </div>
        <div class="btnClose">

        </div>

      </ul>
    </div>
  </div>





  <div class="container mb-5">
    <div class="row">

      <?php

if ($query->have_posts()) {
 echo '<ul class="post-list">';
 while ($query->have_posts()) {
  $query->the_post();
  $post_id     = get_the_ID();
  $page_fields = get_fields();

  echo '<li class="box ' . catName() . '" >
                  <figure>
                      ' . get_the_post_thumbnail($post_id, 'medium') . '
                  </figure>
                  <div class="content">
                    <h3>' . get_the_title() . '</h3>
                    <div class="description">' . truncate($page_fields["preview_content"], 160) . '</div>
                    <a  href="' . get_the_permalink() . '" class="arrow">' . $page_fields["cta_text"] . '</a>
                    <div class="cat">';
  catGroup();
  echo '</div> </div> </li>';
 }
 echo '</ul>'; ?>


      <?php if ($query->max_num_pages > 1): ?>
      <div class="block-pagination">
        <?php
        $big = 999999999;
        echo paginate_links(array(
          'mid_size'  => 1,
          'end_size'  => 1,
          'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
          'format'    => '?paged=%#%',
          'current'   => max(1, get_query_var('paged')),
          'prev_text' => __('', 'textdomain'),
          'next_text' => __('', 'textdomain'),
          'total'     => $query->max_num_pages,
        ));

        ?>
      </div>
      <?php endif; ?>

      <?php } else {
 // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
