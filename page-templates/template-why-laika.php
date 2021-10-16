<?php
/*
Template Name: Why Laika
*/
$pageFields = get_fields();

include(get_template_directory() . '/parts/global-variables.php');

get_header(); ?>

<section class="group intro-banner" style="background-image: url(<?php echo $pageFields['banner_background']; ?>);">
  <div class="grid-container">
    <article class="headline">
      <?php if ($pageFields['banner_title']): ?>
      <h1><?php echo $pageFields['banner_title']; ?></h1>
      <?php endif; ?>
      <?php if ($pageFields['banner_content']): ?>
      <p class="banner-content"><?php echo $pageFields['banner_content']; ?></p>
      <?php endif; ?>
    </article>
  </div>
</section>
<section class="block-picture">
  <div class="block-picture__container grid-container">
    <img src="<?php echo $pageFields['banner_image']['image'] ?>" class="block-picture__img"
      alt="<?php echo $pageFields['banner_image']['description_image'] ?>">
  </div>
</section>
<section class="block-wl-feature-a">
  <div class="grid-container">
    <div class="main-feature">
      <article>
        <div class="wrapper">
          <h4><?php echo $pageFields['sec_one_heading'] ?></h4>
          <?php if ($pageFields['sec_one_text']): ?>
          <p><?php echo nl2br($pageFields['sec_one_text']) ?></p>
          <?php endif; ?>
        </div>
      </article>
      <figure>
        <img src="<?php echo $pageFields['sec_one_image']['image'] ?>"
          alt="<?php echo $pageFields['sec_one_image']['description_image'] ?>" />
        <span class="callout-shape sec-shape shape-1"></span>
        <span class="callout-shape sec-shape shape-2"></span>
        <span class="callout-shape sec-shape shape-3"></span>
      </figure>
    </div>
  </div>
</section>

<section class="block-list-items">
  <div class="block-list-items__container grid-container">
    <div class="block-list-items__grid-x grid-x">
      <?php foreach ($pageFields['sec_two_list'] as $secTwoListValue): ?>
      <div class="block-list-items__col">
        <article class="block-list-items__item">
          <div class="block-list-items__img" style="background-image: url('<?php echo $secTwoListValue['image'] ?>')">
          </div>
          <h3 class="block-list-items__heading"><?php echo $secTwoListValue['heading'] ?></h3>
          <p class="block-list-items__paragraph"><?php echo nl2br($secTwoListValue['text']) ?></p>
        </article>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<section class="block-wl-feature-b">
  <div class="grid-container">
    <div class="main-feature">
      <article>
        <div class="wrapper">
          <h4><?php echo $pageFields['sec_three_heading'] ?></h4>
          <?php if ($pageFields['sec_three_text']): ?>
          <p><?php echo nl2br($pageFields['sec_three_text']) ?></p>
          <?php endif; ?>
        </div>
      </article>
      <figure>
        <img src="<?php echo $pageFields['sec_three_image']['image'] ?>"
          alt="<?php echo $pageFields['sec_three_image']['description_image'] ?>" />
        <span class="callout-shape sec-shape shape-1"></span>
        <span class="callout-shape sec-shape shape-2"></span>
      </figure>
    </div>
  </div>
</section>

<section class="block-list-items">
  <div class="block-list-items__container grid-container">
    <div class="block-list-items__grid-x grid-x">
      <?php foreach ($pageFields['sec_four_list'] as $secTwoListValue): ?>
      <div class="block-list-items__col">
        <article class="block-list-items__item">
          <div class="block-list-items__img" style="background-image: url('<?php echo $secTwoListValue['image'] ?>')">
          </div>
          <h3 class="block-list-items__heading"><?php echo $secTwoListValue['heading'] ?></h3>
          <p class="block-list-items__paragraph"><?php echo nl2br($secTwoListValue['text']) ?></p>
        </article>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="group block-wl-main">
  <div class="grid-container">
    <?php if ($pageFields['section_title']): ?>
    <div class="headline">
      <h2><?php echo $pageFields['section_title']; ?></h2>
    </div>
    <?php endif; ?>
    <div class="grid-x grid-wl">
      <?php if (have_rows('content_left')): ?>
      <div class="block-item block-left">
        <?php while (have_rows('content_left')): the_row();
                            $title = get_sub_field('title');
                            ?>
        <div class="headline">
          <h3><?php echo $title; ?></h3>
        </div>
        <div class="grid-list">
          <?php $c = 0;
                                if (have_rows('list_repeater')): while (have_rows('list_repeater')): the_row();
                                    $content = get_sub_field('content');
                                    $c++;
                                    ?>
          <p class="item item-<?php echo $c; ?>"><?php echo $content; ?></p>
          <?php endwhile; endif; ?>
        </div>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
      <?php if (have_rows('content_right')): ?>
      <div class="block-item block-right">
        <?php while (have_rows('content_right')): the_row();
                            $title = get_sub_field('title');
                            ?>
        <div class="headline">
          <h3><?php echo $title; ?></h3>
        </div>
        <div class="grid-list">
          <?php $c2 = 0;
                                if (have_rows('list_repeater')): while (have_rows('list_repeater')): the_row();
                                    $content = get_sub_field('content');
                                    $icon = get_sub_field('icon');
                                    $c2++;
                                    ?>
          <div class="wl-item item-<?php echo $c2; ?>">
            <figure>
              <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
            </figure>
            <p><?php echo $content; ?></p>
          </div>
          <?php endwhile; endif; ?>
        </div>
        <?php endwhile; ?>
        <img class="sec-shape sec-1-2" src="<?php echo get_template_directory_uri(); ?>/assets/images/shape-wl-box.svg">
        <img class="sec-shape sec-1-1" src="<?php echo get_template_directory_uri(); ?>/assets/images/shape-wl-m1.svg">
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>


<?php if ($wantWILF == 1): include(get_template_directory() . '/parts/content-wilf.php'); endif; ?>
<?php if ($wantDemo == 1): include(get_template_directory() . '/parts/content-demo.php'); endif; ?>


<script>
jQuery(function($) {


  // init controller
  var ctrl = new ScrollMagic.Controller();

  // Scene 1

  $(".sec-shape").each(function(i) {
    var $item = $('.sec-shape')
    var shapeItem = $item[i];
    var itemDur = ((16.25 * i) + 60);
    //alert(itemDur);
    var tl = new TimelineMax();
    tl.to(shapeItem, 1, {
      y: -100,
      ease: Linear.easeNone
    });

    new ScrollMagic.Scene({
        triggerElement: shapeItem,
        offset: 0,
        triggerHook: 1,
        duration: '140%',
      })
      .setTween(tl)
      //.addIndicators()
      .addTo(ctrl);
  });

});
</script>

<?php get_footer(); ?>
