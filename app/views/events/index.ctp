<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li>Eventos</li>
</ul>
<div>
<div class="events index">
	<h2><?php __('Eventos');?></h2>
	<table class="table">
	<tr>
		<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
		<th><?php echo $this->Paginator->sort('title');?></th>
		<th><?php echo $this->Paginator->sort(__('Inicio', true), 'start');?></th>
		<th><?php echo $this->Paginator->sort(__('Fin', true), 'end');?></th>
		<!-- <th><?php echo $this->Paginator->sort('summary');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th> -->
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($events as $event):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $event['Event']['id']; ?>&nbsp;</td> -->
		<td><?php echo $event['Event']['title']; ?>&nbsp;</td>
		<td><?php echo $time->format('d-m-Y h:i:s a', $event['Event']['start']); ?>&nbsp;</td>
		<td><?php echo $time->format('d-m-Y h:i:s a', $event['Event']['end']); ?>&nbsp;</td>
		<!-- <td><?php echo $event['Event']['summary']; ?>&nbsp;</td>
		<td><?php echo $event['Event']['created']; ?>&nbsp;</td>
		<td><?php echo $event['Event']['modified']; ?>&nbsp;</td> -->
		<td class="actions" style="width: 25%">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', base64_encode(base64_encode($event['Event']['id']))), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $event['Event']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $event['Event']['id']), array('class' => 'btn btn-primary'), sprintf(__('Are you sure you want to delete # %s?', true), $event['Event']['title'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<!--
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p> -->

	<?php if ($this->Paginator->params['paging']['Event']['pageCount'] > 1) { ?>
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
	<?php echo $this->Html->link(__('Nuevo Evento', true), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
	<?php echo $this->Html->link(__('Calendario', true), array('action' => 'calendar'), array('class' => 'btn btn-primary')); ?>
</div>
</div>