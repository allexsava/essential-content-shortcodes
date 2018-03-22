<?php
$class= "span12";
$required = '';
if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
$is_content = isset($param['is_content']) ? 'class="is_shortcode_content"' : '';
if (isset($param['required'])) $required = "required"; ?>


<span class="<?php echo $class; ?>" >
    <label for="<?php echo $param['param_key'] ?>"><?php echo $param['name'] ?></label>
    <input <?php echo $required; ?> value="<?php echo $param['value'] ?>" type="<?php echo $param['type'] ?>" name="<?php echo $param['param_key'] ?>"<?php echo $is_content ?> />
    <span class="help-text"><?php echo $param['help-text'] ?></span>
</span>