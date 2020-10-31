<?php

/**
**  CPT - Team
**/

$labels = array(
  'name'               => __( 'Équipes',  'ckl' ),
  'singular_name'      => __( 'Équipe','ckl' ),
  'menu_name'          => __( 'Équipes', 'ckl' ),
  'name_admin_bar'     => __( 'Équipe', 'ckl' ),
  'add_new'            => __( 'Ajouter une équipe', 'ckl' ),
  'add_new_item'       => __( 'Ajouter une équipe', 'ckl' ),
  'new_item'           => __( 'Ajouter une équipe', 'ckl' ),
  'edit_item'          => __( 'Modifier une équipe', 'ckl' ),
  'view_item'          => __( 'Editer une équipe', 'ckl' ),
  'all_items'          => __( 'Toutes les équipes', 'ckl' ),
  'not_found'          => __( 'pas d\'équipe trouvée.', 'ckl' ),
  'not_found_in_trash' => __( 'Pas d\'équipe dans la corbeille', 'ckl' )
);

$args = array(
  'labels'             => $labels,
  'public'             => true,
  'publicly_queryable' => true,
  'show_ui'            => true,
  'show_in_menu'       => 'smash',
  'query_var'          => true,
  'rewrite'            => array( 'slug' => 'team' ),
  'capability_type'    => 'post',
  'has_archive'        => false,
  'hierarchical'       => false,
  'menu_position'      => 5,
  'supports'           => array( 'title' )
);

register_post_type( 'team', $args );
