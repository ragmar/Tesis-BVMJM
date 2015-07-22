<div class="groups form">
<?php echo $this->Form->create('Group');?>
	<legend><?php __('Agregar Grupo'); ?></legend>
	<?php
		echo $this->Form->input('name', array('class' => 'form-control'));
		echo $this->Form->input('description', array('class' => 'form-control', 'type' => 'textarea'));
	?>
	<br />
	<?php echo $this->Form->submit('Guardar', array('class' => 'btn btn-primary', 'div' => false)); ?>
	<?php echo $this->Html->link(__('Volver', true), array('action' => 'index'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end();?>
</div>