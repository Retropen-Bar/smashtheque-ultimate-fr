<?php

function register_acf_block_news_pieces() {
  acf_register_block_type(array(
    'name'            => 'news-pieces',
    'title'           => __('Actualités'),
    'render_template' => 'template-parts/blocks/news_pieces/news_pieces.php',
    'category'        => 'smash',
    'icon'            => 'smartphone',
    'keywords'        => array( 'app', 'badge' ),
  ));
}

if( function_exists('acf_register_block_type') && function_exists('acf_add_local_field_group') ) {

  add_action('acf/init', 'register_acf_block_news_pieces');

  acf_add_local_field_group(array(
    'key' => 'group_smash_news_pieces',
    'title' => 'App badge fields',
    'fields' => array(
      array(
        'key' => 'field_smash_news_pieces_title',
        'label' => 'Titre',
        'name' => 'title',
        'type' => 'text',
        'required' => 1,
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'block',
          'operator' => '==',
          'value' => 'acf/news_pieces',
        ),
      ),
    ),
  ));

} else {
  error_log( 'Function acf_register_block_type is not available' );
}
