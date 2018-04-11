<?php
$class= "span12";
$tooltip = '';
$tooltip_position = '';
if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
if ( isset($param['is_content'] ) ) $is_content = 'class="is_shortcode_content"'; else { $is_content = ''; }
if (isset($param['tooltip-position'])) $tooltip_position = $param['tooltip-position'];
if($param['param_key']==='slider_padding') $tooltipped_input='tooltipped__input';

$url = plugins_url();

$gifs = $url.'/acidcodes/assets/images/gifs/select-carousel/'.$param['param_key'].'.gif';
?>

<?php
if ( isset($param['required'] ) ) {

    if($param['required'] === true) {
        $required = 'required=""';
    } else {
        $required = '';
    }

}
?>

<span class="<?php echo $class; ?>" >
    <label for="<?php echo $param['param_key'] ?>"><?php echo $param['name'] ?></label>
    <input class="<?php echo $tooltipped_input ?>"
           data-tooltip="<img src='<?php echo $gifs ?>'/>"
           data-position="<?php echo $tooltip_position ?>"
           value="<?php echo $param['value'] ?>" type="<?php echo $param['type'] ?>" min="<?php echo $param['min'] ?>" max="<?php echo $param['max'] ?>" name="<?php echo $param['param_key'] ?>" <?php echo $required ?> <?php echo $is_content ?>/>
</span>