<?php
/*
* Creating a function to create our CPT
*/

function director_custom_post_types() {

	$supports = array( 'title', 'author', 'thumbnail', 'revisions', 'editor', 'excerpt', );

	// STAFF
		$labels_staff = array(
			'name'                => _x( 'Staff', 'Post Type General Name', 'UT' ),
			'singular_name'       => _x( 'Staff', 'Post Type Singular Name', 'UT' ),
			'menu_name'           => __( 'Staff/Board', 'UT' ),
			'parent_item_colon'   => __( 'Parent Staff', 'UT' ),
			'all_items'           => __( 'All Staff', 'UT' ),
			'view_item'           => __( 'View Staff', 'UT' ),
			'add_new_item'        => __( 'Add Staff', 'UT' ),
			'add_new'             => __( 'Add Staff', 'UT' ),
			'edit_item'           => __( 'Edit Staff', 'UT' ),
			'update_item'         => __( 'Update Staff', 'UT' ),
			'search_items'        => __( 'Search Staff', 'UT' ),
			'not_found'           => __( 'Not Found', 'UT' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'UT' ),
		);
		$args_staff = array(
			'labels'              => $labels_staff,
			'public'              => true,
			'has_archive'         => true,
			'menu_icon'           => 'dashicons-groups',
			'rewrite'             => array( 'slug' => 'staff', 'with_front' => false ),
			'query_var'           => true,
			'menu_position'       => 10,
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
			'supports'            => $supports,
		);
	register_post_type( 'staff', $args_staff );

	// IN-GRAIN
		$labels_ingrain = array(
			'name'                => _x( 'In-Grain', 'Post Type General Name', 'UT' ),
			'singular_name'       => _x( 'In-Grain', 'Post Type Singular Name', 'UT' ),
			'menu_name'           => __( 'In-Grain', 'UT' ),
			'parent_item_colon'   => __( 'Parent Issue', 'UT' ),
			'all_items'           => __( 'All Issues', 'UT' ),
			'view_item'           => __( 'View Issue', 'UT' ),
			'add_new_item'        => __( 'Add Issue', 'UT' ),
			'add_new'             => __( 'Add Issue', 'UT' ),
			'edit_item'           => __( 'Edit Issue', 'UT' ),
			'update_item'         => __( 'Update Issue', 'UT' ),
			'search_items'        => __( 'Search In-Grain Issues', 'UT' ),
			'not_found'           => __( 'Not Found', 'UT' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'UT' ),
		);
		$args_ingrain = array(
			'labels'              => $labels_ingrain,
			'public'              => true,
			'has_archive'         => true,
			'menu_icon'           => 'dashicons-book-alt',
			'query_var'           => true,
			'menu_position'       => 10,
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
			'supports'            => $supports,
		);
	register_post_type( 'ingrain', $args_ingrain );

	// VIDEO
	$labels_video = array(
		'name'                => _x( 'Videos', 'Post Type General Name', 'UT' ),
		'singular_name'       => _x( 'Video', 'Post Type Singular Name', 'UT' ),
		'menu_name'           => __( 'Videos', 'UT' ),
	);
	$args_video = array(
		'labels'              => $labels_video,
		'public'              => true,
		'has_archive'         => true,
		'menu_icon'           => 'dashicons-video-alt3',
		'rewrite'             => array( 'slug' => 'video', 'with_front' => false ),
		'query_var'           => true,
		'menu_position'       => 10,
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
		'supports'            => $supports,
	);
	register_post_type( 'video', $args_video );

	// CHAPTERS
	$labels_chapter = array(
		'name'                => _x( 'Chapters', 'Post Type General Name', 'UT' ),
		'singular_name'       => _x( 'Chapter', 'Post Type Singular Name', 'UT' ),
		'menu_name'           => __( 'Chapters', 'UT' ),
	);
	$args_chapter = array(
		'labels'              => $labels_chapter,
		'public'              => true,
		'has_archive'         => true,
		'menu_icon'           => 'dashicons-admin-site',
		'rewrite'             => array( 'slug' => 'chapter' ),
		'query_var'           => true,
		'menu_position'       => 10,
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
		'supports'            => $supports,
	);
	register_post_type( 'chapter', $args_chapter );

	// COURSES
	$labels_course = array(
		'name'                => _x( 'Courses', 'Post Type General Name', 'UT' ),
		'singular_name'       => _x( 'Course', 'Post Type Singular Name', 'UT' ),
		'menu_name'           => __( 'Courses', 'UT' ),
	);
	$args_course = array(
		'labels'              => $labels_course,
		'public'              => true,
		'has_archive'         => true,
		'menu_icon'           => 'dashicons-welcome-learn-more',
		'rewrite'             => array( 'slug' => 'course' ),
		'query_var'           => true,
		'menu_position'       => 10,
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
		'supports'            => $supports,
	);
	register_post_type( 'course', $args_course );

	// SPEAKERS
	$labels_course = array(
		'name'                => _x( 'Speakers', 'Post Type General Name', 'UT' ),
		'singular_name'       => _x( 'Speaker', 'Post Type Singular Name', 'UT' ),
		'menu_name'           => __( 'Speakers', 'UT' ),
	);
	$args_course = array(
		'labels'              => $labels_course,
		'public'              => true,
		'has_archive'         => true,
		'menu_icon'           => 'dashicons-businessperson',
		'rewrite'             => array( 'slug' => 'speaker' ),
		'query_var'           => true,
		'menu_position'       => 10,
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
		'supports'            => $supports,
	);
	register_post_type( 'speaker', $args_course );

}
add_action( 'init', 'director_custom_post_types', 0 );

// CHAPTER COLUMNS
function set_custom_edit_chapter_columns($columns) {
	unset( $columns['date'] );
	$columns['chapter_code'] = __( 'Chapter Code (Post Name/Slug)', 'your_text_domain' );
	$columns['location'] = __( 'Location (Post Excerpt)', 'your_text_domain' );

	return $columns;
}
add_filter( 'manage_chapter_posts_columns', 'set_custom_edit_chapter_columns' );

// CHAPTER COLUMNS DATA
function custom_chapter_column( $column, $post_id ) {
	switch ( $column ) {

		case 'chapter_code' :
			echo strtoupper( get_post_field( 'post_name', get_post() ) );
			break;
		case 'location' :
			the_excerpt();
			break;

	}
}
add_action( 'manage_chapter_posts_custom_column' , 'custom_chapter_column', 10, 2 );

// STAFF COLUMNS
function set_custom_edit_staff_columns($columns) {
	unset( $columns['date'] );
	unset( $columns['author'] );
	$columns['position'] = __( 'Staff Position', 'director' );

	return $columns;
}
add_filter( 'manage_staff_posts_columns', 'set_custom_edit_staff_columns' );

// STAFF COLUMNS DATA
function custom_staff_column( $column, $post_id ) {
	switch ( $column ) {

		case 'position' :
			echo get_post_meta( $post_id, 'staff_information_staff_position', true );
			break;

	}
}
add_action( 'manage_staff_posts_custom_column' , 'custom_staff_column', 10, 2 );

// TAXONOMIES
function director_custom_taxonomies() {

	$video_cat_labels = array(
		'name'          => _x( 'Video Categories', 'taxonomy general name' ),
		'singular_name' => _x( 'Video Category', 'taxonomy singular name' ),
		'add_new_item'  => __( 'Add New Category' ),
		'menu_name'     => __( 'Video Categories' ),
	);
	$video_cat_args = array(
		'hierarchical'   => true,
		'labels'         => $video_cat_labels,
		'rewrite'        => array( 'slug' => 'video_categories', 'with_front' => false,  'hierarchical' => true ),
		'show_in_rest'   => true,
	);
	register_taxonomy( 'video_category', 'video', $video_cat_args );

	$video_event_labels = array(
		'name'          => _x( 'Video Events', 'taxonomy general name' ),
		'singular_name' => _x( 'Video Event', 'taxonomy singular name' ),
		'add_new_item'  => __( 'Add New Event' ),
		'menu_name'     => __( 'Video Events' ),
	);
	$video_event_args = array(
		'hierarchical'   => true,
		'labels'         => $video_event_labels,
		'rewrite'        => array( 'slug' => 'video_events', 'with_front' => false,  'hierarchical' => true ),
		'show_in_rest'   => true,
	);
	register_taxonomy( 'video_event', 'video', $video_event_args );

	$course_cat_labels = array(
		'name'          => _x( 'Course Categories', 'taxonomy general name' ),
		'singular_name' => _x( 'Course Category', 'taxonomy singular name' ),
		'add_new_item'  => __( 'Add New Category' ),
		'menu_name'     => __( 'Course Categories' ),
	);
	$course_cat_args = array(
		'hierarchical'   => true,
		'labels'         => $course_cat_labels,
		'rewrite'        => array( 'slug' => 'course_category', 'with_front' => false,  'hierarchical' => true ),
		'show_in_rest'   => true,
	);
	register_taxonomy( 'course_category', 'course', $course_cat_args );

	$staff_type_labels = array(
		'name'          => _x( 'Staff Types', 'taxonomy general name' ),
		'singular_name' => _x( 'Staff Type', 'taxonomy singular name' ),
		'add_new_item'  => __( 'Add New Staff Type' ),
		'menu_name'     => __( 'Staff Types' ),
	);
	$staff_type_args = array(
		'hierarchical'   => true,
		'labels'         => $staff_type_labels,
		'rewrite'        => array( 'slug' => 'staff_type', 'with_front' => false,  'hierarchical' => true ),
		'show_in_rest'   => true,
	);
	register_taxonomy( 'staff_type', 'staff', $staff_type_args );

	$speaker_event_labels = array(
		'name'          => _x( 'Speaker Events', 'taxonomy general name' ),
		'singular_name' => _x( 'Speaker Event', 'taxonomy singular name' ),
		'add_new_item'  => __( 'Add New Event' ),
		'menu_name'     => __( 'Speaker Events' ),
	);
	$speaker_event_args = array(
		'hierarchical'   => true,
		'labels'         => $speaker_event_labels,
		'rewrite'        => array( 'slug' => 'speaker_events', 'with_front' => false,  'hierarchical' => true ),
		'show_in_rest'   => true,
	);
	register_taxonomy( 'speaker_event', 'speaker', $speaker_event_args );

}
  add_action( 'init', 'director_custom_taxonomies', 0 );
