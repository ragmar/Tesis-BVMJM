<?php
echo $this->Html->script('zoomooz/jquery.zoomooz-helpers');
echo $this->Html->script('zoomooz/jquery.zoomooz-anim');
echo $this->Html->script('zoomooz/jquery.zoomooz-core');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomTarget');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomContainer');
echo $this->Html->script('zoomooz/purecssmatrix');
echo $this->Html->script('zoomooz/sylvester.src.stripped');
//echo $this->Html->css('website-assets/website');
?>

<div style="padding-left: 50px; padding-right: 50px;">

<div class="authors index">
	<h2><?php __('Authors');?></h2>
	<table>
	<tr>
		<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
		<th><?php echo $this->Paginator->sort('picture');?></th>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th><?php echo $this->Paginator->sort('lastname');?></th>
		<!-- <th><?php echo $this->Paginator->sort('biography');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th> -->
		<th class="actions"><?php //__('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($authors as $author):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $author['Author']['id']; ?>&nbsp;</td> -->
		<td>
			<?php
				if (!empty($author['Author']['author_file_path'])) {
					echo $this->Html->image("/webroot/attachments/files/med/" . $author['Author']['author_file_path'], array('title' => $author['Author']['name'].' '.$author['Author']['lastname'], 'width' => '70px', 'class' => 'img-polaroid zoomTarget', 'data-closeclick' => 'true'));
				} else {
					echo $this->Html->image("/webroot/attachments/files/med/" . "sin_foto.jpg", array('width' => '70px', 'class' => 'img-polaroid zoomTarget', 'data-closeclick' => 'true'));
				}
			?>&nbsp;
		</td>
		<td><?php echo $author['Author']['name']; ?>&nbsp;</td>
		<td><?php echo $author['Author']['lastname']; ?>&nbsp;</td>
		<!-- <td><?php echo $author['Author']['biography']; ?>&nbsp;</td>
		<td><?php echo $author['Author']['created']; ?>&nbsp;</td>
		<td><?php echo $author['Author']['modified']; ?>&nbsp;</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $author['Author']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $author['Author']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $author['Author']['id']), null, sprintf(__('Desea eliminar al autor(a) %s %s?', true), $author['Author']['name'], $author['Author']['lastname'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<!-- <p style="text-align: center;">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p> -->
	
	<?php if ($this->Paginator->params['paging']['Author']['pageCount'] > 1) { ?>
	<div class="pagination" align="center">
		<ul>
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
		</ul>
	</div><br />
	<?php } ?>
</div>
<div class="actions" style="height: 350px;">
	<!-- <h3><?php __('Actions'); ?></h3> -->
	<br />
	<ul>
		<!-- <li><?php //echo $this->Html->link(__('Configuration', true), array('controller' => 'configurations')); ?></li> -->
		<li><?php echo $this->Html->link(__('New Author', true), array('action' => 'add')); ?></li>
		<!-- <li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li> -->
	</ul>
</div>
<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>