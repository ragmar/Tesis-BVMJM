<?php
//debug($this->Session->read('Search'));
/*echo $this->Html->script('zoomooz/jquery.zoomooz-helpers');
echo $this->Html->script('zoomooz/jquery.zoomooz-anim');
echo $this->Html->script('zoomooz/jquery.zoomooz-core');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomTarget');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomContainer');
echo $this->Html->script('zoomooz/purecssmatrix');
echo $this->Html->script('zoomooz/sylvester.src.stripped');*/
//echo $this->Html->css('website-assets/website');

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

//debug($items);
//debug($this->data);
//debug($this->passedArgs);
//debug($this->Session->read());
?>
<style>
	.btn-primary {
		width: 200px;
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

<div class='items view'>

<div class="col-md-9 column">

	<h2><?php __('Resultados de la Búsqueda'); ?> <font size="3">(<?php echo count($items); ?> obras encontradas)</font></h2>
	<table class="table">
	<tr>
		<th><?php __('Portada');?></th>
		<th><?php __('Detalles de la Obra');?></th>
	</tr>
	<?php foreach ($items as $item): ?>
	<?php
		$t1 = $item['Item']['h-006'];
		$t2 = $item['Item']['h-007'];
		$t3 = $item['Item']['type'];
		$controller = "/";
		
		// Tipo libro.
		if (($t1 == 'a') && ($t2 == 'm')) {
			$color = "#9dae8a";
			$controller = "books";
		}
		
		// Tipo parte de libro.
		if (($t1 == 'a') && ($t2 == 'a')) {
			$color = "#9dae8a";
			$controller = "books";
		}
		
		// Tipo revista.
		if (($t1 == 'a') && ($t2 == 's')) {
			$color = "#b3bbce";
			$controller = "magazines";
		}
		
		// Tipo parte de revista.
		if (($t1 == 'a') && ($t2 == 'b')) {
			$color = "#b3bbce";
			$controller = "magazines";
		}

		// Música impresa.
		if (($t1 == 'c') && ($t2 == 'm')) {
			$color = "#d5b59e";
			$controller = "printeds";
		}
		
		// Música manuscrita.
		if (($t1 == 'd') && ($t2 == 'm')) {
			$color = "#aea16c";
			$controller = "manuscripts";
		}
		
		// Iconografía musical.
		if (($t1 == 'k') && ($t2 == 'b')) {
			$color = "#ba938e";
			$controller = "iconographies";
		}

		// Trabajos académicos.
		if (($t1 == 't') && ($t2 == 'm') && ($t3 == 0)) {
			$color = "#d1c7be";
			$controller = "academic_papers";
		}
		
		// Documentos.
		if (($t1 == 't') && ($t2 == 'm') && ($t3 == 5)) {
			$color = "#bcada0";
			$controller = "documents";
		}
	?>
	<?php //$color = "#b3bbce"; ?>
	<?php $color = ""; ?>
	<tr>
		<td style="background-color: <?php echo $color; ?>; text-align: center; width: 80px;">
			<?php
				if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){
					if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] .$this->base."/app/webroot/attachments/files/med/" . $item['Item']['cover_path']))){
						echo $this->Html->image("/app/webroot/attachments/files/med/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => $controller, 'action' => 'view', $item['Item']['found_pdf']?$item['Item']['id']."?f=".$item['Item']['found_pdf'] : $item['Item']['id']	)));
					} else {
						echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => $controller, 'action' => 'view', $item['Item']['found_pdf']?$item['Item']['id']."?f=".$item['Item']['found_pdf'] : $item['Item']['id'])));
					}
				} else {
					//echo $_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/covers/" . $item['Item']['cover_path'];
					if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/covers/" . $item['Item']['cover_path']))){
						if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/covers/" . $item['Item']['cover_path']))){
							echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => $controller, 'action' => 'view', $item['Item']['found_pdf']?$item['Item']['id']."?f=".$item['Item']['found_pdf'] : $item['Item']['id'])));
						} else {
							echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => $controller, 'action' => 'view', $item['Item']['found_pdf']?$item['Item']['id']."?f=".$item['Item']['found_pdf'] : $item['Item']['id'])));
						}
					} else {
						if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/attachments/files/med/" . $item['Item']['cover_path']))){
							echo $this->Html->image("/app/webroot/attachments/files/med/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => $controller, 'action' => 'view', $item['Item']['found_pdf']?$item['Item']['id']."?f=".$item['Item']['found_pdf'] : $item['Item']['id'])));
						} else {
							echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => $controller, 'action' => 'view', $item['Item']['found_pdf']?$item['Item']['id']."?f=".$item['Item']['found_pdf'] : $item['Item']['id'])));
						}
					}
				}
			?>
			<?php echo $this->Html->link(__('View', true), array('controller' => $controller, 'action' => 'view', $item['Item']['found_pdf']?$item['Item']['id']."?f=".$item['Item']['found_pdf'] : $item['Item']['id'])); ?>
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
								echo $title['a'] . '. ';
								if (isset($title['h'])) {echo ' ' . $title['h'];}
                                                                if (isset($title['b']) || isset($title['c'])) {echo ' : ';}
                                                                if (isset($title['b'])) {echo $title['b'] . ' ';}
                                                                if (isset($title['c'])) {echo ' / ' . $title['c'];}
							}
						}
					?>
				</dd>
				<?php if (!empty($item['Item']['100'])) { ?>
				<dt style="width: 120px"><?php __('Author:');?></dt>
				<dd style="margin-left: 130px">
					<?php
						$author = marc21_decode($item['Item']['100']);
						echo $author['a'] . '.';
                                                
						if (isset($author['h'])) {echo ' ' . $author['h']. ',';}
                                                if (isset($author['c'])) {echo ' ' . $author['c'];}
                                                if (isset($author['d'])) {echo ' (' . $author['d']. ')';}
					?>
				</dd>
				<?php } ?>
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
					echo $century['a'] . '.';
				?>
				</dd>
				<?php } ?>
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
						echo "Libro.";
					}
					
					// Tipo parte de libro.
					if (($t1 == 'a') && ($t2 == 'a')) {
						echo "Artículo de un Libro.";
					}
					
					// Tipo revista.
					if (($t1 == 'a') && ($t2 == 's')) {
						echo "Hemerografía.";
					}
					
					// Tipo parte de revista.
					if (($t1 == 'a') && ($t2 == 'b')) {
						echo "Artículo de una Hemerografía.";
					}

					// Música impresa.
					if (($t1 == 'c') && ($t2 == 'm')) {
						echo "Música Impresa.";
					}
					
					// Música manuscrita.
					if (($t1 == 'd') && ($t2 == 'm')) {
						echo "Música Manuscrita.";
					}
					
					// Iconógrafía Musical.
					if (($t1 == 'k') && ($t2 == 'b')) {
						echo "Iconografía Musical.";
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
                
                <?php if ($item['Item']['found_pdf']) { ?>
                    <dt style="width: 120px">
                        <?php __('Archivo PDF: ');?>
                    </dt>

                    <dd style="margin-left: 130px">	

                            <?php 
                                $filePath =  'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/app/webroot/attachments/files/' . $item['Item']['item_file_path'];
                                // Check if pdf file exists
                                $infile = @file_get_contents($filePath, FILE_BINARY);

                                if(!empty($infile)){
                            ?>
                        <a  style="color:red;" target="_blank" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base .'/items/viewer?#&file='.$item['Item']['item_file_path'] . '&search='. $search . '&at' ; ?>">

                            <?php } else { ?>
                                <a  style="color:red;" target="_blank" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base .'/items/viewer?#&file='.$item['Item']['item_file_path'] . '&search='. $search ; ?>">
                            <?php } ?>
                            <!--<a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path'] ; ?>">-->
                                <?php echo $item['Item']['item_file_name'] ?></a>		
                    </dd>
                <?php } ?>    
			</dl>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>

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
<div class="col-md-3 column">
		<br />
		<label><?php __('Búsqueda Avanzada en:'); ?></label>
		<?php //echo $this->Html->link(__('Agregar Libro', true), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
		<?php echo $this->Html->link(__('Libros', true),'/books/advanced_search', array('class' => 'btn btn-primary')); ?>
		<?php echo $this->Html->link(__('Hemerografías', true),'/magazines/advanced_search', array('class' => 'btn btn-primary')); ?>
		<?php echo $this->Html->link(__('Música Manuscrita', true),'/manuscripts/advanced_search', array('class' => 'btn btn-primary')); ?>
		<?php echo $this->Html->link(__('Música Impresa', true),'/printeds/advanced_search', array('class' => 'btn btn-primary')); ?>
		<?php echo $this->Html->link(__('Iconografías', true),'/iconographies/advanced_search', array('class' => 'btn btn-primary')); ?>
		<?php echo $this->Html->link(__('Documentos', true),'/documents/advanced_search', array('class' => 'btn btn-primary')); ?>
		<?php echo $this->Html->link(__('Trabajos Académicos', true),'/works/advanced_search', array('class' => 'btn btn-primary')); ?>
		<br />
	<?php //echo $this->Html->link(__('Búsqueda Avanzada', true), array('action' => 'advanced_search'), array('class' => 'btn btn-primary')); ?>
</div>
</div>
<style type="text/css">
	.search {
		color: red;
	}
</style>
<script type="text/javascript">
$(document).ready(function() {
	// Sobreescribo el selector para que no discrimine entre mayúsculas y minúsculas.
	jQuery.expr[':'].contains = function(a, i, m) {
	  return jQuery(a).text().toUpperCase()
	      .indexOf(m[3].toUpperCase()) >= 0;
	};
	
	$(".dl-horizontal dd:contains('<?php echo $search; ?>')").addClass('search');

	if ('<?php echo isset($search); ?>') {
		$("input").val('<?php echo $search; ?>');
	}
});
</script>