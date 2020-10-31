<?php

// register custom fields
$block_includes = [
  // global options
  'lib/fields/global.php',

  // custom post types
  // 'lib/fields/news_piece.php',
  'lib/fields/team.php',
  'lib/fields/tournament.php',
];

foreach ($block_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);
