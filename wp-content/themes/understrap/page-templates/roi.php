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
// WP_Query arguments
$args = array(
	'post_type' => 'roi_records',
);

$roiTableQuery = new WP_Query( $args );
?>

<div class="wrapper roi-page">

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
                    <a class="text-uppercase text-secondary ml-auto" href="<?php echo esc_url( $comparison_link ); ?>">Compare Digismart & Pro</a>
                  </div>

                </header><!-- .entry-header -->

                <img class="img-fluid mb-3" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="">

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
                      <!-- Table head-->
                        <div class="row no-gutters">
                          <div class="col-12">
                            <div class="table-head">
                              <div class="row no-gutters">
                                <?php
                                  $theadIndex = 0;
                                  foreach ( $table['header'] as $th ) {
                                    $headColClass = $theadIndex == 0 ? 'col-lg-6' : 'col-lg-2 text-center';
                                    ?>
                                      <div class="<?php echo $headColClass; ?>">
                                        <div class="head pl-3 pr-3 pt-2 pb-2 <?php echo $theadIndex == sizeof($table['header']) - 1 ? 'last' : '' ?>">
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
                                      $colClass = $colIndex == 0 ? 'col-lg-6' : 'col-lg-2';
                                      $featureClass = $colIndex == 0 ? 'detail' : '';
                                      $featureClass .= $colIndex == sizeof($tr) - 1 ? 'last' : '';
                                      ?>
                                        <div class="<?php echo $colClass; ?>">
                                          <div class="feature-item pl-3 pr-3 pt-2 pb-2 <?php echo $featureClass; ?>">
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
                      <?php
                      wp_reset_postdata(); 
                    endwhile;
                  ?>
                  <!-- Table ends -->

                </div><!-- .entry-content -->
              </div>
            </div>

          </article><!-- #post-## -->
        </div>
      </div>
    </div>

    <div class="container pb-5">
      <div class="row">
        <div class="col-lg-3 offset-lg-3">
          <a class="btn btn-primary btn-block text-uppercase" href="">Request a Demo</a>
        </div>
        <div class="col-lg-3">
          <a class="btn btn-primary btn-block text-uppercase" href="">Check ROI</a>
        </div>
      </div>
    </div>

  </main>

</div>

<?php get_footer(); ?>