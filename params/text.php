<?php
$class= "span12";
$required = '';
$value = '';
$tooltip = $param['help-text'];
$text_tooltip = '';
$placeholder_icon = '';
$search_id = '';

if ( isset($param['help-text'] ) ) $tooltip_class = "tooltipped tooltipped__input";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
$is_content = isset($param['is_content']) ? 'class="is_shortcode_content"' : '';
if (isset($param['required'])) $required = "required";
if (isset($param['is_text_tooltip'])) $text_tooltip = 'is_text';
if (isset($param['placeholder'])) { $search_id= "acidcode__search-id"; }
?>


<span class="<?php echo $class; ?>" >
    <label for="<?php echo $param['param_key'] ?>"><?php echo $param['name'] ?></label>
    <input class="<?php echo $tooltip_class; ?>" id= "<?php echo $search_id ?>"  data-text-tooltip ="<?php echo $text_tooltip; ?>" data-tooltip="<?php echo $tooltip; ?>" <?php echo $required; ?> type="<?php echo $param['type'] ?>" name="<?php echo $param['param_key'] ?>"<?php echo $is_content ?> />
</span>