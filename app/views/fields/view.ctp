<div class="fields view">
<h2><?php  __('Field');?></h2>
	<dl class="dl-horizontal"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $field['Field']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $field['Field']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $field['Field']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Repeatable'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $field['Field']['repeatable']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mandatory'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $field['Field']['mandatory']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $field['Field']['code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Book'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $field['Field']['book']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Magazine'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $field['Field']['magazine']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Score'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $field['Field']['score']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $field['Field']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $field['Field']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Field', true), array('action' => 'edit', $field['Field']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Field', true), array('action' => 'delete', $field['Field']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $field['Field']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fields', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicators', true), array('controller' => 'indicators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicator', true), array('controller' => 'indicators', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subfields', true), array('controller' => 'subfields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subfield', true), array('controller' => 'subfields', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Indicators');?></h3>
	<?php if (!empty($field['Indicator'])):?>
	<table>
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Value'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Field Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($field['Indicator'] as $indicator):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $indicator['id'];?></td>
			<td><?php echo $indicator['value'];?></td>
			<td><?php echo $indicator['description'];?></td>
			<td><?php echo $indicator['type'];?></td>
			<td><?php echo $indicator['field_id'];?></td>
			<td><?php echo $indicator['created'];?></td>
			<td><?php echo $indicator['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'indicators', 'action' => 'view', $indicator['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'indicators', 'action' => 'edit', $indicator['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'indicators', 'action' => 'delete', $indicator['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $indicator['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Indicator', true), array('controller' => 'indicators', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Subfields');?></h3>
	<?php if (!empty($field['Subfield'])):?>
	<table>
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Field Id'); ?></th>
		<th><?php __('Code'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Repeatable'); ?></th>
		<th><?php __('Mandatory'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($field['Subfield'] as $subfield):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $subfield['id'];?></td>
			<td><?php echo $subfield['field_id'];?></td>
			<td><?php echo $subfield['code'];?></td>
			<td><?php echo $subfield['name'];?></td>
			<td><?php echo $subfield['description'];?></td>
			<td><?php echo $subfield['repeatable'];?></td>
			<td><?php echo $subfield['mandatory'];?></td>
			<td><?php echo $subfield['created'];?></td>
			<td><?php echo $subfield['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'subfields', 'action' => 'view', $subfield['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'subfields', 'action' => 'edit', $subfield['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'subfields', 'action' => 'delete', $subfield['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $subfield['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Subfield', true), array('controller' => 'subfields', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
