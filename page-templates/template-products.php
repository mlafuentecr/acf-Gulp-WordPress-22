<?php
/*
Template Name: Products
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();

$bannerBtn = get_field('request_demo_button', 'option');

?>
<div id="products" class="intern-pg">

  <!-- 0 banner -->
  <section class="intro-banner" style="background-image: url(<?php echo $pageFields['banner_bg']; ?>);">
    <div class="container-xl">
      <div class="row">
        <article class="headline">
          <?php if ($pageFields['banner_title']): ?>
          <h1><?php echo $pageFields['banner_title']; ?></h1>
          <?php endif; ?>
          <?php if ($pageFields['banner_content']): ?>
          <p class="banner-content"><?php echo $pageFields['banner_content']; ?></p>
          <?php endif; ?>

          <a class=" button button-purple button-animation  mt-5" rel="noopener" href='<?php echo$bannerBtn["url"]; ?>'
            target=""><span><?php echo$bannerBtn["title"]; ?></span>
          </a>



        </article>
        <div class="hero-media">
          <img src="<?php echo $pageFields['banner_media']["image"]; ?>"
            alt="<?php echo $pageFields['banner_media']["description"]; ?>" data-pin-nopin="true">
        </div>
      </div>
    </div>
  </section>

  <!-- First section-->
  <section class="block compliance-control two-blocks">
    <div class="container-xl">
      <div class="row">
        <?php $hero = $pageFields["hero_group"]; ?>
        <div class="product-img">
          <img class="shadow" src="<?php echo $hero["hero"]["url"]; ?>" alt="<?php echo $hero["hero"]["alt"]; ?>">
          <img class="img img1 animate" src="<?php echo $hero["img"]; ?>" alt="laika">
          <img class="img img2 animate" src="<?php echo $hero["img2"]; ?>" alt="laika">
        </div>
        <div class="description">
          <h2><?php echo $pageFields['sec_one_heading']; ?></h2>
          <div class="text"><?php echo $pageFields['sec_one_text']; ?></div>
        </div>
        <div class="hexagon animate"></div>
        <div class="hexagon-lines animate"></div>
      </div>
  </section>



  <!-- Second section-->
  <section class="block platfom-audit two-blocks">
    <div class="container-xl">
      <div class="row">


        <div class="description">

          <h2><?php echo $pageFields['sec_two_heading']; ?></h2>
          <div class="text"><?php echo $pageFields['sec_two_text']; ?></div>

          <?php $link = $pageFields["sec_two_link"]; ?>
          <?php if($link){ ?> <a class="home-text-link text-link arrow arrow-start" href="<?php echo $link['link']; ?>">
            <?php echo $link['name']; ?></a> <?php } ?>
        </div>

        <?php $heroTwo = $pageFields["hero_group_two"]; ?>
        <div class="product-img">
          <img src="<?php echo $heroTwo["hero"]["url"]; ?>" alt="<?php echo $heroTwo["hero"]["alt"]; ?>">
          <img class="img img1 animate" src="<?php echo $heroTwo["img"]; ?>" alt="laika">

        </div>
        <div class="hexagon-purple-light animate"></div>
      </div>
  </section>



  <!-- third section-->
  <section class="block policies ">
    <div class="container-xl mt-5">
      <div class="row headline">
        <h4> <?php echo $pageFields["sec_three_heading"]; ?></h4>
        <div class="text">
          <?php  echo $pageFields["sec_three_text"]; ?>
        </div>
      </div>
    </div>

    <div class="container-xl mt-5 content-list">
      <div class="row">
        <?php $list = $pageFields["sec_three_list"]; ?>
        <div class="box">

          <?php foreach ($list as $secTwoListValue): ?>
          <?php //var_dump($secTwoListValue); ?>
          <div class="items_wrap">

            <article class="item">
              <div class="items_img" style="background-image: url('<?php echo $secTwoListValue['image'] ?>')">
              </div>
              <?php if($secTwoListValue['heading']){?><h3><?php echo $secTwoListValue['heading']; ?></h3><?php } ?>
              <p class="items_paragraph"><?php echo nl2br($secTwoListValue['text']) ?></p>
            </article>

          </div>

          <?php endforeach; ?>
        </div>
        <div class="hexagon-outline animate"></div>
        <div class="hexagon-purple animate"></div>
        <div class="bg-lines2"> </div>
      </div>
    </div>
  </section>

  <!-- four section-->
  <section class="block question-library two-blocks">
    <div class="container-xl">
      <div class="row">

        <?php $hero4= $pageFields["hero_group_four"]; ?>
        <div class="product-img">
          <img class="shadow" src="<?php echo $hero4["hero"]["url"]; ?>" alt="<?php echo $hero4["hero"]["alt"]; ?>">
          <img class="img img1 animate" src="<?php echo $hero4["img"]; ?>" alt="laika">

        </div>


        <div class="description">
          <h2><?php echo $pageFields['sec_four_heading']; ?></h2>
          <div class="text"><?php echo $pageFields['sec_four_text']; ?></div>

          <?php 
          $link = $pageFields["sec_four_link"]; 
          if($link){ ?> <a class="home-text-link text-link arrow arrow-start" href="<?php echo $link['link']; ?>">
            <?php echo $link['name']; ?></a>
          <?php } ?>

        </div>
        <div class="shape-l"></div>
      </div>
    </div>
  </section>



  <!-- fifth section-->
  <section class="block powered-experts two-blocks">
    <div class="container-xl">
      <div class="row">

        <div class="description">
          <?php $link = $pageFields['sec_five_link']; ?>
          <h2><?php echo $pageFields['sec_five_heading']; ?></h2>
          <div class="text"><?php echo $pageFields['sec_five_text']; ?></div>
          <a class="home-text-link text-link arrow arrow-start"
            href="<?php echo $pageFields['sec_five_link']['link']; ?>"><?php echo $pageFields['sec_five_link']['name']; ?></a>

        </div>


        <?php $hero5 = $pageFields["hero_group_five"]; ?>
        <div class="product-img">
          <img class="shadow" src="<?php echo $hero5["hero"]["url"]; ?>" alt="<?php echo $hero5["hero"]["alt"]; ?>">
          <img class="img img1 animate" src="<?php echo $hero5["img"]; ?>" alt="laika">
        </div>
        <div class="shape-line"></div>
        <div class="hexagon-lines animate"></div>
      </div>
    </div>
  </section>

  <!-- cta Reques Demo-->
  <?php 
  $cta_4 = get_field('cta_4', 'option');
  $cta_bg = get_field('cta_bg', 'option');
  $cta_btn = get_field('request_demo_button', 'option');
 
  ?>

  <section class="cta cta4" style="background: url(<?php echo $cta_bg['bg_purple']['url']; ?>)">
    <div class="container">
      <div class="row">
        <h2><?php echo $cta_4['title']; ?></h2>

        <a class=" button button-teal button-animation" rel="noopener"
          href="<?php echo $cta_btn['url']; ?>"><span><?php echo $cta_btn['title']; ?></span>
        </a>
      </div>
    </div>
  </section>
  <!-- /. cta Reques Demo-->

  <!-- 6 demo -->
  <!-- puedo hacer uno general y que tenga un drop down de bg y un text field o un drop down de text -->

</div>


<?php get_footer(); ?>
