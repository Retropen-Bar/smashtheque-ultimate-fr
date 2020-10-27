<?php

if(function_exists('acf_add_local_field_group')) {

  acf_add_options_page(array(
    'page_title'  => 'Paramètres du thème',
    'menu_title'  => 'Paramètres du thème',
    'menu_slug'   => 'smash',
    'redirect'    => false
  ));
  acf_add_local_field_group(array (
    'key' => 'group_smash_global',
    'title' => 'Options principales',
    'fields' => array (

      // global fields

    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'smash',
        ),
      ),
    ),
  ));

}
