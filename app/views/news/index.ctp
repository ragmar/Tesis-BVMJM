
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li>Noticias</li>
</ul>

<div>
<div class="news index">
	<h2><?php __('Noticias');?></h2>
	<table class="table">
	<tr>
		<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
		<th><?php echo $this->Paginator->sort('title');?></th>
		<!-- <th><?php echo $this->Paginator->sort('Contenido', 'content');?></th> -->
		<th><?php echo $this->Paginator->sort('published');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<!-- <th><?php echo $this->Paginator->sort('modified');?></th> -->
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($news as $news):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $news['News']['id']; ?>&nbsp;</td> -->
		<td><?php echo $news['News']['title']; ?>&nbsp;</td>
		<!-- <td><?php echo $news['News']['content']; ?>&nbsp;</td> -->
		<!-- <td><?php echo $news['News']['content1']; ?>&nbsp;</td> -->
		<td style="text-align: center;"><?php if($news['News']['published']){echo "Si";} else {echo "No";} ?>&nbsp;</td>
		<td><?php echo $time->format('d-m-Y', $news['News']['created']); ?>&nbsp;</td>
		<!-- <td><?php echo $time->format('d-m-Y', $news['News']['modified']); ?>&nbsp;</td> -->
		<td class="actions" style="width: 25%">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $news['News']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $news['News']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $news['News']['id']), array('class' => 'btn btn-primary'), sprintf(__('Are you sure you want to delete # %s?', true), $news['News']['title'])); ?>
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

	<?php if ($this->Paginator->params['paging']['News']['pageCount'] > 1) { ?>
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
	<?php echo $this->Html->link(__('Nueva Noticia', true), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
</div>
</div>