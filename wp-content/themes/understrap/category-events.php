<?php
/**
 * Template Name: Product Page Layout
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$category = get_the_category(); 
$cat_slug = $category[0]->slug;
$cat_name = $category[0]->name;
$featured_image_url = get_field('featured_image', $category[0])['url'];
?>

<div class="wrapper" id="full-width-page-wrapper">

  <main class="site-main" id="main" role="main">
    
    <!-- Hero -->
    <div class="hero" style="background-image: url('<?php echo $featured_image_url; ?>');">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="text-white h3 text-center"><?php echo $cat_name; ?></h1>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h2 class="text-white h4">Upcoming Events</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <!-- Slides -->
            <div id="upcoming-events-carousel" class="carousel slide" data-ride="carousel">

            <?php
              // Find todays date in Ymd format.
              $today = date('Ymd');

              // Query posts using a meta_query to compare event date with current date
              $posts = get_posts( array(
                'post_type' => 'post',
                'category_name' => 'events',
                'meta_query' => array(
                  array(
                    'key'     => 'event_date',
                    'compare' => '>=',
                    'value'   => $today,
                  )
                ),
              ));
            ?>

							<!-- Indicators -->
							<ul class="carousel-indicators">
                <?php
                  $index = 0;
                  foreach( $posts as $post ) {
                    ?>
                      <li
                        data-target="#upcoming-events-carousel"
                        data-slide-to="<?php echo $index ?>"
                        class="<?php echo $index == 0 ? 'active': '' ?>"
                      >
                      </li>
                    <?php
										$index++;
                    wp_reset_postdata(); 
                  }
									?>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">

								<?php
                  $index = 0;
                  
                  foreach( $posts as $post ) {
                    setup_postdata( $post );
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
                    $thumb_url = $thumb_url_array[0];
										?>
											<div class="carousel-item <?php echo $index == 0 ? 'active' : '' ?>">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="pt-3 pb-3 pl-3">
                              <img class="img-fluid" src="<?php echo $thumb_url ?>" alt="">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="content d-flex flex-column h-100 pt-3 pr-3 pb-3">
                              <h3 class="h5 mb-3"><?php the_title(); ?></h3>
                              <?php the_content(); ?>
                              <p class="mb-0 mt-4 font-weight-bold mt-auto"><?php the_field('event_date_label'); ?></p>
                              <p class="font-weight-bold"><?php the_field('event_location'); ?></p>
                              <a class="text-secondary text-uppercase" href="<?php echo the_permalink(); ?>">Read More</a>
                            </div>
                          </div>
                        </div>
                      </div>
										<?php
										$index++;
                    wp_reset_postdata();
                  }
								?>
							</div>

						</div>
            <!-- Slides ends -->
          </div>
        </div>
      </div>
    </div>
    <!-- Hero ends -->

    <!-- Recent Evens -->
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="text-primary h4 text-center mb-4 mt-5">Recent Events</h2>
        </div>
      </div>
    </div>

    <div class="recent-events">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <?php
              $today = date('Ymd');
              $posts = get_posts( array(
                'post_type' => 'post',
                'category_name' => 'events',
                'meta_query' => array(
                  array(
                    'key'     => 'event_date',
                    'compare' => '<',
                    'value'   => $today,
                  )
                ),
              ));
              foreach( $posts as $post ) {
                setup_postdata( $post );
                $thumb_id = get_post_thumbnail_id();
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
                $thumb_url = $thumb_url_array[0];
                ?>
                <div class="event-card">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="pt-3 pb-3 pl-3">
                        <img class="img-fluid" src="<?php echo $thumb_url ?>" alt="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="d-flex flex-column h-100 pr-4 pt-3 pb-3">
                        <h3 class="h5 mb-0"><?php the_title(); ?></h3>
                        <p class="mb-0 mt-1 font-weight-bold mb-4">
                          <?php the_field('event_date_label'); ?> &nbsp; | &nbsp;
                          <?php the_field('event_location'); ?>
                        </p>
                        <?php the_content(); ?>
                        <a class="text-secondary text-uppercase mt-auto" href="<?php echo the_permalink(); ?>">Read More</a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                wp_reset_postdata();
              }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Recent Evens ends -->

  </main>

</div>

<?php get_footer(); ?>