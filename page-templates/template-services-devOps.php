<?php
/*
Template Name: Services: DevOps
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$header_title = $pageFields['header_title'];
$header_content = $pageFields['header_content'];

?>
<main class="landing-pg-services landing-quality ">

  <!-- headline -->
  <?php  if($header_title): ?>
  <header class="headline  group_1 py-5 text-white bg-black">
    <div class="container py-5">
      <div class="content d-flex flex-column">
        <h1 class='my-5'> <?php  echo $header_title; ?></h1>
        <div class="content"><?php  echo $header_content; ?></div>
      </div>
    </div>
  </header>
  <?php endif; ?>


  <div class=' text-white bg-black'>
    <div class="container  py-5">

      <!-- What is DevOps? -->
      <section class="devops">
        <?php 
        $what_is_devops = $pageFields['what_is_devops']; 
        $todays_devops = $pageFields['todays_devops']; 
        $devops_image = $pageFields['dev+ops_image']; 
        ?>
        <h2><?php echo $what_is_devops; ?></h2>
        <h3 class="text-center"><?php echo $todays_devops; ?></h3>
        <div class="devops_title d-flex ">
          <div
            class="d-none d-md-flex bg-line flex-grow-1 col d-flex justify-content-start align-items-center devops_title_dev">
            PART DEV
          </div>
          <div class=" col-12 col-md-2 d-flex justify-content-center align-items-center devops_title_main">
            <img class='lazyload m-auto' src='<?php echo $devops_image['url']; ?>'
              alt='<?php echo $devops_image['alt']; ?>' width='175' height='auto' />
          </div>
          <div
            class="d-none d-md-flex bg-line flex-grow-1 col d-flex justify-content-end align-items-center devops_title_ops">
            PART OPS
          </div>
        </div>


        <div class="col my-5 d-flex  d-md-none justify-content-center align-items-center">
          <?php  $devops_image = $pageFields['dev+ops_image_person']; ?>
          <img class='lazyload' src='<?php echo $devops_image['url']; ?>' alt='<?php echo $devops_image['alt']; ?>'
            width='145' height='auto' />
        </div>


        <div class="devops_title d-flex ">
          <div class="flex-grow-1 col d-flex d-md-none justify-content-center align-items-center devops_title_dev">
            PART DEV
          </div>
          <div class="flex-grow-1 col d-flex d-md-none justify-content-center align-items-center devops_title_ops">
            PART OPS
          </div>
        </div>





        <div class=" d-flex  mt-5">
          <?php  $devops_image = $pageFields['dev+ops_image_person']; ?>

          <div class="col d-flex justify-content-start align-items-center flex-grow-1">
            <?php 
            $part_dev = get_field('part_dev');
            if( $part_dev ) {
              echo '<ul class="part_dev">';
              foreach( $part_dev as $row ) {
                  echo '
                  <li class="d-flex mb-4">
                  <div class="col-2"><img class="lazyload" src="'. $row['dev_icon']['url'] .'" alt="'. $row['dev_icon']['alt'] .'" width="36" height="36" /></div>
                  <div class="col-10">
                  <h4>'. $row['dev_title'] .'</h4>
                  <div class="content">'. $row['dev_content'] .'</div>
                  </div>
                  </li>
                  ';
              }
              echo '</ul>';
          } ?>
          </div>
          <div class="col d-none d-md-flex justify-content-center align-items-center">
            <img class='lazyload' src='<?php echo $devops_image['url']; ?>' alt='<?php echo $devops_image['alt']; ?>'
              width='145' height='auto' />
          </div>
          <div class="col  ms-4 ms-md-0 d-flex justify-content-start align-items-startflex-grow-1">
            <?php 
            $part_ops = get_field('part_ops2');
            if( $part_ops ) {
              echo '<ul class="part_ops">';
              foreach( $part_ops as $row ) {
                
                  echo '
                  <li class="d-flex mb-4">
                  <div class="col-2"><img class="lazyload" src="'. $row['ops_icon2']['url'] .'" alt="'. $row['ops_icon2']['alt'] .'" width="36" height="36" /></div>
                  <div class="col-10">
                  <h4>'. $row['ops_title'] .'</h4>
                  <div class="content">'. $row['ops_content'] .'</div>
                  </div>
                  </li>
                  ';
              }
              echo '</ul>';
          } ?>
          </div>
        </div>

        <div class="text-center mt-5">
          <?php  echo $pageFields['devops_explains']; ?>
        </div>
      </section>

    </div>
  </div>


  <div class=' bg-white py-5'>
    <div class="container  py-5">
      <!-- Our DevOps Services  -->
      <?php 
      $DevOpsSer_title = $pageFields['DevOpsSer_title'];  
      $devopsser_content = $pageFields['devopsser_content'];  
      $devops_complementary = $pageFields['devops_complementary'];  
      ?>
      <h2><?php echo $DevOpsSer_title; ?></h2>

      <div class=" d-flex   row-cols-1 row-cols-md-2">
        <div class="col d-flex  justify-content-center align-items-center ">
          <?php echo $devopsser_content; ?>
        </div>
        <div class=" col ms-4 d-flex justify-content-center align-items-center ">

          <img class='lazyload' src='<?php echo $pageFields['devopsser_image']['url']; ?>'
            alt='<?php echo $pageFields['devopsser_image']['alt']; ?>' />
        </div>
      </div>

      <div class=" d-flex   row-cols-1 row-cols-md-2">
        <div class=" col d-flex  flex-column  justify-content-center align-items-center ">
          <?php echo $devops_complementary['col-left']; ?>
        </div>
        <div class=" col ms-4 d-flex  flex-column justify-content-center align-items-center ">
          <?php echo $devops_complementary['col-right']; ?>
        </div>
      </div>

    </div>
  </div>
  <!-- 4  with DevOps -->
  <div class='benefits text-white bg-black'>
    <div class="container  py-5">
      <h2><?php  echo $pageFields['benefits_title']; ?></h2>
      <?php $benefits_columns = $pageFields['benefits_columns']; ?>
      <div class="  d-flex  flex-wrap performance  justify-content-center align-item-start">

        <div class="col-12 col-md-5 d-flex  flex-row flex-wrap  justify-content-start align-content-start ">
          <?php echo $benefits_columns['benefits_col_left']; ?>
        </div>
        <div class="col-12 col-md-5 ms-4 d-flex  flex-row   flex-wrap justify-content-start align-content-start ">
          <?php echo $benefits_columns['benefits_col_right']; ?>
        </div>

      </div>

      <div class="col-12 mt-5">
        <?php echo $benefits_columns['benefits_content']; ?>
      </div>
    </div>
  </div>


  <div class=' bg-white py-5'>
    <div class="container  py-5">
      <section class="avoid">
        <h2 class='my-5'><?php  echo $pageFields['failure__title']; ?></h2>


        <div class=" d-flex  row-cols-1 row-cols-md-2">
          <div class=" col d-flex  flex-column  justify-content-center align-items-center ">
            <?php echo $pageFields['failure_content']; ?>
          </div>
          <div class=" col ms-4 d-flex  flex-column justify-content-center align-items-center ">
            <img class='lazyload' src='<?php echo $pageFields['failure_image']['url']; ?>'
              alt='<?php echo $pageFields['failure_image']['alt']; ?>' />
          </div>
        </div>

        <h3 class="col-12 text-center"><?php  echo $pageFields['devops_tools_we_use']; ?></h3>
        <div class="col-12 devops_tools">
          <img class='lazyload' src='<?php echo $pageFields['devops_tools_image']['url']; ?>'
            alt='<?php echo $pageFields['devops_tools_image']['alt']; ?>' />
        </div>
      </section>
      <!-- sec6 Why Rootstrap?  -->
      <?php  get_template_part('/inc/parts/content', 'services');   ?>
    </div>
  </div>

</main>



<?php get_footer(); ?>
