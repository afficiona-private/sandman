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
$container = get_theme_mod( 'understrap_container_type' );
$product_type =  explode('-',$post->post_name);
if ($product_type) {
  $product_type = $product_type[1];
}
?>

<div class="wrapper product-page" id="full-width-page-wrapper">

  <main class="site-main" id="main" role="main">
    
    <!-- Hero -->
    <div class="hero" id="productPageHero">
      <img
        class="hero-bg wow fadeIn <?php echo !get_field('hero_content_alignment') ? 'hero-bg--right': '' ?>"
        id="productPageHeroBg"
        src="<?php the_field('hero_image') ?>"
      />
      <div class="container">
        <div class="row <?php echo get_field('hero_content_alignment') ? 'justify-content-end': 'justify-content-start' ?>">
          <div class="col-sm-6 wow fadeIn">
            <h1 class="text-primary"><?php the_field('hero_title') ?></h1>
            <?php the_field('hero_description') ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Hero ends -->

    <!-- Introduction Tabs -->
    <div class="introduction-section text-center">
      <div class="container">
        <div class="row wow fadeInUp" data-wow-delay=".4s">
          <div class="col-12">
            <h2 class="text-white mb-3"><?php the_field('product_title') ?></h2>
          </div>
        </div>
        <div class="row justify-content-center wow fadeIn" data-wow-delay=".7s">
          <div class="col-sm-8 text-white">
            <?php the_field('product_description') ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Introduction Tabs ends -->

    <!-- Principles -->
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="text-center h3 mt-5 mb-4 wow fadeInUp"><?php the_field('principles_title') ?></h2>
        </div>
      </div>
    </div>
    <div
      class="principles"
      style="background-image: url('<?php echo do_shortcode( '[media-url id="2020/05/Path-921.png"]' ) ?>'), url('<?php echo do_shortcode( '[media-url id="2020/05/Path-836.png"]' ) ?>')"
    >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-8 col-lg-10">
            <?php
              $posts = get_posts( array( 'category_name' => $post->post_name . '-principles' ) );

              if( $posts ): ?>
              <?php foreach( $posts as $post): ?>
                <?php
                  setup_postdata($post);
                  $thumb_id = get_post_thumbnail_id();
									$thumb_url_array = wp_get_attachment_image_src($thumb_id, full, true);
									$thumb_url = $thumb_url_array[0];
                ?>
                <div class="item wow fadeIn">
                  <div class="icon">
                    <img class="img-fluid" src=<?php echo $thumb_url  ?> alt="">
                  </div>
                  <div class="content">
                    <h3 class="text-primary mb-2 mb-sm-3"><?php the_title() ?></h3>
                    <?php the_content(); ?>
                  </div>
                </div>
              <?php endforeach; ?>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Principles ends -->

    <!-- Features -->
    <div class="features">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center text-md-left">
            <h2 class="mb-4 wow fadeIn"><?php the_field('features_title'); ?></h2>
          </div>
        </div>
        <div class="row wow fadeIn justify-content-center" data-wow-delay=".4s">
          <!-- Hide tabs on mobile and tablet -->
          <div class="col-3 d-none d-md-flex">
            <ul class="nav flex-column">
              <?php
                $posts = get_posts( array( 'category_name' => $post->post_name . '-features' ) );
                $index = 0;
                if( $posts ): ?>
                <?php foreach( $posts as $post): ?>
                  <?php
                    setup_postdata($post);
                  ?>
                  <li><a class="<?php echo $index == 0 ? 'active' : '' ?>" data-toggle="tab" href="#feature-item-<?php the_id() ?>"><?php the_title() ?></a></li>
                <?php
                  $index++;
                  endforeach;
                ?>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            </ul>
          </div>
          <div class="col-12 col-sm-8 col-md-9">

            <!-- Carousel on mobile/tablet and tabs on desktop -->
            <div id="product-features-carousel" class="tab-content carousel slide" data-ride="">

              <!-- Indicators -->
              <div class="d-block d-md-none">
                <ul class="carousel-indicators">
                  <?php
                    $index = 0;
                    if( $posts ):
                      foreach( $posts as $post) {
                        setup_postdata($post);
                        ?>
                          <li
                            data-target="#product-features-carousel"
                            data-slide-to="<?php echo $index ?>"
                            class="<?php echo $index == 0 ? 'active': '' ?>"
                          >
                          </li>
                        <?php
                        $index++;
                      }
                      wp_reset_postdata();
                    endif;
                    ?>
                </ul>
              </div>

              <div class="carousel-inner">
                <?php
									$index = 0;
									
									if( $posts ):
										foreach( $posts as $post) {
                      setup_postdata($post);
											$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    ?>
											<div id="feature-item-<?php the_id() ?>" class="tab-pane fade carousel-item <?php echo $index == 0 ? 'show active' : '' ?>">
												<div class="row">
                          <div class="col-lg-6">
                            <img class="img-fluid" src="<?php echo $featured_img_url; ?>" alt="">
                          </div>
                          <div class="col-lg-6">
                            <h3><?php the_title() ?></h3>
                            <p><?php the_content() ?></p>
                          </div>
                        </div>
											</div>
										<?php
										 $index++;
									 	}
										wp_reset_postdata(); 
									endif;
								?>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Features ends -->

    <!-- CTA -->
    <div class="container mt-5 mb-5 wow fadeIn">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-4 col-lg-3">
          <a class="btn btn-outline-primary btn-block mb-3 mb-lg-0" href="<?php the_permalink( get_page_by_path( 'features-comparison' ) ) ?>">
            Compare Digismart & Pro
          </a>
        </div>
        <div class="col-12 col-sm-4 col-lg-3">
          <a class="btn btn-primary btn-block mb-3 mb-lg-0" href="<?php the_permalink( get_page_by_path( 'request-demo' ) ) ?>">
            Request a Demo
          </a>
        </div>
        <div class="col-12 col-sm-4 col-lg-3">
          <a class="btn btn-outline-primary btn-outline btn-block" href="<?php the_permalink( get_page_by_path( 'check-roi' ) ) ?>">
            Check ROI
          </a>
        </div>
      </div>
    </div>
    <!-- CTA ends -->

  </main>

</div>

<?php get_footer(); ?>