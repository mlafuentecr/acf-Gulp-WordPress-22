<?php

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

?>
<section class="author-page">

  <header class="author-header">

    <div class="container">

      <div class="row">


        <div class="author-img col-1 col-md-4">
          <a href="<?php echo get_author_posts_url($curauth->user_url) ?>">
            <?php  echo get_avatar($curauth->ID, 690); ?>
          </a>
        </div>

        <div class="content col-1 col-md-6">
          <div class="author-name ">
            <h3><?php echo $curauth->display_name; ?></h3>
          </div>
          <div class="author-bio">
            <?php echo $curauth->description; ?>
          </div>
        </div>


      </div>
    </div>


  </header><!-- .entry-header -->

  <section class="cards-section">
    <div class="container">
      <p class="h7 text-center my-4">
        ARTICLES by <?php echo $curauth->display_name; ?>
      </p>

      <div class="cards-articles">

        <div class="row row-cols-1 row-cols-md-3">
          <?php 
				set_query_var('author_ID', $curauth->ID);
				get_template_part("inc/parts/loop-author"); 
			?>
        </div>
      </div>

    </div>
  </section>

  <footer class="entry-footer">

  </footer><!-- .entry-footer -->
</section>
<!-- #post-
