<?php
$clientCardsQueryArgs = array(
  'post_type' => 'clients',
  'orderby' => 'menu_order',
  'order' => 'ASC'
);

$clientCardsQuery = new WP_Query( $clientCardsQueryArgs );

$post_slug = $post->post_name;
?>
<div class="company-cards row <?php echo $post_slug != 'contact-us' ? 'justify-content-center' : '' ?>">
  <?php
    $itemIndex = 0;
    while ( $clientCardsQuery->have_posts() ) : $clientCardsQuery->the_post();
      $animDelay = ($itemIndex + 3) / 10;
      ?>
        <div class="col-6 col-sm-4 col-md-3 wow fadeIn" data-wow-delay="<?php echo $animDelay; ?>s">
          <div class="each p-2">
            <img src="<?php the_field('logo') ?>" alt="<?php the_title(); ?>">
          </div>
        </div>
      <?php
      $itemIndex++;
    wp_reset_postdata(); 
    endwhile;
  ?>
</div>