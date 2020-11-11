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
$id = 'smash-characters-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'smash-characters';
if( !empty($block['className']) ) {
  $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
  $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$characters = Character::fetch_all();
?>
<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">

  <div class="cards-list characters">
    <?php
    foreach ($characters as $character) {
      $classes = ['card-container', 'smash-character-'];
      $id = 'smash-character-' . $character->id;
      ?>
      <div
        class="<?= implode(' ', $classes) ?>""
        id="<?= esc_attr($id) ?>"
      >
        <div
          class="card character shadow-sm"
          style="<?php
            if(!empty($character->background_color)) {
              echo "background-color: " . $character->background_color . ";";
            }
            if(!empty($character->background_image)) {
              echo "background-image: url('" . $character->background_image_data_url() . "');background-size: 240px;";
            }
            ?>"
        >
          <div class="card-body">
            <a href="#">
              <?= $character->emoji_image_tag() ?><br/>
              <span class="name">
                <?= ucwords($character->name) ?>
              </span>
            </a>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>

</div>
