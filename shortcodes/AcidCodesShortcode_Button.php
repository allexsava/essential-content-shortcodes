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
                'required' => true,
                'is_content'  => true
            ),
            'class'     => array(
                'type'        => 'text',
                'name'        => __( 'Button Class', 'acidcodes_txtd' ),
                'admin_class' => 'col s6',
                'help-text'   => 'eg btn-acid'

            ),
            'link'      => array(
                'value' => 'https://',
                'type'        => 'url',
                'name'        => __( 'Link URL', 'acidcodes_txtd' ),
                'required' => true,
                'admin_class' => 'col s6'
            ),

            'id'        => array(
                'type'        => 'text',
                'name'        => __( 'Button ID', 'acidcodes_txtd' ),
                'admin_class' => 'col s6',
                'help-text'   => 'eg first-btn'
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
                'help-text'   => 'eg small, large, huge',
                'required' => true
            ),
            'alignment'      => array(
                'type'        => 'select',
                'name'        => __( 'Button Alignment', 'acidcodes_txtd' ),
                'options'     => array(
                    '' => 'Select Alignment',
                    'no-alignment' => __( 'No alignment', 'acidcodes_txtd' ),
                    'left' => __( 'Left', 'acidcodes_txtd' ),
                    'center'  => __( 'Center', 'acidcodes_txtd' ),
                    'right'  => __( 'Right', 'acidcodes_txtd' )
                ),
                'admin_class' => 'input-field hide-list col s6',
                'help-text'   => 'eg small, large, huge',
                'required' => true
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
                'help-text'        => 'eg square, rounded',
                'required' => true
            ),
            'waves_color'      => array(
                'type'        => 'select',
                'name'        => __( 'Waves Color', 'acidcodes_txtd' ),
                'options'     => array(
                    ''      => __( 'Select Color', 'acidcodes_txtd' ),
                    'no-color' => __( 'No color', 'acidcodes_txtd' ),
                    'waves-light' => __( 'Light', 'acidcodes_txtd' ),
                    'waves-red' => __( 'Red', 'acidcodes_txtd' ),
                    'waves-yellow' => __( 'Yellow', 'acidcodes_txtd' ),
                    'waves-orange' => __( 'Orange', 'acidcodes_txtd' ),
                    'waves-purple' => __( 'Purple', 'acidcodes_txtd' ),
                    'waves-green' => __( 'Green', 'acidcodes_txtd' ),
                    'waves-teal' => __( 'Teal', 'acidcodes_txtd' ),

                ),
                'help-text'        => 'eg orange, purple',
                'admin_class' => 'input-field hide-list col s6 scroll-height waves__color',
            ),
            'button_color'      => array(
                'type'        => 'select',
                'name'        => __( 'Button Color', 'acidcodes_txtd' ),
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
            'waves_effect'    => array(
                'type'        => 'switch',
                'name'        => __( 'Waves effect', 'acidcodes_txtd' ),
                'admin_class' => 'col s6 shame-margin waves__effect',
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