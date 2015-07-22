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

if (!empty($this->data)) { // Si viene de una búsqueda.
	$busqueda = 1;
	if (true) {
		
	}
} else {
	$busqueda = 0;
}
?>
<ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>/magazines">Revistas</a> <span class="divider">/</span></li>
  <?php if (!isset($this->passedArgs[0])) { ?>
  <li>Siglo<span class="divider">/</span></li>
  <?php } else { ?>
  <li><a href="<?php echo $this->base; ?>/magazines/century">Siglo</a><span class="divider">/</span></li>
  <li class="active"><?php echo $this->passedArgs[0]; ?></li>
  <?php } ?>
</ul>

<div align="center" style="padding-top: 5px; color: #828793; font-size: 18px; background: -webkit-linear-gradient(#d0d6e2, #ffffff); background: -moz-linear-gradient(#d0d6e2, #ffffff); background: -o-linear-gradient(#d0d6e2, #ffffff);"><strong>Módulo de Revistas</strong></div>

<div style="padding-left: 50px; padding-right: 50px;">

<div style="height: 46px; border-bottom-style: inset; border-bottom-color: #BBBBBB;">
<br />
<table style="font-size: smaller; width: 75%;">
	<tr>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><strong><a href="<?php echo $this->base; ?>/magazines">Presentación</a></strong></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s2.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/century">Siglo</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/author">Autor</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/title">Título</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/year">Año</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/matter">Materia</a></td>
	</tr>
</table>
</div>

<div class='century view' style="text-align: center;">

	<table>
	<tr>
		<th><?php __('Cover');?></th>
		<th><?php __('Detalles de la Obra');?></th>
	</tr>
	<?php foreach ($items as $item): ?>
	<?php
	$color = "#b3bbce";
		/*switch ($item['Type']['id']){
			case 1:
				$color = "#9dae8a";
				$controller = "books";
				break;
			case 2:
				$color = "#b3bbce";
				$controller = "magazines";
				break;
			case 3:
				$color = "#aea16c";
				$controller = "";
				break;
			case 4:
				$color = "#d5b59e";
				$controller = "";
				break;
			case 5:
				$color = "#ba938e";
				$controller = "";
				break;
			case 6:
				$color = "#d1c7be";
				$controller = "";
				break;
			default:
				$color = "white";
				$controller = "";
				break;
		}*/
	?>
	<tr>
		<td style="background-color: <?php echo $color; ?>; text-align: center; width: 80px;">
		<?php
			if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/tesis/webroot/covers/" . $item['Item']['cover_path']))){
				echo $this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('width' => '70px'));
			} else {
				echo $this->Html->image("/webroot/img/sin_portada.jpg", array('width' => '70px'));
			}

			//if (!empty($item['ItemsPicture'])){
				//echo $this->Html->image("/webroot/attachments/files/big/" . $item['ItemsPicture'][0]['picture_file_path'], array('width' => '70px', 'class' => 'img-polaroid zoomTarget', 'data-closeclick' => 'true'));
			//}
		?>
		</td>
		<td>
			<dl class="dl-horizontal">
				<dt style="width: 120px"><?php __('Título:');?></dt>
				<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['245'])) {
							$title = marc21_decode($item['Item']['245']);
							if ($title) {
								if(count($item['UserItems'])) {
									echo $html->image('/img/ts/bookmark.png', array('alt' => 'Mi Biblioteca', 'title' => 'Obra agregada a la biblioteca.', 'style' => 'width: 20px;'));
									echo "&nbsp;";
								}
								echo $this->Html->link($title['a'] . '.', 'view/'.$item['Item']['id'], array('title' => 'Haga click para ver los detalles.'));
								if (isset($title['b'])) {echo ' <i>' . $title['b'] . '.</i>';}
								if (isset($title['c'])) {echo ' ' . $title['c']. '.';}
								if (isset($title['h'])) {echo ' ' . $title['h']. '.';}
							}
						}
					?>
				</dd>
				<?php if (!empty($item['Item']['100'])) { ?>
				<dt style="width: 120px"><?php __('Autor:');?></dt>
				<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['100'])) {
							$author = marc21_decode($item['Item']['100']);
							echo $author['a'] . '.';
							if (isset($author['d'])) {echo ' ' . $author['d']. '.';}
						}
					?>
				</dd>
				<?php } ?>
				<dt style="width: 120px"><?php __('Publicación:');?></dt>
				<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['260'])) {
							$publication = marc21_decode($item['Item']['260']);
							echo $publication['a'] . '.';
							if (isset($publication['b'])) {echo ' ' . $publication['b']. '.';}
							if (isset($publication['c'])) {echo ' ' . $publication['c']. '.';}
						}
					
					?>
				</dd>
				<!--
				<dt style="width: 120px"><?php __('Tipo: ');?></dt>
				<dd style="margin-left: 130px">
					<?php
						$t1 = $item['Item']['h-006'];
						$t2 = $item['Item']['h-007'];
						
						// Tipo libro.
						if (($t1 == 'a') && ($t2 == 'm')) {
							echo "Libro";
						}
						
						// Tipo revista.
						if (($t1 == 'a') && ($t2 == 's')) {
							echo "Revista";
						}
	
						// Música impresa.
						if (($t1 == 'c') && ($t2 == 'm')) {
							echo "Música Impresa";
						}
						
						// Música manuscrita.
						if (($t1 == 'd') && ($t2 == 'm')) {
							echo "Música Manuscrita";
						}
					?>
				</dd>
				-->
				<?php if (!empty($item['Item']['690'])) { ?>
				<dt style="width: 120px"><?php __('Siglo:');?></dt>
				<dd style="margin-left: 130px">
					<?php
						$century = marc21_decode($item['Item']['690']);
						echo '<b>' . $century['a'] . '</b>';
					?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['653'])) { ?>
				<dt style="width: 120px"><?php __('Materia:');?></dt>
				<dd style="margin-left: 130px">
				<?php
					$century = marc21_decode($item['Item']['653']);
					echo $century['a'];
				?>
				</dd>
				<?php } ?>
				<dt style="width: 120px">
				<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') != '3'))) { ?>
					<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $item['Item']['id']), null, sprintf(__("¿Desea eliminar '%s'?", true), $item['Item']['title'])); ?>
				<?php } ?>
				</dt>
				<dd style="margin-left: 130px"></dd>
			</dl>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	
	<!--
	<p align="center">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>
	-->

	<?php if ($this->Paginator->params['paging']['Item']['pageCount'] > 1) { ?>
	<div class="pagination" align="center">
		<ul>
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
		</ul>
	</div><br />
	<?php } ?>
</div>
<?php //if (($this->Session->check('Auth.User')) && ($this->Session->read('Auth.User.group_id') != 3)) { ?>
<div class="actions">
	<br />
	<ul>
		<li><label><?php __('Obras del Siglo:'); ?></label></li>
		<li><?php echo $this->Html->link(__('XVII', true), array('action' => 'century/XVII'), array('title' => '17')); ?></li>
		<li><?php echo $this->Html->link(__('XVIII', true), array('action' => 'century/XVIII'), array('title' => '18')); ?></li>
		<li><?php echo $this->Html->link(__('XIX', true), array('action' => 'century/XIX'), array('title' => '19')); ?></li>
		<li><?php echo $this->Html->link(__('XX', true), array('action' => 'century/XX'), array('title' => '20')); ?></li>
		<li><?php echo $this->Html->link(__('Todas', true), array('action' => 'century/'), array('title' => 'Todas')); ?></li>
		<!--
		<li><?php echo $this->Html->link(__('Configuration', true), array('controller' => 'configurations')); ?></li>
		<li><?php echo $this->Html->link(__('New Item', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors', true), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author', true), array('controller' => 'authors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types', true), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type', true), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics', true), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic', true), array('controller' => 'topics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Values', true), array('controller' => 'values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Value', true), array('controller' => 'values', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicators', true), array('controller' => 'indicators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicator', true), array('controller' => 'indicators', 'action' => 'add')); ?> </li>
		-->
	</ul>
	<br />
	<div style="text-align: center;"><?php echo $this->Html->image('ts/logo_meseron_1.jpg'); ?></div>
	<br />
</div>
<?php //} ?>
<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>