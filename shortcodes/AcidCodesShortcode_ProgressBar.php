<?php

if (!defined('ABSPATH')) die('-1');

class AcidCodesShortcode_ProgressBar extends AcidCodesShortcode {

    public function __construct($settings = array()) {
        $this->self_closed = true;
        $this->name = "Progress Bar";
        $this->code = "bar";
        $this->icon = "fas fa-percent";
        $this->direct = false;

        $this->params = array(
            'title' => array(
                'type' => 'text',
                'name' => 'Title',
                'required' => true,
                'admin_class' => 'col s6'
            ),
            'progress' => array(
                'type' => 'text',
                'name' => 'Progress',
                'required' => true,
                'admin_class' => 'col s6',
                'help-text'   => 'eg 96%, 100px',
                'is_text_tooltip' => true
            ),
            'progress_color' => array(
                'type' => 'select',
                'name' => 'Brogress Bar Color',
                'options' => array(
                    '' => 'Select Color',
                    'theia-color' => 'Theia Color',
                    'red' => 'Red',
                    'pink' => 'Pink',
                    'purple' => 'Purple',
                    'deep-purple' => 'Deep Purple',
                    'indigo' => 'Indigo',
                    'blue' => 'Blue',
                    'light-blue' => 'Light Blue',
                    'cyan' => 'Cyan',
                    'teal' => 'Teal',
                    'green' => 'Green',
                    'light-green' => 'Light Green',
                    'lime' => 'Lime',
                    'yellow' => 'Yellow',
                    'amber' => 'Amber',
                    'orange' => 'Orange',
                    'deep-orange' => 'Deep Orange',
                    'brown' => 'Brown',
                    'grey' => 'Grey',
                    'blue-grey' => 'Blue Grey',
                    'black' => 'Black',
                ),
                'admin_class' => 'input-field hide-list col s6 scroll-height',
                'required' => true,
            ),
	        'markers' => array(
		        'type' => 'switch',
		        'name' => 'Markers',
		        'admin_class' => 'col s6 markers',
                'tooltip'  => true,
                'tooltip-position' => 'left'
	        )
        );

	    // allow the theme or other plugins to "hook" into this shortcode's params
	    $this->params = apply_filters('acidcodes_filter_params_for_' . strtolower($this->name), $this->params);

        add_shortcode('bar', array( $this, 'add_shortcode') );
    }

    public function add_shortcode( $atts, $content ) {
        //create an array with only the registered params - dynamic since we filter them and have no way of knowing for sure
        $extract_params = array();
        if ( isset( $this->params ) ) {
            foreach ( $this->params as $key => $value ) {
                $extract_params[ $key ] = '';
            }
        }
        extract( shortcode_atts( $extract_params, $atts ) );

	    /**
	     * Template localization between plugin and theme
	     */
	    $located = locate_template("templates/shortcodes/{$this->code}.php", false, false);
	    if(!$located) {
		    $located = dirname(__FILE__).'/templates/'.$this->code.'.php';
	    }
	    // load it
	    ob_start();
	    require $located;
	    return ob_get_clean();
    }
}
