<div class="faqs view">
<h2><?php  __('FAQ (Pregunta Frecuente)');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<!-- <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faq['Faq']['id']; ?>
			&nbsp;
		</dd> -->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pregunta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faq['Faq']['question']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Respuesta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faq['Faq']['answer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d-m-Y', $faq['Faq']['created']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d-m-Y', $faq['Faq']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<br />
<?php echo $this->Html->link(__('Volver', true), array('action' => 'index'), array('class' => 'btn btn-primary')); ?>