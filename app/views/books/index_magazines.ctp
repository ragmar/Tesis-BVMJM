<ul class="breadcrumb" style="margin: 0">
  <li>Revistas<span class="divider">/</span></li>
</ul>

<div align="center" style="padding-top: 5px; color: #828793; font-size: 18px; background: -webkit-linear-gradient(#d0d6e2, #ffffff); background: -moz-linear-gradient(#d0d6e2, #ffffff); background: -o-linear-gradient(#d0d6e2, #ffffff);"><strong>Módulo de Revistas</strong></div>

<div style="padding-left: 50px; padding-right: 50px;">

<div style="height: 46px; border-bottom-style: inset; border-bottom-color: #BBBBBB;">
<br />
<table style="font-size: smaller; width: 75%;">
	<tr>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s2.jpg'); background-repeat: no-repeat;"><strong><a href="<?php echo $this->base; ?>/magazines">Presentación</a></strong></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/century">Siglo</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/author">Autor</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/title">Título</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/year">Año</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/matter">Materia</a></td>
	</tr>
</table>
</div>

<div class="magazines index">
<br />
<h2 style="font-size: 120%; text-align: center; margin-left: 5px; padding-left: 5px; line-height: 0px;">Bienvenido al M&oacute;dulo Hemerograf&iacute;a Musical.</h2>
<hr style="border-color: black; margin: 10px;">

<p style="text-align: justify;">El m&oacute;dulo Hemerograf&iacute;a Musical, contiene las principales publicaciones seriadas venezolanas vinculadas de alguna manera con la m&uacute;sica.
Se han digitalizado peri&oacute;dicos y revistas que pueden ser consultados por el usuario, siempre y cuando disponga de conexi&oacute;n a la red, a trav&eacute;s de motores de b&uacute;squeda especializados y herramientas musicol&oacute;gicas de alt&iacute;sima calidad, en un portal amigable de f&aacute;cil navegaci&oacute;n.</p><br />

<p style="text-align: justify;">Esta hemerograf&iacute;a vinculada con la m&uacute;sica, de formato y periodicidad diversa, puede clasificarse en tres grandes renglones:</p><br />

<ol>
<li>Aquella de tipo informativo general que, entre otros temas, ofrece comentarios sobre distintos aspectos de la vida musical.</li>
<li>Aquella de corte cultural donde la m&uacute;sica, las artes pl&aacute;sticas, la literatura, el cine y el teatro son los t&oacute;picos centrales.</li>
<li>Y aquella especializada en la m&uacute;sica propiamente.</li>
</ol>

<br />

<p style="text-align: justify;">Estas publicaciones contienen centenares de datos sobre compositores y su entorno, obras, int&eacute;rpretes, eventos, conciertos, rese&ntilde;as cr&iacute;ticas, noticias de la visita de artistas extranjeros al pa&iacute;s, noticias del quehacer de los nacionales fuera de las fronteras, comentarios sobre la actuaci&oacute;n de las bandas, informaci&oacute;n sobre la educación musical, acotaciones sobre est&eacute;tica, datos sobre folclor, y un largo etc&eacute;tera. En algunos casos, adem&aacute;s de las noticias, cr&oacute;nicas y/o rese&ntilde;as, se publicaban partituras, bien como encartados externos (&aacute;lbumes o separatas), o bien dentro del formato propio del peri&oacute;dico o revista. Este conjunto de partituras constituye, tanto por su cantidad como por su calidad, una de las colecciones de m&uacute;sica m&aacute;s importantes decimon&oacute;nicas.</p><br />
<p style="text-align: justify;">A pesar de sus limitaciones e inexactitudes, las publicaciones seriadas son el testimonio directo y cotidiano del acontecer de una &eacute;poca. De all&iacute; la importancia de su estudio para la reconstrucci&oacute;n de la vida cultural del pa&iacute;s.</p>
</div>
<div class="actions">
<br />
	<ul>
		<li><label><?php __('Buscar por ...'); ?></label></li>
		<li><?php echo $this->Html->link(__('Siglo', true), array('action' => 'century'));?></li>
		<li><?php echo $this->Html->link(__('Autor', true), array('action' => 'author')); ?> </li>
		<li><?php echo $this->Html->link(__('Título', true), array('action' => 'title')); ?> </li>
		<li><?php echo $this->Html->link(__('Año', true), array('action' => 'year')); ?> </li>
		<li><?php echo $this->Html->link(__('Materia', true), array('action' => 'matter')); ?> </li>
	</ul>
	<br />
	<div style="text-align: center;"><?php echo $this->Html->image('ts/logo_meseron_1.jpg'); ?></div>
	<br />
</div>
<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>