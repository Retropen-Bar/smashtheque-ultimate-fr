<?php

/**
 * Smash Planning Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'smash-planning-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'smash-planning';
if( !empty($block['className']) ) {
  $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
  $className .= ' align' . $block['align'];
}

$events = array_map(
  function($tournament) {
    return array(
      'title' => $tournament->post_title,
      'start' => get_field('datetime', $tournament->ID),
      'description' => $tournament->post_title,
      'url' => get_the_permalink($tournament->ID)
    );
  },
  get_posts(array(
    'posts_per_page' => -1,
    'post_type' => 'tournament'
  ))
);

?>
<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>"></div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById("<?= esc_attr($id); ?>");
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: JSON.parse('<?= json_encode($events) ?>'),
      eventDidMount: function(arg) {
        tippy(arg.el, {
          content: arg.event.extendedProps.description
        });
      }
    });
    calendar.render();
  });
</script>
