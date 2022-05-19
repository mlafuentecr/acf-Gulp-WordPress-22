<?php
/*
Template Name: About 
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$video_url = $pageFields['video_url'];
?>
<main id="about" class="intern-pg">


  <!-- headline -->
  <?php if ($pageFields['headline']): ?>
  <header class="headline  py-5 text-white">
    <div class="container py-5">
      <div class="content d-flex flex-wrap  ">
        <h1 class="title col-12 col-md-7  me-auto "><?php echo $pageFields['headline']; ?></h1>
        <div class="col-12 col-md-3 "><?php echo $pageFields['headline_content']; ?></div>
      </div>
    </div>
  </header>
  <?php endif; ?>


  <!-- Video -->
  <?php if ($pageFields['video_thumbnail']): ?>
  <section class="heroImage"
    style="background-size: cover; background-image: url(<?php echo $pageFields['video_thumbnail']['url'];  ?>;">
    <div class="container">
      <a class="watchVideo" data-bs-toggle="modal" href="#youtubeModal" role="button">
        Watch Video
      </a>
      <div class="modal fade" id="youtubeModal" aria-hidden="true" aria-labelledby="youtubeModalLabel" tabindex="-1">
        <div class="modal-dialog modal-lg  modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <iframe id="player" width="100%" height="500"
                src="https://www.youtube.com/embed/<?php echo $video_url; ?>" title="YouTube video player"
                frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>


  <!-- A bit about Us -->
  <?php if ($pageFields['bit_about_us_main_text']): ?>
  <section class="bit_about_us py-5" style="background-color: <?php echo $pageFields['a_bit_about_us_color'];  ?>;">
    <div class="container py-5">
      <h3 class='title_small text-black'> <?php echo$pageFields['bit_about_us_small_title']; ?></h3>
      <div class="row  bit_about_us_content">

        <div class="bit_about_us_text">

          <?php 
           foreach ($pageFields['bit_about_us_main_text'] as $key => $value) {
             $text = $value['text'];
             $class = $key === 0 ? 'active' : '';
             echo "<div class='about_item about_item_$key $class'> $text</div><br>";
          }
          
          ?>
        </div>


        <a class='text-black arrow btn_next' href="http://"><?php echo  $pageFields['next_link']['title']; ?></a>
      </div>

    </div>
  </section>
  <?php endif; ?>



  <!-- Slider -->
  <div id="carouseJourney" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner ">

      <?php 
   $slider = $pageFields['slider_our_journey']; 
   if( $slider ) {
   
      $total = count($slider);
    
       foreach( $slider as $index => $journey_slider ) {
         
           $type          = $journey_slider['journey_type'];
           $bg_color      = $journey_slider['journey_background_color'] ?: 'white';
           $image         = $journey_slider['journey_image'];
           $content       = $journey_slider['content'];
           $text_color    = $journey_slider['journey_text_color'] ?: 'text-white';

          $dont_put_year  = $journey_slider['dont_put_year'];
          $journey_year   = $journey_slider['journey_year'];
          $journey_title  = $journey_slider['journey_title'];
         $slider_size = $journey_slider['journey_title'] ?: '600';
        
          
           $obj           = $journey_slider;
           $index++;

           $dont_put_year  ? $title = $journey_title : $title = $journey_year;

           $state = $index === 1 ? "active" : "";
          
            echo "<div style='    background-color:".$bg_color." ' class='carousel-item py-5 ".$state." '>";
            echo "<div style='min-height:".$slider_size."px' class='container mt-2 my-5'> ";
            echo "<div   class='jorneyDiv '> ";
            echo '  <h3 class="title_small mt-md-5 mt-md-0" >Our Jorney</h3>';
            echo "<div class='mt-1 mt-md-5' style='color: ".$text_color."!important;'> ";
            echo '<span class="title" style="color: '.$text_color.'" > '. $GLOBALS['slider_subtitle']  .' </span>';
            echo "<div class='slideNumber'> " .  $index.' — '. $total  .  "</div>";
          
              if($type === 'text'){ 
                echo  '<div class="row text-wrap "  style="color: '.$text_color.'" >';
                echo  '<div class="col-12 ">
                <div class="col-12 journey_year mt-1 mt-md-5">'.  $title .'</div>
                <div class="col-12  mt-1  mt-md-5 journey_content">'. $journey_slider['journey_content'] .'</div>
                </div>';
              echo  '</div>';

              }else{
               
                echo  '<div class="row image_text '.$reverse.'">';
                
                echo  '<div class="col-12 col-md-6 text-center">';
                echo  '<img class="m-auto" src="'. $journey_slider['journey_image']['url'] .'" alt="'. $obj['journey_image']['title'] .'"  >';
                echo  '</div>';

                echo  '<div class="col-12 col-md-6 mt-3 mt-md-0 mb-4 mb-md-0  ">
                <div class="col-12 journey_year">'. $title .'</div>
                <div class="col-12 mt-2  journey_content">'. $journey_slider['journey_content'] .'</div>
                </div>';

                echo  '</div>';

              }
              echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';

         
       }

   }
  ?>

    </div>

    <div class="buttons ">
      <button class="carousel-control-prev" type="button" data-bs-target="#carouseJourney" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouseJourney" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </div>
  </section>



  <!-- Embody -->
  <?php if ($pageFields['embody_title']): ?>
  <section class="embody py-md-5" style="background-color: <?php echo $pageFields['embody_color'];  ?>;">
    <div class="container py-md-5">
      <h3 class='title_small text-white'> <?php echo$pageFields['embody_title']; ?></h3>
      <div class="row   row-cols-1  row-cols-md-2 row-cols-lg-<?php echo $pageFields['embody_columns'];  ?> ">
        <?php 
        $rows = get_field('embody');
        if( $rows ) {
            foreach( $rows as $item => $row ) {
              $item++;
              $item = '0'.$item;

              echo "<div class='col my-5 px-5 text-white'><span class='number'> ". $item  ." </span>";
              echo "<h3  class='text-white'>".  $row['embody_title'] ."</h3>";
              echo "<div class='content'> " . $row['embody_content'] . " </div></div>";
            }
      }
      ?>
      </div>
    </div>
  </section>
  <?php endif; ?>


  <!-- Clients -->
  <section class="clients py-5" style="background-color: white;">
    <div class="container py-5">
      <h3 class='title_small'> Clients</h3>
      <div class="row   row-cols-2 row-cols-lg-3  row-cols-xl-<?php  the_field('clients_columns', 'option');  ?> ">
        <?php 
        $rows = get_field('clients_logos', 'option');
        if( $rows ) {
            foreach( $rows as $item => $row ) { ?>

        <div class="col text-center my-5"> <img max-width='122px' height='auto'
            src="<?php echo esc_url($row['url']); ?>" class=' lazyload' alt="<?php echo esc_attr($row['alt']); ?>" />
        </div>
        <?php  }
      }
      ?>
      </div>
    </div>
  </section>


  <!-- awards -->
  <section class="awards py-5" style="background-color: white;">
    <div class="container py-5">
      <h3 class='title_small text-black col-12 '> <?php the_field('awards_title'); ?></h3>
      <p><?php the_field('awards_subtitle'); ?></p>
      <div class="col-12 link_award g-2 ">
        <?php 
        $rows = get_field('awards');
        if( $rows ) {
            foreach( $rows as $item => $row ) { 
             $links = $row['awards_link'];
            
              echo "<div class='col-item'>
                    <h4 class='col-12'>".  $row['awards_title'] ."</h4>";
                    
                  if($links){
                    foreach ($links as $link){
                  
                      echo " <a class='small-arrow-2' href='".  $link['link']['url'] ."' target='_blank rel='noopener noreferrer'>
                        ".  $link['link']['title'] ."
                        </a> "; 
                      }  
                    }

                    echo " </div> ";
        }
      }
      ?>
      </div>
    </div>
  </section>



  <!-- our offices -->
  <section class="office py-5" style="background-color: white;">
    <div class="container py-5">
      <h3 class='title_small text-black'> our offices</h3>
    </div>

    <div class="d-flex flex-wrap ">
      <?php 
        $rows =  get_field('office');
        if( $rows ) {

            foreach( $rows as $item => $row ) { 
              $item++;
              $name = 'article-'. $item;

           echo "<article class='". $name ." '>";
           echo '<div class="container ">';
           echo "<div class='".$name."_main-content '> ";
           
              echo "<div class='".$name."_text me-2'>";
              echo "<div class='".$name."_details my-4'>";
                echo "<h4>".  $row['our_offices_title'] ."</h4>";
                echo "<b class='".$name."_subtitle'>".  $row['our_offices_subtitle'] ."</b>";
                echo "<div class='".$name."_description'>".  $row['our_offices_description'] ."</div>";
                echo "</div>";
                echo "<div class='".$name."_content my-4'>".  $row['our_offices_content'] ."</div>";
                echo "</div>";
                if(!$row['make_image_100']){
                  echo "<div class='image ".$name."_image'  style='background-image: url( ". $row['our_offices_image'][0]['url'] ." )' >" ;
                  echo "</div>";
                }
            echo "</div>";

                if($row['make_image_100']){
                  echo "<div class='image  ".$name."_image'  style='background-image: url( ". $row['our_offices_image'][0]['url'] ." )' >" ;
                  echo "</div>";
                }
  
            
            if($row['add_sencond_description']){
              echo "<div class='".$name."_description_2'>".  $row['our_offices_description_2'] ."</div>";
              echo "</div>";
            }
            echo "</article>";
        }
      }
      ?>
    </div>

  </section>



  <!-- form -->
  <?php get_template_part("/inc/parts/content", "form"); ?>


</main>



<?php get_footer(); ?>
