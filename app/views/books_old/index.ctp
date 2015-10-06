<ul class="breadcrumb" style="margin: 0">
  <li>Libros<span class="divider">/</span></li>
</ul>

<div align="center" style="padding-top: 5px; color: #828793; font-size: 18px; background: -webkit-linear-gradient(#d0d6e2, #ffffff); background: -moz-linear-gradient(#d0d6e2, #ffffff); background: -o-linear-gradient(#d0d6e2, #ffffff);"><strong>Módulo de Libros</strong></div>

<div style="padding-left: 50px; padding-right: 50px;">

<div style="height: 46px; border-bottom-style: inset; border-bottom-color: #BBBBBB;">
<br />
<table style="font-size: smaller; width: 75%;">
	<tr>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s2.jpg'); background-repeat: no-repeat;"><strong><a href="<?php echo $this->base; ?>/books">Presentación</a></strong></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/books/century">Siglo</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/books/author">Autor</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/books/title">Título</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/books/year">Año</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/books/matter">Materia</a></td>
	</tr>
</table>
</div>

<div class="boosk index" style="text-align: justify;">
<br />
<h2 style="font-size: 120%; text-align: center; margin-left: 5px; padding-left: 5px; line-height: 0px;">Bienvenido al M&oacute;dulo de Libros.</h2>
<hr style="border-color: black; margin: 10px;">

<p style="text-align: justify;">En el Módulo Libros se exponen todos aquellos tratados o ensayos musicales que se difundieron o se produjeron en Venezuela durante los siglos XVII, XVIII, XIX y XX. Se incluyen aquí libros o capítulos de libros que atienden áreas temáticas como teoría, estética, didáctica e historiografía musical. Además se incluyen métodos de instrumento, himnarios litúrgicos y cancioneros populares, ceremoniales y rituales de los oficios y misas cantadas, diccionarios musicales, etc.</p><br />

<p style="text-align: justify;">El módulo se nutre de varios repositorios a saber:</p><br />

<ul>
<li>La colección fundacional de la Biblioteca Nacional de Venezuela, nutrida por los textos que pertenecían a la Biblioteca de la Universidad de Caracas y a otras instituciones y personajes de la Provincia de Venezuela, tales como la Congregación de San Felipe Neri, el Convento de las Monjas Concepciones, la Librería (biblioteca diríamos hoy) de San Francisco de Caracas y otras particulares como los doctores Ramón Ignacio Méndez y Nepomuceno Quintana.</li>
<li>La colección Pedro Manuel Arcaya que, por su enorme volumen y universalidad, no deja de tener algunos textos de interés artístico y musical. Se conformó en la primera mitad del siglo XX.</li>
<li> La colección del eminente musicólogo y americanista Francisco Kurt Lange, adquirida por la Biblioteca Nacional de Venezuela a finales del siglo XX.</li>
<li>La colección de libros y folletos de la Biblioteca Nacional de Venezuela, contentiva, entre otras muchas cosas, de textos de interés musical de los siglos XIX y XX.</li>
<li>La colección de libros antiguos y raros de la Biblioteca de la Universidad Central de Venezuela.</li>
<li>El archivo de la Escuela de Música José Ángel Lamas.</li>
<li>El archivo de la Fundación Vicente Emilio Sojo.</li>
<li>Otros archivos particulares. </li>
</ul>

</div>

<div class="actions">
<br />
	<ul>
		<li><label><?php __('Buscar por ...'); ?></label></li>
		<li><?php echo $this->Html->link(__('Siglo', true), array('action' => 'century'));?></li>
		<li><?php echo $this->Html->link(__('Editor', true), array('action' => 'author')); ?> </li>
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