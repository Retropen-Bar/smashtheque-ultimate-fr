<?php

function setup() {

  add_theme_support( 'responsive-embeds' );

}

add_action('after_setup_theme', 'setup');
