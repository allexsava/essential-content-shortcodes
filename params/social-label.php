<?php
$class= "span12";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
if ( isset($param['is_content'] ) ) $is_content = 'class="is_shortcode_content"'; else { $is_content = ''; } ?>

<span class="<?php echo $class; ?>" >
    <label><?php echo $param['name'] ?></label>
</span>