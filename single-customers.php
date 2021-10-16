<?php
  defined( 'ABSPATH' ) || exit;
  get_header();
  /*-----------------------------------------------------------------------------------*/
  /*  ACF Page our-value
  /*-----------------------------------------------------------------------------------*/
  $pageFields = get_fields();
  //PREVIEW CUSTOMER POST ACF
  $preview = $pageFields["preview_customer_post"];
  //$preview['logo'];

  //Company Description //////////
  $description  = $pageFields["company_descr"];
  $form         = $description["application_form"];
  /////////////////////////////////

  //Tab3 PROBLEM
  $problem  = $pageFields['problem_group'];
  //Tab 4 Solution
  $solution  = $pageFields['solution_group'];
  //Tab 5 Result
  $result  = $pageFields['result_group'];
  //Tab 6 Quote
  $quote  = $pageFields['quote_group'];
  //Tab 7 expert
 
  ?>



<div class="customer-post single-customer-stories">

  <!-- 0 banner -->
  <section class="intro-banner" style="background-image: url(<?php echo $pageFields['banner_img']; ?>);">
    <div class="container-xl">
      <div class="row">

        <article class="headline">
          <h1><?php echo get_the_title(); ?></h1>
          <?php if ($pageFields['banner_content']): ?>
          <p class="banner-content"><?php echo $pageFields['banner_content']; ?></p>
          <?php endif; ?>
        </article>

      </div>
    </div>
  </section>

  <div class="container-xl">
    <div class="row">

      <section class="company-descr moveup">
        <article>

          <div class="box-shadow box-with-tab">
            <div class="content">
              <div class="logo">
                <img loading=“lazy” src="<?php echo $preview["logo"]; ?>"
                  alt="<?php $preview["label"]["label_text"]; ?>">
              </div>

              <div class="descrip">
                <h2><?php echo $description["title"]; ?></h2>
                <div class="about"><?php echo $description["content"]; ?></div>

                <div class="details">
                  <?php  if( $form ) {  foreach( $form as $row ) { ?>

                  <div class="item">
                    <div class="option"><?php  echo $row["option"] ?></div>
                    <div class="description"><?php  echo $row["description"] ?></div>
                  </div>
                  <?php  } } ?>
                </div>
              </div>
            </div>
          </div>

    </div>
    </article>
    </section>


    <div class="row">
      <?php the_content(); ?>
    </div>

    <section class="expert mb-5">
      <h3> <?php  echo $pageFields['expert_heading']; ?></h3>
      <div class="box-shadow m-2">

        <div class="header">

          <div class="img">
            <img loading=“lazy” src="<?php  echo $pageFields['expert_photo']; ?>"
              alt="<?php  echo $pageFields['expert_name']; ?>">
          </div>

          <div class="description">
            <h2> <?php  echo $pageFields['expert_name']; ?></h2>
            <div class="position"><?php  echo $pageFields['expert_position']; ?></div>
          </div>

        </div>

        <div class="content">
          <?php  echo $pageFields['expert_text']; ?>
        </div>

      </div>
      <div class="bg-lines2"> </div>

    </section>

  </div>
</div>

</div>


<?php get_footer(); ?>
