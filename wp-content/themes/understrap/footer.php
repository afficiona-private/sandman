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
<?php get_template_part( 'global-templates/form-success-modal' ); ?>
<?php if ($post->post_name == 'careers') {
	get_template_part( 'global-templates/job-apply-modal' );
} ?>
<?php if ($post->post_name == 'home') {
	get_template_part( 'global-templates/youtube-modal' );
} ?>
<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-lg-2 pt-5 mb-3 mb-sm-0">
				<div class="mb-2 mb-sm-4">
					<?php the_custom_logo(); ?>
				</div>
				<a class="text-white mb-2 pt-1 mb-sm-4 d-block" href="mailto:<?php echo get_option('site_settings_email') ?>"><?php echo get_option('site_settings_email') ?></a>
				<a class="text-white pt-2 d-block" href="tel:<?php echo get_option('site_settings_contact_number') ?>"><?php echo get_option('site_settings_contact_number') ?></a>
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
				<a href="<?php echo get_option('site_settings_copyright_link') ?>" class="text-white mb-4 pt-3 d-block link-copyright">
					<?php echo get_option('site_settings_copyright') ?>
				</a>
				<div class="text-white mb-5 d-block pt-2">
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

