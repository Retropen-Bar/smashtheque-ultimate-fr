<?php

$lib_includes = [
  // theme
  'lib/theme.php',
  'lib/assets.php',

  // models
  'lib/types.php',
  'lib/fields.php',

  // blocks
  'lib/blocks.php',

  // APIs
  'lib/smash_gg.php'
];

foreach ($lib_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);
