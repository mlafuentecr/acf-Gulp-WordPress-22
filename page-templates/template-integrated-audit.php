<?php
/*
Template Name: Integrated Audit
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$bannerGroup = $pageFields['banner_audit_left_col'];//
$bannerBtn  = $pageFields['banner_button_audit'];
?>
<div id="integrated-audit" class="intern-pg">

  <!-- 0 banner sec1-->
  <section class="intro-banner" style="background-image: url(<?php echo $bannerGroup['banner_bg_audit']; ?>);">
    <div class="container-xl">
      <div class="row">
        <article class="headline">
          <?php if ($bannerGroup['banner_title_audit']): ?>
          <h1><?php echo $bannerGroup['banner_title_audit']; ?></h1>
          <?php endif; ?>
          <?php if ($bannerGroup['banner_content_audit']): ?>
          <p class="banner-content"><?php echo $bannerGroup['banner_content_audit']; ?></p>
          <?php endif; ?>


          <a class=" button button-purple btn-animation  " rel="noopener"
            href='<?php echo $bannerGroup["link_audit"]["url"]; ?>'
            target=""><span><?php echo$bannerGroup["link_audit"]["title"]; ?></span>
          </a>



        </article>
        <div class="hero-media  ">
          <img src="<?php echo $pageFields['banner_media_audit']["image"]; ?>"
            alt="<?php echo $pageFields['banner_media_audit']["description"]; ?>" data-pin-nopin="true">
        </div>
      </div>
    </div>
  </section>



  <!-- sec2 section-->
  <section class="block sec2 policies ">

    <div class="container-xl ">
      <div class="row headline">
        <h4> <?php echo $pageFields["sec_three_heading"]; ?></h4>
        <div class="text">
          <?php  echo $pageFields["sec_three_text"]; ?>
        </div>

      </div>
    </div>

    <!-- Why Laika?-->
    <div class="container-fluid bg-white content-list">
      <div class="container-xl ">
        <div class="row">



          <div class="white-headline">
            <?php if( $pageFields["subtitle_audit"] ){echo '<p class="subtitle">'. $pageFields["subtitle_audit"] .'</p>';} ?>
            <?php if( $pageFields["sec2title_audit"] ){echo '<h4>'. $pageFields["sec2title_audit"] .'</h4>';} ?>
            <?php $list =   $pageFields["sec2_list_audit"]; ?>
            <?php foreach ($list as $secTwoListValue): ?>
            <div class="items_wrap">
              <article class="item">
                <div class="items_img  " style="background-image: url('<?php echo $secTwoListValue['image'] ?>')">
                </div>
                <h5><?php echo $secTwoListValue['heading']; ?></h5>
                <p class="items_paragraph"><?php echo nl2br($secTwoListValue['text']) ?></p>
              </article>
            </div>
            <?php endforeach; ?>
          </div>



        </div>
      </div>
    </div>
  </section>


  <!--  Logos -->
  <?php get_template_part( '/inc/parts/slider_logos' ); ?>
  <!--  /.  2 Logos  -->


  <!-- sec3 section-->
  <section class="block sec3 two-blocks">
    <div class="container-xl">
      <div class="row">

        <?php $hero_sec3 = $pageFields["hero_sec3"]; ?>
        <?php $right_col_3 = $pageFields["right_col_3"]; ?>
        <div class="product-img animate">
          <img src="<?php echo $hero_sec3["url"]; ?>" alt="<?php echo $hero_sec3["alt"]; ?>">
          <img class="img img2 animate" src="<?php echo $right_col_3["animate_img"]; ?>" alt="laika">
        </div>

        <div class="description">
          <p class="sub_heading"><?php echo $right_col_3['sub_heading']; ?></p>
          <h2><?php echo $right_col_3['heading']; ?></h2>
          <div class="text"><?php echo $right_col_3['text']; ?></div>
          <?php $link = $right_col_3["link"]; ?>
          <?php if($link){ ?> <a class="home-text-link text-link arrow" href="<?php echo $link['link']; ?>">
            <?php echo $link['name']; ?></a> <?php } ?>
        </div>

      </div>
    </div>
  </section>


  <!-- sec4 section-->
  <section class="block sec4 two-blocks">
    <div class="container-xl">
      <div class="row">

        <?php $hero_sec4 = $pageFields["hero_sec4"]; ?>
        <?php $left_col_4 = $pageFields["left_col_4"]; ?>

        <div class="description">
          <p class="sub_heading"><?php echo $left_col_4['sub_heading']; ?></p>
          <h2><?php echo $left_col_4['heading']; ?></h2>
          <div class="text"><?php echo $left_col_4['text']; ?></div>
          <?php $link = $left_col_4["link"]; ?>
          <?php if($link['link']){ ?> <a class="home-text-link text-link arrow" href="<?php echo $link['link']; ?>">
            <?php echo $link['name']; ?></a> <?php } ?>
        </div>

        <div class="product-img animate">
          <img src="<?php echo $hero_sec4["url"]; ?>" alt="<?php echo $hero_sec4["alt"]; ?>">
        </div>

      </div>
  </section>



  <!-- sec5 section-->
  <section class="block sec5 two-blocks">
    <div class="container-xl">
      <div class="row">

        <?php $hero_sec5 = $pageFields["hero_sec_5"]; ?>
        <?php $right_col_5 = $pageFields["right_col_5"]; ?>


        <div class="product-img animate">
          <img src="<?php echo $hero_sec5["url"]; ?>" alt="<?php echo $hero_sec5["alt"]; ?>">
        </div>

        <div class="description">
          <p class="sub_heading"><?php echo $right_col_5['sub_heading']; ?></p>
          <h2><?php echo $right_col_5['heading']; ?></h2>
          <div class="text"><?php echo $right_col_5['text']; ?></div>
          <?php $link = $right_col_5["link"]; ?>
          <?php if($link){ ?> <a class="home-text-link text-link arrow" href="<?php echo $link['link']; ?>">
            <?php echo $link['name']; ?></a> <?php } ?>
        </div>


      </div>
    </div>
  </section>


  <!-- sec6 section-->
  <section class="block sec5 two-blocks">
    <div class="container-xl">
      <div class="row">
        <div class="box">

          <?php $hero_sec6 = $pageFields["hero_sec_6"]; ?>
          <?php $right_col_6 = $pageFields["right_col_6"]; ?>


          <div class="product-img ">
            <img src="<?php echo $hero_sec6["url"]; ?>" alt="<?php echo $hero_sec6["alt"]; ?>">
          </div>

          <div class="description">
            <p class="sub_heading"><?php echo $right_col_6['sub_heading']; ?></p>
            <h2><?php echo $right_col_6['heading']; ?></h2>
            <div class="text"><?php echo $right_col_6['text']; ?></div>
            <?php $link = $right_col_6["link"]; ?>
            <?php if($link){ ?> <a class="home-text-link text-link arrow" href="<?php echo $link['link']; ?>">
              <?php echo $link['name']; ?></a> <?php } ?>
          </div>

        </div>
      </div>
    </div>
  </section>



  <!-- cta Reques Demo-->
  <?php 
  $cta4 = get_field("cta_4", "option");
  ?>

  <section class="cta cta4" style="background: url(<?php echo $cta4["bg_2"]["url"]; ?>)">
    <div class="container">
      <div class="row">
        <h2><?php echo $cta4["title"] ; ?></h2>

        <a class=" button button-teal btn-animation" rel="noopener"
          href="<?php echo $cta4["btn"]["url"]; ?>"><span><?php echo $cta4["btn"]["title"]; ?></span>
        </a>
      </div>
    </div>
  </section>
  <!-- /. cta Reques Demo-->


</div>


<?php get_footer(); ?>
