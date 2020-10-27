<?php

if(function_exists('acf_add_local_field_group')) {

  acf_add_local_field_group(array(
    'key' => 'group_smash_news_piece',
    'title' => 'Actualité',
    'fields' => array (
      array (
        'key' => 'field_smash_news_piece_tab_content',
        'label' => 'Contenu',
        'name' => '',
        'type' => 'tab',
      ),
      array (
        'key' => 'field_smash_news_piece_content_title',
        'label' => 'Titre',
        'name' => 'title',
        'type' => 'text',
      ),
      array (
        'key' => 'field_smash_news_piece_content_picture',
        'label' => 'Image',
        'name' => 'picture',
        'type' => 'image',
        'return_format' => 'id',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'news_piece',
        ),
      ),
    ),
  ));

}
