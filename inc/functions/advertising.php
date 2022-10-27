<?php

function director_ad_group_args( $group = false ) {

	if ( ! $group ) { return false; }

	if ( ! is_numeric( $group ) ) {
		$ad_group = get_term_by( 'slug', $group, 'ad-group' );

		if ( ! $ad_group || is_wp_error( $ad_group ) || ! isset( $ad_group->term_id ) ) { return false; }

		$group = $ad_group->term_id;

	}

	$default_args = array(
		'align'       => 'alignnone',
		'num_ads'     => 1,
		'num_columns' => 1,
		'return'      => false,
	);

	$args = array_merge( $default_args, array( 'group_ids' => array( $group ) ) );

	return $args;

}

function director_ad_disclaimer() {

	$info = array(
		'Advertising Disclaimer' => '/news-publications/advertising-opportunities/advertising-disclaimer/',
		'Advertising With Us'    => '/news-publications/advertising-opportunities/',
	);

	$links = '';

	foreach ( $info as $label => $url ) {
		$links .= "<a href='{$url}' class='text-gray-dark'>{$label}</a>";
	}

	$links = str_replace( '/a><a', '/a><span>|</span><a', $links );

	echo "<div class='advertisement-links text-center d-flex flex-wrap mt-2 ml-2' data-func='ad-disclaimer'><div>{$links}</div></div>";

}
