<?php
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() ) : ?>
  <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>


<div class="wrapper about-us" id="full-width-page-wrapper">

  <main class="site-main" id="main" role="main">
      <!-- Hero -->
    <div class="hero" id="aboutPageHero">
      <img class="hero-bg" id="aboutPageHeroBg" src="<?php the_field('hero_image'); ?>" alt="About Us Hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <h2 class="text-primary mb-4"><?php the_field('hero_title'); ?></h2>
            <?php the_field('hero_description'); ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Hero ends -->

    <!-- Section 2 -->
      <div class="section2">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="d-flex flex-column align-items-center">
                <img class="img-fluid" src="<?php the_field('second_section_image') ?>" alt="data right image">
                <h2 class="text-primary mt-4"><?php the_field('second_section_title'); ?></h2>
              </div>
            </div>
            <div class="col-lg-5">
              <?php the_field('second_section_description'); ?>
            </div>
          </div>
        </div>
      </div>
    <!-- Section 2 ends -->

    <!-- Section 3 -->
      <div class="section3" style="background-image: url('<?php the_field('third_section_image'); ?>')">
        <div class="container">
          <div class="wrapper text-center">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <h2 class="text-white"><?php the_field('third_section_title'); ?></h2>
                <div class="text-white">
                  <?php the_field('third_section_description'); ?>
                </div>
                <div class="row justify-content-center">
                  <div class="col-12 col-sm-4">
                    <a href="<?php the_permalink( get_page_by_path( 'product-sandman' ) ) ?>" class="btn btn-light btn-block mt-5 mt-sm-4" href="">
                      <span class="text-primary"><?php the_field('third_section_button_text'); ?></span>
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
      <div class="section4">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
              <?php the_field('fourth_section_description'); ?>
            </div>
          </div>
        </div>
      </div>
    <!-- Section 4 ends -->

    <!-- Section 5 -->
      <div class="section5">
        <img class="poster mb-4" src="<?php the_field('fifth_section_image') ?>" />
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offset-lg-6">
              <h2 class="text-primary mb-4 mt-0 mt-sm-5">
                <?php the_field('fifth_section_title'); ?>
              </h2>
              <?php the_field('fifth_section_description'); ?>
            </div>
          </div>
        </div>
      </div>
    <!-- Section 5 ends -->

    <!-- Section 6 -->
    <div class="section6">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-primary h3 text-center mb-4 mb-sm-5">Our Clients</h2>
            <?php get_template_part( 'global-templates/company-cards' ); ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Section 6 ends -->

    <?php get_template_part( 'global-templates/cta' ); ?>
  </main>

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>