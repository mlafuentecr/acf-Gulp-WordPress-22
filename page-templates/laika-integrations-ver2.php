<?php
/*
Template Name: integrations-ver2
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-------------------------------------------*/
/*  ACF Page our-value
/*-------------------------------------------*/
$pageFields = get_fields();
$banner = $pageFields['banner_section'];

/*-------------------------------------------*/
/*  Apps query
/*-------------------------------------------*/

$application_types =  get_terms( 'application_type', array('hide_empty' => false) );
$apps = array();

foreach($application_types as $type){
  $args = array(
    'post_type' => 'application_post',
    'post_status' => 'publish',
    'posts_per_page' => -1, 
    'orderby' => 'title', 
    'order' => 'ASC', 
  );
  $query = new WP_Query($args);

  $object = (object) [
      'slug' => $type -> slug,
      'apps' => $query -> get_posts(),
  ];

  array_push($apps, $object);
}

?>
<div id="integrations-ver2" class="intern-pg">
  <!-- 0 banner -->

  <section class="intro-banner" style="background-image: url(<?php echo $banner['banner_background']; ?>);">
    <div class="container">
      <article class="headline">

        <?php if ($pageFields['banner_title']): ?>
        <div class="content">
          <h1><?php echo $pageFields['banner_title']; ?></h1>
          <div class="text"><?php echo $pageFields['banner_content']; ?></div>
          <?php get_template_part( '/inc/parts/btn-request-demo' );  ?>
        </div>
        <?php endif; ?>

        <?php if ($banner['image']): ?>
        <div class="hero">
          <span class="text"><?php echo $banner['description_image'] ?></span>
          <img src="<?php echo $banner['image'] ?>" class="block-picture__img"
            alt="<?php echo $banner['description_image'] ?>">
        </div>
        <?php endif; ?>

      </article>
    </div>
  </section>

  <!--4 industry -->
  <section class="industry shadow-bottom ">
    <div class="container">
      <?php if ($pageFields['sec_two_title']): ?>
      <header>
        <h2><?php echo $pageFields['sec_two_title']; ?></h2>
        <div class="subtitle"><?php echo $pageFields['sec_two_subtitle']; ?></div>
      </header>
      <?php endif; ?>

      <div class="contentWrap">
        <?php 
        $sec_two_list = get_field('sec_two_list');
        if( $sec_two_list ) {
        echo '<ul  class="icons">';
        foreach( $sec_two_list as $item ) {
          echo '<li>
          <img loading=“lazy” width="auto"  height="70px" src="'. $item["image"]["url"] .'" alt="'. $item["image"]["title"] .'">
          <h3>'.$item["heading"].'</h3>
          <span class="content">'.$item["text"].'</span>
          </li>';
          }
        echo '</ul>';
        }
        ?>
      </div>
    </div>
  </section>


  <!-- integrations -->
  <section class="integrations">
    <div class="container">

      <?php if ($pageFields['sec_three_title']): ?>
      <header>
        <h2><?php echo $pageFields['sec_three_title']; ?></h2>
        <div class="subtitle"><?php echo $pageFields['sec_three_subtitle']; ?></div>
      </header>
      <?php endif; ?>

      <!-- 3 logos -->
      <section class="hooks logos">
        <div class="container-xl">


          <div class="row mt-5 pb-5">

            <ul class="menu hookDesktop mb-5 ">
              <li class="post-cat__item post-item active">
                <span id="all-tab" data-name="All" data-slug="All" class="tab post-cat__link post-cat__link_active">
                  All
                </span>
              </li>
              <?php foreach ($application_types as $type): ?>
              <li class="post-cat__item">
                <span data-name="<?php echo $type -> name ?>" data-slug="<?php echo $type -> slug ?>"
                  class="tab post-cat__link">
                  <?php echo $type -> name ?>
                </span>
              </li>
              <?php endforeach; ?>
            </ul>

            <ul class="menu hookMobile mb-5 ">
              <label for="">Category: All</label>
              <li class="post-cat__item post-item active">
                <span id="all-tab" data-name="All" data-slug="All" class="tab post-cat__link post-cat__link_active">
                  All
                </span>
              </li>
              <?php foreach ($application_types as $type): ?>
              <li class="post-cat__item">
                <span data-name="<?php echo $type -> name ?>" data-slug="<?php echo $type -> slug ?>"
                  class="tab post-cat__link">
                  <?php echo $type -> name ?>
                </span>
              </li>
              <?php endforeach; ?>
            </ul>

            <div class="logos-cards">
              <?php if ($query->have_posts()): ?>
              <?php while ($query->have_posts()): ?>
              <?php $query->the_post(); ?>
              <?php $post_fields = get_fields(); $id = get_the_ID() ?>
              <?php $term_list = wp_get_post_terms( $post->ID, 'application_type', array( 'fields' => 'all' ) ); ?>
              <div class="card" data-type='<?php echo $term_list[0]->name;  ?>' data-card-id="<?php echo $id ?>">
                <div class="card__logo"><img src="<?php echo $post_fields['logo']['url'] ?>"
                    alt="<?php echo $post_fields['logo']['alt'] ?>"></div>

                <span class="card__label">
                  <?php echo $post_fields['name'] ?>
                </span>
              </div>

              <?php endwhile; ?>
              <?php endif; ?>
              <?php wp_reset_postdata(); ?>
            </div>
          </div>

        </div>

      </section>

    </div>
  </section>


  <!-- 3 list   -->
  <?php if (get_field('faq_title')):  ?>
  <section class="full-bar faq bg-purple sec_3 block-padding ">
    <div class="container">

      <h2><?php echo get_field('faq_title'); ?></h2>
      <?php $questions = $pageFields['questions_ov']; ?>

      <?php foreach ($questions as $question): ?>

      <article class="item">
        <h4><?php echo  $question['title']; ?></h4>
        <div class="answer">
          <?php  echo $question['answer']; ?>
        </div>
      </article>
      <?php endforeach; ?>

    </div>
  </section>
  <?php endif; ?>


  <!-- 5 sec_five-better experience  -->
  <?php if (get_field('sec_four_title')):  ?>
  <section class="sec_4 footer-banner" style="background-image: url(<?php echo $banner['banner_background']; ?>);">
    <div class="container">
      <?php 
        $title = get_field('sec_four_title'); 
        $link = get_field('sec_four_link'); 
    
      ?>
      <article>
        <h4><?php echo $title; ?></h4>
        <a rel="noopener" class='arrow arrow-center '
          href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
      </article>

    </div>
  </section>
  <?php endif; ?>



</div>



<?php get_footer(); ?>
