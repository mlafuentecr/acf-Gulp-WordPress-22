<?php 
/*
Template Name: Thank You
*/

$bannerTitle = get_field('banner_title');
$bannerSubhead = get_field('banner_subhead');
$bannerContent = get_field('banner_content');
$bannerLink = get_field('banner_link');


get_header(); ?>
<div id="contact-us" class="intern-pg">
    <!-- 0 banner -->
    <section class="intro-banner">
    <div class="container-xl">
      <div class="row">
      <article class="headline">
      <?php if($bannerTitle):?>
					<h2><?php echo $bannerTitle; ?></h2>
				<?php endif; ?>
				<?php if($bannerSubhead):?>
					<h3><?php echo $bannerSubhead; ?></h3>
				<?php endif; ?>
				<?php if($bannerContent):?>
					<p><?php echo $bannerContent; ?></p>
				<?php endif; ?>
				<?php if($bannerLink):?>
					<a class="button button-teal btn-animation" href="<?php echo $bannerLink['url']; ?>" target="<?php echo $bannerLink['target']; ?>"><span><?php echo $bannerLink['title']; ?></span></a>
				<?php endif; ?>
			</article>
      </div>
    </div>
  </section>

</div>

<?php   edit_post_link(__('Edit This page'));  ?>

<?php get_footer(); ?>
