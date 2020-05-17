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
$cat_slug = $category[0]->slug;
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

							<h1 class="title h3 mb-5"><?php the_title() ?></h1>
							<div class="d-sm-flex">
								<?php
									if ($cat_slug == 'events') {
										?>
											<p class="mb-3 mb-sm-4"><?php the_field('event_date_label'); ?> &nbsp; | &nbsp; <?php the_field('event_location'); ?></p>
										<?php
									}
								?>
							</div>

						</header><!-- .entry-header -->

						<img class="img-fluid mb-3" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="">

						<div class="entry-content">

							<?php the_content(); ?>

							<p class="text-sm-right">
								<a class="text-secondary text-uppercase ml-auto" href="<?php echo esc_url( $category_link ); ?>">All <?php echo $cat_name; ?></a>
							</p>

						</div><!-- .entry-content -->
					</div>
				</div>

			</article><!-- #post-## -->
		</div>
	</div>
</div>
