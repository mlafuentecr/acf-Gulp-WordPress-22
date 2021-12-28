<?php
/*
Template Name: Request Demo
*/
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$form = get_field('form_content');

?>
<div id="demo" class="intern-pg">


  <!-- 0 banner -->
  <section class="intro-banner">
    <div class="container-xl">
      <div class="row">
        <article class="headline">
          <?php if ($pageFields['banner_title']): ?>
          <h1><?php echo $pageFields['banner_title']; ?></h1>
          <?php endif; ?>
          <?php if ($pageFields['banner_content']): ?>
          <p class="banner-content"><?php echo $pageFields['banner_content']; ?></p>
          <?php endif; ?>
        </article>

      </div>
    </div>

  </section>


  <!-- four section-->


  <section class="block  form">
    <div class="container-xl">

      <div class="row moveup">
        <div class="box-with-tab ">
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
        <div class="bg-lines2"> </div>
      </div>

    </div>
  </section>





  <!-- 6 demo -->
  <!-- puedo hacer uno general y que tenga un drop down de bg y un text field o un drop down de text -->

</div>


<?php get_footer(); ?>
