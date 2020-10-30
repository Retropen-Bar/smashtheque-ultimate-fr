<?php

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function smash_enqueue_custom_admin_style() {
  wp_register_style(
    'smash_wp_admin_css',
    get_stylesheet_directory_uri() . '/css/admin.css',
    false,
    '1.0.0'
  );
  wp_enqueue_style( 'smash_wp_admin_css' );
}

add_action( 'admin_enqueue_scripts', 'smash_enqueue_custom_admin_style' );

/**
 * Register and enqueue other stylesheets
 */

add_action( 'wp_enqueue_scripts', 'custom_styles' );
function custom_styles() {
  wp_register_style(
    'twentytwenty',
    get_template_directory_uri() . '/style.css'
  );
  wp_register_style(
    'smash',
    get_stylesheet_directory_uri() . '/css/style.css'
  );
  wp_register_style(
    'fullcalendar',
    get_stylesheet_directory_uri() . '/vendor/fullcalendar-5.3.2/main.css'
  );

  wp_enqueue_style( 'twentytwenty' );
  wp_enqueue_style( 'smash' );
  wp_enqueue_style( 'fullcalendar' );
}

/**
 * Register and enqueue other scripts
 */

add_action('wp_enqueue_scripts', 'custom_scripts');
function custom_scripts() {
  wp_enqueue_script(
    'fullcalendar',
    get_stylesheet_directory_uri() . '/vendor/fullcalendar-5.3.2/main.js',
    array(),
    null,
    true
  );
  wp_enqueue_script(
    'popper',
    get_stylesheet_directory_uri() . '/vendor/popper-2.5.4/popper.min.js',
    array(),
    null,
    true
  );
  wp_enqueue_script(
    'tippy',
    get_stylesheet_directory_uri() . '/vendor/tippy-6.2.7/tippy-bundle.umd.min.js',
    array('popper'),
    null,
    true
  );
}
