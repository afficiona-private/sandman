<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$category = get_the_category(); 
$cat_slug = $category[0]->slug;
$featured_image_url = get_field('featured_image', $category[0])['url'];

get_header();
?>

<div class="wrapper contained-page-wrapper" id="single-wrapper" style="background-image: url('<?php echo $featured_image_url; ?>');">

	<main class="site-main" id="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'loop-templates/content', 'single' ); ?>

		<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->

</div><!-- #single-wrapper -->

<?php get_footer(); ?>
