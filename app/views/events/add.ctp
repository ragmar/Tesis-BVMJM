<div class="events form">
<?php echo $this->Form->create('Event');?>
	<legend><?php __('Agregar Evento'); ?></legend>
	<?php
		echo $this->Form->input('title', array('class' => 'form-control'));
	?>
	<br />
	<?php
		echo $this->Form->input('start', array('label' => __('Inicio', true), 'dateFormat' => 'DMY'));
		echo $this->Form->input('end', array('label' => __('Fin', true), 'dateFormat' => 'DMY'));
	?>
	<br />
	<?php
		echo $this->Form->input('summary', array('label' => __('Sumario', true), 'class' => 'form-control'));
		echo $this->Form->input('allDay', array('label' => __('Todo el día', true)));
	?>
	<br />
	<?php echo $this->Form->submit('Guardar', array('class' => 'btn btn-primary', 'div' => false)); ?>
	<?php echo $this->Html->link(__('Volver', true), array('action' => 'index'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end();?>
</div>