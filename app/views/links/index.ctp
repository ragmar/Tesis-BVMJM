<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li>Enlaces</li>
</ul>
<div>
<div class="links index">
	<h2><?php __('Enlaces');?></h2>
	<table class="table">
	<tr>
		<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
		<th><?php echo $this->Paginator->sort('title');?></th>
		<th><?php echo $this->Paginator->sort('url');?></th>
		<!-- <th><?php echo $this->Paginator->sort('description');?></th> -->
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($links as $link):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $link['Link']['id']; ?>&nbsp;</td> -->
		<td><?php echo $link['Link']['title']; ?>&nbsp;</td>
		<td><?php echo $link['Link']['url']; ?>&nbsp;</td>
		<!-- <td><?php echo $link['Link']['description']; ?>&nbsp;</td> -->
		<td><?php echo $time->format('d-m-Y', $link['Link']['created']); ?>&nbsp;</td>
		<td><?php echo $time->format('d-m-Y', $link['Link']['modified']); ?>&nbsp;</td>
		<td class="actions" style="width: 25%;">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $link['Link']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $link['Link']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $link['Link']['id']), array('class' => 'btn btn-primary'), sprintf(__('Are you sure you want to delete # %s?', true), $link['Link']['title'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<!-- <p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p> -->

	<?php if ($this->Paginator->params['paging']['Link']['pageCount'] > 1) { ?>
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
	<?php echo $this->Html->link(__('Nuevo Enlace', true), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
</div>
</div>