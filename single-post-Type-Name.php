<?php
/*---------------------------------------------------------*/
/*
/*---------------------------------------------------------*/
defined('ABSPATH') || exit;

/*-----------------------------------------------------------------------------------*/
/*  ACF advertisement
/*-----------------------------------------------------------------------------------*/
$director_news = get_field('director_news') ?? array();
$director_news_title = $director_news['director_news_title'] ?? 'director News';
$director_news_subtitle = $director_news['director_news_subtitle'] ?? 'News from director Headquarters';
$director_news_description = $director_news['director_news_description'] ?? '';
$director_news_link = $director_news['director_link']  ?? array();
$director_news_link_title = $director_news_link['title']  ?? 'Read All News';
$director_news_link_url = $director_news_link['url']  ?? '';
$director_news_link_target = $director_news_link['target']  ?? '';

$featured_posts =  get_field('director_news_post') ?? array();
$featured_posts_id = $featured_posts[0]->ID ?? '';

$latest_news = get_field('latest_news') ?? array();

/*-----------------------------------------------------------------------------------*/
/*  ACF fields
/*-----------------------------------------------------------------------------------*/
$session_description = get_the_content();
$title = get_field('title');

//HEADER
get_header();

//Set a custom breadcrumb
set_query_var('setBreadCrumbForVideo', true);
get_template_part("/inc/template-parts/content","header-small");

//Call buttons for mobile version
//send variables
set_query_var('button_2_title', 'In This Section');
set_query_var('content_2', 'inThisSection');
get_template_part("/inc/template-parts/content", "entry-buttons");

$speaker_count = get_post_meta(get_the_ID(), 'meet_the_speaker', true);
$speakers = get_field( 'meet_the_speaker' );
$speaker_label = ( is_array( $speakers ) && count( $speakers ) > 1 ) ? 'Speakers' : 'Speaker';
$mic_icon = file_get_contents( get_template_directory() . '/inc/images/icon-mic.svg' );
$speaker_names = wp_list_pluck( $speakers, 'speaker_full_name' );
$speaker_names = implode( ', ', $speaker_names );

$categories = get_the_terms( get_the_id(), 'video_category' );

?>

<section id="single" class="single single_detail  container mt-md-5 p position-relative">
	<div class="bg-white util__move-up util__move-up-2 px-md-4   px-lg-0  util__extraBorder  util__extraBorder__t-10">
		<!-- main-content -->
		<main class="main-content d-flex flex-column flex-lg-row mt-5 ">
			<!-- Feature News -->
			<div class="me-4 content  ">

				<?php director_categories( $categories ); ?>

				<h1 class="inThisSection_title mb-4"><?php echo the_title(); ?></h1>

				<!-- Content -->
				<div class="embed-container">
					<?php the_field('video_embed'); ?>
				</div>


				<?php
				if ( $speakers ) {
					echo "<div class='video-speakers mt-2'><span class='video-speakers-text'>";
					echo "{$mic_icon}<b><strong>{$speaker_label}:</strong></b> {$speaker_names}";
					echo "</span></div>";
				}

				if ( ! empty( $session_description ) ) { ?>
					<div class="video-session-description mt-4 mb-5">
						<h2 class="video-session-description-title font-weight-bold">
							Session Description
						</h2>
						<?php echo $session_description; ?>
					</div>
					<?php
				}

				if ( have_rows( 'meet_the_speaker' ) ) { ?>
					<div class="row">
						<h2 class="mb-5 font-weight-bold">Meet The <?php echo $speaker_label; ?></h2>
					</div>
					<?php while ( have_rows( 'meet_the_speaker' ) ) {
						the_row();
						$speaker_image = get_sub_field('speaker_photo');
						$speaker_full_name = get_sub_field('speaker_full_name');
						$roles = get_sub_field('roles');
						$company = get_sub_field('company');
						$bio = get_sub_field('bio'); ?>

						<div class="meet-the-speaker mt-3 mb-5 pb-3 border-bottom">
							<div class="row g-3">
								<!-- Image column -->
								<div class="col-sm-auto">
									<?php if ( ! empty( $speaker_image ) ) { ?>
										<img class="speaker-photo-image mb-1" src="<?php echo esc_url($speaker_image['url']); ?>" alt="<?php echo esc_attr($speaker_image['alt']); ?>" />
									<?php } ?>
								</div>
								<!-- Contact column -->
								<div class="col-lg col-xs-12 col-md-12">
									<p class="speaker-name text-blue font-weight-bold">
										<?php echo $speaker_full_name; ?>
									</p>
									<p class="speaker-roles m-0">
										<?php echo $roles; ?>
									</p>
									<p class="speaker-company font-weight-bold">
										<?php echo $company; ?>
									</p>
									<?php
									if (have_rows('contact_info')) {
										while (have_rows('contact_info')) {
											the_row();
											$email = get_sub_field('email'); ?>
											<div class="col d-block p-0 mt-1 mb-1 text-nowrap">
												<?php
												if (!empty($email)) { ?>
													<div class="col p-0">
														<span style='display:inline-block' class="icon-container p-0">
															<?php echo file_get_contents(get_template_directory() . '/inc/images/icon-email.svg'); ?>
														</span>
														<a style='display:inline-block' class="social-link util__underline_link ml-1" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
													</div>
													<?php
												}
												if (have_rows('social_links')) {
													while (have_rows('social_links')) {
														the_row();
														$social = get_sub_field('social');
														$link = get_sub_field('link');
														if ( $link && $social ) { ?>
														<div class="col p-0">
															<div class="icon-container" style="display:inline-block" title="<?php echo $social; ?>">
																<?php echo file_get_contents(get_template_directory() . '/inc/images/icon-' . strtolower( $social ) . '.svg'); ?>
															</div>
															<?php
															if ($link && isset($link['url']) && isset($link['title'])) {
																$link_url = esc_url($link['url']);
																$link_title = esc_html($link['title']);
																$link_target = esc_attr($link['target']) ? $link['target'] : '_self';
																echo "<a style='display:inline-block' class='social-link util__underline_link ml-1' href='{$link_url}' target='{$link_target}' title='{$social}'>{$link_title}</a>";
															}
															?>
														</div>
														<?php
														}
													}
												}
												?>
											</div>
									<?php
										}
									}
									?>
								</div>
								<!-- Bio column -->
								<div class="col-xl col-lg-12 col-md-12 pl-2">
									<?php echo $bio; ?>
								</div>
							</div>
						</div>
					<?php
					}
				}

				if (have_rows('documents')) { ?>
					<div class="documents-section mt-5 mb-5">
						<h2 class="mb-0 font-weight-bold">Documents</h2>
						<p class="mb-3">Here are a few related files you can download:</p>
						<?php while (have_rows('documents')) {
							the_row();
							$doc = get_sub_field('doc'); ?>
							<?php if ($doc) { ?>
								<div class="row d-flex">
									<span class="mt-1 mb-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
											<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
											<path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
										</svg>
										<a target="_blank" class="document-link ml-1" href="<?php echo $doc['url']; ?>"><?php echo $doc['title']; ?></a>
										<span>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				<?php
				} ?>

				<?php $title = get_field('title'); ?>
				<?php if (!empty($title)) : ?>
					<div class="safety-tracks-section mt-5 mb-5">
						<?php $related_links = get_field('related_links');
						if ( $related_links ): ?>
							<h2 class="mb-3 font-weight-bold"><?php echo $title; ?></h2>
							<ul>
							<?php foreach( $related_links as $related_link ):
								$permalink = get_permalink( $related_link->ID );
								$title = get_the_title( $related_link->ID );
								?>
								<li>
									<a class="related-document-link document-link" target="_blank" href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
								</li>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>

			<!-- SIDEBAR > -->
			<?php
				set_query_var( 'position_1', 'inThisSection' );
				set_query_var( 'position_2', 'form' );
				set_query_var( 'position_3', 'ad-sidebar' );
				set_query_var( 'position_4', 'resources' );
				get_template_part( "/inc/template-parts/sidebar", "general" );
			?>

		</main>
	</div>
</section>

<?php
get_footer();
