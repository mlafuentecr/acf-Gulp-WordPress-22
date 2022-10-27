<?php

defined('ABSPATH') || exit;

/*-----------------------------------------------------------------------------------*/
/*  ACF advertisement
/*-----------------------------------------------------------------------------------*/
/*
$director_news = get_field('director_news') ?? array();
$director_news_title = get_the_title() ?? 'director News';
$director_news_subtitle = $director_news['director_news_subtitle'] ?? 'News from director Headquarters';
$director_news_description = $director_news['director_news_description'] ?? '';
$director_news_link = $director_news['director_link']  ?? array();
$director_news_link_title = $director_news_link['title']  ?? 'Read All News';
$director_news_link_url = $director_news_link['url']  ?? '';
$director_news_link_target = $director_news_link['target']  ?? '';

$featured_posts =  get_field('director_news_post') ?? array();
$featured_posts_id = $featured_posts[0]->ID ?? '';

$latest_news = get_field('latest_news') ?? array();
*/

//HEADER
get_header();

?>


		<!-- main-content -->
		<main id="single"  class="main-content container mt-5">

		</main>


<?php
get_footer();
