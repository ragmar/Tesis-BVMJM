<div class="news view">
<h2><?php __('Noticia');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<!-- <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $news['News']['id']; ?>
			&nbsp;
		</dd> -->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $news['News']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Contenido'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $news['News']['content']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripción'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $news['News']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d-m-Y', $news['News']['created']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d-m-Y', $news['News']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<br />
<?php echo $this->Html->link(__('Volver', true), array('action' => 'index'), array('class' => 'btn btn-primary')); ?>