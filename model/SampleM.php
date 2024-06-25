<?php

class SampleM extends Model
{

    public static $post_type = "sample";

    function __construct()
    {
        parent::__construct();
    }

    function post_type_registration()
    {
        post_type_bp(
            'Company',
            'Companies',
            self::$post_type,
            [],
            [
                'has_archive' => false,
                'supports' => ['title', 'editor', 'thumbnail', 'excerpt']
            ],
        );
    }

    function taxonomy_registration()
    {
        taxonomy_registration_bp(
            'Object Type',
            'object_type',
            [self::$post_type],
        );
    }
}

new SampleM;
