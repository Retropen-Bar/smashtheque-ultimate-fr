<?php

if(function_exists('acf_add_local_field_group')) {

  acf_add_local_field_group(array(
    'key' => 'group_smash_tournament',
    'title' => 'Tournoi',
    'fields' => array (
      array (
        'key' => 'field_smash_tournament_smashgg',
        'label' => 'Lien smash.gg',
        'name' => 'smashgg',
        'type' => 'url',
      ),
      array(
        'key' => 'field_smash_tournament_datetime',
        'label' => 'Date et heure',
        'name' => 'datetime',
        'type' => 'date_time_picker',
        'required' => 1,
        // 'conditional_logic' => 0,
        // 'wrapper' => array(
        //   'width' => '',
        //   'class' => '',
        //   'id' => '',
        // ),
        // 'display_format' => 'd/m/Y g:i a',
        'return_format' => 'Y-m-d\TH:i:sO',
        // 'first_day' => 1,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'tournament',
        ),
      ),
    ),
  ));

}
