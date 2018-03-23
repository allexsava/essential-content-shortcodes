<?php

if (!defined('ABSPATH')) {
    die('-1');
}

class AcidCodesShortcode_Separator extends AcidCodesShortcode
{

    public function __construct($settings = array())
    {
        $this->self_closed = true;
        $this->name = "Separator";
        $this->code = "hr";
        $this->icon = "fas fa-minus-square";
        $this->direct = false;

        $this->direct = apply_filters('acidcodes_filter_direct_for_' . strtolower($this->name), $this->direct);

        $this->params = array(
            'align' => array(
                'type' => 'select',
                'name' => 'Alignment',
                'options' => array(
                    '' => 'Select Alignment',
                    'no-alignment' => 'No Alignment',
                    'center' => 'Center',
                    'left' => 'Left',
                    'right' => 'Right'
                ),
                'required' => true,
                'admin_class' => 'input-field hide-list col s6',
                'help-text'   => 'eg center, left, right'
            ),
            'style' => array(
                'type' => 'select',
                'name' => 'Style',
                'options' => array(
                    '' => 'Select Style',
                    'regular' => 'Regular',
                    'double' => 'Double',
                    'dotted' => 'Dotted',
                    'striped' => 'Striped'
                ),
                'required' => true,
                'admin_class' => 'scroll-height input-field hide-list col s6',
                'help-text'   => 'eg regular, dotted, striped'
            ),
            'weight' => array(
                'type' => 'select',
                'name' => 'Weight',
                'options' => array(
                    '' => 'Select Weight',
                    'thin' => 'Thin',
                    'thick' => 'Thick'
                ),
                'required' => true,
                'admin_class' => 'input-field hide-list col s6',
                'help-text'   => 'eg thin, thick'
            ),
            'color' => array(
                'type' => 'select',
                'name' => 'Color',
                'options' => array(
                    '' => 'Select Color',
                    'no-color' =>'No color',
                    'light' => 'Light',
                    'red' => 'Red',
                    'yellow' => 'Yellow',
                    'orange' => 'Orange',
                    'purple' => 'Purple',
                    'green' => 'Green',
                    'teal' => 'Teal'
                ),
                'required' => true,
                'admin_class' => 'scroll-height input-field hide-list col s6',
                'help-text'   => 'eg dark, light, color'
            )
        );

        // allow the theme or other plugins to "hook" into this shortcode's params
        $this->params = apply_filters('acidcodes_filter_params_for_' . strtolower($this->name), $this->params);

        add_shortcode('hr', array($this, 'add_shortcode'));
    }

    public function add_shortcode($atts, $content)
    {
        //create an array with only the registered params - dynamic since we filter them and have no way of knowing for sure
        $extract_params = array();
        if (isset($this->params)) {
            foreach ($this->params as $key => $value) {
                $extract_params[$key] = '';
            }
        }
        extract(shortcode_atts($extract_params, $atts));

        /**
         * Template localization between plugin and theme
         */
        $located = locate_template("templates/shortcodes/{$this->code}.php", false, false);
        if (!$located) {
            $located = dirname(__FILE__) . '/templates/' . $this->code . '.php';
        }
        // load it
        ob_start();
        require $located;

        return ob_get_clean();
    }
}
