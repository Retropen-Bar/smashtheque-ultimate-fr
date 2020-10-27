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

  wp_enqueue_style( 'twentytwenty' );
  wp_enqueue_style( 'smash' );
}
