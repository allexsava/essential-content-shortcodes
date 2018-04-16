<?php

class AcidCodesShortcode_Settings extends AcidCodesShortcode {

    public function __construct($settings = array()) {
        $this->self_closed = false;
        $this->name = "Settings";
        $this->code = "settings";
        $this->direct = false;

        $this->params = array(
            'button_color'      => array(
                'type'        => 'select',
                'name'        => __( 'Accent Color', 'acidcodes_txtd' ),
                'options'     => array(
                    ''      => __( 'Select Color', 'acidcodes_txtd' ),
                    'red' => __( 'Red', 'acidcodes_txtd' ),
                    'pink' => __( 'Pink', 'acidcodes_txtd' ),
                    'purple' => __( 'Purple', 'acidcodes_txtd' ),
                    'deep-purple' => __( 'Deep Purple', 'acidcodes_txtd' ),
                    'indigo' => __( 'Indigo', 'acidcodes_txtd' ),
                    'blue' => __( 'Blue', 'acidcodes_txtd' ),
                    'light-blue' => __( 'Light Blue', 'acidcodes_txtd' ),
                    'teal' => __( 'Teal', 'acidcodes_txtd' ),
                    'cyan' => __( 'Cyan', 'acidcodes_txtd' ),
                    'green' => __( 'Green', 'acidcodes_txtd' ),
                    'light-green' => __( 'Light Green', 'acidcodes_txtd' ),
                    'lime' => __( 'Mile', 'acidcodes_txtd' ),
                    'yellow' => __( 'Yellow', 'acidcodes_txtd' ),
                    'amber' => __( 'Amber', 'acidcodes_txtd' ),
                    'orange' => __( 'Orange', 'acidcodes_txtd' ),
                    'deep-orange' => __( 'Deep Orange', 'acidcodes_txtd' ),
                    'brown' => __( 'Brown', 'acidcodes_txtd' ),
                    'grey' => __( 'Gray', 'acidcodes_txtd' ),
                ),
                'admin_class' => 'input-field hide-list col s6 scroll-height',
            ),
            'variation_color'      => array(
                'type'        => 'select',
                'name'        => __( 'Button Color Variation', 'acidcodes_txtd' ),
                'options'     => array(
                    ''      => __( 'Select Color', 'acidcodes_txtd' ),
                    'red' => __( 'Red', 'acidcodes_txtd' ),
                    'pink' => __( 'Pink', 'acidcodes_txtd' ),
                    'purple' => __( 'Purple', 'acidcodes_txtd' ),
                    'deep-purple' => __( 'Deep Purple', 'acidcodes_txtd' ),
                    'indigo' => __( 'Indigo', 'acidcodes_txtd' ),
                    'blue' => __( 'Blue', 'acidcodes_txtd' ),
                    'light-blue' => __( 'Light Blue', 'acidcodes_txtd' ),
                    'teal' => __( 'Teal', 'acidcodes_txtd' ),
                    'cyan' => __( 'Cyan', 'acidcodes_txtd' ),
                    'green' => __( 'Green', 'acidcodes_txtd' ),
                    'light-green' => __( 'Light Green', 'acidcodes_txtd' ),
                    'lime' => __( 'Mile', 'acidcodes_txtd' ),
                    'yellow' => __( 'Yellow', 'acidcodes_txtd' ),
                    'amber' => __( 'Amber', 'acidcodes_txtd' ),
                    'orange' => __( 'Orange', 'acidcodes_txtd' ),
                    'deep-orange' => __( 'Deep Orange', 'acidcodes_txtd' ),
                    'brown' => __( 'Brown', 'acidcodes_txtd' ),
                    'grey' => __( 'Gray', 'acidcodes_txtd' ),


                ),
                'admin_class' => 'input-field hide-list col s6 scroll-height',
            ),
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

        add_shortcode('settings', array( $this, 'add_shortcode') );
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