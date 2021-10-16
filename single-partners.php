<?php
get_header();
global $post;

$page_fields = get_fields();
$accordion = get_field('accordion' );
$sec3Icons = get_field('box' );
$logo = get_field('logo_repeater', 'option');


/*  6  futureProof  */
$sixth_heading   = get_field('sixth_heading', 'options');
$sixth_col1  = get_field('sixth_left_text', 'options');
$sixth_col2  = get_field('sixth_right_text', 'options');
$sixth_right_list  = get_field('sixth_right_list', 'options');

/*  7 Quote  */
$sixth_heading   = get_field('seventh_heading', 'options');
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


<div class="partner_pg">


  <!-- 0 banner -->
  <section id='section-1' class="intro-banner  "
    style="background-image: url(<?php echo $page_fields['bg-image_sec1']; ?>);">

    <div class="container-xl">
      <div class="row">
        <div class="textWrapper">
          <div class="logos">
            <?php if($page_fields['logo_partner']['url']): ?>
            <img loading=“lazy” src="<?php echo $page_fields['logo_partner']['url']; ?>"
              alt="<?php echo $page_fields['logo_partner']['alt']; ?>">
            <?php endif; ?>

            <?php if($page_fields['logo_laika']['url']): ?>
            <img loading=“lazy” src="<?php echo $page_fields['logo_laika']['url']; ?>"
              alt="<?php echo $page_fields['logo_partner']['alt']; ?>">
            <?php endif; ?>
          </div>
          <h1><?php echo $page_fields['title_sec1']; ?></h1>
          <main class="text"><?php echo $page_fields['content_sec1']; ?></main>

        </div>

        <div class="form">
          <?php echo $page_fields['form']; ?>
        </div>
      </div>
    </div>
  </section>



  <div class="section section-2 ">
    <div class="container-xl">
      <div class="row">
        <!-- form section 2 focus on your bussines  -->
        <?php if( get_field('content_2'))   { $link=get_field('btn_sec2'); ?>
        <div class="content">
          <h2> <?php  the_field('title_sec2') ?></h2>
          <div class="content2"><?php  the_field('content_2') ?></div>
          <a class="button-purple button" href="<?php echo $link['url']; ?>"><span><?php echo $link['title']; ?></span>
          </a>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  </section>


  <!-- section3 section-acc -->
  <div class="section section-3 section-acc">
    <article class="item container-xl ">
      <h2 class="heading"><?php echo $page_fields['title_sec3']; ?></h2>
      <!-- accordion1 -->
      <div class="wrapper">

        <?php if( $accordion ) {  ?>

        <div class="acc_slider">

          <!-- IMG -->
          <div class="slide-thumb ">
            <?php  foreach( $accordion as $key=>$row ) {  $image = $row['acc_img'];  ?>
            <img loading=“lazy” src="<?php echo $row['acc_img'] ?>" alt="<?php echo $row['acc_text'] ?>">
            <?php  }  ?>
          </div>

          <div class="accordion-wrapper">
            <?php  foreach( $accordion as $key=>$row ) {   ?>
            <div class="accordion-item" role="tab" data-index="<?php echo $key ?>">
              <div class="acc_title" aria-expanded="false" aria-selected="false">
                <span class="title__text"> <?php echo $row['acc_text'] ?></span>
              </div>

              <div class="panel" aria-hidden="false">
                <p class="panel__description">
                  <?php echo $row['acc_description'] ?>
                </p>
              </div>
            </div>
            <?php }  ?>
          </div>

        </div>

        <?php }  ?>
        <!-- \. accordion1 -->

      </div>
    </article>
  </div>
  <!-- /.section2 -->

  <!-- section-4 icons -->
  <?php if( $sec3Icons ) {  ?>
  <section class="section section-4">
    <div class="container-xl">
      <div class="row">
        <h2 class="heading"><?php echo $page_fields['title_sec4']; ?></h2>
        <div class="content-list">
          <?php  foreach( $sec3Icons as $key=>$row ) {   ?>
          <div class="col">
            <article class="item">
              <div class="img">
                <img class='lazyload' src='<?php echo $row['icon'] ?>' alt='' />
              </div>
              <h3 class="heading"><?php echo $row['sub_title'] ?></h3>
              <p class="paragraph"><?php echo $row['content'] ?></p>
            </article>
          </div>
          <?php  }  ?>
        </div>
      </div>
    </div>
</div>
<?php } ?>



<!-- section 5 dont just take -->

<!-- 7 quote  -->
<section class="quotes bg-gray">
  <div class="container">
    <div class="row">
      <h2><?php echo $sixth_heading; ?></h2>
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


<!--  8 customers logos -->
<?php
/*    section-logo-heading  */
$sectionlogo_heading   = get_field('section-logo-heading', 'option');
$logos = get_field('logo_repeater', 'option');

$link_customer = get_field('link_customer', 'option');
if( $link_customer  ): 
  $link_customer_url     = $link_customer ['url'];
  $link_customer_title   = $link_customer ['title'];
  $link_customer_target  = $link_customer ['target'] ? $link['target'] : '_self';
endif;

?>
<section class="customers bg-gray">
  <div class="container">
    <div class="row">
      <h2><?php echo $sectionlogo_heading; ?></h2>

      <?php 
    if( $logos) {
    echo '<ul class="logos_carusel">';
      foreach( $logos as $row ) {
        echo '<li><a rel="noopener" style="background-image: url(' .  $row["logo"] . ')"   href="'.  $row["logo_link"] .'" target="_blank" ></a></li>';
        }
    echo '</ul>';
      }
      ?>

      <a class='arrow' rel="noopener" href="<?php echo $link_customer_url; ?>"
        target="_blank"><?php echo $link_customer_title; ?></a>
    </div>
  </div>
</section>
<!--  /. 8 customers logos -->
<!-- /. section5 -->



<!-- purple2 -->
<!-- cta Reques Demo-->
<?php 
  $cta = get_field("cta_1", "option");
  $bg = "background-image: url(".get_template_directory_uri()."/inc/images/demo-section-backgr.svg";
      $btn ="home-hero__button button button-purple";
  ?>
<section class="cta" style="<?php echo $bg; ?>">
  <div class="container">
    <div class="row">
      <h2><?php echo $cta["title"] ; ?></h2>
      <a class=" <?php echo $btn?>" rel="noopener" href="<?php echo $cta["btn"]["url"]; ?>"
        target="<?php echo $cta["url"]["title"]; ?>"><span><?php echo $cta["btn"]["title"]; ?></span>
      </a>
    </div>
  </div>
</section>




</div>

<?php get_footer(); ?>
