<?php
$class= "span12";

if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
?>

<span class="<?php echo $class; ?>" >
    <input value="" id="<?php echo $param['param_key'] ?>" type="<?php echo $param['type'] ?>" name="<?php echo $param['param_key'] ?>"/>
</span>