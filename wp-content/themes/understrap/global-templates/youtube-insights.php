<?php
$featuredInsightsArgs = array(
  'post_type' => 'youtube_insights',
  'limit' => 1,
  'meta_key'		=> 'is_featured',
	'meta_value'	=> 1
);
$nonFeaturedInsightsArgs = array(
  'post_type' => 'youtube_insights',
  'limit' => 3,
  'meta_key'		=> 'is_featured',
	'meta_value'	=> 0
);

$featuredInsightQuery = new WP_Query( $featuredInsightsArgs );
$nonFeaturedInsightQuery = new WP_Query( $nonFeaturedInsightsArgs );
?>

<!-- title -->
<div class="row">
  <div class="col-lg-12">
    <h2 class="text-primary h3 text-center mb-5">
      <?php the_field('youtube_insights_title') ?>
    </h2>
  </div>
</div>
<!-- title ends -->
<div class="row justify-content-center">
  <?php
    while ( $featuredInsightQuery->have_posts() ) : $featuredInsightQuery->the_post();
      $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
      ?>
        <div class="col-sm-6 col-md-6">
          <div data-youtube="<?php the_field('youtube_link'); ?>" class="youtube-item h-md-100 mb-3 mb-md-0">
            <div class="row">
              <div class="col-12">
                <div class="img-wrapper">
                  <img class="w-100" src="<?php echo $featured_img_url; ?>" alt="" />
                </div>
                <div class="p-3">
                  <h4><?php the_title(); ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php
    ?>
    <?php
    wp_reset_postdata(); 
    endwhile;
  ?>

  <div class="col-sm-12 col-md-6">

    <div class="row">
      <?php
        while ( $nonFeaturedInsightQuery->have_posts() ) : $nonFeaturedInsightQuery->the_post();
          $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
          ?>
            <div class="col-sm-4 col-md-12 mb-3 mb-md-4">
              <div data-youtube="<?php the_field('youtube_link'); ?>" class="youtube-item">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="img-wrapper">
                      <img class="w-100" src="<?php echo $featured_img_url; ?>" alt="" />
                    </div>
                  </div>
                  <div class="col-lg-8 d-flex align-items-center">
                    <div class="p-3">
                      <h4><?php the_title(); ?></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php
        wp_reset_postdata(); 
        endwhile;
      ?>
    </div>

  </div>

  <div class="col-12">
    <a class="text-sm-right d-block mt-2 mt-md-4 text-uppercase text-dark insights-cta-link" target="_blank" href="<?php the_field('youtube_channel'); ?>">
      <?php the_field('youtube_channel_cta'); ?>
    </a>
  </div>
  
</div>