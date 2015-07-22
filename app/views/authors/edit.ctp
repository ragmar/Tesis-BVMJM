<?php echo $this->Html->script('tiny_mce/tiny_mce'); ?>
<script type="text/javascript">
tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        language : "es"
});
</script>
<div style="padding-left: 50px; padding-right: 50px;">
<div class="authors form">
<?php echo $this->Form->create('Author', array('enctype' => 'multipart/form-data'));?>
	<fieldset>
		<legend><?php __('Edit Author'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('lastname');
		echo $this->Form->input('author', array('label' => 'Foto del Autor', 'type' => 'file'));
		echo $this->Form->input('biography');
		//echo $this->Form->input('Item');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions" style="height: 350px;">
	<!-- <h3><?php __('Actions'); ?></h3> -->
	<br />
	<ul>
		<!-- <li><?php //echo $this->Html->link(__('Configuration', true), array('controller' => 'configurations')); ?></li> -->
		<li><?php echo $this->Html->link(__('List Authors', true), array('action' => 'index'));?></li>
		<!-- <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Author.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Author.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li> -->
	</ul>
</div>
<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>