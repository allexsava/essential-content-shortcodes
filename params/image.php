<?php
$class= "span12";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];

if ( !isset($param['number'])){ ?>
    <span class="<?php echo $class; ?>"  >
    <label for="<?php echo $param['param_key'] ?>"></label>
    <div class="media_image_holder ">
        <i class="fas fa-image acidcode__image-upload"></i>
        <label>Add images</label>
        <input type="hidden" class="media_image_input" name="<?php echo $param['param_key'] ?>" />
        <img class="upload_preview" />
        <!--        <i class="fas fa-edit" ></i>-->
    </div>
</span>

<?php } else { ?>
    <div class="col s12">
    <?php for($i=1; $i<= $param['number']; $i++){ ?>
        <span class="<?php echo $class; ?>"  >
        <label for="<?php echo $param['param_key'].$i ?>"><?php echo $param['name'].' '.$i ?></label>
        <div class="media_image_holder ">
            <i class="fas fa-image acidcode__image-upload"></i>
            <label>Add images</label>
            <input type="hidden" class="media_image_input" name="<?php echo $param['param_key'].$i ?>" />
            <img id="<?php echo 'preview'.$i ?>" class="upload_preview preview" />
            <!--        <i class="fas fa-edit" ></i>-->
        </div>
    </span>
    <?php } ?>
    </div>
<?php } ?>