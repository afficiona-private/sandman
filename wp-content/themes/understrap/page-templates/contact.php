<?php
/**
 * Template Name: Contact Page Layout
 *
 * @package understrap
 */

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
      <div class="container">
        <div class="row">
          <div class="col-lg-5 text-white">
            <h1 class="text-white"><?php the_title(); ?></h1>
            <?php
              while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?> 
              <?php
              endwhile;
              wp_reset_query();
            ?>
          </div>
          <div class="col-lg-7">
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
          <div class="col-lg-3 offset-lg-1">
            <h3 class="text-primary mb-4">Follow Us</h3>
            <?php get_template_part( 'global-templates/follow' ); ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Section 2 ends -->

    <!-- Locations -->
    <div class="locations">
      <div class="container">
        <div class="row">
          <?php
            while ( $locationsQuery->have_posts() ) : $locationsQuery->the_post();
              ?>
                <div class="col-lg-6">
                  <h4 class="text-primary"><?php the_title(); ?></h4>
                  <div class="location-box">
                    <div class="map">
                      <iframe src="<?php the_field('location_embed_link') ?>" width="300" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="content">
                      <?php the_content(); ?>
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
