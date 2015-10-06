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
<ul class="breadcrumb" style="margin: 0">
	<li>
    	<?php echo $this->Html->link(__('Inicio', true), array('controller' => 'pages')); ?>
    </li>
	<li>Libros</li>
</ul>

<div class="books index" style="text-align: justify; float: ">
	<div class="col-md-12 column">
		<h2>Módulo de Libros</h2>
		<hr style="border-color: black; margin: 10px;">
		
		<p style="text-align: justify;">En el Módulo Libros se exponen todos aquellos tratados o ensayos musicales que se difundieron o se produjeron en Venezuela durante los siglos XVII, XVIII, XIX y XX. Se incluyen aquí libros o capítulos de libros que atienden áreas temáticas como teoría, estética, didáctica e historiografía musical. Además se incluyen métodos de instrumento, himnarios litúrgicos y cancioneros populares, ceremoniales y rituales de los oficios y misas cantadas, diccionarios musicales, etc.</p><br />
		
		<p style="text-align: justify;">El módulo se nutre de varios repositorios a saber:</p><br />
		
		<ul style="color: #6c3f30;">
			<li>La colección fundacional de la Biblioteca Nacional de Venezuela, nutrida por los textos que pertenecían a la Biblioteca de la Universidad de Caracas y a otras instituciones y personajes de la Provincia de Venezuela, tales como la Congregación de San Felipe Neri, el Convento de las Monjas Concepciones, la Librería (biblioteca diríamos hoy) de San Francisco de Caracas y otras particulares como los doctores Ramón Ignacio Méndez y Nepomuceno Quintana.</li>
			<li>La colección Pedro Manuel Arcaya que, por su enorme volumen y universalidad, no deja de tener algunos textos de interés artístico y musical. Se conformó en la primera mitad del siglo XX.</li>
			<li>La colección del eminente musicólogo y americanista Francisco Kurt Lange, adquirida por la Biblioteca Nacional de Venezuela a finales del siglo XX.</li>
			<li>La colección de libros y folletos de la Biblioteca Nacional de Venezuela, contentiva, entre otras muchas cosas, de textos de interés musical de los siglos XIX y XX.</li>
			<li>La colección de libros antiguos y raros de la Biblioteca de la Universidad Central de Venezuela.</li>
			<li>El archivo de la Escuela de Música José Ángel Lamas.</li>
			<li>El archivo de la Fundación Vicente Emilio Sojo.</li>
			<li>Otros archivos particulares. </li>
		</ul>
		
		<div style="text-align: center;">
			<?php echo $this->Html->link('Ver Libros', '/books', array('class' => 'btn btn-primary', 'style' => 'float: none')); ?>
		</div>

	</div>
	
	<!--
	<div class="col-md-3 column">
		<br />
		<label><?php __('Ver Libros por:'); ?></label>
		<br />
		<?php echo $this->Html->link('Siglo', array('action' => 'century'), array('class' => 'btn-primary', 'title' => 'Siglo')); ?>
		<?php echo $this->Html->link('Autor', array('action' => 'author'), array('class' => 'btn-primary', 'title' => 'Autor')); ?>
		<?php echo $this->Html->link('Título', array('action' => 'title'), array('class' => 'btn-primary', 'title' => 'Título')); ?>
		<?php echo $this->Html->link('Año', array('action' => 'year'), array('class' => 'btn-primary', 'title' => 'Año')); ?>
		<?php echo $this->Html->link('Materia', array('action' => 'matter'), array('class' => 'btn-primary', 'title' => 'Materia')); ?>
	</div>
	-->
</div>