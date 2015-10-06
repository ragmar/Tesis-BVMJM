<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset(); ?>
<title>
	Biblioteca Virtual Musicol&oacute;gica "JUAN MESER&Oacute;N".
	<?php //echo $title_for_layout; ?>
</title>
<?php
	echo $this->Html->meta('icon');
	echo $this->Html->css('cake.generic');
	echo $this->Html->css('bootstrap/bootstrap');
	echo $this->Html->css('sddm');
	//echo $this->Html->script('wijmo/external/jquery-1.8.3.min');
	echo $this->Html->script('jquery-1.11.1.min');
	echo $this->Html->script('bootstrap/bootstrap');
	echo $scripts_for_layout;
	
	echo $this->Html->css('wijmo/themes/rocket/jquery-wijmo');
	
	//echo $this->Html->css('wijmo/themes/wijmo/jquery.wijmo.wijsuperpanel');
	//echo $this->Html->css('wijmo/themes/wijmo/jquery.wijmo.wijmenu');
	echo $this->Html->script('wijmo/external/jquery-ui-1.8.23.custom.min');
	//echo $this->Html->script('wijmo/external/jquery.mousewheel.min');
	//echo $this->Html->script('wijmo/external/jquery.bgiframe-2.1.3-pre');
	//echo $this->Html->script('wijmo/jquery.wijmo.wijutil');
	//echo $this->Html->script('wijmo/jquery.wijmo.wijsuperpanel');
	//echo $this->Html->script('wijmo/jquery.wijmo.wijmenu');
?>

<script type="text/javascript">
	//$(document).ready(function () {
		//$("#menu1").wijmenu();
		//$("#menu2").wijmenu();
	//});
</script>

<!-- dd menu -->
<script type="text/javascript">
<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id) {	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';
}

// close showed layer
function mclose() {
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime() {
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime() {
	if(closetimer)	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
// -->
</script>

</head>
<body style="background: #E8DED4">
	<div class="container" style="margin-top: 26px;">
        
        <div style="height: 32px; line-height: 30px; padding-top: 2px; background: -webkit-linear-gradient(#a89587, #55473c); background: -moz-linear-gradient(#a89587, #55473c); background: -o-linear-gradient(#a89587, #55473c);">
	        <?php if(!$this->Session->check('Auth.User')){ ?>
	            <div>
		            <?php echo $this->Form->create('User', array('action' => 'login', 'style' => 'width: 100%; margin: 0; padding: 0;')); ?>
		            	<div style="width: 400px; float: right; line-height: 0">
		            		<?php echo $this->Form->button(__('Login', true), array('style' => 'display: none'));?>
		            		<?php echo $this->Html->link(__('Register', true), '/users/register', array('class' => 'btn', 'style' => 'display: none'));?>
		            		<?php echo $this->Html->link(__('Reset Password', true), '/users/reset', array('class' => 'btn', 'style' => 'display: none')); ?>
		            	</div>
		            	<div style="width: 160px; float: right; text-align: right; margin-right: 6px;">
		            		<?php echo $this->Form->input('password', array('id' => 'password', 'style' => 'margin-bottom: 2px;', 'tabindex' => '1', 'label' => false, 'div' => false, 'placeholder' => __('Password', true))); ?>
		            	</div>
		            	<div style="width: 160px; float: right; text-align: right;">
		            		<?php echo $this->Form->input('username', array('id' => 'username', 'style' => 'margin-bottom: 2px;', 'tabindex' => '2', 'label' => false, 'div' => false, 'placeholder' => __('Username', true))); ?>
		            	</div>
		            <?php echo $this->Form->end(); ?>
	            </div>
			<?php } else { ?>
	            <div>
					<div style="float: right; text-align: right; padding-right: 2px; margin-left: 12px;">
						<?php
							if (($this->Session->check('Auth.User')) && ($this->Session->read('Auth.User.group_id') != '3')) {
								echo $this->Html->link(__('Configuración', true), '/configurations', array('class' => 'btn', 'style' => 'display: none'));
							}
						?>
						<?php echo $this->Html->link(__('Mi Biblioteca', true), '/user_items', array('class' => 'btn', 'style' => 'display: none')); ?>
						<?php echo $this->Html->link(__('Logout', true), '/users/logout', array('class' => 'btn', 'style' => 'display: none'));?>
					</div>
					<div style="float: right;">
						<b>
							<?php echo $this->Html->link($this->Session->read('Auth.User.name') . ' ' . $this->Session->read('Auth.User.lastname'), '/users/edit', array('style' => 'color: white;')); ?>
						</b>
					</div>
				</div>
			<?php } ?>
        </div>
	
		<!-- <div style="background-color: #78685b; height: 30px;"></div> -->

		<div style="height: 164px;">
			<div style="float: left;">
				<a href="<?php echo $this->base . '/'; ?>">
					<?php echo $this->Html->image('ts/logo_meseron.jpg', array('width' => '303px')); ?>
				</a>
			</div>
			<div style="float: right;">
				<?php
					//debug($this->params['controller']);
					if ($this->params['controller'] != "magazines") {
						echo $this->Html->image('ts/imagen_up.jpg', array('width' => '636px'));
					} else {
						echo $this->Html->image('ts/zancudo1.jpg', array('width' => '636px'));
					}
				?>
			</div>
		</div>
		
		<div>
            <ul id="sddm">
                <li style="width: 13%;"><a class="mo" href="<?php echo $this->base; ?>">Inicio</a></li>
                <li style="width: 13%;"><a class="mo" href="<?php echo $this->base; ?>/pagetexts/page/1">Qui&eacute;nes Somos</a></li>
                <li style="width: 13%;"><a class="mo" style="margin-right: 0px;" href="<?php echo $this->base; ?>" onclick="return false;" onmouseover="mopen('m1');" onmouseout="mclosetime();">M&oacute;dulos</a>
                    <div id="m1" id="m1" onmouseover="mcancelclosetime();" onmouseout="mclosetime();">
	                    <a href="<?php echo $this->base; ?>/books">Libros</a>
	                    <a href="<?php echo $this->base; ?>/magazines">Hemerograf&iacute;a</a>
	                    <a href="<?php echo $this->base; ?>/">M&uacute;sica Manuscrita</a>
	                    <a href="<?php echo $this->base; ?>/">M&uacute;sica Impresa</a>
	                    <a href="<?php echo $this->base; ?>/">Iconograf&iacute;a</a>
	                    <a href="<?php echo $this->base; ?>/">Trabajos Acad&eacute;micos</a>
                    </div>
                </li>
                <li style="width: 16%; margin-right: 0px;"><a href="<?php echo $this->base; ?>" style="cursor: default;" onclick="return false;"></a></li>
                <li style="width: 26%; margin-right: 0px;">
                	<a href="<?php echo $this->base; ?>" style="cursor: default;" onclick="return false;">
                	<?php echo $this->Form->create('Item', array('action' => 'search', 'style' => 'width: 99%; margin: 0; padding: 0;')); ?>
						<?php echo $this->Form->input('search', array('id' => 'search', 'type' => 'text', 'label' => false, 'div' => false, 'placeholder' => __('Search', true), 'title' => __('Búsqueda Simple: realiza una búsqueda en todas las obras por los campos título, autor, materia y publicación.', true))); ?>
						<?php //echo $this->Form->button(__('Search', true)); ?>
						<?php //echo $this->Form->button(__('Search Advanced', true), array('onclick' => "window.location='/items/advanced_search'; return false;")); ?>
		           	<?php echo $this->Form->end(); ?>
                	</a>
                </li>
                <li style="width: 18%; margin-left: 2px; margin-right: -2px;"><a style="margin-right: -2px;" class="mo" href="<?php echo $this->base; ?>" onclick="return false;" onmouseover="mopen('m2');" onmouseout="mclosetime();">B&uacute;squeda Avanzada</a>
                	<div id="m2" id="m2" onmouseover="mcancelclosetime();" onmouseout="mclosetime();">
                		<a href="<?php echo $this->base; ?>/items/advanced_search" title="Búsqueda Avanzada para todas las Obras de la Biblioteca">En todo el sitio</a>
	                    <a href="<?php echo $this->base; ?>/books/advanced_search" title="Búsqueda Avanzada para el Módulo de Libros">Libros</a>
	                    <a href="<?php echo $this->base; ?>/magazines/advanced_search" title="Búsqueda Avanzada para el Módulo de Revistas">Hemerograf&iacute;a</a>
	                    <a href="<?php echo $this->base; ?>/" title="Búsqueda Avanzada para el Módulo de Música Manuscrita">M&uacute;sica Manuscrita</a>
	                    <a href="<?php echo $this->base; ?>/" title="Búsqueda Avanzada para el Módulo de Música Impresa">M&uacute;sica Impresa</a>
	                    <a href="<?php echo $this->base; ?>/" title="Búsqueda Avanzada para el Módulo de Iconografía Musical Venezolana">Iconograf&iacute;a</a>
	                    <a href="<?php echo $this->base; ?>/" title="Búsqueda Avanzada para el Módulo de Trabajos Académicos">Trabajos Acad&eacute;micos</a>
                    </div>
                </li>
                <!--
                <li class="search">
		            <div id="div-search">
		            <?php //echo $this->Form->create('Item', array('action' => 'search', 'style' => 'width: 100%; margin: 0; padding: 0;')); ?>
			       		<?php //echo $this->Form->input('search', array('id' => 'search', 'label' => false, 'div' => false, 'placeholder' => __('Search', true))); ?>
		    	   		<?php //echo $this->Form->button(__('Search', true)); ?>
		           		<?php //echo $this->Form->button(__('Search Advanced', true), array('onclick' => "window.location='<?php echo $this->base ; ?>/items/advanced_search'; return false;")); ?>
		           	<?php //echo $this->Form->end(); ?>
		        	</div>
                </li>
                -->
            </ul>
		</div>
        
		<div style="clear: both; background-color: white;">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
		
		<div style="clear: both;"></div>

		<div class="footer">
		<?php echo $this->Html->image('ts/sombra_down.jpg'); ?>
		
		<!--
		<div style="text-align: center;">
			<a href="<?php echo $this->base; ?>">Inicio</a> | <a href="">Donaciones</a> | <a href="">T&eacute;rminos de Uso</a> | <a href="">Cr&eacute;ditos</a> | <a href="">Mapa del Sitio</a> | <a href="">Enlaces</a> | <a href="<?php echo $this->base . '/faqs'; ?>">Preguntas Frecuentes</a> | <a href="">Ayuda</a> | <a href="">Contacto</a> | Visitas: 5000
		</div>
		-->
		
		<div style="text-align: center;">
			<?php if (isset($pages)){ ?>
			<?php foreach($pages as $page): ?>
				<?php echo $this->Html->link($page['Pagetext']['title'], array('controller' => 'pagetexts', 'action' => 'page', $page['Pagetext']['id'])) . ' | '; ?>
			<?php endforeach; ?>
			<?php } ?>
			<?php if (isset($visitors)) { ?>
			Visitas: <?php echo $visitors; ?>
			<?php } ?>
		</div>
			<?php echo $this->Html->image('ts/sombra_logos_down.jpg'); ?>
			<?php echo $this->Html->image('ts/index_final1_1_r25_c1.jpg', array('usemap' => '#map')); ?>
			
			<map name="map">
				<area shape="rect" coords="86,11,159,60" href="http://www.ucv.ve/estructura/facultades/facultad-de-humanidades-y-educacion/escuelas/artes.html" target="_new" title="Escuela de Artes" alt="Escuela de Artes" />
				<area shape="rect" coords="278,11,325,60" href="http://www.ucv.ve/estructura/facultades/facultad-de-humanidades-y-educacion.html" target="_new" title="Facultad de Humanidades y Educación" alt="Facultad de Humanidades y Educación" />
				<area shape="circle" coords="475,35,28" href="http://www.ucv.ve/" title="Universidad Central de Venezuela" target="_new" alt="Universidad Central de Venezuela" />
				<area shape="rect" coords="635,11,680,60" href="http://www.ciens.ucv.ve/ciencias" title="Facultad de Ciencias" target="_new" alt="Facultad de Ciencias" />
				<area shape="rect" coords="810,11,860,60" href="http://www.ciens.ucv.ve/escueladecomputacion/inicio/index" title="Escuela de Computación" target="_new" alt="Escuela de Computación" />
			</map>
		</div>
		<?php echo $this->element('sql_dump'); ?>
	</div>
	
    <script type="text/javascript">
    /* Cuadrando los inputs. */
	$(document).ready(function(){
		//$('.wijmo-wijmenu').attr('style', 'padding: 0.1em');
		//$(':button').removeClass();
		//$('#div-search').removeClass();
		//$('#div-search').addClass('input-append');
		//$('#search').addClass('span2');
		//$('#login').addClass('span2');
		$(':button').addClass('btn');
		$('.btn').attr('style', 'margin-left: -5px;');
		//$('#username').attr('style', 'width: 150px; margin-left: -66px;');
		//$('#password').attr('style', 'width: 150px; margin-left: -5px;');
		$('#search').attr('style', 'width: 90%;');
		//$('#div-login').attr('style', 'font-size: 1em; margin: 0; margin-left: 0px; line-height: 26px');
		//$('#div-search').attr('style', 'font-size: 1em; margin: 0; margin-left: 0px;');
		// Colores de mouseover y mouseout.
		$('.mo').bind(
				"mouseover", function(){
					var color = $(this).css("background");
					$(this).css("background", "#998477");
				$(this).bind("mouseout", function(){
                	$(this).css("background", color);
			});
		});

		// Se ocultan los menues de la izquierda si es un usuario publico.
		/*if (('<?php echo !$this->Session->check('Auth.User'); ?>') && ('<?php echo $this->Session->read('Auth.User.group_id')?>' != '3')) {
			$('.form').removeClass('form');
			$('.index').removeClass('index');
			$('.view').removeClass('view');
			$('.actions').remove();
		}*/
	});
</script>
	
</body>
</html>