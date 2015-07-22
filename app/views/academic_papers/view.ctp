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
echo $this->Html->script('jquery.easing.1.3.js');
echo $this->Html->script('turn');
//echo $this->Html->script('wijmo/jquery.wijmo-open.all.2.2.1.min');
//echo $this->Html->script('wijmo/jquery.wijmo-complete.all.2.2.1.min');
//echo $this->Html->script('wijmo/jquery.wijmo.wijcarousel');
echo $this->Html->script('bootstrap/bootstrap-tab');
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
#caja{
   color: #fff;
   background-color: #fff;
   margin-top:-97px;
   width: 480px;
   margin-left: 10px;
   position: relative;
   opacity: 0.7;
   height: '90px;
}
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
  
 function imprimir()
     {
     	
     	var html = '';
     	var pwin;
     	<?php
     	$title = marc21_decode($item['Item']['245']); ?>;
     	html =  '<html><head>';
     	html += '<style type="text/css">img { float: left; margin: 0; padding: 0;}</style>';
     	html += '<style type="text/css">#bljaIMGte{float:left;position:relative}</style>';
		html += '<style type="text/css">#bljaIMGte .bljaIMGtex{width:320px;position:absolute;top:540px;left:14px;}</style>';
     //	html += '<style type="text/css">#caja{color: #fff;background-color: #fff;width: 480px;margin-left: 10px;margin-top:550px;position: absolute;opacity: 0.7;height:90px}</style>';
     	//html += '<link rel="stylesheet" type="text/css" href="/webroot/css/abyayala/abyayala.css" />';
     	html += '<link rel="stylesheet" type="text/css" href="/webroot/css/nuevo/bootstrap.min.css" /></head><body>';
     	html += '<div class="row">';
     	html += '<div class="container">';
     	html += '<h1> <?php echo $title['a'] ?></h1>';
     	html += '<hr>';
     	html += '<div id="bljaIMGte" >';
        html += '<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>' ;
        html += '<div id="caja" style= "color: #fff;background-color: #fff;;width: 502px;margin-left: -1px;margin-top:508px;position: absolute;opacity: 0.7;height:132px"><p style="text-align:center;color: #6C3F30;margin-top:-2px" ><b>Universidad Central de Venezuela </br>Biblioteca Virtual Musicológica "Juan Meserón"</b></p>';	
        html += '<div id="img" style="margin-left: 130px;width:100px; height: 40px;margin-top:-20px;"> <?php echo $this->Html->image('/webroot/img/iconografia/logo5.png', array('display'=>'block','margin-right'=>'auto','margin-left'=>'auto','width'=> '175px', 'height'=>'46px', 'margin-top'=>'-20px'))?>';
        html += '</div>';
        html += '</div>';
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


  
<ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>">Inicio</a></li>
  <li><a href="<?php echo $this->base; ?>/academic_papers">Trabajos Acad&eacute;micos</a></li>
  <li>
  	<?php
		if (!empty($item['Item']['245'])) {
			$title = marc21_decode($item['Item']['245']);
			if ($title) {
				echo $title['a'];
				if (isset($title['b'])) {echo ' ' . $title['b'];}
				if (isset($title['c'])) {echo ' ' . $title['c'];}
				if (isset($title['h'])) {echo ' ' . $title['h'];}
			}
		}
	?>
  	</li>
</ul>

<div class='book view'>
	<div class="col-md-2 column">
	<br />
		<div style="width: 100%; text-align: center;">
			<?php
				if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/webroot/covers/" . $item['Item']['cover_path']))){
					echo $this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('width' => '90%','height' => '183px', 'title' => $item['Item']['cover_name']));
				} else {
					echo $this->Html->image("/webroot/img/sin_portada.jpg", array('width' => '90%'));
				}
			?>
		</div>
	</div>
	<div class="col-md-7 column">
		<h2>Detalles del Trabajo Acad&eacute;mico</h2>
				
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
				<dd>
					<?php
						if (!empty($item['Item']['260'])) {
							$year_century = marc21_decode($item['Item']['260']);
							echo $year_century['a'] . '.';
							if (isset($year_century['b'])) {echo '<br />' . $year_century['b']. '.';}
							if (isset($year_century['c'])) {echo '<br />' . $year_century['c']. '.';}
						}
					?>
				</dd>
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
				<dt><?php __('Palabras Clave'); ?>:</dt>
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
				<dt><?php __('Materia'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['650'])) {
							$mattername = marc21_decode($item['Item']['650']);
							echo $mattername['a'];
						}
					?>
				</dd>
				<?php } ?>
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
					echo $this->Html->link('Agregar Trabajo Académico', array('action' => '/add'), array('class' => 'btn-primary', 'title' => 'Agregar Trabajo Académicos'));
					echo $this->Html->link('Modificar Trabajo Académico', array('action' => '/edit/'.$item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Modificar Trabajo Académico'));
					echo $this->Html->link('Eliminar Trabajo Académico', array('action' => '/delete/'.$item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Eliminar Trabajo Académico'));
				}
			?>
			<?php
				echo $this->Form->hidden('user_id', array('type' => 'text', 'value' => $this->Session->read('Auth.User.id')));
				echo $this->Form->hidden('item_id', array('type' => 'text', 'value' => $item['Item']['id']));
				if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') != NULL))) {
					echo $this->Html->link('Agregar a Mi Biblioteca', array('action' => '#'), array('id' => 'biblioteca', 'class' => 'btn-primary', 'title' => 'Agregar a Mi Biblioteca', 'onclick' => 'return false;'));
				}
				echo $this->Html->link('Ver Formato MARC21', array('action' => 'marc21/'.$item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Formato MARC21'));
			?>
			<?php if (!empty($item['Item']['item_file_path']) && ($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') != NULL))) { ?>
				<a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" class="btn-primary" target="_blank" title="Descargue el documento en su computadora.">Descargue Trabajo Acad&eacute;mico</a>
			<?php } ?>
		</form>
	</div>
	
	<div style="clear: both;"><br /></div>
	
	<?php if ($item['Item']['item_content_type'] == "application/pdf") { ?>
		<?php if ($item['Item']['item_file_path']) { ?>
			<!-- <iframe src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" width="99%" height="600px"></iframe> -->
			<!-- <iframe src="http://docs.google.com/viewer?url=<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" width="99%" height="600px"></iframe> -->
			<!-- <object width="99%" height="600" type="application/pdf" data="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>">
			<param name="src" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" />
			<p>N o PDF available</p>
			</object> -->
			
			<object data="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" type="application/pdf" width="100%" height="600px">
			<br /><br />
			<div style="text-align: center;">
				Lamentablemente este navegador no posee un plugin para visualizar PDF's.
			
</div>
			<br />
				Instale un plugin para visualizar el PDF o descargue el archivo <a href="http://<?php echo $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" target="_blank" title="Descargue el documento en su computadora.">aquí</a>. 
			<br /><br /><br /><br />
			</div>
			</object>
			
		<?php } ?>
	<?php } else {echo "<div style='text-align: center'>El archivo no tiene formato pdf.</div><br />";} ?>
</div>

<script type="text/javascript">
$('#biblioteca').click(function (e) {
	e.preventDefault();
	$('#UserItemAddForm').submit();
});
</script>	