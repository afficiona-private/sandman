<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

wp_nav_menu(
	array(
		'container_class' => 'collapse navbar-collapse',
		'container_id'    => 'navbarNavDropdown',
		'menu_class'      => 'navbar-nav ml-auto',
		'fallback_cb'     => '',
		'menu_id'         => 'footer-menu-block-1',
		'depth'           => 2,
		'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
	)
);
?>

<?php get_template_part( 'global-templates/login-modal' ); ?>
<?php get_template_part( 'global-templates/demo-success-modal' ); ?>
<?php if ($post->post_name == 'careers') {
	get_template_part( 'global-templates/job-apply-modal' );
} ?>
<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-lg-2 pt-5 mb-3 mb-sm-0">
				<a class="mb-3 mb-sm-5 d-block" href=""><img class="img-fluid" src="http://localhost:8888/wordpress/wp-content/uploads/2020/04/logo.png" alt=""></a>
				<a class="text-white mb-2 mb-sm-5 d-block" href="mailto:info@sandman.co.in">info@sandman.co.in</a>
				<a class="text-white" href="">+91 9860486663</a>
			</div>

			<?php
				foreach([1, 2, 3, 4] as $index) {
					$container_class = 'col-6 col-sm-4 col-md-3 col-lg-2 pt-2 pt-sm-5';
					if ($index == 1) {
						$container_class .= ' offset-md-1 offset-lg-0';
					}
					wp_nav_menu(
						array(
							'fallback_cb'     => '',
							'menu'         => 'Footer Menu Block ' . $index,
							'menu_class'      => 'footer-menu',
							'depth'           => 2,
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'container'       => 'div',
							'container_class'       => $container_class
						)
					);
				}
			?>
			<div class="col-8 col-sm-6 col-md-4 col-lg-2 pt-5">
				<p class="text-white">MPM Infosoft Pvt Ltd © 2020</p>
				<div class="text-white mb-5 d-block" href="">
					Follow us
					<?php get_template_part( 'global-templates/follow' ); ?>
				</div>
			</div>
			
		</div>
	</div>
</footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

