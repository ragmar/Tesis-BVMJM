<div class="fields index">
	<h2><?php __('Fields');?></h2>
	<table>
	<tr>
			<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('repeatable');?></th>
			<th><?php echo $this->Paginator->sort('mandatory');?></th>
			<th><?php echo $this->Paginator->sort('code');?></th>
			<th><?php echo $this->Paginator->sort('book');?></th>
			<th><?php echo $this->Paginator->sort('magazine');?></th>
			<th><?php echo $this->Paginator->sort('score');?></th>
			<!-- <th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th> -->
			<th class="actions"><?php //__('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($fields as $field):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $field['Field']['id']; ?>&nbsp;</td> -->
		<td><?php echo $field['Field']['name']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['description']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['repeatable']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['mandatory']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['code']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['book']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['magazine']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['score']; ?>&nbsp;</td>
		<!-- <td><?php echo $field['Field']['created']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['modified']; ?>&nbsp;</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $field['Field']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $field['Field']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $field['Field']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $field['Field']['id'])); ?>
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
	<!-- <h3><?php __('Actions'); ?></h3> -->
	<ul>
		<li><?php echo $this->Html->link(__('New Field', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Indicators', true), array('controller' => 'indicators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicator', true), array('controller' => 'indicators', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subfields', true), array('controller' => 'subfields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subfield', true), array('controller' => 'subfields', 'action' => 'add')); ?> </li>
	</ul>
</div>