<?php

class PagePost extends PostControl {

    protected $metabox = [
        'Additional Content' => [
            'id'         => 'additional_content',
            'title'      => 'Left Content',
            'pages'      => ['page'],
            'show_names' => true,
            'fields'     => [
                [ 'name' => 'Title',   'id' => 'additional_content_left_content',   'type' => 'wysiwyg' ],
            ]
        ],

        'Banner Content' => [
            'id'         => 'banner_content',
            'title'      => 'Contents for the Banner',
            'pages'      => ['page'],
            'show_on'    => ['key' => 'id', 'value' => [5]],
            'show_names' => true,
            'fields'     => [
                [ 'name' => 'Title',   'id' => 'banner_title',   'type' => 'text' ],
                [ 'name' => 'Content', 'id' => 'banner_content', 'type' => 'textarea'],
                [ 'name' => 'Link',    'id' => 'banner_link',    'type' => 'text' ],
            ]
        ]
    ];


    public function __construct() {
        // If it's a custom posts
//        $this->create_post('Research & Publication', 'research');

        // If its page or post but you want to add a metabox or script call the function below
        $this->fix_post_settings();
    }
}