<!DOCTYPE html>
<html lang="es">
<head>
  <?php echo $this->Html->charset(); ?>
  
  <?php
  	$actions['default'] = "";
  	$actions['add'] = "Agregar";
  	$actions['edit'] = "Modificar";
  	$actions['view'] = "Ver";
  	$actions['delete'] = "Eliminar";
  	$actions['index'] = "Listar";
  	$actions['display'] = "Inicio";
  	$actions['marc21'] = "MARC21";
  	$actions['login'] = "Ingreso";
  	$actions['register'] = "Registro";
  	$actions['reset'] = "Contraseña";
  	$actions['links'] = "Listar";
  	$actions['faqs'] = "Preguntas Frecuentes";
  	$actions['search'] = "Buscar";
  	$actions['advanced_search'] = "Búsqueda Avanzada";
  	
  	$controllers['pages'] = "";
  	$controllers['items'] = "Obras";
  	$controllers['users'] = "Usuarios";
  	$controllers['user_items'] = "Mi Biblioteca";
  	$controllers['academic_papers'] = "Trabajos Académicos";
  	$controllers['books'] = "Libros";
  	$controllers['printeds'] = "Música Impresa";
  	$controllers['manuscripts'] = "Música Manuscrita";
  	$controllers['iconographies'] = "Iconografía";
  	$controllers['magazines'] = "Hemerografías";
  	$controllers['links'] = "Enlaces";
  	$controllers['faqs'] = "Preguntas Frecuentes";
  	$controllers['configurations'] = "Configuración";
  	$controllers['documents'] = "Documentos";
  	
  ?>
  
  <title>BVMJM 
  		<?php
  			if (isset($actions[$this->Html->params['action']])) {
  				echo $actions[$this->Html->params['action']] . ' ' . $controllers[$this->Html->params['controller']];
  			} else {
				echo $this->Html->params['action'] . ' ' . $this->Html->params['controller'];
  			}
  		?>
  </title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append �#!watch� to the browser URL, then refresh the page. -->
	
	<?php echo $this->Html->css('nuevo/bootstrap.min'); ?>
	<?php echo $this->Html->css('nuevo/style'); ?>

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <!--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png"> -->
  <!--<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png"> -->
  <!--<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png"> -->
  <!--<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png"> -->
  
	<link rel="shortcut icon" href="<?php echo $this->base;?>/img/nuevo/favicon.ico">
  
	<?php echo $this->Html->script('nuevo/jquery.min'); ?>
	<?php echo $this->Html->script('nuevo/bootstrap.min'); ?>
	<?php echo $this->Html->script('nuevo/scripts'); ?>
	
	<style>
		#flashMessage {
			background-color: brown;
		    color: white;
		    height: 40px;
		    padding: 10px;
		    width: 100%;
		    font-weight: bold;
		}
	</style>
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-inverse" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					 <span class="sr-only">Toggle navigation</span>
					 <span class="icon-bar"></span>
					 <span class="icon-bar"></span>
					 <span class="icon-bar"></span>
					 </button>
					 
					 <a class="navbar-brand" href="<?php echo $this->base; ?>/">Inicio</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Módulos <strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<?php echo $this->Html->link('Libros', '/books'); ?>
								</li>
								<li>
									<?php echo $this->Html->link('Hemerografías', '/magazines'); ?>
								</li>
								<li>
									<?php echo $this->Html->link('Música Manuscrita', '/manuscripts'); ?>
								</li>
								<li>
									<?php echo $this->Html->link('Música Impresa', '/printeds'); ?>
								</li>
								<li>
									<?php echo $this->Html->link('Iconografías', '/iconographies'); ?>
								</li>
								<li>
									<?php echo $this->Html->link('Documentos', '/documents'); ?>
								</li>
								<li>
									<?php echo $this->Html->link('Trabajos Académicos', '/academic_papers'); ?>
								</li>
							</ul>
						</li>
					</ul>
					
					<?php echo $this->Form->create('Item', array('action' => 'search', 'class' => 'navbar-form', 'style' => 'width: 45%; float: left')); ?>
						<div class="input-group">
							<input id="search" type="text" class="form-control" name="data[Item][search]" title="Realice la búsqueda de obras en la biblioteca por Título, Autor, Publicación o Materia.">
							<div class="input-group-btn">
								<button type="submit" class="btn btn-default">Buscar</button>
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
									Búsqueda Avanzada
									<span class="caret"></span>
			  						<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
								  <li><a href="<?php echo $this->base; ?>/books/advanced_search">Libros</a></li>
								  <li><a href="<?php echo $this->base; ?>/magazines/advanced_search">Hemerografías</a></li>
								  <li><a href="<?php echo $this->base; ?>/manuscripts/advanced_search">Música Manuscrita</a></li>
								  <li><a href="<?php echo $this->base; ?>/printeds/advanced_search">Música Impresa</a></li>
								  <li><a href="<?php echo $this->base; ?>/iconographies/advanced_search">Iconógrafías</a></li>
								  <li><a href="<?php echo $this->base; ?>/documents/advanced_search">Documentos</a></li>
								  <li><a href="<?php echo $this->base; ?>/academic_papers/advanced_search">Trabajos Académicos</a></li>
								</ul>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
					
					<ul class="nav navbar-nav navbar-right">
						<li>
							<?php echo $this->Html->link('Mi Biblioteca', '/user_items'); ?>
						</li>
						<?php if ($this->Session->check('Auth.User')){ ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Session->read('Auth.User.name'); ?> <strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<?php echo $this->Html->link('Perfil', '/users/edit'); ?>
								</li>
								<?php if ($this->Session->read('Auth.User.group_id') != 3) { ?>
								<li>
									<a href=""></a>
									<?php echo $this->Html->link('Configuración', '/configurations'); ?>
								</li>
								<?php } ?>
								<li class="divider">
								</li>
								<li>
									<?php echo $this->Html->link('Salir', '/users/logout'); ?>
								</li>
							</ul>
						</li>
						<?php } else { ?>
							<li>
								<?php echo $this->Html->link('Ingresar', '/users/login'); ?>
							</li>
						<?php } ?>
					</ul>
				</div>
				
			</nav>
			
			<div>
				<?php echo $this->Html->image('nuevo/logo_meseron.jpg', array('style' => 'width: 30%; height: 160px; float: left;')); ?>
				<?php echo $this->Html->image('nuevo/imagen_up.jpg', array('style' => 'width: 70%; height: 160px; float: left;')); ?>
			</div>
		</div>
	</div>
	
	<div class="row clearfix">
		<div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
	</div>
	
	<br />
	
	<div class="row clearfix">
		<div class="col-md-12 column text-center">
		<?php if (isset($pages)){ ?>
			<ul class="breadcrumb">
				<?php
					foreach($pages as $page):
					echo "<li>" . $this->Html->link($page['Pagetext']['title'], array('controller' => 'pagetexts', 'action' => 'page', $page['Pagetext']['id'])) . '</li>';
					endforeach;
				?>
				<li>
					<a href="<?php echo $this->base; ?>/links/links">Enlaces</a>
				</li>
				<li>
					<a href="<?php echo $this->base; ?>/faqs/faqs">Preguntas Frecuentes</a>
				</li>
				<?php //if (isset($visitors)) { ?>
					<li>Visitas: <?php echo $visitors; ?></li>
				<?php //} ?>
				</ul>
		<?php } ?>
		</div>
	</div>
	
	<div class="row clearfix" style="background-color: white;">
		<div class="col-md-12 column">
			<div style="width: 20%; float: left; padding-left:6%;"><a href='http://www.ucv.ve/estructura/facultades/facultad-de-humanidades-y-educacion/escuelas/artes.html' target="_new"><?php echo $this->Html->image('nuevo/artes.jpg', array('class' => 'img-responsive', 'style' => 'width: 100px;')); ?></a></div>
			<div style="width: 20%; float: left; padding-left:6%;"><a href='http://www.ucv.ve/estructura/facultades/facultad-de-humanidades-y-educacion.html' target="_new"><?php echo $this->Html->image('nuevo/humanidades.jpg', array('class' => 'img-responsive', 'style' => 'width: 100px;')); ?></a></div>
			<div style="width: 20%; float: left; padding-left:6%; padding-top: 10px;"><a href='http://www.ucv.ve/' target="_new"><?php echo $this->Html->image('nuevo/ucv.jpg', array('class' => 'img-responsive', 'style' => 'width: 80px;')); ?></a></div>
			<div style="width: 20%; float: left; padding-left:6%;"><a href='http://www.ciens.ucv.ve/' target="_new"><?php echo $this->Html->image('nuevo/ciencias.jpg', array('class' => 'img-responsive', 'style' => 'width: 100px;')); ?></a></div>
			<div style="width: 20%; float: left; padding-left:6%;"><a href='http://www.ciens.ucv.ve/escueladecomputacion/inicio/index' target="_new"><?php echo $this->Html->image('nuevo/computacion.jpg', array('class' => 'img-responsive', 'style' => 'width: 100px;')); ?></a></div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
	$('.pagination').children().addClass('pagination');
});
</script>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>