<?php
/**
 * Template Name: ROI Layout
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$comparison_link = get_permalink( get_page_by_path( 'features-comparison' ) );
$demo_link = get_permalink( get_page_by_path( 'request-demo' ) );
// WP_Query arguments
$args = array(
	'post_type' => 'roi_records',
);

$roiTableQuery = new WP_Query( $args );
?>

<div class="wrapper roi-page general-page">

  <main class="site-main" id="main" role="main">

    <div class="container">
      <div class="row">
        <div class="col-12">
          <article class="contained-page-article">

            <div class="row">
              <div class="col-lg-10 offset-lg-1">
                <header class="entry-header d-flex justify-content-between align-items-center">

                  <h1 class="text-primary h2 mb-0"><?php the_title() ?></h1>

                  <a class="text-uppercase text-secondary d-sm-inline-block d-none" href="<?php echo esc_url( $comparison_link ); ?>">Compare Digismart & Pro</a>

                </header><!-- .entry-header -->

                <div class="entry-content">

                  <!-- Table -->
                    <?php
                      while ( $roiTableQuery->have_posts() ) : $roiTableQuery->the_post();
                        $table = get_field('roi_table');
                        if ( empty($table) ) {
                          return;
                        }
                        ?>
                        <div class="row">
                          <div class="col-12">
                            <h3 class="h5 title"><?php the_title(); ?></h3>
                          </div>
                        </div>
                        
                        <!-- Table wrapper -->
                        <div class="table-wrapper">

                          <!-- Table Content -->
                          <div class="table-content">
                          
                            <!-- Table head-->
                            <div class="row no-gutters">
                              <div class="col-12">
                                <div class="table-head">
                                  <div class="row no-gutters">
                                    <?php
                                      $theadIndex = 0;
                                      foreach ( $table['header'] as $th ) {
                                        $headColClass = $theadIndex == 0 ? 'col-3' : 'col-3';
                                        ?>
                                          <div class="<?php echo $headColClass; ?>">
                                            <div
                                              class="head px-1 px-sm-2 px-md-3 py-1 py-sm-2 py-md-3
                                              <?php echo $theadIndex !== 0 ? 'justify-content-center' : '' ?>
                                              <?php $theadIndex == sizeof($table['header']) - 1 ? 'last' : '' ?>">
                                              <?php echo $th['c'] ?>
                                            </div>
                                          </div>
                                        <?php
                                        $theadIndex++;
                                      }
                                    ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Table head ends -->

                            <div class="feature">
                              <?php
                                $entryIndex = 0;
                                foreach ( $table['body'] as $tr ) {
                                  ?>
                                    <div class="row no-gutters feature-entry">
                                      <?php
                                        $colIndex = 0;
                                        foreach ( $tr as $td ) {
                                          $colClass = $colIndex == 0 ? 'col-3' : 'col-3';
                                          $featureClass = $colIndex == 0 ? 'detail' : '';
                                          $featureClass .= $colIndex == sizeof($tr) - 1 ? 'last' : '';
                                          ?>
                                            <div class="<?php echo $colClass; ?>">
                                              <div class="feature-item px-1 px-sm-2 px-md-3 py-1 py-sm-2 py-md-3 <?php echo $featureClass; ?>">
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
                                  $entryIndex++;
                                }
                              ?>
                            </div>
                          </div>
                          <!-- Table Content ends -->
                        </div>
                        <!-- Table wrapper ends -->

                        <?php
                        wp_reset_postdata(); 
                      endwhile;
                    ?>
                    <!-- Table ends -->

                  <div class="mt-4 d-md-none d-inline-block">
                    <a class="text-uppercase text-secondary" href="<?php echo esc_url( $comparison_link ); ?>">Compare Digismart & Pro</a>
                  </div>

                </div><!-- .entry-content -->
              </div>
            </div>

          </article><!-- #post-## -->
        </div>
      </div>
    </div>

    <div class="container pb-5">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-6">
          <div class="row">
            <div class="col-12 col-lg-6">
              <a class="btn btn-primary btn-block text-uppercase mb-3 mb-md-0" href="<?php echo esc_url( $demo_link ); ?>">Request a Demo</a>
            </div>
            <div class="col-12 col-lg-6">
              <a class="btn btn-primary btn-block text-uppercase" href="<?php echo esc_url( $comparison_link ); ?>">Compare Digismart & Pro</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

</div>

<?php get_footer(); ?>