<?php
/*
Template Name: Customer Success
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------*/
$pageFields = get_fields();
$banner_content = $pageFields['banner_content'];

$banner_media_content = $pageFields['banner_media_content'];
$featuredstory = $pageFields['featured_story'];
$quote_picture = $pageFields['quote_picture'];
$quote_content = $pageFields['quote_content'];
$read_more_btn = $pageFields['read_more_btn'];
$g2_text = $pageFields['g2-text'];
$g2_logos = $pageFields['g2-logos'];
$cta = $pageFields['cta'];
/*------------------------------------------------------*/
/*  QUERY
/*-----------------------------------------------------*/
$args = array(  
  'post_type' => 'customers',
  'post_status' => 'publish',
  'posts_per_page' => 40, 

);

$loop = new WP_Query( $args ); 


/*------------------------------------------------------*/
/*  ARRAYs for filter Select 
/*-----------------------------------------------------*/

$industry =array("");




function showLink($link, $id ){
  return $link ? '<a href="'.get_permalink( $id ).'" class="w-arrow">'.$link.'</a>' : '';
 }
//Podria hacer que cuando le de click a search guarde la cookie por js
//y despues refresque
//y este loop lo ejecute
?>
<div id="customer-success" class="intern-pg">

  <!-- 0 banner -->
  <section class="intro-banner" style="background-image: url(<?php echo $pageFields['banner_background']; ?>);">
    <div class="container">
      <?php if ($pageFields['banner_title']): ?>

      <div class="col-md-6 col-12 d-flex flex-wrap align-items-center">
        <div class="main-content">
          <p class='customer_banner_title col-12'><?php echo $banner_content['banner_title']; ?></p>
          <div class="customer_banner_subtitle col-12"><?php echo $banner_content['banner_subtitle']; ?> </div>
          <div class="customer_banner_content col-12"><?php echo $banner_content['banner_content']; ?> </div>

        </div>
        </a>
      </div>
      <div class="col-md-6 col-12 d-flex flex-wrap justify-content-end align-items-center">
        <?php 
            if($banner_media_content['type'] === "Video") : 
              $videoDiv = '<div class="video-youtube text-end">
              <a href="videoModal" data-bs-toggle="modal" data-bs-target="#videoModal">
              <img class="lazyload icon-video" src="'. get_template_directory_uri() .'/inc/images/video-icon.png"/>';
              $videoDiv .= '<img class="lazyload img-video" src="'.$banner_media_content['video_thumbnail']['url'].'"
                alt="'.$banner_media_content['video_thumbnail']['title'].'" />';
              $videoDiv .= '</a>
          </div>';
          echo $videoDiv;
          endif;
          ?>
      </div>

      <?php endif; ?>
    </div>
  </section>

  <!-- MODAL VIDEO-->
  <?php if($banner_media_content['type'] === "Video") : ?>
  <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="gridModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid bd-example-row">
            <div class="youtube">
              <iframe width="100%" height="600" src="<?php echo $banner_media_content['video']; ?>" title="video Laika"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>


  <?php 


         if ( $loop ->have_posts() ) { 
           while ( $loop ->have_posts() ) { 
          




            $meta = get_post_meta(get_the_ID(), '', true);
            $industry =array("");
array_push($industry ,$meta['[company_descr_application_form_1_description'][0]);


///print_r($meta);



          }
        }
        wp_reset_postdata();
        
        ?>



  <div class="bg-gray">
    <section class=" mt-5 d-flex flex-wrap">
      <div class="container">
        <section class="filter col-12">
          <div class="bg-purple rounded text-center d-flex  justify-content-center align-items-center">

            <div class="bar col-11 m-auto d-flex flex-wrap  p-5 p-md-1 align-items-center justify-content-around">

              <div class="col-lg-1 col-12 d-flex justify-content-center justify-content-lg-end ">
                SORT BY




              </div>

              <div class="col-lg-3 col-12 ">
                <select name="industries" id="select1">
                  <option value=""> All Industries </option>
                </select>
              </div>


              <div class="col-lg-3 col-12  text-center  ">
                <select class="px-2" name="sizes" id="select2">
                  <option value=""> All Company Sizes </option>
                </select>
              </div>


              <div class="col-lg-3 col-12  ">
                <select name="locations" id="select3">
                  <option value=""> All Locations </option>
                </select>
              </div>


              <!-- <div class="col-lg-2 col-12  ">
                <a href="http://"> <img class='lazyload'
                    src='<?php echo get_template_directory_uri(); ?>/inc/images/search-btn.png' alt='search' /></a>
              </div>
            </div> -->

            </div>
        </section>
      </div>

      <div class="container">
        <section class="featured box  rounded p-0 m-0 my-3 d-flex ">
          <div class="d-flex flex-wrap m-0 p-0 py-3 col-12  ">
            <div class="col-md-12 col-lg p-5 d-flex featuredstory-logo justify-content-center align-items-center ">
              <img class='lazyload' src='<?php echo $featuredstory['logo']['url']; ?>'
                alt='<?php echo $featuredstory['logo']['title']; ?>' />
            </div>

            <div class="col-md-12 col-lg  p-md-5 pt-sm-0">
              <p class="col-12 featured_text text-lg-start text-md-center">
                <?php echo $featuredstory['featured_text']; ?></p>
              <p class="col-12 featured_content text-lg-start text-md-center">
                <?php echo $featuredstory['featured_content']; ?></p>
              <div class="btn-wrap text-start col-12">
                <a class="button reques-demo button-purple text-lg-start text-md-center m-lg-0 m-md-auto mb-5 mb-md-0"
                  rel="noopener"
                  href="<?php echo $featuredstory['cta_link']; ?>"><span><?php echo $featuredstory['cta']; ?></span>
                </a>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="customers-boxes container">
        <div id="customers-1" class=" row  p-0 gx-3 ">
          <?php 

print_r($industry);
 $count = 0; //set up counter variable

          if ( $loop ->have_posts() ) { 
            while ( $loop ->have_posts() ) { 

              $loop ->the_post();
              $id =get_the_ID();
              $pageFields = get_fields($id);
              $count++;
              $post = $pageFields['preview_customer_post'];
                 // $meta = get_post_meta($id, '', true);
              //  print_r($meta);
              // print_r($meta['[company_descr_application_form_1_description'][0] );
              //print_r($pageFields["preview_customer_post"] );
//INSERT ALL POST
              echo '<div class="col-12 col-md-4 mb-3  d-flex align-items-stretch ">
             <div class="box d-flex align-content-start rounded p-3 border">
             <figure class="col-12 d-flex justify-content-center align-center mb-3">
             <img class="lazyload m-auto" src="'.$post['logo'].'"/>
             </figure>
             <div class="content">
               <div class="description text-left">'.$post['content'].'</div>
             </div>
             '.showLink($post['link'], $id ).'
             <div class="tag d-flex justify-content-center col-12">'.$post['label']['label_text'].'</div>
           </div>
         </div>';



          // INSERT testimonial             
         if ($count === 3) {
           ?>

          <section class="testimonial  bg-white shadow-top_out shadow-bottom_out  my-5 py-5">
            <div class="container my-5">
              <div class="d-flex flex-wrap m-0 p-0 col-12 justify-content-md-around">
                <div class="col-lg-6 col-12 d-flex flex-wrap align-items-center mb-5 mb-md-0">
                  <img class='lazyload m-auto mb-4 m-lg-0 shadow rounded-0' src='<?php echo $quote_picture['url']; ?>'
                    alt='<?php echo $quote_picture['title']; ?>' />

                </div>
                <div class="col-lg-5 col-12 d-flex flex-wrap align-items-center mt-0 mt-sm-5">
                  <div class="quote_content col-12 "><?php echo $quote_content['quote']; ?></div>
                  <div class="quote_name col-12"><?php echo $quote_content['name']; ?></div>
                  <div class="quote_profession col-6"><?php echo $quote_content['profession']; ?></div>
                  <div class="quote_logo col-6  text-end"><img class='lazyload'
                      src='<?php echo $quote_content['logo']['url']; ?>'
                      alt='<?php echo $quote_content['logo']['title']; ?>' />
                  </div>
                </div>
              </div>
            </div>
          </section>



          <?php
        } // INSERT end testimonial    



            }
          }
          wp_reset_postdata();
          
          ?>
        </div>
      </div>

    </section>




    <div class="customers-boxes container">
      <div id="customers-2" class="row p-0  gx-3 ">

      </div>
    </div>

    <?php if($read_more_btn['url']): ?>
    <a class="button reques-demo button-purple text-lg-start text-md-center m-auto   mb-5 mb-md-0" rel="noopener"
      target="target" href="<?php echo $read_more_btn['url']; ?>"><span><?php echo $read_more_btn['title']; ?></span>
    </a>
    <?php endif; ?>


    <section class="g2 bg-white mt-5 pt-5">
      <div class="container">
        <div class="d-flex flex-wrap  justify-content-md-around m-0 p-0 col-12 m-0 m-md-5 ">
          <div class="col-md-5 col-12 g2-content">
            <?php echo $g2_text; ?>
            <a class="arrow" href="<?php echo $cta['url']; ?>"><?php echo $cta['title']; ?></a>
          </div>
          <div class="col-12 col-md-6 ml-5 mt-5 ">
            <div class="col-12 d-flex border-bottom pb-3">
              <img class='lazyload badges m-auto ' src='<?php echo $g2_logos['url']; ?>'
                alt='<?php echo $g2_logos['title']; ?>' />
            </div>
            <div class="col-xl-10 col-md-12 m-auto d-flex mt-3 align-content-center justify-content-center">

              <div class="col m-0 p-0 text-center">

                <div class="circle-wrap m-auto">
                  <div class="circle circle-1 full-8">
                    <div class="mask full ">
                      <div class="fill"></div>
                    </div>
                    <div class="mask half">
                      <div class="fill"></div>
                    </div>
                    <div class="inside-circle circle-1-center"> 8.7 </div>
                  </div>
                </div>
                <div class="text mt-2">Ease of Use</div>
              </div>

              <div class="col m-0 p-0 text-center">
                <div class="circle-wrap m-auto">
                  <div class="circle circle-2 full-9">
                    <div class="mask full ">
                      <div class="fill"></div>
                    </div>
                    <div class="mask half">
                      <div class="fill"></div>
                    </div>
                    <div class="inside-circle circle-2-center"> 9 </div>
                  </div>
                </div>
                <div class="text mt-2">Quality of Support</div>
              </div>

              <div class="col m-0 p-0 text-center">
                <div class="circle-wrap m-auto">
                  <div class="circle  circle-3 full-9">
                    <div class="mask full ">
                      <div class="fill"></div>
                    </div>
                    <div class="mask half">
                      <div class="fill"></div>
                    </div>
                    <div class="inside-circle circle-3-center"> 9 </div>
                  </div>
                </div>
                <div class="text mt-2">Ease of Setup</div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php get_footer(); ?>
