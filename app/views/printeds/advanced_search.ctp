<script type="text/javascript">
function validate() {


var title = document.getElementById("Printed245");
var autor = document.getElementById("Printed100");
var lugar = document.getElementById("Printed260");
var materia = document.getElementById("Printed653");
var siglo = document.getElementById("Printed648");
var incipit =document.getElementById("incipitTransposition");
var paec =document.getElementById("incipitPaec");

if((title.value== "" || title.value== null) &&
	(autor.value== "" || autor.value== null) &&
	(lugar.value== "" || lugar.value== null) &&
	(materia.value== "" || materia.value== null) &&
	(siglo.value== "" || siglo.value== null) &&
	(incipit.value== "" || incipit.value== null)) {

	if((paec.value != null && paec.value.length != 0) &&
		(incipit.value == "" || incipit.value == null || incipit.value.length == 0))
	{
		alert("El íncipit tiene que tener al menos dos notas");
	}else
	{
		alert("Por favor, ingrese al menos el título");
		title.style.border = "2px solid red";
	}
return false;
} else {
title.style.border = "";
}
}

</script>
<style>
input{
	width: 200px;
}	
		
</style>


<?php echo $this->Html->script('incipit/incipitManager'); ?>
<?php echo $this->Html->css('incipit/incipit-css'); ?>
<script type="text/javascript">

	function addLoadEvent(func) {
	  var oldonload = window.onload;
	  if (typeof window.onload != 'function') {
	    window.onload = func;
	  } else {
	    window.onload = function() {
	      if (oldonload) {
	        oldonload();
	      }
	      func();
	    }
	  }
	}
</script>

<style>
	@font-face 
	{
	  	font-family: Maestro;
	  	src: url(<?php echo $this->Html->url('/files/incipit/Maestro.ttf'); ?>) format('truetype');

		/*src: url('StreetFighter.eot'); /* IE9 Compat Modes */
		/*src: url('StreetFighter.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
	    /*url('StreetFighter.woff') format('woff'), /* Modern Browsers */
	    /*url('StreetFighter.ttf')  format('truetype'), /* Safari, Android, iOS */
	    /*url('StreetFighter.svg') format('svg'); /* Legacy iOS */
	}

	.maestro
	{
		font-family: Maestro;
		font-size: 15pt;
	} 
</style>

<ul class="breadcrumb" style="margin: 0">
	<li><font size="1.5" color="gray">Ir a</font></li>
	<li><a href="<?php echo $this->base; ?>/pages">Inicio</a></span></li>
	<li><a href="<?php echo $this->base; ?>/printeds">Música Impresa</a></span></li>
	<li>B&uacute;squeda Avanzada</span></li>
</ul>

<h2 style="text-align:center">Búsqueda Avanzada</h2>

<div class="items" style="text-align: center;">
<?php echo $this->Form->create('Printed', array('onsubmit' => 'return validate();')); ?>
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
	<div>
		<table>
			<tr>
				<td style="width: 10%;"></td>
				<td style="width: 45%; text-align: left">
					<br />
					<label style="border-bottom: solid 1px #6C3F30;"><?php __('Menú del Íncipit'); ?></label>
					<br />

					<div style="clear: both;">
						<label>Alteraciones:</label><br />
					</div>
					<div class="maestro" style="clear: both;">
						<!-- From L to P!-->
						<?php echo $this->Html->link('p', array('action' => 'p'), array('id' => 'Alterationes-p', 'class' => 'btn-primary buton-incipit','onclick' => 'alterationPressed("p"); return false;')); ?>
						<?php echo $this->Html->link('l', array('action' => 'l'), array('id' => 'Alterationes-l', 'class' => 'btn-primary buton-incipit','onclick' => 'alterationPressed("l"); return false;')); ?>
						<?php echo $this->Html->link('m', array('action' => 'm'), array('id' => 'Alterationes-m', 'class' => 'btn-primary buton-incipit','onclick' => 'alterationPressed("m"); return false;')); ?>
						<?php echo $this->Html->link('n', array('action' => 'n'), array('id' => 'Alterationes-n', 'class' => 'btn-primary buton-incipit','onclick' => 'alterationPressed("n"); return false;')); ?>
						<?php echo $this->Html->link('o', array('action' => 'o'), array('id' => 'Alterationes-o', 'class' => 'btn-primary buton-incipit','onclick' => 'alterationPressed("o"); return false;')); ?>
					</div>

					<div style="clear: both;">
						<label>Armadura de Compás:</label><br />
					</div>
					<div class="maestro" style="clear: both;">		
						<?php echo $this->Html->link('t', array('action' => 't'), array('id' => 'Time-t', 'class' => 'btn-primary buton-incipit compas-incipit', 'onclick' => 'TimePressed("t"); return false;')); ?>
						<?php echo $this->Html->link('u', array('action' => 'u'), array('id' => 'Time-u', 'class' => 'btn-primary buton-incipit compas-incipit', 'onclick' => 'TimePressed("u"); return false;')); ?>
						<?php echo $this->Html->link('v', array('action' => 'v'), array('id' => 'Time-v', 'class' => 'btn-primary buton-incipit compas-incipit', 'onclick' => 'TimePressed("v"); return false;')); ?>
						<?php echo $this->Html->link('w', array('action' => 'w'), array('id' => 'Time-w', 'class' => 'btn-primary buton-incipit compas-incipit', 'onclick' => 'TimePressed("w"); return false;')); ?>
						<?php echo $this->Html->link('x', array('action' => 'x'), array('id' => 'Time-x', 'class' => 'btn-primary buton-incipit compas-incipit', 'onclick' => 'TimePressed("x"); return false;')); ?>
						<?php echo $this->Html->link('y', array('action' => 'y'), array('id' => 'Time-y', 'class' => 'btn-primary buton-incipit compas-incipit', 'onclick' => 'TimePressed("y"); return false;')); ?>
						<?php echo $this->Html->link('z', array('action' => 'z'), array('id' => 'Time-z', 'class' => 'btn-primary buton-incipit compas-incipit', 'onclick' => 'TimePressed("z"); return false;')); ?>
						<?php echo $this->Html->link('{', array('action' => '{'), array('id' => 'Time-{', 'class' => 'btn-primary buton-incipit compas-incipit', 'onclick' => 'TimePressed("{"); return false;')); ?>
						<?php echo $this->Html->link('|', array('action' => '|'), array('id' => 'Time-|', 'class' => 'btn-primary buton-incipit compas-incipit', 'onclick' => 'TimePressed("|"); return false;')); ?>
					</div>

					<div style="clear: both;">
						<label>Barras de Compás:</label><br />
					</div>
					<div class="maestro" style="clear: both;">	
						<?php echo $this->Html->link(';', array('action' => ';'), array('i;' => 'Barra-y', 'class' => 'btn-primary buton-incipit barras-incipit', 'onclick' => 'BarPressed(";"); return false;')); ?>	
						<?php echo $this->Html->link('<', array('action' => '<'), array('id' => 'Barra-<', 'class' => 'btn-primary buton-incipit barras-incipit', 'onclick' => 'BarPressed("<"); return false;')); ?>
						<?php echo $this->Html->link('>', array('action' => '>'), array('id' => 'Barra->', 'class' => 'btn-primary buton-incipit barras-incipit', 'onclick' => 'BarPressed(">"); return false;')); ?>
						<?php echo $this->Html->link('?', array('action' => '?'), array('id' => 'Barra-?', 'class' => 'btn-primary buton-incipit barras-incipit', 'onclick' => 'BarPressed("?"); return false;')); ?>
						<?php echo $this->Html->link('@', array('action' => '@'), array('id' => 'Barra-@', 'class' => 'btn-primary buton-incipit barras-incipit', 'onclick' => 'BarPressed("@"); return false;')); ?>
					</div>
					
					<div style="clear: both;">
						<label>Figuras Rítmicas:</label><br />
					</div>
					<div class="maestro" style="clear: both;">		
						<?php echo $this->Html->link('b', array('action' => 'b'), array('id' => 'Ritmo-b', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("b"); return false;')); ?>
						<?php echo $this->Html->link('c', array('action' => 'c'), array('id' => 'Ritmo-c', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("c"); return false;')); ?>
						<?php echo $this->Html->link('d', array('action' => 'd'), array('id' => 'Ritmo-d', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("d"); return false;')); ?>
						<?php echo $this->Html->link('e', array('action' => 'e'), array('id' => 'Ritmo-e', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("e"); return false;')); ?>
						<?php echo $this->Html->link('f', array('action' => 'f'), array('id' => 'Ritmo-f', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("f"); return false;')); ?>
						<?php echo $this->Html->link('g', array('action' => 'g'), array('id' => 'Ritmo-g', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("g"); return false;')); ?>
						<?php echo $this->Html->link('h', array('action' => 'h'), array('id' => 'Ritmo-h', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("h"); return false;')); ?>
						<?php echo $this->Html->link('i', array('action' => 'i'), array('id' => 'Ritmo-i', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("i"); return false;')); ?>
						<?php echo $this->Html->link('j', array('action' => 'j'), array('id' => 'Ritmo-j', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("j"); return false;')); ?>
						<?php echo $this->Html->link('"', array('action' => '"'), array('id' => 'Ritmo-"', 'class' => 'btn-primary buton-incipit ritmicas-incipit', 'onclick' => 'NotePressed("\""); return false;')); ?>
						<?php echo $this->Html->link('#', array('action' => '#'), array('id' => 'Ritmo-#', 'class' => 'btn-primary buton-incipit ritmicas-incipit', 'onclick' => 'NotePressed("#"); return false;')); ?>
						<?php echo $this->Html->link('$', array('action' => '$'), array('id' => 'Ritmo-$', 'class' => 'btn-primary buton-incipit ritmicas-incipit', 'onclick' => 'NotePressed("$"); return false;')); ?>
						<?php echo $this->Html->link('%', array('action' => '%'), array('id' => 'Ritmo-%', 'class' => 'btn-primary buton-incipit ritmicas-incipit', 'onclick' => 'NotePressed("%"); return false;')); ?>
						<?php echo $this->Html->link('&', array('action' => '&'), array('id' => 'Ritmo-&', 'class' => 'btn-primary buton-incipit ritmicas-incipit', 'onclick' => 'NotePressed("&"); return false;')); ?>
						<?php echo $this->Html->link('\'', array('action' => '\''), array('id' => 'Ritmo-\'', 'class' => 'btn-primary buton-incipit ritmicas-incipit', 'onclick' => 'NotePressed("\'"); return false;')); ?>
						<?php echo $this->Html->link('(', array('action' => '('), array('id' => 'Ritmo-(', 'class' => 'btn-primary buton-incipit ritmicas-incipit', 'onclick' => 'NotePressed("("); return false;')); ?>
						<?php echo $this->Html->link(')', array('action' => ')'), array('id' => 'Ritmo-)', 'class' => 'btn-primary buton-incipit ritmicas-incipit', 'onclick' => 'NotePressed(")"); return false;')); ?>
						<?php echo $this->Html->link('*', array('action' => '*'), array('id' => 'Ritmo-*', 'class' => 'btn-primary buton-incipit ritmicas-incipit', 'onclick' => 'NotePressed("*"); return false;')); ?>
						<?php echo $this->Html->link('q', array('action' => 'q'), array('id' => 'Puntillo-q', 'class' => 'btn-primary buton-incipit ritmicas-incipit', 'onclick' => 'dotPressed("q"); return false;')); ?>
					</div>
					<div style="clear: both;">
						<label>Claves:</label><br />
					</div>
					<div class="maestro" style="clear: both;">
						<!-- From K to P!-->
						<?php echo $this->Html->link('1', array('action' => '1'), array('id' => 'Clave-1', 'class' => 'btn-primary buton-incipit', 'onclick' => 'ClefPressed("1"); return false;')); ?>
						<?php echo $this->Html->link('2', array('action' => '2'), array('id' => 'Clave-2', 'class' => 'btn-primary buton-incipit', 'onclick' => 'ClefPressed("2"); return false;')); ?>
						<?php echo $this->Html->link('3', array('action' => '3'), array('id' => 'Clave-3', 'class' => 'btn-primary buton-incipit', 'onclick' => 'ClefPressed("3"); return false;')); ?>
					</div>
				</td>
				<td style="width: 45%;" class="col-xs-12">
					<div style="float: right">
					<?php echo $this->Html->link('Borrar Nota', array('action' => 'DeleteNote'), array('id' => 'DeleteNote', 'class' => 'btn-primary buton-incipit', 'style' => 'width: 100px;','onclick' => 'deleteNote(false); return false;')); ?>
					<?php echo $this->Html->link('Borrar Íncipit', array('action' => 'DeleteIncipit'), array('id' => 'DeleteIncipit', 'class' => 'btn-primary buton-incipit', 'style' => 'width: 100px;', 'onclick' => 'deleteNote(true); return false;')); ?>
					</div>

					<?php echo $this->Form->button('^', array('type' => 'button', 'id' => 'toneUp', 'onclick' => 'toneUpDown(-1);', 'class' => 'toneUp')); ?>
					<?php echo $this->Form->button('^', array('type' => 'button', 'id' => 'toneDown', 'class' => 'toneDown', 'onclick' => 'toneUpDown(1);')); ?>

					<canvas id="incipit" width="800" height="320" class="maestro">
						<script> 
							addLoadEvent(
								function() {
									var incipitDocument = document.getElementById("incipit");
									initializeIncipit(incipitDocument.id, "search", null , null); 
								}
							);
						</script>
					</canvas>

					<?php 
						echo $this->Form->hidden('ItemsIncipit.paec', array('id' => 'incipitPaec', 'label' => false, 'div' => false, 'class' => 'form-control'));
						echo $this->Form->hidden('ItemsIncipit.transposition', array('id' => 'incipitTransposition', 'label' => false, 'div' => false, 'class' => 'form-control'));
						?>
				</td>
			</tr>
		</table>

	</div>
	
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
			$controller = "academic_papers";
		}
		
		// Documentos
		if (($t1 == 't') && ($t2 == 'm') && ($t3 == 5)) {
			$color = "#d1c7be";
			$controller = "documents";
		}
	?>
	
	
<tr>
		<td style=" text-align: center; width: 80px;">
			<?php
				if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/covers/" . $item['Item']['cover_path']))){
				if($t1=='k' && $t2=='b'){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px','height'=>'99px', 'url' => array('controller' => 'printeds', 'action' => 'view', $item['Item']['id'])));
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
						if (!empty($this->data['printeds']['Temas'])) {
							echo '<b>' . $mattername['a'] . '.</b>';
						} else {
							echo $mattername['a'] . '.';
						}
						if (isset($mattername['x'])) {echo ' ' . $mattername['x']. '.';}
					?>
					</dd>
					<?php } ?>
				<?php if (!empty($item['ItemsIncipit']['paec'])) { ?>
				<dt style="width: 120px; margin-top: 30px; margin-bottom: -30px;"><?php __('Incipit:');?></dt>

				<dd style="margin-left: 130px">
					<?php 
						echo "<canvas id= \"canvas" . $item['Item']['id'] . "\" width=\"400\" height=\"160\" class=\"maestro\" style=\"margin-top: -40px; margin-bottom: -40px;\">";
					?>
						<script> 
							addLoadEvent(
								function() {
									var incipitDocument = <?php echo "\"". $item['Item']['id'] . "\"" ;?>;
									var paec = <?php echo "\"" .$item['ItemsIncipit']['paec'] . "\"" ;?>;
									incipitDocument = document.getElementById("canvas" + incipitDocument); 
									var currentCanvas = new CanvasClass();
									initializeIncipit(incipitDocument.id, "list", paec, currentCanvas); 
								}
							);
						</script>

					<?php 
						echo "</canvas>";
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