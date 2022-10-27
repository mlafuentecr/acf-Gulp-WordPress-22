<?php
/*=============================================
BREADCRUMBS
=============================================*/

function the_breadcrumb() {

    global $post;

	// VARIABLES
	$show_on_homepage = false;
    $show_current_page = true;

	$home_label = 'Home';
    $home_url = get_bloginfo( 'url' );

    $delimiter = '<span class="mx-1"> \ </span>';

	$crumbs = array( array( $home_label, $home_url ) );

	// DO NOT CONTINUE IF NO CRUMBS ON HOMEPAGE
    if ( is_home() || is_front_page() ) {
        if ( ! $show_on_homepage ) {
            return;
        }
    }

	// MAIN BREADCRUMB CREATION
	if ( is_category() ) {
		$thisCat = get_category( get_query_var( 'cat' ), false );
		if ( $thisCat->parent != 0 ) {
			$crumbs[] = get_category_parents( $thisCat->parent, true, $delimiter );
		}
		$crumbs[] = single_cat_title( '', false );
	} elseif ( is_search() ) {
		$crumbs[] = 'Search Results';
	} elseif ( is_day() ) {
		$crumbs[] = array( get_the_time( 'Y' ), get_year_link( get_the_time( 'Y' ) ) );
		$crumbs[] = array( get_the_time( 'F' ), get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) );
		$crumbs[] = get_the_time('d');
	} elseif ( is_month() ) {
		$crumbs[] = array( get_the_time('Y'), get_year_link(get_the_time('Y')) );
		$crumbs[] = get_the_time('F');
	} elseif ( is_year() ) {
		$crumbs[] = get_the_time('Y');
	} elseif ( is_single() && ! is_attachment() ) {
		if ( get_post_type() == 'course' ) {
			$crumbs[] = array( 'Training &amp; Education', '/training-education/' );
			$crumbs[] = array( 'Online Learning', '/training-education/online-learning/' );
			$crumbs[] = array( 'Full Course Catalog', '/training-education/online-learning/full-course-catalog/' );
			$crumbs[] = get_the_title();
		} elseif ( get_post_type() == 'chapter' ) {
			$crumbs[] = array( 'Chapters', '/chapters/' );
			$crumbs[] = array( 'Find Your Chapter', '/chapters/find-your-chapter/' );
			$crumbs[] = get_the_title();
		} elseif ( get_post_type() == 'speaker' ) {
			$crumbs[] = get_the_title();
		} elseif ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object( get_post_type() );
			$slug = $post_type->rewrite;
			$crumbs[] = array( $post_type->labels->name, "{$home_url}/{$slug['slug']}/" );
			$crumbs[] = get_the_title();
		} else {
			$cat = get_the_category();
			$cat = $cat[0];
			$cats = get_category_parents( $cat, true, $delimiter );
			if ( ! $show_current_page) {
				$cats = preg_replace( "#^(.+)\s$delimiter\s$#", "$1", $cats );
			}
			$crumbs[] = $cats;
			$crumbs[] = get_the_title();
		}
	} elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() ) {
		$post_type = get_post_type_object( get_post_type() );
		$crumbs[] = $post_type->labels->name;
	} elseif ( is_attachment() ) {
		$parent = get_post( $post->post_parent );
		$cat = get_the_category( $parent->ID );
		$cat = $cat[0];
		$crumbs[] = get_category_parents( $cat, true, $delimiter );
		$crumbs[] = array( $parent->post_title, get_permalink( $parent ) );
		$crumbs[] = get_the_title();
	} elseif ( is_page() && ! $post->post_parent ) {
		$crumbs[] = get_the_title();
	} elseif ( is_page() && $post->post_parent ) {
		$parent_id  = $post->post_parent;
		$parents = array();
		while ( $parent_id ) {
			$page = get_page( $parent_id );
			$parents[] = array( get_the_title( $page->ID ), get_permalink( $page->ID ) );
			$parent_id  = $page->post_parent;
		}
		$parents[] = $crumbs[0];
		$crumbs = array_reverse( $parents );
		$crumbs[] = get_the_title();
	} elseif ( is_tag() ) {
		$tag = single_tag_title( '', false );
		$crumbs[] = "Posts tagged '{$tag}'";
	} elseif ( is_author() ) {
		global $author;
		$userdata = get_userdata( $author );
		$author = ( $userdata->display_name ) ?? 'this author';
		$crumbs[] = "Articles posted by  {$author}";
	} elseif ( is_404() ) {
		$crumbs[] = "Requested Page Not Found (404)";
	}


	// ECHO
	$output = array();
	$count = ( count( $crumbs ) ) - 1;
	foreach ( $crumbs as $key => $crumb ) {

		if ( is_array( $crumb ) ) { $crumb = "<a href='{$crumb[1]}'>{$crumb[0]}</a>"; }

		if ( $key < $count ) {
			$output[] = $crumb;
		} else {
			$output[] = "<span class='current'>{$crumb}</span>";
		}

	}
	$output = implode( $delimiter, $output );

	echo "<div id='crumbs' class='breadCrumb d-flex flex-wrap'>{$output}</div>";

}
