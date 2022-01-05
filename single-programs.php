<?php

$pageFields = get_fields();
global $post;



$logo = get_field('logo_repeater', 'option');
get_header();
?>

<div id="program_single" class=" intern-pg">


  <!-- 0 banner -->
  <section class="intro-banner" style="background-image: url(<?php echo $pageFields['intro_bg_image'] ?>);">
    <div class="container">
      <div class="row">
        <article class="headline">
          <?php if ($pageFields['intro_heading']): ?>
          <h1><?php echo $pageFields['intro_heading'] ?></h1>
          <?php endif; ?>
          <?php if ($pageFields['intro_text']): ?>
          <p class="subhead">
            <?php echo trim(nl2br($pageFields['intro_text'])) ?>
          </p>
          <?php endif; ?>
          <?php if($pageFields['intro_button']['name']): ?>
          <a class="button button-purple button-animation"
            href="<?php echo $pageFields['intro_button']['link'] ?>"><span><?php echo $pageFields['intro_button']['name'] ?></span></a>
          <?php endif; ?>

        </article>
        <div class="hero-media">
          <img loading=“lazy” src="<?php echo $pageFields['intro_media']['image'] ?>"
            alt="<?php echo $pageFields['intro_media']['description'] ?>" data-pin-nopin="true">
        </div>
      </div>
    </div>
  </section>

  <!-- 1 Logos -->
  <?php get_template_part( '/inc/parts/slider_logos' ); ?>
  <!--  /.  2 Logos  -->


  <!-- 2 implementation -->
  <section class="section_2 content-list">
    <div class="container">
      <div class="row">

        <div class="box-with-tab">


          <?php foreach ($pageFields['li_list'] as $liItem): ?>
          <div class="items_wrap">
            <article class="item">
              <div class="items_img" style="background-image: url('<?php echo $liItem['image'] ?>')"></div>
              <h3 class="items_paragraph"><?php echo nl2br($liItem['text']) ?></h3>
            </article>
          </div>
          <?php endforeach; ?>




        </div>
        <div class="bg-lines2"> </div>
      </div>
    </div>
  </section>






  <!-- 3 Strategically onboard img left-->
  <?php if ($pageFields['info_one_show']): ?>
  <section class="block section_3 mt-5 two-blocks">
    <div class="container">
      <div class="row">
        <div class="product-img">
          <img class="" src="<?php echo $pageFields['info_one_media']['image'] ?>"
            alt="<?php echo $pageFields['info_one_media']['description'] ?>">
        </div>
        <div class="description">
          <h2><?php echo $pageFields['info_one_heading'] ?></h2>
          <div class="text">
            <?php echo nl2br($pageFields['info_one_text']) ?>
          </div>
        </div>
        <div class="hexagon animate "></div>
        <div class="hexagon-lines animate "></div>
      </div>
    </div>
  </section>
  <?php endif; ?>


  <!-- 3 Strategically onboard img right-->
  <?php if ($pageFields['info_two_show']): ?>
  <section class="block section_4 two-blocks">
    <div class="container">
      <div class="row">

        <div class="description">

          <h2><?php echo $pageFields['info_two_heading'] ?></h2>
          <div class="text">
            <p><?php echo nl2br($pageFields['info_two_text']) ?></p>
          </div>
        </div>

        <div class="product-img">
          <img loading=“lazy” src="<?php echo $pageFields['info_two_media']['image'] ?>"
            alt="<?php echo $pageFields['info_two_media']['description'] ?>">
        </div>
        <div class="hexagon-purple-light animate "></div>
      </div>
    </div>
  </section>
  <?php endif; ?>



  <!-- 3 Strategically onboard img left-->
  <?php if ($pageFields['info_three_show']): ?>
  <section class="block section_5 two-blocks">
    <div class="container">
      <div class="row">
        <div class="product-img">
          <img loading=“lazy” class="" src="<?php echo $pageFields['info_three_media']['image'] ?>"
            alt="<?php echo $pageFields['info_three_media']['description'] ?>">

        </div>
        <div class="description">
          <h2><?php echo $pageFields['info_three_heading']; ?></h2>
          <div class="text">
            <?php echo  $pageFields['info_three_text']; ?>
          </div>
        </div>
        <div class="hexagon animate "></div>
        <div class="hexagon-lines animate "></div>
      </div>
    </div>
  </section>
  <?php endif; ?>


  <!-- 3 Strategically onboard img right-->
  <?php if ($pageFields['info_four_show']): ?>
  <section class="block section_6 two-blocks">
    <div class="container">
      <div class="row">

        <div class="description">
          <h2><?php echo $pageFields['info_four_heading']; ?></h2>
          <div class="text">
            <p><?php echo $pageFields['info_four_text']; ?></p>
          </div>

        </div>

        <div class="product-img">
          <img loading=“lazy” src="<?php echo $pageFields['info_four_media']['image'] ?>"
            alt="<?php echo $pageFields['info_four_media']['description'] ?>">
        </div>
        <div class="hexagon-purple-light animate "></div>
      </div>
    </div>
  </section>
  <?php endif; ?>


  <!-- 3 Strategically onboard img left-->
  <?php if ($pageFields['info_five_show']): ?>
  <section class="block section_7 two-blocks">
    <div class="container">
      <div class="row">
        <div class="product-img">
          <img loading=“lazy” class="" src="<?php echo $pageFields['info_five_media']['image'] ?>"
            alt="<?php echo $pageFields['info_five_media']['description'] ?>">
        </div>
        <div class="description">
          <h2><?php echo $pageFields['info_five_heading'] ?></h2>
          <div class="text">
            <?php echo nl2br($pageFields['info_five_text']) ?>
          </div>
        </div>
        <div class="hexagon-outline animate "></div>
        <div class="hexagon-lines animate "></div>
      </div>
    </div>
  </section>
  <?php endif; ?>




  <!-- cta Reques Demo-->
  <?php 

$bg = "background-image: url(".get_template_directory_uri()."/inc/images/bg-contact.jpg";
$btn = "button button-teal button-animation content-center";
?>
  <section class="cta block" style="<?php echo $bg; ?>">
    <div class="container">
      <div class="row">
        <h2><?php echo $pageFields['demo_one_heading'] ?></h2>
        <div class="text"><?php echo $pageFields['demo_one_text'] ?></div>
        <a class=" <?php echo $btn?>" rel="noopener" href="<?php echo $pageFields['demo_one_button']['link'] ?>"
          target=""><span><?php echo $pageFields['demo_one_button']['name'] ?></span>
        </a>
      </div>
    </div>
  </section>
  <!-- /. cta Reques Demo-->


  <section class="block customer-story entry-content customer-post-entry">
    <?php
 $args = array(
  'post_type' => 'customers',
  'post_status' => 'publish',
  'posts_per_page' => 1,
);

$posts = get_posts($args);



                ?>


    <div class="container">
      <div class=" row">
        <?php 
        echo "<h2 class='text-center mt-5 mb-5'>".$pageFields['customer_heading']."</h2>";
      foreach ($posts as $post):
        $postFields = get_fields();
        $previewFields = $postFields['preview_customer_post'];
        
      ?>

        <article class="customer-post-block box">
          <section class="entry-content customer-post-entry">
            <div class="customer-post-entry_logo"
              style="background-image: url('<?php echo $previewFields['logo'] ?>');">
            </div>
            <div class="customer-post-entry_label">
              <div class="customer-post-entry_fig1"
                style="background-color: <?php echo $previewFields['label']['label_color'] ?>">
                <p><?php echo $previewFields['label']['label_text']; ?></p>
                <span class="customer-post-entry_fig2"
                  style="border-top: 29px solid <?php echo $previewFields['label']['label_color'] ?>;"></span>
              </div>
            </div>
            <p class="customer-post-entry_content">
              <?php echo mb_substr($previewFields['content'], 0, 340); ?><?php if (strlen($previewFields['content']) >= 340) { ?>...<?php } ?>
            </p>
            <p class="customer-post-entry_author"><?php echo $previewFields['author'] ?></p>

            <div class="customer-post-entry_block">
              <a class="text-link w-arrow customer-post-entry_link" href="<?php the_permalink(); ?>">
                <?php echo $previewFields['link'] ?>
              </a>
            </div>

          </section>
          <div class="customer-post-block__figure"></div>
        </article>
        <?php endforeach; ?>
      </div>
    </div>


    <!-- 4 faq -->
    <section class="faq mb-5">
      <div class="container">
        <div class="row">
          <h2 class="faq__heading"><?php echo $pageFields['faq_heading'] ?></h2>
          <div class="box">
            <ul class="drop-list">
              <?php foreach ($pageFields['faq_list'] as $faqItem): ?>
              <li class="drop-list__item">
                <span class="question"><?php echo $faqItem["name"]; ?></span>
                <span class="text"><?php echo $faqItem["info"][0]["text"]; ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="bg-lines2"></div>
          <div class="figureL"></div>
        </div>
      </div>
    </section>



    <!-- cta Reques Demo-->
    <?php 

$bg = "background-image: url(".get_template_directory_uri()."/inc/images/demo-section-backgr.svg";
$btn ="home-hero__button button button-purple";
?>
    <section class="cta text-white" style="<?php echo $bg; ?>">
      <div class="container">
        <div class="row text-white">
          <h2><?php echo $pageFields["demo_two_heading"] ; ?></h2>
          <a class=" <?php echo $btn?>" rel="noopener" href="<?php echo $cta2["btn"]["url"]; ?>">
            <span><?php echo $pageFields['demo_two_button']['name'] ?></span>
          </a>
        </div>
      </div>
    </section>
    <!-- /. cta Reques Demo-->
</div>


<?php get_footer(); ?>
