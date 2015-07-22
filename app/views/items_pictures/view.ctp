<div style="padding-left: 50px; padding-right: 50px;">

<div class="itemsIndicators view">
<h2><?php  __('Items Indicator');?></h2>
	<dl class="dl-horizontal"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $itemsIndicator['ItemsIndicator']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Item'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($itemsIndicator['Item']['title'], array('controller' => 'items', 'action' => 'view', $itemsIndicator['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Indicator'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($itemsIndicator['Indicator']['id'], array('controller' => 'indicators', 'action' => 'view', $itemsIndicator['Indicator']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $itemsIndicator['ItemsIndicator']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $itemsIndicator['ItemsIndicator']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<br />
	<ul>
		<li><?php echo $this->Html->link(__('Edit Items Indicator', true), array('action' => 'edit', $itemsIndicator['ItemsIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Items Indicator', true), array('action' => 'delete', $itemsIndicator['ItemsIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $itemsIndicator['ItemsIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Items Indicators', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Items Indicator', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicators', true), array('controller' => 'indicators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicator', true), array('controller' => 'indicators', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>