<?php
// El zoom daña la revista.
/*echo $this->Html->script('zoomooz/jquery.zoomooz-helpers');
echo $this->Html->script('zoomooz/jquery.zoomooz-anim');
echo $this->Html->script('zoomooz/jquery.zoomooz-core');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomTarget');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomContainer');
echo $this->Html->script('zoomooz/purecssmatrix');
echo $this->Html->script('zoomooz/sylvester.src.stripped');
echo $this->Html->css('website-assets/website');*/
//echo $this->Html->script('jquery.easing.1.3.js');
//echo $this->Html->script('turn');
//echo $this->Html->script('wijmo/jquery.wijmo-open.all.2.2.1.min');
//echo $this->Html->script('wijmo/jquery.wijmo-complete.all.2.2.1.min');
//echo $this->Html->script('wijmo/jquery.wijmo.wijcarousel');
//echo $this->Html->script('bootstrap/bootstrap-tab');
echo $this->Html->script('jquery.printPage.js');
//echo $this->Html->script('pdfobject_source');


 

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




<style type="text/css">
	#magazine{
		width:800px;
		height:600px;
		margin-left: 70px;
	}
	#magazine .turn-page{
		background-color:#ccc;
		background-size:100% 100%;
	}
</style>
<style type="text/css">
	#bljaIMGte{
		float:left;position:relative;
		}
	#bljaIMGte .bljaIMGtex
	{width:320px;position:absolute;top:540px;left:14px;
	}
</style>
<style type="text/css">
	
.marca-de-agua {
    background: #000 url("/bvmjm/app/webroot/img/iconografia/logoprint.png") no-repeat bottom right;
    width: 80px;
    height: 341px;
    margin: 0 auto;
    display: block;
    position: relative;
    margin-top: 80px;
}
.marca-de-agua img{
    padding:0;
    width:100%;
    height:100%; 
    margin:0;
    filter:alpha(opacity=80);
    opacity:.80;
}
/*#caja{
   color: #fff;
   background-color: #fff;
   margin-top:-97px;
   width: 4px;
   margin-left: 10px;
   position: relative;
   opacity: 0.7;
   height: 90px;
}*/
</style>
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

<script type="text/javascript">
  $(document).ready(function() {
    $(".btnPrint").printPage();
  });
  
 function imprimir()
     {
     	
     	var html = '';
     	var pwin;
     	<?php
     	$title = marc21_decode($item['Item']['245']); ?>;
     <?php	$author = marc21_decode($item['Item']['100']); ?>;
     	html =  '<html><head>';
     	html += '<style type="text/css">img { float: left; margin: 0; padding: 0;}</style>';
     	//html += '<style type="text/css">.marca-de-agua { background: #000 url("/bvmjm/app/webroot/img/iconografia/logoprint.png") no-repeat bottom right;  margin: 0 auto;display: block;position: relative;margin-top: 40px;}</style>';
		html += '<style type="text/css">#bljaIMGte .bljaIMGtex{width:320px;position:absolute;top:540px;left:14px;}</style>';
     //	html += '<style type="text/css">#caja{color: #fff;background-color: #fff;width: 480px;margin-left: 10px;margin-top:550px;position: absolute;opacity: 0.7;height:90px}</style>';
     	//html += '<link rel="stylesheet" type="text/css" href="/webroot/css/abyayala/abyayala.css" />';
     	html += '<link rel="stylesheet" type="text/css" href="app/webroot/css/nuevo/bootstrap.min.css" /></head><body>';
     	html += '<div class="row">';
     	html += '<div class="container">';
     	html += '<h3> <?php echo $title['a'] ?></h3>';
     	html += '<h4> <?php echo $author['a'] ?></h4>';
     	html += '<hr>';
     	//html += '<div id="bljaIMGte" >';
       	html += '<?php echo $this->Html->image('/app/webroot/covers/' . $item['Item']['cover_path'], array('max-width' => '90%','opacity'=>'.5','filter'=>'alpha(opacity=80)', 'height'=>'90%', 'margin-left'=>'1000px'))?>' ;
       html += '<div id="caja" style= "color: #fff;background-color: transparent;width: 100px;margin-left: 10px;margin-top:515px;position: absolute;opacity: 0.6;height:70px"><p style="text-align:center;color: #6C3F30;margin-top:-510px" >';	
        html += '<div id="img" > <?php echo $this->Html->image('/app/webroot/img/iconografia/logoprint1.png', array('display'=>'block','margin-right'=>'auto','margin-left'=>'auto', 'width'=> '60%', 'height'=>'50%'))?>';
       // html += '<div class="marca-de-agua" style="width:80px !important; height:90px !important; margin-top: 500px">';
        html += '</div>';
        //html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '<br clear="both">';
        html += '</body></html>';
        pwin = window.open(html, "_blank", "width=1000, height=1000, scrollbars=yes");
        pwin.document.write(html);
        pwin.onload = pwin.print;
	    pwin.document.close();
     }
     
  

</script>



<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '2'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li><a href="<?php echo $this->base; ?>/iconographies">Iconografía Musical en Venezuela</a></li>
  <li>	<?php
		if (!empty($item['Item']['245'])) {
			$title = marc21_decode($item['Item']['245']);
			if ($title) {
				echo $title['a'];
				if (isset($title['b'])) {echo ' ' . $title['b'];}
				if (isset($title['c'])) {echo ' ' . $title['c'];}
				if (isset($title['h'])) {echo ' ' . $title['h'];}
			}
		}
	?></li>
</ul>
<?php } else if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '1'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li><a href="<?php echo $this->base; ?>/iconographies">Iconografía Musical en Venezuela</a></li>
  <li>	<?php
		if (!empty($item['Item']['245'])) {
			$title = marc21_decode($item['Item']['245']);
			if ($title) {
				echo $title['a'];
				if (isset($title['b'])) {echo ' ' . $title['b'];}
				if (isset($title['c'])) {echo ' ' . $title['c'];}
				if (isset($title['h'])) {echo ' ' . $title['h'];}
			}
		}
	?></li>
</ul>
<?php } else { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/pages">Inicio</a></li>
 <li><a href="<?php echo $this->base; ?>/iconographies">Iconografía Musical en Venezuela</a></li>
  <li>	<?php
		if (!empty($item['Item']['245'])) {
			$title = marc21_decode($item['Item']['245']);
			if ($title) {
				echo $title['a'];
				if (isset($title['b'])) {echo ' ' . $title['b'];}
				if (isset($title['c'])) {echo ' ' . $title['c'];}
				if (isset($title['h'])) {echo ' ' . $title['h'];}
			}
		}
	?></li>
</ul>
<?php } ?>



<div class='book view'>
	<div class="col-md-2 column">
	<br />
		<div style="width: 100%; text-align: center;">
			<?php
				if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/covers/" . $item['Item']['cover_path']))){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('width' => '90%','height' => '183px', 'title' => $item['Item']['cover_name']));
				} else {
					echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('width' => '90%'));
				}
			?>
		</div>
	</div>
	<div class="col-md-7 column">
		<h2>Detalles de la obra</h2>
				
		<div>
			<dl class="dl-horizontal">
				<dt><?php __('Título'); ?>:</dt>
				<dd>
				<?php
					if (!empty($item['Item']['245'])) {
						$title = marc21_decode($item['Item']['245']);
						if ($title) {
							echo $title['a'] . '.';
							if (isset($title['b'])) {echo '<br />' . $title['b']. '.';}
							if (isset($title['c'])) {echo '<br />' . $title['c']. '.';}
							if (isset($title['h'])) {echo '<br />' . $title['h']. '.';}
						}
					}
				?>
				</dd>
				<dt><?php __('Publicación'); ?>:</dt>
				<dd style="margin-left: 180px; text-align: justify; width:65%">
					<?php
						if (!empty($item['Item']['260'])) {
							$year_century = marc21_decode($item['Item']['260']);
							echo $year_century['a'] . '.';
							if (isset($year_century['b'])) {echo " : " . $year_century['b']. ', ';}
							if (isset($year_century['c'])) {echo $year_century['c']. '. ';}
						}
					?>
				</dd>
				<?php if (!empty($item['Item']['690'])) { ?>
				<dt><?php __('Siglo'); ?>:</dt>
				<dd>
					<?php
						$century = marc21_decode($item['Item']['690']);
						echo $century['a'];
					?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['100'])) { ?>
				<dt><?php __('Author'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['100'])) {
							$author = marc21_decode($item['Item']['100']);
							echo $author['a'];
							if (isset($author['d'])) {echo ' ' . $author['d']. '.';}
						}
					?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['653'])) { ?>
				<dt><?php __('Materia'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['653'])) {
							$matter = marc21_decode($item['Item']['653']);
							echo $matter['a'];
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['650'])) { ?>
				<dt><?php __('Temas'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['650'])) {
							$mattername = marc21_decode($item['Item']['650']);
							echo $mattername['a']. '.';
						}
							if (isset($mattername['x'])) {echo ' ' . $mattername['x']. '.';}
					?>
				</dd>
				<?php } ?>
				
							
				<?php if (!empty($item['Item']['773'])) { ?>
				<dt><?php __('Fuente'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['773'])) {
							$source = marc21_decode($item['Item']['773']);
							echo $source['t'];
						}
					?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['500'])) { ?>
				<dt><?php __('Descripción'); ?>:</dt>
				<dd style="margin-left: 180px; text-align: justify; width:65%">
					<?php
						if (!empty($item['Item']['500'])) {
							$description= marc21_decode($item['Item']['500']);
							echo $description['a'];
						}
					?>
				</dd>
				<?php } ?>
				<!--
				<dt><?php __('Created'); ?>:</dt>
				<dd>
					<?php echo $time->format('d-m-Y', $item['Item']['created']); ?>
				</dd>
				<dt><?php __('Modified'); ?>:</dt>
				<dd>
					<?php echo $time->format('d-m-Y', $item['Item']['modified']); ?>
				</dd>
				-->
			</dl>
		</div>
	</div>
	<div class="col-md-3 column">
		<br />
		<label><?php __('Acciones:'); ?></label>
		<br />

		<form id="UserItemAddForm" name="UserItemAddForm" accept-charset="utf-8" method="post" action="<?php echo $this->base; ?>/user_items/add">
			<?php
				if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') != '3'))) {
					echo $this->Html->link('Agregar Obra', array('action' => '/add'), array('class' => 'btn-primary', 'title' => 'Agregar Obra'));
					echo $this->Html->link('Modificar Obra', array('action' => '/edit/'.$item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Modificar Obra'));
					echo $this->Html->link(__('Eliminar Obra', true), array('action' => 'delete', $item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Eliminar Obra'), sprintf(__('Are you sure you want to delete # %s?', true), $title['a']));
				}else
				if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '3'))) {
				echo $this->Form->hidden('user_id', array('type' => 'text', 'value' => $this->Session->read('Auth.User.id')));
				echo $this->Form->hidden('item_id', array('type' => 'text', 'value' => $item['Item']['id']));
				echo $this->Html->link('Agregar a Mi Biblioteca', array('action' => '#'), array('id' => 'biblioteca', 'class' => 'btn-primary', 'title' => 'Agregar a Mi Biblioteca', 'onclick' => 'return false;'));
				}else
				if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '1'))) {
					echo $this->Html->link(__('Eliminar Obra', true), array('action' => 'delete', $item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Eliminar Obra'), sprintf(__('Are you sure you want to delete # %s?', true), $title['a']));
				}
			?>
			<?php
				
				echo $this->Html->link('Ver Formato MARC21', array('action' => 'marc21/'.$item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Formato MARC21'));
			?>
			<?php if (!empty($item['Item']['cover_path'])) { ?>
				<a href="http://<?php echo $_SERVER['HTTP_HOST'] . $this->base . '/app/webroot/covers/' . $item['Item']['cover_path']; ?>" class="btn-primary" target="_blank" title="Descargue el documento en su computadora.">Descargar Imagen</a>
			<?php } ?>
			
			<?php if (!empty($item['Item']['cover_path'])) { ?>
				<a href="#" onclick="return imprimir();" class="btn-primary" target="_blank" title="Imprimir Imagen.">Imprimir Imagen</a>
			
			<?php } ?>		
			
		</form>
	</div>
	

</div>

<script type="text/javascript">
$('#biblioteca').click(function (e) {
	e.preventDefault();
	$('#UserItemAddForm').submit();
});
</script>	