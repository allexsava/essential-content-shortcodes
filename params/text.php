<?php
$class= "span12";
$required = '';
$value = '';
$tooltip = $param['help-text'];
if ( isset($param['help-text'] ) ) $tooltip_class = "tooltipped";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
$is_content = isset($param['is_content']) ? 'class="is_shortcode_content"' : '';
if (isset($param['required'])) $required = "required";
?>


<span class="<?php echo $class; ?>" >
    <label for="<?php echo $param['param_key'] ?>"><?php echo $param['name'] ?></label>
    <input class="<?php echo $tooltip_class; ?>" data-tooltip="<?php echo $tooltip; ?>" <?php echo $required; ?> type="<?php echo $param['type'] ?>" name="<?php echo $param['param_key'] ?>"<?php echo $is_content ?> />
</span>