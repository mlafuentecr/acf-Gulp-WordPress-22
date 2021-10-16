<?php

defined( 'ABSPATH' ) || exit;
get_header(); 
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$content = $pageFields['content'];
$podCast =  $_GET['promo'];
?>
<div id="podcast" class="intern-pg">

  <article class="intro">
    <div class="container">
      <section class="content">
        <img class='lazyload logo' src='<?php echo $content['logo']; ?>' alt='heylaika' width='180' height='auto' />
        <div class="home-hero-title"><?php echo $content['title']; ?></div>
        <h2><?php echo $content['sub_title']; ?></h2>
        <div class="text"><?php echo $content['content'];?></div>
      </section>
      <section class="form"><?php echo $pageFields['form'];?></section>
    </div>
  </article>

  <section class="explain">
    <div class="container">
      <div class="content"><?php echo $pageFields['section_bottom_purple']['content'];?></div>
      <div class="person">
        <div class="name"><?php echo $pageFields['section_bottom_purple']['name'];?></div>
        <div class="charge"><?php echo $pageFields['section_bottom_purple']['charge'];?></div>
      </div>
    </div>
  </section>
</div>


<?php get_footer(); ?>
