<?php
$class= "span12";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class']; ?>

<span class="<?php echo $class; ?>"  >
    <label for="<?php echo $param['param_key'] ?>"><?php echo $param['name'] ?></label>
    <div class="media_image_holder " >
        <i class="fas fa-image" style=""></i>
        <label>Add images</label>
        <input type="hidden" class="media_image_input" name="<?php echo $param['param_key'] ?>" />
        <img class="upload_preview" />
<!--        <i class="fas fa-edit" ></i>-->
    </div>
</span>