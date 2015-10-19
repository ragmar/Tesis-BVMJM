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

<?php echo $this->Html->script('incipit/incipitManager'); ?>
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

<?php if(isset($_POST['submit'])){ if(!empty($_POST['Item_id'])) {
	 // Counting number of checked checkboxes.
	 $checked_count = count($_POST['Item_id']); 
	 echo "You have selected following ".$checked_count." option(s): <br/>";
	 // Loop to store and display values of individual checked checkbox. 
	 foreach($_POST['Item_id'] as $selected) { echo "<p>".$selected ."</p>"; }
	 echo "<br/><b>Note :</b> <span>Similarily, You Can Also Perform CRUD Operations using These Selected Values.</span>"; }
	 else{ echo "<b>Please Select Atleast One Option.</b>"; } } ?>

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
	.btn-primaryt:hover {
	border-radius: 0px;
	border: solid 1px #6C3F30;
	background: #E8DED4;
	color: #6C3F30;
}
	.btn-primaryt {
		width: 24px;
		height: 35px;
		margin: 2px 2px 0px 0px;
		padding: 8px 0px 0px 0px;
		text-align: center;
		float: left;
	}
	.btn-primaryt {
	border-radius: 0px;
	background: #6C3F30;
	border-color: #6C3F30;
	}
	.btn-primaryt {
	color: #fff;
	}
	.btn-primaryt:hover {
		text-decoration: none;
	}
	
.botones {
 font-family: Geneva, Arial, Helvetica, sans-serif;
 font-size: 10px;
 font-weight: bold;
 color: #333333;
 text-decoration: blink;
 background-color: #FF6600;
 border-top-color: #000000;
 border-right-color: #000000;
 border-bottom-color: #000000;
 border-left-color: #000000;
 border-color: #000000;
 border-top-style: solid;
 border-right-style: solid;
 border-bottom-style: solid;
 border-left-style: solid;
 border-style: solid;
}	
.button
  {

  border: 1px solid #DBE1EB;
  font-size: 18px;
  font-family: Arial, Verdana;
  padding-left: 7px;
  padding-right: 7px;
  padding-top: 5px;
  padding-bottom: 5px;
  border-radius: 4px;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  -o-border-radius: 4px;
  background: #4972B5;
  background: linear-gradient(left, #4972B5, #618ACB);
  background: -moz-linear-gradient(left, #4972B5, #618ACB);
  background: -webkit-linear-gradient(left, #4972B5, #618ACB);
  background: -o-linear-gradient(left, #4972B5, #618ACB);
  color: #FFFFFF;

  }

  .button:hover
  {
  background: #365D9D;
  background: linear-gradient(left, #365D9D, #436CAD);
  background: -moz-linear-gradient(left, #365D9D, #436CAD);
  background: -webkit-linear-gradient(left, #365D9D, #436CAD);
  background: -o-linear-gradient(left, #365D9D, #436CAD);
  color: #FFFFFF;
  border-color: #FBFFAD;
  }
	
</style>
<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '2'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
<li>Música Manuscrita</li>
</ul>
<?php } else if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '1'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
<li>Música Manuscrita</li>
</ul>
<?php } else { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/pages">Inicio</a></li>
<li>Música Manuscrita</li>
</ul>
<?php } ?>

<div class='century view'>
	<div class="col-md-9 column">
	<h2>Módulo Música Manuscrita <font size="3">(<?php echo count($items); ?> Obras Cargadas)</font></h2>	
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
					if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . $this->base."/app/webroot/attachments/files/med/" . $item['Item']['cover_path']))){
						echo $this->Html->image("/app/webroot/attachments/files/med/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'height' => '100px', 'url' => array('controller' => 'manuscripts', 'action' => 'view', $item['Item']['id'])));
					} else {
						echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'height' => '100px', 'url' => array('controller' => 'manuscripts', 'action' => 'view', $item['Item']['id'])));
					}
				} else {
					if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/attachments/files/med/" . $item['Item']['cover_path']))){
						echo $this->Html->image("/app/webroot/attachments/files/med/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'height' => '100px', 'url' => array('controller' => 'manuscripts', 'action' => 'view', $item['Item']['id'])));
					} else {
						echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => 'manuscripts', 'action' => 'view', $item['Item']['id'])));
					}
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
											echo $html->image('/app/webroot/img/ts/bookmark.png', array('alt' => 'Mi Biblioteca', 'title' => 'Obra agregada a la biblioteca.', 'style' => 'width: 20px;'));
											echo "&nbsp;";
										}
									endforeach;
									
									if (!empty($this->data['manuscripts']['Titulo'])) {
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
					
					
					
					<?php if (!empty($item['Item']['031'])) { ?>
						<dt style="width: 120px"><?php __('Tonalidad:');?></dt>
						<dd style="margin-left: 130px">
						<?php
						$hue = marc21_decode($item['Item']['031']);
						if (!empty($this->data['manuscripts']['Tonalidad'])) {
							echo '<b>' . $hue['r'] . '.</b>';
						} else {
							echo $hue['r'] . '.';
						}
						?>
					</dd>
					<?php } ?>
					<dt style="width: 120px"><?php __('Autor:');?></dt>
					<dd style="margin-left: 130px">
						<?php
							if (!empty($item['Item']['100'])) {
								$author = marc21_decode($item['Item']['100']);
								if (!empty($this->data['manuscripts']['Autor'])) {
									echo '<b>' . $author['a'] . '.</b>';
								} else {
									echo $author['a'] . '.';
								}
								if (isset($author['d'])) {echo ' ' . $author['d']. '.';}
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
					<?php if (!empty($item['Item']['382'] )){ ?>
					<dt style="width: 120px"><?php __('Instrumento:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$sound = marc21_decode($item['Item']['382']);
						if (!empty($this->data['manuscripts']['Instrumento'])) {
							echo '<b>' . $sound ['a'] . '.</b>';
						} else {
							echo $sound['a'] . '.';
						}
						?>
						</dd>
					<?php } ?>
					
					<?php if (!empty($item['Item']['653'])) { ?>
					<dt style="width: 120px"><?php __('Materia:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$matter = marc21_decode($item['Item']['653']);
						if (!empty($this->data['manuscripts']['Materia'])) {
							echo '<b>' . $matter['a'] . '.</b>';
						} else {
							echo $matter['a'] . '.';
						}
					?>
					</dd>
					<?php } ?>
					
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
					?>
					</dd>
					<?php } ?>
					
					
					<?php if (!empty($item['Item']['700'] )){ ?>
					<dt style="width: 140px; margin-left: -20px;"><?php __('Mención </br>Responsabilidad:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$responsability = marc21_decode($item['Item']['700']);
						if (!empty($this->data['manuscripts']['Responsabilidad'])) {
							echo '<b>' . $responsability ['a'] . '.</b>';
						} else {
							echo "</br>", $responsability ['a'] . '.';
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
					<?php if (!empty($item['ItemsIncipit']['paec'])) { ?>
					<dt style="width: 120px; margin-top: 30px; margin-bottom: -30px;"><?php __('Incipit:');?></dt>
					<div class="maestro" style="visibility: hidden; height: 0">Font Load</div>
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
			<?php echo $this->Html->link(__('Agregar Obra', true), array('action' => 'add'), array('class' => 'btn btn-primary', 'style' => 'width: 100%;')); ?>
			<br /><br />
		<?php } ?>
		<br />
		<label style="border-bottom: solid 1px #6C3F30;"><?php __('Filtrar por:'); ?></label>
		<br />
		
		<?php echo $this->Form->create('manuscripts'); ?>

		<div style="clear: both;">
			<label>Título:</label><br />
			<?php echo $this->Form->hidden('Titulo', array('class' => 'form-control', 'label' => 'Título')); ?>
			<?php echo $this->Html->link('A', array('action' => 'A'), array('id' => 'titulo-A', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("A"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => 'B'), array('id' => 'titulo-B', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("B"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => 'C'), array('id' => 'titulo-C', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("C"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => 'D'), array('id' => 'titulo-D', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => 'E'), array('id' => 'titulo-E', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("E"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => 'F'), array('id' => 'titulo-F', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => 'G'), array('id' => 'titulo-G', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("G"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => 'H'), array('id' => 'titulo-H', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("H"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => 'I'), array('id' => 'titulo-I', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("I"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => 'J'), array('id' => 'titulo-J', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("J"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => 'K'), array('id' => 'titulo-K', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("K"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => 'L'), array('id' => 'titulo-L', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => 'M'), array('id' => 'titulo-M', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => 'N'), array('id' => 'titulo-N', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("N"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => 'O'), array('id' => 'titulo-O', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("O"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => 'P'), array('id' => 'titulo-P', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("P"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => 'Q'), array('id' => 'titulo-Q', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("Q"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => 'R'), array('id' => 'titulo-R', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => 'S'), array('id' => 'titulo-S', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("S"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => 'T'), array('id' => 'titulo-T', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("T"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => 'U'), array('id' => 'titulo-U', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("U"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => 'V'), array('id' => 'titulo-V', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("V"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => 'W'), array('id' => 'titulo-W', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("W"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => 'X'), array('id' => 'titulo-X', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("X"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => 'Y'), array('id' => 'titulo-Y', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("Y"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => 'Z'), array('id' => 'titulo-Z', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("Z"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => ''), array('id' => 'titulo-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsTitulo").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['Titulo']; ?>" != "") {
				$("#<?php echo "titulo-".$this->data['manuscripts']['Titulo']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "titulo-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
			<div style="clear: both;">		
			<label>Instrumento:</label><br />
			<?php echo $this->Form->hidden('Instrumento', array('class' => 'form-control', 'label' => 'Instrumento')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'Instrumento-A', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("A"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'Instrumento-B', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("B"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'Instrumento-C', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("C"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'Instrumento-D', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'Instrumento-E', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("E"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'Instrumento-F', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'Instrumento-G', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("G"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'Instrumento-H', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("H"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'Instrumento-I', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("I"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'Instrumento-J', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("J"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'Instrumento-K', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("K"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'Instrumento-L', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'Instrumento-M', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'Instrumento-N', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("N"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'Instrumento-O', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("O"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'Instrumento-P', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("P"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'Instrumento-Q', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("Q"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'Instrumento-R', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'Instrumento-S', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("S"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'Instrumento-T', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("T"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'Instrumento-U', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("U"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'Instrumento-V', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("V"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'Instrumento-W', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("W"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'Instrumento-X', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("X"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'Instrumento-Y', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("Y"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'Instrumento-Z', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsInstrumento").val("Z"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'Instrumento-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsInstrumento").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['Instrumento']; ?>" != "") {
				$("#<?php echo "Instrumento-".$this->data['manuscripts']['Instrumento']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "Instrumento-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">		
			<label>Tonalidad:</label><br />
			<?php echo $this->Form->hidden('Tonalidad', array('class' => 'form-control', 'label' => 'Tonalidad')); ?>
			<?php echo $this->Html->link('Do', array('action' => '/D'), array('id' => 'Tonalidad-D', 'class' => 'btn-primaryt', 'onclick' => '$("#manuscriptsTonalidad").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Re', array('action' => '/R'), array('id' => 'Tonalidad-R', 'class' => 'btn-primaryt', 'onclick' => '$("#manuscriptsTonalidad").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Mi', array('action' => '/M'), array('id' => 'Tonalidad-M', 'class' => 'btn-primaryt', 'onclick' => '$("#manuscriptsTonalidad").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Fa', array('action' => '/F'), array('id' => 'Tonalidad-F', 'class' => 'btn-primaryt', 'onclick' => '$("#manuscriptsTonalidad").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Sol', array('action' => '/SOL'), array('id' => 'Tonalidad-SOL', 'class' => 'btn-primaryt', 'onclick' => '$("#manuscriptsTonalidad").val("SOL"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('La', array('action' => '/L'), array('id' => 'Tonalidad-L', 'class' => 'btn-primaryt', 'onclick' => '$("#manuscriptsTonalidad").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Si', array('action' => '/SI'), array('id' => 'Tonalidad-SI', 'class' => 'btn-primaryt', 'onclick' => '$("#manuscriptsTonalidad").val("SI"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'Tonalidad-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsTonalidad").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscriptsf']['Tonalidad']; ?>" != "") {
				$("#<?php echo "Tonalidad-".$this->data['manuscripts']['Tonalidad']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 23px;');
			} else {
				$("#<?php echo "Tonalidad-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">
			<label>Autor:</label><br />
			<?php echo $this->Form->hidden('Autor', array('class' => 'form-control', 'label' => 'Autor')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'autor-A', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("A"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'autor-B', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("B"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'autor-C', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("C"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'autor-D', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'autor-E', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("E"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'autor-F', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'autor-G', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("G"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'autor-H', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("H"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'autor-I', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("I"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'autor-J', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("J"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'autor-K', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("K"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'autor-L', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'autor-M', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'autor-N', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("N"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'autor-O', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("O"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'autor-P', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("P"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'autor-Q', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("Q"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'autor-R', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'autor-S', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("S"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'autor-T', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("T"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'autor-U', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("U"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'autor-V', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("V"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'autor-W', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("W"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'autor-X', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("X"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'autor-Y', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("Y"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'autor-Z', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("Z"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'autor-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsAutor").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['Autor']; ?>" != "") {
				$("#<?php echo "autor-".$this->data['manuscripts']['Autor']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "autor-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">		
			<label>Materia:</label><br />
			<?php echo $this->Form->hidden('Materia', array('class' => 'form-control', 'label' => 'Materia')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'materia-A', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("A"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'materia-B', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("B"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'materia-C', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("C"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'materia-D', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'materia-E', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("E"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'materia-F', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'materia-G', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("G"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'materia-H', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("H"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'materia-I', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("I"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'materia-J', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("J"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'materia-K', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("K"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'materia-L', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'materia-M', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'materia-N', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("N"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'materia-O', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("O"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'materia-P', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("P"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'materia-Q', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("Q"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'materia-R', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'materia-S', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("S"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'materia-T', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("T"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'materia-U', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("U"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'materia-V', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("V"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'materia-W', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("W"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'materia-X', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("X"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'materia-Y', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("Y"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'materia-Z', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("Z"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'materia-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsMateria").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['Materia']; ?>" != "") {
				$("#<?php echo "materia-".$this->data['manuscripts']['Materia']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "materia-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
			
		
		<div style="clear: both;">		
			<label>Temas:</label><br />
			<?php echo $this->Form->hidden('Temas', array('class' => 'form-control', 'label' => 'Temas')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'temas-A', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("A"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'temas-B', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("B"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'temas-C', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("C"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'temas-D', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'temas-E', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("E"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'temas-F', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'temas-G', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("G"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'temas-H', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("H"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'temas-I', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("I"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'temas-J', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("J"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'temas-K', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("K"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'temas-L', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'temas-M', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'temas-N', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("N"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'temas-O', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("O"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'temas-P', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("P"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'temas-Q', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("Q"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'temas-R', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'temas-S', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("S"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'temas-T', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("T"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'temas-U', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("U"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'temas-V', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("V"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'temas-W', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("W"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'temas-X', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("X"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'temas-Y', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("Y"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'temas-Z', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("Z"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'temas-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsTemas").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['Temas']; ?>" != "") {
				$("#<?php echo "temas-".$this->data['manuscripts']['Temas']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "temas-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>

	
		
		
		<div style="clear: both;">		
			<label>Mención Responsabilidad:</label><br />
			<?php echo $this->Form->hidden('Responsabilidad', array('class' => 'form-control', 'label' => 'Responsabilidad')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'Responsabilidad-A', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("A"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'Responsabilidad-B', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("B"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'Responsabilidad-C', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("C"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'Responsabilidad-D', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'Responsabilidad-E', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("E"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'Responsabilidad-F', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'Responsabilidad-G', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("G"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'Responsabilidad-H', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("H"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'Responsabilidad-I', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("I"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'Responsabilidad-J', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("J"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'Responsabilidad-K', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("K"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'Responsabilidad-L', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'Responsabilidad-M', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'Responsabilidad-N', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("N"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'Responsabilidad-O', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("O"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'Responsabilidad-P', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("P"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'Responsabilidad-Q', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("Q"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'Responsabilidad-R', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'Responsabilidad-S', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("S"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'Responsabilidad-T', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("T"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'Responsabilidad-U', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("U"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'Responsabilidad-V', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("V"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'Responsabilidad-W', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("W"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'Responsabilidad-X', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("X"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'Responsabilidad-Y', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("Y"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'Responsabilidad-Z', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("Z"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'Responsabilidad-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsResponsabilidad").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['Responsabilidad']; ?>" != "") {
				$("#<?php echo "Responsabilidad-".$this->data['manuscripts']['Responsabilidad']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "Responsabilidad-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
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