<script type="text/javascript">
// function validate() {
// var txt = document.getElementById("AcademicPaper245");
// if(txt.value== "" || txt.value== null) {
// alert("Por favor, ingrese al menos el título");
// txt.style.border = "2px solid red";
// return false;
// } else {
// txt.style.border = "";
// }
// }
</script>

<style>
input{
	width: 200px;
}	
		
</style>

<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '2'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li><a href="<?php echo $this->base; ?>/academic_papers">Trabajos Acad&eacute;micos</a></li>
  	<li>B&uacute;squeda Avanzada</span></li>
</ul>
<?php } else if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '1'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li><a href="<?php echo $this->base; ?>/academic_papers">Trabajos Acad&eacute;micos</a></li>
 	<li>B&uacute;squeda Avanzada</span></li>
</ul>
<?php } else { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/pages">Inicio</a></li>
 <li><a href="<?php echo $this->base; ?>/academic_papers">Trabajos Acad&eacute;micos</a></li>
  	<li>B&uacute;squeda Avanzada</span></li>
</ul>
<?php } ?>




<h2 style="text-align:center">Búsqueda Avanzada</h2>

<div class="items" style="text-align: center;">
<?php echo $this->Form->create('AcademicPaper' ,array('onsubmit' => 'return validate();')); ?>
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
			<?php echo $this->Form->input('650', array('div' => false, 'label' => false, 'placeholder' => 'Materia')); ?>
		</div>
		
		<br /><br />
		
		<div style="float: left; width: 100%; text-align: center;">
			&nbsp;
			<?php echo $this->Form->input('653', array('div' => false, 'label' => false, 'placeholder' => 'Palabras clave')); ?>
		</div>
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
		if (($t1 == 't') && ($t2 == 'm')) {
			$color = "#d1c7be";
		}
	?>
	
	
<tr>
		<td style="text-align: center; width: 100px;">
			<?php
				if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){
					if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/webroot/covers/" . $item['Item']['cover_path']))){
						echo "<a href='".$this->base.'/academic_papers/view/'.$item['Item']['id']."'>".$this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('width' => '90%', 'title' => $item['Item']['cover_name']))."</a>";
					} else {
						echo "<a href='".$this->base.'/academic_papers/view/'.$item['Item']['id']."'>".$this->Html->image("/webroot/img/sin_portada.jpg", array('width' => '90%'))."</a>";
					}
				} else {
					if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/covers/" . $item['Item']['cover_path']))){
					if (($t1 == 'a') && ($t2 == 'm')){	
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.',  'width' => '80px','height'=>'100px', 'url' => array('controller' => 'books', 'action' => 'view', $item['Item']['id'])));
				}else if (($t1=='k' && $t2=='b') or ($t1=='k' && $t2=='a') or ($t1=='k' && $t2=='m')){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.',  'width' => '80px','height'=>'100px', 'url' => array('controller' => 'iconographies', 'action' => 'view', $item['Item']['id'])));
				}else if (($t1==='d' && $t2='c') or ($t1=='d' && $t2=='a') or ($t1=='d' && $t2=='m')){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.',  'width' => '80px','height'=>'100px', 'url' => array('controller' => 'manuscripts', 'action' => 'view', $item['Item']['id'])));
				}else if (($t1=='c' && $t2=='c') or ($t1=='c' && $t2=='a') or ($t1=='c' && $t2=='m') or ($t1=='c' && $t2=='b')){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.',  'width' => '80px','height'=>'100px', 'url' => array('controller' => 'printeds', 'action' => 'view', $item['Item']['id'])));
				}else if ($t1=='t' && $t2=='m'){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.',  'width' => '80px','height'=>'100px', 'url' => array('controller' => 'academic_papers', 'action' => 'view', $item['Item']['id'])));
							
				}else{echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('width' => '90%'));
				}
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
				
				<?php if (!empty($item['Item']['650'])) { ?>
				<dt style="width: 120px"><?php __('Materia:');?></dt>
				<dd style="margin-left: 130px">
				<?php
					$century = marc21_decode($item['Item']['650']);
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
				<dt style="width: 120px"><?php __('Palabras clave:');?></dt>
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
					// Trabajos Académicos.
					if (($t1 == 't') && ($t2 == 'm')) {
						echo "Trabajos Académicos";
					}
				?>
				</dd>
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