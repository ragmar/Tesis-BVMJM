<?php echo $this->Html->script('tiny_mce/tiny_mce'); ?>
<script type="text/javascript">
tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        language : "es"
});
</script>
<div class="news form">
<?php echo $this->Form->create('News');?>
	<legend><?php __('Agregar Noticia'); ?></legend>
	<?php
		echo $this->Form->input('title', array('class' => 'form-control'));
		echo $this->Form->input('content', array('label' => 'Contenido', 'class' => 'form-control'));
		echo $this->Form->input('description', array('label' => 'Descripción', 'class' => 'form-control'));
		echo $this->Form->input('published', array('checked' => true));
	?>
	<br />
	<?php echo $this->Form->submit('Guardar', array('class' => 'btn btn-primary', 'div' => false)); ?>
	<?php echo $this->Html->link(__('Volver', true), array('action' => 'index'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end();?>
</div>