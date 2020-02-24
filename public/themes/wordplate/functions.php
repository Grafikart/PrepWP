<?php

require('class/NavWalker.php');

add_filter('nav_menu_css_class', function (array $classes) {
    $classes[] = 'nav-item';
    return $classes;
}, 10, 4);

add_filter('nav_menu_link_attributes', function (array $args) {
    $args['class'] = 'nav-link';
    return $args;
}, 10, 5);

add_action('wp_enqueue_scripts', function () {
    wp_register_style('my-theme', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
    wp_enqueue_style('my-theme');
});

// Set theme defaults.
add_action('after_setup_theme', function () {
    // Add post thumbnails support.
    add_theme_support('post-thumbnails');

    // Add title tag theme support.
    add_theme_support('title-tag');

    // Add HTML5 theme support.
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'widgets',
    ]);

    // Register navigation menus.
    register_nav_menus([
        'navigation' => __('Navigation', 'wordplate'),
    ]);
});
