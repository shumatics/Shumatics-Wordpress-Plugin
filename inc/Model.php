<?php

class Model
{
    public static $post_type = '';

    function __construct()
    {
        add_action('init', [$this, 'post_type_registration']);
        add_action('init', [$this, 'taxonomy_registration']);
    }


    function post_type_registration()
    {
    }

    function taxonomy_registration()
    {
    }
}
