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
?>

<div class="wrapper product-page" id="full-width-page-wrapper">

  <main class="site-main" id="main" role="main">
    
    <!-- Hero -->
    <div class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-6">
            <h1 class="text-primary h3"><?php the_field('hero_title') ?></h1>
            <p>
              <?php the_field('hero_description') ?>
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Hero ends -->

    <!-- Introduction Tabs -->
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="h4 text-primary mt-5 mb-3 text-center">Introducing</h2>
        </div>
      </div>
    </div>
    <div class="wrapper text-center">
      <div class="container">
        <div class="product-tabs">
          <div class="row">
            <div class="col-lg-3 offset-3">
              <a class="tab" href="">
                  <img class="img-fluid" src="http://localhost:8888/wordpress/wp-content/uploads/2020/04/Group-405@2x.png" alt="">
                </a>
            </div>
            <div class="col-lg-3">
              <a class="tab" href="">
                  <img class="img-fluid" src="http://localhost:8888/wordpress/wp-content/uploads/2020/04/Group-405@2x.png" alt="">
                </a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <h2 class="text-white mb-3"><?php the_field('introduction_title') ?></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-10 offset-lg-1">
            <p class="text-white"><?php the_field('introduction_description') ?></p>
          </div>
        </div>
      </div>
    </div>
    <!-- Introduction Tabs ends -->

    <!-- Principles -->
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="text-center h3 mt-5 mb-4"><?php the_field('principles_title') ?></h2>
        </div>
      </div>
    </div>
    <div class="principles">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 offset-lg-1">
            <?php 

              $posts = get_field('principles_list');

              if( $posts ): ?>
              <?php foreach( $posts as $post): ?>
                <?php
                  setup_postdata($post);
                  $thumb_id = get_post_thumbnail_id();
									$thumb_url_array = wp_get_attachment_image_src($thumb_id, full, true);
									$thumb_url = $thumb_url_array[0];
                ?>
                <div class="item">
                  <div class="icon">
                    <img class="img-fluid" src=<?php echo $thumb_url  ?> alt="">
                  </div>
                  <div class="content">
                    <h4 class="text-primary"><?php the_title() ?></h4>
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

    <!-- CTA -->
    <div class="container mb-5">
      <div class="row">
        <div class="col-3 offset-lg-3">
          <a class="btn btn-primary btn-lg btn-block" href="">Compare Digismart & Pro</a>
        </div>
        <div class="col-3">
          <a class="btn btn-primary btn-lg btn-block" href="">Check ROI</a>
        </div>
      </div>
    </div>
    <!-- CTA ends -->

    <!-- Features -->
    <div class="features">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2>Salient Features</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3">
            <ul class="nav flex-column">
              <?php 
                $posts = get_field('features');
                $index = 0;
                if( $posts ): ?>
                <?php foreach( $posts as $post): ?>
                  <?php
                    setup_postdata($post);
                  ?>
                  <li><a class="<?php echo $index == 0 ? 'active' : '' ?>" data-toggle="tab" href="#feature-item-<?php the_id() ?>"><?php the_field('link_label') ?></a></li>
                <?php
                  $index++;
                  endforeach;
                ?>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <?php 
                $posts = get_field('features');
                $index = 0;
                if( $posts ): ?>
                <?php foreach( $posts as $post): ?>
                  <?php
                    setup_postdata($post);
                  ?>
                  <div id="feature-item-<?php the_id() ?>" class="tab-pane fade <?php echo $index == 0 ? 'show active' : '' ?>">
                    <div class="row">
                      <div class="col-lg-6">
                        <img class="img-fluid" src="http://localhost:8888/wordpress/wp-content/uploads/2020/04/1.-Dashboard@2x.png" alt="">
                      </div>
                      <div class="col-lg-6">
                        <h3><?php the_title() ?></h3>
                        <p><?php the_content() ?></p>
                      </div>
                    </div>
                  </div>
                <?php
                  $index++;
                  endforeach;
                ?>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Features ends -->

    <!-- CTA -->
    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-2 offset-lg-3">
          <a class="btn btn-outline-primary btn-block" href="">Compare Digismart & Pro</a>
        </div>
        <div class="col-2">
          <a class="btn btn-primary btn-block" href="">Request a Demo</a>
        </div>
        <div class="col-2">
          <a class="btn btn-outline-primary btn-outline btn-block" href="">Check ROI</a>
        </div>
      </div>
    </div>
    <!-- CTA ends -->

  </main>

</div>

<?php get_footer(); ?>