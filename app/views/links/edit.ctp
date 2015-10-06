<div class="links form">
<?php echo $this->Form->create('Link');?>
	<legend><?php __('Modificar Enlace'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('class' => 'form-control'));
		echo $this->Form->input('url', array('class' => 'form-control'));
		echo $this->Form->input('description', array('class' => 'form-control'));
	?>
	<br />
	<?php echo $this->Form->submit('Guardar', array('class' => 'btn btn-primary', 'div' => false)); ?>
	<?php echo $this->Html->link(__('Volver', true), array('action' => 'index'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end();?>
</div>