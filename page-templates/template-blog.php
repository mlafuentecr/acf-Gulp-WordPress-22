<?php
/*
Template Name:  Blog
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*---------------------------------------------------------*/
/*  ACF Page our-value
/*---------------------------------------------------------*/
$pageFields = get_fields();
$blog_headline_bg_color = $pageFields['blog_headline_background_color'] ?: 'black';
$blog_headline_height = $pageFields['blog_headline_hight'] ?: '600px';
$blog_headline_text_color = $pageFields['blog_headline_text_color'] ?: 'white';
$feature_article = $pageFields['feature_article'];



//Feature post
$feature_article_id = $feature_article[0]->ID;
$excerpt = get_the_excerpt($feature_article_id);
$feature_date = get_the_date( 'dS M Y', $feature_article_id );
$featured_link =  get_permalink($feature_article_id);
//Author
$author_id = $feature_article[0]->post_author;
$user_info = get_userdata($author_id);
$user_name = $user_info->display_name;
$user_email = $user_info->user_email;
$author_url = get_author_posts_url($author_id);
$author_Img_url = get_avatar_url( get_the_author_meta( $author_id  ), 90 );


$features_articles_col  = $pageFields['features_articles_columns'] ?: 2;
$feature_articles       = $pageFields['feature_articles'];
$article_title          = $pageFields['article_title'];
$view_all_articles      = $pageFields['view_all_features_articles'];

//IMAGES FOR SLIDER
$numberOfImages =  10;
$imgNumber =1;

 // The Query for lates article
 $args = array(
  'posts_per_page'  => $post_quantity-1, 
  'post__not_in' => array($feature_article_id),
  'orderby'         => 'post_date',
  'order'           => 'DESC',
  'post_type'       => 'post', 
  'post_status'     => 'publish'
  );

  $the_query = new WP_Query( $args );
  
function wrapImages($i, $pics,  $divCounter ){

       //put images 2 by 2 
    
        $picWrap .= '
        <figure >
        <img src="'. $pics[$i]['url'].'" alt="'.$pics[$i]['alt'].'" class="slider_author">
        <figcaption> 
        <span class="title mt-2">'.$pics[$i]['title'].'</span>
        <span class="description">'.$pics[$i]['description'].'</span>
        </figcaption>
        </figure> ';
      
      

  

     return $picWrap ;
}
  //Insert 5 pics 
 function insertPics($pics, $slidernumber, $imgNumber, $numberOfImages){
  
  //varoiable holder 
  $picWrap ='';

  //max of images to have
  $maxOfImages = $numberOfImages * $slidernumber; //10*1 = 10
  //min of images to have
  $globals['minOfImages'] = $maxOfImages - $numberOfImages ; //10-10 = 0

   
  $divCounter = 1;
//IMAGES OF SLIDER
  foreach( $pics as $i => $row ) {
     
    //number of image is 10 +  minOfImages of last slider 
      $i = $i + $minOfImages;
      $globals['imagesWidth'] = $numberOfImages / 100*100*2;
     
   

    if( $imgNumber > $globals['minOfImages'] && $imgNumber <= $maxOfImages   ){

      //put images 2 by 2 
      if( $divCounter <= 2){
        if( $divCounter ===1){ echo '<div class="imgHolder" style="width: '. $globals['imagesWidth'] .'%">';}
          echo wrapImages($i, $pics,  $divCounter );
          if( $divCounter ===2){echo  '</div> ';}
          }
        }
    
        $imgNumber++;
        $divCounter++;
        //if $divCounter is higher put it in 1
    $divCounter > 2 ? $divCounter = 1 : $divCounter;
  }
  return $picWrap ;
  }

?>






<main id="blog" style="color: <?php echo $blog_headline_text_color; ?>;  ">


  <header class='main-header ' style='background-color:<?php echo $blog_headline_bg_color; ?>'
    data-color='<?php echo $blog_headline_bg_color; ?>'>
    <div class='container'>
      <div class="row  row-cols-1  row-cols-md-2 d-flex flex-wrap align-content-center justify-content-center "
        style="min-height:<?php echo $blog_headline_height; ?>px;">
        <div class="col my-5 d-flex  justify-content-around flex-column">

          <h1 class="mb-5">
            <a class='links-with-line' href="<?php echo $featured_link; ?>">
              <?php echo $feature_article[0]->post_title; ?>
            </a>
          </h1>

          <?php if($excerpt): ?><div class="excerpt"><?php echo $excerpt ; ?></div><?php endif; ?>

          <div class="author-info d-flex mt-5">
            <a href="<?php echo $author_url; ?>">
              <div class="author-img ">
                <img class='lazyload rounded-circle' src='<?php echo $author_Img_url; ?>'
                  alt='<?php echo $user_nicename; ?>' />
              </div>
              <div class="author-name-date mx-3">
                <p class="author-name m-0 p-0"><?php echo $user_name; ?></p>
                <div class="author-post-date m-0 p-0">

                  <div class="author_date"><?php echo date("F j, Y", strtotime($feature_date)) . " - "; ?></div>
                  <div class="author_time_reading">
                    <?php echo ' '. get_field( 'time_estimation', $feature_article_id) ?: '5'; ?> min
                    read
                  </div>


                </div>
              </div>
            </a>
          </div>



        </div>
        <div class="col my-5  d-flex align-items-center align-content-center">
          <a href="<?php echo $featured_link; ?>">
            <?php echo get_the_post_thumbnail( $feature_article_id, 'full' ); ?>
          </a>
        </div>
      </div>
    </div>
  </header>

  <!-- //getlatespost -->
  <div class="container  ">
    <h3 class="smalltitle my-5 col-12">Lates Post </h3>
    <?php get_template_part("/inc/parts/loops/loop-getlatespost"); ?>
    <a class='rs_link_underline' href="<?php echo $view_all_articles['url']; ?>" class="link">
      <?php echo $view_all_articles['title']; ?></a>
  </div>

  <!-- //Newsletter -->
  <?php echo $pageFields['news_letter']; ?>


  <!-- feature article -->
  <section class="feature_article my-5">
    <div class="container">
      <h3 class='smalltitle mb-5 col-12'><?php echo $pageFields['article_title']; ?></h3>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-<?php echo $features_articles_col; ?>">
        <?php 
      if( $feature_articles ) {
          foreach( $feature_articles as $row ) {?>
        <?php 
     
          $post_id = $row->ID;
          ///
          $excerpt            = get_the_excerpt($post_id);
          $featured_link      =  get_permalink($post_id);
          $featured_img_url   = get_the_post_thumbnail_url($post_id, 'full'); 
          //Author
          $author_data        = $row->post_author;
          $user_info          = get_userdata($author_data);
          $author_id          = $user_info->ID;
          $user_name          = $user_info->display_name;
          $author_url         = get_author_posts_url($author_id);
          $author_Img_url     = get_avatar_url( get_the_author_meta( $author_id  ), 90 );
          
           //var_dump($author_Img_url);
          ?>

        <div class="card mb-5 ">

          <a class="card-link" href="<?php echo  get_permalink( $post_id ); ?>" rel="noopener noreferrer">
            <div class="card-img mb-4 zoom_img" style="background-image: url(<?php echo $featured_img_url; ?>);">
            </div>
          </a>

          <div class="card-body  p-0  ">

            <a class="card-link text-gray" href="<?php echo  get_permalink( $post_id ); ?>" rel="noopener noreferrer">
              <div class="title link_main_style text-black links-with-line  ">
                <?php echo $row->post_title; ?>
              </div>
            </a>

            <!-- Show excerpt -->
            <div class="content text-gray"> <?php echo  $excerpt; ?></div>
            <!-- Show Author info -->
            <div class="author  py-1 d-flex ">

              <div class="author_pic px-2"
                style='background-image: url("<?php echo get_avatar_url($author_id, array('size' => 450)); ?>");'>
              </div>

              <div class="px-2 flex-grow-1 ">

                <div class="col-12 author_name">
                  <a href="<?php echo get_author_posts_url($author_id); ?>" target="_blank"
                    rel="noopener noreferrer"><?php echo get_the_author_meta( 'display_name',  $author_id);  ?>
                  </a>
                </div>

                <div class="author_data d-flex">
                  <div class="author_date">
                    <?php echo date("F j, Y", strtotime($post->post_date)) . "<br>"; ?>
                  </div>
                  <div class="author_time_reading">
                    <?php echo get_field( 'time_estimation', $post->ID) ?: '5'; ?> min read
                  </div>
                </div>

              </div>

            </div>
          </div>

          <!-- end card-body -->
        </div>
        <?php }
      }
      ?>

      </div>


      <a class="rs_link_underline mt-5" href="<?php echo $view_all_articles['url']; ?>">
        <?php echo $view_all_articles['title']; ?>
      </a>


    </div>
  </section>

  <!-- Meet the TEam -->
  <div id="carouselAuthors" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php 
      $pics = get_field('team_pictures');
      if( $pics ) {

        $numberOfSlider= round( count($pics) / $numberOfImages );
   
        //SLIDER ONLY 
          for ($slidernumber = 0; $slidernumber <= $numberOfSlider; $slidernumber++) {
            //set the slider to 1 and not 0
            $slidernumber === 0 ?  $slidernumber = 1 : $slidernumber;
            //always first slider is active
            $slidernumber === 1 ? $status = 'active' : $status = '';
            
          //IMAGES OF SLIDER
          echo '<div class="carousel-item '.$status.'" data-bs-interval="10000"> ';
            echo '<div class="images-wrapper masonry-with-columns">';
            echo  insertPics($pics, $slidernumber, $imgNumber, $numberOfImages);
            echo '</div>';
          echo '</div>';
        }

      }

      ?>
    </div>
    <a class="rs_link_underline my-5" href="#">See All Authors </a>
    <div class="buttons">
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselAuthors" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselAuthors" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </div>


  <!-- GET FORM -->
  <?php if ( is_active_sidebar( 'form' ) ) : ?>
  <section class="form bg-black py-5">
    <?php dynamic_sidebar( 'form' ); ?>
  </section>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
