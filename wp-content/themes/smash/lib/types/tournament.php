<?php

/**
**  CPT - Tournament
**/

$labels = array(
  'name'               => __( 'Tournois',  'ckl' ),
  'singular_name'      => __( 'Tournoi','ckl' ),
  'menu_name'          => __( 'Tournois', 'ckl' ),
  'name_admin_bar'     => __( 'Tournoi', 'ckl' ),
  'add_new'            => __( 'Ajouter un tournoi', 'ckl' ),
  'add_new_item'       => __( 'Ajouter un tournoi', 'ckl' ),
  'new_item'           => __( 'Ajouter un tournoi', 'ckl' ),
  'edit_item'          => __( 'Modifier un tournoi', 'ckl' ),
  'view_item'          => __( 'Editer un tournoi', 'ckl' ),
  'all_items'          => __( 'Tous les tournois', 'ckl' ),
  'not_found'          => __( 'pas de tournoi trouvé.', 'ckl' ),
  'not_found_in_trash' => __( 'Pas de tournoi dans la corbeille', 'ckl' )
);

$args = array(
  'labels'             => $labels,
  'public'             => true,
  'publicly_queryable' => true,
  'show_ui'            => true,
  'show_in_menu'       => true,
  'query_var'          => true,
  'rewrite'            => array( 'slug' => 'tournament' ),
  'capability_type'    => 'post',
  'has_archive'        => false,
  'hierarchical'       => false,
  'menu_position'      => 5,
  'supports'           => array( 'title' )
);

register_post_type( 'tournament', $args );
