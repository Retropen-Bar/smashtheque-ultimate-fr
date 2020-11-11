<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

if ( ! is_active_sidebar( 'sidebar-data' ) ) {
  return;
}
?>

<aside id="secondary" class="widget-area col-sm-12 col-lg-4" role="complementary">
  <?php dynamic_sidebar( 'sidebar-data' ); ?>
</aside><!-- #secondary -->
