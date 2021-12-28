<?php $hero = get_field('hero_background', 5); ?>
<?php $btn = get_field('request_demo_button', 'option'); ?>
<?php $slide1 = get_field('slide1', 5); ?>

<section class="home-hero " style="background-image: url('<?php echo $hero['url']; ?>');">

  <div class="container">
    <div class="home-hero__content">
      <div class="home-hero__above-title">
        <?php echo get_field('hero_title', 5); ?>
      </div>
      <div id="home-hero-desk-slides-content" class="home-hero__slide-container">
        <div class="home-hero__slide slide_active">
          <h1 class="home-hero__title"><?php echo $slide1['title']; ?></h1>
          <p class="home-hero__text home-hero__text_ma-w-570"><?php echo $slide1['text']; ?>
        </div>
        <?php 
        $slides = get_field('hero_slides',5);
        foreach ($slides as $slide) : ?>
        <div class="home-hero__slide">
          <h1 class="home-hero__title"><?php echo $slide['title']; ?></h1>
          <p class="home-hero__text home-hero__text_ma-w-730"><?php echo $slide['text']; ?></p>
        </div>
        <?php endforeach; ?>
      </div>
      <?php 
      $cta = get_field('cta_1', 'options'); 
      $btnText = $btn['title'];
      $btnLink = $btn['url'];
      ?>

      <?php get_template_part( '/inc/parts/btn-request-demo' );  ?>
    </div>

    <!-- bottones -->
    <div class="home-hero__criteria-container">
      <div id="home-hero-desk-slides" class="home-hero__criteria_items">
        <?php $index = 1; foreach ($slides  as $slide) :  ?>
        <div data-index='<?php echo $index; ?>' class="home-hero__criteria <?php echo $slide['class']; ?>">
          <span><?php echo $slide['button_text']; ?></span>
        </div>
        <?php  $index++; endforeach; ?>
      </div>
    </div>


  </div>
</section>
