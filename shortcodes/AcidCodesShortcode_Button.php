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
                'name'        => __( 'Button Label', 'acidcodes_txtd' ),
                'admin_class' => 'col s6',
                'help-text'   => 'eg Read More',
                'required' => true,
                'is_content'  => true,
                'is_text_tooltip' => true
            ),
            'link'      => array(
                'value' => 'https://',
                'type'        => 'url',
                'name'        => __( 'Link URL', 'acidcodes_txtd' ),
                'required' => true,
                'admin_class' => 'col s6'
            ),
            'class'     => array(
                'type'        => 'text',
                'name'        => __( 'Button Class', 'acidcodes_txtd' ),
                'admin_class' => 'col s6',
                'help-text'   => 'eg btn-acid',
                'is_text_tooltip' => true

            ),
            'id'        => array(
                'type'        => 'text',
                'name'        => __( 'Button ID', 'acidcodes_txtd' ),
                'admin_class' => 'col s6',
                'help-text'   => 'eg first-btn',
                'is_text_tooltip' => true
            ),
            'label_color' => array(
                'type' => 'select',
                'name' => 'Button Label Color',
                'options' => array(
                    '' => 'Select Color',
                    'theia-color-text' => 'Theia Color',
                    'red-text' => 'Red',
                    'pink-text' => 'Pink',
                    'purple-text' => 'Purple',
                    'deep-purple-text' => 'Deep Purple',
                    'indigo-text' => 'Indigo',
                    'blue-text' => 'Blue',
                    'light-blue-text' => 'Light Blue',
                    'cyan-text' => 'Cyan',
                    'teal-text' => 'Teal',
                    'green-text' => 'Green',
                    'light-green-text' => 'Light Green',
                    'lime-text' => 'Lime',
                    'yellow-text' => 'Yellow',
                    'amber-text' => 'Amber',
                    'orange-text' => 'Orange',
                    'deep-orange-text' => 'Deep Orange',
                    'brown-text' => 'Brown',
                    'grey-text' => 'Grey',
                    'blue-grey-text' => 'Blue Gray',
                    'black-text' => 'Black',
                ),
                'admin_class' => 'input-field hide-list col s6 scroll-height'
            ),
            'background_color' => array(
                'type' => 'select',
                'name' => 'Background Color',
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
                    'blue-grey' => 'Blue Gray',
                    'black' => 'Black',
                    'white' => 'White',
                ),
                'admin_class' => 'input-field hide-list col s6 scroll-height'
            ),
            'hover_color' => array(
                'type' => 'select',
                'name' => 'Hover Color',
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
                    'blue-grey' => 'Blue Gray',
                    'black' => 'Black',
                    'white' => 'White',
                ),
                'admin_class' => 'input-field hide-list col s6 scroll-height'
            ),
            'size'      => array(
                'type'        => 'select',
                'name'        => __( 'Button Size', 'acidcodes_txtd' ),
                'options'     => array(
                    '' => 'Select Size',
                    'small' => __( 'Small', 'acidcodes_txtd' ),
                    'medium' =>__( 'Medium', 'acidcodes_txtd' ),
                    'large' => __( 'Large', 'acidcodes_txtd' ),
                    'huge'  => __( 'Huge', 'acidcodes_txtd' )
                ),
                'admin_class' => 'input-field hide-list col s6',
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
                'required' => true
            ),
            'shape'      => array(
                'type'        => 'select',
                    'name'        => __( 'Button Shape', 'acidcodes_txtd' ),
                'options'     => array(
                    ''      => __( 'Select Shape', 'acidcodes_txtd' ),
                    'square' => __( 'Square', 'acidcodes_txtd' ),
                    'rounded' => __( 'Rounded', 'acidcodes_txtd' ),
                    'pill' => __( 'Pill', 'acidcodes_txtd' ),
                    'outline' => __( 'Outline', 'acidcodes_txtd' )
                ),
                'admin_class' => 'input-field hide-list col s6 scroll-height',
                'required' => true,
                'tooltip'  => true,
                'tooltip-position' => 'left'
            ),
            'effect'      => array(
                'type'        => 'select',
                'name'        => __( 'Button Effect', 'acidcodes_txtd' ),
                'options'     => array(
                    '' => 'Select Effect',
                    'no-effect' =>__( 'No effect', 'acidcodes_txtd' ),
                    'pulse' => __( 'Pulse effect', 'acidcodes_txtd' ),
                    'waves-effect' => __( 'Waves effect', 'acidcodes_txtd' ),
                ),
                'admin_class' => 'input-field hide-list col s6 button_effect scroll-height-separator',
                'tooltip'  => true,
                'tooltip-position' => 'right'
            ),
            'newtab'    => array(
                'type'        => 'switch',
                'name'        => __( 'Open in a new tab?', 'acidcodes_txtd' ),
                'admin_class' => 'col s6 acidcode__newtab'
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
                'admin_class' => 'input-field hide-list col s6 scroll-height-button hidden tm-color acidcode__waves-color',
            )
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