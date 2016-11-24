<?php

	class ThemeSettings {
		public function __construct(){
			add_action("admin_menu", array($this,"menus"));
			add_action('admin_init', array($this,'options'));
		}

		public function menus(){
			add_menu_page('globalfields',
						  'Global Fields',
						  'manage_options',
				          'global_fields',
				          [$this, 'index']);
		}

		public function options(){
			register_setting('theme_group','theme_settings');
		}

		public function index(){
			require_once __DIR__.'/templates/index.php';
		}
	}

	$themeSettings = new ThemeSettings();