<?php
get_header();
 
 $pageId = get_queried_object_id();
 $pageFields = get_fields();
 $postFields = get_fields($pageFields['featured_blog_post']);
 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
 $postTitle = get_the_title($pageFields['featured_blog_post']);
 $categories = get_categories();
 $post = get_post();

$postCategories =  wp_get_post_categories($post->ID);
$categoryIds = [];
foreach ($postCategories as $category) {
    $categoryIds[] = $category->cat_ID;
}

$theme = get_field('theme');
if ($theme === 'Light') {
    $class = 'intro_light';
} else if ($theme === 'Dark') {
    $class = 'intro_dark';
} else if ($theme === 'Lighter') {
    $class = 'intro_lighter';
}

?>
<div id="blog-single">

  <section class="intro-banner <?php echo $class ?>">
    <div class="imgWrapper">
      <div class="container-xl intro_wrapper">
        <div class="row">
          <article class="headline narrow">

            <p class="block-intro-plain"><?php echo get_the_category($post->ID)['name']; ?>
              <?php
          foreach (get_the_category($post->ID) as $key => $value) { ?>
              <?php if (count(get_the_category($post->ID)) - 1 != $key) : ?>
              <span><?php echo $value->name ?>&nbsp;&nbsp;/&nbsp;</span>
              <?php else : ?>
              <span><?php echo $value->name ?></span>
              <?php endif ?>
              <?php } ?>
            </p>

            <h1><?php the_title(); ?></h1>

            <div class="banner-content">
              <?php if ($pageFields['author']): ?>
              <div class="author">
                <div class="image" style="background-image: url('<?php echo $pageFields["author"]["photo"] ?>')"></div>
                <p class="name"><?php echo $pageFields['author']['name'] ?></p>
              </div>
              <?php endif; ?>

              <?php if ($pageFields['reading_time']): ?>
              <p class="time">Reading time <?php echo $pageFields['reading_time'] ?></p>
              <?php endif; ?>
            </div>

          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="group block-post article-post">
    <div class="container narrow">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php
        $title = get_field('title');
        $previewContent = get_field('preview_content');
        $link = get_field('cta_text');
        $featImage = get_field('feature_image');
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope
        itemtype="http://schema.org/BlogPosting">
        <div class="post-img"><?php  the_post_thumbnail('full'); ?></div>
        <section class="entry-content" itemprop="text">
          <?php the_content(); ?>
        </section>
      </article>
      <?php endwhile; else : ?>

      <?php get_template_part('inc/parts/content', 'missing'); ?>

      <?php endif; ?>
    </div>
  </section>

  <div class="newsletter">
    <div class="form">
      <!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
      <script charset="utf-8" defer type="text/javascript"
        src="<?php echo get_template_directory_uri(). '/dist/js/hubspot.js' ?>"></script>
      <script>
      document.addEventListener('DOMContentLoaded', () => {
        hbspt.forms.create({
          region: "na1",
          portalId: "7851520",
          formId: "6897e48c-787e-44bb-a1b7-d5acda7c2f37"
        });
      });
      </script>
    </div>

  </div>
