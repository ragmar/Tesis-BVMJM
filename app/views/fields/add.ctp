<div class="fields form">
<?php echo $this->Form->create('Field');?>
	<fieldset>
		<legend><?php __('Add Field'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('repeatable');
		echo $this->Form->input('mandatory');
		echo $this->Form->input('code');
		echo $this->Form->input('book');
		echo $this->Form->input('magazine');
		echo $this->Form->input('score');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Fields', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Indicators', true), array('controller' => 'indicators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicator', true), array('controller' => 'indicators', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subfields', true), array('controller' => 'subfields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subfield', true), array('controller' => 'subfields', 'action' => 'add')); ?> </li>
	</ul>
</div>