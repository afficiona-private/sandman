<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// WP_Query arguments
$faqsQuery = get_posts( array(
	'post_type' => 'faqs',
	'posts_per_page' => -1
));

get_header();
?>

<div class="wrapper faqs-page general-page" id="full-width-page-wrapper">

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

								<div class="faqs-wrapper mt-4">
									<?php
										foreach( $faqsQuery as $post ) {
											setup_postdata($post);
											?>
												<div class="each">
													<h4 class="each-title pr-4 pr-sm-5 collapsed" data-toggle="collapse" href="#faq-<?php the_id(); ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
														<?php the_title(); ?>
													</h4>
													<div class="collapse" id="faq-<?php the_id(); ?>">
														<?php the_content(); ?>
													</div>
												</div>
											<?php
											wp_reset_postdata(); 
										}
									?>
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
