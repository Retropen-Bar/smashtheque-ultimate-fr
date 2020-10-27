<?php

// register custom block category
function smash_block_categories( $categories, $post ) {
  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'smash',
        'title' => 'Smash'
      ),
    )
  );
}
add_filter( 'block_categories', 'smash_block_categories', 10, 2 );

// register custom blocks
$block_includes = [
  // 'lib/blocks/news_pieces.php',
  'lib/blocks/planning.php',
];

foreach ($block_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);
