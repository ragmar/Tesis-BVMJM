<div class="events view">
<h2><?php  __('Evento');?></h2>
	<dl class="dl-horizontal"><?php $i = 0; $class = ' class="altrow"';?>
		<!-- <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['id']; ?>
			&nbsp;
		</dd> -->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Título'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Inicio'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d-m-Y h:i:s a', $event['Event']['start']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fin'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d-m-Y h:i:s a', $event['Event']['end']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sumario'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['summary']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Todo el Día'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if($event['Event']['allDay']) {__('Si');} else {__('No');} ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d-m-Y', $event['Event']['created']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d-m-Y', $event['Event']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<br />
<?php echo $this->Html->link(__('Volver', true), array('action' => 'index'), array('class' => 'btn btn-primary')); ?>