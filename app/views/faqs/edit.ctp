<div class="faqs form">
<?php echo $this->Form->create('Faq');?>
	<legend><?php __('Modificar Pregunta'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('question', array('class' => 'form-control', 'label' => 'Pregunta'));
		echo $this->Form->input('answer', array('class' => 'form-control', 'label' => 'Respuesta'));
	?>
	<br />
	<?php echo $this->Form->submit('Guardar', array('class' => 'btn btn-primary', 'div' => false)); ?>
	<?php echo $this->Html->link(__('Volver', true), array('action' => 'index'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end();?>
</div>