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
  <li>Trabajos Acad&eacute;micos</li>
</ul>

<div class='century view'>
	<div class="col-md-9 column">
	<h2>Módulo de Trabajos Acad&eacute;micos</h2>
		<?php if (count($items) > 0) { ?>
		<table class="table">
		<tr>
			<th><?php __('Cover');?></th>
			<th><?php __('Detalles del Trabajo');?></th>
		</tr>
		<?php foreach ($items as $item): ?>
		<?php //$color = "#b3bbce"; ?>
		<?php $color = ""; ?>
		<tr>
			<td style="background-color: <?php echo $color; ?>; text-align: center; width: 80px;">
			<?php
				if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/covers/" . $item['Item']['cover_path']))){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px','height'=>'99px', 'url' => array('controller' => 'academic_papers', 'action' => 'view', $item['Item']['id'])));
				} else {
					echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => 'academic_papers', 'action' => 'view', $item['Item']['id'])));
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
									
									if (!empty($this->data['academic_papers']['Titulo'])) {
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
								if (!empty($this->data['academic_papers']['Autor'])) {
									echo '<b>' . $author['a'] . '.</b>';
								} else {
									echo $author['a'] . '.';
								}
								if (isset($author['d'])) {echo ' ' . $author['d']. '.';}
							}
						?>
					</dd>
					<dt style="width: 120px"><?php __('Tutor:');?></dt>
					<dd style="margin-left: 130px">
						<?php
							if (!empty($item['Item']['260'])) {
								$publication = marc21_decode($item['Item']['260']);
								if (isset($publication['b'])) {echo ' ' . $publication['b']. '.';}
							}
						?>
					</dd>
					<?php if (!empty($item['Item']['650'])) { ?>
					<dt style="width: 120px"><?php __('Materia:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$mattername = marc21_decode($item['Item']['650']);
						if (!empty($this->data['academic_papers']['Materia'])) {
							echo '<b>' . $mattername['a'] . '.</b>';
						} else {
							echo $mattername['a'] . '.';
						}
					?>
					</dd>
					<?php } ?>
					<?php if (!empty($item['Item']['653'])) { ?>
					<dt style="width: 120px"><?php __('Palabras claves:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$matter = marc21_decode($item['Item']['653']);
						if (!empty($this->data['academic_papers']['PalabrasClave'])) {
							echo '<b>' . $matter['a'] . '.</b>';
						} else {
							echo $matter['a'] . '.';
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
				<p>No hay trabajos que coincidan con ese filtro.</p>
			<?php } else { ?>
				<p>No hay trabajos en este momento.</p>
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
			<?php echo $this->Html->link(__('Agregar Trabajo Académico', true), array('action' => 'add'), array('class' => 'btn btn-primary', 'style' => 'width: 100%;')); ?>
			<br /><br />
		<?php } ?>
		<br />
		<label style="border-bottom: solid 1px #6C3F30;"><?php __('Filtrar por:'); ?></label>
		<br />
		
		<?php echo $this->Form->create('academicPapers'); ?>

		<div style="clear: both;">
			<label>Título:</label><br />
			<?php echo $this->Form->hidden('Titulo', array('class' => 'form-control', 'label' => 'Título')); ?>
			<?php echo $this->Html->link('A', array('action' => 'A'), array('id' => 'titulo-A', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("A"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => 'B'), array('id' => 'titulo-B', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("B"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => 'C'), array('id' => 'titulo-C', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("C"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => 'D'), array('id' => 'titulo-D', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("D"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => 'E'), array('id' => 'titulo-E', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("E"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => 'F'), array('id' => 'titulo-F', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("F"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => 'G'), array('id' => 'titulo-G', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("G"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => 'H'), array('id' => 'titulo-H', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("H"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => 'I'), array('id' => 'titulo-I', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("I"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => 'J'), array('id' => 'titulo-J', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("J"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => 'K'), array('id' => 'titulo-K', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("K"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => 'L'), array('id' => 'titulo-L', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("L"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => 'M'), array('id' => 'titulo-M', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("M"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => 'N'), array('id' => 'titulo-N', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("N"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => 'O'), array('id' => 'titulo-O', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("O"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => 'P'), array('id' => 'titulo-P', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("P"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => 'Q'), array('id' => 'titulo-Q', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("Q"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => 'R'), array('id' => 'titulo-R', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("R"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => 'S'), array('id' => 'titulo-S', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("S"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => 'T'), array('id' => 'titulo-T', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("T"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => 'U'), array('id' => 'titulo-U', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("U"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => 'V'), array('id' => 'titulo-V', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("V"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => 'W'), array('id' => 'titulo-W', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("W"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => 'X'), array('id' => 'titulo-X', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("X"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => 'Y'), array('id' => 'titulo-Y', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("Y"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => 'Z'), array('id' => 'titulo-Z', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("Z"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => ''), array('id' => 'titulo-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#academicPapersTitulo").val(""); $("#academicPapersIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['academicPapers']['Titulo']; ?>" != "") {
				$("#<?php echo "titulo-".$this->data['academicPapers']['Titulo']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "titulo-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">
			<label>Autor:</label><br />
			<?php echo $this->Form->hidden('Autor', array('class' => 'form-control', 'label' => 'Autor')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'autor-A', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("A"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'autor-B', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("B"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'autor-C', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("C"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'autor-D', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("D"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'autor-E', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("E"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'autor-F', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("F"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'autor-G', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("G"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'autor-H', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("H"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'autor-I', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("I"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'autor-J', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("J"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'autor-K', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("K"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'autor-L', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("L"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'autor-M', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("M"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'autor-N', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("N"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'autor-O', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("O"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'autor-P', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("P"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'autor-Q', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("Q"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'autor-R', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("R"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'autor-S', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("S"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'autor-T', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("T"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'autor-U', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("U"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'autor-V', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("V"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'autor-W', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("W"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'autor-X', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("X"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'autor-Y', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("Y"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'autor-Z', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("Z"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'autor-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#academicPapersAutor").val(""); $("#academicPapersIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['academicPapers']['Autor']; ?>" != "") {
				$("#<?php echo "autor-".$this->data['academicPapers']['Autor']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "autor-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">		
			<label>Materia:</label><br />
			<?php echo $this->Form->hidden('Materia', array('class' => 'form-control', 'label' => 'Materia')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'materias-A', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("A"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'materias-B', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("B"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'materias-C', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("C"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'materias-D', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("D"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'materias-E', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("E"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'materias-F', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("F"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'materias-G', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("G"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'materias-H', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("H"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'materias-I', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("I"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'materias-J', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("J"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'materias-K', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("K"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'materias-L', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("L"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'materias-M', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("M"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'materias-N', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("N"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'materias-O', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("O"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'materias-P', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("P"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'materias-Q', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("Q"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'materias-R', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("R"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'materias-S', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("S"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'materias-T', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("T"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'materias-U', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("U"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'materias-V', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("V"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'materias-W', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("W"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'materias-X', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("X"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'materias-Y', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("Y"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'materias-Z', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("Z"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'materias-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#academicPapersMateria").val(""); $("#academicPapersIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['academicPapers']['Materia']; ?>" != "") {
				$("#<?php echo "materias-".$this->data['academicPapers']['Materia']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "materias-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>

		<div style="clear: both;">		
			<label>Palabras Claves:</label><br />
			<?php echo $this->Form->hidden('PalabrasClave', array('class' => 'form-control', 'label' => 'Palabras Clave')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'palabras-clave-A', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("A"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'palabras-clave-B', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("B"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'palabras-clave-C', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("C"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'palabras-clave-D', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("D"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'palabras-clave-E', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("E"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'palabras-clave-F', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("F"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'palabras-clave-G', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("G"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'palabras-clave-H', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("H"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'palabras-clave-I', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("I"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'palabras-clave-J', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("J"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'palabras-clave-K', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("K"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'palabras-clave-L', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("L"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'palabras-clave-M', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("M"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'palabras-clave-N', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("N"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'palabras-clave-O', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("O"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'palabras-clave-P', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("P"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'palabras-clave-Q', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("Q"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'palabras-clave-R', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("R"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'palabras-clave-S', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("S"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'palabras-clave-T', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("T"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'palabras-clave-U', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("U"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'palabras-clave-V', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("V"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'palabras-clave-W', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("W"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'palabras-clave-X', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("X"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'palabras-clave-Y', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("Y"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'palabras-clave-Z', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersPalabrasClave").val("Z"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'palabras-clave-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#academicPapersPalabrasClave").val(""); $("#academicPapersIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['academicPapers']['PalabrasClave']; ?>" != "") {
				$("#<?php echo "palabras-clave-".$this->data['academicPapers']['PalabrasClave']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "palabras-clave-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
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