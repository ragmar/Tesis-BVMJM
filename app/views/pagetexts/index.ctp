<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li>Páginas</li>
</ul>
<div>
<div class="pagetexts index">
	<h2><?php __('Páginas');?></h2>
	<table class="table">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('title');?></th>
		<th><?php echo $this->Paginator->sort('Activa', 'enabled');?></th>
		<!-- <th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th> -->
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pagetexts as $pagetext):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pagetext['Pagetext']['id']; ?>&nbsp;</td>
		<td><?php echo $pagetext['Pagetext']['title']; ?>&nbsp;</td>
		<td style="text-align: center;"><?php if ($pagetext['Pagetext']['enabled']) {__('Yes');} else {__('No');} ?>&nbsp;</td>
		<!-- <td><?php if ($pagetext['Pagetext']['created']) echo $this->Time->format('d-m-Y', $pagetext['Pagetext']['created']); ?>&nbsp;</td>
		<td><?php if ($pagetext['Pagetext']['modified']) echo $this->Time->format('d-m-Y', $pagetext['Pagetext']['modified']); ?>&nbsp;</td> -->
		<td class="actions" style="width: 25%">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $pagetext['Pagetext']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $pagetext['Pagetext']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $pagetext['Pagetext']['id']), array('class' => 'btn btn-primary'), sprintf(__('Are you sure you want to delete # %s?', true), $pagetext['Pagetext']['title'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php if ($this->Paginator->params['paging']['Pagetext']['pageCount'] > 1) { ?>
	<div class="pagination" align="center">
		<ul>
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
		</ul>
	</div><br />
	<?php } ?>
</div>
<div class="actions">
	<!-- <h3><?php __('Actions'); ?></h3> -->
	<?php echo $this->Html->link(__('Nueva Página', true), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
</div>
</div>