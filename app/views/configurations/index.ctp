<ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>/">Inicio</a></li>
  <li>Configuración</li>
</ul>

<div class="text-center">
	<div class="row">
		<h3>Catalogación</h3>
		<div style="width: 8%; float: left;">&nbsp;</div>
		<div style="width: 12%; float: left;"><br />
			<?php echo $this->Html->link($html->image('ts/ima_libros.jpg', array('alt' => 'Libros', 'width' => '100px', 'class' => 'img-thumbnail')), '/books', array('escape' => false)); ?>
			<h5>Libros</h5>
		</div>
		<div style="width: 12%; float: left;"><br />
			<?php echo $this->Html->link($html->image('ts/ima_hemero.jpg', array('alt' => 'Hemerografías', 'width' => '100px', 'class' => 'img-thumbnail')), '/magazines', array('escape' => false)); ?>
			<h5>Hemerografías</h5>
		</div>
		<div style="width: 12%; float: left;"><br />
			<?php echo $this->Html->link($html->image('ts/ima_m_manus.jpg', array('alt' => 'Música Manuscrita', 'width' => '100px', 'class' => 'img-thumbnail')), '/manuscripts', array('escape' => false)); ?>
			<h5>Música Manuscrita</h5>
		</div>
		<div style="width: 12%; float: left;"><br />
			<?php echo $this->Html->link($html->image('ts/ima_m_impre.jpg', array('alt' => 'Música Impresa', 'width' => '100px', 'class' => 'img-thumbnail')), '/printeds', array('escape' => false)); ?>
			<h5>Música Impresa</h5><br />
		</div>
		<div style="width: 12%; float: left;"><br />
			<?php echo $this->Html->link($html->image('ts/ima_iconog.jpg', array('alt' => 'Iconogafías', 'width' => '100px', 'class' => 'img-thumbnail')), '/iconographies', array('escape' => false)); ?>
			<h5>Iconografías</h5>
		</div>
		<div style="width: 12%; float: left;"><br />
			<?php echo $this->Html->link($html->image('ts/ima_docum.jpg', array('alt' => 'Documentos', 'width' => '100px', 'class' => 'img-thumbnail')), '/documents', array('escape' => false)); ?>
			<h5>Documentos</h5><br />
		</div>
		<div style="width: 12%; float: left;"><br />
			<?php echo $this->Html->link($html->image('ts/ima_tesis.jpg', array('alt' => 'Trabajos Académicos', 'width' => '100px', 'class' => 'img-thumbnail')), '/academic_papers', array('escape' => false)); ?>
			<h5>Trabajos Académicos</h5><br />
		</div>
		<div style="width: 8%; float: left;">&nbsp;</div>
	</div>
	
	
	
	
	<?php if ($this->Session->read('Auth.User.group_id') == '2') { ?>
	<hr />
	<div class="row">
		<h3>Ayuda</h3>
			<div style="width: 5%; float: center;">&nbsp;</div>
			<div style="width: 90px; height: 100px; float: center; margin-left: 545px; margin-top: -40px; ">
				<br />
				<?php echo $this->Html->link($html->image('ts/ayuda.png',  array('alt' => 'help', 'class' => 'img-thumbnail')), '/configurations/help', array('escape' => false)); ?>
				<h5>Tutoriales</h5>
			</div>
	</div>
	</br></br>
		
	<?php } ?>
	
	
	
	
	
	
	
	<?php if ($this->Session->read('Auth.User.group_id') == '1') { ?>
	<hr />
	<div class="row">
		<h3>Configuración</h3>
			<div style="width: 5%; float: left;">&nbsp;</div>
			<div style="width: 15%; float: left;">
				<br />
				<?php echo $this->Html->link($html->image('ts/edit_txt.png', array('alt' => 'Páginas', 'class' => 'img-thumbnail')), '/pagetexts/', array('escape' => false)); ?>
				<h5>Páginas</h5>
			</div>
			<div style="width: 15%; float: left;">
				<br />
				<?php echo $this->Html->link($html->image('ts/admin_usuario.png', array('alt' => 'Usuarios', 'class' => 'img-thumbnail')), '/users/', array('escape' => false)); ?>
				<h5>Usuarios</h5>
			</div>
			<div style="width: 15%; float: left;">
				<br />
				<?php echo $this->Html->link($html->image('ts/admin_perfiles.jpg', array('alt' => 'Perfiles', 'class' => 'img-thumbnail')), '/profiles/', array('escape' => false)); ?>
				<h5>Perfiles</h5>
			</div>
			<div style="width: 15%; float: left;">
				<br />
				<?php echo $this->Html->link($html->image('ts/admin_marc21.png', array('alt' => 'Mensajes', 'class' => 'img-thumbnail', 'style' => 'width: 48px')), '/messages/', array('escape' => false)); ?>
				<h5>Mensajes</h5>
			</div>
			<div style="width: 15%; float: left;">
				<br />
				<?php echo $this->Html->link($html->image('ts/admin_enlace.png', array('alt' => 'Enlaces', 'class' => 'img-thumbnail')), '/links/', array('escape' => false)); ?>
				<h5>Enlaces</h5>
			</div>
			<div style="width: 15%; float: left;">
				<br />
				<?php echo $this->Html->link($html->image('ts/admin_preguntas.png', array('alt' => 'Faqs', 'class' => 'img-thumbnail')), '/faqs/', array('escape' => false)); ?>
				<h5>Preguntas Frecuentes</h5>
			</div>
			<div style="width: 5%; float: left;">&nbsp;</div>
		</div>
		<div class="row">
			<div style="width: 5%; float: left;">&nbsp;</div>
			<div style="width: 15%; float: left;">
				<br />
				<?php echo $this->Html->link($html->image('ts/logins.jpg', array('alt' => 'Visitas', 'class' => 'img-thumbnail', 'style' => 'width: 50px;')), '/logins/', array('escape' => false)); ?>
				<h5>Visitas</h5>
			</div>
			<div style="width: 15%; float: left;">
				<br />
				<?php echo $this->Html->link($html->image('ts/searches.jpg', array('alt' => 'Búsquedas', 'class' => 'img-thumbnail', 'style' => 'width: 50px;')), '/searches/', array('escape' => false)); ?>
				<h5>Búsquedas</h5>
			</div>
			<div style="width: 15%; float: left;">
				<br />
				<?php echo $this->Html->link($html->image('ts/calendar.jpg', array('alt' => 'Eventos', 'style' => 'width: 50px', 'class' => 'img-thumbnail')), '/events/', array('escape' => false)); ?>
				<h5>Eventos</h5>
			</div>
			<div style="width: 15%; float: left;">
				<br />
				<?php echo $this->Html->link($html->image('ts/icono_noticias.gif', array('alt' => 'Noticias', 'style' => 'width: 50px', 'class' => 'img-thumbnail')), '/news/', array('escape' => false)); ?>
				<h5>Noticias</h5>
			</div>
			<div style="width: 15%; float: left;">
				<br />
				<?php echo $this->Html->link($html->image('ts/respaldo_bd.png', array('id' => 'btn_db', 'alt' => 'BD Backup', 'class' => 'img-thumbnail', 'onclick' => 'return false;')), '', array('escape' => false)); ?>
				<h5>Respaldo de Base de Datos</h5>
				<div id="dbbackup"></div>
			</div>
			<div style="width: 15%; float: left;">
				<br />
				<?php echo $this->Html->link($html->image('ts/respaldo_app.png', array('id' => 'btn_site', 'alt' => 'APP Backup', 'class' => 'img-thumbnail', 'onclick' => 'return false;')), '', array('escape' => false)); ?>
				<h5>Respaldo de la Aplicación</h5>
				<div id="sitebackup"></div>
			</div>
			<div style="width: 5%; float: left;">&nbsp;</div>
		</div>
	<?php } ?>
	
	
	
	
	<?php if ($this->Session->read('Auth.User.group_id') == '1') { ?>
	<hr />
	<div class="row">
		<h3>Ayuda</h3>
			<div style="width: 5%; float: center;">&nbsp;</div>
			<div style="width: 5%; float: center; margin-left: 555px; margin-top: -40px; ">
				<br />
				<?php echo $this->Html->link($html->image('ts/ayuda.png', array('alt' => 'help', 'class' => 'img-thumbnail')), '/configurations/help', array('escape' => false)); ?>
				<h5>Tutoriales</h5>
			</div>
	</div>
		
	<?php } ?>
	
	
	
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btn_db').click(function(){
			$("#dbbackup").load('configurations/dbbackup');
		});
		
		$('#btn_site').click(function(){
			$("#sitebackup").load('configurations/sitebackup');
		});
	});
</script>