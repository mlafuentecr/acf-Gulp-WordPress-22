<?php
/*
Template Name: Customer Stories
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------*/
$pageFields = get_fields();
?>
<div id="customer-stories" class="intern-pg">



  <!-- 0 banner -->
  <section class="intro-banner" style="background-image: url(<?php echo $pageFields['banner_img']; ?>);">
    <div class="container-xl">
      <div class="row">
        <article class="headline">
          <?php if ($pageFields['banner_title']): ?>
          <h1><?php echo $pageFields['banner_title']; ?></h1>
          <?php endif; ?>
          <?php if ($pageFields['banner_content']): ?>
          <p class="banner-content"><?php echo nl2br($pageFields['banner_content']); ?></p>
          <?php endif; ?>
        </article>
      </div>
    </div>
  </section>

  <!-- 2 Logos -->
  <?php get_template_part( '/inc/parts/slider_logos' ); ?>
  <!--  /.  2 Logos  -->

  <div class="container">
    <div class="row">

      <?php 
/*-----------------------------------------------------------*/
/*  headline
/*-----------------------------------------------------------*/
echo '<div class="subheadline"><h2>'.$pageFields['heading']."</h2></div>"; ?>


      <?php 
/*-----------------------------------------------------------*/
/*  Query post type
/*-----------------------------------------------------------*/
$args = array(  
    'post_type' => 'customers',
    'post_status' => 'publish',
    'posts_per_page' => 20, 
    'order' => 'ASC', 
);

$loop = new WP_Query( $args ); 
while ( $loop->have_posts() ) : $loop->the_post();  ?>



      <?php
/*-----------------------------------------------------------*/
/*  Get ACF from Customer Quotes
/*-----------------------------------------------------------*/
$previewCustomerPost = get_field('preview_customer_post');
$quoteGroup = get_field('quote_group');

?>
      <?php if (have_rows('preview_customer_post')): ?>
      <?php while (have_rows('preview_customer_post')): the_row();
        $logo = get_sub_field('logo');
        $label = get_sub_field('label');
        $content = get_sub_field('content');
        $author = get_sub_field('author');
        $link = get_sub_field('link');
        ?>

      <article class="customer-post-block box-shadow">
        <section class="entry-content customer-post-entry">
          <div class="customer-post-entry_logo" style="background-image: url(<?= $logo; ?>);"></div>
          <div class="customer-post-entry_label" style="">
            <div class="customer-post-entry_fig1" style="background-color: <?= $label['label_color']; ?>">
              <p><?php echo $label['label_text']; ?></p><span class="customer-post-entry_fig2"
                style="border-top: 29px solid <?php echo $label['label_color']; ?>"></span>
            </div>
            <p></p>
          </div>
          <p class="customer-post-entry_content">
            &quot;<?= mb_substr($content, 0, 340); ?><?php if(strlen($content)  >= 340){?>...<?php }?>&quot;</p>
          <p class="customer-post-entry_author"><?= $author; ?></p>
          <?php if  ($link)  { ?>
          <div class="customer-post-entry_block"><a class="text-link arrow customer-post-entry_link"
              href="<?php the_permalink(); ?>"><?= $link; ?></a></div>
          <?php } ?>
        </section>
      </article>
      <?php endwhile; ?>
      <?php endif; ?>




      <?php  endwhile; wp_reset_postdata(); ?>
    </div>
  </div>

  <!-- cta Reques Demo-->
  <?php 
$cta1 = get_field("cta_2", "option");
  if($cta1['bg'] === 'purple'){
    $bg = "background-image: url(".get_template_directory_uri()."/inc/images/demo-section-backgr.svg";
    $btn ="home-hero__button button button-purple";
  }else{
    $bg = "background-image: url(".get_template_directory_uri()."/inc/images/demo-section-backgr-light.svg";
    $btn = "button button-teal button-animation content-center";
  }
  $btnRequesDemo = get_field('request_demo_button', 'options');

?>
  <section class="cta" style="<?php echo $bg; ?>">
    <div class="container">
      <div class="row">
        <h2><?php echo $cta1["title"] ; ?></h2>
        <a class="<?php echo $btn?>" rel="noopener" href="<?php echo $btnRequesDemo['url']; ?>">
          <span><?php echo $btnRequesDemo['title']; ?></span>
        </a>
      </div>
    </div>
  </section>
  <!-- /. cta Reques Demo-->


</div>


<?php get_footer(); ?>
