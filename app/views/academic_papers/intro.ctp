<?php echo $this->Html->script('wowslider.js'); ?>
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

#carousel {
	/*margin: 0 auto;*/
	padding: 0;
	overflow: scroll;
	border: 2px solid #999;
}

#carousel ul {
	list-style: none;
	width: 1500px;
	margin: 0;
	padding: 0;
	position: relative;
}

#carousel li {
	display: inline;
	float: left;
}

.textholder {
	text-align: left;
	font-size: small;
	padding: 6px;
	-moz-border-radius: 6px 6px 0 0;
	-webkit-border-top-left-radius: 6px;
	-webkit-border-top-right-radius: 6px;
}
/*
 *  generated by WOW Slider 5.6
 *  template Book
 */
</style>
<ul class="breadcrumb" style="margin: 0">
	<li>
    	<?php echo $this->Html->link(__('Inicio', true), array('controller' => 'pages')); ?>
    </li>
	<li>Trabajos Acad&eacute;micos</li>
</ul>

<div class="books index" style="text-align: justify; float: left">
	<div class="col-md-12 column">
		<h2>Módulo de Trabajos Acad&eacute;micos</h2>
		<hr style="border-color: black; margin: 10px;">

		<p>El módulo Trabajos Académicos almacena los trabajos especiales de
			grado, trabajos de ascenso, tesis de Maestría y tesis Doctorales
			producidos en el Departamento de Musicología de la Escuela de Artes
			de la Universidad Central de Venezuela, primera institución encargada
			de formar musicólogos en el país. Las investigaciones allí

			desarrolladas han sido fundamentales para el conocimiento, análisis y
			difusión de la música de nuestro continente, y en especial la de
			Venezuela. Estos trabajos comprenden estudios biográficos, catálogos
			de obras, análisis del lenguaje musical, paleografía y transcripción
			y edición de partituras, educación, estudio de géneros, organología,
			estudio de compositores, agrupaciones e instituciones musicales,
			crónicas, catálogos, bibliografías, hemerografías, crítica musical. A
			groso modo, podrían clasificarse en estos cuatro renglones:</p>
		<ul>
			<li><p>
					<b>Educación musical</b>, tanto aquella enfocada hacia la formación
					de profesionales de la música (compositores, directores,
					intérpretes), como aquella impartida como educación integral en los
					distintos niveles del sistema educativo venezolano. Se incluyen
					aquí innovaciones educacionales, análisis del sistema educativo
					venezolano en el área de música, y sistematización o rescate de
					métodos de destacados músicos venezolanos del pasado y del
					presente.
				</p></li>
			<li><p>
					<b>Rescate y conservación del acervo musical venezolano.</b> Se
					incluyen aquí trabajos sobre instituciones musicales, cronologías
					regionales, compilaciones, biografías y catálogos de compositores,
					estudio de géneros, publicaciones, instrumentos musicales, etc.
				</p></li>
			<li><p>
					<b>Paleografía musical.</b> Comprende trabajos de transcripción
					paleográfica de materiales inéditos escritos en notación mensural
					de los siglos XVI y XVII de catedrales latinoamericanas,
					principalmente del Virreinato de la Nueva España, así como música
					de los siglos XVIII y XIX venezolana.
				</p></li>
			<li><p>
					<b>Temas de sociología,</b> crítica y metódica musical. El impacto
					de las diferentes manifestaciones musicales en la sociedad
					venezolana también ha sido motivo de estudio dentro del
					Departamento de Musicología, muchas veces en colaboración con
					sociólogos, literatos, economistas y comunicadores sociales.
				</p></li>
		</ul>
		<div class="ws_shadow"></div>
	</div>

</div>
<div style="text-align: center;">
	<?php echo $this->Html->link('Ver Trabajos', '/academic_papers', array('class' => 'btn btn-primary', 'style' => 'float: none')); ?>
</div>

