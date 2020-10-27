<?php

function register_acf_block_planning() {
  acf_register_block_type(array(
    'name'            => 'planning',
    'title'           => __('Planning'),
    'render_template' => 'template-parts/blocks/planning/planning.php',
    'category'        => 'smash',
    'icon'            => 'calendar',
    'keywords'        => array( 'planning' ),
  ));
}

if( function_exists('acf_register_block_type') && function_exists('acf_add_local_field_group') ) {

  add_action('acf/init', 'register_acf_block_planning');

} else {
  error_log( 'Function acf_register_block_type is not available' );
}
