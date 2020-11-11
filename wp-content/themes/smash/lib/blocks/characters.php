<?php

function register_acf_block_characters() {
  acf_register_block_type(array(
    'name'            => 'characters',
    'title'           => __('Characters'),
    'render_template' => 'template-parts/blocks/characters/characters.php',
    'category'        => 'smash',
    'icon'            => 'users',
    'keywords'        => array('characters'),
  ));
}

if( function_exists('acf_register_block_type') && function_exists('acf_add_local_field_group') ) {

  add_action('acf/init', 'register_acf_block_characters');

} else {
  error_log( 'Function acf_register_block_type is not available' );
}
