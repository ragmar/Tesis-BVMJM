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



<!--CODIGO DE ALEJANDRO -->

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

<!--FIN DE CODIGO DE ALEJANDRO -->
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
   height: 90px;
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
     	html += '<style type="text/css">#bljaIMGte{float:left;position:relative}</style>';
		html += '<style type="text/css">#bljaIMGte .bljaIMGtex{width:320px;position:absolute;top:540px;left:14px;}</style>';
     //	html += '<style type="text/css">#caja{color: #fff;background-color: #fff;width: 480px;margin-left: 10px;margin-top:550px;position: absolute;opacity: 0.7;height:90px}</style>';
     	//html += '<link rel="stylesheet" type="text/css" href="/webroot/css/abyayala/abyayala.css" />';
     	html += '<link rel="stylesheet" type="text/css" href="/webroot/css/nuevo/bootstrap.min.css" /></head><body>';
     	html += '<div class="row">';
     	html += '<div class="container">';
     	html += '<h1> <?php echo $title['a'] ?></h1>';
     	html += '<h4> <?php echo $author['a'] ?></h4>';
     	html += '<hr>';
     	//html += '<div id="bljaIMGte" >';
       html += '<?php echo $this->Html->image('/app/webroot/covers/' . $item['Item']['cover_path'], array('width' => '500px','opacity'=>'.5','filter'=>'alpha(opacity=80)', 'height'=>'700px', 'margin-left'=>'900px'))?>' ;
       html += '<div id="caja" style= "color: #fff;background-color: transparent;width: 100px;margin-left: 10px;margin-top:508px;position: absolute;opacity: 0.6;height:70px"><p style="text-align:center;color: #6C3F30;margin-top:130px" >';	
        html += '<div id="img" > <?php echo $this->Html->image('/app/webroot/img/iconografia/logoprint1.png', array('display'=>'block','margin-right'=>'auto','margin-left'=>'auto','width'=> '100px', 'height'=>'60px'))?>';
       // html += '<div class="marca-de-agua" style="width:80px !important; height:90px !important; margin-top: 500px">';
       // html += '</div>';
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


<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '2'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
<li><a href="<?php echo $this->base; ?>/manuscripts">Música Manuscrita</a></li>
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
<?php } else if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '1'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
<li><a href="<?php echo $this->base; ?>/manuscripts">Música Manuscrita</a></li>
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
<?php } else { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/pages">Inicio</a></li>
<li><a href="<?php echo $this->base; ?>/manuscripts">Música Manuscrita</a></li>
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
<?php } ?>



<div class='book view'>
	<div class="col-md-2 column">
	<br />
		<div style="width: 100%; text-align: center;">
			<?php
					if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){
						if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] .$this->base."/app/webroot/attachments/files/med/" . $item['Item']['cover_path']))){
							echo $this->Html->image("/app/webroot/attachments/files/med/" . $item['Item']['cover_path'], array('width' => '90%', 'title' => $item['Item']['cover_name']));
						} else {
							echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('width' => '90%'));
						}
					} else {
						if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/attachments/files/med/" . $item['Item']['cover_path']))){
							echo $this->Html->image("/app/webroot/attachments/files/med/" . $item['Item']['cover_path'], array('width' => '90%', 'title' => $item['Item']['cover_name']));
						} else {
							echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('width' => '90%'));
						}
					}
					
					if ($item['Item']['item_file_size']) {
						echo "<br />" . $item['Item']['item_file_size'] . " Bytes.";
					} else {
						echo "<br />0 Bytes.";
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
				
				<?php if (!empty($item['Item']['017'] )){ ?>
					<dt><?php __('Número de copyright:');?></dt>
					<dd>
					<?php
						if (!empty($item['Item']['017'])) {
							$copy = marc21_decode($item['Item']['017']);
							echo $copy ['a'];
						}
						?>
				<?php } ?>
				<?php if (!empty($item['Item']['020'] )){ ?>
				<dt><?php __('ISBN'); ?>:</dt>
				<dd>
				<?php
				
					if (!empty($item['Item']['020'])) {
						$title = marc21_decode($item['Item']['020']);
						if ($title) {
							echo $title['a'] . '.';
							if (isset($title['c'])) {echo '<br />' . $title['c']. '.';}
							if (isset($title['z'])) {echo '<br />' . $title['z']. '.';}
						}
					}
				?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['028'] )){ ?>
				<dt><?php __('Número de plancha'); ?>:</dt>
				<dd>
				<?php
				
					if (!empty($item['Item']['028'])) {
						$title = marc21_decode($item['Item']['028']);
						if ($title) {
							echo $title['a'] . '.';
							if (isset($title['b'])) {echo '<br />' . $title['b']. '.';}
						}
					}
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
				<?php if (!empty($item['Item']['110'])) { ?>
				<dt><?php __('Autor corporativo'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['110'])) {
							$author = marc21_decode($item['Item']['110']);
							echo $author['a'];
							if (isset($author['b'])) {echo '<br />' .  $author['b']. '.';}
						}
					?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['240'])) { ?>
				<dt><?php __('Título uniforme'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['240'])) {
							$author = marc21_decode($item['Item']['240']);
							echo $author['a'];
							if (isset($author['m'])) {echo '<br />' . $author['m']. '.';}
							if (isset($author['n'])) {echo '<br />' . $author['n']. '.';}
							if (isset($author['o'])) {echo '<br />' . $author['o']. '.';}
							if (isset($author['p'])) {echo '<br />' .$author['p']. '.';;}
							if (isset($author['r'])) {echo '<br />' . $author['r']. '.';}
						}
					?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['254'])) { ?>
				<dt><?php __('Mención de </br>presentación musical'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['254'])) {
							$author = marc21_decode($item['Item']['254']);
							echo "</br>", $author['a'];
							if (isset($author['b'])) {echo '<br />' . $author['b']. '.';}
						}
					?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['260'])) { ?>
				<dt><?php __('Publicación'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['260'])) {
							$year_century = marc21_decode($item['Item']['260']);
							echo $year_century['a'] . '.';
								if (isset($year_century['b'])) {echo " : " . $year_century['b']. ', ';}
							if (isset($year_century['c'])) {echo $year_century['c']. '. ';}
						}
					?>
				</dd>
				<?php } ?>
					<?php if (!empty($item['Item']['300'])) { ?>
				<dt><?php __('Descripción física'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['300'])) {
							$author = marc21_decode($item['Item']['300']);
							echo $author['a'];
							if (isset($author['b'])) {echo '<br />' . $author['b']. '.';}
							if (isset($author['c'])) {echo '<br />' . $author['c']. '.';}
							if (isset($author['e'])) {echo '<br />' .  $author['e']. '.';}
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['380'])) { ?>
				<dt><?php __('Forma de la obra'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['380'])) {
							$author = marc21_decode($item['Item']['380']);
							echo $author['a'];
							if (isset($author['0'])) {echo '<br />' .  $author['0']. '.';}
							if (isset($author['2'])) {echo '<br />' . $author['2']. '.';}
							if (isset($author['6'])) {echo '<br />' . $author['6']. '.';}
							if (isset($author['8'])) {echo '<br />' .  $author['8']. '.';}
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['381'])) { ?>
				<dt><?php __('Compás'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['381'])) {
							$author = marc21_decode($item['Item']['381']);
							echo $author['a'];
							
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['382'])) { ?>
				<dt><?php __('Medio de </br> interpretación'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['382'])) {
							$author = marc21_decode($item['Item']['382']);
							echo "</br>", $author['a'];
							
						}
					?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['383'])) { ?>
				<dt><?php __('Designación numérica de obra musical'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['383'])) {
							$author = marc21_decode($item['Item']['383']);
							echo $author['a'];
							if (isset($author['b'])) {echo '<br />' .  $author['b']. '.';}
							if (isset($author['c'])) {echo '<br />' . $author['c']. '.';}
							if (isset($author['d'])) {echo '<br />' .  $author['d']. '.';}
							if (isset($author['e'])) {echo '<br />' .  $author['e']. '.';}
							
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['384'])) { ?>
				<dt><?php __('Tonalidad'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['384'])) {
							$author = marc21_decode($item['Item']['384']);
							echo $author['a'];							
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['490'])) { ?>
				<dt><?php __('Mención de la serie'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['490'])) {
							$author = marc21_decode($item['Item']['490']);
							echo $author['a'];
							if (isset($author['v'])) {echo '<br />' .  $author['v']. '.';}
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['500'])) { ?>
				<dt><?php __('Nota general'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['500'])) {
							$author = marc21_decode($item['Item']['500']);
							echo $author['a'];
							
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['501'])) { ?>
				<dt><?php __('Nota de “Con”'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['501'])) {
							$author = marc21_decode($item['Item']['501']);
							echo $author['a'];
							
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['505'])) { ?>
				<dt><?php __('Nota de contenido </br> con formato'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['505'])) {
							$author = marc21_decode($item['Item']['505']);
							echo "</br>",$author['a'];
							if (isset($author['t'])) {echo '<br />' . $author['t']. '.';}
							if (isset($author['r'])) {echo '<br />' . $author['r']. '.';}
							
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['508'])) { ?>
				<dt><?php __('Nota de créditos</br> de creación o producción'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['508'])) {
							$author = marc21_decode($item['Item']['508']);
							echo "</br>", $author['a'];
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['511'])) { ?>
				<dt><?php __('Nota de participantes</br> o intérpretes'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['511'])) {
							$author = marc21_decode($item['Item']['511']);
							echo "</br>", $author['a'];
							
						}
					?>
				</dd>
				<?php } ?>
						
				<?php if (!empty($item['Item']['518'])) { ?>
				<dt><?php __('Fecha/hora y lugar </br> de acontecimiento'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['518'])) {
							$author = marc21_decode($item['Item']['518']);
							echo "</br>", $author['a'];
							
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['520'])) { ?>
				<dt><?php __('Nota de sumario, etc.'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['520'])) {
							$author = marc21_decode($item['Item']['520']);
							echo $author['a'];
							
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['521'])) { ?>
				<dt><?php __('Nota de audiencia'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['521'])) {
							$author = marc21_decode($item['Item']['521']);
							echo $author['a'];
							
						}
					?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['545'])) { ?>
				<dt><?php __('Nota de lengua'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['545'])) {
							$author = marc21_decode($item['Item']['545']);
							echo $author['a'];
							if (isset($author['c'])) {echo '<br />' .  $author['c']. '.';}
							
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['561'])) { ?>
				<dt><?php __('Nota de lengua'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['561'])) {
							$author = marc21_decode($item['Item']['561']);
							echo $author['a'];
							
						}
					?>
				</dd>
				<?php } ?>
					
				<?php if (!empty($item['Item']['588'])) { ?>
				<dt><?php __('Nota de fuente </br>de la descripción'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['588'])) {
							$author = marc21_decode($item['Item']['588']);
							echo "</br>", $author['a'];
							
						}
					?>
				</dd>
				<?php } ?>
				
			<!--	<?php// if (!empty($item['Item']['592'])) { ?>
				<dt><?php __('Nota de fuente </br>de la descripción'); ?>:</dt>
				<dd>
					<?php
						//if (!empty($item['Item']['592'])) {
						//	$author = marc21_decode($item['Item']['592']);
						//	echo "</br>", $author['a'];
							
					//	}
					?>
				</dd> -->
				<?php //} ?>
				<?php if (!empty($item['Item']['600'])) { ?>
				<dt><?php __('Punto de acceso adicional</br> de materia Nombre de persona'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['600'])) {
							$author = marc21_decode($item['Item']['600']);
							echo "</br>",$author['a'];
							if (isset($author['d'])) {echo ' ' . $author['d']. '.';}
							if (isset($author['c'])) {echo ' ' . $author['c']. '.';}
							if (isset($author['e'])) {echo ' ' . $author['e']. '.';}
							if (isset($author['v'])) {echo ' ' . $author['v']. '.';}
							if (isset($author['x'])) {echo ' ' . $author['x']. '.';}
							if (isset($author['y'])) {echo ' ' . $author['y']. '.';}
							if (isset($author['z'])) {echo ' ' . $author['z']. '.';}
							
						}
					?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['610'])) { ?>
				<dt><?php __('Punto de acceso adicional de materia</br> Nombre de entidad corporativa'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['610'])) {
							$author = marc21_decode($item['Item']['610']);
							echo "</br>", $author['a'];
							if (isset($author['d'])) {echo ' ' . $author['d']. '.';}
							if (isset($author['c'])) {echo ' ' . $author['c']. '.';}
							if (isset($author['e'])) {echo ' ' . $author['e']. '.';}
							if (isset($author['v'])) {echo ' ' . $author['v']. '.';}
							if (isset($author['x'])) {echo ' ' . $author['x']. '.';}
							if (isset($author['y'])) {echo ' ' . $author['y']. '.';}
							if (isset($author['z'])) {echo ' ' . $author['z']. '.';}
							
						}
					?>
				</dd>
				
				<?php } ?>
				<?php if (!empty($item['Item']['648'])) { ?>
				<dt><?php __('Siglo'); ?>:</dt>
				<dd>
					<?php
						$century = marc21_decode($item['Item']['648']);
						echo $century['a'];
					?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['650'])) { ?>
				<dt><?php __('Término de Materia'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['650'])) {
							$author = marc21_decode($item['Item']['650']);
							echo $author['a'];
							if (isset($author['v'])) {echo '<br />' .  $author['v']. '.';}
							if (isset($author['x'])) {echo '<br />' . $author['x']. '.';}
							if (isset($author['y'])) {echo '<br />' . $author['y']. '.';}
							if (isset($author['z'])) {echo '<br />' .  $author['z']. '.';}
							
						}
					?>
				</dd>
				
				<?php } ?>
				<?php if (!empty($item['Item']['651'])) { ?>
				<dt><?php __('Punto de acceso adicional de materia</br>Nombre geográfico'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['651'])) {
							$author = marc21_decode($item['Item']['651']);
							echo $author['a'];
							if (isset($author['v'])) {echo '<br />' .  $author['v']. '.';}
							if (isset($author['x'])) {echo '<br />' . $author['x']. '.';}
							if (isset($author['y'])) {echo '<br />' .  $author['y']. '.';}
							if (isset($author['z'])) {echo '<br />' .  $author['z']. '.';}
							
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
						
					<?php if (!empty($item['Item']['700'] )){ ?>
					<dt><?php __('Mención</br> Responsabilidad:');?></dt>
					<dd>
					<?php
						if (!empty($item['Item']['700'])) {
							$responsability = marc21_decode($item['Item']['700']);
							echo "</br>", $responsability ['a'];
							if (isset($author['b'])) {echo '<br />' .  $author['b']. '.';}
							if (isset($author['c'])) {echo '<br />' . $author['c']. '.';}
							if (isset($author['d'])) {echo '<br />' .  $author['d']. '.';}
							if (isset($author['e'])) {echo '<br />' . $author['e']. '.';}
							if (isset($author['q'])) {echo '<br />' .  $author['q']. '.';}
							if (isset($author['t'])) {echo '<br />' .  $author['t']. '.';}
							if (isset($author['4'])) {echo '<br />' .  $author['4']. '.';}
						}
						?>
					<?php } ?>
					
					<?php if (!empty($item['Item']['710'] )){ ?>
					<dt><?php __('Punto de acceso adicional</br>Nombre corporativo:');?></dt>
					<dd>
					<?php
						if (!empty($item['Item']['710'])) {
							$responsability = marc21_decode($item['Item']['710']);
							echo "</br>", $responsability ['a'];
							if (isset($author['b'])) {echo '<br />' .  $author['b']. '.';}
							if (isset($author['c'])) {echo ' ' . $author['c']. '.';}
							if (isset($author['d'])) {echo '<br />' . $author['d']. '.';}
							if (isset($author['e'])) {echo '<br />' .  $author['e']. '.';}
							if (isset($author['t'])) {echo '<br />' .  $author['t']. '.';}
							if (isset($author['4'])) {echo '<br />' . $author['4']. '.';}
						}
						?>
					<?php } ?>
					<?php if (!empty($item['Item']['740'] )){ ?>
					<dt><?php __('Título relacionado:');?></dt>
					<dd>
					<?php
						if (!empty($item['Item']['740'])) {
							$responsability = marc21_decode($item['Item']['740']);
							echo  $responsability ['a'];
							if (isset($author['n'])) {echo '<br />' . $author['n']. '.';}
							if (isset($author['p'])) {echo '<br />' .  $author['p']. '.';}
						}
						?>
					<?php } ?>
						<?php if (!empty($item['Item']['773'] )){ ?>
					<dt><?php __('Enlace al documento fuente:');?></dt>
					<dd>
					<?php
						if (!empty($item['Item']['773'])) {
							$responsability = marc21_decode($item['Item']['773']);
							echo "</br>", $responsability ['a'];
							if (isset($author['b'])) {echo '<br />' . $author['b']. '.';}
							if (isset($author['d'])) {echo '<br />' . $author['d']. '.';}
							if (isset($author['g'])) {echo '<br />' .  $author['g']. '.';}
						    if (isset($author['h'])) {echo '<br />' . $author['h']. '.';}
						 	if (isset($author['k'])) {echo '<br />' . $author['k']. '.';}
						 	if (isset($author['n'])) {echo '<br />' .  $author['n']. '.';}
							if (isset($author['q'])) {echo '<br />' . $author['q']. '.';}
						    if (isset($author['t'])) {echo '<br />' .  $author['t']. '.';}
						 	if (isset($author['z'])) {echo '<br />' .  $author['z']. '.';}
						}
						?>
					<?php } ?>
					
						<?php if (!empty($item['Item']['850'] )){ ?>
					<dt><?php __('Institución que</br> posee los fondos:');?></dt>
					<dd>
					<?php
						if (!empty($item['Item']['850'])) {
							$responsability = marc21_decode($item['Item']['850']);
							echo "</br>", $responsability ['a'];
						}
						?>
					<?php } ?>
					
					<?php if (!empty($item['Item']['852'] )){ ?>
					<dt><?php __('Localización:');?></dt>
					<dd>
					<?php
						if (!empty($item['Item']['852'])) {
							$responsability = marc21_decode($item['Item']['852']);
							echo "</br>", $responsability ['a'];
							if (isset($author['b'])) {echo '<br />' .  $author['b']. '.';}
							if (isset($author['c'])) {echo '<br />' . $author['c']. '.';}
						    if (isset($author['h'])) {echo '<br />' .  $author['h']. '.';}
						 	if (isset($author['i'])) {echo '<br />' . $author['i']. '.';}
						 	if (isset($author['j'])) {echo '<br />' . $author['j']. '.';}
							if (isset($author['k'])) {echo '<br />' .  $author['k']. '.';}
						    if (isset($author['m'])) {echo '<br />' . $author['m']. '.';}
						}
						?>
					<?php } ?>
					
					<?php if (!empty($item['Item']['856'] )){ ?>
					<dt><?php __('Localización</br> acceso electrónicos:');?></dt>
					<dd>
					<?php
						if (!empty($item['Item']['856'])) {
							$responsability = marc21_decode($item['Item']['856']);
							echo "</br>", $responsability ['a'];
							if (isset($author['d'])) {echo '<br />' . $author['d']. '.';}
							if (isset($author['u'])) {echo '<br />' .  $author['u']. '.';}
						}
						?>
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
				<!-- codigo de alejandro -->
					<?php if (!empty($item['ItemsIncipit']['paec'])) { ?>
					<dt><?php __('Incipit:');?></dt>
					<div class="maestro" style="visibility: hidden; height: 0">Font Load</div>
					<dd>
						<?php 
							echo "<canvas id= \"canvas" . $item['Item']['id'] . "\" width=\"400\" height=\"160\"> class=\"maestro\"";
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
					<!-- fin decodigo de alejandro -->
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
				}
			?>
			<?php
				echo $this->Form->hidden('user_id', array('type' => 'text', 'value' => $this->Session->read('Auth.User.id')));
				echo $this->Form->hidden('item_id', array('type' => 'text', 'value' => $item['Item']['id']));
				echo $this->Html->link('Ver Formato MARC21', array('action' => 'marc21/'.$item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Formato MARC21'));
			?>
			<?php if (!empty($item['Item']['item_file_path'])) { ?>
					<?php if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){ ?>
						<a href="http://<?php echo $_SERVER['HTTP_HOST'] . $this->base . '/app/webroot/attachments/files/' . $item['Item']['item_file_path']; ?>" class="btn-primary" target="_blank" title="Descargue el documento en su computadora.">Descargar e Imprimir Partitura</a>
					<?php } else { ?>
						<a href="http://<?php echo $_SERVER['HTTP_HOST'] . $this->base . '/app/webroot/attachments/files/' . $item['Item']['item_file_path']; ?>" class="btn-primary" target="_blank" title="Descargue el documento en su computadora.">Descargar e Imprimir Partitura</a>
					<?php } ?>
				<?php } ?>
			
			
		</form>
	</div>
	
	<div style="clear: both;"><br /></div>
	
	<?php if ($item['Item']['item_content_type'] == "application/pdf") { ?>
		<?php if ($item['Item']['item_file_path']) { ?>
			<!-- <iframe src="<?php //echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" width="99%" height="600px"></iframe> -->
			<!-- <iframe src="http://docs.google.com/viewer?url=<?php //echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" width="99%" height="600px"></iframe> -->
			<!-- <object width="99%" height="600" type="application/pdf" data="<?php //echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>">
			<param name="src" value="<?php //echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" />
			<p>N o PDF available</p>
			</object> -->
			
			<?php if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){ ?>
				<object data="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/app/webroot/attachments/files/' . $item['Item']['item_file_path']; ?>" type="application/pdf" width="100%" height="600px">
			<?php } else { ?>
				<object data="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/app/webroot/attachments/files/' . $item['Item']['item_file_path']; ?>" type="application/pdf" width="100%" height="600px">
			<?php } ?>
			
			<br /><br />
			
			<div style="text-align: center;">
				Lamentablemente este navegador no posee un plugin para visualizar PDF's.
			<br />
				Instale un plugin para visualizar el PDF.
			<br /><br /><br /><br />
			</div>
				</object>
		<?php } ?>
	<?php } ?>
	<?php $tipo = explode('/', $item['Item']['item_content_type']); ?>
	<?php if ($tipo[0] == "image") { ?>
		<?php if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){ ?>
				<img src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/app/webroot/attachments/files/big/' . $item['Item']['item_file_path']; ?>" width="100%">
			<?php } else { ?>
				<img src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/app/webroot/attachments/files/big/' . $item['Item']['item_file_path']; ?>" width="100%">
			<?php } ?>
	<?php } ?>
		
</div>

<script type="text/javascript">
$('#biblioteca').click(function (e) {
	e.preventDefault();
	$('#UserItemAddForm').submit();
});
</script>	