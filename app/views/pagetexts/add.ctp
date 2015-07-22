<!--
<link href="../webroot/css/wijmo/themes/wijmo/jquery.wijmo-open.2.2.1.css" rel="stylesheet" type="text/css" />
<link href="../webroot/css/wijmo/themes/wijmo/jquery.wijmo.wijtabs.css" rel="stylesheet" type="text/css" />
<link href="../webroot/css/wijmo/themes/wijmo/jquery.wijmo.wijsplitter.css" rel="stylesheet" type="text/css" />
<link href="../webroot/css/wijmo/themes/wijmo/jquery.wijmo.wijribbon.css" rel="stylesheet" type="text/css" />
<link href="../webroot/css/wijmo/themes/wijmo/jquery.wijmo.wijeditor.css" rel="stylesheet" type="text/css" />
<script src="../webroot/js/wijmo/jquery.wijmo.wijtabs.js" type="text/javascript"></script>
<script src="../webroot/js/wijmo/jquery.wijmo.wijsplitter.js" type="text/javascript"></script>
<script src="../webroot/js/wijmo/jquery.wijmo.wijribbon.js" type="text/javascript"></script>
<script src="../webroot/js/wijmo/jquery.wijmo.wijeditor.js" type="text/javascript"></script>
-->
<?php echo $this->Html->script('tiny_mce/tiny_mce'); ?>
<script type="text/javascript">
tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        language : "es"
});
</script>

<div class="pagetexts form">
<?php echo $this->Form->create('Pagetext');?>
	<legend><?php __('Agregar Página'); ?></legend>
	<?php
		echo $this->Form->input('title', array('class' => 'form-control'));
		echo $this->Form->input('description', array('div' => false, 'style' => 'width: 100%; height: 400px;'));
		echo $this->Form->input('enabled', array('label' => 'Activa'));
		echo $this->Form->input('published', array('checked' => true));
	?>
	<br />
	<?php echo $this->Form->submit('Guardar', array('class' => 'btn btn-primary', 'div' => false)); ?>
	<?php echo $this->Html->link(__('Volver', true), array('action' => 'index'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end();?>
</div>

<script type="text/javascript">
	//$(document).ready(function () {
    //    $("#PagetextDescription").wijeditor({
    //        editorMode: "wysiwyg",
    //        //fullScreenContainerSelector: "container",
    //        showPathSelector: false
    //    });
    //});
</script>