<?php
/*
Template Name: Customer Success
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page Customer Success
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();

?>
<div id="customer-success" class="intern-pg">

  <!-- 0 banner  -->
  <?php 
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$banner_content = $pageFields['banner_content'];
$banner_media_content = $pageFields['banner_media_content'];
$featuredstory = $pageFields['featured_story'];
$quote_picture = $pageFields['quote_picture'];
$quote_content = $pageFields['quote_content'];
$read_more_btn = $pageFields['read_more_btn'];
$g2_text = $pageFields['g2-text'];
$g2_logos = $pageFields['g2-logos'];
$cta = $pageFields['cta'];
//var_dump($featuredstory['url']);
?>
  <!-- 0 banner -->
  <section class="intro-banner" style="background-image: url(<?php echo $pageFields['banner_background']; ?>);">
    <div class="container">
      <?php if ($pageFields['banner_title']): ?>

      <div class="col-md-6 col-12 d-flex flex-wrap align-items-center">
        <div class="main-content">
          <p class='customer_banner_title col-12'><?php echo $banner_content['banner_title']; ?></p>
          <p class="customer_banner_subtitle col-12"><?php echo $banner_content['banner_subtitle']; ?> </p>
          <p class="customer_banner_content col-12"><?php echo $banner_content['banner_content']; ?> </p>

        </div>
        </a>
      </div>
      <div class="col-md-6 col-12 d-flex flex-wrap justify-content-end align-items-center">
        <?php 
            if($banner_media_content['type'] === "Video") : 
              $videoDiv = '<div class="video-youtube text-end">
              <a href="videoModal" data-bs-toggle="modal" data-bs-target="#videoModal">
              <img class="lazyload icon-video" src="'. get_template_directory_uri() .'/inc/images/video-icon.png"/>';
              $videoDiv .= '<img class="lazyload img-video" src="'.$banner_media_content['video_thumbnail']['url'].'"
                alt="'.$banner_media_content['video_thumbnail']['title'].'" />';
              $videoDiv .= '</a>
          </div>';
          echo $videoDiv;
          endif;
          ?>
      </div>

      <?php endif; ?>
    </div>
  </section>

  <!-- MODAL VIDEO-->
  <?php if($banner_media_content['type'] === "Video") : ?>
  <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="gridModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid bd-example-row">
            <div class="youtube">
              <iframe width="100%" height="600" src="<?php echo $banner_media_content['video']; ?>" title="video Laika"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>



  <div class="bg-gray">
    <section class="customers mt-5 d-flex flex-wrap">

      <div class="container">
        <section class="filter col-12">
          <div class="bg-purple rounded text-center d-flex  justify-content-center align-items-center">
            dsdsd
          </div>
        </section>
      </div>

      <div class="container">
        <section class="featured box  rounded p-0 m-0 my-3 d-flex ">
          <div class="d-flex flex-wrap m-0 p-0 col-12  ">
            <div class="col-md-12 col-lg p-5 d-flex justify-content-center align-items-center ">
              <img class='lazyload' src='<?php echo $featuredstory['logo']['url']; ?>'
                alt='<?php echo $featuredstory['logo']['title']; ?>' />
            </div>

            <div class="col-md-12 col-lg  p-md-5 pt-sm-0">
              <p class="col-12 text-lg-start text-md-center"><?php echo $featuredstory['featured_text']; ?></p>
              <p class="col-12 text-lg-start text-md-center"><?php echo $featuredstory['featured_content']; ?></p>
              <div class="btn-wrap text-start col-12">
                <a class="button reques-demo button-purple text-lg-start text-md-center m-lg-0 m-md-auto mb-5 mb-md-0"
                  rel="noopener"
                  href="<?php echo $featuredstory['cta_link']; ?>"><span><?php echo $featuredstory['cta']; ?></span>
                </a>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="customers-boxes container">
        <div class="row p-0  gx-3 ">
          <div class="col-md-12 col-lg mb-3">
            <div class="box rounded p-3 border">
              <figure>
                img
              </figure>
              <div class="content">
                <h3>We Raised a $35M Series B!</h3>
                <div class="description">Today, we're excited to announce our $35 million Series B led by JPMorgan. You
                  can
                  read all about it in our press release and how our team has built the...</div>
                <a href="https://heylaika.com/blog/laika-announcements/series-b/" class="arrow">Learn more</a>
                <div class="cat"><span> Laika Announcements </span></div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg mb-3">
            <div class="box rounded p-3 border">
              <figure>
                img
              </figure>
              <div class="content">
                <h3>We Raised a $35M Series B!</h3>
                <div class="description">Today, we're excited to announce our $35 million Series B led by JPMorgan. You
                  can
                  read all about it in our press release and how our team has built the...</div>
                <a href="https://heylaika.com/blog/laika-announcements/series-b/" class="arrow">Learn more</a>
                <div class="cat"><span> Laika Announcements </span></div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg mb-3">
            <div class="box rounded p-3 border">
              <figure>
                img
              </figure>
              <div class="content">
                <h3>We Raised a $35M Series B!</h3>
                <div class="description">Today, we're excited to announce our $35 million Series B led by JPMorgan. You
                  can
                  read all about it in our press release and how our team has built the...</div>
                <a href="https://heylaika.com/blog/laika-announcements/series-b/" class="arrow">Learn more</a>
                <div class="cat"><span> Laika Announcements </span></div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </section>


    <section class="testimonial bg-white shadow-top_out shadow-bottom_out  my-5 py-5">
      <div class="container my-5">
        <div class="d-flex flex-wrap m-0 p-0 col-12 justify-content-md-around">
          <div class="col-lg-6 col-12 d-flex flex-wrap align-items-center mb-5 mb-md-0">
            <img class='lazyload m-auto mb-4 m-lg-0 shadow rounded-0' src='<?php echo $quote_picture['url']; ?>'
              alt='<?php echo $quote_picture['title']; ?>' />

          </div>
          <div class="col-lg-5 col-12 d-flex flex-wrap align-items-center mt-0 mt-sm-5">
            <div class="quote_content col-12 "><?php echo $quote_content['quote']; ?></div>
            <div class="quote_name col-12"><?php echo $quote_content['name']; ?></div>
            <div class="quote_profession col-6"><?php echo $quote_content['profession']; ?></div>
            <div class="quote_logo col-6  text-end"><img class='lazyload'
                src='<?php echo $quote_content['logo']['url']; ?>'
                alt='<?php echo $quote_content['logo']['title']; ?>' />
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php if($read_more_btn['url']): ?>
    <a class="button reques-demo button-purple text-lg-start text-md-center m-auto   mb-5 mb-md-0" rel="noopener"
      target="target" href="<?php echo $read_more_btn['url']; ?>"><span><?php echo $read_more_btn['title']; ?></span>
    </a>
    <?php endif; ?>


    <section class="g2 bg-white mt-5 p-5">
      <div class="container">
        <div class="d-flex flex-wrap  justify-content-md-around m-0 p-0 col-12 m-5 m-sm-0 ">
          <div class="col-md-5 col-12 ">
            <?php echo $g2_text; ?>
          </div>
          <div class="col-12 col-md-6 ml-5 mt-5 ">
            <div class="col-12 d-flex border-bottom pb-3">
              <img class='lazyload badges m-auto ' src='<?php echo $g2_logos['url']; ?>'
                alt='<?php echo $g2_logos['title']; ?>' />
            </div>
            <div
              class="col-xl-10 col-md-12 m-auto d-flex border-bottom pb-3 align-content-center justify-content-center">

              <div class="col m-0 p-0 text-center">

                <div class="circle-wrap m-auto">
                  <div class="circle circle-1 full-8">
                    <div class="mask full ">
                      <div class="fill"></div>
                    </div>
                    <div class="mask half">
                      <div class="fill"></div>
                    </div>
                    <div class="inside-circle "> 8.7 </div>
                  </div>
                </div>
                <div class="text mt-2">Ease of Use</div>
              </div>

              <div class="col m-0 p-0 text-center">
                <div class="circle-wrap m-auto">
                  <div class="circle circle-2 full-9">
                    <div class="mask full ">
                      <div class="fill"></div>
                    </div>
                    <div class="mask half">
                      <div class="fill"></div>
                    </div>
                    <div class="inside-circle"> 9 </div>
                  </div>
                </div>
                <div class="text mt-2">Quality of Support</div>
              </div>

              <div class="col m-0 p-0 text-center">
                <div class="circle-wrap m-auto">
                  <div class="circle  circle-3 full-9">
                    <div class="mask full ">
                      <div class="fill"></div>
                    </div>
                    <div class="mask half">
                      <div class="fill"></div>
                    </div>
                    <div class="inside-circle"> 9 </div>
                  </div>
                </div>
                <div class="text mt-2">Ease of Setup</div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php get_footer(); ?>
