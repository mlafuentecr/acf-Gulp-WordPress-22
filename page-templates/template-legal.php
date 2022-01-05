<?php 
/*
Template Name: Legal
*/

$bannerTitle = get_field('banner_title');
$mainContent = get_field('main_content');

get_header(); ?>

<div id="legal" class="intern-pg">
    <!-- 0 banner -->
    <section class="intro-banner">
    <div class="container">
      <div class="row">
      <article class="headline">
      <?php if($bannerTitle): ?>
					<h1><?php echo $bannerTitle; ?></h1>
				<?php endif; ?>
			</article>
      </div>
    </div>
  </section>

      <!-- 2 content -->
      <section class="content">
    <div class="container">
      <div class="row">
 
      <div class="block-nav">
					<?php if( have_rows('sidebar_nav') ): ?>
					<ul>
						<?php while( have_rows('sidebar_nav') ): the_row(); 
						$nav = get_sub_field('nav');
						?>
						<li><a class="scroll_to" href="#<?php echo strtolower(str_replace(' ', '-', $nav ) ); ?>"><?php echo $nav; ?></a></li>
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>
				</div>

        <article>
					<?php echo $mainContent; ?>
				</article>

      </div>
    </div>
  </section>


</div>



<?php get_footer(); ?>
