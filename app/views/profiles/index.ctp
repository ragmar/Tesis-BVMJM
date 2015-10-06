<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li>Perfiles</li>
</ul>
<div>
<div class="profiles index">
	<h2><?php __('Profiles');?></h2>
	<table class="table">
	<tr>
			<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
			<th><?php echo $this->Paginator->sort('name');?></th>
			<!-- <th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th> -->
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($profiles as $profile):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $profile['Profile']['id']; ?>&nbsp;</td> -->
		<td><?php echo $profile['Profile']['name']; ?>&nbsp;</td>
		<!-- <td><?php echo $profile['Profile']['created']; ?>&nbsp;</td>
		<td><?php echo $profile['Profile']['modified']; ?>&nbsp;</td> -->
		<td class="actions" style="width: 25%;">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $profile['Profile']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $profile['Profile']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $profile['Profile']['id']), array('class' => 'btn btn-primary'), sprintf(__('Are you sure you want to delete # %s?', true), $profile['Profile']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<?php if ($this->Paginator->params['paging']['Profile']['pageCount'] > 1) { ?>
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
	<?php echo $this->Html->link(__('New Profile', true), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
</div>
</div>