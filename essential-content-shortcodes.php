<?php
/*
Plugin Name: Essential Content Shortcodes
Plugin URI:
Description: WordPress shortcodes plugin everywhere. Loaded with shortcodes, awesomeness and more.
Version: 1.0.0
Author: Acid Studios
Author URI: http://acidstudios.ro
Author Email: contact@acidstudios.ro
*/

if (!defined('ABSPATH')) {
    die('-1');
}

class AcidCodesShortcodes
{

    protected $loader;
    protected $version;
    protected $acidcodes;
    protected static $plugin_dir;
    public $plugin_url;

    function __construct()
    {
        self::$plugin_dir = dirname(plugin_basename(__FILE__));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__) . '/plugin.php');

        add_action('admin_init', array($this, 'acidcodes_init_plugin'));
        // Register admin styles and scripts
        add_action('mce_buttons_2', array($this, 'register_admin_assets'));

        //hack
        $this->acidcodes = 'acidcodes';
        $this->version = '1.0.0';

        $this->load_dependencies();
        $this->define_public_hooks();

        // Run our plugin along with wordpress init
        add_action('init', array($this, 'create_acidcodes_shortcodes'));

        add_filter('the_content', array($this, 'acidcodes_remove_spaces_around_shortcodes'));

        // ajax load for modal
        if (is_admin()) {
            add_action('wp_ajax_acidcodes_get_shortcodes_modal', array($this, 'acidcodes_get_shortcodes_modal'));
        }

        //prevent certain shortcodes from getting their content texturized
        add_filter('no_texturize_shortcodes', array($this, 'acidcodes_shortcodes_to_exempt_from_wptexturize'));

    } // end constructor

    private function load_dependencies()
    {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'essential-content-shortcodes/includes/class-acidcodes-loader.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'essential-content-shortcodes/includes/class-acidcodes-public.php';

        $this->loader = new AcidCodesShortcodes_Loader();

    }

    public function acidcodes_init_plugin()
    {
        $this->plugin_textdomain();
        $this->add_acidcodes_shortcodes_button();
    }

    public function plugin_textdomain()
    {
        $domain = 'acidcodes_txtd';
        $locale = apply_filters('plugin_locale', get_locale(), $domain);
        load_textdomain($domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo');
        load_plugin_textdomain($domain, false, dirname(plugin_basename(__FILE__)) . '/lang/');
    } // end plugin_textdomain

    function add_acidcodes_shortcodes_button()
    {
        //make sure the user has correct permissions
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
            return;
        }

        // add to the visual mode only
        if (get_user_option('rich_editing') == 'true') {
            add_filter('mce_external_plugins', array($this, 'addto_mce_acidcodes_fontawesome'));
            add_filter('mce_external_plugins', array($this, 'addto_mce_acidcodes_validate'));
            add_filter('mce_external_plugins', array($this, 'addto_mce_acidcodes_materialize'));
            add_filter('mce_external_plugins', array($this, 'addto_mce_acidcodes_shortcodes'));
            add_filter('mce_external_plugins', array($this, 'addto_mce_acidcodes_reveal'));
//            add_filter('mce_external_plugins', array($this, 'addto_mce_acidcodes_parsley'));
            //add_filter('mce_external_plugins', array($this, 'addto_mce_acidcodes_main'));
            add_filter('mce_buttons', array($this, 'register_acidcodes_shortcodes_button'));
        }
    } // end register_admin_assets

    /**
     * Registers and enqueues admin-specific styles.
     */
    public function register_admin_assets($buttons)
    {
        wp_enqueue_style('acidcodes-shortcodes-reveal-styles', $this->plugin_url . 'assets/css/style.css', array('wp-color-picker'));
        return $buttons;
    } // end register_plugin_styles


    /*--------------------------------------------*
     * Core Functions
     *---------------------------------------------*/

    /**
     * Registers and enqueues plugin-specific scripts..Usually we base on theme front-end scripts and this is empty.
     */
//    public function register_plugin_scripts()
//    {
//    } // end action_method_name

    function register_acidcodes_shortcodes_button($buttons)
    {
        array_push($buttons, "acidcodes");

        return $buttons;
    } // end filter_method_name

    function addto_mce_acidcodes_shortcodes($plugin_array)
    {
        $plugin_array['acidcodes'] = $this->plugin_url . 'assets/js/add_shortcode.js';

        return $plugin_array;
    }

    function addto_mce_acidcodes_fontawesome($plugin_array)
    {
        $plugin_array['fontawesome'] = $this->plugin_url . 'assets/js/font-awesome/fontawesome-all.min.js';

        return $plugin_array;
    }

    function addto_mce_acidcodes_materialize($plugin_array)
    {
        $plugin_array['materialize'] = $this->plugin_url . 'assets/js/materialize/materialize.min.js';

        return $plugin_array;
    }


    function addto_mce_acidcodes_validate($plugin_array)
    {
        $plugin_array['validate'] = $this->plugin_url . 'assets/js/validate/jquery.validate.js';

        return $plugin_array;
    }
    function addto_mce_acidcodes_reveal($plugin_array)
    {
        $plugin_array['reveal'] = $this->plugin_url . 'assets/js/reveal/jquery.reveal.js';

        return $plugin_array;
    }

    function addto_mce_acidcodes_main($plugin_array)
    {
        //$plugin_array['main'] = $this->plugin_url . 'assets/js/main.js';

        //return $plugin_array;
    }

    public function acidcodes_get_shortcodes_modal()
    {
        ob_start();
        include('views/shortcodes-modal.php');
        echo json_encode(ob_get_clean());
        die();
    }

    public function create_acidcodes_shortcodes()
    {
        include_once('shortcodes.php');
    }

    function acidcodes_remove_spaces_around_shortcodes($content)
    {
        $array = array(
            '<p>[' => '[',
            ']</p>' => ']',
            ']<br />' => ']'
        );

        $content = strtr($content, $array);

        return $content;
    }

    /**
     * Add some of our own shortcodes to the list of shortcodes that won't have their content texturized.
     *
     * @param array $shortcodes
     *
     * @return array
     */
    function acidcodes_shortcodes_to_exempt_from_wptexturize($shortcodes)
    {
        $shortcodes[] = 'restaurantmenu';

        return $shortcodes;
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks() {

        $plugin_public = new AcidCodesShortcodes_Public( $this->get_acidcodes(), $this->get_version() );

        add_action( 'wp_enqueue_scripts', array( $plugin_public, 'enqueue_styles' ) );
        add_action( 'wp_enqueue_scripts', array( $plugin_public, 'enqueue_scripts' ) );
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run() {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_acidcodes() {
        return $this->acidcodes;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     * @return    AcidCodes_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the plugin.
     */
    public function get_version() {
        return $this->version;
    }

} // end class


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_acidcodes() {
    global $AcidCodesShortcodes;
    $AcidCodesShortcodes = new AcidCodesShortcodes();
    $AcidCodesShortcodes->run();

}
run_acidcodes();