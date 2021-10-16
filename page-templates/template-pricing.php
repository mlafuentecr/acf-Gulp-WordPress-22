<?php
/*
Template Name: Pricing
*/

$bannerTitle = get_field('banner_title');

include( get_template_directory().'/parts/global-variables.php' );

get_header(); ?>

<div id="pricing" class=" intern-pg">
  <!-- 0 banner -->
  <section class="intro-banner">
    <div class="container-xl">
      <div class="row">
        <article class="headline">
          <h1><?php echo $bannerTitle; ?></h1>
        </article>
      </div>
    </div>
  </section>

  <section class="group block-pricing">
    <div class="grid-container">
      <?php $c = 0; if( have_rows('pricing_section') ): ?>
      <div class="grid-x grid-pricing">
        <?php while( have_rows('pricing_section') ): the_row();
					$row1Title = get_sub_field('row_1_title');
					$row2Title = get_sub_field('row_2_title');
					$col1Contact = get_sub_field('col_1_contact');
					$col2Contact = get_sub_field('col_2_contact');
					$c++;
					?>
        <div class="grid-group">
          <div class="row row-0">
            <div class="col col-1 main-title">

            </div>
            <div class="col col-2 main-title">
              <?php if($row1Title): ?>
              <p class="col-title"><?php echo $row1Title; ?></p>
              <?php endif; ?>
            </div>
            <div class="col col-3 main-title">
              <?php if($row2Title): ?>
              <p class="col-title"><?php echo $row2Title; ?></p>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php $c2= 0; if( have_rows('price_group') ): while( have_rows('price_group') ): the_row(); $c2++; ?>
        <div class="grid-group">
          <?php $c3= 0; if( have_rows('price_repeater') ): while( have_rows('price_repeater') ): the_row();
							$select = get_sub_field('select_style');
							$listCategory = get_sub_field('list_category');
							$inStarter = get_sub_field('included_in_starter');
							$inGrowth = get_sub_field('included_in_growth');
							$groupTitle = get_sub_field('group_title');
							$lcr1 = get_sub_field('lcr_1');
							$lcr2 = get_sub_field('lcr_2');
							$c3++;
							?>

          <div
            class="row row-<?php echo $c3; ?> row-group-<?php echo $c2; ?> <?php if($select == 'title'): echo 'row-title'; endif; ?>">
            <div class="col col-1 <?php if($select == 'title'): echo 'main-title'; endif; ?>">
              <?php if($select == 'title'): ?>
              <p class="title"><?php echo $groupTitle; ?></p>
              <?php elseif($select == 'list-item'): ?>
              <p class="category"><?php echo $listCategory; ?></p>
              <?php endif; ?>
            </div>
            <div class="col col-2 <?php if($select == 'title'): echo 'main-title'; endif; ?>">
              <?php if($select == 'list-item'): ?>
              <?php if($lcr1): ?>
              <p><?php echo $lcr1; ?></p>
              <?php else: ?>
              <svg id="iconPrice" viewBox="0 0 23 27" class="<?php if($inStarter == 1): echo 's-active'; endif; ?>">
                <polygon class="price0" points="0,6.9 0,20.1 11.5,26.7 23,20.1 23,6.9 11.5,0.3 	" />
              </svg>
              <?php endif; ?>
              <?php elseif($select == 'title'): ?>

              <?php endif; ?>
            </div>
            <div class="col col-3 <?php if($select == 'title'): echo 'main-title'; endif; ?>">
              <?php if($select == 'list-item'): ?>
              <?php if($lcr2): ?>
              <p><?php echo $lcr2; ?></p>
              <?php else: ?>
              <svg id="iconPrice" viewBox="0 0 23 27" class="<?php if($inGrowth == 1): echo 'g-active'; endif; ?>">
                <polygon class="price0" points="0,6.9 0,20.1 11.5,26.7 23,20.1 23,6.9 11.5,0.3 	" />
              </svg>
              <?php endif; ?>
              <?php elseif($select == 'title'): ?>

              <?php endif; ?>
            </div>
          </div>

          <?php endwhile; endif; ?>
        </div>
        <?php endwhile; endif; ?>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
    </div>
  </section>


  <!-- cta Reques Demo-->
  <?php 

$bg = "background-image: url(".get_template_directory_uri()."/inc/images/bg-demo.jpg";
$btn = "button button-teal btn-animation content-center";
$contact = get_field('contact');
$contact1 = $contact['col_1_contact'];
$contactHeadline = $contact['heading'];
?>

  <section class="cta block" style="<?php echo $bg; ?>">
    <div class="container">
      <div class="row">
        <h2><?php echo $contactHeadline; ?></h2>
        <div class="text"><?php echo $pageFields['demo_one_text'] ?></div>
        <a class=" <?php echo $btn?>" rel="noopener" href="<?php echo $contact1['url']; ?>"
          target=""><span><?php echo $contact1['title']; ?></span>
        </a>
      </div>
    </div>
  </section>
  <!-- /. cta Reques Demo-->

</div>

<?php get_footer(); ?>
