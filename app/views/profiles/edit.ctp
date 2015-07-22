<div class="profiles form">
<?php echo $this->Form->create('Profile');?>
	<legend><?php __('Edit Profile'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('class' => 'form-control'));
	?>
	<br />
	<?php echo $this->Form->submit('Guardar', array('class' => 'btn btn-primary', 'div' => false)); ?>
	<?php echo $this->Html->link(__('Volver', true), array('action' => 'index'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end();?>
</div>