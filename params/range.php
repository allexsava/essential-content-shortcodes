<?php
$class= "span12";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class']; ?>

<span class="<?php echo $class; ?>" >
    <p class="range-field"><label for="<?php echo $param['param_key'] ?>"><?php echo $param['name'] ?></label>
      <input type="range" name="<?php echo $param['param_key'] ?>" id="<?php echo $param['param_key'] ?>" value="0" min="0" max="100" />
        <span class="help-text"><?php echo $param['help-text'] ?></span>
    </p>
</span>