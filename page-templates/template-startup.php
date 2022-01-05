<?php
/*
Template Name: Startup Page2
*/

$page_fields = get_fields();
$logo = get_field('logo_repeater', 'option');



get_header();

// var_dump($query);
?>

<div id="startup-page" class="intern-pg">

  <section class="group intro-banner"
    style="background-image: url(<?php echo $page_fields['first_background']['url']; ?>);">
    <div class="container">
      <div class="row">
        <article class="headline">
          <h1 class="h1">
            <?php echo $page_fields['first_heading']; ?>
          </h1>
          <p class="p"><?php echo $page_fields['first_text']; ?></p>
          <?php if ($page_fields['first_link_title'] !== ''): ?>
          <a href="#resources" class="link button outline"><?php echo $page_fields['first_link_title'] ?></a>
          <?php endif ?>
        </article>
      </div>
    </div>
  </section>

  <!-- section 2 -->
  <section class="section-2">
    <div class="container">
      <div class="row ">
        <h2>
          <?php echo $page_fields['second_heading']; ?>
        </h2>

        <div class="box">
          <div class="content">
            <?php echo $page_fields['second_text']; ?>
          </div>
          <div class="section-3__link">
            <?php if ( $page_fields['second_link']['url'] !== ''): ?>
            <a href="<?php echo $page_fields['second_link']['url']; ?>" class="section-3__link button">
              <?php echo $page_fields['second_link']['title']; ?>
            </a>
            <?php endif; ?>
          </div>

          <div>
          </div>

        </div>
        <div class="hexagon"></div>
        <div class="hexagon-purple-light"></div>
        <div class="hexagon-purple"></div>
        <div class="hexagon-lines"></div>
        <div class="bg-lines2"></div>
      </div>
    </div>
  </section>


  <!-- section 3 -->
  <section class="section-3">
    <div class="container">
      <div class="row ">

        <h2>
          <?php echo $page_fields['third_heading']; ?>
        </h2>

        <div class="box">
          <div class="content">
            <?php echo $page_fields['third_text']; ?>
          </div>
          <div>
          </div>
        </div>
        <div class="hexagon"></div>
        <div class="hexagon-purple-light"></div>
        <div class="hexagon-purple"></div>
        <div class="hexagon-lines"></div>
        <div class="bg-lines2"></div>
      </div>
    </div>
  </section>


  <!-- section 4 -->

  <section class="section-4">
    <div class="container">
      <div class="row">

        <?php 
  $argSp = array(
    'post_type' => 'startup_operations',
    'posts_per_page'   => -1,
    'post_status'     => 'publish',
    'orderby'         => 'chapter_number',
    'order'           => 'ASC',
);
    $querySP = new WP_Query($argSp);
    
    
    if ($querySP->have_posts()): ?>
        <ul class="post-list">
          <?php while ($querySP->have_posts()): ?>
          <?php $querySP->the_post(); ?>
          <?php $post_fields = get_fields(); $id = get_the_ID(); ?>

          <li class="box <?php echo $post_fields['icon_color']; ?>">
            <figure>
              <img src="<?php echo $post_fields['icon']['url']; ?>" alt="Icon">
            </figure>

            <h3>
              <?php echo $post_fields['first_heading']; ?>
            </h3>
            <div class="content">
              <?php 
              $excerpt = get_the_excerpt(); 
              $excerpt = substr( $excerpt, 0, 260 ); 
              $result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
              echo $result.' ...';
              ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="arrow">
              Learn more
            </a>
          </li>

          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

      </div>
    </div>
  </section>



  <!-- cta Reques Demo-->
  <?php 
  $cta2 = get_field("cta_2", "option");
  if($cta2['bg'] === 'purple'){
    $bg = "background-image: url(".get_template_directory_uri()."/inc/images/demo-section-backgr.svg";
    $btn ="home-hero__button button button-purple";
  }else{
    $bg = "background-image: url(".get_template_directory_uri()."/inc/images/demo-section-backgr-light.svg";
    $btn = "button button-teal button-animation content-center";
  }
?>
  <section class="cta" style="<?php echo $bg; ?>">
    <div class="container">
      <div class="row">
        <h2><?php echo $cta2["title"] ; ?></h2>
        <a class=" <?php echo $btn?>" rel="noopener"
          href="<?php echo $cta2["btn"]["url"]; ?>"><span><?php echo $cta2["btn"]["title"]; ?></span>
        </a>
      </div>
    </div>
  </section>
  <!-- /. cta Reques Demo-->

</div>


<?php get_footer(); ?>
