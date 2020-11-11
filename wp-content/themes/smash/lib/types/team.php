<?php
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

class Team extends Model {

  public $id;
  public $name;
  public $short_name;
  public $logo_url;
  public $is_offline;
  public $is_online;
  public $is_sponsor;
  public $twitter_username;

  public function logo_image_tag() {
    if(empty($this->logo_url)) {
      return null;
    }
    return "<img src=\"" . $this->logo_url . "\" class=\"avatar\"/>";
  }

  static public function from_smashtheque($data) {
    return new Team($data);
  }

  static public function from_wordpress($post) {
    $logo_url = null;
    $logo_id = get_field('logo', $post->ID);
    if(!empty($logo_id)) {
      $logo_image_src = wp_get_attachment_image_src($logo_id, 'full');
      if($logo_image_src) {
        $logo_url = $logo_image_src[0];
      }
    }
    return new Team(array(
      'id' => $post->ID,
      'name' => $post->post_title,
      'short_name' => get_field('short_name', $post->ID),
      'logo_url' => $logo_url
    ));
  }

  static public function fetch_from_wordpress() {
    $posts = get_posts(array(
      'posts_per_page' => -1,
      'post_type' => 'team'
    ));
    return array_map(array(self, 'from_wordpress'), $posts);
  }

  static public function fetch_from_smashtheque() {
    return array_map(array(self, 'from_smashtheque'), Smashtheque::get_teams());
  }

  static public function fetch_all() {
    // return self::fetch_from_wordpress();
    return self::fetch_from_smashtheque();
  }

}
