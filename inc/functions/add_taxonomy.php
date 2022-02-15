<?php 
//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires


function taxonomi_business() {
  //put where did I used it
  register_taxonomy( 'type_of_business', 'business', array(
      'label'        => __( 'type of business', 'textdomain' ),
      'rewrite'      => array( 'slug' => 'type_of_business' ),
      'hierarchical' => true,
  ) );

}
add_action( 'init', 'taxonomi_business', 0 );
