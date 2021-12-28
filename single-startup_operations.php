<?php 
/*
Template Name: startup_operations Post
*/

$page_fields = get_fields();
$startup_types = get_the_terms( $post->ID, 'startup_operations' );
$startup_type  = array_shift( $startup_types );
get_header(); 
?>
<div id="startup-post" class="intern-pg">

  <section class="group intro-banner"
    style="background-image: url(<?php echo $page_fields['first_background']['url']; ?>);">
    <div class="container-xl">
      <div class="row">
        <article class="headline">
          <div class="label">
            <?php echo $page_fields['first_label']; ?>
          </div>
          <h1 class="h1">
            <?php echo $page_fields['first_label']; ?>
          </h1>
          <p class="p"><?php echo $page_fields['first_text']; ?></p>
          <?php if ($page_fields['first_link_title'] !== ''): ?>

          <?php endif ?>
        </article>
      </div>
    </div>
  </section>

  <!-- section 3 esta sec esta compleja el sccs y el js la deje igual -->
  <section class="p-university-post-sec-2 section-3">
    <div class="p-university-post__grid grid-container">
      <div class="p-university-post-sec-2__row">
        <div class="p-university-post-sec-2__col-1">
          <div class="p-university-post-sec-2__nav-container">
            <ul class="p-university-post-sec-2__nav">
              <?php foreach ($page_fields['second_content'] as $key=>$link) : ?>
              <li class="p-university-post-sec-2__nav-li">
                <a href="#<?php echo $link['anchor']; ?>" class="p-university-post-sec-2__nav-link">
                  <?php echo $link['anchor']; ?>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <div class="p-university-post-sec-2__col-2">
          <?php foreach ($page_fields['second_content'] as $key=>$p) : ?>
          <div class="p-university-post-sec-2__chapter">
            <div id="<?php echo $p['anchor']; ?>" class="p-university-post-sec-2__anchor"></div>

            <h2 class="p-university-post-sec-2__title">
              <?php echo $p['title']; ?>
            </h2>
            <div class="p-university-post-sec-2__content">
              <?php echo $p['text']; ?>
            </div>
            <?php if($p['cta']['url']): ?>
            <a href="<?php echo $p['cta']['url']; ?>" class="arrow"><?php echo $p['cta']['title']; ?></a>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- section 4 -->
  <section class="section-4 post-related">
    <div class="container-xl">
      <div class="row">

        <?php 
  $args = array(
    'post_type' => 'startup_operations',
    'posts_per_page'   => -1,
    'post_status' => 'publish',
    'order'      => 'ASC'
  );
  $query = new WP_Query($args);
    
    
    if ($query->have_posts()): ?>
        <h2 class="block-others-posts__title">Related posts</h2>

        <ul class="post-list">
          <?php while ($query->have_posts()): ?>
          <?php $query->the_post(); ?>
          <?php $post_fields = get_fields(); $id = get_the_ID(); ?>

          <li class="box <?php echo $post_fields['icon_color']; ?>">
            <figure>
              <img src="<?php echo $post_fields['icon']['url']; ?>" alt="Icon">
            </figure>

            <h3>
              <?php echo $post_fields['first_heading']; ?>
            </h3>
            <div class="content">
              <?php 
              $excerpt = get_the_excerpt(); 
              $excerpt = substr( $excerpt, 0, 260 ); 
              $result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
              echo $result.' ...';
              ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="arrow">
              Learn more
            </a>
          </li>

          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
        
      </div>
    </div>
  </section>




  <!-- cta Reques Demo-->
  <?php 
  $cta2 = get_field("cta_2", "option");
    $bg = get_template_directory_uri()."/inc/images/demo-section-backgr.svg";
?>

  <section class="cta" style="background-image: url('<?php echo $bg; ?>');">
    <div class="container">
      <div class="row">
        <h2><?php echo $cta2["title"] ; ?></h2>
        <a class="button button-purple" rel="noopener"
          href="<?php echo $cta2["btn"]["url"]; ?>"><span><?php echo $cta2["btn"]["title"]; ?></span>
        </a>
      </div>
    </div>
  </section>
</div>


<?php get_footer(); ?>
