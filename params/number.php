<?php
$class= "span12";
$tooltip = '';
$tooltip_position = '';
if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
if ( isset($param['is_content'] ) ) $is_content = 'class="is_shortcode_content"'; else { $is_content = ''; }
if (isset($param['tooltip-position'])) $tooltip_position = $param['tooltip-position'];
if (isset($param['is_text_tooltip'])) $text_tooltip = 'is_text';
$url = plugins_url();

$gifs = $url.'/acidcodes/assets/images/gifs/select-carousel/'.$param['param_key'].'.gif';

if($param['param_key']==='slider_padding') { $tooltipped_input='tooltipped__input'; $data_tooltip = "<img src='$gifs'/>";}
if($param['param_key']==='slider_duration') { $tooltipped_input='tooltipped__input'; $data_tooltip = $param['help-text'];}

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
    <input class="tooltipped__input"
           data-tooltip="<?php echo $data_tooltip ?>"
           data-position="<?php echo $tooltip_position ?>"
           data-text-tooltip ="<?php echo $text_tooltip; ?>"
           value="<?php echo $param['value'] ?>" type="<?php echo $param['type'] ?>" min="<?php echo $param['min'] ?>" max="<?php echo $param['max'] ?>" name="<?php echo $param['param_key'] ?>" <?php echo $required ?> <?php echo $is_content ?>/>
</span>