<?php
/*
Template Name: Integrations
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$page_fields = get_fields();

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



//me queda hacer query a los logos

?>
<div id="integrations" class="intern-pg">

  <!--  banner -->
  <section class="intro-banner">
    <div class="container-xl">
      <div class="row">

        <section class="integrations__section integrations__section_main">
          <div class="grid-container">
            <div class="integrations__section-content integrations__section-content_main-section-padding">
              <div class="integrations__section-col integrations__section-col_main-section-left">
                <h1 class="integrations__headline headline"><?php echo $page_fields['first_heading'] ?></h1>
                <p class="integrations__headtext"><?php echo $page_fields['first_text'] ?></p>
                <div
                  class="integrations__ul integrations__ul_pr-0 integrations__ul_list-hexagon integrations__ul_mw-xl-400 integrations__ul_fz-15">
                  <?php echo $page_fields['first_list'] ?>
                </div>
              </div>
              <div class="integrations__section-col integrations__section-col_main-section-right">
                <div class="integrations__main-svg-wrap">
                  <?php include( get_template_directory().'/inc/parts/integrations-svg.php' ); ?>

                  <?php if(false) : ?>
                  <img class="integrations__main-svg" src="<?php echo $page_fields['first_image']['url'] ?>"
                    alt="<?php echo $page_fields['first_image']['alt'] ?>">
                  <?php endif ?>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
    </div>
  </section>


  <!--1 First section-->
  <section class="block Connect content-list">
    <div class="container-xl mt-5">
      <div class="row">

        <h2> <?php echo $page_fields["second_heading"]; ?></h2>
        <div class="text">
          <?php  echo $page_fields["second_text"]; ?>
        </div>
      </div>
    </div>

    <div class="container-xl mt-5">
      <div class="row">
        <?php $list = $page_fields["second_list"]; ?>
        <div class="box">

          <?php foreach ($list as $item): ?>

          <div class="items_wrap">
            <article class="item">
              <div class="items_img" style="background-image: url('<?php echo $item['image']['url']; ?>')">
              </div>
              <?php if($item['title']){?><h3><?php echo $item['title']; ?></h3><?php } ?>
              <p class="items_paragraph"><?php echo $item['text']; ?></p>
            </article>
          </div>
          <?php endforeach; ?>

        </div>
        <div class="bg-lines2"> </div>
        <div class="hexagon-purple-light animate"></div>
      </div>
    </div>
  </section>


  <!-- 3 logos -->
  <section class="hooks logos">
    <div class="container-xl">

      <div class="row">
        <h2> <?php echo $page_fields["third_heading"]; ?></h2>
        <div class="text">
          <?php  echo $page_fields["third_text"]; ?>
        </div>
      </div>

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

            <h3 class="card__label">
              <?php echo $post_fields['name'] ?>
            </h3>
          </div>

          <?php endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>

    </div>
    <div class="hexagon-lines"></div>
    <div class="integrations-logos__shape_2"></div>
    <div class="integrations-logos__shape_3"></div>
  </section>

  <!-- 4 faq -->
  <section class="faq ">
    <div class="container-xl">
      <h2 class="faq__heading"><?php echo $page_fields['faq_title']; ?></h2>
      <div class="row">
        <div class="box">
          <ul class="drop-list">
            <?php foreach ($page_fields['faq_list'] as $faqItem): ?>
            <li class="drop-list__item">
              <span class="question"><?php echo $faqItem["name"]; ?></span>
              <span class="text"><?php echo $faqItem["info"][0]["text"]; ?></span>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- cta Reques Demo-->

  <section class="cta">
    <div class="container">
      <div class="row">

        <h2><?php echo $page_fields["faq_heading"]; ?></h2>
        <a class="button button-teal btn-animation" rel="noopener" href="<?php echo $page_fields["btn"]["url"]; ?>"
          target="<?php echo $page_fields["url"]["title"]; ?>"><span><?php echo $page_fields["btn"]["title"]; ?></span>
        </a>
      </div>
    </div>
  </section>
  <!-- /. cta Reques Demo-->

</div>
<?php   edit_post_link(__('Edit This page'));  ?>

<?php get_footer(); ?>
