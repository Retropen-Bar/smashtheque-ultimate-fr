<?php

$lib_includes = [
  // theme
  'lib/theme.php',
  'lib/assets.php',

  // models
  'lib/types.php',
  'lib/fields.php',

  // blocks
  'lib/blocks.php',

  // APIs
  'lib/smash_gg.php'
];

foreach ($lib_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);




/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function smash_widgets_init() {
  register_sidebar( array(
      'name'          => esc_html__( 'Sidebar data', 'smash' ),
      'id'            => 'sidebar-data',
      'description'   => esc_html__( 'Add widgets here.', 'smash' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'smash_widgets_init' );
