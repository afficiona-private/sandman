<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// WP_Query arguments
$args = array(
	'post_type' => 'jobs',
	'posts_per_page' => -1
);

$jobsQuery = new WP_Query( $args );

get_header();
?>

<div class="wrapper careers-page general-page" id="full-width-page-wrapper">

	<main class="site-main" id="main" role="main">
    
    <div class="container">
      <div class="row">
        <div class="col-12">
          <article class="contained-page-article py-4">
						<div class="row justify-content-center">
							<div class="col-12 col-md-10">
								<header class="entry-header">
									<h2 class="title text-center font-weight-normal"><?php the_title(); ?></h2>
								</header>

								<!-- FAQs -->

								<div class="jobs-wrapper mt-4">

									<div class="row justify-content-center">
										<div class="col-12">
											<?php
												while ( $jobsQuery->have_posts() ) : $jobsQuery->the_post();
												?>
													<div class="each">
														<h4 class="each-title pr-4 pr-sm-5">
															<?php the_title(); ?>
														</h4>
														<div class="each-content">
															<?php the_content(); ?>
														</div>
														<button class="btn btn-secondary btn-sm px-4" data-toggle="modal" data-target="#jobApplyModal">
															Apply
														</button>
													</div>
												<?php
												wp_reset_postdata(); 
												endwhile;
											?>
										</div>
									</div>
									
								</div>
								

								<!-- FAQs ends -->
								

							</div>
						</div>
          </article>
        </div>
      </div>
    </div>

	</main><!-- #main -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
