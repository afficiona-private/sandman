<?php
/**
 * Template Name: About Us
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
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
    <div class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <h2 class="text-primary mb-4">We're The Pioneer</h2>
            <p>
              Founded by Mr. Deepak Chowdhary, a first generation entrepreneur - MPM Private Limited; our parent company has been the pioneer and India's largest manufacturer of engineered Lustrous Carbon Additives for use in foundry green sand molding practice, since 1984.
              <br>
              In our history spanning 35+ years, we have relentlessly focused on innovating both in product and application services in the green sand eco-system of iron foundries.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Hero ends -->

    <!-- Section 2 -->
      <div class="section2">
        <div class="container">
          <div class="row">
            <div class="col-lg-5">
              <img class="img-fluid" src="http://localhost:8888/wordpress/wp-content/uploads/2020/04/Group-81.png" alt="data right image">
            </div>
            <div class="col-lg-7">
              <p>
                Founded by Mr. Deepak Chowdhary, a first generation entrepreneur - MPM Private Limited; our parent company has been the pioneer and India's largest manufacturer of engineered Lustrous Carbon Additives for use in foundry green sand molding practice, since 1984.
                <br>
                In our history spanning 35+ years, we have relentlessly focused on innovating both in product and application services in the green sand eco-system of iron foundries.
              </p>
            </div>
          </div>
        </div>
      </div>
    <!-- Section 2 ends -->

    <!-- Section 3 -->
      <div class="section3">
        <div class="container">
          <div class="wrapper text-center">
            <div class="row">
              <div class="col-lg-12">
                <h2 class="text-white">What We Do</h2>
                <p class="text-white">
                  We built SANDMAN, a first of its kind, patented, cloud-based data analytical software, designed to equip foundrymen world over with the power to harness the power of their own data and answer their most complex greensand questions; predictively, pro-actively, accurately, sustainably and scalably.
                  <br>
                  SANDMAN helps to optimise their foundry green sand system with a view to reducing casting defects and optimise consumption of related additives like Bentonite, Silica Sand, Lustrous Carbon Formers
                </p>
                <a class="btn btn-secondary" href="">Learn more about Sandman</a>
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
            <div class="col-lg-10 offset-lg-1">
              <p class="text-center">
                With SANDMAN foundries are unravelling the reasons for costly casting defects by predicting which sand properties have been affecting their sand system the most and receiving precise, dose-by-need variable sand-mix prescriptions to achieve the target, optimal sand properties to avoid over or under dosing of the sand system.
                <br> <br>
                Talking to the digital outputs of foundry machines, installing sensors to pull in reams of data (example: ambient temperature and humidity, return sand moisture, etc.) in the sand plant that have profound effects on mold quality and ultimately in casting outcomes, make SANDMAN a true Industry 4.0 solution for Foundries moving towards leveraging AI and machine learning to achieve good casting outcomes.
              </p>
            </div>
          </div>
        </div>
      </div>
    <!-- Section 4 ends -->

    <!-- Section 5 -->
      <div class="section5">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offset-lg-6">
              <h2 class="text-primary mb-4 mt-5">Where We're Going</h2>
              <p>
                We are consistently striving to bring more value to this industry by foraying into different processes, developing newer models which provide even more granularity with which better castings can be produced and just the way foundries look at their data.
                <br>
                Metal analytics is the next destination as are many others verticals in the metal casting domain as we discover more and more possibilities to reduce waste, increase process precision and reliability.
                <br>
                To move towards a future where data can be used to function the way we are designed and to deliver value to our customers.
              </p>
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
