<?php

// register custom post types
$block_includes = [
  // base
  'lib/types/smash.php',

  // types
  'lib/types/model.php',

  'lib/types/character.php',
  'lib/types/team.php',
  'lib/types/tournament.php',
];

foreach ($block_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);
