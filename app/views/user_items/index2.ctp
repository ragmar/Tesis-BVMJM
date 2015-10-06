<?php
function marc21_decode($camp = null) {
	if (!empty($camp)) {
		$c = explode('^', $camp);
		$indicators = $c[0];
		unset($c[0]);
		
		$i = 0;
		foreach ($c as $v){
			$c[substr($v, 0, 1)] = substr($v, 1, strlen($v)-1);
			$i++;
			unset($c[$i]);
		}
		$c['indicators'] = $indicators;
		return $c;
	} else {
		return false;
	}
}
?>
<ul class="breadcrumb" style="margin: 0">
  <li>
  	<a href="<?php echo $this->base; ?>">Inicio</a>
  </li>
  <li>Mi Biblioteca</li>
</ul>

<div class="userItems index">
<div class="col-md-12 column">
	<h2>Mi Biblioteca</h2>
	<br />
	<?php if (count($userItems) > 0) { ?>
		<table class="table">
			<tr>
				<!-- <th><?php echo $this->Paginator->sort('id');?></th>
				<th><?php echo $this->Paginator->sort('user_id');?></th> -->
				<th>Portada</th>
				<th><?php echo $this->Paginator->sort('Obra', 'item_id');?></th>
				<th><?php echo $this->Paginator->sort('Autor', '100');?></th>
				<th><?php echo $this->Paginator->sort('type_id');?></th>
				<!-- <th><?php echo $this->Paginator->sort('created');?></th>
				<th><?php echo $this->Paginator->sort('modified');?></th> -->
				<th class="actions">Acción</th>
			</tr>
			<?php
			$i = 0;
			foreach ($userItems as $userItem):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>
			<?php if ($userItem['Item']['id']) { ?>
			<tr<?php echo $class;?>>
				<td>
					<?php
						if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){
							if (($userItem['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] .$this->base."/app/webroot/attachments/files/small/" . $userItem['Item']['cover_path']))){
								echo $this->Html->image("/app/webroot/attachments/files/small/" . $userItem['Item']['cover_path'], array('title' => $userItem['Item']['cover_name']));
							} else {
								echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('width' => '5%'));
							}
						} else {
							if (($userItem['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/attachments/files/small/" . $userItem['Item']['cover_path']))){
								echo $this->Html->image("/app/webroot/attachments/files/small/" . $userItem['Item']['cover_path'], array('title' => $userItem['Item']['cover_name']));
							} else {
								echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('width' => '5%'));
							}
						}
					?>
				</td>
				<td>
					<?php $controller = array('1' => 'books', '2' => 'magazines', '3' => 'manuscripts', '4' => 'printed', '5' => 'iconographies', '6' => 'works'); ?>
					<?php
						$t1 = $userItem['Item']['h-006'];
						$t2 = $userItem['Item']['h-007'];
						$type = 0;
						
						// Tipo libro.
						if (($t1 == 'a') && ($t2 == 'm')) {
							$type = 1;
						}
						
						// Tipo parte de libro.
						if (($t1 == 'a') && ($t2 == 'a')) {
							$type = 1;
						}
						
						// Tipo revista.
						if (($t1 == 'a') && ($t2 == 's')) {
							$type = 2;
						}
						
						// Tipo parte de revista.
						if (($t1 == 'a') && ($t2 == 'b')) {
							$type = 2;
						}
	
						// Música impresa.
						if (($t1 == 'c') && ($t2 == 'm')) {
							$type = 3;
						}
						
						// Música manuscrita.
						if (($t1 == 'd') && ($t2 == 'm')) {
							$type = 4;
						}
					?>
					<?php
						if (!empty($userItem['Item']['245'])) {
							$title = marc21_decode($userItem['Item']['245']);
							if ($title) {
								echo $this->Html->link($title['a']. '.', array('controller' => $controller[$type], 'action' => 'view', $userItem['Item']['id']));
								if ((isset($title['b'])) || (isset($title['c'])) || (isset($title['h']))) {echo "<br />";}
								if (isset($title['b'])) {echo ' <i>' . $title['b']. '.</i>';}
								if (isset($title['c'])) {echo ' ' . $title['c']. '.';}
								if (isset($title['h'])) {echo ' ' . $title['h']. '.';}
							}
						}
					?>
				</td>
				<td>
					<?php
						if (!empty($userItem['Item']['100'])) {
							$author = marc21_decode($userItem['Item']['100']);
							echo $author['a'] . '.';
							if (isset($author['d'])) {echo ' ' . $author['d']. '.';}
						} else {
							echo "-";
						}
					?>
				</td>
				<td>
				<?php
					$t1 = $userItem['Item']['h-006'];
					$t2 = $userItem['Item']['h-007'];
					
					// Tipo libro.
					if (($t1 == 'a') && ($t2 == 'm')) {
						echo "Libro.";
					}
					
					// Tipo parte de libro.
					if (($t1 == 'a') && ($t2 == 'a')) {
						echo "Segmento de un Libro.";
					}
					
					// Tipo revista.
					if (($t1 == 'a') && ($t2 == 's')) {
						echo "Hemerografía.";
					}
					
					// Tipo parte de revista.
					if (($t1 == 'a') && ($t2 == 'b')) {
						echo "Segmento de una Hemerografía.";
					}

					// Música impresa.
					if (($t1 == 'c') && ($t2 == 'm')) {
						echo "Música Impresa.";
					}
					
					// Música manuscrita.
					if (($t1 == 'd') && ($t2 == 'm')) {
						echo "Música Manuscrita.";
					}
				?>
				</td>
				<!-- <td><?php echo $userItem['UserItem']['created']; ?>&nbsp;</td>
				<td><?php echo $userItem['UserItem']['modified']; ?>&nbsp;</td> -->
				<td class="actions">
					<?php //echo $this->Html->link(__('View', true), array('action' => 'view', $userItem['UserItem']['id'])); ?>
					<?php //echo $this->Html->link(__('Edit', true), array('action' => 'edit', $userItem['UserItem']['id'])); ?>
					<?php
						if (isset($title['a'])) {
							echo $this->Html->link(__('Delete', true), array('action' => 'delete', $userItem['UserItem']['id']), array('class' => 'btn btn-primary'), sprintf(__('Seguro desea eliminar "%s"?', true), $title['a']));
						}
					?>
				</td>
			</tr>
			<?php } ?>
			<?php endforeach; ?>
		</table>
	<?php } else { ?>
		<p>No ha agregado obras a su biblioteca.</p>
		<br /><br /><br /><br /><br />
	<?php } ?>
	
	<?php if ($this->Paginator->params['paging']['UserItem']['pageCount'] > 1) { ?>
	<div class="pagination" align="center">
		<ul>
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
		</ul>
	</div><br />
	<?php } ?>
</div>
</div>