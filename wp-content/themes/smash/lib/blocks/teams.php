<?php

function register_acf_block_teams() {
  acf_register_block_type(array(
    'name'            => 'teams',
    'title'           => __('Teams'),
    'render_template' => 'template-parts/blocks/teams/teams.php',
    'category'        => 'smash',
    'icon'            => 'users',
    'keywords'        => array('teams'),
  ));
}

if( function_exists('acf_register_block_type') && function_exists('acf_add_local_field_group') ) {

  add_action('acf/init', 'register_acf_block_teams');

} else {
  error_log( 'Function acf_register_block_type is not available' );
}
