<?php
$menuParameters = array(
  'menu'         => 'Social Links',
  'slug'         => 'social-links',
  'container'       => false,
  'items_wrap'      => '%3$s',
  'depth'           => 2
);
?>

<ul class="follow-links">
  <?php echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' ); ?>
</ul>