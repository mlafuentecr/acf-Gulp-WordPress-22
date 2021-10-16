<?php
/*
Template Name: Our Value
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();

$cta2 = get_field("cta_2", "option");

?>
<div id="our-value" class="intern-pg">

  <!-- 0 banner -->
  <section class="intro-banner" style="background-image: url(<?php echo $pageFields['banner_background']; ?>);">
    <div class="container-xl">
      <div class="row">
        <article class="headline">
          <?php if ($pageFields['banner_title']): ?>
          <h1><?php echo $pageFields['banner_title']; ?></h1>
          <?php endif; ?>
          <?php if ($pageFields['banner_content']): ?>
          <p class="banner-content"><?php echo nl2br($pageFields['banner_content']); ?></p>
          <?php endif; ?>
        </article>
      </div>
    </div>
  </section>

  <section class="block-picture">
    <div class="container-xl">
      <img src="<?php echo $pageFields['banner_image']['image'] ?>" class="block-picture__img"
        alt="<?php echo $pageFields['banner_image']['description_image'] ?>">
    </div>
  </section>

  <!-- 1 our-expert -->
  <section class="our-expert">
    <div class="container-xl">
      <div class="row">
        <article>
          <div class="box-with-tab">
            <h4><?php echo $pageFields['sec_one_heading'] ?></h4>
            <?php if ($pageFields['sec_one_text']): ?>
            <p><?php echo nl2br($pageFields['sec_one_text']) ?></p>
            <?php endif; ?>
          </div>
        </article>
        <figure class="bg-lines2">
          <img src="<?php echo $pageFields['sec_one_image']['image'] ?>"
            alt="<?php echo $pageFields['sec_one_image']['description_image'] ?>" />
          <span class="callout-shape sec-shape shape-1"></span>
          <span class="callout-shape sec-shape shape-2"></span>
          <span class="callout-shape sec-shape shape-3"></span>
        </figure>
      </div>
    </div>
  </section>

  <!-- 2 content list -->
  <section class="content-list">
    <div class="container-xl">
      <div class="row">

        <div class="box">
          <?php foreach ($pageFields['sec_two_list'] as $secTwoListValue): ?>
          <div class="items_wrap">
            <article class="item">
              <div class="items_img" style="background-image: url('<?php echo $secTwoListValue['image'] ?>')">
              </div>
              <h3><?php echo $secTwoListValue['heading'] ?></h3>
              <p class="items_paragraph"><?php echo nl2br($secTwoListValue['text']) ?></p>
            </article>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="bg-lines2"> </div>
      </div>
    </div>
  </section>


  <!-- 3 Manage and automate -->
  <section class="manage-automate">
    <div class="container-xl">
      <div class="row">
        <article>
          <div class="box-with-tab">
            <h4><?php echo $pageFields['sec_three_heading'] ?></h4>
            <?php if ($pageFields['sec_three_text']): ?>
            <p><?php echo nl2br($pageFields['sec_three_text']) ?></p>
            <?php endif; ?>
          </div>
        </article>
        <figure class="bg-lines2">
          <img src="<?php echo $pageFields['sec_three_image']['image'] ?>"
            alt="<?php echo $pageFields['sec_three_image']['description_image'] ?>" />
          <span class="callout-shape sec-shape shape-1"></span>
          <span class="callout-shape sec-shape shape-2"></span>
        </figure>
      </div>
    </div>
  </section>

  <!-- 4 Manage and automate -->
  <section class="content-list">
    <div class="container-xl">
      <div class="row">

        <div class="box">
          <?php foreach ($pageFields['sec_four_list'] as $secTwoListValue): ?>
          <div class="items_wrap">
            <article class="item">
              <div class="items_img" style="background-image: url('<?php echo $secTwoListValue['image'] ?>')">
              </div>
              <h3><?php echo $secTwoListValue['heading'] ?></h3>
              <p class="items_paragraph"><?php echo nl2br($secTwoListValue['text']) ?></p>
            </article>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="bg-lines2"> </div>
      </div>
    </div>
  </section>


  <!-- 5 Manage and automate -->
  <section class="before-after">
    <div class="container-xl">
      <div class="row">

        <?php if ($pageFields['section_title']): ?>
        <div class="headline col-12">
          <h2><?php echo $pageFields['section_title']; ?></h2>
        </div>
        <?php endif; ?>

        <!-- 5 col-left old -->
        <?php if (have_rows('content_left')): ?>
        <div class="col-12  old">
          <div class="box-rounded ">
            <?php while (have_rows('content_left')): the_row();
                            $title = get_sub_field('title');
                            ?>
            <div class="headline">
              <h3><?php echo $title; ?></h3>
            </div>
            <ul class="list">
              <?php $c = 0;
                                if (have_rows('list_repeater')): while (have_rows('list_repeater')): the_row();
                                    $content = get_sub_field('content');
                                    $c++;
                                    ?>
              <li class="item item-<?php echo $c; ?>"><?php echo $content; ?></li>
              <?php endwhile; endif; ?>
            </ul>
            <?php endwhile; ?>
          </div>
        </div>
        <?php endif; ?>

        <!-- 5 col-right new -->
        <?php if (have_rows('content_right')): ?>
        <div class="col-12 new ">
          <div class="box-rounded box-white">

            <?php while (have_rows('content_right')): the_row();
                            $title = get_sub_field('title');
                            ?>
            <div class="headline">
              <h3><?php echo $title; ?></h3>
            </div>
            <ul class="list">
              <?php $c2 = 0;
                                if (have_rows('list_repeater')): while (have_rows('list_repeater')): the_row();
                                    $content = get_sub_field('content');
                                    $icon = get_sub_field('icon');
                                    $c2++;
                                    ?>
              <li class="wl-item item-<?php echo $c2; ?>">
                <figure>
                  <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                </figure>
                <p><?php echo $content; ?></p>
              </li>
              <?php endwhile; endif; ?>
            </ul>
            <?php endwhile; ?>

          </div>
          <img class="sec-shape sec-1-2" src="<?php echo get_template_directory_uri(); ?>/inc/images/shape-wl-box.svg">
          <img class="sec-shape sec-1-1" src="<?php echo get_template_directory_uri(); ?>/inc/images/shape-wl-m1.svg">
        </div>
        <?php endif; ?>



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
    $btn = "button button-teal btn-animation content-center";
  }
?>
  <section class="cta" style="<?php echo $bg; ?>">
    <div class="container">
      <div class="row">
        <h2><?php echo $cta2["title"] ; ?></h2>
        <a class=" <?php echo $btn?>" rel="noopener" href="<?php echo $cta2["btn"]["url"]; ?>"
           ><span><?php echo $cta2["btn"]["title"]; ?></span>
        </a>
      </div>
    </div>
  </section>
  <!-- /. cta Reques Demo-->


  <!-- 6 demo -->
  <!-- puedo hacer uno general y que tenga un drop down de bg y un text field o un drop down de text -->

</div>
<?php   edit_post_link(__('Edit This page'));  ?>

<?php get_footer(); ?>
