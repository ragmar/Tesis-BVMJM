<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li>Usuarios</li>
</ul>
<div>
<div class="users index">
	<h2><?php __('Users');?></h2>
	<table class="table">
	<tr>
		<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
		<th><?php echo $this->Paginator->sort('name');?></th>
		<!-- <th><?php echo $this->Paginator->sort('lastname');?></th> -->
		<th><?php echo $this->Paginator->sort('group_id');?></th>
		<!-- <th><?php echo $this->Paginator->sort('profile_id');?></th> -->
		<th><?php echo $this->Paginator->sort('country_id');?></th>
		<!-- <th><?php echo $this->Paginator->sort('email');?></th>
		<th><?php echo $this->Paginator->sort('username');?></th>
		<th><?php echo $this->Paginator->sort('password');?></th>
		<th><?php echo $this->Paginator->sort('country');?></th>
		<th><?php echo $this->Paginator->sort('city');?></th>
		<th><?php echo $this->Paginator->sort('address');?></th>
		<th><?php echo $this->Paginator->sort('postal_code');?></th>
		<th><?php echo $this->Paginator->sort('gender');?></th> -->
		<th><?php echo $this->Paginator->sort('active');?></th>
		<!-- <th><?php echo $this->Paginator->sort('last_login');?></th>
		<th><?php echo $this->Paginator->sort('ip');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th> -->
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $user['User']['id']; ?>&nbsp;</td> -->
		<td><?php echo $user['User']['name'].' '.$user['User']['lastname']; ?>&nbsp;</td>
		<!-- <td><?php echo $user['User']['lastname']; ?>&nbsp;</td> -->
		<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
		</td>
		<!-- <td>
			<?php //echo $this->Html->link($user['Profile']['name'], array('controller' => 'profiles', 'action' => 'view', $user['Profile']['id'])); ?>
			<?php //echo $user['Profile']['name']; ?>
		</td> -->
		<td>
			<?php //echo $this->Html->link($user['Country']['name'], array('controller' => 'countries', 'action' => 'view', $user['Country']['id'])); ?>
			<?php echo $user['Country']['name']; ?>
		</td>
		<!-- <td><?php echo $user['User']['email']; ?>&nbsp;</td>
		<td><?php echo $user['User']['username']; ?>&nbsp;</td>
		<td><?php echo $user['User']['password']; ?>&nbsp;</td>
		<td><?php echo $user['User']['country']; ?>&nbsp;</td>
		<td><?php echo $user['User']['city']; ?>&nbsp;</td>
		<td><?php echo $user['User']['address']; ?>&nbsp;</td>
		<td><?php echo $user['User']['postal_code']; ?>&nbsp;</td>
		<td><?php echo $user['User']['gender']; ?>&nbsp;</td> -->
		<td style="text-align: center;"><?php if ($user['User']['active']) {__('Si');} else {__('No');} ?>&nbsp;</td>
		<!-- <td><?php echo $time->format('d-m-Y', $user['User']['last_login']); ?>&nbsp;</td>
		<td><?php echo $user['User']['ip']; ?>&nbsp;</td>
		<td><?php echo $user['User']['created']; ?>&nbsp;</td>
		<td><?php echo $user['User']['modified']; ?>&nbsp;</td> -->
		<td class="actions" style="width: 25%">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-primary'), sprintf(__('Desea eliminar a %s?', true), $user['User']['fullname'])); ?>
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

	<?php if ($this->Paginator->params['paging']['User']['pageCount'] > 1) { ?>
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
	<?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index'), array('class' => 'btn btn-primary')); ?>
</div>
</div>