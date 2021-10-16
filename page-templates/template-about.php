<?php
/*
Template Name: About Page
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();

$cta2 = get_field("cta_2", "option");

?>
<div id="about" class="intern-pg">

  <!-- 0 banner -->
  <section class="intro-banner" style="background-image: url(<?php echo $pageFields['banner_laptop_image']; ?>);">
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


  <section class="block-picture">
    <div class="container-xl">
      <img src="<?php echo $pageFields['banner_pullout']['image']['url']; ?>" class="block-picture__img"
        alt="<?php echo $pageFields['banner_pullout']['image']['title']; ?>">
    </div>
  </section>



  <!-- 2 mision and promise -->
  <section class="group block-about">
    <div class="container-xl">
      <div class="row">
        <?php 
        $aboutList = get_field('about_list');
        foreach( $aboutList as $row ) {
         echo '<div class="col"><h2>'.$row["item"]["heading"].'</h2>';
         echo '<div class="context">'.$row["item"]["text"].'</div> </div>'; 
         } 
         ?>
      </div>
    </div>
  </section>


  <!-- 3 list -->
  <section class="content-list">
    <div class="container-xl">
      <div class="row">

        <div class="box">
          <?php foreach ($pageFields['our_approach_list'] as $item): ?>
          <div class="items_wrap">
            <article class="item">
              <div class="items_img" style="background-image: url('<?php echo $item['image'] ?>')">
              </div>
              <h3><?php echo $item['heading'] ?></h3>
              <p class="items_paragraph"><?php echo nl2br($item['text']) ?></p>
            </article>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="bg-lines2"> </div>
      </div>
    </div>
  </section>



  <!-- 4 Security sec -->
  <section class="block-security" class=""
    style="background-image: url('<?php echo $pageFields['security_background']; ?>');">
    <div class="container-xl">
      <div class="row">
        <h2><?php echo $pageFields['security_heading']; ?></h2>
        <p><?php echo $pageFields['security_text']; ?></p>

        <div class="col2 mt-5 mb-5">
          <?php  $imgs = $pageFields['security_list']; ?>
          <?php if( $imgs ) {  foreach( $imgs as $img ) {; ?>
          <img src="<?php echo $img["image"]; ?>" alt="oddsandnews" class="log1">
          <?php }}; ?>
        </div>

      </div>
    </div>
  </section>


  <!-- 5 Join the Laika Team -->
  <?php $cta3 = get_field("cta_3", "option"); ?>

  <section class="join mt-5 mb-5" style="background-image: url('<?php echo $cta3["bg"]["url"]; ?>');">
    <div class="container">
      <div class="row">
        <h2><?php echo $cta3["title"]; ?></h2>
        <div class="content">
          <?php echo $cta3["content"]; ?>
        </div>
        <a class="button button-teal mt-5 btn-animation" rel="noopener"
          href="<?php echo $cta3["btn"]["url"]; ?>"><span><?php echo $cta3["btn"]["title"]; ?></span>
        </a>
      </div>
    </div>
  </section>




  <!-- 5 Join the Laika Team -->
  <?php $cta4 = $pageFields["team_repeater"];  ?>
  <section class="founders mt-5 mb-5">
    <div class="container">
      <div class="row">
        <h2 class="mt-5 mb-5"><?php echo $pageFields["team_title"]; ?></h2>
        <div class="content">

          <?php
           while( have_rows('team_repeater') ) : the_row(); 
          $profileImg = get_sub_field('profile'); 
          $first_name = get_sub_field('first_name'); 
          $last_name = get_sub_field('last_name'); 
          $job_title = get_sub_field('job_title'); 
          $linkedin_link = get_sub_field('linkedin_link'); 
          ?>


          <div class="item">
            <figure>
              <img src="<?php echo $profileImg["url"];  ?>" alt="<?php echo $profileImg["title"];  ?>">
              <a href="<?php echo $linkedin_link["url"];?>" class="linkin">
                <svg id="icon-hexagon" viewBox="0 0 52 59">
                  <polygon class="hex-0" points="0,14.7 0,44.3 26,59 52,44.3 52,14.7 26,0 		"></polygon>
                  <path class="icon-linkedin" d="M19.9,39.5h-4.6V24.8h4.6V39.5z M17.6,22.8c-1.5,0-2.6-1.2-2.6-2.7c0-1.5,1.2-2.6,2.6-2.6
										c1.5,0,2.6,1.2,2.6,2.6C20.3,21.6,19.1,22.8,17.6,22.8z M37,39.5h-4.6v-7.2c0-1.7,0-3.9-2.4-3.9c-2.4,0-2.7,1.9-2.7,3.8v7.3h-4.6
										V24.8h4.4v2h0.1c0.6-1.2,2.1-2.4,4.3-2.4c4.6,0,5.5,3,5.5,7L37,39.5L37,39.5z"></path>
                </svg>
              </a>
            </figure>
            <p class="name"><?php echo $first_name;  ?></p>
            <p class="lastname"><?php echo $last_name;  ?></p>
            <p class="job"><?php echo $job_title;  ?></p>

          </div>
          <?php endwhile; ?>



        </div>

      </div>
    </div>
  </section>

  <!-- investors  cta -->
  <?php //var_dump($pageFields['investors']["logo_repeater"]); ?>
  <div class="block-investors">
    <div class="container under">
      <div class="row">

        <div class="box-with-tab">
          <h2 class='mb-5'> <?php echo $pageFields['investors']["title"]; ?></h2>
          <?php 
          $rows = $pageFields['investors']["logo_repeater"];
          if($rows ){ 
            echo '<div class="logos">';
              foreach( $rows as $row ) {
                echo ' <img class="logo-item" src="'. $row["logo"]["url"] .'" alt="'. $row["logo"]["title"]  .'">';
              }
              echo '</div>';
         }
         ?>
        </div>
      </div>
    </div>
    <?php $cta = get_field("contact_group"); ?>
    <div class="contact-wrap">
      <div class="container ">
        <div class="row">
          <h2><?php echo $cta["title"]; ?></h2>
          <a class=" button button-teal btn-animation content-center" rel="noopener"
            href="<?php echo $cta["link"]["url"]; ?>" target=""><span><?php echo $cta["link"]["title"]; ?></span>
          </a>
        </div>
      </div>
    </div>

  </div>
  <!-- /. cta Reques Demo-->

  <!-- 6 demo -->
  <!-- puedo hacer uno general y que tenga un drop down de bg y un text field o un drop down de text -->

</div>


<?php get_footer(); ?>
