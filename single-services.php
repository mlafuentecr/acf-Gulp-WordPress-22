<?php
/*
Template Name: Services
*/
defined( 'ABSPATH' ) || exit;
get_header();
/*---------------------------------------------------------*/
/*  ACF 
/*---------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$group_1 = $pageFields['group_1'];
$group_2 = $pageFields['group_2'];

?>
<main class="landing-pg landing-quality ">

  <!-- headline -->
  <?php  if($group_1): ?>
  <header class="headline  group_1 py-5 text-white">
    <div class="container py-5">
      <div class="content d-flex flex-column">
        <?php  echo $group_1; ?>
      </div>
    </div>
  </header>
  <?php endif; ?>



  <div class=' bg-white py-5'>
    <div class="container py-5">

      <!-- group_2 -->
      <div class="row my-5">
        <div class="col-12 col-m-5">
          <h3 class="h-100 m-auto d-flex justify-content-center  align-items-center ">
            <?php echo $group_2['sec2_title']; ?>
          </h3>
        </div>
        <div class="col-12 col-m-5 ms-0 ms-md-4"><?php echo $group_2['sec2_content']; ?></div>
      </div>

      <div class="row my-5">
        <h2 class='text-center my-5'> <?php echo $group_2['sec2_2_title']; ?></h2>
        <div class="content"><?php echo $group_2['sec2_2_content']; ?></div>
      </div>

      <div class="row my-5">
        <div class="col-12 col-m-5">
          <h3 class="h-100 m-auto d-flex justify-content-center  align-items-center ">
            <?php echo $group_2['sec2_3_title']; ?>
          </h3>
        </div>
        <div class="col-12 col-m-5 ms-0 ms-md-4"><?php echo $group_2['sec2_3_content']; ?></div>
      </div>

      <div class="row my-5">
        <div class="col-12 col-m-5">
          <h3 class="h-100 m-auto d-flex justify-content-center  align-items-center ">
            <?php echo $group_2['sec2_4_title']; ?>
          </h3>
        </div>
        <div class="col-12 col-m-5 ms-0 ms-md-4"><?php echo $group_2['sec2_4_content']; ?></div>




        <!-- group_3 -->
        <div class="row my-5">
          <?php
          $group_3 = $pageFields['group_3'];
          $boxes = $group_3['sec3_box']; 
          ?>
          <h3 class='text-center my-5'> <?php echo $group_3['sec3_title']; ?> </h3>
          <div class="content text-center">
            <?php echo $group_3['sec3_content']; ?>
          </div>
        </div>

        <!-- //repeter sec3_box -->
        <div class="group_3_boxes row row-cols-1 row-cols-md-3 my-5">
          <?php 
          $boxes = $group_3['sec3_box']; 
          if( $boxes ) { foreach( $boxes as $box ) {
                echo '<div class="col text-center text-md-start">';
                    echo "<img class='lazyload m-auto mt-5 mb-0' src='".$box['image']['url']."' alt='".$box['image']['alt']."' />"; 
                    echo "<h4 class='text-center text-md-start my-5'>".$box['title']."</h4>";
                    echo " <div class='content text-center text-md-start'>
                    Deliver your product with confidence, <br> no matter what your ideal partnership may be.
                  </div>";
                echo '</div>';
            }
          }
        ?>
        </div>

        <!-- /* What are the steps in Quality Assurance? */ -->
        <!-- steps  -->
        <h3 class='col-12 text-center mt-5 pt-5'><?php  echo $group_3['sec3_2_title_2']; ?></h3>

        <div class="group_3_boxes2 row row-cols-1 row-cols-md-3 my-5">
          <?php 
            $boxes2 =  $group_3['sec3_2_box_2']; 
            if( $boxes2 ) { foreach( $boxes2 as $i => $box ) {
              $i++;
              $i <10 ? $i = '0'. $i : $i;
                  echo '<div class="col text-center text-md-start">';
                      echo '<div class="number text-center text-md-start mt-5">'. $i .'</div>';
                      echo "<h4 class='text-center text-md-start mb-3'>".$box['title']."</h4>";
                      echo " <div class='content text-center text-md-start'>".$box['content']."</div>";
                  echo '</div>';
              }
            }
          ?>
        </div>
      </div>
    </div>

    <!--group_4 We've got you covered -->
    <section class="bg-black text-white">
      <div class="py-5  container">
        <?php $group_4 = $pageFields['group_4']; ?>
        <div class="covered row py-lg-5">

          <header>
            <h3 class="text-white text-center  my-5 m-auto"><?php echo $group_4['sec4_title']; ?></h3>
            <div class="text text-center my-5 col-12 col-md-6  m-auto"><?php echo $group_4['sec4_content']; ?></div>
          </header>
          <div class="content m-auto col-12 col-md-11">
            <?php echo $group_4['sec4_main_content']; ?>
          </div>

          <!-- Why is Software -->
          <section class="py-5  container">
            <div class="row py-lg-5">

              <div class="col-12  col-md-6 pe-md-4">
                <h3 class="h-100 m-auto d-flex justify-content-center  align-items-center  text-center">Why
                  <?php echo $group_4['sec4_2_title']; ?>
                </h3>
              </div>
              <div class="col-12 col-md-6 text-start"><?php echo $group_4['sec4_2_content']; ?> </div>

            </div>
          </section>

        </div>


        <div class="what_applications">
          <h2 class="text-white text-center  my-5 m-auto"><?php echo $group_4['sec4_3_title']; ?></h2>


          <!-- Manual Quality Assurance  -->
          <div class="row py-lg-5">
            <div class="col-12 col-md-3 me-5 text-center text-md-start">
              <?php echo $group_4['sec4_4_box1']; ?>
            </div>
            <div class="col-12 col-md-8 ms-0 ms-md-4 text-start">
              <img class='lazyload m-auto my-5' src=' <?php echo $group_4['sec4_4_image']['url']; ?> '
                alt='<?php echo $group_4['sec4_4_image']['url']; ?>' />
            </div>
          </div>


          <div class="row py-lg-5">
            <div class="col-12  col-md-5 pe-md-4">
              <h3 class="h-100 m-auto d-flex justify-content-center  align-items-start  text-center">
                <?php echo $group_4['sec4_5_title']; ?>
              </h3>
            </div>
            <div class="col-12  col-md-6 pe-md-4 ms-0 ms-md-4 text-start"><?php echo $group_4['sec4_5_content']; ?>
            </div>

          </div>

        </div>


      </div>
    </section>
    <!-- / We've got you covered -->

    <!-- group_5 Benefits of Quality Assurance -->
    <section class="benefits bg-white text-black">
      <div class="py-5  container">
        <?php 
        $group_5    = $pageFields['group_5']; 
        ?>
        <div class="benefits  text-center ">
          <h2 class=" text-center  my-5 m-auto"><?php echo $group_5['sec5_title']; ?></h2>
          <img class='lazyload m-auto my-5' src='<?php echo $group_5['sec5_image']['url']; ?>'
            alt='<?php echo $group_5['sec5_image']['alt']; ?>' />

          <div class="row row-cols-1 row-cols-md-3 my-5">
            <?php 
            $sec5_boxes = $group_5['sec5_boxes']; 
            if( $sec5_boxes ) { foreach( $sec5_boxes as $i => $box ) {
              $i++;
              $i <10 ? $i = '0'. $i : $i;
                  echo ' <div class="col benefit ">';
                  echo ' <h4 class="text-start my-3 my-md-5"> '. $box['title'] .'</h4>';
                      echo ' <div class="content text-start"> '. $box['content'] .'</div>';
                    echo '</div>';
              }
            }
          ?>
          </div>

        </div>
      </div>

    </section>


    <!-- sec6 Why Rootstrap?  -->
    <section class="why_rootstrap">
      <div class="py-5  container">
        <div class="row align-items-start">
          <h2>
            <strong><?php the_field('sec6_title', 'option'); ?></strong>
          </h2>
          <div class="content col-12 mb-3 mb-md-0 col-md-6 text-black">
            <?php echo get_field('sec6_content', 'option'); ?>
          </div>
          <div class="content col-12 col-md-6">
            <?php $image =  get_field('sec6_image', 'option'); ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php  echo $image['alt']; ?>">
          </div>
        </div>
      </div>

    </section>

    <!--  Fortune 500 -->
    <section class="sec7 pt-5">
      <div class="container">
        <h3 class='text-center'><?php the_field('sec7_title', 'option'); ?></h3>
        <?php $sec7_logos =  get_field('sec7_logos', 'option'); ?>
        <img class='py-3 my-0 py-md-5 my-md-5' src="<?php echo $sec7_logos['url']; ?>"
          alt="<?php  echo $sec7_logos['alt']; ?>">
      </div>
    </section>


    <!--  About  -->
    <section class="aboutus my-5">
      <div class="container">

        <div class="sec8_title_img my-5 col-12 text-center ">
          <?php $sec8_title_img =  get_field('sec8_title_img', 'option'); ?>
          <img class='m-auto ' src="<?php echo $sec8_title_img['url']; ?>" alt="<?php  echo $sec8_title_img['alt']; ?>">
        </div>

        <div class="row align-items-start">
          <div class=" col-12 col-md-6">
            <?php $sec8_image =  get_field('sec8_image', 'option'); ?>
            <img src="<?php echo $sec8_image['url']; ?>" alt="<?php  echo $sec8_image['alt']; ?>">
          </div>
          <div class=" mt-3 mt-md-3 col-12 col-md-6 text-black">
            <?php echo get_field('sec8_content', 'option'); ?>
          </div>

        </div>

        <!-- //repeter sec3_box -->
        <div class="sec8_item  d-flex justify-content-center align-content-center row row-cols-2 row-cols-md-3 my-5">
          <?php 
          $sec8_item  =  get_field('sec8_item', 'option');
          if( $sec8_item ) { foreach( $sec8_item as $box ) {
          echo '<div class="col text-center text-md-start">';
            echo "<img class='lazyload m-auto mt-5 mb-0' src='".$box['icon']['url']."' alt='".$box['icon']['alt']."' />";
            echo "<h4 class='text-center text-md-start '>".$box['subtitle']."</h4>";
            echo "<div class='content text-center text-md-start'>".$box['description']." </div>";
            echo '</div>';
          }
          }
          ?>
        </div>

      </div>
    </section>


    <!-- News -->
    <section class="news my-5">
      <div class="container pt-5">

        <h3 class='text-center pt-5'> <?php  the_field('sec9_title', 'option'); ?> </h3>
        <div class="row g-4 my-5 d-flex row-cols-1 row-cols-md-3 justify-content-between">
          <?php 
            $sec9_news = get_field('sec9_news', 'option'); 
            if( $sec9_news ) { foreach( $sec9_news as $i => $box ) {
              $i++;
              $i <10 ? $i = '0'. $i : $i;
                  echo ' <div class="box p-3 col m-auto text-center text-md-start   rounded">';
                  echo '<img class="lazyload my-4 m-auto m-md-0" src="'. $box['image']['url'] .'" alt="'. $box['image']['alt'] .'" />';
                      echo ' <div class="content  m-auto  "> '. $box['content'] .'</div>';
                    echo '</div>';
              }
            }
          ?>
        </div>



        <div class="row more_info align-items-start mt-5 pt-5 ">
          <?php 
          $sec9_image = get_field('sec9_image', 'option');
          ?>
          <div class=" col-12 col-md-6">
            <img class='lazyload img-fluid pe-4' src='<?php echo $sec9_image['url']; ?>'
              alt='<?php echo $sec9_image['alt']; ?>' />
          </div>
          <div class=" col-12 col-md-6 text-black">
            <?php the_field('sec9_content', 'option'); ?>
          </div>
        </div>
      </div>
  </div>


</main>



<?php get_footer(); ?>
