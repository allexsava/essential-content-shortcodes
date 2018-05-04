<?php
$marker='';
$pb_color='';
$marker=!empty($markers) ? ' acidcode__markers-on ' : 'acidcode__markers-off';
$pb_color=!empty($progress_color) ? ' lighten-4 '.$progress_color : '';
?>
<div class="acidcode  acidcode__progressbar">
	<?php if ($title): ?>
		<div class="progressbar__title"><?php echo $title; ?></div>
	<?php endif; ?>
	<div class="progress acidcode__progress <?php echo $pb_color ?>">
		<div class="determinate acidcode__progress-determinate <?php echo $progress_color ?>" style="width: <?php echo $progress ?>">
            <div class="progressbar__tooltip <?php echo $marker ?>"><?php echo $progress ?></div>
        </div>
    </div>
</div>