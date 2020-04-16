<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$category = get_the_category(); 
$cat_name = $category[0]->name;
$category_link = get_category_link( $category[0]->cat_ID );

$featured_image_url = get_field('featured_image', $category[0])['url'];
?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<article class="contained-page-article">

				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<header class="entry-header">

							<h1 class="text-primary h3"><?php the_title() ?></h1>
							<div class="d-flex">
								<p class="mb-4"><?php the_field('event_date_label'); ?> &nbsp; | &nbsp; <?php the_field('event_location'); ?></p>
								<a class="text-secondary text-uppercase ml-auto" href="<?php echo esc_url( $category_link ); ?>">All <?php echo $cat_name; ?></a>
							</div>

						</header><!-- .entry-header -->

						<img class="img-fluid mb-3" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="">

						<div class="entry-content">

							<?php the_content(); ?>

						</div><!-- .entry-content -->
					</div>
				</div>

			</article><!-- #post-## -->
		</div>
	</div>
</div>
