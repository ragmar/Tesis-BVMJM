<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
<li>Mensajes</li>
</ul>
<div>
<div class="messages">
	<h2><?php __('Mensajes');?></h2>
	<table class="table">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<!-- <th><?php echo $this->Paginator->sort('email');?></th> -->
		<th><?php echo $this->Paginator->sort('Asunto', 'subject');?></th>
		<!-- <th><?php echo $this->Paginator->sort('message');?></th> -->
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($messages as $message):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $message['Message']['id']; ?>&nbsp;</td>
		<td><?php echo $message['Message']['name']; ?>&nbsp;</td>
		<!-- <td><?php echo $message['Message']['email']; ?>&nbsp;</td> -->
		<td><?php echo $message['Message']['subject']; ?>&nbsp;</td>
		<!-- <td><?php echo $message['Message']['message']; ?>&nbsp;</td> -->
		<td><?php echo $time->format('d-m-Y', $message['Message']['created']); ?>&nbsp;</td>
		<td><?php echo $time->format('d-m-Y', $message['Message']['modified']); ?>&nbsp;</td>
		<td class="actions" style="width: 10%;">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $message['Message']['id']), array('class' => 'btn btn-primary')); ?>
			<?php //echo $this->Html->link(__('Edit', true), array('action' => 'edit', $message['Message']['id'])); ?>
			<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $message['Message']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $message['Message']['id'])); ?>
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

	<?php if ($this->Paginator->params['paging']['Message']['pageCount'] > 1) { ?>
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
	<br />
	<ul>
		<li><?php //echo $this->Html->link(__('Configuration', true), array('controller' => 'configurations')); ?></li>
		<li><?php //echo $this->Html->link(__('New Message', true), array('action' => 'add')); ?></li>
	</ul>
</div>
-->
</div>