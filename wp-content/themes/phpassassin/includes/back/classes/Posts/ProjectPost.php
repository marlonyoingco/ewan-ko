<?php

class ProjectPost extends PostControl {

    protected $metabox = [
        'Project Fields' => [
            'id'         => 'project_fields',
            'title'      => 'Fields for Project',
            'pages'      => ['project'],
            'show_names' => true,
            'fields'     => [
                [ 'name' => 'Screenshot', 'id' => 'project_screenshot', 'type' => 'file' ],
                [ 'name' => 'Description', 'id' => 'project_description', 'type' => 'textarea'],
                [ 'name' => 'URL', 'id' => 'project_url', 'type' => 'text_url' ],
            ]
        ]
    ];


    public function __construct() {
        // If it's a custom posts
        $this->create_post('Project', 'project', $icon='dashicons-portfolio', false, false, $supports=['title',  'thumbnail', 'page-attributes']);

        // If its page or post but you want to add a metabox or script call the function below
        $this->fix_post_settings();
    }
}