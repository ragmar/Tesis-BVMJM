<div class="faqs form">
<?php echo $this->Form->create('Faq');?>
	<legend><?php __('Nueva Pregunta'); ?></legend>
	<?php
		echo $this->Form->input('question', array('label' => __('Pregunta', true), 'class' => 'form-control'));
		echo $this->Form->input('answer', array('label' => __('Respuesta', true), 'class' => 'form-control'));
	?>
	<br />
	<?php echo $this->Form->submit('Guardar', array('class' => 'btn btn-primary', 'div' => false)); ?>
	<?php echo $this->Html->link(__('Volver', true), array('action' => 'index'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end();?>
</div>