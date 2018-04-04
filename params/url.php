<?php
$class= "acidcode acidcode__url";
$required = '';
$value = '';
if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
$is_content = isset($param['is_content']) ? 'class="is_shortcode_content"' : '';
if (isset($param['required'])) $required = "required";
if (isset($param['value'] ) ) $value = $param['value'];
?>


<span class="<?php echo $class; ?>" >
    <label for="<?php echo $param['param_key'] ?>"><?php echo $param['name'] ?></label>
    <input placeholder="<?php echo $param['value'] ?>" <?php echo $required; ?> type="<?php echo $param['type'] ?>" name="<?php echo $param['param_key'] ?>"<?php echo $is_content ?> />
</span>