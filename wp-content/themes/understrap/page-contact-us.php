<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$args = array(
	'post_type' => 'locations',
);
$locationsQuery = new WP_Query( $args );
get_header();
?>
<div class="wrapper contact-page" id="full-width-page-wrapper">

	<main class="site-main" id="main" role="main">
    
    <!-- Hero -->
    <div class="hero">
      <div class="hero-bg" id="contactPageHeroBg"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 text-white">
            <div id="contactPageHero">
              <h1 class="text-white mb-4"><?php the_title(); ?></h1>
              <div class="h5 font-weight-normal text-white mb-4 mb-md-0">
                <?php
                  while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?> 
                  <?php
                  endwhile;
                  wp_reset_query();
                ?>
              </div>
            </div>
          </div>
          <div class="col-lg-7 offset-lg-1">
            <div class="form-wrapper">
              <?php echo do_shortcode( '[contact-form-7 id="258" title="Contact Us"]' ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Hero ends -->

    <!-- Section 2 -->
    <div class="section2">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <h3 class="text-primary mb-4">Trusted By</h3>
            <?php get_template_part( 'global-templates/company-cards' ); ?>
          </div>
          <div class="col-9 col-md-3 offset-lg-1">
            <h3 class="text-primary mb-4 mt-4 mt-md-0">Follow Us</h3>
            <?php get_template_part( 'global-templates/follow' ); ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Section 2 ends -->

    <!-- Locations -->
    <div class="locations py-5">
      <div class="container">
        <div class="row">
          <?php
            while ( $locationsQuery->have_posts() ) : $locationsQuery->the_post();
              ?>
                <div class="col-lg-6">
                  <h4 class="text-color font-weight-normal"><?php the_title(); ?></h4>
                  <div class="row">
                    <div class="col-12">
                      <div class="location-box mb-4 mb-md-0">
                        <div class="row no-gutters">
                          <div class="col-12 col-md-6">
                            <iframe src="<?php the_field('location_embed_link') ?>" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                          </div>
                          <div class="col-12 col-md-6 p-3 p-md-4">
                            <?php the_content(); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
            wp_reset_query();
            endwhile;
          ?>
        </div>
      </div>
    </div>
    <!-- Locations ends -->

	</main><!-- #main -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
