<div>
<div class="faqs index">
	<h2><?php __("Preguntas Frecuentes");?></h2>
	<hr>
	
	<dl class="dl-vertical">
		<?php
		$i = 0;
		foreach ($faqs as $faq):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<dt><h3><?php echo $faq['Faq']['question']; ?>&nbsp;</h3></dt>
			<dd><b><?php echo $faq['Faq']['answer']; ?></b></dd>
		<?php endforeach; ?>
	</dl>
	
	<!-- <p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p> -->

	<?php if ($this->Paginator->params['paging']['Faq']['pageCount'] > 1) { ?>
	<div class="pagination" align="center">
		<ul>
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
		</ul>
	</div><br />
	<?php } ?>
</div>
<!--
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
		<?php //echo $this->Html->link(__('Nueva Pregunta', true), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
</div>
 -->
</div>