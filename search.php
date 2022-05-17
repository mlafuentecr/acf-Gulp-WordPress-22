<?php get_header(); ?>


<main class=" pg-search bg-white d-flex flex-column justify-content-center align-content-start align-items-start"
  role="main">

  <div class=" col-12  ">
    <div class="d-flex flex-wrap justify-content-between text-white">

      <?php if ( have_posts() ) : ?>
      <header
        class="pg-search__header  col-12 mb-5 overflow-hidden d-flex flex-wrap justify-content-center align-content-center align-items-center text-center bg-yellow text-black">

        <div class="col-8 m-auto">
          <?php get_search_form(); ?>
        </div>

        <h1 class="entry-title text-black mb-5 col-8 col-md-8 text-center m-auto ">
          <div class="results text-black col-9 col-md-5  text-black text-center fs-5 m-auto my-4">
            <?php 
            $allsearch = new WP_Query("s=$s&showposts=0"); 
            echo $allsearch ->found_posts.' results found.';
             ?>
          </div>
        </h1>
      </header>


      <div class="container">
        <div class="bg-white text-black post-list row row-cols-1  row-cols-md-3 g-3">
          <?php while ( have_posts() ) : the_post(); ?>
          <?php 
          $post_id = get_the_ID();
          ///
          $excerpt              = get_the_excerpt($post_id);
          $featured_link        = get_permalink($post_id);
          $featured_img_url     = get_the_post_thumbnail_url($post_id, 'full'); 
          //Author
          $authorId             = get_post_field('post_author' , $post_id);
          $user                 = get_userdata($authorId);
          $data                 = get_field('author_info', 'user_'. $authorId);
          
          $name                 = $data['data']['author_name_and_lastname'];
          $author_profession    = $data['data']['author_profession'];
          $author_description   = $data['data']['author_description'];
          $author_picture       = $data['author_picture'];
          $author_url           = get_author_posts_url($authorId);
        ?>


          <?php 
        $post     = get_post();
        echo get_template_part('/inc/parts/card', 'latespost'); 
          ?>

          <?php endwhile; ?>
        </div>
      </div>
    </div>





    <?php else : ?>
    <section class="searchResult col-12 bg-white text-black">

      <header
        class="pg-search__header mb-5 overflow-hidden d-flex flex-wrap justify-content-center align-content-center align-items-center text-center bg-yellow text-black">
        <div class="col-8 m-auto">
          <?php get_search_form(); ?>
        </div>

        <h1 class="entry-title text-black mb-5 col-8 col-md-8 text-center m-auto ">
          <div class="results text-black col-9 col-md-5  text-black text-center fs-5 m-auto my-4">
            <?php 
            $allsearch = new WP_Query("s=$s&showposts=0"); 
            echo $allsearch ->found_posts.' results found.';
             ?>
          </div>
        </h1>
      </header>



      <dic class="col-12  m-0 p-0">

        <section class="info m-4">
          <h2> Perhaps you may like </h2>
          <!-- Meet the TEam -->
          <?php echo get_template_part('/inc/parts/slider', 'authorQuery'); ?>
        </section>

        <section class="info m-4">
          <!-- feature article -->
          <?php echo get_template_part('/inc/parts/content', 'featureArticle'); ?>
        </section>
      </dic>

    </section>
    <?php endif; ?>




</main>
<?php get_footer(); ?>
