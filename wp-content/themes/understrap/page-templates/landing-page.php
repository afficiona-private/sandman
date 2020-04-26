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
?>
<div class="wrapper home" id="full-width-page-wrapper">

	<main class="site-main" id="main" role="main">

		<!-- hero -->
		<div class="hero" id="homePageHero">
			<img class="hero-bg" id="homePageHeroBg" src="http://localhost:8888/wordpress/wp-content/uploads/2020/04/Homepage-hero.png" alt="">
			<div class="container h-100">
				<div class="row h-100">
					<div class="col-lg-7 col-xl-6 col-12 d-flex flex-column">
						<div class="hero-content">
							<h1 class="title text-white pr-xl-5 mb-lg-5">
								Optimise your Foundry by moving from <br> ART to ANALYTICS
							</h1>
							<h2 class="description text-white">
								Reducing Rejections and Optimising Additive Consumption by Data Analytics, Machine Learning and IOT – The Next Dimension in Foundry 4.0
							</h2>
							<?php get_template_part( 'global-templates/btn-cta' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- hero ends -->

		<!-- Section2 -->
		<div class="section2">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 offset-lg-1 wow fadeIn" data-wow-delay=".5s">
						<img class="img-fluid" src="<?php the_field('about_sandman_featured_image') ?>">
					</div>
					<div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
						<h2 class="text-primary mb-3"><?php the_field('about_sandman_title'); ?></h2>
						<?php the_field('about_sandman_description') ?>
						<div class="mt-4">
							<a
								href="<?php the_permalink( get_page_by_path( 'product-sandman' ) ); ?>"
								target="_blank"
								class="text-uppercase text-secondary"
							>
								Explore our product
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Section2 ends -->

		<!-- Section 3 -->
		<div class="section3">
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
										Know more about us
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
						<h2 class="text-center text-white mb-4">Find out how Sandman is helping businesses</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div id="case-study-carousel" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<?php

									$args = array (
										'post_type' => 'post',
										'post_category' => 'case-study',
										'post_status' => 'publish',
										'orderby' => 'date', 
										'order' => 'ASC',
									);

									$loop = new WP_Query( $args ); 
									$index = 0;
											
									while ( $loop->have_posts() ) : $loop->the_post();
										?>
											<li
												data-target="#case-study-carousel"
												data-slide-to="<?php echo $index ?>"
												class="<?php echo $index == 0 ? 'active': '' ?>"
											>
											</li>
										<?php
										$index++;
										wp_reset_postdata(); 
									endwhile;
									?>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">

								<?php
									$index = 0;
											
									while ( $loop->have_posts() ) : $loop->the_post();
									$thumb_id = get_post_thumbnail_id();
									$thumb_url_array = wp_get_attachment_image_src($thumb_id, '1000', true);
									$thumb_url = $thumb_url_array[0];
										?>
											<div class="carousel-item <?php echo $index == 0 ? 'active' : '' ?>">
												<div class="row">
													<div class="col-lg-6">
														<img class="img-fluid" src="<?php echo $thumb_url ?>" alt="">
													</div>
													<div class="col-lg-6">
														<div class="content">
															<h3 class="h5 mb-3"><?php the_title() ?></h3>
															<p><?php the_excerpt() ?></p>
														</div>
													</div>
												</div>
											</div>
										<?php
										$index++;
									endwhile;

									wp_reset_postdata(); 
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
						<h2 class="text-primary h3 text-center mb-4"><?php the_field('clients_title'); ?></h2>
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
					<div class="col-md-5">
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
