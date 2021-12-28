<?php
/*
Template Name: integrations
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-------------------------------------------*/
/*  ACF Page our-value
/*-------------------------------------------*/
$pageFields = get_fields();


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
<div id="integrations" class="intern-pg">

  <!-- 0 banner -->
  <?php get_template_part( '/inc/parts/banner-top-2section' ); ?>


  <!--4 industry -->
  <section class="industry shadow-bottom ">
    <div class="container">
      <?php if ($pageFields['sec_two_title']): ?>
      <header>
        <div class="title title-purple"><?php echo $pageFields['sec_two_title']; ?></div>
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
        <div class="title title-purple"><?php echo $pageFields['sec_three_title']; ?></div>
        <div class="subtitle"><?php echo $pageFields['sec_three_subtitle']; ?></div>
      </header>
      <?php endif; ?>

      <!-- 3 logos -->
      <section class="hooks logos">
        <div class="container-xl">


          <div class="row mt-5 pb-5">

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

      <div class="title"><?php echo get_field('faq_title'); ?></div>
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
  <?php get_template_part( '/inc/parts/banner-footer-intern' ); ?>


</div>



<?php get_footer(); ?>
