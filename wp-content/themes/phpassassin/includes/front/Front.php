<?php

require_once('classes/autoloader.php');

class Front {

    protected $jsPath;
    protected $cssPath;
    protected $bowerPath;
    protected $themeAction;

    public function __construct() {
        $this->generate_paths();
        $this->generate_actions();
    }

    /**
     * Generate Theme Actions + Custom Actions
     */
    private function generate_actions() {
        add_action('wp_enqueue_scripts', [$this, 'theme_scripts_and_styles']);
    }

    /**
     * Generate Links for easy access.
     */
    private function generate_paths() {
        $this->cssPath   = get_template_directory_uri().'/assets/styles/css';
        $this->jsPath    = get_template_directory_uri().'/assets/js';
        $this->bowerPath = get_template_directory_uri().'/assets/bower_components';
    }

    /**
     * Include Theme Style and Scripts.
     */
    public function theme_scripts_and_styles() {
        //Fancybox
        wp_enqueue_script('fancybox_js', "$this->bowerPath/fancyBox/source/jquery.fancybox.js");
        wp_enqueue_style('fancybox_css', "$this->bowerPath/fancyBox/source/jquery.fancybox.css");

        wp_enqueue_script('site', "$this->jsPath/site.js", ['jquery']);
        wp_enqueue_style('style', "$this->cssPath/style.css");
    }

}