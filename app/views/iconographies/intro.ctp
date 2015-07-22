<head>
  

  <?php echo $this->Html->meta('img/nuevo/favicon.ico');?>
  </head>
  

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


.textholder {
    text-align: left;
    font-size: small;
    padding: 6px;
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-top-left-radius: 6px;
    -webkit-border-top-right-radius: 6px;
}

.visor {
width: 500px;
height: 558px;
margin: .2rem auto 0;
position: relative;
text-align: center;
border: 5px solid goldenrod;
padding-top: 5px;
background: burlywood;
max-width: 95%;
border-radius: 2px;
margin-left: 600px;
}
.visor:after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    width: 100%;
    height: 4px;
    border-radius: 30%;
    box-shadow: 0 0 10px 5px rgba(0, 0, 0, 0.5);
    z-index: -1;
}
.visor > div {
  position: absolute;
  top: 65px;
  left: 0;
  width: 100%;
  height: 347px;
  display: block;
  transition: .7s;
  border-top: 3px solid white;
}
.visor article {
  position: absolute;
  height: 480px;
  width: 100%;
  opacity: 0;
  transition: opacity .9s, background-position 5s linear;
}
input[name=selector] {
  z-index: 10;
  width: 0;
  height: 0;
  position: relative;
  display: inline-block;
  visibility: hidden;
}
.uno, label[for='uno'] {
  background-image: url("/bvmjm/app/webroot/img/iconografia/ima_icono.jpg");
}
.dos, label[for='dos'] {
  background-image: url("/bvmjm/app/webroot/img/iconografia/iconintro.png");
}
.tres, label[for='tres'] {
  background-image: url("/bvmjm/app/webroot/img/iconografia/musica-sta-cecilia intro.jpg");  
}
.cuatro, label[for='cuatro'] {
  background-image: url("/bvmjm/app/webroot/img/iconografia/Aguinalderos.jpg"); 
}

article, label {
  background-position: center left;
  background-repeat: no-repeat;  
}
label {
    background-size: cover;
    cursor: pointer;
    display: inline-block;
    color: #aaa;
    overflow: hidden;
    position: relative;
    width: 20%;
    height: 50px;
    border: 3px solid #F5F1E9;
    z-index: 10;
  box-shadow: 0 0 3px rgba(0,0,0,.5);
}
input[id='uno']:checked ~ div .uno, input[id='dos']:checked ~ div .dos, input[id='tres']:checked ~ div .tres, input[id='cuatro']:checked ~ div .cuatro {
  opacity: 1;
}
.visor > div:hover article {
  background-position: center right;
}



</style>
	
<ul class="breadcrumb" style="margin: 0">
	<li>
    	<?php echo $this->Html->link(__('Inicio', true), array('controller' => 'pages')); ?>
    </li>
	<li>Iconografía Musical en Venezuela</li>
</ul>

<div class="books index" style="text-align: justify; float: ">
	<div class="col-md-12 column">
		<h2>&nbsp;&nbsp;Módulo Iconografía Musical en Venezuela</h2>
		 <div style="text-align: center; margin-left: 580px; margin-top: -45px; padding-bottom:10px">
			<?php echo $this->Html->link('Ver Iconografías', '/iconographies', array('class' => 'btn btn-primary', 'style' => 'float: none')); ?>
		</div>
		<hr style="border-color: black; margin: 10px;">
		<div style="float:left; width: 50%;margin-left:20px">
		
		<p style="text-align: justify;">La iconografía musical es considerada como una ciencia y método de investigación auxiliar de la musicología, que consiste en la interpretación de documentos gráficos (pinturas, fotografías, grabados) u objetos tridimensionales (esculturas, relieves) que estén provistos de escenas, temáticas, simbologías e instrumentos vinculados con la música. El módulo Iconografía de la Biblioteca Virtual Musicológica Juan Meserón proporciona acceso libre y gratuito a  este tipo de documentos gráficos digitalizados presentes en la bibliografía y hemerografía venezolanas de los siglos XVIII al XXI.</p><br />
		
		<p style="text-align: justify;">El objetivo es ofrecer a los musicólogos, demás profesionales y público en general, un acceso directo y con información especializada de las obras volcada en una ficha catalográfica especialmente diseñada para tal fin.</p><br />
		
		<p style="text-align: justify">A través de las imágenes se podrán reconstruir aspectos como: instrumentos, partituras, retratos de compositores y músicos, vestimentas, escenografías, tipos de agrupaciones, contexto social en el cual se escuchaban las composiciones, los accesorios usados por los intérpretes, las posiciones corporales empleadas por los ejecutantes, la simbología de los instrumentos y demás aspectos organológicos.</p><br />
		
		</div>
<!--<div style="float:right;margin-right:50px "> -->
		<?php //echo $this->Html->image('ts/ima_icono.jpg', array('width'=>'410px', 'height'=>'470px'))?>
 <!--</div>  -->

<section class="visor">
<input type="radio" id="uno" value="1" name="selector" checked='checked' />
      <label for="uno"></label>
  <input type="radio" id="dos" value="2" name="selector" />
      <label for="dos"></label>
  <input type="radio" id="tres" value="3" name="selector" />
      <label for="tres"></label>
  <input type="radio" id="cuatro" value="4" name="selector" />
   <label for="cuatro"></label>
  
  <div>
    <article class="uno">
      <!--<h4 style="color: gold; font-style: italic; margin-top: 400px">Falcón y Guzmán Blanco en el baile de La Bamba</h4> -->
    </article>
    <article class="dos">
     
    </article>
    <article class="tres">
      <h2></h2>
     
    </article>
    <article class="cuatro">
      <h2></h2>
   
    </article>
  </div>
  
</section>
   
    </br></br>
    
 
</div>
		

	</div
	
	
