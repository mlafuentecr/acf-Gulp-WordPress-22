<?php
/*
Template Name: About Page
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/

$bannerTitle = get_field('banner_title');
$bannerContent = get_field('banner_content');

?>

<div id="contact-us" class="intern-pg">

    <!-- 0 banner -->
    <section class="intro-banner">
    <div class="container-xl">
      <div class="row">
      <article class="headline">
				<?php if($bannerTitle): ?>
					<h1><?php echo $bannerTitle; ?></h1>
				<?php endif; ?>
				<?php if($bannerContent): ?>
					<p class="subhead"><?php echo $bannerContent; ?></p>
				<?php endif; ?>
			</article>
      </div>
    </div>
  </section>


  <section class="block  form">
    <div class="container-xl">

	  <div class="row moveup">
        <div class="box-with-tab ">

				<?php if( have_rows('form_content') ): while( have_rows('form_content') ): the_row(); 
					$title = get_sub_field('title');
					$caption = get_sub_field('caption');
					?>
						<article>
							<?php if ($title): ?>
								<h2><?php echo $title; ?></h2>
							<?php endif; ?>
							<?php if ($caption): ?>
								<p><?php echo $caption; ?></p>
							<?php endif; ?>
                            <!-- form (start)-->
                            <!--[if lte IE 8]>
                            <script charset="utf-8" type="text/javascript"
                                    src="//js.hsforms.net/forms/v2-legacy.js"></script>
                            <![endif]-->
                            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                            <script>
                                hbspt.forms.create({
                                    portalId: "7851520",
                                    formId: "606a62f4-7121-48e8-be68-8aa3e6755e10"
                                });
                            </script>
                            <!-- form (end)-->

						</article>
				<?php endwhile; endif; ?>
			 </div>
        <div class="bg-lines2"> </div>
      </div>

    </div>
  </section>





  </div>


<?php get_footer(); ?>
