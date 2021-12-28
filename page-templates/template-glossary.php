<?php
/*
Template Name: Glossary
*/
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header(); 
$glossaryFields = get_fields();

$settings = array(
  'post_type' => 'glossary_post',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'post__in',
  'include' => ''
);


/*------------------------------------ */
/*--Tengo que hacer el js de abrir -- */
/*------------------------------------ */
?>


<div id="glossary-page">

  <main class="glossary-page">
    <section class="glossary-intro" style="background-image: url('<?php echo $glossaryFields['int_sec_bg_image'] ?>')">
      <h1 class="glossary-intro__heading"><?php echo nl2br($glossaryFields['int_sec_heading']) ?></h1>
    </section>

    <?php if ($glossaryFields['glossary_list']): ?>
    <section class="glossary-info">
      <div class="glossary__main-anchor"></div>
      <div class="glossary-info__container grid-container">
        <div class="glossary-info__row">
          <div class="glossary-info__col-left">
            <ul class="glossary-info__categories">
              <?php foreach ($glossaryFields['glossary_list'] as $glossaryKey => $glossaryItem): ?>
              <li class="glossary-info__category">
                <div class="glossary-info__cat-anchor"></div>
                <a class="glossary-info__cat-name">
                  <span class="glossary-info__icon"></span>
                  <span class="glossary-info__text"><?php echo $glossaryItem['item_heading'] ?></span>
                </a>
                <div class="glossary-info__line"></div>
                <?php if ($glossaryItem['dropdown_list']): ?>

                <ul class="glossary-info__post-list">
                  <div class="glossary-info__posts-anchor"></div>
                  <?php foreach ($glossaryItem['dropdown_list'] as $dropDownItem): ?>
                  <li class="glossary-info__post">
                    <a href="#" class="glossary-info__post-link" post-index="<?php echo $dropDownItem->ID ?>">
                      <?php echo $dropDownItem->post_title ?>
                    </a>

                  </li>
                  <?php endforeach; ?>
                  <div class="glossary-info__content">

                    <section class="glossary-info__preview">
                      <div class="glossary-info__block-top">
                        <?php $postIdArr = []; ?>
                        <?php foreach ($glossaryItem['dropdown_list'] as $dropDownItem): ?>
                        <?php $postIdArr[] = $dropDownItem->ID; ?>
                        <?php endforeach; ?>
                        <?php
                                                        $settings['include'] = $postIdArr;
                                                        $posts = get_posts($settings);
                                                        ?>
                        <?php if (isset($posts)): ?>

                        <ul class="glossary-info__posts" id="
                                                <?php echo 'mob-' . $glossaryKey ?>">
                          <h2 class="glossary-info__heading">
                            <?php echo $glossaryItem['item_heading'] ?>
                          </h2>
                          <p class="glossary-info__paragraph">
                            <?php echo $glossaryItem['item_description'] ?>
                          </p>
                          <?php foreach ($posts as $post): ?>
                          <li class="glossary-info__post">
                            <div class="glossary-info__anchor" id="<?php echo 'mob-content-' . $post->ID ?>">
                            </div>
                            <h2 class="glossary-info__heading">
                              <?php the_title() ?></h2>
                            <p class="glossary-info__paragraph">
                              <?php the_field('description'); ?>
                            </p>
                          </li>
                          <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                      </div>
                    </section>
                  </div>
                </ul>
                <?php endif; ?>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="glossary-info__col-right">
            <div class="glossary-info__content" id="main-content-block">
              <section class="glossary-info__preview">
                <div class="glossary-info__block-top">
                  <?php foreach ($glossaryFields['glossary_list'] as $glossaryKey => $glossaryValue): ?>
                  <?php $postIdArr = []; ?>
                  <?php foreach ($glossaryValue['dropdown_list'] as $dropdownPost): ?>
                  <?php $postIdArr[] = $dropdownPost->ID; ?>
                  <?php endforeach ?>
                  <?php
                                        $settings['include'] = $postIdArr;
                                        $posts = get_posts($settings);
                                        ?>
                  <?php if (isset($posts)): ?>
                  <ul class="glossary-info__posts">
                    <h2 class="glossary-info__heading"><?php echo $glossaryValue['item_heading'] ?></h2>
                    <?php if ($glossaryValue['item_description']): ?>
                    <p class="glossary-info__paragraph"><?php echo $glossaryValue['item_description'] ?></p>
                    <?php endif; ?>
                    <?php foreach ($posts as $post): ?>
                    <li class="glossary-info__post">
                      <div class="glossary-info__anchor" id="<?php echo 'desk-content-' . $post->ID ?>">
                      </div>
                      <h2 class="glossary-info__heading"><?php the_title() ?></h2>
                      <p class="glossary-info__paragraph">
                        <?php the_field('description'); ?>
                      </p>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                  <?php endif; ?>
                  <?php wp_reset_postdata(); ?>
                  <?php endforeach ?>
                </div>
              </section>
            </div>
          </div>

        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if ($wantDemo == 1): include(get_template_directory() . '/parts/content-demo.php');
    endif; ?>
  </main>


</div>




<?php get_footer(); ?>
