<?php
/**
 * Template Name: Features Comparison Layout
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$roi_link = get_permalink( get_page_by_path( 'check-roi' ) );
// WP_Query arguments
$args = array(
	'post_type' => 'features_comparison',
);

$featurePointsQuery = new WP_Query( $args );
?>

<div class="wrapper features-comparison-page general-page">

  <main class="site-main" id="main" role="main">

    <div class="container">
      <div class="row">
        <div class="col-12">
          <article class="contained-page-article">

            <div class="row">
              <div class="col-lg-10 offset-lg-1">
                <header class="entry-header">

                  <div class="d-flex align-items-center">
                    <h1 class="text-primary h2 mb-0"><?php the_title() ?></h1>
                  </div>

                </header><!-- .entry-header -->

                <div class="entry-content">
                  
                  <div class="table-wrapper">
                  
                    <div class="table-content">

                      <!-- Table head-->
                      <div class="row no-gutters">
                        <div class="col-12">
                          <div class="bg-dark">
                            <div class="row no-gutters">
                              <div class="col-2">
                                <div class="head pl-3 pr-3 pt-2 pb-2">
                                  Module
                                </div>
                              </div>
                              <div class="col-10">
                                <div class="row no-gutters">
                                  <div class="col-8">
                                    <div class="head pl-3 pr-3 pt-2 pb-2">
                                      Features
                                    </div>
                                  </div>
                                  <div class="col-2">
                                    <div class="head pl-3 pr-3 pt-2 pb-2 text-center">
                                      Sandman
                                    </div>
                                  </div>
                                  <div class="col-2">
                                    <div class="head pl-3 pr-3 pt-2 pb-2 text-center">
                                      Digismart
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Table head ends -->

                      <!-- Table Body -->
                      <?php
                        while ( $featurePointsQuery->have_posts() ) : $featurePointsQuery->the_post();
                          $table = get_field('comparison_table');
                          ?>
                            <div class="feature">
                              <div class="row no-gutters">
                                <div class="col-2">
                                  <div class="feature-item pl-3 pr-3 pt-2 pb-2 justify-content-start">
                                    <?php the_title(); ?>
                                  </div>
                                </div>
                                <div class="col-10">
                                  <?php
                                    if ( ! empty ( $table ) ) {
                                      foreach ( $table['body'] as $tr ) {
                                        ?>
                                          <div class="row no-gutters feature-entry">
                                            <?php
                                              $colIndex = 0;
                                              foreach ( $tr as $td ) {
                                                $colClass = $colIndex == 0 ? 'col-8' : 'col-2';
                                                $featureClass = $colIndex == 0 ? 'detail' : '';
                                                $featureClass .= $colIndex == sizeof($tr) - 1 ? 'last' : '';
                                                ?>
                                                  <div class="<?php echo $colClass; ?>">
                                                    <div class="feature-item <?php echo $featureClass; ?>">
                                                      <?php
                                                        if ($td['c'] == 'yes') {
                                                          echo '<i class="text-primary fa fa-check"></i>';
                                                        } elseif ($td['c'] == 'no') {
                                                          echo '<i class="text-muted fa fa-check"></i>';
                                                        } else {
                                                          echo $td['c'];
                                                        }
                                                      ?>
                                                    </div>
                                                  </div>
                                                <?php
                                                $colIndex++;
                                              }
                                            ?>
                                          </div>
                                        <?php
                                      }
                                    }
                                  ?>
                                </div>
                              </div>
                            </div>
                          <?php
                          wp_reset_postdata(); 
                        endwhile;
                      ?>
                      <!-- Table Body ends -->

                    </div>

                  </div>

                </div><!-- .entry-content -->

                <div class="text-lg-right mt-4">
                  <a class="text-uppercase text-secondary" href="<?php echo esc_url( $roi_link ); ?>">Check ROI</a>
                </div>

              </div>
            </div>

          </article><!-- #post-## -->
        </div>
      </div>
    </div>

    <div class="container pb-5">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-3">
          <a class="btn btn-primary btn-block text-uppercase mb-3" href="">Request a Demo</a>
        </div>
        <div class="col-12 col-lg-3">
          <a class="btn btn-primary btn-block text-uppercase" href="">Check ROI</a>
        </div>
      </div>
    </div>

  </main>

</div>

<?php get_footer(); ?>