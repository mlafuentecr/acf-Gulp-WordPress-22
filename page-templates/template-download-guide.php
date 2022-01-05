<?php
/*
Template Name: Download Guide
*/
get_header();
$sectionOne = get_field('section_one');
$sectionTwo = get_field('section_two');
$sectionThree = get_field('section_three');
$sectionFour = get_field('section_four');
?>
<div id="guide-download" class="guide-page intern-pg">

    <!-- 0 banner -->
<section class="intro-banner">
    <div class="container">
      <div class="row">

      <div class="col-left">
          <p class="heading"><?php echo trim($sectionOne['first_heading']) ?></p>
          <h1 class="heading"><?php echo trim(nl2br($sectionOne['second_heading'])) ?></h1>
          <div class="info">
              <?php foreach ($sectionOne['text'] as $value): ?>
                  <p class="paragraph"><?php echo trim(nl2br($value['paragraph'])) ?></p>
              <?php endforeach; ?>
          </div>
          <a href="#" class="button button-teal"
              id="guide-btn-scroll"><?php echo trim($sectionOne['button_name']) ?></a>
      </div>
      <div class="col-right">
          <?php
          if ($sectionOne['image_size'] == 0) {
              $imageSize = 'auto';
          } else {
              $imageSize = $sectionOne['image_size'] . '%';
          }
          $args = [
              'class' => 'intro__img',
              'style' => 'width:' . $imageSize
          ]
          ?>
          <?php echo wp_get_attachment_image($sectionOne['image'], 'full', false, $args) ?>
      </div>

      </div>
    </div>
</section>





<section class="question">
  <div class="container">
        <div class="row">
                    <div class="col-left">
                        <p class="heading-section"><?php echo trim(nl2br($sectionTwo['heading'])) ?></p>
                        <div class="list">
                            <?php foreach ($sectionTwo['list'] as $value): ?>
                                <div class="item">
                                    <p class="paragraph">
                                        <?php echo trim(nl2br($value['item'])) ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-right">
                        <?php
                        if ($sectionTwo['image_size'] == 0) {
                            $imageSize = 'auto';
                        } else {
                            $imageSize = $sectionTwo['image_size'] . '%';
                        }
                        $args = [
                            'class' => 'question__img',
                            'style' => 'width:' . $imageSize
                        ]
                        ?>
                        <?php echo wp_get_attachment_image($sectionTwo['image'], 'full', false, $args) ?>
                    </div>
                </div>
            </div>
</section>


<section class="investment">
<div class="container">
        <div class="row">
                    <div class="col-left">
                        <p class="investment__heading heading-section">
                            <?php echo trim(nl2br($sectionThree['heading'])) ?>
                        </p>
                    </div>
                    <div class="col-right">
                        <div class="investment__info">
                            <?php foreach ($sectionThree['text'] as $value): ?>
                                <p class="investment__paragraph">
                                    <?php echo trim(nl2br($value['paragraph'])) ?>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>




<section class="ebook" id="guide-target">
            <div class="container grid-container box-with-tab">
                <div class="block-pullout">
                    <article>
                        <h2><?php echo trim(nl2br($sectionFour['heading'])) ?></h2>
                        <!--[if lte IE 8]>
                        <script charset="utf-8" type="text/javascript"
                                src="//js.hsforms.net/forms/v2-legacy.js"></script>
                        <![endif]-->
                        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                        <script>
                            hbspt.forms.create({
                                portalId: "7851520",
                                formId: "a006c748-6045-4621-9129-2b5d7d6a40f8"
                            });
                        </script>
                        <!-- <p id="ebook__url" class="ebook__url"><?php // echo $sectionFour['page'] ?></p> -->
                    </article>
                </div>
            </div>
        </section>

</div>

<?php get_footer(); ?>