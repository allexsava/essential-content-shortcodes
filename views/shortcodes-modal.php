<?php
// get the root
$plug_path = dirname(dirname(__FILE__));
include_once($plug_path . "/shortcodes.php");
global $acidcodes_shortcodes;
if (!defined('ABSPATH')) {
    die('-1');
}

global $post;

if ($_GET['post_id']) {
    $post = get_post($_GET['post_id']);
} elseif ($post === null) {
    $post = get_post(1);
} ?>
<div id="acidcodes_shortcodes">
    <div class="l_modal_header row">
        <div class="col s2">
            <button type="button" class="acidcode__btn back"><i
                        class="fas fa-chevron-left"></i><span><?php _e('Back', 'acidcodes_txtd'); ?></span></button>
        </div>
        <div class="l_modal_title col s8">
            <span class=""><?php _e('Choose shortcode:', 'acidcodes_txtd'); ?></span>
        </div>
        <div class="col s2">
            <button type="button" class="acidcode__btn close close-reveal-modal"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="l_modal_body three_col">
        <div class="details_container ">
            <div class="details_content"></div>
        </div>
        <ul class="l_three_col">
            <?php
            $shortcoces_array = $acidcodes_shortcodes->get_shortcodes();
            /**
             * In case someone has something to say about this list
             * here is the only place where it can be filtered
             */
            $shortcoces_array = apply_filters('filter_shortcodes', $shortcoces_array, $post);

            foreach ($shortcoces_array as $key => $shortcode) {
                $class = 'shortcode_' . $shortcode["name"] . '_open';
                $data_trigger_open = 'shortcode_' . $shortcode["name"] . '_open';
                $shortcode_js = json_encode((object)$shortcode);
                if ($shortcode["direct"]) {
                    $class .= ' insert-direct-shortcode';
                } ?>
                <li class="shortcode">
                    <a class="details <?php echo $class; ?>" data-params='<?php echo $shortcode_js; ?>'
                       data-trigger-open="<?php echo $data_trigger_open ?>">
                        <i class="icon <?php echo $shortcode["icon"]; ?>"></i>
                        <span class="title"><?php echo $shortcode["name"] ?></span>
                    </a>
                    <?php if (!$shortcode['direct'] && !empty($shortcode['params'])) { ?>
                        <div class="shortcode_params details_content">
                            <form id="acidcodes_shortcodes_form">
                                <div class="alerts"></div>
                                <fieldset>
                                    <div class="row">
                                        <?php
                                        foreach ($shortcode['params'] as $k => $param) {

                                            // inject the key in param ... since i was too lazy to do that before
                                            $param['param_key'] = $k;
                                            echo $acidcodes_shortcodes->render_param($param);
                                        } ?>

                                        <button type="submit"
                                                class="btn hidden"><?php _e('Submit', 'acidcodes_txtd'); ?></button>
                                    </div>
                                </fieldset>
                            </form>
                            <div id="data_params" type="hidden" data-params='<?php echo $shortcode_js; ?>'></div>
                        </div>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="l_modal_footer row">
        <div class="col s6"></div>
        <div class="col s6">
            <div class="row">
                <div class="col s6">
                    <a class="acidcode__btn btn_secondary cancel"><?php _e('Cancel', 'acidcodes_txtd'); ?></a>

                    <span><?php _e('or', 'acidcodes_txtd'); ?></span>

                </div>
                <div class="col s6">
                    <a class="acidcode__btn btn_primary disabled"><?php _e('Insert', 'acidcodes_txtd'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>