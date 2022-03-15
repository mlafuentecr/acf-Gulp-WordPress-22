<?php get_header(); ?>
<main class="bg-white text-black pg-404" role='main'>
  <div class="container py-5">
    <div class="d-flex flex-wrap justify-content-between text-white my-5">


      <article id="post-0" class="post not-found intern-pg text-black ">
        <div class="entry-content banner-404">
          <article class="headline bg-warning text-center p-4 m-4">
            <h1>404 | Oops! Page not found</h1>
            <p> <?php get_search_form(); ?></p>
          </article>
          <section class="info m-4">
            <h2> Perhaps you may like </h2>
            <!-- Meet the TEam -->
            <?php echo get_template_part('/inc/parts/slider', 'authorQuery'); ?>
          </section>

          <section class="info m-4">
            <!-- feature article -->
            <?php echo get_template_part('/inc/parts/content', 'featureArticle'); ?>
          </section>
        </div>
      </article>
    </div>
  </div>
</main>
<?php get_footer(); ?>
