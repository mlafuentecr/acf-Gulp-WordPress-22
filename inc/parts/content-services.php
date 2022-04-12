  <!-- sec6 Why Rootstrap?  -->
  <section class="why_rootstrap">
    <div class="py-5  container">
      <div class="row align-items-start">
        <h2>
          <strong><?php the_field('sec6_title', 'option'); ?></strong>
        </h2>
        <div class="content col-12 mb-3 mb-md-0 col-md-6 text-black">
          <?php echo get_field('sec6_content', 'option'); ?>
        </div>
        <div class="content col-12 col-md-6">
          <?php $image =  get_field('sec6_image', 'option'); ?>
          <img src="<?php echo $image['url']; ?>" alt="<?php  echo $image['alt']; ?>">
        </div>
      </div>
    </div>

  </section>

  <!--  Fortune 500 Logos Client -->
  <section class="sec7 pt-5">
    <div class="container">
      <!-- Clients -->
      <section class="clients py-5">
        <div class="container py-5">
          <h3 class='text-center'> <?php the_field('sec7_title', 'option'); ?></h3>
          <div class="row   row-cols-2 row-cols-lg-3  row-cols-xl-<?php  the_field('clients_columns', 'option');  ?> ">
            <?php 
        $rows = get_field('clients_logos', 'option');
        if( $rows ) {
            foreach( $rows as $item => $row ) { ?>

            <div class="col text-center my-5"> <img max-width='122px' height='auto'
                src="<?php echo esc_url($row['url']); ?>" class=' lazyload'
                alt="<?php echo esc_attr($row['alt']); ?>" />
            </div>
            <?php  }
      }
      ?>
          </div>
        </div>
      </section>
    </div>
  </section>

  <!--  About  -->
  <section class="aboutus my-5">
    <div class="container">

      <div class="sec8_title_img my-5 col-12 text-center ">
        <?php $sec8_title_img =  get_field('sec8_title_img', 'option'); ?>
        <img class='m-auto ' src="<?php echo $sec8_title_img['url']; ?>" alt="<?php  echo $sec8_title_img['alt']; ?>">
      </div>

      <div class="row align-items-start">
        <div class=" col-12 col-md-6">
          <?php $sec8_image =  get_field('sec8_image', 'option'); ?>
          <img src="<?php echo $sec8_image['url']; ?>" alt="<?php  echo $sec8_image['alt']; ?>">
        </div>
        <div class=" mt-3 mt-md-3 col-12 col-md-6 text-black">
          <?php echo get_field('sec8_content', 'option'); ?>
        </div>

      </div>

      <!-- //repeter sec3_box -->
      <div class="sec8_item  d-flex justify-content-center align-content-center row row-cols-2 row-cols-md-3 my-5">
        <?php 
          $sec8_item  =  get_field('sec8_item', 'option');
          if( $sec8_item ) { foreach( $sec8_item as $box ) {
          echo '<div class="col text-center text-md-start">';
            echo "<img class='lazyload m-auto mt-5 mb-0' src='".$box['icon']['url']."' alt='".$box['icon']['alt']."' />";
            echo "<h4 class='text-center text-md-start '>".$box['subtitle']."</h4>";
            echo "<div class='content text-center text-md-start'>".$box['description']." </div>";
            echo '</div>';
          }
          }
          ?>
      </div>

    </div>
  </section>

  <!-- News -->
  <section class="news my-5">
    <div class="container pt-5">

      <h3 class='text-center pt-5'> <?php  the_field('sec9_title', 'option'); ?> </h3>
      <div class="row g-4 my-5 d-flex row-cols-1 row-cols-md-3 justify-content-between">
        <?php 
            $sec9_news = get_field('sec9_news', 'option'); 
            if( $sec9_news ) { foreach( $sec9_news as $i => $box ) {
              $i++;
              $i <10 ? $i = '0'. $i : $i;
                  echo ' <div class="box p-3 col m-auto text-center text-md-start   rounded">';
                  echo '<img class="lazyload my-4 m-auto m-md-0" src="'. $box['image']['url'] .'" alt="'. $box['image']['alt'] .'" />';
                      echo ' <div class="content  m-auto  "> '. $box['content'] .'</div>';
                    echo '</div>';
              }
            }
          ?>
      </div>



      <div class="row more_info align-items-start mt-5 pt-5 ">
        <?php 
          $sec9_image = get_field('sec9_image', 'option');
          ?>
        <div class=" col-12 col-md-6">
          <img class='lazyload img-fluid pe-4' src='<?php echo $sec9_image['url']; ?>'
            alt='<?php echo $sec9_image['alt']; ?>' />
        </div>
        <div class=" col-12 col-md-6 text-black">
          <?php the_field('sec9_content', 'option'); ?>
        </div>
      </div>

    </div>

  </section>
