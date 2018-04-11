<?php
$class= "span12";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
if (isset($param['tooltip'])) $tooltip = "tooltipped__input";
if (isset($param['tooltip-position'])) $tooltip_position = $param['tooltip-position'];

$url = plugins_url();

$gifs = $url.'/acidcodes/assets/images/gifs/select-style/'.$param['param_key'].'.gif';
?>

    <span class="<?php echo $class; ?>" >
        <label class="<?php echo $tooltip ?>" data-gifs-loc="<?php echo $gifs ?>" data-position="<?php echo $tooltip_position ?>">
            <input type="checkbox" name="<?php echo $param['param_key'] ?>" id="<?php echo $param['param_key'] ?>"/>
            <span for="<?php echo $param['param_key'] ?>"><?php echo $param['name'] ?></span>
         </label>
    </span>