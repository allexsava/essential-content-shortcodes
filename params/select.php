<?php
$class = "span12";
$required = '';
$tooltip = '';
$tooltip_position = '';
if (isset($param['admin_class'])) $class = $param['admin_class'];
if (isset($param['required'])) $required = "required";
if (isset($param['tooltip'])) $tooltip = "true";
if (isset($param['tooltip-position'])) $tooltip_position = $param['tooltip-position'];

$url = plugins_url();

$gifs = $url.'/acidcodes/assets/images/gifs/';

?>


<span class="<?php echo $class; ?>">
    <label for="<?php echo $param['param_key'] ?>"></label>
    <select data-active-tooltip ="<?php echo $tooltip ?>"
            data-tooltip-position="<?php echo $tooltip_position ?>"
            data-gifs-loc="<?php echo $gifs ?>"
            name="<?php echo $param['param_key'] ?>" <?php echo $required; ?>>
        <?php
        $options = $param['options'];
        foreach ($options as $i => $opt) { ?>
            <option value="<?php echo $i ?>"><?php echo $opt ?></option>
        <?php } ?>
    </select>
    <label><?php echo $param['name'] ?></label>
</span>