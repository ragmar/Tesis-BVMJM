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
<ul class="breadcrumb" style="margin: 0">
	<li><?php echo $this->Html->link(__('Volver', true), $_SERVER['HTTP_REFERER']); ?><span class="divider">/</span></li>
	<li><a href="<?php echo $this->base; ?>/magazines/author">Autor</a><span class="divider">/</span></li>
	<li><?php echo $author['Author']['fullname']; ?><span class="divider">/</span></li>
</ul>

<div align="center" style="height: 26px; padding-top: 5px; color: white; font-size: 18px; background: -webkit-linear-gradient(#A89587, #55473C); background: -moz-linear-gradient(#A89587, #55473C); background: -o-linear-gradient(#A89587, #55473C);"><strong>Autor</strong></div>

<div style="padding-left: 50px; padding-right: 50px;">

<!--
<div style="height: 46px; border-bottom-style: inset; border-bottom-color: #BBBBBB;">
<br />

<table style="font-size: smaller; width: 75%;">
	<tr>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><strong><a href="<?php echo $this->base; ?>/magazines">Presentación</a></strong></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/century">Siglo</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/author">Autor</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/title">Título</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/year">Año</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/matter">Materia</a></td>
	</tr>
</table>

</div>
-->

<div <?php if (($this->Session->check('Auth.User')) && ($this->Session->read('Auth.User.group_id') != 3)) {echo "class='authors view'";} ?>>
<h2><?php echo $author['Author']['fullname']; ?>.<?php //__('Author');?></h2>
	<dl class="dl-horizontal"><?php $i = 0; $class = ' class="altrow"';?>
		<!-- <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['id']; ?>
			&nbsp;
		</dd>
		-->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php //__('Picture'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if ($author['Author']['picture']) echo $this->Html->image("/webroot/files/authors/" . $author['Author']['picture'], array('width' => '40px', 'class' => 'img-polaroid zoomTarget', 'data-closeclick' => 'true')); ?>&nbsp;
			&nbsp;
		</dd>
		<!--
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php //__('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['fullname']; ?>
			&nbsp;
		</dd>
		-->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php //__('Fullname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $author['Author']['fullname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php if ($author['Author']['author_file_path']) echo $this->Html->image("/webroot/attachments/files/med/" . $author['Author']['author_file_path'], array('width' => '100px', 'class' => 'img-polaroid zoomTarget', 'data-closeclick' => 'true')); ?>&nbsp;<?php //__('Biography'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['biography']; ?>
			&nbsp;
		</dd>
		<!--
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d-m-Y', $author['Author']['created']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d-m-Y', $author['Author']['modified']); ?>
			&nbsp;
		</dd>
		-->
	</dl>
</div>
<?php if (($this->Session->check('Auth.User')) && ($this->Session->read('Auth.User.group_id') != 3)) { ?>
<div class="actions">
	<br />
	<!-- <h3><?php __('Actions'); ?></h3> -->
	<ul>
		<!-- <li><?php //echo $this->Html->link(__('Configuration', true), array('controller' => 'configurations')); ?></li> -->
		<li><?php echo $this->Html->link(__('List Authors', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Author', true), array('action' => 'edit', $author['Author']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Author', true), array('action' => 'delete', $author['Author']['id']), null, sprintf(__('Desea eliminar el autor(a) %s %s?', true), $author['Author']['name'], $author['Author']['lastname'])); ?> </li>
		<!-- <li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li> -->
	</ul>
</div>
<?php } ?>
<div class="related">
	<h3 style="text-align: center"><?php __('Sus Obras');?></h3>
	<?php if (!empty($author['Item'])):?>
	<table>
	<tr>
		<!-- <th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th> -->
		<th><?php __('Cover'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Materia'); ?></th>
		<!-- <th><?php __('Author'); ?></th> -->
		<!-- <th><?php __('Titleunif'); ?></th>
		<th><?php __('Publisher'); ?></th>
		<th><?php __('Place'); ?></th> -->
		<th><?php __('Year'); ?></th>
		<!-- <th><?php __('Description'); ?></th>
		<th><?php __('Dedicatory'); ?></th>
		<th><?php __('File'); ?></th> -->
		<!-- <th><?php __('Published'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th> -->
	</tr>
	<?php
		$i = 0;
		foreach ($author['Item'] as $item):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<!-- <td><?php echo $item['id'];?></td>
			<td><?php echo $item['user_id'];?></td> -->
			<td>
				<?php //echo $item['cover'];?>
				<?php //echo $this->Html->image("/webroot/files/covers/" . $item['cover_path'], array('width' => '60px', 'class' => 'img-polaroid zoomTarget', 'data-closeclick' => 'true')); ?>
				<?php if (!empty($item['ItemsPicture'])):?>
				<?php echo $this->Html->image("/webroot/attachments/files/big/" . $item['ItemsPicture'][0]['picture_file_path'], array('width' => '60px', 'class' => 'img-polaroid zoomTarget', 'data-closeclick' => 'true')); ?>
				<?php endif; ?>
			</td>
			<td>
				<?php
					//debug($_SERVER['HTTP_REFERER']);
					//echo $this->Html->link($item['title'], array('controller' => 'items', 'action' => 'view', $item['id']));
					echo $item['title'];
				?>
			</td>
			<td><?php echo $item['Type']['name'];?></td>
			<td>
				<a title="<?php echo $item['Topic']['description'];?>" href="" onclick="return false;"><?php echo $item['Topic']['name'];?></a>
			</td>
			<!-- <td><?php echo $item['author_id'];?></td> -->
			<!-- <td><?php echo $item['titleunif'];?></td>
			<td><?php echo $item['publisher'];?></td>
			<td><?php echo $item['place'];?></td> -->
			<td><?php echo $item['year'];?></td>
			<!-- <td><?php echo $item['description'];?></td>
			<td><?php echo $item['dedicatory'];?></td>
			<td><?php echo $item['file'];?></td>-->
			<!-- <td><?php echo $item['published'];?></td>
			<td><?php echo $item['created'];?></td>
			<td><?php echo $item['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'items', 'action' => 'view', $item['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'items', 'action' => 'edit', $item['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'items', 'action' => 'delete', $item['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $item['id'])); ?>
			</td> -->
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add'));?> </li>
		</ul>
	</div> -->
</div>
<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>