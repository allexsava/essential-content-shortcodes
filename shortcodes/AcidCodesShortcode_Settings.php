<?php

class AcidCodesShortcode_Settings extends AcidCodesShortcode {

    public function __construct($settings = array()) {
        $this->self_closed = false;
        $this->name = "Settings";
        $this->code = "settings";
        $this->direct = false;

        $this->params = array(
            'materialize' => array(
                'type' => 'switch',
                'name' => 'Desable Materialize',
                'admin_class' => 'col s6'
            ),

            'fontawesome' => array(
                'type' => 'switch',
                'name' => 'Desable Font-Awesome',
                'admin_class' => 'col s6'
            ),
        );

        // allow the theme or other plugins to "hook" into this shortcode's params
        $this->params = apply_filters('acidcodes_filter_params_for_' . strtolower($this->name), $this->params);

        add_shortcode('quote', array( $this, 'add_shortcode') );
    }

    public function add_shortcode($atts, $content){
        extract( shortcode_atts( array(
            'materialize' => '',
            'fontqwesome' => ''
        ), $atts ) );

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