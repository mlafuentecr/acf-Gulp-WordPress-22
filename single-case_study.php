<?php
/*
Template Name: Case Study
*/
defined( 'ABSPATH' ) || exit;
get_header();
/*---------------------------------------------------------*/
/*  ACF 
/*---------------------------------------------------------*/
$dataAcf = get_field('headline');
$headline_title = $dataAcf['headline_title'];
$ckient_info = get_field('headline_info');




$description =  get_field('small_description');
$type = $description['type_of_busybess'][0]->name;


?>



<header style="background-color:<?php echo $description['background_color']; ?>">
  <div class="container py-5">
    <div class="d-flex justify-content-between text-white my-5">
      <h1 class="col-12 col-md-8 d-flex align-items-center"><?php echo $dataAcf['headline_title']; ?></h1>
      <aside class="col-12 col-md-3  case_study_list">
        <div>
          <h3 class="case_study_title">clients</h3>
          <div class="case_study_description mb-4"><?php echo $ckient_info['clients']; ?></div>
        </div>
        <div>
          <h3 class="case_study_title">duration</h3>
          <div class="case_study_description  mb-4"><?php echo $ckient_info['duration']; ?></div>
        </div>
        <div>
          <h3 class="case_study_title">team</h3>
          <div class="case_study_description  mb-4"><?php echo $ckient_info['team']; ?></div>
        </div>

      </aside>
    </div>
  </div>
</header>

<div class="banner" style="background-image: url(<?php echo $dataAcf['headline_image']['url']; ?>)">
</div>

<section class="clients_objectives ">
  <div class="container py-5">
    <div class="d-flex justify-content-between text-white my-5">
      <div class="case_study_title  col-12 col-md-3">
        <?php echo get_field('objectives_title');  ?>
      </div>
      <div class="clients_objectives_descrip  col-12 col-md-9">
        <h3><?php echo  get_field('objectives_description')['title'];  ?></h3>
        <?php echo  get_field('objectives_description')['content'];  ?>
      </div>
    </div>
  </div>
</section>


<section class="our_objectives">
  <div class="container py-5">
    <div class="d-flex justify-content-between text-white">
      <div class="case_study_title  col-12 col-md-3"> <?php echo  get_field('our_objectives_title'); ?> </div>

      <div class="our_objectives_content   gap-5 col-12 col-md-9 d-flex">
        <?php 
        $objectives = get_field('objectives');
        if( $objectives ) {
          $key = 1;
            foreach( $objectives as $row ) {
              $key <= 9 ? $key = ("0".$key) : $key;
                echo "<div class='col-12 col-md-6 '>
                <div class='number'>".$key."</div>
                <div class='case_study_title  col-12'>".$row['title']."</div>
                <div class='our_objectives_descrip'>".$row['content']."</div>
                </div>";
                $key++;
            }
        }
        ?>
      </div>
    </div>
  </div>
</section>


<section class="case_study_banner_1">
  <div class=" container">
    <div class="d-flex  flex-wrap justify-content-center align-items-center my-5  text-center">
      <?php echo get_field('objectives_message'); ?>
    </div>
  </div>
</section>


<div class="banner" style="background-image: url(<?php echo  get_field('message_image')['url']; ?>)">
</div>



<section class="phases">
  <div class=" container">
    <div class="d-flex  flex-wrap justify-content-center align-items-center my-5  text-center">
      <?php 
        $phase = get_field('phase');
        $key = 1;
        if( $phase ) {
            foreach( $phase as $row ) {
                echo "<div class='col-12 '>
                <div class='phase_image  col-12'>
                <img class='lazyload' src='".$row['phase_image']['url']."' alt=".$row['phase_image']['title']." />
                </div>
                <div class='our_phase_content'>
                <div class='phase-number text-start '> the process phase  ".$key."    </div>
               
                <div class='case_study_title text-start col-12'>  ".$row['phase_title']." </div>
                <div class='case_study_desc text-start col-12'>  ".$row['description']."</div>
                </div>
                </div>";
                $key++;
               
            }
        }
        ?>
    </div>
  </div>
</section>

<section class="case_study_banner_2">
  <div class=" container">
    <div class="d-flex  flex-wrap justify-content-center align-items-center my-5  text-center">
      <?php echo get_field('phase_message'); ?>
    </div>
  </div>
</section>


<section class="case_study_phase_image_text">
  <div class=" container">
    <div class="d-flex  flex-wrap justify-content-center align-items-center my-5  text-center justify-content-between">

      <div class="col-12 col-md-6">
        <img class='lazyload' src=' <?php echo  get_field('phase_image_text')['phase_image']['url']; ?>'
          alt=' <?php echo  get_field('phase_image_text')['phase_image']['title']; ?>' />
      </div>
      <div class="case_study_phase_text col-12 col-md-5 text-start">
        <?php  echo  get_field('phase_image_text')['phase_text']; ?>
      </div>
    </div>
  </div>
</section>


<section class="case_study_banner_3">
  <div class=" container">
    <div class="d-flex  flex-wrap justify-content-center align-items-center my-5  text-center">
      <?php echo get_field('phase_message_2'); ?>
    </div>
  </div>
</section>


<div class="banner" style="background-image: url(<?php echo  get_field('phase_image')['url']; ?>)">
</div>

<section class="case_study_faq">
  <div class=" container">
    <div class="d-flex  flex-wrap justify-content-center align-items-center my-5  text-center">
      <div class="col-12 title"> <?php echo  get_field('faq_title'); ?> </div>
      <?php 
      $faqs = get_field('faqs');
      if( $faqs ) {
        
          foreach( $faqs as $key=>$row ) {
           
              echo '<div class="accordion accordion-flush col-12" id="accordionFaq">

              <div class="accordion-item ">
                <h2 class="accordion-header" id="flush-heading-'.  $key .'">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'.  $key .'" aria-expanded="false" aria-controls="flush-collapse'.  $key .'">
                    '.$row['title'].'
                  </button>
                </h2>
                <div id="flush-collapse'.  $key .'" class="accordion-collapse collapse" aria-labelledby="flush-heading-'.  $key .'" data-bs-parent="#accordionFaq">
                  <div class="accordion-body"> '.$row['content'].'</div>
                </div>
              </div>
            </div>';

          }
     
      }
      
      ?>
    </div>
  </div>
</section>


<?php get_footer(); ?>
