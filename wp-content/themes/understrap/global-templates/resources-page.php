<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$category = get_the_category(); 
$cat_slug = $category[0]->slug;
$cat_name = $category[0]->name;
$featured_image_url = get_field('featured_image', $category[0])['url'];
?>

<div class="wrapper resources-category" id="full-width-page-wrapper">

  <main class="site-main" id="main" role="main">
    
    <!-- Hero -->
    <div class="hero">
      <img class="hero-bg" src="<?php echo $featured_image_url; ?>" alt="hero">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="h3 text-center title"><?php echo $cat_name; ?></h1>
          </div>
        </div>

        <!-- Cards -->
        <div class="row mt-5">
          <?php

            $posts = get_posts( array(
              'post_type' => 'post',
              'category_name' => $cat_slug
            ));
            $itemIndex = 0;
            foreach( $posts as $post ) {
              setup_postdata( $post );
              $thumb_id = get_post_thumbnail_id();
              $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
              $thumb_url = $thumb_url_array[0];
              $file = get_field('resource_document');
              $animDelay = ($itemIndex + 3) / 10;
              ?>
                <div class="col-lg-4 mb-4 wow fadeIn" data-wow-delay="<?php echo $animDelay; ?>s">
                  <div class="card">
                    <img class="img-fluid" src="<?php echo $thumb_url; ?>" alt="">
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <p class="m-0">
                        <?php the_title(); ?>
                      </p>
                      <?php
                        if (sizeof($file)) {
                          ?>
                            <a class="download-btn" target="blank" href="<?php echo $file['url']; ?>"><i class="fa fa-download"></i></a>
                          <?php
                        }
                      ?>
                    </div>
                    <?php
                      if ($cat_slug == 'case-studies') {
                        ?>
                          <a class="d-inline-block mt-4 mt-sm-auto" href="<?php the_permalink(); ?>">Read More</a>
                        <?php
                      }
                    ?>
                  </div>
                </div>
              <?php
              $itemIndex++;
              wp_reset_postdata();
            }
          ?>
        </div>
        <!-- Cards ends -->
      </div>
    </div>
    <!-- Hero ends -->

  </main>

</div>

<?php get_footer(); ?>