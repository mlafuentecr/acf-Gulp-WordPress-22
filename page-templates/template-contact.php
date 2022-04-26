<?php
/*
Template Name: Contact
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/

$form = get_field('form');
$sec_2 = get_field('sec_2');

?>

<main id="contact-us" class="intern-pg bg-black text-white">
  <section class=" py-5   my-5">
    <div class="container  my-5 ">
      <div class="d-flex flex-wrap ">

        <div class="col-12 col-md-8 form ">
          <?php echo $form ?>
        </div>


        <?php if($sec_2['job_opportunities_link']):  ?>
        <div class="col-12 col-md-4 ps-0 ps-md-5 mt-5 d-flex justify-content-center flex-column align-content-center">
          <h2 class=" mt-5"><strong> <?php echo $sec_2['job_opportunities']; ?></strong></h2>
          <a class='rs_link_underline' href="<?php echo $sec_2['job_opportunities_link']['url']; ?>">
            <?php echo $sec_2['job_opportunities_link']['title']; ?></a>
          <img class='lazyload my-5' src='<?php echo $sec_2['job_opportunities_img']['url']; ?>'
            alt='<?php echo $sec_2['job_opportunities_img']['alt']; ?>' />
        </div>
        <?php endif; ?>

        <?php  if( get_field('send_us_a_email') ): ?>
        <div class="col-12 my-5 text-center">
          <h2><strong> <?php echo get_field('send_us_a_email'); ?></strong></h2>
        </div>
        <?php endif; ?>


      </div>

    </div>
  </section>


</main>


<?php get_footer(); ?>
