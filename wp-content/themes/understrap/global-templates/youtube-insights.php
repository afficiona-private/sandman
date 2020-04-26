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
<div class="row">
  <?php
    while ( $featuredInsightQuery->have_posts() ) : $featuredInsightQuery->the_post();
      $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
      ?>
        <div class="col-lg-5 offset-lg-1">
          <div data-youtube="<?php the_field('youtube_link'); ?>" class="youtube-item  h-100">
            <div class="row">
              <div class="col-12">
                <div class="img-wrapper">
                  <img class="w-100" src="<?php echo $featured_img_url; ?>" alt="" />
                </div>
                <div class="p-3">
                  <p><?php the_title(); ?></p>
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

  <div class="col-lg-6">

    <?php
      while ( $nonFeaturedInsightQuery->have_posts() ) : $nonFeaturedInsightQuery->the_post();
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
          <div data-youtube="<?php the_field('youtube_link'); ?>" class="youtube-item">
            <div class="row">
              <div class="col-lg-4">
                <div class="img-wrapper">
                  <img class="w-100" src="<?php echo $featured_img_url; ?>" alt="" />
                </div>
              </div>
              <div class="col-lg-8 d-flex align-items-center">
                <p><?php the_title(); ?></p>
              </div>
            </div>
          </div>
        <?php
      wp_reset_postdata(); 
      endwhile;
    ?>
  </div>

  <div class="col-12">
    <a class="text-sm-right d-block mt-4 text-uppercase" target="_blank" href="<?php the_field('youtube_channel'); ?>">
      Visit our YouTube Channel for more
    </a>
  </div>
  
</div>