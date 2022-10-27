<?php
//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires


function taxonomi_staff()
{
  $labels = array(
    'name'              => _x('Staff Type', 'taxonomy general name', 'UT'),
    'singular_name'     => _x('Staff', 'taxonomy singular name', 'UT'),
    'search_items'      => __('Search Staff type', 'UT'),
    'all_items'         => __('All Staff types', 'UT'),
    'parent_item'       => __('Parent Staff', 'UT'),
    'parent_item_colon' => __('Parent Staff:', 'UT'),
    'edit_item'         => __('Edit Staff Type', 'UT'),
    'update_item'       => __('Update Staff Type', 'UT'),
    'add_new_item'      => __('Add New Staff Type', 'UT'),
    'new_item_name'     => __('New Genre Staff', 'UT'),
    'menu_name'         => __('Staff Type', 'UT'),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'staff'),
  );

  register_taxonomy('staff_type', array('staff'), $args);
  // unset( $args );
  // unset( $labels );


}

// hook into the init action and call create_book_taxonomies when it fires
add_action('init', 'taxonomi_staff', 0);
