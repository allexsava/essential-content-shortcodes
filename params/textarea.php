<?php
$class = "span12";
if (isset($param['admin_class'])) $class = $param['admin_class'];
$is_content = '';
if (isset($param['is_content'])) $is_content = 'class="is_shortcode_content"';
$rows = 3;
if (isset($param['rows'])) $rows = $param['rows'];
if (isset($param['required'])) $required = "required";
?>

<span class="<?php echo $class; ?>">
    <textarea <?php echo $required; ?> class="materialize-textarea" type="<?php echo $param['type'] ?>" name="<?php echo $param['param_key'] ?>" <?php echo $is_content ?> ><?php if (isset($param['predefined'])) echo $param['predefined'] ?></textarea>
        <?php if (!empty($param['name'])) : ?>
            <label for="<?php echo $param['param_key'] ?>"><?php echo $param['name'] ?></label>
        <?php endif; ?>
</span>