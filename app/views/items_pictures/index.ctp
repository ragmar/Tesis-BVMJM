<div style="padding-left: 50px; padding-right: 50px;">

<div class="itemsIndicators index">
	<h2><?php __('Items Indicators');?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('item_id');?></th>
			<th><?php echo $this->Paginator->sort('indicator_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($itemsIndicators as $itemsIndicator):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $itemsIndicator['ItemsIndicator']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($itemsIndicator['Item']['title'], array('controller' => 'items', 'action' => 'view', $itemsIndicator['Item']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($itemsIndicator['Indicator']['id'], array('controller' => 'indicators', 'action' => 'view', $itemsIndicator['Indicator']['id'])); ?>
		</td>
		<td><?php echo $itemsIndicator['ItemsIndicator']['created']; ?>&nbsp;</td>
		<td><?php echo $itemsIndicator['ItemsIndicator']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $itemsIndicator['ItemsIndicator']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $itemsIndicator['ItemsIndicator']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $itemsIndicator['ItemsIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $itemsIndicator['ItemsIndicator']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<br />
	<ul>
		<li><?php echo $this->Html->link(__('New Items Indicator', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicators', true), array('controller' => 'indicators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicator', true), array('controller' => 'indicators', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>