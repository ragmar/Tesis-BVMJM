<div class="items form">
<?php echo $this->Form->create('Item', array('enctype' => 'multipart/form-data'));?>
	<fieldset>
		<!-- <legend><?php __('Add Item'); ?></legend> -->

	<?php
		echo $this->Form->input('title', array('label' => 'Titulo de la Obra', 'style' => 'width: 100%'));
		echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Auth.User.id')));
		echo $this->Form->input('author_id', array('empty' => __('Author', true), 'label' => false));
		//echo $this->Form->input('titleunif');
		echo $this->Form->input('type_id', array('empty' => __('Type', true), 'label' => false));
		//echo $this->Form->input('publisher');
		//echo $this->Form->input('place');
		echo $this->Form->input('topic_id', array('empty' => __('Topic', true), 'label' => false));
		/*
		echo $this->Form->input('number_editor_028');
		echo $this->Form->input('028_a');
		echo $this->Form->input('040_a');
		echo $this->Form->input('041_a');
		echo $this->Form->input('041_b');
		echo $this->Form->input('041_h');
		echo $this->Form->input('044_a');
		echo $this->Form->input('082_a');
		echo $this->Form->input('082_b');
		echo $this->Form->input('092_a');
		echo $this->Form->input('100_a');
		echo $this->Form->input('100_b');
		echo $this->Form->input('100_c');
		echo $this->Form->input('100_d');
		echo $this->Form->input('110_a');
		echo $this->Form->input('110_b');
		echo $this->Form->input('110_c');
		echo $this->Form->input('130_a');
		echo $this->Form->input('240_a');
		echo $this->Form->input('245_a');
		echo $this->Form->input('245_b');
		echo $this->Form->input('245_c');
		echo $this->Form->input('245_h');
		echo $this->Form->input('246_a');
		echo $this->Form->input('246_i');
		echo $this->Form->input('250_a');
		echo $this->Form->input('260_a');
		echo $this->Form->input('260_b');
		echo $this->Form->input('260_c');
		echo $this->Form->input('300_a');
		echo $this->Form->input('300_b');
		echo $this->Form->input('300_c');
		echo $this->Form->input('300_e');
		echo $this->Form->input('490_a');
		echo $this->Form->input('490_v');
		echo $this->Form->input('490_x');
		echo $this->Form->input('500_a_1');
		echo $this->Form->input('501_a');
		echo $this->Form->input('504_a');
		echo $this->Form->input('504_b');
		echo $this->Form->input('505_a');
		echo $this->Form->input('510_a');
		echo $this->Form->input('510_c');
		echo $this->Form->input('518_a');
		echo $this->Form->input('520_a');
		echo $this->Form->input('534_a');
		echo $this->Form->input('534_c');
		echo $this->Form->input('534_l');
		echo $this->Form->input('534_p');
		echo $this->Form->input('546_a');
		echo $this->Form->input('561_a');
		echo $this->Form->input('600_a');
		echo $this->Form->input('600_d');
		echo $this->Form->input('610_a');
		echo $this->Form->input('610_b');
		echo $this->Form->input('650_a');
		echo $this->Form->input('650_x');
		echo $this->Form->input('651_a');
		echo $this->Form->input('651_x');
		echo $this->Form->input('653_a');
		echo $this->Form->input('700_a');
		echo $this->Form->input('700_d');
		echo $this->Form->input('700_e');
		echo $this->Form->input('710_a');
		echo $this->Form->input('710_b');
		echo $this->Form->input('740_a');
		echo $this->Form->input('800_a');
		echo $this->Form->input('800_d');
		echo $this->Form->input('800_t');
		echo $this->Form->input('850_a');
		echo $this->Form->input('852_a');
		echo $this->Form->input('852_c');
		echo $this->Form->input('856_a');
		echo $this->Form->input('856_u');
		echo $this->Form->input('020_a');
		echo $this->Form->input('500_a_2');
		echo $this->Form->input('773_a');
		echo $this->Form->input('773_b');
		echo $this->Form->input('773_d');
		echo $this->Form->input('773_g');
		echo $this->Form->input('773_h');
		echo $this->Form->input('773_k');
		echo $this->Form->input('773_n');
		echo $this->Form->input('773_q');
		echo $this->Form->input('773_t');
		echo $this->Form->input('773_z');
		echo $this->Form->input('773_7');
		echo $this->Form->input('650_y');
		*/
	?>
	<?php echo $this->Form->year('year', 1700, date('Y'), null, array('label' => false, 'empty' => __('Year', true))); ?>
	<?php echo $this->Form->input('item', array('label' => 'Archivo o Documento (Preferiblemente PDF).', 'type' => 'file')); ?>
	<?php //echo $this->Form->input('cover', array('label' => 'Portada de la Obra', 'type' => 'file')); ?>
	<br />
	<?php echo $this->Form->input('published', array('checked' => 'checked')); ?>
	<br />
	<?php echo $this->Form->input('description'); ?>
	<?php echo $this->Form->input('dedicatory'); ?>
	
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<!-- <h3><?php __('Actions'); ?></h3> -->
	<ul>
		<li><?php echo $this->Html->link(__('List Items', true), array('action' => 'index'));?></li>
		<!--
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics', true), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types', true), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors', true), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		-->
		<li><?php echo $this->Html->link(__('New Author', true), array('controller' => 'authors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type', true), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic', true), array('controller' => 'topics', 'action' => 'add')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('List Values', true), array('controller' => 'values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Value', true), array('controller' => 'values', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicators', true), array('controller' => 'indicators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicator', true), array('controller' => 'indicators', 'action' => 'add')); ?> </li>-->
	</ul>
</div>