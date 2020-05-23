  <?php
    $demoPageQuery = new WP_Query( 'pagename=request-demo' );
    $title = '';
    $illustration_image = '';
    $bg_image = '';
    while ( $demoPageQuery->have_posts() ) : $demoPageQuery->the_post();
      $title = get_the_content();
      $illustration_image = get_field('illustration_image');
      $bg_image = get_field('background_image');
    endwhile;
    wp_reset_postdata();
?>
  
  <div class="cta">
    <img class="cta-bg" src="<?php echo $bg_image; ?>" alt="bg image" />
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-10 col-md-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-5">
                <h2 class="text-white mb-4 mb-lg-0 wow fadeIn">
                  <?php echo $title; ?>
                </h2>
                <img class="cta__illustration mt-3 mb-3" src="<?php echo $illustration_image; ?>" alt="illustration" />
              </div>
              <div class="col-lg-7">
                <div class="form-wrapper wow fadeIn">
                  <?php echo do_shortcode( '[contact-form-7 id="63" title="Request Demo Form"]' ); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>