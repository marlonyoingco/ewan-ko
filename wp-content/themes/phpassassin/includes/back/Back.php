<?php

require_once('classes/autoloader.php');

class Back {

    protected $jsPath;
    protected $cssPath;

    public function __construct() {
        @ini_set( 'upload_max_size' , '120M' );
        @ini_set( 'post_max_size', '120M');

        $this->generate_actions();
    }

    /**
     * Generate Theme Actions + Custom Actions
     */
    private function generate_actions() {
        add_action('after_setup_theme',  [$this, 'theme_setup']);
        add_action('widgets_init', [$this, 'widgets_setup']);
    }

    /**
     * Main Theme Setup
     */
    public function theme_setup() {
        register_nav_menus([
            'header' => 'Header',
            'footer' => 'Footer'
        ]);

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(125, 125, true);
        add_theme_support('menus');
        add_theme_support('title-tag');
        add_theme_support('html5', ['search-form']);
        add_editor_style(get_template_directory_uri().'/assets/styles/css/editor-style.css');
        // add_theme_support('automatic-feed-links');
    }

    /**
     * Widgets Setup
     */
    public function widgets_setup() {
        // Register widget using Class Name
        register_widget('SampleWidget');

        $this->register_sidebar();
    }

    /**
     * Register Sidebars
     */
    public function register_sidebar() {
        register_sidebar([
            'name'          => 'Sample Sidebar',
            'id'            => 'sample_sidebar',
            'description'   => 'Sample Description'
        ]);
    }

}