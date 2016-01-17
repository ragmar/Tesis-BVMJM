<ul class="breadcrumb">
    <li>
    	<?php echo $this->Html->link(__('Inicio', true), array('controller' => 'configuration', 'action' => 'index')); ?>
    	<span class="divider">/</span>
    </li>
    <li class="active">
    	<?php __('Enlaces'); ?>
    </li>
</ul>

<div style="padding-left: 50px; padding-right: 50px;">

<div class="links">
	<h2 style="text-align: center;"><?php __('Enlaces');?></h2>
	<ul>
	<?php foreach ($links as $link): ?>
		<li style="font-size: 16px"><?php echo $this->Html->link($link['Link']['title'], 'http://'.$link['Link']['url'], array('target' => '_blank')); ?>:&nbsp;<?php echo $link['Link']['description']; ?></li>
	<?php endforeach; ?>
	</ul>
</div>

<br />

<!-- <div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div> -->