<?php
$featuredInsightsArgs = array(
  'post_type' => 'featured_insights',
  'limit' => 4
);

$featuredInsightQuery = new WP_Query( $featuredInsightsArgs );
?>

<div class="row">
  <?php
    $itemIndex = 0;
    while ( $featuredInsightQuery->have_posts() ) : $featuredInsightQuery->the_post();
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, '1000', true);
    $thumb_url = $thumb_url_array[0];
    $animDelay = (4 * $itemIndex) / 10;
      ?>
        <div class="col-lg-3 mb-4 mb-sm-0 wow fadeIn" data-wow-delay="<?php echo $animDelay; ?>s">
          <div class="article-item p-4">
            <h3 class="h5 mb-4"><?php the_title() ?></h3>
            <?php the_excerpt() ?>
            <a class="text-secondary text-uppercase text-right d-block" href="<?php echo the_permalink(); ?>">Read More</a>
          </div>
        </div>
      <?php
      $itemIndex++;
    endwhile;

    wp_reset_postdata(); 
  ?>
</div>