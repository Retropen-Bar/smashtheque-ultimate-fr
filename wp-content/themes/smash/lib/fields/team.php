<?php

if(function_exists('acf_add_local_field_group')) {

  acf_add_local_field_group(array(
    'key' => 'group_smash_team',
    'title' => 'Tournoi',
    'fields' => array (
      array (
        'key' => 'field_smash_team_short_name',
        'label' => 'Nom court',
        'name' => 'short_name',
        'type' => 'text',
      ),
      array(
        'key' => 'field_smash_team_logo',
        'label' => 'Logo',
        'name' => 'logo',
        'type' => 'image',
        'return_format' => 'id',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'team',
        ),
      ),
    ),
  ));

}
