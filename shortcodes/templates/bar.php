<?php
$marker='';
$marker=!empty($markers) ? ' acidcode__markers-on ' : 'acidcode__markers-off';
?>
<div class="acidcode  acidcode__progressbar">
	<?php if ($title): ?>
		<div class="progressbar__title"><?php echo $title; ?></div>
	<?php endif; ?>
	<div class="progress acidcode__progress">
		<div class="determinate acidcode__progress-determinate" style="width: <?php echo $progress ?>">
            <div class="progressbar__tooltip <?php echo $marker ?>"><?php echo $progress ?></div>
        </div>
    </div>
</div>