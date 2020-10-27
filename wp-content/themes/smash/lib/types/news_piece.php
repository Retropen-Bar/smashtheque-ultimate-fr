<?php

/**
**  CPT - etude de cas
**/

$labels = array(
  'name'               => __( 'Actualités',  'ckl' ),
  'singular_name'      => __( 'Actualité','ckl' ),
  'menu_name'          => __( 'Actualités', 'ckl' ),
  'name_admin_bar'     => __( 'Actualité', 'ckl' ),
  'add_new'            => __( 'Ajouter une actualité', 'ckl' ),
  'add_new_item'       => __( 'Ajouter une actualité', 'ckl' ),
  'new_item'           => __( 'Ajouter une actualité', 'ckl' ),
  'edit_item'          => __( 'Modifier une actualité', 'ckl' ),
  'view_item'          => __( 'Editer une actualité', 'ckl' ),
  'all_items'          => __( 'Toutes les actualités', 'ckl' ),
  'not_found'          => __( 'pas d\'actualité trouvée.', 'ckl' ),
  'not_found_in_trash' => __( 'Pas d\'actualité dans la corbeille', 'ckl' )
);

$args = array(
  'labels'             => $labels,
  'public'             => true,
  'publicly_queryable' => true,
  'show_ui'            => true,
  'show_in_menu'       => true,
  'query_var'          => true,
  'rewrite'            => array( 'slug' => 'news-piece' ),
  'capability_type'    => 'post',
  'has_archive'        => false,
  'hierarchical'       => false,
  'menu_position'      => 5,
  'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
);

register_post_type( 'news_piece', $args );
