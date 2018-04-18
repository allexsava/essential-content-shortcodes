<?php
$class= "span12";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
if (isset($param['tooltip-position'])) $tooltip_position = $param['tooltip-position'];
$url = plugins_url();

$gifs = $url.'/essential-content-shortcodes/assets/images/gifs/select-carousel/'.$param['param_key'].'.gif';
?>

<span class="<?php echo $class; ?>" >
    <p class="range-field"><label for="<?php echo $param['param_key'] ?>"><?php echo $param['name'] ?></label>
      <input class="tooltipped__input"
             data-tooltip="<img src='<?php echo $gifs ?>'/>"
             data-position="<?php echo $tooltip_position ?>"
             type="range" name="<?php echo $param['param_key'] ?>" id="<?php echo $param['param_key'] ?>" value="0" min="0" max="100" />
        <span class="help-text"><?php echo $param['help-text'] ?></span>
    </p>
</span>