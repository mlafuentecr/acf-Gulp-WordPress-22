<?php
/*
Template Name: Request Demo purple ver
*/
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$form = get_field('form_content');

/*  7 Quote  */
$seventh_heading   = get_field('seventh_heading', 'options');
$seventh_testimonial  = get_field('seventh_testimonial', 'options');
$seventh_name  = get_field('seventh_name', 'options');
$seventh_position  = get_field('seventh_position', 'options');
$seventh_photo  = get_field('seventh_photo', 'options');
$seventh_link  = get_field('seventh_link', 'options');
if( $fifth_link  ): 
  $link_seven_url     = $seventh_link ['url'];
  $link_seven_title   = $seventh_link ['title'];
  $link_seven_target  = $seventh_link ['target'] ? $link['target'] : '_self';
endif;
?>
<div id="demo" class="intern-pg  demo-purple">


  <!-- four section-->
  <section class="block content m-2">

    <div class="box headline box-purple ">
      <h1><?php echo $pageFields['banner_title']; ?></h1>
      <p class="banner-content"><?php echo $pageFields['banner_content']; ?></p>
      <div class="decoration"></div>
    </div>


    <div class="box-3">

      <?php
// Check rows exists.
if( have_rows('box') ):
    // Loop through rows.
    while( have_rows('box') ) : the_row(); ?>


      <div class="box col-4 box-purple ">
        <h3><?php echo get_sub_field('title'); ?></h3>
        <div class="subtitle"><?php echo get_sub_field('subtitle'); ?></div>
        <p class="banner-content">
          <?php echo get_sub_field('list'); ?>
        </p>
      </div>

      <?php   // End loop.
    endwhile;
else :
    // Do something...
endif;

?>

      <!-- 7 quote  -->
      <section class="quotes bg-gray">
        <div class="container">
          <div class="row">
            <h2><?php echo $seventh_heading; ?></h2>
            <a rel="noopener" href="<?php echo $link_seven_url; ?>">
              <div class="content">
                <div class="imgcontainer">
                  <img loading=“lazy” src="<?php echo $seventh_photo["url"]; ?>" alt="<?php echo $seventh_name; ?>">
                </div>
                <div class="text">
                  <?php echo $seventh_testimonial; ?>
                  <div class="home-section__testimon-name">Shayne Skaff</div>
                  <div class="home-section__testimon-position">CEO &amp; Co-Founder, Blooma</div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </section>


    </div>

  </section>








  <section class="block  form m-2 ">
    <div class="container-xl">

      <div class="row ">
        <div class="box-with-tab removeTab">
          <h2><?php echo $form["title"]; ?></h2>

          <!-- form (start) -->
          <!--[if lte IE 8]>
                <script charset="utf-8" type="text/javascript"
                        src="//js.hsforms.net/forms/v2-legacy.js"></script>
                <![endif]-->
          <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
          <script>
          hbspt.forms.create({
            portalId: "7851520",
            formId: "889464f6-ad79-4e62-8771-8a9739c2a7cc"
          });
          </script>
          <!-- form (end) -->
        </div>
      </div>

    </div>
  </section>




</div>
<?php   edit_post_link(__('Edit This page'));  ?>

<?php get_footer(); ?>
