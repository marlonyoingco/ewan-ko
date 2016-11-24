<?php

abstract class PostControl {

    protected $postType = '';
    protected $metabox  = false;

    /*
     |--------------------------------------------------------------------------------------------------------------------
     | GENERATE THE CUSTOM POST
     |   For possible $supports please refer here https://codex.wordpress.org/Function_Reference/post_type_supports.
     |--------------------------------------------------------------------------------------------------------------------
    */
    public function create_post($name, $slug, $icon='dashicons-admin-post', $taxonomy = false, $exclude = false, $supports=['title',  'thumbnail', 'editor', 'page-attributes']) {

        $this->postType = $slug;

        $labels = array(
            'name'               => "{$name}s",
            'singular_name'      => "{$name}",
            'menu_name'          => "{$name}s",
            'name_admin_bar'     => "{$name}",
            'add_new'            => "Add New",
            'add_new_item'       => "Add New {$name}",
            'new_item'           => "New {$name}",
            'edit_item'          => "Edit {$name}",
            'view_item'          => "View {$name}",
            'all_items'          => "All {$name}s",
            'search_items'       => "Search {$name}s",
            'parent_item_colon'  => "Parent {$name}s:",
            'not_found'          => "No {$name}s found.",
            'not_found_in_trash' => "No {$name}s found in Trash"
        );

        $args = array(
            'labels'             => $labels,
            'menu_icon'          => $icon,
            'public'             => false,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => $slug ),
            'capability_type'    => 'page',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'exclude_from_search'=> $exclude,
            'supports'           => $supports
        );

        register_post_type($slug, $args);

        if($taxonomy) {
            $this->create_taxonomy($slug, $name);
        }

        $this->fix_post_settings();
    }

    public function register_custom($slug, $args) {
        register_post_type($slug, $args);
    }

    /*
    |--------------------------------------------------------------------------------------------------------------------
    | CUSTOM POST TAXONOMY
    |   creates the categories of the custom post
    |--------------------------------------------------------------------------------------------------------------------
     */
    public function create_taxonomy($postTypeSlug, $name) {
        $single = $name.' Category';
        $plural = $name.' Categories';
        $slug   = $postTypeSlug.'-category';


        // Add new taxonomy, make it hierarchical (like categories)
        $labels = array(
            'name'              => "{$plural}s",
            'singular_name'     => "{$single}",
            'search_items'      => "Search {$plural}",
            'all_items'         => "All {$plural}",
            'parent_item'       => "Parent {$single}",
            'parent_item_colon' => "Parent {$single}:",
            'edit_item'         => "Edit {$single}",
            'update_item'       => "Update {$single}",
            'add_new_item'      => "Add New {$single}",
            'new_item_name'     => "New {$single} Name",
            'menu_name'         => $single
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => $slug],
        );

        register_taxonomy($slug, $postTypeSlug, $args);
    }

    /*
    |--------------------------------------------------------------------------------------------------------------------
    | CUSTOM POST HELPERS
    |   configure meta box
    |   configure custom post styles
    |--------------------------------------------------------------------------------------------------------------------
    */
    public function fix_post_settings() {
        /**
         * Generate Meta Box
         */
        if($this->metabox) {
            $this->create_metabox();
        }

        if(method_exists($this, 'post_scripts')) {
            if((isset($_GET['post_type']) && $_GET['post_type'] == $this->postType) || (isset($_GET['post']) && get_post_type($_GET['post']) == $this->postType)) {
                add_action('admin_enqueue_scripts', [$this, 'post_scripts']);
            }
        }
    }

    /*
    |--------------------------------------------------------------------------------------------------------------------
    | GENERATES META BOX
    |--------------------------------------------------------------------------------------------------------------------
    */
    public function create_metabox() {
        add_action('init', [$this, 'intialize_metabox'], 9999);
    }

    public function intialize_metabox() {
        require_once 'CustomMetaBox/init.php';

        foreach($this->metabox as $metabox) {
            new cmb_Meta_Box($metabox);
        }
    }

}