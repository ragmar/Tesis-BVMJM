<div>
<div class="faqs index">
	<h2><?php __("FAQ's (Preguntas Frecuentes)");?></h2>
	<table class="table">
	<tr>
		<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
		<th><?php echo $this->Paginator->sort('Pregunta', 'question');?></th>
		<!-- <th><?php echo $this->Paginator->sort('answer');?></th> -->
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($faqs as $faq):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $faq['Faq']['id']; ?>&nbsp;</td> -->
		<td><?php echo $faq['Faq']['question']; ?>&nbsp;</td>
		<!-- <td><?php echo $faq['Faq']['answer']; ?>&nbsp;</td> -->
		<td><?php echo $time->format('d-m-Y', $faq['Faq']['created']); ?>&nbsp;</td>
		<td><?php echo $time->format('d-m-Y', $faq['Faq']['modified']); ?>&nbsp;</td>
		<td class="actions" style="width: 25%;">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $faq['Faq']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $faq['Faq']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $faq['Faq']['id']), array('class' => 'btn btn-primary'), sprintf(__('Are you sure you want to delete # %s?', true), $faq['Faq']['question'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
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
<div class="actions">
	<!-- <h3><?php __('Actions'); ?></h3> -->
		<?php echo $this->Html->link(__('Nueva Pregunta', true), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
</div>
</div>