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
                'admin_class' => 'col s6'
            ),
	        'markers' => array(
		        'type' => 'switch',
		        'name' => 'Markers',
		        'admin_class' => 'markers'
	        ),
	        array(
		        'type' => 'info',
		        'value' => 'You can use a simple number to represent the length in pixels or a percentage value (like 96%).',
		        'admin_class' => 'help-text span8 push1'
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
