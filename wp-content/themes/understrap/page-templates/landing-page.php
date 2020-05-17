<?php
/**
 * Template Name: Full Width Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
$src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large' );
$featured_img = $src[0];
?>
<div class="wrapper home" id="full-width-page-wrapper">

	<main class="site-main" id="main" role="main">

		<!-- hero -->
		<div class="hero" id="homePageHero">
			<div class="hero-bg" id="homePageHeroBg">
				<img class="d-block d-sm-none" src="<?php the_field('hero_image_mobile') ?>" alt="hero image">
				<img class="d-none d-sm-block" src="<?php the_field('hero_image') ?>" alt="hero image">
			</div>
			<div class="container h-100">
				<div class="row h-100 justify-content-sm-center justify-content-md-start">
					<div class="col-12 col-sm-10 col-lg-9 col-xl-7 d-flex flex-column">
						<div class="hero-content">
							<h1 class="title text-white pr-xl-5 mb-lg-5">
								<?php the_title(); ?>
							</h1>
							<div class="description text-white">
								<?php the_field('hero_sub_title'); ?>
							</div>
							<?php get_template_part( 'global-templates/btn-cta' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- hero ends -->

		<!-- Section2 -->
		<div class="section2" style="background-image: url('<?php echo do_shortcode( '[media-url id="2020/04/Group-423@2x-265x300-1.png"]' ) ?>')">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-4 col-xl-6">
						<div id="home-about-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="<?php the_field('about_sandman_image_slides_duration'); ?>">

							<!-- The slideshow -->
							<div class="carousel-inner">

								<?php 
									$posts = get_field('about_sandman_image_slides');
									$index = 0;
									if( $posts ):
										foreach( $posts as $post) {
											setup_postdata($post);
											?>
												<div class="carousel-item <?php echo $index == 0 ? 'active' : '' ?>">
													<?php the_content(); ?>
												</div>
											<?php
											$index++;
										}
										wp_reset_postdata();
									endif;
								?>
							</div>

						</div>
					</div>
					<div class="col-lg-6 wow fadeIn text-center text-md-left" data-wow-delay=".5s">
						<h2 class="text-primary mb-3"><?php the_field('about_sandman_title'); ?></h2>
						<?php the_field('about_sandman_description') ?>
						<div class="mt-4">
							<a
								href="<?php the_permalink( get_page_by_path( 'product-sandman' ) ); ?>"
								target="_blank"
								class="text-uppercase text-secondary"
							>
								<?php the_field('about_sandman_btn_text') ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Section2 ends -->

		<!-- Section 3 -->
		<div class="section3" style="background-image: url('<?php echo do_shortcode( '[media-url id="2020/05/Section-3-BG.png"]' ) ?>')">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="wrapper">
							<div class="row">
								<div class="col-lg-10 offset-lg-1 text-center">
									<p>
										<?php the_field('more_about_sandman'); ?>
									</p>
									<a href="<?php the_permalink( get_page_by_path( 'about-us' ) ); ?>" class="text-uppercase text-secondary">
										<?php the_field('more_about_sandman_btn_text') ?>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Section 3 ends -->

		<!-- Section 4 -->
		<div class="section4 bg-primary">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="text-center text-white mb-4">
							<?php the_field('case_study_title') ?>
						</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div id="case-study-carousel" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<?php

									$posts = get_field('case_study_slides');
									$index = 0;
									if( $posts ):
										foreach( $posts as $post) {
											setup_postdata($post);
											?>
												<li
													data-target="#case-study-carousel"
													data-slide-to="<?php echo $index ?>"
													class="<?php echo $index == 0 ? 'active': '' ?>"
												>
												</li>
											<?php
											$index++;
										}
										wp_reset_postdata();
									endif;
									?>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">

								<?php
									$index = 0;
									
									if( $posts ):
										foreach( $posts as $post) {
											$thumb_id = get_post_thumbnail_id();
											$thumb_url_array = wp_get_attachment_image_src($thumb_id, '1000', true);
											$thumb_url = $thumb_url_array[0];
										?>
											<div class="carousel-item <?php echo $index == 0 ? 'active' : '' ?>">
												<div class="row">
													<div class="col-sm-6">
														<img class="img-fluid" src="<?php echo $thumb_url ?>" alt="">
													</div>
													<div class="col-sm-6">
														<div class="content h-100 d-flex flex-column">
															<h3 class="h5 mb-3"><?php the_title() ?></h3>
															<p><?php the_excerpt() ?></p>
															<a class="mt-auto text-uppercase" href="#">Read full case study</a>
														</div>
													</div>
												</div>
											</div>
										<?php
										 $index++;
									 	}
										wp_reset_postdata(); 
									endif;
								?>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#case-study-carousel" data-slide="prev">
								<span class="carousel-control-prev-icon fa fa-chevron-left"></span>
							</a>
							<a class="carousel-control-next" href="#case-study-carousel" data-slide="next">
								<span class="carousel-control-next-icon fa fa-chevron-right"></span>
							</a>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Section 4 -->

		<!-- Section 5 -->
		<div class="section5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="text-primary h3 text-center mb-5"><?php the_field('clients_title'); ?></h2>
						<?php get_template_part( 'global-templates/company-cards' ); ?>
					</div>
				</div>
			</div>
		</div>
		<!-- Section 5 ends -->
		
		<!-- Section 6 -->
		<div class="section6">
			<div class="container">

				<!-- youtube insights -->
				<?php get_template_part( 'global-templates/youtube-insights' ); ?>
				<!-- youtube insights ends -->

				<!-- divider -->
				<div class="row">
					<div class="col-12 mt-2 mb-2">
						<?php get_template_part( 'global-templates/section-divider' ); ?>
					</div>
				</div>
				<!-- divider ends -->

				<!-- featured insights -->
				<?php get_template_part( 'global-templates/featured-insights' ); ?>
				<!-- featured insights ends -->

				<!-- divider -->
				<div class="row">
					<div class="col-12 mt-2 mb-2">
						<?php get_template_part( 'global-templates/section-divider' ); ?>
					</div>
				</div>
				<!-- divider ends -->
			</div>
		</div>
		<!-- Section 6 ends -->
		
		<!-- Section 7 -->
		<div class="section7">
			<div class="container">

				<!-- title -->
				<div class="row">
					<div class="col-lg-12">
						<h2 class="text-primary h3 text-center mb-5"><?php the_field('feed_title'); ?></h2>
					</div>
				</div>
				<!-- title ends -->

				<div class="row justify-content-center">
					<div class="col-sm-8 col-md-5">
						<a class="twitter-timeline" data-height="400" data-theme="light" href="https://twitter.com/<?php the_field('twitter_handle'); ?>">Tweets by Sandman</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
				</div>
			</div>
		</div>
		<!-- Section 7 ends -->

		<?php get_template_part( 'global-templates/cta' ); ?>

	</main><!-- #main -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
