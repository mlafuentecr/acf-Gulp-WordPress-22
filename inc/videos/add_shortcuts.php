<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
//execute shorctuts 
//echo do_shortcode("[name_of_your_shortcode]");



/*------------------------------------------*/
// SOCIAL  echo do_shortcode( '[social_icons]' ); 
/*------------------------------------------*/

 function social_func( $atts ){
  $facebook   = get_field('facebook', 'option');
  $twitter    = get_field('twitter', 'option');
  $youtube    = get_field('youtube', 'option');
  $instagram  = get_field('instagram', 'option');
  
  if( $facebook || $twitter || $youtube || $instagram ): 
    echo ' <div class="social">';
         if( $facebook )   { echo '<a href="'. $facebook["url"]   .'" class="icon facebook"></a>'; } 
         if( $twitter )   { echo '<a href="'. $twitter["url"]   .'" class="icon twitter"></a>'; } 
         if( $youtube )   { echo '<a href="'. $youtube["url"]   .'" class="icon youtube"></a>'; } 
         if( $instagram )   { echo '<a href="'. $instagram["url"]   .'" class="icon instagram"></a>'; } 
    echo ' </div>';
      endif; 
}
//add_shortcode( 'social_icons', 'social_func' );





/*------------------------------------------*/
// FAQS
/*------------------------------------------*/

function faq_func( $atts ){
  $faqs   = get_field('facebook', 'option');

  
  if( $faqs  ): 
    $div .= '<div class="accordion" id="accordionPanelsFaqs">

    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse"
          data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
          Accordion Item #1
        </button>
      </h2>
      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
        aria-labelledby="panelsStayOpen-headingOne">
        <div class="accordion-body">
         sasasasasas
        </div>
      </div>
    </div>
  </div>' ;
      endif; 
}
//add_shortcode( 'faqs', 'faq_func' );




?>
