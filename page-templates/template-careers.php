<?php
/*
Template Name: Careers
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*---------------------------------------------------------*/
/*  ACF Page our-value
/*---------------------------------------------------------*/
$pageFields         = get_fields();
$header             = $pageFields['header'];
$full_width_image1  = $pageFields['full_width_image1'];
$full_image_height1 = $pageFields['full_image_height1'];
$header_link        = $pageFields['header_link'];
$what_title         = $pageFields['what_sets_us_apart_title'];
$what_content       = $pageFields['content'];
$reasons            = $pageFields['reasons'];

$full_width_image2 = $pageFields['full_width_image2'];
$full_image_height2 = $pageFields['full_image_height2'];

///What sets us apart
$what_sets_us_heigh = $pageFields['what_sets_us_heigh'];
//jobs BLock Join a team
$join_a_team_title =  $pageFields['header_jobs'];

//working with us
$workingwithus_bg   =  $pageFields['working_bg_color'];
$workingwithus_img1 =  $pageFields['image_1'];
$workingwithus_img2 =  $pageFields['image_2'];
$workingwithus_txt  =  $pageFields['reason'];

//last message
$lasttxt            =  $pageFields['last_text'];
$lastimg            =  $pageFields['full_width_image2'];
$lastimgHeight      =  $pageFields['full_image_height2'];




?>
<main class="main-content careers_pg">

  <?php if($header): ?>
  <header class=" my-0 my-md-5 text-white">
    <div class="container ">
      <div class="row my-0 my-md-5">
        <div class="col my-5 my-md-0">
          <h1 class='mb-5'><?php echo $header; ?></h1>
          <a href="<?php echo $header_link['url']; ?>"
            class="link-with-line-static "><?php echo $header_link['title']; ?>
          </a>
        </div>
      </div>
    </div>
  </header>
  <?php endif; ?>


  <!-- image1 -->
  <?php if($full_image_height1): ?>
  <section class="image-big">
    <div class="d-flex flex-wrap ">
      <div class="col-12  fit-background "
        style="min-height:<?php echo $full_image_height1; ?>px; background-image: url(<?php echo $full_width_image1['url']; ?>);">
      </div>
    </div>
  </section>
  <?php endif; ?>

  <section class="sets-us-apart py-5 bg-light">
    <div class="container" style='height: <?php echo $what_sets_us_heigh.'px'; ?>'>
      <div class="d-flex align-items-center  h-100">

        <div class="wrapper">
          <h2 class='title_small'><?php echo $what_title; ?></h2>
          <div class="content">
            <?php echo $what_content;  ?>
          </div>
          <div class="row row-cols-md-3">

            <?php 
          $reasons = get_field('reasons');
          if( $reasons ) {
            
              foreach( $reasons as $key => $row ) {
                $key++;
                $key < 10 ? $key = '0'.$key : $key;
                  
                  echo '<article class="item_career">';
                  echo '<span class="number">'.$key.'</span>';
                  echo '<div class="reason">'.$row['reason'].'</div>';   
                  echo '</article>';
              }
             
          }
          ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- API CALL JOBS -->
  <?php if($join_a_team_title): ?>
  <section class="get-jobs ">
    <?php include get_theme_file_path('/inc/parts/blocks/block_get_jobs.php'); ?>
  </section>
  <?php endif; ?>



  <!-- working-with-us -->
  <?php if($full_image_height2 && $full_image_height1): ?>
  <section class="working-with-us"
    style="background-color:<?php echo $workingwithus_bg; ?>; min-height:<?php echo $full_image_height1; ?>px; );">
    <div class="d-flex flex-wrap row-col-2">
      <div class="col img1">
        <img class='lazyload' src='<?php echo $workingwithus_img1['url']; ?>'
          alt='<?php echo $workingwithus_img2['title']; ?>' />
      </div>
      <div class="col img2"> <img class='lazyload' src='<?php echo $workingwithus_img2['url']; ?>'
          alt='<?php echo $workingwithus_img2['title']; ?>' /></div>
    </div>

    <div class="content my-5">
      <div class="container my-5">
        <?php echo $workingwithus_txt; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>


  <!-- Last Message$lastimgHeight -->
  <section class='lastMessage my-5  pt-5  '>
    <div class="container">
      <h3 class='text-white my-5'> <?php echo $lasttxt; ?></h3>
    </div>
    <section class="image-big">
      <div class="d-flex flex-wrap ">
        <div class="col-12  fit-background mt-5"
          style="min-height:<?php echo $lastimgHeight; ?>px; background-image: url(<?php echo $lastimg['url']; ?>);">
        </div>
      </div>
    </section>
  </section>

</main>


<?php get_footer(); ?>
