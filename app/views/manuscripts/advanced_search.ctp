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
<?php echo $this->Html->css('incipit/incipitManager'); ?>
<style>
	@font-face {
	  font-family: Maestro;
	  src: url(<?php echo $this->Html->url('/files/incipit/test.ttf'); ?>) format('truetype');
	}
	.test 
	{
	}

	.test2
	{
		padding-top: 30%;
		padding-left: 0px;
		padding-right: 0px;
		padding-bottom: 0px;
	}

	.test3
	{
		padding-left: inherit;
		padding-right: inherit;
	}

	.test4
	{
		padding-left: inherit;
		padding-right: inherit;
	}
	.test5
	{
		width: 100%;
		padding-left: inherit;
		padding-right: inherit;
		padding-top: 0px;
		padding-bottom: inherit;
	}

	.Maestrotest
	{
		font-family: Maestro;
		font-size: 15pt;
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
	<div class="Maestrotest">
		<p>A B C D E F G H I J K L M N Ñ O P Q R S T U V W X Y Z
		<p>a b c d e f g h i j k l m n ñ o p q r s t u v w x y z
		<p> 1 2 3 4 5 6 7 8 9 0
		<p> ! " # $ % & / ( ) = ? ¡
		<p> , . ; : { } ´ * [ ]
		<p> rxr
	</div>
	<div>
	<!--<div class="row test">
		<div class="col-xs-2">
			<div class="row test2">
				<div class="col-xs-8 test2">
				</div>
				<div class="col-xs-2 test3">
					<?php
						echo $form->submit('', array( 'class' => 'btn btn-sm btn-default test5', 'type'=>'image','src' => '/bvmjm/img/TEG/note-4.png'));
						echo $form->submit('', array( 'class' => 'btn btn-sm btn-default test5', 'type'=>'image','src' => '/bvmjm/img/TEG/note-4.png'));
						echo $form->submit('', array( 'class' => 'btn btn-sm btn-default test5', 'type'=>'image','src' => '/bvmjm/img/TEG/note-4.png'));
						echo $form->submit('', array( 'class' => 'btn btn-sm btn-default test5', 'type'=>'image','src' => '/bvmjm/img/TEG/note-4.png'));
						echo $form->submit('', array( 'class' => 'btn btn-sm btn-default test5', 'type'=>'image','src' => '/bvmjm/img/TEG/note-4.png'));
						echo $form->submit('', array( 'class' => 'btn btn-sm btn-default test5', 'type'=>'image','src' => '/bvmjm/img/TEG/note-4.png'));
					?>
				</div>
				<div class="col-xs-2 test4">
					<?php
						echo $form->submit('', array( 'class' => 'btn btn-sm btn-default test5', 'type'=>'image','src' => '/bvmjm/img/TEG/note-4.png'));
						echo $form->submit('', array( 'class' => 'btn btn-sm btn-default test5', 'type'=>'image','src' => '/bvmjm/img/TEG/note-4.png'));
						echo $form->submit('', array( 'class' => 'btn btn-sm btn-default test5', 'type'=>'image','src' => '/bvmjm/img/TEG/note-4.png'));
						echo $form->submit('', array( 'class' => 'btn btn-sm btn-default test5', 'type'=>'image','src' => '/bvmjm/img/TEG/note-4.png'));
						echo $form->submit('', array( 'class' => 'btn btn-sm btn-default test5', 'type'=>'image','src' => '/bvmjm/img/TEG/note-4.png'));
						echo $form->submit('', array( 'class' => 'btn btn-sm btn-default test5', 'type'=>'image','src' => '/bvmjm/img/TEG/note-4.png'));
					?>
				</div>
			</div>
		</div> !-->
		<table class="col-xs-2 Maestro">
			<tr>
				<td>
					<?php
						echo $this->Form->button('Redirect1', array('type'=>'button'));
					?>
				</td>
				<td>
					<?php
						echo $this->Form->button('Redirect1', array('type'=>'button'));
					?>
				</td>
			</tr>
			<tr>
				<td>
					<?php
						echo $this->Form->button('Redirect1', array('type'=>'button'));
					?>
				</td>
				<td>
					<?php
						echo $this->Form->button('Redirect1', array('type'=>'button'));
					?>
				</td>
			</tr>
			<tr>
				<td>
					<?php
						echo $this->Form->button('Redirect1', array('type'=>'button'));
					?>
				</td>
				<td>
					<?php
						echo $this->Form->button('Redirect1', array('type'=>'button'));
					?>
				</td>
			</tr>
			<tr>
				<td>
					<?php
						echo $this->Form->button('Redirect1', array('type'=>'button'));
					?>
				</td>
				<td>
					<?php
						echo $this->Form->button('Redirect1', array('type'=>'button'));
					?>
				</td>
			</tr>
			<tr>
				<td>
					<?php
						echo $this->Form->button('Redirect1', array('type'=>'button'));
					?>
				</td>
				<td>
					<?php
						echo $this->Form->button('Redirect1', array('type'=>'button'));
					?>
				</td>
			</tr>
			<tr>
				<td>
					<?php
						echo $this->Form->button('Redirect1', array('type'=>'button'));
					?>
				</td>
				<td>
					<?php
						echo $this->Form->button('Redirect1', array('type'=>'button'));
					?>
				</td>
			</tr>
		</table>
		<!-- Por ahora width="1000" height="320" !-->
		<canvas id="incipit" class="col-xs-10" width="1000" height="320">
			<script> 
				var incipitDocument = document.getElementById("incipit");
				initializeIncipit(incipitDocument); 
			</script>
		</canvas>
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
		if (($t1 == 'a') && ($t2 == 'a')) {
			$color = "#d1c7be";
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