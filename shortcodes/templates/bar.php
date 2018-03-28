<?php
$marker='';
$marker=!empty($markers) ? ' markers-on ' : 'markers-off';
?>
<div class="acidcode  acidcode__progressbar  progressbar">
	<?php if ($title): ?>
		<div class="progressbar__title"><?php echo $title; ?></div>
	<?php endif; ?>
	<div class="progress">
		<div class="determinate" style="width: <?php echo $progress ?>">
            <div class="progressbar__tooltip <?php echo $marker ?>"><?php echo $progress ?></div>
        </div>
    </div>
</div>