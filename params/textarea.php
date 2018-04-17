<?php
$class = "span12";
$is_content = '';
$required = '';
$rows = 3;
if (isset($param['admin_class'])) $class = $param['admin_class'];
if (isset($param['is_content'])) $is_content = 'is_shortcode_content';
if (isset($param['rows'])) $rows = $param['rows'];
if (isset($param['required'])) $required = "required";
?>

<span class="<?php echo $class; ?>">
    <textarea <?php echo $required; ?> class="materialize-textarea acidcode__textarea <?php echo $is_content ?>" type="<?php echo $param['type'] ?>" name="<?php echo $param['param_key'] ?>" ></textarea>
        <?php if (!empty($param['name'])) : ?>
            <label class="textarea__label" for="<?php echo $param['param_key'] ?>"><?php echo $param['name'] ?></label>
        <?php endif; ?>
</span>