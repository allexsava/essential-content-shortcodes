    <?php
$class= "span12";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
if ( isset($param['is_content'] ) ) $is_content = 'class="is_shortcode_content"'; else { $is_content = ''; } ?>

<span class="<?php echo $class; ?>" >
    <label for="<?php echo $param['param_key'] ?>"><?php echo $param['name'] ?></label>
    <input value="<?php echo $param['value'] ?>" type="<?php echo $param['type'] ?>" name="<?php echo $param['param_key'] ?>" <?php echo $is_content ?>/>
    <span class="help-text"><?php echo $param['help-text'] ?></span>
</span>