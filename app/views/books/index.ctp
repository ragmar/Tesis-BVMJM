<?php echo $this->Html->css('jquery-ui'); ?>
<?php echo $this->Html->script('jquery-ui'); ?>
<?php echo $this->Html->css('tagit/jquery.tagit'); ?>
<?php echo $this->Html->css('tagit/tagit.ui-zendesk'); ?>
<?php echo $this->Html->script('tagit/tag-it.min'); ?>
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
	
	.btn-primary:hover {
		text-decoration: none;
	}
</style>
<ul class="breadcrumb" style="margin: 0">
	<li>
    	<?php echo $this->Html->link(__('Inicio', true), array('controller' => 'pages')); ?>
    </li>
	<li>Libros</li>
</ul>

<div class='century view'>
	<div class="col-md-9 column">
	<h2>Módulo Libros <font size="3">(<?php echo count($items); ?> Obras Cargadas)</font></h2>
		<?php if (count($items) > 0) { ?>
		<table class="table">
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
				if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){
					if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/webroot/attachments/files/med/" . $item['Item']['cover_path']))){
						echo $this->Html->image("/webroot/attachments/files/med/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => 'books', 'action' => 'view', $item['Item']['id'])));
					} else {
						echo $this->Html->image("/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => 'books', 'action' => 'view', $item['Item']['id'])));
					}
				} else {
					if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/attachments/files/med/" . $item['Item']['cover_path']))){
						echo $this->Html->image("/app/webroot/attachments/files/med/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => 'books', 'action' => 'view', $item['Item']['id'])));
					} else {
						echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => 'books', 'action' => 'view', $item['Item']['id'])));
					}
				}
			?>
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Item']['id'])); ?>
			</td>
			<td>
				<dl class="dl-horizontal">
					<dt style="width: 120px"><?php __('Título:');?></dt>
					<dd style="margin-left: 130px">
						<?php
							if (!empty($item['Item']['245'])) {
								$title = marc21_decode($item['Item']['245']);
								if ($title) {
									if ((!empty($favorites)) && (in_array($item['Item']['id'], $favorites))){
										echo $html->image('/img/ts/bookmark.png', array('alt' => 'Mi Biblioteca', 'title' => 'Obra agregada a la biblioteca.', 'style' => 'width: 20px;'));
										echo "&nbsp;";
									}
									
									if (!empty($this->data['books']['Titulo'])) {
										echo '<b>' . $title['a'] . '.</b>';
									} else {
										echo $title['a'] . '.';
									}
									
									if (isset($title['h'])) {echo ' ' . $title['h'];}
									if (isset($title['b']) || isset($title['c'])) {echo ' : ';}
									if (isset($title['b'])) {echo $title['b'] . ' ';}
									if (isset($title['c'])) {echo ' / ' . $title['c'];}
								}
							}
						?>
					</dd>
					<dt style="width: 120px"><?php __('Autor:');?></dt>
					<dd style="margin-left: 130px">
						<?php
							if (!empty($item['Item']['100'])) {
								$author = marc21_decode($item['Item']['100']);
								
								if (!empty($this->data['books']['Autor'])) {
									echo '<b>' . $author['a'] . '.</b>';
								} else {
									echo $author['a'] . '.';
								}
								
								if (isset($author['h'])) {echo ' ' . $author['h']. ',';}
								if (isset($author['c'])) {echo ' ' . $author['c'];}
								if (isset($author['d'])) {echo ' (' . $author['d']. ')';}
							}
						?>
					</dd>
					<?php if (!empty($item['Item']['260'])) { ?>
					<dt style="width: 120px"><?php __('Publicación:');?></dt>
					<dd style="margin-left: 130px">
						<?php
							if (!empty($item['Item']['260'])) {
								$publication = marc21_decode($item['Item']['260']);
								echo $publication['a'] . '.';
								if (isset($publication['b'])) {echo ' : ' . $publication['b']. ', ';}
								if (isset($publication['c'])) {echo ' ' . $publication['c']. '.';}
							}
						?>
					</dd>
					<?php } ?>
					<?php if (!empty($item['Item']['690'])) { ?>
					<dt style="width: 120px"><?php __('Siglo:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$century = marc21_decode($item['Item']['690']);
						if (!empty($this->data['books']['Siglo'])) {
							echo '<b>' . $century['a'] . '.</b>';
						} else {
							echo $century['a'] . '.';
						}
					?>
					</dd>
					<?php } ?>
					<?php if (!empty($item['Item']['653'])) { ?>
					<dt style="width: 120px"><?php __('Materia:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$matter = marc21_decode($item['Item']['653']);
						$m = "";
						$m = explode(',', $matter['a']);
						
						echo "<ul id='".$item['Item']['id']."'>";
							foreach ($m as $x):
								echo "<li>".$x."</li>";
							endforeach;
						echo "</ul>";
					?>
					<script type="text/javascript">
						$("#<?php echo $item['Item']['id']; ?>").tagit({
			                readOnly: true
			            });
					</script>
					</dd>
					<?php } ?>
					<?php if (!empty($item['Item']['h-007'])) { ?>
					<dt style="width: 120px"><?php __('Tipo:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$type = $item['Item']['h-007'];
						if ($type == 'm') {
							echo 'Libro.';
						} 
						
						if ($type == 'a') {
							echo 'Artículo.';
						}
					?>
					</dd>
					<?php } ?>
					<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') != '3'))) { ?>
					<dt style="width: 120px"></dt>
					<dd style="margin-left: 130px">
						<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $item['Item']['id'])); ?>
						-
						<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $item['Item']['id']), null, sprintf(__("¿Desea eliminar '%s'?", true), $title['a'])); ?>
					</dd>
					<?php } ?>
					<dd style="margin-left: 130px"></dd>
				</dl>
			</td>
		</tr>
		<?php endforeach; ?>
		</table>
		<?php } else { ?>
			<br />
			<?php if (isset($this->data)) { ?>
				<p>No hay libros que coincidan con ese filtro.</p>
			<?php } else { ?>
				<p>No hay libros en este momento.</p>
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
			<?php echo $this->Html->link(__('Agregar Libro', true), array('action' => 'add'), array('class' => 'btn btn-primary', 'style' => 'width: 100%;')); ?>
			<br /><br />
		<?php } ?>
		<br />
		<label style="border-bottom: solid 1px #6C3F30;"><?php __('Filtrar por:'); ?></label>
		<br />
		
		<?php echo $this->Form->create('books'); ?>

		<div style="clear: both;">
			<label>Título:</label><br />
			<?php echo $this->Form->hidden('Titulo', array('class' => 'form-control', 'label' => 'Título')); ?>
			<?php echo $this->Html->link('A', array('action' => 'A'), array('id' => 'titulo-A', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("A"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => 'B'), array('id' => 'titulo-B', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("B"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => 'C'), array('id' => 'titulo-C', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("C"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => 'D'), array('id' => 'titulo-D', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("D"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => 'E'), array('id' => 'titulo-E', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("E"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => 'F'), array('id' => 'titulo-F', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("F"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => 'G'), array('id' => 'titulo-G', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("G"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => 'H'), array('id' => 'titulo-H', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("H"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => 'I'), array('id' => 'titulo-I', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("I"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => 'J'), array('id' => 'titulo-J', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("J"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => 'K'), array('id' => 'titulo-K', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("K"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => 'L'), array('id' => 'titulo-L', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("L"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => 'M'), array('id' => 'titulo-M', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("M"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => 'N'), array('id' => 'titulo-N', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("N"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => 'O'), array('id' => 'titulo-O', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("O"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => 'P'), array('id' => 'titulo-P', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("P"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => 'Q'), array('id' => 'titulo-Q', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("Q"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => 'R'), array('id' => 'titulo-R', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("R"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => 'S'), array('id' => 'titulo-S', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("S"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => 'T'), array('id' => 'titulo-T', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("T"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => 'U'), array('id' => 'titulo-U', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("U"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => 'V'), array('id' => 'titulo-V', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("V"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => 'W'), array('id' => 'titulo-W', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("W"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => 'X'), array('id' => 'titulo-X', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("X"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => 'Y'), array('id' => 'titulo-Y', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("Y"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => 'Z'), array('id' => 'titulo-Z', 'class' => 'btn-primary', 'onclick' => '$("#booksTitulo").val("Z"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => ''), array('id' => 'titulo-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#booksTitulo").val(""); $("#booksIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['books']['Titulo']; ?>" != "") {
				$("#<?php echo "titulo-".$this->data['books']['Titulo']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "titulo-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">
			<label>Autor:</label><br />
			<?php echo $this->Form->hidden('Autor', array('class' => 'form-control', 'label' => 'Autor')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'autor-A', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("A"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'autor-B', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("B"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'autor-C', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("C"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'autor-D', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("D"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'autor-E', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("E"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'autor-F', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("F"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'autor-G', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("G"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'autor-H', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("H"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'autor-I', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("I"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'autor-J', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("J"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'autor-K', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("K"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'autor-L', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("L"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'autor-M', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("M"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'autor-N', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("N"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'autor-O', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("O"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'autor-P', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("P"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'autor-Q', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("Q"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'autor-R', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("R"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'autor-S', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("S"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'autor-T', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("T"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'autor-U', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("U"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'autor-V', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("V"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'autor-W', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("W"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'autor-X', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("X"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'autor-Y', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("Y"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'autor-Z', 'class' => 'btn-primary', 'onclick' => '$("#booksAutor").val("Z"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'autor-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#booksAutor").val(""); $("#booksIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['books']['Autor']; ?>" != "") {
				$("#<?php echo "autor-".$this->data['books']['Autor']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "autor-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">
			<label>Siglo:</label><br />
			<?php echo $this->Form->hidden('Siglo', array('class' => 'form-control', 'label' => 'Siglo')); ?>
			<?php echo $this->Html->link('XVII', array('action' => '/XVII'), array('id' => 'siglo-XVII', 'class' => 'btn-primary', 'style' => 'width: 44px;', 'onclick' => '$("#booksSiglo").val("XVII"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('XVIII', array('action' => '/XVIII'), array('id' => 'siglo-XVIII', 'class' => 'btn-primary', 'style' => 'width: 44px;', 'onclick' => '$("#booksSiglo").val("XVIII"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('XIX', array('action' => '/XIX'), array('id' => 'siglo-XIX', 'class' => 'btn-primary', 'style' => 'width: 44px;', 'onclick' => '$("#booksSiglo").val("XIX"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('XX', array('action' => '/XX'), array('id' => 'siglo-XX', 'class' => 'btn-primary', 'style' => 'width: 44px;', 'onclick' => '$("#booksSiglo").val("XX"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'siglo-todos', 'class' => 'btn-primary', 'style' => 'width: 69px;', 'onclick' => '$("#booksSiglo").val(""); $("#booksIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['books']['Siglo']; ?>" != "") {
				$("#<?php echo "siglo-".$this->data['books']['Siglo']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 44px;');
			} else {
				$("#<?php echo "siglo-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">		
			<label>Materia:</label><br />
			<?php echo $this->Form->hidden('Materia', array('class' => 'form-control', 'label' => 'Materia')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'materia-A', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("A"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'materia-B', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("B"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'materia-C', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("C"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'materia-D', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("D"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'materia-E', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("E"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'materia-F', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("F"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'materia-G', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("G"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'materia-H', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("H"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'materia-I', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("I"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'materia-J', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("J"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'materia-K', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("K"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'materia-L', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("L"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'materia-M', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("M"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'materia-N', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("N"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'materia-O', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("O"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'materia-P', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("P"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'materia-Q', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("Q"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'materia-R', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("R"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'materia-S', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("S"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'materia-T', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("T"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'materia-U', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("U"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'materia-V', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("V"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'materia-W', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("W"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'materia-X', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("X"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'materia-Y', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("Y"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'materia-Z', 'class' => 'btn-primary', 'onclick' => '$("#booksMateria").val("Z"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'materia-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#booksMateria").val(""); $("#booksIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['books']['Materia']; ?>" != "") {
				$("#<?php echo "materia-".$this->data['books']['Materia']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "materia-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">
			<label>Tipo:</label><br />
			<?php echo $this->Form->hidden('Tipo', array('class' => 'form-control', 'label' => 'Tipo')); ?>
			<?php echo $this->Html->link('Libro', array('action' => '/m'), array('id' => 'tipo-m', 'class' => 'btn-primary', 'style' => 'width: 90px;', 'onclick' => '$("#booksTipo").val("m"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Artículo', array('action' => '/a'), array('id' => 'tipo-a', 'class' => 'btn-primary', 'style' => 'width: 90px;', 'onclick' => '$("#booksTipo").val("a"); $("#booksIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'tipo-todos', 'class' => 'btn-primary', 'style' => 'width: 65px;', 'onclick' => '$("#booksTipo").val(""); $("#booksIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['books']['Tipo']; ?>" != "") {
				$("#<?php echo "tipo-".$this->data['books']['Tipo']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 90px;');
			} else {
				$("#<?php echo "tipo-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 65px;');
			}
		</script>
		
		<br />
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