<?php

defined( 'ABSPATH' ) || exit;
get_header(); 

/*-------------------------------------------*/
/*  ACF Page our-value
/*-------------------------------------------*/
$pageFields = get_fields();
$bannerbg = $pageFields['banner_footer_bg']['url'];
if(!$bannerbg){ $bannerbg = $pageFields['banner_background'];}
?>
<!-- 5 sec_five-better experience  -->

<section class=" footer-banner" style="background-image: url(<?php echo $bannerbg; ?>);">
  <div class="bg-holder">
    <div class="container">
      <?php 
        $title = get_field('banner_footer_title'); 
        $link = get_field('banner_footer_link'); 
    
      ?>
      <article>
        <h4><?php echo $title; ?></h4>
        <a rel="noopener" class='arrow arrow-center'
          href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
      </article>

    </div>
  </div>
</section>
