<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page Homepage 
/*-----------------------------------------------------------------------------------*/
/*  Demo */
$demo_title     = get_field('demo_title');
$demo_link      = get_field('demo_link');
if( $demo_link  ): 
  $link_url     = $demo_link ['url'];
  $link_title   = $demo_link ['title'];
  $link_target  = $demo_link ['target'] ? $link['target'] : '_self';
endif;

/*  2 competitors  */
$second_heading = get_field('second_heading');
$second_text    = get_field('second_text');
$second_list    = get_field('second_list');
$second_image   = get_field('second_image');

$second_link    = get_field('second_link');
if( $second_link  ): 
  $scnd_url     = $second_link ['url'];
  $scnd_title   = $second_link ['title'];
  $scnd_target  = $second_link ['target'] ? $link['target'] : '_self';
endif;

/*  3  journey  */
$third_heading = get_field('third_heading');
$third_text    = get_field('third_text');

$third_tab1    = get_field('third_first_tab_title');
$third_tab2    = get_field('third_second_tab_title');

$third_1imgs    = get_field('third_first_tab_images');
$third_2imgs    = get_field('third_second_tab_images');

/*  4  solution  */
$four_heading   = get_field('fourth_heading');
$fourth_content  = get_field('fourth_content');

/*  5  features  */
$five_heading   = get_field('fifth_heading');
$fifth_text   = get_field('fifth_text');
$five_content  = get_field('fifth_content');
$fifth_link  = get_field('fifth_link');
if( $fifth_link  ): 
  $link_five_url     = $fifth_link ['url'];
  $link_five_title   = $fifth_link ['title'];
  $link_five_target  = $fifth_link ['target'] ? $link['target'] : '_self';
endif;

/*  6  futureProof  */
$sixth_heading   = get_field('sixth_heading');
$sixth_col1  = get_field('sixth_left_text');
$sixth_col2  = get_field('sixth_right_text');
$sixth_right_list  = get_field('sixth_right_list');


if( $fifth_link  ): 
  $link_seven_url     = $seventh_link ['url'];
  $link_seven_title   = $seventh_link ['title'];
  $link_seven_target  = $seventh_link ['target'] ? $link['target'] : '_self';
endif;





?>


<?php include_once( get_template_directory() .'/inc/parts/slider_home.php' ); ?>

<!-- 2 competitors -->
<section class="competitors">
  <div class="container">

    <h2><?php echo $second_heading; ?></h2>
    <p><?php echo $second_text; ?></p>
    <div class="contentWrap">
      <div class="imgWrap">
        <?php if( !empty( $second_image ) ): ?>
        <img loading=“lazy” height="335px" width="616px" src="<?php echo esc_url($second_image['url']); ?>"
          alt="<?php echo esc_attr($second_image['alt']); ?>" />
        <?php endif; ?>
      </div>
      <div class="content">
        <?php echo $second_list; ?>
        <a rel="noopener" class='arrow arrow-left' target="<?php echo $scnd_target; ?>"
          href="<?php echo $scnd_url; ?>"><?php echo $scnd_title; ?></a>
      </div>
    </div>

  </div>
</section>


<!-- 3  journey -->
<section class="journey">
  <div class="container">

    <h2><?php echo $third_heading; ?></h2>
    <p><?php echo $third_text; ?></p>
    <div class="contentWrap">
      <div class="tabs">
        <span data-index="1" class="active"><?php echo $third_tab1; ?></span>
        <span data-index="2"><?php echo $third_tab2; ?></span>
      </div>
      <div class="tabsContent">
        <?php 
          //Logos1
        if( $third_1imgs ) {
        echo '<ul data-index="1" class="logos active">';
        foreach( $third_1imgs as $img ) {
        echo '<li ><img loading=“lazy” src="'. $img['img']["url"] .'" alt="'. $img['img']["name"] .'"></li>';
        }
        echo '</ul>';
        }

        //Logos2
        if( $third_2imgs ) {
          echo '<ul data-index="1" class="logos">';
          foreach( $third_2imgs as $img ) {
          echo '<li ><img loading=“lazy” src="'. $img['img']["url"] .'" alt="'. $img['img']["name"] .'"></li>';
          }
          echo '</ul>';
          }
          ?>

      </div>
    </div>

  </div>
</section>

<!--4 solution -->
<section class="solution">
  <div class="container">
    <div class="row">

      <h2><?php echo $four_heading; ?></h2>
      <div class="contentWrap">
        <?php 
        if( $fourth_content ) {
        echo '<ul  class="icons">';
        foreach( $fourth_content as $img ) {
          echo '<li>
          <img loading=“lazy” width="93px"  height="93px" src="'. $img["icon"]["url"] .'" alt="'. $img["icon"]["name"] .'">
          <span class="number">'.$img["number"].'</span>
          <span class="content">'.$img["text"].'</span>
          </li>';
          }
        echo '</ul>';
        }
        ?>
      </div>

    </div>
  </div>
</section>

<!-- 5 features -->
<section class="features full-bar bg-purple ">
  <div class="container">

    <h2><?php echo $five_heading; ?></h2>
    <div class="text"><?php echo $fifth_text; ?></div>
    <div class="contentWrap">
      <?php 
        if( $five_content ) {
        echo '<ul  class="feature_sec">';
        foreach( $five_content as $key=>$val ) {
          $key = $key+1;
          echo '<li>
          <div class="hexagon">'.$key.'</div>
          <span class="title">'.$val["title"].'</span>
          <span class="sub-title">'.$val["text"].'</span>
          <span class="content">'.$val["list"].'</span>
          </li>';
          }
        echo '</ul>';
        }
        ?>
      <a class="arrow " href="<?php echo $link_five_url; ?>">
        <span><?php echo $link_five_title; ?></span></a>
    </div>


  </div>
</section>

<!-- 6 futureProof -->
<section class="futureProof bg-lines">
  <div class="container">

    <div class="col col-6 ">
      <div class="wrap">
        <h2><?php echo $sixth_heading; ?></h2>
        <?php echo $sixth_col1; ?>
      </div>
    </div>
    <div class="col col-6 box-white">
      <div class="wrap">
        <?php echo $sixth_col2; ?>
      </div>
    </div>

  </div>
</section>


<!-- 7 quote from Client  -->
<?php get_template_part( '/inc/parts/quote-client' ); ?>

<!--  8 customers logos -->
<?php get_template_part( '/inc/parts/slider_logos' ); ?>
<!--  /.  2 Logos  -->




<?php get_footer(); ?>
