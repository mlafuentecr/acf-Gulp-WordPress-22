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

//header_font_color
$description =  get_field('small_description');
$type = $description['type_of_business'][0]->name;
$color = $description['header_font_color'];

function addFontColor( $color  ){
  if($color){
    echo 'style="color: '. $color .'"';
  }
 
}

?>


<header style="background-color:<?php echo $description['background_color']; ?>;">
  <div class="container py-5">
    <div class="d-flex flex-wrap justify-content-between text-white my-5">
      <h1 class="col-12 col-md-8 d-flex align-items-start" <?php addFontColor($color); ?>>
        <?php echo $dataAcf['headline_title']; ?></h1>
      <aside class=" col-12 col-md-3 mt-5 mt-md-0 d-flex flex-wrap case_study_list">
        <div class="col-6 col-md-12">
          <h3 class="header--subtitle" <?php addFontColor($color); ?>> clients</h3>
          <div class="case_study_description mb-4" <?php addFontColor($color); ?>>
            <?php echo $ckient_info['clients']; ?></div>
        </div>
        <div class="col-6 col-md-12 ">
          <h3 class="header--subtitle" <?php addFontColor($color); ?>>duration</h3>
          <div class="case_study_description  mb-4" <?php addFontColor($color); ?>>
            <?php echo $ckient_info['duration']; ?></div>
        </div>
        <div class="col-12 ">
          <h3 class="header--subtitle" <?php addFontColor($color); ?>>team</h3>
          <div class="case_study_description  mb-4" <?php addFontColor($color); ?>>
            <?php echo $ckient_info['team']; ?></div>
        </div>

      </aside>
    </div>
  </div>
</header>


<div class="header--banner" style="background-image: url(<?php echo $dataAcf['headline_image']['url']; ?>)">
</div>
<!-- THE CLIENT  -->
<section class="clientsObjs ">
  <div class="container py-5">
    <div class="d-flex flex-wrap justify-content-between text-white my-5">

      <div class="clientsObjs--title my-4 my-md-0   col-12 col-md-3">
        <?php echo get_field('objectives_title');  ?>
      </div>

      <div class="clientsObjs--content col-12 col-md-9">

        <?php if(get_field('objectives_description')['title']):  ?>
        <h3 class='clientsObjs--content-subtitle'>
          <?php echo  get_field('objectives_description')['title'];  ?>
        </h3>
        <?php endif; ?>

        <?php echo  get_field('objectives_description')['content'];  ?>
      </div>
    </div>
  </div>
</section>


<!-- OUR OBJECTIVES  -->
<section class="ourObjs">
  <div class="container py-5">
    <div class="d-flex flex-wrap justify-content-between text-white my-5">


      <div class="ourObjs--title col-12 col-md-3">
        <?php echo  get_field('our_objectives_title'); ?>
      </div>



      <div class="ourObjs--content col-12 col-md-9 d-flex flex-wrap">
        <?php 
        $objectives = get_field('objectives');
        if( $objectives ) {
          $key = 1;
            foreach( $objectives as $row ) {
              $key <= 9 ? $key = ("0".$key) : $key;
                echo "<div class='col-12 col-md-6 px-2  pb-5'>
                <div class='ourObjs--content-number'>Objective ".$key.": </div>";
                if($row['title']): echo" <div class='ourObjs--content-subtitle  col-12'>".$row['title']."</div>"; endif;
                echo "<div class='ourObjs--content-descrip'>".$row['content']."</div>
                </div>";
                $key++;
            }
        }
        ?>
      </div>
    </div>
  </div>
</section>

<!-- BIG Message-->

<h2 class="case_study_banner_1 message_big text-white">
  <div class=" container">
    <div class="d-flex  flex-wrap justify-content-center align-items-center my-5  text-center">
      <?php echo get_field('objectives_message'); ?>
    </div>
  </div>
</h2>

<!-- IMAGE-->
<?php if( get_field('add_full_width__image')): ?>
<div class="single-case_banner"
  style="min-height: <?php echo get_field('message_image_height'); ?>px; background-image: url(<?php echo  get_field('message_image')['url']; ?>)">
</div>
<?php endif; ?>








<!-- PROCESS  -->
<section class="process">
  <div class="container py-5">
    <div class="d-flex flex-wrap justify-content-between text-white my-5">
      <div class="process--title col-12 col-md-3"> <?php echo  get_field('process_title'); ?> </div>

      <div class="process--content col-12 col-md-9 d-flex flex-wrap  justify-content-start align-items-start ">
        <?php 
        $phase = get_field('phase');
        $key = 1;
        if( $phase ) {
            foreach( $phase as $row ) {
              // var_dump($row['phase_image']['url']);
              $key <= 9 ? $key = ("0".$key) : $key;
                echo "<div class='col-12 col-md-6 px-2 pb-5''>";
                if($row['phase_image']['url']): echo" <div class='process--content-image col-12' style='background-image: url(".$row['phase_image']['url'].") '></div>"; endif;
                echo " <div class='process--content'>
                <div class='process--content-number'>The Process -- phase ".$key.":  </div>
                <div class='process--content-subTitle text-start col-12'>  ".$row['phase_title']." </div>
                <div class='process--content-descrip text-start col-12'>  ".$row['description']."</div>
                </div>
                </div>";
                $key++;
               
            }
        }
        ?>
      </div>
    </div>
  </div>
</section>





<?php if( get_field('add_process_message')): ?>
<section class="caseStudyBanner_2 message_big text-white">
  <div class=" container">
    <div class="d-flex  flex-wrap justify-content-center align-items-center my-5  text-center">
      <?php echo get_field('phase_message'); ?>
    </div>
  </div>
</section>
<?php endif; ?>


<?php if( get_field('add_process_image_and_text')): ?>
<section class="caseStudy--process_image_text">
  <div class=" container">
    <div class="d-flex  flex-wrap justify-content-center align-items-center my-5  text-center justify-content-between">
      <div class="col-12 col-md-6">
        <img class='lazyload' src='<?php echo  get_field('process_image_text')['process_it_image']['url']; ?>'
          alt=' <?php echo  get_field('process_image_text')['process_it_image']['title']; ?>' />
      </div>
      <div class="caseStudy--process_phase_text text-white col-12 col-md-5 text-start">
        <?php  echo  get_field('process_image_text')['process_it_text']; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>



<?php if( get_field('add_process_message2')): ?>
<section class="caseStudy-message2 message_big text-white">
  <div class=" container">
    <div class="d-flex  flex-wrap justify-content-center align-items-center my-5  text-center">
      <?php echo get_field('phase_message_2'); ?>
    </div>
  </div>
</section>
<?php endif; ?>


<?php if( get_field('add_process_big_image_footer') ): ?>
<div class="bannerFooter"
  style="min-height: <?php echo get_field('big_image_footer_height'); ?>px; background-image: url(<?php echo  get_field('process_big_image_footer')['url']; ?>)">
</div>
<?php endif; ?>







<!-- FAQS -->
<?php $faqs = get_field('faqs');  if( $faqs ) { ?>
<section class="caseStudy_faq faq text-white">
  <div class=" container">
    <div class="d-flex  flex-wrap justify-content-center align-items-center my-5  text-center">
      <div class="col-12 title"> <?php echo  get_field('faq_title'); ?> </div>
      <?php 
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
        ?>
    </div>
  </div>
</section>
<?php  } //if ends ?>

<?php get_footer(); ?>
