<?php
/*
Template Name: University Post
*/

$page_fields = get_fields();
$chapter_types = get_the_terms($post->ID, 'university_type');
$chapter_type  = array_shift($chapter_types);


$args = array(
    'post_type' => 'university',
    'university_type' => $chapter_type->slug,
    'posts_per_page'   => -1,
    'post_status' => 'publish',
    'orderby' => 'chapter_number',
    'order'      => 'ASC',
    'meta_query'    => array(
        array( 'key' => 'chapter_number', 'value' => $page_fields['chapter_number']+1, 'compare' => '>' )
    )
);
$query = new WP_Query($args);

$args_next = array(
    'post_type' => 'university',
    'university_type' => $chapter_type->slug,
    'posts_per_page'   => -1,
    'post_status' => 'publish',
    'orderby' => 'chapter_number',
    'order'      => 'ASC',
    'meta_query'    => array(
        array( 'key' => 'chapter_number', 'value' => $page_fields['chapter_number']+1, 'compare' => '==' )
    )
);
$query_next = new WP_Query($args_next);


// var_dump($query_next);

get_header(); ?>
<div id='university-intern'>

  <!-- 0 banner -->
  <section class="intro-banner " style="background-image: url(<?php echo $page_fields['first_background']['url']; ?>);">
    <div class="container">
      <div class="row">
        <article class="headline">

          <div class="label"> <?php echo $page_fields['first_label']; ?></div>

          <?php if ($page_fields['first_heading']): ?>
          <h1><?php echo $page_fields['first_heading']; ?></h1>
          <?php endif; ?>

          <p class="section-1__p"><?php echo $page_fields['first_text']; ?></p>

        </article>
      </div>
    </div>
  </section>


  <!-- contentnt -->
  <section class="content">
    <div class="container">
      <div class="row">

        <div class="nav col-md-3 col-sm-12 d-sm-none d-md-block">
          <ul>
            <?php foreach ($page_fields['second_content'] as $key=>$link) : ?>
            <li class="nav-li">
              <a href="#<?php echo $link['anchor']; ?>" class="nav-link">
                <?php echo $link['title']; ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="main col-md-9  col-sm-12">
          <?php foreach ($page_fields['second_content'] as $key=>$p) : ?>
          <div class="chapter">
            <div id="<?php echo $p['anchor']; ?>" class="_anchor"></div>

            <h2 class="title">
              <?php echo $p['title']; ?>
            </h2>
            <div class="p-university-post-sec-2__content">
              <?php echo $p['text']; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>


  <!-- soc2 -->

  <?php if ($query_next->have_posts()): ?>
  <?php while ($query_next->have_posts()): ?>
  <?php $query_next->the_post(); ?>
  <?php $post_fields = get_fields(); $id = get_the_ID(); ?>
  <?php if ($post_fields['chapter_number'] == $page_fields['chapter_number'] +1):?>

  <section class="soc-2">
    <div class="grid-container">
      <figure class="shape-container">
        <img src="<?php echo $post_fields['icon']['url']; ?>" alt="Icon" class="p-university-post-sec-3__shape">
      </figure>
      <h2 class="p-university-post-sec-3__h2">
        <?php echo $post_fields['first_heading']; ?>
      </h2>
      <a href="<?php the_permalink(); ?>" class="button button-purple">
        Keep Reading
      </a>
    </div>
  </section>

  <?php endif; endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>


  <!-- jump -->

  <?php if ($query->have_posts() && $query_next->have_posts()): ?>
  <section class="p-university-post-sec-4">
    <div class="grid-container">
      <div class="p-university-post-sec-4__content">
        <div class="p-university-post-sec-4__links">
          <div class="p-university-post-sec-4__label">
            Jump to a section:
          </div>

          <?php if ($query->have_posts()): $p_index=0;?>
          <?php while ($query->have_posts()): ?>
          <?php $query->the_post(); ?>
          <?php $post_fields = get_fields(); $id = get_the_ID(); ?>


          <a data-chapter="chapter-<?php echo $id; ?>" href="<?php the_permalink(); ?>" class="p-university-post-sec-4__link <?php if ($p_index == 0) {
    echo  'p-university-post-sec-4__link_active';
}?>">
            <span>
              <?php if ($post_fields['chapter_number']<10) {
    echo '0';
} ?><?php echo $post_fields['chapter_number'] ?>
            </span>

            <?php echo $post_fields['first_heading']; ?>
          </a>

          <?php $p_index++; endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
        <div class="p-university-post-sec-4__cards">
          <?php if ($query->have_posts()): $p_index=0;?>
          <?php while ($query->have_posts()): ?>
          <?php $query->the_post(); ?>
          <?php $post_fields = get_fields(); $id = get_the_ID(); ?>


          <div id="chapter-<?php echo $id; ?>" class="p-university-post-sec-4__card-container 
                                <?php if ($p_index == 0) {
    echo  'p-university-post-sec-4__card-container_active';
}?> p-university-section-4__card-container">
            <div class="p-university-section-4__card">
              <div class="p-university-section-4__card-icon">
                <figure class="p-university-section-4__card-figure">
                  <img src="<?php echo $post_fields['icon']['url']; ?>" alt="Icon">
                </figure>
              </div>
              <h3 class="p-university-section-4__card-title">
                <?php echo $post_fields['first_heading']; ?>
              </h3>
              <p class="p-university-section-4__card-p">
                <?php the_excerpt(); ?>
              </p>
            </div>
          </div>

          <?php $p_index++; endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>

          <img src="<?php echo get_template_directory_uri(); ?>/inc/images/shape-hexagon-o-b.svg" alt="Shape"
            class="p-university-post-sec-4__cards-shape">
        </div>
      </div>

      <div class="p-university-post-sec-4__accordion">
        <div class="p-university-post-sec-4__label">
          Jump to a section:
        </div>

        <?php if ($query->have_posts()): ?>
        <?php while ($query->have_posts()): ?>
        <?php $query->the_post(); ?>
        <?php $post_fields = get_fields(); $id = get_the_ID(); ?>


        <div class="p-university-post-sec-4__accordion-row">
          <div class="p-university-post-sec-4__accordion-title">
            <span>
              <?php if ($post_fields['chapter_number']<10) {
    echo '0';
} ?><?php echo $post_fields['chapter_number'] ?>
            </span>

            <?php echo $post_fields['first_heading']; ?>
          </div>
          <div class="p-university-post-sec-4__accordion-content">
            <div class="p-university-post-sec-4__card-container p-university-section-4__card-container">
              <div class="p-university-section-4__card">
                <div class="p-university-section-4__card-icon">
                  <figure class="p-university-section-4__card-figure">
                    <img src="<?php echo $post_fields['icon']['url']; ?>" alt="Icon">
                  </figure>
                </div>
                <h3 class="p-university-section-4__card-title">
                  <?php echo $post_fields['first_heading']; ?>
                </h3>
                <p class="p-university-section-4__card-p">
                  <?php the_excerpt(); ?>
                </p>
                <a href="<?php the_permalink(); ?>" class="p-university-section-4__card-link">
                  Learn more
                </a>
              </div>
            </div>
          </div>
        </div>

        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>

    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/university/jump-sect-left-shapes.svg" alt="Shape"
      class="p-university-post-sec-4__shape p-university-post-sec-4__shape_left">

    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/university/jump-sect-right-shape.svg" alt="Shape"
      class="p-university-post-sec-4__shape p-university-post-sec-4__shape_right">
  </section>
  <?php endif; ?>


  <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'category_name' => $chapter_type->slug,
            'post_status' => 'publish'
        );
        $query = new WP_Query($args);

    ?>
  <?php if ($query->posts): ?>
  <section class="p-university-post-sec-5 block-others-posts">
    <div class="p-university-post__grid grid-container">

      <div class="block-others-posts__wrap">
        <div class="post-list">
          <div class="post-list__container grid-container">
            <h2 class="block-others-posts__title">Related posts</h2>
            <div class="post-list__row">
              <?php while ($query->have_posts()) : $query->the_post(); ?>

              <?php $postFields = get_fields(); ?>
              <article class="card-a">
                <a href="<?php the_permalink(); ?>" class="card-a__link">
                  <div class="card-a__image-wrap">
                    <?php the_post_thumbnail('full', array(
                                                    'class' => 'card-a__image',
                                                    'alt' => get_the_title(),
                                                )) ?>
                  </div>
                  <div class="card-a__list-cat">
                    <?php foreach (get_the_category() as $category): ?>
                    <span class="card-a__cat">
                      <?php echo $category->name ?>
                    </span>
                    <?php endforeach; ?>
                  </div>
                  <h3 class="card-a__heading"><?php the_title() ?></h3>
                  <?php if ($postFields['preview_content']): ?>
                  <p class="card-a__text">
                    <?php echo $postFields['preview_content'] ?>
                  </p>
                  <?php endif; ?>
                </a>
              </article>
              <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>






  <!-- cta Reques Demo-->
  <?php
$cta1 = get_field("cta_2", "option");
$bg = "background-image: url(".get_template_directory_uri()."/inc/images/demo-section-backgr.svg";
$btn ="home-hero__button button button-purple";
?>
  <section class="cta">
    <div class="container">
      <div class="row">
        <h2><?php echo $cta1["title"] ; ?></h2>
        <?php get_template_part( '/inc/parts/btn-request-demo' );  ?>
      </div>
    </div>
  </section>
  <!-- /. cta Reques Demo-->

  <?php wp_reset_postdata(); ?>


</div>


<?php get_footer(); ?>
