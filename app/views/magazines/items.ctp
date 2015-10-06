<div class="row">
	<?php if ($items) { ?>
		<?php foreach ($items as $i => $v): ?>
			<div class="span3" style="height: 160px; text-align: center;">
				<div style="margin: 5px; height: 120px; padding: 10px; background-color: brown;">
					<?php echo $this->Html->link($v, '/magazines/magazine/' . $i, array('style' => 'color: white;'));?>
				</div>
			</div>
		<?php endforeach; ?>
	<?php } else { ?>
		<br />
		<p style="text-align: center;">No hay obras publicadas.</p>
	<?php } ?>
</div>