<div class="countries form">
<?php echo $this->Form->create('Country');?>
	<fieldset>
		<legend><?php __('Add Country'); ?></legend>
	<?php
		echo $this->Form->input('ISONUM');
		echo $this->Form->input('ISO2');
		echo $this->Form->input('ISO3');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Countries', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>