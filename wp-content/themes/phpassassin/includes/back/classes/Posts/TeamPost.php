<?php

class TeamPost extends PostControl {

	protected $metabox = [
		'Team Fields' => [
			'id'         => 'team_fields',
			'title'      => 'Fields for Team',
			'pages'      => ['team'],
			'show_names' => true,
			'fields'     => [
				[ 'name' => 'Position', 'id' => 'team_position', 'type' => 'text' ],
				[ 'name' => 'Location', 'id' => 'team_location', 'type' => 'text'],
				[ 'name' => 'Facebook', 'id' => 'team_facebook', 'type' => 'text' ],
				[ 'name' => 'Linkedin', 'id' => 'team_linkedin', 'type' => 'text' ],
				[ 'name' => 'Twitter',  'id' => 'team_twitter',  'type' => 'text' ],
			]
		]
	];


	public function __construct() {
		// If it's a custom posts
        $this->create_post('Team', 'team', $icon='dashicons-universal-access', false, false, $supports=['title',  'thumbnail']);

		// If its page or post but you want to add a metabox or script call the function below
		$this->fix_post_settings();
	}
}