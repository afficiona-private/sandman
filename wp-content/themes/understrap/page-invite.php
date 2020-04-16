<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<div class="wrapper invite-page" id="full-width-page-wrapper">

	<main class="site-main" id="main" role="main">
    
    <div class="container">
      <div class="row">
        <div class="col-12">
          <article class="contained-page-article py-4">
						<div class="row justify-content-center">
							<div class="col-12 col-md-10">
								<header class="entry-header">
									<h2 class="text-primary text-center font-weight-normal"><?php the_title(); ?></h2>
								</header>

								<div class="row justify-content-center">
									<div class="col-12 col-md-10 col-xl-8">
										<div class="form-wrapper invite">
											<?php echo do_shortcode( '[contact-form-7 id="318" title="Invite Request"]' ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
          </article>
        </div>
      </div>
    </div>

	</main><!-- #main -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
