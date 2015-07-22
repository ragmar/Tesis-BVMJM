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
} else {
	$busqueda = 0;
}
?>
<style>
	.btn-primary {
		width: 15px;
		height: 35px;
		margin: 2px 2px 0px 0px;
		padding: 8px 0px 0px 0px;
		text-align: center;
		float: left;
	}
	.btn-primary1{
		color: #fff;
		width: 100px;
		height: 35px;
		margin: 2px 2px 0px 0px;
		padding: 8px 0px 0px 0px;
		text-align: center;
		float: left;
		border-radius: 0px;
	background: #6C3F30;
	border-color: #6C3F30;
	}
	
	.btn-primary:hover {
		text-decoration: none;
	}
	.btn-primary1:hover {
		text-decoration: none;
	}
</style>
<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '2'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
<li>Iconografía Musical en Venezuela</li>
</ul>
<?php } else if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '1'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
<li>Iconografía Musical en Venezuela</li>
</ul>
<?php } else { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/pages">Inicio</a></li>
<li>Iconografía Musical en Venezuela</li>
</ul>
<?php } ?>


<div class='century view'>
	<div class="col-md-9 column">
	<h2>Módulo Iconografía Musical en Venezuela </h2>
	<h2><font size="3">(<?php echo count($items); ?> Obras Cargadas)</font></h2>

		<?php if (count($items) > 0) { ?>
		<table class="table">
			<a name="top" href=""></a>
		<tr>
			<th><?php __('Cover');?></th>
			<th><?php __('Detalles de la Obra');?></th>
		</tr>
		<?php foreach ($items as $item): ?>
		<?php //$color = "#b3bbce"; ?>
		<?php $color = ""; ?>
		<tr>
			<td style="background-color: <?php echo $color; ?>; text-align: center; width: 80px;">
			<?php
				if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/covers/" . $item['Item']['cover_path']))){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px','height'=>'99px', 'url' => array('controller' => 'iconographies', 'action' => 'view', $item['Item']['id'])));
					echo $this->Html->link(__('[Más info..]',true), array('controller' => 'iconographies', 'action' => 'view', $item['Item']['id']));
				} else {
					echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => 'iconographies', 'action' => 'view', $item['Item']['id'])));
					echo $this->Html->link(__('[Más info..]',true), array('controller' => 'iconographies', 'action' => 'view', $item['Item']['id']));
				}
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
									foreach ($item['UserItems'] as $ui):
										if($ui['user_id'] == $this->Session->read('Auth.User.id') && ($ui['item_id'] == $item['Item']['id'])) {
											echo $html->image('/img/ts/bookmark.png', array('alt' => 'Mi Biblioteca', 'title' => 'Obra agregada a la biblioteca.', 'style' => 'width: 20px;'));
											echo "&nbsp;";
										}
									endforeach;
									
									if (!empty($this->data['iconographies']['Titulo'])) {
										echo '<b>' . $title['a'] . '.</b>';
									} else {
										echo $title['a'] . '.';
									}
									
									if (isset($title['b'])) {echo ' <i>' . $title['b'] . '.</i>';}
									if (isset($title['c'])) {echo ' ' . $title['c']. '.';}
									if (isset($title['h'])) {echo ' ' . $title['h']. '.';}
								}
							}
						?>
					</dd>
					<dt style="width: 120px"><?php __('Autor:');?></dt>
					<dd style="margin-left: 130px">
						<?php
							if (!empty($item['Item']['100'])) {
								$author = marc21_decode($item['Item']['100']);
								if (!empty($this->data['iconographies']['Autor'])) {
									echo '<b>' . $author['a'] . '.</b>';
								} else {
									echo $author['a'] . '.';
								}
								if (isset($author['d'])) {echo ' ' . $author['d']. '.';}
							}
						?>
					</dd>
					<?php if (!empty($item['Item']['653'])) { ?>
					<dt style="width: 120px"><?php __('Materia:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$matter = marc21_decode($item['Item']['653']);
						if (!empty($this->data['iconographies']['Materia'])) {
							echo '<b>' . $matter['a'] . '.</b>';
						} else {
							echo $matter['a'] . '.';
						}
					?>
					</dd>
					<?php } ?>
					<dt style="width: 120px"><?php __('Publicación:');?></dt>
					<dd style="margin-left: 130px; text-align: justify; width: 70%">
						<?php
							if (!empty($item['Item']['260'])) {
								$publication = marc21_decode($item['Item']['260']);
								echo $publication['a'] . '.';
							if (isset($publication['b'])) {echo ' : ' . $publication['b']. ', ';}
							if (isset($publication['c'])) {echo '.' . $publication['c']. '.';}
							}
						?>
					</dd>
				
					<?php if (!empty($item['Item']['650'])) { ?>
					<dt style="width: 120px"><?php __('Temas:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$mattername = marc21_decode($item['Item']['650']);
						if (!empty($this->data['iconographies']['Temas'])) {
							echo '<b>' . $mattername['a'] . '.</b>';
						} else {
							echo $mattername['a'] . '.';
						}
						if (isset($mattername['x'])) {echo ' ' . $mattername['x']. '.';}
					?>
					</dd>
					<?php } ?>
				
					
					<?php if (!empty($item['Item']['773'])) { ?>
					<dt style="width: 120px"><?php __('Fuente:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$source = marc21_decode($item['Item']['773']);
						if (!empty($this->data['iconographies']['Fuente'])) {
							echo '<b>' . $source['t'] . '.</b>';
						} else {
							echo $source['t'] . '.';
						}
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
		<?php } else { ?>
			<br />
			<?php if (isset($this->data)) { ?>
				<p>No hay obra que coincidan con ese filtro.</p>
			<?php } else { ?>
				<p>No hay obras en este momento.</p>
			<?php } ?>
			<br /><br /><br /><br /><br />
		<?php } ?>
		
		<?php if ($this->Paginator->params['paging']['Item']['pageCount'] > 1) { ?>
		<div class="pagination" align="center">
			<ul>
				<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
				<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
				<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
			</ul>
		</div>
		<?php } ?>
	</div>
	<div class="col-md-3 column">
		<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') != '3'))) { ?>
			<br />
			<label><?php __('Acciones:'); ?></label>
			<br />
			<?php echo $this->Html->link(__('Agregar Iconografía', true), array('action' => 'add'), array('class' => 'btn btn-primary', 'style' => 'width: 100%;')); ?>
			<br /><br />
		<?php } ?>
		<br />
		<label style="border-bottom: solid 1px #6C3F30;"><?php __('Filtrar por:'); ?></label>
		<br />
		
		<?php echo $this->Form->create('iconographies'); ?>

		<div style="clear: both;">
			<label>Título:</label><br />
			<?php echo $this->Form->hidden('Titulo', array('class' => 'form-control', 'label' => 'Título')); ?>
			<?php echo $this->Html->link('A', array('action' => 'A'), array('id' => 'titulo-A', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("A"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => 'B'), array('id' => 'titulo-B', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("B"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => 'C'), array('id' => 'titulo-C', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("C"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => 'D'), array('id' => 'titulo-D', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("D"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => 'E'), array('id' => 'titulo-E', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("E"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => 'F'), array('id' => 'titulo-F', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("F"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => 'G'), array('id' => 'titulo-G', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("G"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => 'H'), array('id' => 'titulo-H', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("H"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => 'I'), array('id' => 'titulo-I', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("I"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => 'J'), array('id' => 'titulo-J', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("J"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => 'K'), array('id' => 'titulo-K', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("K"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => 'L'), array('id' => 'titulo-L', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("L"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => 'M'), array('id' => 'titulo-M', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("M"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => 'N'), array('id' => 'titulo-N', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("N"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => 'O'), array('id' => 'titulo-O', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("O"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => 'P'), array('id' => 'titulo-P', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("P"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => 'Q'), array('id' => 'titulo-Q', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("Q"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => 'R'), array('id' => 'titulo-R', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("R"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => 'S'), array('id' => 'titulo-S', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("S"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => 'T'), array('id' => 'titulo-T', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("T"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => 'U'), array('id' => 'titulo-U', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("U"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => 'V'), array('id' => 'titulo-V', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("V"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => 'W'), array('id' => 'titulo-W', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("W"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => 'X'), array('id' => 'titulo-X', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("X"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => 'Y'), array('id' => 'titulo-Y', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("Y"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => 'Z'), array('id' => 'titulo-Z', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTitulo").val("Z"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => ''), array('id' => 'titulo-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#iconographiesTitulo").val(""); $("#iconographiesIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['iconographies']['Titulo']; ?>" != "") {
				$("#<?php echo "titulo-".$this->data['iconographies']['Titulo']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "titulo-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">
			<label>Autor:</label><br />
			<?php echo $this->Form->hidden('Autor', array('class' => 'form-control', 'label' => 'Autor')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'autor-A', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("A"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'autor-B', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("B"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'autor-C', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("C"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'autor-D', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("D"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'autor-E', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("E"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'autor-F', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("F"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'autor-G', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("G"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'autor-H', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("H"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'autor-I', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("I"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'autor-J', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("J"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'autor-K', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("K"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'autor-L', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("L"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'autor-M', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("M"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'autor-N', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("N"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'autor-O', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("O"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'autor-P', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("P"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'autor-Q', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("Q"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'autor-R', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("R"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'autor-S', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("S"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'autor-T', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("T"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'autor-U', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("U"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'autor-V', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("V"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'autor-W', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("W"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'autor-X', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("X"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'autor-Y', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("Y"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'autor-Z', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesAutor").val("Z"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'autor-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#iconographiesAutor").val(""); $("#iconographiesIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['iconographies']['Autor']; ?>" != "") {
				$("#<?php echo "autor-".$this->data['iconographies']['Autor']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "autor-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">		
			<label>Materia:</label><br />
			<?php echo $this->Form->hidden('Materia', array('class' => 'form-control', 'label' => 'Materia')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'materia-A', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("A"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'materia-B', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("B"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'materia-C', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("C"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'materia-D', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("D"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'materia-E', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("E"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'materia-F', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("F"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'materia-G', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("G"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'materia-H', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("H"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'materia-I', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("I"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'materia-J', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("J"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'materia-K', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("K"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'materia-L', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("L"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'materia-M', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("M"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'materia-N', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("N"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'materia-O', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("O"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'materia-P', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("P"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'materia-Q', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("Q"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'materia-R', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("R"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'materia-S', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("S"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'materia-T', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("T"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'materia-U', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("U"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'materia-V', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("V"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'materia-W', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("W"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'materia-X', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("X"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'materia-Y', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("Y"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'materia-Z', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesMateria").val("Z"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'materia-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#iconographiesMateria").val(""); $("#iconographiesIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['iconographies']['Materia']; ?>" != "") {
				$("#<?php echo "materia-".$this->data['iconographies']['Materia']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "materia-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
				
		<div style="clear: both;">		
			<label>Temas:</label><br />
			<?php echo $this->Form->hidden('Temas', array('class' => 'form-control', 'label' => 'Temas')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'temas-A', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("A"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'temas-B', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("B"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'temas-C', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("C"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'temas-D', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("D"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'temas-E', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("E"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'temas-F', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("F"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'temas-G', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("G"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'temas-H', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("H"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'temas-I', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("I"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'temas-J', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("J"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'temas-K', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("K"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'temas-L', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("L"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'temas-M', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("M"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'temas-N', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("N"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'temas-O', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("O"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'temas-P', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("P"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'temas-Q', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("Q"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'temas-R', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("R"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'temas-S', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("S"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'temas-T', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("T"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'temas-U', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("U"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'temas-V', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("V"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'temas-W', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("W"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'temas-X', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("X"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'temas-Y', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("Y"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'temas-Z', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesTemas").val("Z"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'temas-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#iconographiesTemas").val(""); $("#iconographiesIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['iconographies']['Temas']; ?>" != "") {
				$("#<?php echo "temas-".$this->data['iconographies']['Temas']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "temas-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>

	
			<div style="clear: both;">
			<label>Fuente:</label><br />
			<?php echo $this->Form->hidden('Fuente', array('class' => 'form-control', 'label' => 'Fuente')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'fuente-A', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("A"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'fuente-B', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("B"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'fuente-C', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("C"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'fuente-D', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("D"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'fuente-E', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("E"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'fuente-F', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("F"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'fuente-G', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("G"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'fuente-H', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("H"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'fuente-I', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("I"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'fuente-J', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("J"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'fuente-K', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("K"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'fuente-L', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("L"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'fuente-M', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("M"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'fuente-N', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("N"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'fuente-O', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("O"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'fuente-P', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("P"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'fuente-Q', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("Q"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'fuente-R', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("R"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'fuente-S', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("S"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'fuente-T', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("T"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'fuente-U', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("U"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'fuente-V', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("V"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'fuente-W', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("W"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'fuente-X', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("X"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'fuente-Y', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("Y"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'fuente-Z', 'class' => 'btn-primary', 'onclick' => '$("#iconographiesFuente").val("Z"); $("#iconographiesIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'fuente-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#iconographiesFuente").val(""); $("#iconographiesIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['iconographies']['Fuente']; ?>" != "") {
				$("#<?php echo "fuente-".$this->data['iconographies']['Fuente']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "fuente-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		<br />
		
	<!--<div style="text-align: right;"><a href="#top" class="btn btn-primary" style="margin-top: 180px; width: 70px">Ir Arriba</a></div> -->
		<?php //echo $this->Form->submit('Buscar', array('class' => 'btn btn-primary', 'div' => false)); ?>
		<?php echo $this->Form->end(); ?>
		
		
		
		<!--
		<label><?php __('Buscar por:'); ?></label>
		<br />
		<?php echo $this->Html->link(__('Siglo', true), array('action' => 'century'), array('class' => 'btn-primary', 'title' => 'Siglo')); ?>
		<?php echo $this->Html->link(__('Autor', true), array('action' => 'author'), array('class' => 'btn-primary', 'title' => 'Autor')); ?>
		<?php echo $this->Html->link(__('Título', true), array('action' => 'title'), array('class' => 'btn-primary', 'title' => 'Título')); ?>
		<?php echo $this->Html->link(__('Año', true), array('action' => 'year'), array('class' => 'btn-primary', 'title' => 'Año')); ?>
		<?php echo $this->Html->link(__('Materia', true), array('action' => 'matter'), array('class' => 'btn-primary', 'title' => 'Materia')); ?>
		-->
	</div>
</div>