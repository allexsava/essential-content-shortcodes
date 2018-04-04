<?php
$class = "span12";
$required = '';
if (isset($param['admin_class'])) $class = $param['admin_class'];
if (isset($param['required'])) $required = "required"; ?>


<span class="<?php echo $class; ?>">
    <label for="<?php echo $param['param_key'] ?>"></label>
    <select class="tooltipped" data-tooltip="dgsgfdu" name="<?php echo $param['param_key'] ?>" <?php echo $required; ?>>
        <?php
        $options = $param['options'];
        foreach ($options as $i => $opt) { ?>
            <option value="<?php echo $i ?>"><?php echo $opt ?></option>
        <?php } ?>
    </select>
    <label><?php echo $param['name'] ?></label>
    <span class="help-text"><?php echo $param['help-text'] ?></span>
</span>