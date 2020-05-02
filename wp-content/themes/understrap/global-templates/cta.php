  <?php
    $demoPageQuery = new WP_Query( 'pagename=request-demo' );
    $title = '';
    while ( $demoPageQuery->have_posts() ) : $demoPageQuery->the_post();
        $title = get_the_content();
    endwhile;
    wp_reset_postdata();
?>
  
  <div class="cta">
    <img class="cta-bg" src="<?php echo do_shortcode( '[media-url id="2020/04/Mask-Group-29-1536x783-1.png"]') ?>" alt="bg image" />
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-5">
                <h2 class="text-white mb-4 mb-lg-0 wow fadeIn">
                  <?php echo $title; ?>
                </h2>
              </div>
              <div class="col-lg-7">
                <div class="form-wrapper wow fadeIn">
                  <?php echo do_shortcode( '[contact-form-7 id="63" title="CTA Form"]' ); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>