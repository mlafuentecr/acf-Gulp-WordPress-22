<?php
/*
Template Name: University
 */
defined('ABSPATH') || exit;
get_header();

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pagefields = get_fields();
$logo       = get_field('logo_repeater', 'option');

$args = array(
 'post_type'       => 'university',
 'university_type' => $pagefields['university_type'],
 'posts_per_page'  => -1,
 'post_status'     => 'publish',
 'orderby'         => 'chapter_number',
 'order'           => 'ASC',
);
$query = new WP_Query($args);

?>
<div id="university" class="intern-pg">

  <!-- 0 banner -->
  <section class="intro-banner " style="background-image: url(<?php echo $pagefields['first_background']['url']; ?>);">
    <div class="container-xl">
      <div class="row">
        <article class="headline">
          <?php if ($pagefields['first_heading']): ?>
          <h1><?php echo $pagefields['first_heading']; ?></h1>
          <?php endif; ?>
          <p class="section-1__p"><?php echo $pagefields['first_text']; ?></p>
          <a href="#resources"
            class="section-1_link button button-outline"><?php echo $pagefields['first_link_title'] ?></a>
        </article>
      </div>
    </div>
  </section>



  <!-- sec2  2 Logos -->
  <?php get_template_part('/inc/parts/slider_logos'); ?>
  <!--  /.  2 Logos  -->



  <!-- sec3 SOC 2 repor-->
  <section id="resources" class="content-list soc-2">
    <div class="container-xl">
      <div class="row">

        <div class="box">
          <h2><?php echo $pagefields['second_heading']; ?> </h2>
          <div class="content"><?php echo $pagefields['second_text']; ?> </div>
          <a href="<?php echo $pagefields['second_link']["url"]; ?> " class="primary large button button-purple">
            <?php echo $pagefields['second_link']["title"]; ?>
          </a>
        </div>

        <div class="bg-lines2"> </div>
        <div class="hexagon"> </div>
        <div class="hexagon-purple"> </div>
        <div class="hexagon-purple-light"> </div>
        <div class="hexagon-lines"> </div>

      </div>
    </div>
  </section>




  <div class="container ">
    <div class="row">
      <ul class="post-list">
        <?php if ($query->have_posts()): ?>
        <?php while ($query->have_posts()): ?>
        <?php $query->the_post(); ?>
        <?php $post_fields = get_fields(); $id = get_the_ID(); ?>

        <div class="box">
          <div class="_card">
            <div class="card-icon">
              <figure class="figure">
                <img src="<?php echo $post_fields['icon']['url']; ?>" alt="Icon">
              </figure>
            </div>
            <h3 class="title">
              <?php echo $post_fields['first_heading']; ?>
            </h3>
            <div class="content">
              <?php the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="arrow card-link">
              Learn more
            </a>
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </ul>

    </div>
  </div>
</div>

</div>


<?php get_footer(); ?>
