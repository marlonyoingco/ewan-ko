<?php

class SampleWidget extends WP_Widget {

    use WidgetHelper, WidgetFieldHelper;

    protected $fields = ['title', 'description'];

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        parent::__construct('sample_widget', 'Sample Widget', ['description' => 'I am a sample widget.']);
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance) {
        ob_start();

        require_once('templates/SampleWidget/template.php');

        ob_get_contents();
        ob_end_flush();
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance) {
        $values = $this->fixInstance($instance);

        echo '<p><strong>Title</strong>';
        $this->generate_text('title', 'Title', $values['title']);
        echo '<p><strong>Description</strong></p>';
        $this->generate_text('description', 'Description', $values['description']);
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update($new_instance, $old_instance) {
        $instance = [];
        foreach($this->fields as $field) {
            $instance[$field] = (!empty($new_instance[$field])) ? $new_instance[$field] : '';
        }

        return $instance;
    }

}