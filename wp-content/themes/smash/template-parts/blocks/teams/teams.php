<?php

/**
 * Smash Teams Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'smash-teams-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'smash-teams';
if( !empty($block['className']) ) {
  $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
  $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$teams = get_posts(array(
  'posts_per_page' => -1,
  'post_type' => 'team'
));

?>
<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Nom court</th>
        <th scope="col">Nom</th>
        <th scope="col">Logo</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($teams as $team) {
        $classes = ['smash-team-'];
        $item_id = 'smash-team-' . $team->ID;
        $name = $team->post_title;
        $short_name = get_field('logo', $team);
        $logo = get_field('logo', $team->ID);
        ?>
        <tr
          scope="row"
          class="<?= implode(' ', $classes) ?>""
          id="<?= esc_attr($item_id) ?>"
        >
          <th scope="row"><?= $short_name ?></th>
          <td><?= $name ?></td>
          <td><?= wp_get_attachment_image($logo, 'full'); ?></td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>

</div>
