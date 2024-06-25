<?php

function post_type_bp(string $name, string $plural, string $slug, $labelsArg = [], $argS = [])
{
    //PROPERTY TYPES
    $labels = array(
        'name'               => _x($name, 'post type general name', 'gws-rennel'),
        'singular_name'      => _x($name, 'post type singular name', 'gws-rennel'),
        'menu_name'          => _x($name, 'admin menu', 'gws-rennel'),
        'name_admin_bar'     => _x($name, 'add new on admin bar', 'gws-rennel'),
        'add_new'            => _x('Add New', $name, 'gws-rennel'),
        'add_new_item'       => __('Add New ' . $name, 'gws-rennel'),
        'new_item'           => __('New ' . $name, 'gws-rennel'),
        'edit_item'          => __('Edit ' . $name, 'gws-rennel'),
        'view_item'          => __('View ' . $name, 'gws-rennel'),
        'all_items'          => __('All ' . $plural, 'gws-rennel'),
        'search_items'       => __('Search ' . $plural, 'gws-rennel'),
        'parent_item_colon'  => __('Parent : . $plural', 'gws-rennel'),
        'not_found'          => __('No ' . $plural . ' found.', 'gws-rennel'),
        'not_found_in_trash' => __('No ' . $plural . ' found in Trash.', 'gws-rennel')
    );

    if (!empty($labelsArg)) {
        $labels = $labelsArg + $labels;
    }

    $args = array(
        'labels'             => $labels,
        'description'        => __('Description.', 'gws-rennel'),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => $slug),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => false,
        'supports'           => ['title', 'author', 'editor', 'revisions', 'excerpt', 'thumbnail']
    );

    if (!empty($argS)) {
        $args = $argS + $args;
    }

    register_post_type($slug, $args);
}

function taxonomy_registration_bp(string $name, string $slug, array $objects, $labelArgs = [], $argS = [])
{
    if (taxonomy_exists($slug)) {
        foreach ($objects as $o) {
            register_taxonomy_for_object_type($slug, $o);
        }
    } else {
        $labels = array(
            'name'                       => _x($name, 'taxonomy general name', 'gws-rennel'),
            'singular_name'              => _x($name, 'taxonomy singular name', 'gws-rennel'),
            'search_items'               => __('Search ' . $$name, 'gws-rennel'),
            'edit_item'                  => __('Edit ' . $name, 'gws-rennel'),
            'update_item'                => __('Update ' . $name, 'gws-rennel'),
            'add_new_item'               => __('Add New ' . $name, 'gws-rennel'),
            'new_item_name'              => __('New ' . $name, 'gws-rennel'),
            'separate_items_with_commas' => __('Separate ' . $name . ' with commas', 'gws-rennel'),
            'add_or_remove_items'        => __('Add or remove ' . $name, 'gws-rennel'),
            'choose_from_most_used'      => __('Choose from the most used ' . $name, 'gws-rennel'),
            'not_found'                  => __('No ' . $name . ' found.', 'gws-rennel'),
            'menu_name'                  => __($name, 'gws-rennel'),
        );

        if (!empty($labelArgs)) {
            $labels = $labelArgs + $labels;
        }

        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'query_var'             => true,
            'rewrite'               => array('slug' => $slug),
        );

        if (!empty($argS)) {
            $args = $argS + $args;
        }

        register_taxonomy($slug, $objects, $args);
    }
}
