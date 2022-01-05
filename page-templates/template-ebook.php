<?php
/*
Template Name: Ebook
*/
get_header();
$sectionOne = get_field('section_one');
?>

<div id='ebook-page' class="intern-pg" >
    <!-- mbanner -->
    <section class="intro-banner">
    <div class="container">
      <div class="row">
      <div class="ebook__wrapper">

          <h1 class="ebook__heading"><?php echo trim(nl2br($sectionOne['heading'])) ?></h1>
          <p class="ebook__paragraph">
              <?php echo trim(nl2br($sectionOne['paragraph'])) ?>
          </p>
        
          <div class="col2">
            
          <div class="ebook__col">
              <?php
              $args = [
                  'class' => 'ebook__image',
              ]
              ?>
              <?php echo wp_get_attachment_image($sectionOne['column_left']['image'], 'full', false, $args) ?>
              <div class="ebook__info">
                  <p class="ebook__paragraph">
                      <?php echo trim(nl2br($sectionOne['column_left']['paragraph'])) ?>
                  </p>
              </div>
              <a href="<?php echo trim($sectionOne['column_left']['file']) ?>" class="button button-teal btn-contact"
                  download><?php echo trim($sectionOne['column_left']['button_name']) ?></a>
          </div>

          <div class="ebook__col">
              <?php echo wp_get_attachment_image($sectionOne['column_right']['image'], 'full', false, $args) ?>
              <div class="ebook__info">
                  <p class="ebook__paragraph">
                      <?php echo trim(nl2br($sectionOne['column_right']['paragraph'])) ?>
                  </p>
              </div>
              <a href="<?php echo trim($sectionOne['column_right']['link']) ?>"
                  class="button button-teal btn-contact"><?php echo trim($sectionOne['column_right']['button_name']) ?></a>
          </div>
          </div>

                
            </div>
      </div>
    </div>
  </section>

</div>



<?php get_footer(); ?>
