<?php

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

class AcidCodesShortcode_Button extends AcidCodesShortcode {

    public function __construct( $settings = array() ) {
        $this->self_closed = false;
        $this->name        = __( "Button", 'acidcodes_txtd' );
        $this->code        = "button";
        $this->icon        = "fas fa-toggle-on";
        $this->direct      = false;
        $this->one_line    = true;

        $this->params = array(
            'label'     => array(
                'type'        => 'text',
                'name'        => __( 'Button Name', 'acidcodes_txtd' ),
                'admin_class' => 'col s6',
                'help-text'   => 'eg Read More',
                'is_content'  => true,
            ),
            'class'     => array(
                'type'        => 'text',
                'name'        => __( 'Button Class', 'acidcodes_txtd' ),
                'admin_class' => 'col s6',
                'help-text'   => 'eg .btn-acid'
            ),
            'link'      => array(
                'value'       => 'http://',
                'type'        => 'text',
                'name'        => __( 'Link URL', 'acidcodes_txtd' ),
                'admin_class' => 'col s6'
            ),

            'id'        => array(
                'type'        => 'text',
                'name'        => __( 'Button ID', 'acidcodes_txtd' ),
                'admin_class' => 'col s6',
                'help-text'   => 'eg #first-btn'
            ),
            'size'      => array(
                'type'        => 'select',
                'name'        => __( 'Button Size', 'acidcodes_txtd' ),
                'options'     => array(
                    '' => 'Select Size',
                    'small' => __( 'Small', 'acidcodes_txtd' ),
                    'large' => __( 'Large', 'acidcodes_txtd' ),
                    'huge'  => __( 'Huge', 'acidcodes_txtd' )
                ),
                'admin_class' => 'input-field hide-list col s6',
                'help-text'   => 'eg small, large, huge'
            ),
            'shape'      => array(
                'type'        => 'select',
                    'name'        => __( 'Button Shape', 'acidcodes_txtd' ),
                'options'     => array(
                    ''      => __( 'Select Shape', 'acidcodes_txtd' ),
                    'square' => __( 'Square', 'acidcodes_txtd' ),
                    'rounded' => __( 'Rounded', 'acidcodes_txtd' )
                ),
                'admin_class' => 'input-field hide-list col s6',
                'help-text'        => 'eg square, rounded'
            ),
            'waves_color'      => array(
                'type'        => 'select',
                'name'        => __( 'Waves Color', 'acidcodes_txtd' ),
                'options'     => array(
                    ''      => __( 'Select Color', 'acidcodes_txtd' ),
                    'waves-light' => __( 'Light', 'acidcodes_txtd' ),
                    'waves-red' => __( 'Red', 'acidcodes_txtd' ),
                    'waves-yellow' => __( 'Yellow', 'acidcodes_txtd' ),
                    'waves-orange' => __( 'Orange', 'acidcodes_txtd' ),
                    'waves-purple' => __( 'Purple', 'acidcodes_txtd' ),
                    'waves-green' => __( 'Green', 'acidcodes_txtd' ),
                    'waves-teal' => __( 'Teal', 'acidcodes_txtd' )
                ),
                'admin_class' => 'input-field hide-list col s6'
            ),
            'waves_effect'    => array(
                'type'        => 'switch',
                'name'        => __( 'Waves effect', 'acidcodes_txtd' ),
                'admin_class' => 'col s6',
            ),
            'newtab'    => array(
                'type'        => 'switch',
                'name'        => __( 'Open in a new tab?', 'acidcodes_txtd' ),
                'admin_class' => 'col s6'
            ),
        );

        // allow the theme or other plugins to "hook" into this shortcode's params
        $this->params = apply_filters( 'acidcodes_filter_params_for_' . strtolower( $this->name ), $this->params );

        add_shortcode( 'button', array( $this, 'add_shortcode' ) );
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
        $located = locate_template( "templates/shortcodes/{$this->code}.php", false, false );
        if ( ! $located ) {
            $located = dirname( __FILE__ ) . '/templates/' . $this->code . '.php';
        }
        // load it
        ob_start();
        require $located;

        return ob_get_clean();
    }
}