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
		<div class="hero">
			<div class="container h-100">
					<div class="row h-100">
						<div class="col-lg-7 col-12 d-flex flex-column">
							<h1 class="title text-white pr-sm-5">
								Optimise your Foundry by moving from <br> ART to ANALYTICS
							</h1>
							<div class="row">
								<div class="col-lg-10">
									<h2 class="description text-white">
										Reducing Rejections and Optimising Additive Consumption by Data Analytics, Machine Learning and IOT – The Next Dimension in Foundry 4.0
									</h2>
								</div>
							</div>
							<?php get_template_part( 'global-templates/btn-cta' ); ?>
						</div>
					</div>
			</div>
		</div>
		<!-- hero ends -->

		<!-- Section2 -->
		<div class="section2">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 offset-lg-1">
						<img class="img-fluid" src="http://localhost:8888/wordpress/wp-content/uploads/2020/04/Browser-Screenshots@2x.png" alt="">
					</div>
					<div class="col-lg-6">
						<h2 class="text-primary mb-3">The world’s first Data Analytics software for Foundries</h2>
						<p>
							SANDMAN ™ is a cloud-based Predictive and Prescriptive Data Analytics driven decision support system which employs powerful mathematical modelling and algorithms for optimisation of a foundry's green sand system. It's powerful data correlation capabilities and unique SANDMIX algorithm helps foundries achieve a dose-by-need additive prediction based on its consumption, sand properties and casting data over long period of time and continuous data sets thereby optimizing additive consumption reducing rejections and associated costs. This SaaS delivered software is backed by a team of experienced foundry experts, data scientists, and developers.
						</p>
						<a
							href="https://github.com/nuxt/nuxt.js"
							target="_blank"
							class="text-uppercase text-secondary"
						>
							Explore our product
					</a>
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
										The genesis of Sandman™ lay in the providing of Value-added solutions for Green Sand Moulding Foundries, which Mr. Deepak Chowdhary introduced in the early 1990s. Inviting laboratory samples of green sand and additives, he was able to predict the possible casting defects, causes and their possible solutions based on some fundamental parameters of the sand sample. The predictions, based on his growing experience with several hundred foundries that his company supplied additives to, proved to be quite accurate and thus commanded consistent interest and demand from customers and became a significant value proposition. To make this expertise in predicting sand related casting defects led to conceptualisation of Sandman™.
									</p>
									<a href="" class="text-uppercase text-secondary">
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
						<h2 class="text-primary h3 text-center mb-4">Our Clients</h2>
						<?php get_template_part( 'global-templates/company-cards' ); ?>
					</div>
				</div>
			</div>
		</div>
		<!-- Section 5 ends -->
		
		<!-- Section 6 -->
		<div class="section6">
			<div class="container">
				<!-- title -->
				<div class="row">
					<div class="col-lg-12">
						<h2 class="text-primary h3 text-center mb-5">Here are few insights for you</h2>
					</div>
				</div>
				<!-- title ends -->

				<!-- youtube insights -->
				<div class="row">
					<div class="col-lg-5 offset-lg-1">
						<img class="w-100" src="http://localhost:8888/wordpress/wp-content/uploads/2020/04/Image-5@2x.png" alt="" />
						<div class="p-3">
							<p>Sandman: Foundry Data to Information & Insights.</p>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="media-item">
							<div class="row">
								<div class="col-lg-4">
									<img class="img-fluid" src="http://localhost:8888/wordpress/wp-content/uploads/2020/04/Image-5@2x.png" alt="" />
								</div>
								<div class="col-lg-8 d-flex align-items-center">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>
							</div>
						</div>
						<div class="media-item">
							<div class="row">
								<div class="col-lg-4">
									<img class="img-fluid" src="http://localhost:8888/wordpress/wp-content/uploads/2020/04/Image-5@2x.png" alt="" />
								</div>
								<div class="col-lg-8 d-flex align-items-center">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>
							</div>
						</div>
						<div class="media-item">
							<div class="row">
								<div class="col-lg-4">
									<img class="img-fluid" src="http://localhost:8888/wordpress/wp-content/uploads/2020/04/Image-5@2x.png" alt="" />
								</div>
								<div class="col-lg-8 d-flex align-items-center">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>
							</div>
						</div>

						<a class="text-dark text-sm-right d-block mt-4 text-uppercase" href="">Visit our YouTube channel for more</a>
					</div>
				</div>
				<!-- youtube insights ends -->

				<!-- divider -->
				<div class="row">
					<div class="col-12 mt-2 mb-2">
						<?php get_template_part( 'global-templates/section-divider' ); ?>
					</div>
				</div>
				<!-- divider ends -->

				<!-- Articles -->
				<div class="row">
					<?php
						$query = new WP_Query( 'cat=insights&posts_per_page=4' );
								
						while ( $query->have_posts() ) : $query->the_post();
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, '1000', true);
						$thumb_url = $thumb_url_array[0];
							?>
								<div class="col-lg-3 mb-4 mb-sm-0">
									<div class="article-item p-4">
										<h3 class="h5 mb-4"><?php the_title() ?></h3>
										<?php the_excerpt() ?>
									</div>
								</div>
							<?php
							$index++;
						endwhile;

						wp_reset_postdata(); 
					?>
				</div>
				<!-- Articles ends -->

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
						<h2 class="text-primary h3 text-center mb-5">#Sandman</h2>
					</div>
				</div>
				<!-- title ends -->

				<div class="row">
					<div class="col-lg-5 offset-lg-1">
						<a class="twitter-timeline" data-height="400" data-theme="light" href="https://twitter.com/michaeljohns?ref_src=twsrc%5Etfw">Tweets by michaeljohns</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
					<div class="col-lg-5">
						<a class="twitter-timeline" data-height="400" data-theme="light" href="https://twitter.com/michaeljohns?ref_src=twsrc%5Etfw">Tweets by michaeljohns</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
				</div>
			</div>
		</div>
		<!-- Section 7 ends -->

		<?php get_template_part( 'global-templates/cta' ); ?>

	</main><!-- #main -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
