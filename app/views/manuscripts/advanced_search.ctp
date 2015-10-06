<script type="text/javascript">
function validate() {
var txt = document.getElementById("Manuscript245");
if(txt.value== "" || txt.value== null) {
alert("Por favor, ingrese al menos el título");
txt.style.border = "2px solid red";
return false;
} else {
txt.style.border = "";
}
}
</script>
<style>
input{
	width: 200px;
}	
		
</style>

<!-- Codigo de alejandro -->

<?php echo $this->Html->script('incipit/incipitManager'); ?>
<style>
	@font-face 
	{
	  font-family: Maestro;
	  src: url(<?php echo $this->Html->url('/files/incipit/Maestro.ttf'); ?>) format('truetype');
	}

	.buton-incipit 
	{
		width: 15px;
		height: 35px;
		margin: 2px 2px 0px 0px;
		padding: 8px 0px 0px 0px;
		text-align: center;
		float: left;
	}

	.maestro
	{
		font-family: Maestro;
		font-size: 15pt;
	} 

	.rotate
	{
		/* Safari */
		-webkit-transform: rotate(-180deg);

		/* Firefox */
		-moz-transform: rotate(-180deg);

		/* IE */
		-ms-transform: rotate(-180deg);

		/* Opera */
		-o-transform: rotate(-180deg);

		/* Internet Explorer */
		filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=6);

		transform: rotate(180deg);
	}

	.edit-tone-buton
	{

	}

</style>
<!-- Fin de Codigo de alejandro -->


<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '2'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
<li><a href="<?php echo $this->base; ?>/manuscripts">Música Manuscrita</a></span></li>
	<li>B&uacute;squeda Avanzada</span></li>
</ul>
<?php } else if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '1'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
<li><a href="<?php echo $this->base; ?>/manuscripts">Música Manuscrita</a></span></li>
	<li>B&uacute;squeda Avanzada</span></li>
</ul>
<?php } else { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/pages">Inicio</a></li>
<li><a href="<?php echo $this->base; ?>/manuscripts">Música Manuscrita</a></span></li>
	<li>B&uacute;squeda Avanzada</span></li>
</ul>
<?php } ?>





<h2 style="text-align:center">Búsqueda Avanzada</h2>

<div class="items" style="text-align: center;">
<?php echo $this->Form->create('Manuscript', array('onsubmit' => 'return validate();')); ?>
<fieldset>

<br />

	<div style="float: left; width: 100%">
		<div style="float: left; width: 50%; text-align: right;">
			<?php echo $this->Form->input('245', array('div' => false, 'label' => false, 'placeholder' => 'Título')); ?>
			&nbsp;
		</div>
		<div style="float: left; width: 50%; text-align: left;">
			&nbsp;
			<?php echo $this->Form->input('100', array('div' => false, 'label' => false, 'placeholder' => 'Autor')); ?>
		</div>
		
		<br /><br />
		
		<div style="float: left; width: 50%; text-align: right;">
			<?php echo $this->Form->input('260', array('div' => false, 'label' => false, 'placeholder' => 'Lugar, editor y/o fecha')); ?>
			&nbsp;
		</div>
		<div style="float: left; width: 50%; text-align: left;">
			&nbsp;
			<?php echo $this->Form->input('653', array('div' => false, 'label' => false, 'placeholder' => 'Materia')); ?>
		</div>
		
		<br /><br />
		
		<div style="float: left; width: 100%; text-align: center;">
			&nbsp;
			<?php echo $this->Form->input('648', array('div' => false, 'label' => false, 'placeholder' => 'Siglo')); ?>
		</div>
	</div>

	<!-- CODIGO DE ALEJANDRO* !-->
	<div>
		<div class="col-md-2 column">
			<br />
			<label style="border-bottom: solid 1px #6C3F30;"><?php __('Menu del Íncipit'); ?></label>
			<br />

			<div style="clear: both;">
				<label>Accidentales:</label><br />
			</div>
			<div class="maestro" style="clear: both;">
				<!-- From L to P!-->
				<?php echo $this->Html->link('p', array('action' => 'p'), array('id' => 'Accidentales-p', 'class' => 'btn-primary buton-incipit', 'onclick' => 'accidentalPressed("p"); return false;')); ?>
				<?php echo $this->Html->link('l', array('action' => 'l'), array('id' => 'Accidentales-l', 'class' => 'btn-primary buton-incipit', 'onclick' => 'accidentalPressed("l"); return false;')); ?>
				<?php echo $this->Html->link('m', array('action' => 'm'), array('id' => 'Accidentales-m', 'class' => 'btn-primary buton-incipit', 'onclick' => 'accidentalPressed("m"); return false;')); ?>
				<?php echo $this->Html->link('n', array('action' => 'n'), array('id' => 'Accidentales-n', 'class' => 'btn-primary buton-incipit', 'onclick' => 'accidentalPressed("n"); return false;')); ?>
				<?php echo $this->Html->link('o', array('action' => 'o'), array('id' => 'Accidentales-o', 'class' => 'btn-primary buton-incipit', 'onclick' => 'accidentalPressed("o"); return false;')); ?>
				<?php echo $this->Html->link('q', array('action' => 'q'), array('id' => 'Accidentales-q', 'class' => 'btn-primary buton-incipit', 'onclick' => 'dotPressed("q"); return false;')); ?>
			</div>
			
			<div style="clear: both;">
				<label>Tiempos:</label><br />
			</div>
			<div class="maestro" style="clear: both;">		
				<?php echo $this->Html->link('a', array('action' => 'a'), array('id' => 'Accidentales-a', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("a"); return false;')); ?>
				<?php echo $this->Html->link('b', array('action' => 'b'), array('id' => 'Accidentales-b', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("b"); return false;')); ?>
				<?php echo $this->Html->link('c', array('action' => 'c'), array('id' => 'Accidentales-c', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("c"); return false;')); ?>
				<?php echo $this->Html->link('d', array('action' => 'd'), array('id' => 'Accidentales-d', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("d"); return false;')); ?>
				<?php echo $this->Html->link('e', array('action' => 'e'), array('id' => 'Accidentales-e', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("e"); return false;')); ?>
				<?php echo $this->Html->link('f', array('action' => 'f'), array('id' => 'Accidentales-f', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("f"); return false;')); ?>
				<?php echo $this->Html->link('g', array('action' => 'g'), array('id' => 'Accidentales-g', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("g"); return false;')); ?>
				<?php echo $this->Html->link('h', array('action' => 'h'), array('id' => 'Accidentales-h', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("h"); return false;')); ?>
				<?php echo $this->Html->link('i', array('action' => 'i'), array('id' => 'Accidentales-i', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("i"); return false;')); ?>
				<?php echo $this->Html->link('j', array('action' => 'j'), array('id' => 'Accidentales-j', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("j"); return false;')); ?>
			</div>

			<div style="clear: both;">
				<label>Silencios:</label><br />
			</div>
			<div class="maestro" style="clear: both;">		
				<?php echo $this->Html->link('!', array('action' => '!'), array('id' => 'Accidentales-!', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("!"); return false;')); ?>
				<?php echo $this->Html->link('"', array('action' => '"'), array('id' => 'Accidentales-"', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("\""); return false;')); ?>
				<?php echo $this->Html->link('#', array('action' => '#'), array('id' => 'Accidentales-#', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("#"); return false;')); ?>
				<?php echo $this->Html->link('$', array('action' => '$'), array('id' => 'Accidentales-$', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("$"); return false;')); ?>
				<?php echo $this->Html->link('%', array('action' => '%'), array('id' => 'Accidentales-%', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("%"); return false;')); ?>
				<?php echo $this->Html->link('&', array('action' => '&'), array('id' => 'Accidentales-&', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("&"); return false;')); ?>
				<?php echo $this->Html->link('\'', array('action' => '\''), array('id' => 'Accidentales-\'', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("\'"); return false;')); ?>
				<?php echo $this->Html->link('(', array('action' => '('), array('id' => 'Accidentales-(', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("("); return false;')); ?>
				<?php echo $this->Html->link(')', array('action' => ')'), array('id' => 'Accidentales-)', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed(")"); return false;')); ?>
				<?php echo $this->Html->link('*', array('action' => '*'), array('id' => 'Accidentales-*', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("*"); return false;')); ?>
			</div>

			<div style="clear: both;">
				<label>Claves:</label><br />
			</div>
			<div class="maestro" style="clear: both;">
				<!-- From K to P!-->
				<?php echo $this->Html->link('1', array('action' => '1'), array('id' => 'Accidentales-1', 'class' => 'btn-primary buton-incipit', 'onclick' => 'ClefPressed("1"); return false;')); ?>
				<?php echo $this->Html->link('2', array('action' => '2'), array('id' => 'Accidentales-2', 'class' => 'btn-primary buton-incipit', 'onclick' => 'ClefPressed("2"); return false;')); ?>
				<?php echo $this->Html->link('3', array('action' => '3'), array('id' => 'Accidentales-3', 'class' => 'btn-primary buton-incipit', 'onclick' => 'ClefPressed("3"); return false;')); ?>
			</div>
			<br />
		</div>

		<!-- Por ahora width="1000" height="320" !-->
		<div class="col-xs-10">

			<?php echo $this->Form->button('^', array('type' => 'button', 'id' => 'toneUp', 'onclick' => 'toneUpDown(-1);')); ?>
			<?php echo $this->Form->button('^', array('type' => 'button', 'id' => 'toneDown', 'class' => 'rotate', 'onclick' => 'toneUpDown(1);')); ?>

			<canvas id="incipit" width="1000" height="320">
				<script> 
					var incipitDocument = document.getElementById("incipit");
					initializeIncipit(incipitDocument, true); 
				</script>
			</canvas>
		</div>
	</div>

	<!-- FIN CODIGO DE ALEJANDRO* !-->
	
	</fieldset>
	</br>
	<?php echo $this->Form->submit(__('Search', true), array('class'=>'btn btn-primary'));?>

</div>


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

<div class='items view'>
	</br>

<div class="col-md-9 column">
	<?php
	 if (count($items) > 0) { ?>
	<?php	foreach($items as $index =>$item):?>
		<?php if($index ==0):?>
	<h2><?php __('Resultados de la Búsqueda');?></h2>
	<table class="table">
	<tr>
		<th><?php __('Portada');?></th>
		<th><?php __('Detalles de la Obra');?></th>
	</tr>
	<?php endif;?>
		 
	
	<?php	$t1 = $item['Item']['h-006'];
		$t2 = $item['Item']['h-007'];
		$t3 = $item['Item']['type'];
		
		// Tipo libro.
		if (($t1 == 'a') && ($t2 == 'm')) {
			$color = "#9dae8a";
		}
		
		// Tipo revista.
		if (($t1 == 'a') && ($t2 == 's')) {
			$color = "#b3bbce";
		}

		// Música impresa.
		if (($t1 == 'c') && ($t2 == 'm')) {
			$color = "#d5b59e";
		}
		
		// Música manuscrita.
		if (($t1 == 'd') && ($t2 == 'm')) {
			$color = "#aea16c";
		}
		
		// Iconografía musical.
		if (($t1 == 'k') && ($t2 == 'm')) {
			$color = "#ba938e";
		}
		
		// Trabajos académicos.
		if (($t1 == 't') && ($t2 == 'm') && ($t3 == 0)) {
			$color = "#d1c7be";
		}
		
		// Documentos.
		if (($t1 == 't') && ($t2 == 'm') && ($t3 == 5)) {
			$color = "#bcada0";
		}
	?>
	
	
<tr>
		<td style=" text-align: center; width: 80px;">
			<?php
				if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/covers/" . $item['Item']['cover_path']))){
				if($t1=='k' && $t2=='b'){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px','height'=>'99px', 'url' => array('controller' => 'manuscripts', 'action' => 'view', $item['Item']['id'])));
				}else if ($t1=='a' && $t2=='m'){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px','height'=>'99px', 'url' => array('controller' => 'books', 'action' => 'view', $item['Item']['id'])));
				}else if ($t1=='a' && $t2=='s'){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px','height'=>'99px', 'url' => array('controller' => 'magazines', 'action' => 'view', $item['Item']['id'])));
				}else if ($t1=='d' && $t2=='m'){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px','height'=>'99px', 'url' => array('controller' => 'manuscripts', 'action' => 'view', $item['Item']['id'])));
				}else if ($t1=='c' && $t2=='m'){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px','height'=>'99px', 'url' => array('controller' => 'printeds', 'action' => 'view', $item['Item']['id'])));
				
				}else {
					echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px','height'=>'99px', 'url' => array('controller' => 'books', 'action' => 'view', $item['Item']['id'])));
				}
				}
			?>
		</td>
		<td>
			<dl class="dl-horizontal">
				<dt style="width: 120px">
					<?php __('Title:');?>
				</dt>
				<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['245'])) {
							$title = marc21_decode($item['Item']['245']);
							if ($title) {
								echo $title['a'] . '.';

								if (isset($title['b'])) {echo ' <i>' . $title['b'] . '.</i>';}
								if (isset($title['c'])) {echo ' ' . $title['c']. '.';}
								if (isset($title['h'])) {echo ' ' . $title['h']. '.';}
							}
						}
					?>
				</dd>
				<dt style="width: 120px">
					<?php __('Author:');?>
				</dt>
				<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['100'])) {
							$author = marc21_decode($item['Item']['100']);
							echo $author['a']. '.';
							if (isset($author['d'])) {echo ' ' . $author['d']. '.';}
						}
					?>
				</dd>
				
				<?php if (!empty($item['Item']['690'])) { ?>
				<dt style="width: 120px"><?php __('Siglo:');?></dt>
				<dd style="margin-left: 130px">
				<?php
					$century = marc21_decode($item['Item']['690']);
					echo $century['a'] . '.';
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
			<?php if (!empty($item['Item']['653'])) { ?>
				<dt style="width: 120px"><?php __('Materia:');?></dt>
				<dd style="margin-left: 130px">
				<?php
					$matter = marc21_decode($item['Item']['653']);
					echo $matter['a'] . '.';
				?>
				</dd>
				<?php } ?>
				<dt style="width: 120px"><?php __('Tipo:');?></dt>
				<dd style="margin-left: 130px">
				<?php
					$t1 = $item['Item']['h-006'];
					$t2 = $item['Item']['h-007'];
					$t3 = $item['Item']['type'];
					
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
						// Música impresa.
					if (($t1 == 'c') && ($t2 == 'c')) {
						echo "Música Impresa";
					}
						// Música impresa.
					if (($t1 == 'c') && ($t2 == 'a')) {
						echo "Música Impresa";
					}
						// Música impresa.
					if (($t1 == 'c') && ($t2 == 'b')) {
						echo "Música Impresa";
					}
					// Música manuscrita.
					if (($t1 == 'd') && ($t2 == 'c')) {
						echo "Música Manuscrita";
					}
					
					// Música manuscrita.
					if (($t1 == 'd') && ($t2 == 'm')) {
						echo "Música Manuscrita";
					}
					// Música manuscrita.
					if (($t1 == 'd') && ($t2 == 'a')) {
						echo "Música Manuscrita";
					}
					// Música manuscrita.
					if (($t1 == 'd') && ($t2 == 'c')) {
						echo "Música Manuscrita";
					}
					//iconografía.
					if (($t1 == 'k') && ($t2 == 'b')) {
						echo "Iconografía Musical en Venezuela";
					}
					//iconografía.
					if (($t1 == 'k') && ($t2 == 'm')) {
						echo "Iconografía Musical en Venezuela";
					}
					//iconografía.
					if (($t1 == 'k') && ($t2 == 'a')) {
						echo "Iconografía Musical en Venezuela";
					}

					// Trabajos académicos.
					if (($t1 == 't') && ($t2 == 'm') && ($t3 == 0)) {
						echo "Trabajos Académicos.";
					}
					
					// Documentos.
					if (($t1 == 't') && ($t2 == 'm') && ($t3 == 5)) {
						echo "Documentos.";
					}
				?>
				</dd>
					<?php if (!empty($item['Item']['650'])) { ?>
					<dt style="width: 120px"><?php __('Temas:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$mattername = marc21_decode($item['Item']['650']);
						if (!empty($this->data['manuscripts']['Temas'])) {
							echo '<b>' . $mattername['a'] . '.</b>';
						} else {
							echo $mattername['a'] . '.';
						}
						if (isset($mattername['x'])) {echo ' ' . $mattername['x']. '.';}
					?>
					</dd>
					<?php } ?>
			</dl>
		</td>
	</tr>
	
	<?php endforeach; ?>
	</table>
		<?php } else { ?>
			<br />
			<?php if (isset($this->data)) { ?>
				<h4>No hay obras que coincidan con esta búsqueda</h4>
			<?php }
		}?>
	
	
	 <?php if ((isset($this->Paginator)) && ($this->Paginator->params['paging']['Item']['pageCount'] > 1)) { ?>
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