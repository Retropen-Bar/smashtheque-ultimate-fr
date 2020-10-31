<?php

/**
**  CPT - Smash
**/

function smash_admin_page_contents() {
  ?>
  <h1>Smash data</h1>
  <?php
}

function smash_admin_menu() {
  add_menu_page(
    'Smash data',
    'Smash',
    'edit_posts',
    'smash',
    'smash_admin_page_contents',
    'dashicons-database',
    6
  );
}

add_action('admin_menu', 'smash_admin_menu');
