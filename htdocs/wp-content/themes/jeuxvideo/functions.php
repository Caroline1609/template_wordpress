<?php

function cb_add_thumbnails() {
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'cb_add_thumbnails');


function cb_menu_setup() {
    register_nav_menus([
        'menuPrincipal' => 'Mon menu'
    ]);
}

add_action('init', 'cb_menu_setup');

function cb_sidebar_setup() {
    register_sidebar([
        'id' => 'principal',
        'name' => 'Sidebar Principale',
        'before_widget' => '<div>',
        'after_widget' => '</div>'
    ]);
}

add_action('widgets_init', 'cb_sidebar_setup');
