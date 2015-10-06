<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li>Visitas</li>
</ul>
<div>
<div class="searches">
	<h2><?php __('Visitas');?></h2>
	<!-- Ayer:  -->
	Hoy: <?php echo $today; ?>
	<!-- <br />Esta semana: 
	<br />Este mes:
	<br />Este año: -->
	<br />Total: <?php echo $total; ?>
	
	<br /><br />
	
	<table class="table">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('user_id');?></th>
		<th><?php echo $this->Paginator->sort('ip');?></th>
		<!-- <th><?php echo $this->Paginator->sort('session');?></th>
		<th><?php echo $this->Paginator->sort('engine');?></th> -->
		<th><?php echo $this->Paginator->sort('Controlador', 'controller');?></th>
		<th><?php echo $this->Paginator->sort('Acción', 'action');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<!-- <th><?php echo $this->Paginator->sort('modified');?></th>
		<th class="actions"><?php __('Actions');?></th> -->
	</tr>
	<?php
	$i = 0;
	foreach ($logins as $login):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $login['Login']['id']; ?>&nbsp;</td>
		<td style="text-align: center;">
		<?php
			if ($login['User']['username']) {
				echo $this->Html->link($login['User']['username'], array('controller' => 'users', 'action' => 'view', $login['User']['id']));
			} else {
				echo "-";
			}
		?>
		</td>
		<td><?php echo $login['Login']['ip']; ?>&nbsp;</td>
		<!-- <td><?php echo $login['Login']['session']; ?>&nbsp;</td>
		<td><?php echo $login['Login']['engine']; ?>&nbsp;</td> -->
		<td><?php echo $login['Login']['controller']; ?>&nbsp;</td>
		<td><?php echo $login['Login']['action']; ?>&nbsp;</td>
		<td><?php echo $time->format('d-m-Y h:m:s a', $login['Login']['created']); ?>&nbsp;</td>
		<!-- <td><?php echo $login['Login']['modified']; ?>&nbsp;</td> -->
		<!--
		<td class="actions">
			<?php //echo $this->Html->link(__('View', true), array('action' => 'view', $search['Login']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit', true), array('action' => 'edit', $search['Login']['id'])); ?>
			<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $search['Login']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $search['Search']['id'])); ?>
		</td>
		-->
	</tr>
<?php endforeach; ?>
	</table>
	<!-- <p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?></p> -->

	<?php if ($this->Paginator->params['paging']['Login']['pageCount'] > 1) { ?>
	<div class="pagination" align="center">
		<ul>
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
		</ul>
	</div><br />
	<?php } ?>
</div>
<!--
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Search', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->
</div>