<style>
	.pricing_table {
			line-height: 150%; 
			font-size: 12px; 
			margin: 0 auto; 
			width: 75%; 
			max-width: 800px; 
			padding-top: 10px;
			margin-top: 100px;
		}
		
		.price_block {
			text-align: center; 
			width: 100%; 
			color: #fff; 
			float: left; 
			list-style-type: none; 
			transition: all 0.25s; 
			position: relative; 
			box-sizing: border-box;
			
			margin-bottom: 10px; 
			border-bottom: 1px solid transparent; 
		}
		
		/*Price heads*/
		.pricing_table h3 {
			text-transform: uppercase; 
			padding: 5px 0; 
			background: #333; 
			margin: -10px 0 1px 0;
		}
		
		/*Price tags*/
		.price {
			display: table; 
			background: #444; 
			width: 100%; 
			height: 70px; 
		}
		.price_figure {
			font-size: 24px; 
			text-transform: uppercase; 
			vertical-align: middle; 
			display: table-cell;
		}
		.price_number {
			font-size: 11px;
			font-weight: bold; 
			display: block;
		}
		.price_tenure {
			font-size: 11px; 
		}
		
		/*Features*/
		.features {
			background: #F2F2F2; 
			color: #000;
		}
		.features li {
			padding: 8px 15px;
			border-bottom: 1px solid #ccc; 
			font-size: 11px; 
			list-style-type: none;
		}
		
		.footer1 {
			padding: 15px; 
			background: #F5DA81;
		}
		
		.footer2 {
			padding: 15px; 
			background: #90784F;
		}
		
		
		.action_button {
			text-decoration: none; 
			color: #fff; 
			font-weight: bold; 
			border-radius: 5px; 
			background: linear-gradient(#666, #333); 
			padding: 5px 20px; 
			font-size: 11px; 
			text-transform: uppercase;
		}
		
		.price_block:hover {
			box-shadow: 0 0 0px 5px rgba(0, 0, 0, 0.5); 
			transform: scale(1.04) translateY(-5px); 
			z-index: 1; 
			border-bottom: 0 none;
		}
		.price_block:hover .price {
			background:linear-gradient(#DB7224, #F9B84A); 
			box-shadow: inset 0 0 45px 1px #DB7224;
		}
		.price_block:hover h3 {
			background: #222;
		}
		.price_block:hover .action_button {
			background: linear-gradient(#F9B84A, #DB7224); 
		}
		
		
		@media only screen and (min-width : 480px) and (max-width : 768px) {
			.price_block {width: 50%;}
			.price_block:nth-child(odd) {border-right: 1px solid transparent;}
			.price_block:nth-child(3) {clear: both;}
			
			.price_block:nth-child(odd):hover {border: 0 none;}
		}
		
		@media only screen and (min-width : 768px){
			.price_block {width: 25%;}
			.price_block {border-right: 1px solid transparent; border-bottom: 0 none;}
			.price_block:last-child {border-right: 0 none;}
			
			.price_block:hover {border: 0 none;}
		}
		
		.skeleton, .skeleton ul, .skeleton li, .skeleton div, .skeleton h3, .skeleton span, .skeleton p {
			border: 5px solid rgba(255, 255, 255, 0.9);
			border-radius: 5px;
			margin: 7px !important;
			background: rgba(0, 0, 0, 0.05) !important;
			padding: 0 !important;
			text-align: left !important;
			display: block !important;
			
			width: auto !important;
			height: auto !important;
			
			font-size: 10px !important;
			font-style: italic !important;
			text-transform: none !important;
			font-weight: normal !important;
			color: black !important;
		}
		.skeleton .label {
			font-size: 11px !important;
			font-style: italic !important;
			text-transform: none !important;
			font-weight: normal !important;
			color: white !important;
			border: 0 none !important;
			padding: 5px !important; 
			margin: 0 !important;
			float: none !important;
			text-align: left !important;
			text-shadow: 0 0 1px white;
			background: none !important;
		}
		.skeleton {
			display: none !important;
			margin: 100px !important;
			clear: both;
</style>

<ul class="breadcrumb" style="margin: 0">
	<li>
    	<?php echo $this->Html->link(__('Inicio', true), array('controller' => 'configurations/index')); ?>
    </li>
	<li>Soporte de Ayuda</li>
</ul>

<ul style="margin-left: 250px; margin-top: 50px" class="pricing_table">
		<li class="price_block">
			<div class="price">
				<div class="price_figure">
					<span class="price_number">Tutorial<br/>Cargar Contenido</span>
				</div>
			</div>
			<ul class="features">
				</br></br></br>
				<h5 style="color: black; margin-left: -30px">Haga clic en Ver para acceder al tutorial</h5></br></br></br>
			</ul>
			<div class="footer1">
				 <a href="<?php echo $this->webroot;?>files/ContendioBCJM.pdf"  class="action_button" target="_blank">Ver</a>
					
			</div>
		</li>
		<li class="price_block">
			<div class="price">
				<div class="price_figure">
					<span class="price_number">Tutorial </br> Administrar Páginas</span>
				</div>
			</div>
			<ul class="features">
				</br></br></br>
				<h5 style="color: black; margin-left: -30px">Haga clic en Ver para acceder al tutorial</h5></br></br></br>	
			</ul>
			<div class="footer2">
				<a href="<?php echo $this->webroot;?>files/AdmPaginasbjm.pdf"  class="action_button" target="_blank">Ver</a>
			</div>
		</li>
		<li class="price_block">
			
			<div class="price">
				<div class="price_figure">
					<span class="price_number">Tutorial</br> Realizar Respaldos</span>
				</div>
			</div>
			<ul class="features">
			</br></br></br>
				<h5 style="color: black; margin-left: -30px">Haga clic en Ver para acceder al tutorial</h5></br></br></br>
			</ul>
			<div class="footer1">
				<a href="#" class="action_button">Ver</a>
			</div>
		</li>
		
	<!--	<li class="price_block">
		
			<div class="price">
				<div class="price_figure">
					<span class="price_number">$999</span>
				</div>
			</div>
			<ul class="features">
				<li>Unlimited Storage</li>
				<li>Unlimited Clients</li>
				<li>Unlimited Projects</li>
				<li>Unlimited Colors</li>
				<li>Free Goodies</li>
				<li>24/7 Email support</li>
			</ul>
			<div class="footer2">
				<a href="#" class="action_button">Buy Now</a>
			</div>
		</li>
	</ul>
	
	
	<ul class="skeleton pricing_table" style="margin-top: 100px; overflow: hidden;">
		<li class="label" style="margin: 0 none;">ul.pricing_table</li>
		<li class="price_block">
			<span class="label">li.price_block</span>
			<h3><span class="label">h3</span></h3>
			<div class="price">
				<span class="label">div.price</span>
				<div class="price_figure">
					<span class="label">div.price_figure</span>
					<span class="price_number">
						<span class="label">span.price_number</span>
					</span>
					<span class="price_tenure">
						<span class="label">span.price_tenure</span>
					</span>
				</div>
			</div>
			<ul class="features">
				<li class="label">ul.features</li>
				<br /><br /><br />
			</ul>
			<div class="footer">
				<span class="label">div.footer</span>
			</div>
		</li>
		
		
		<li class="price_block" style="opacity: 0.5;">
			<span class="label">li.price_block</span>
			<h3><span class="label">h3</span></h3>
			<div class="price">
				<span class="label">div.price</span>
				<div class="price_figure">
					<span class="label">div.price_figure</span>
					<span class="price_number">
						<span class="label">span.price_number</span>
					</span>
					<span class="price_tenure">
						<span class="label">span.price_tenure</span>
					</span>
				</div>
			</div>
			<ul class="features">
				<li class="label">ul.features</li>
				<br /><br /><br />
			</ul>
			<div class="footer">
				<span class="label">div.footer</span>
			</div>
		</li>
		<li class="price_block" style="opacity: 0.25;">
			<span class="label">li.price_block</span>
			<h3><span class="label">h3</span></h3>
			<div class="price">
				<span class="label">div.price</span>
				<div class="price_figure">
					<span class="label">div.price_figure</span>
					<span class="price_number">
						<span class="label">span.price_number</span>
					</span>
					<span class="price_tenure">
						<span class="label">span.price_tenure</span>
					</span>
				</div>
			</div>
			<ul class="features">
				<li class="label">ul.features</li>
				<br /><br /><br />
			</ul>
			<div class="footer">
				<span class="label">div.footer</span>
			</div>
		</li>
	</ul>
-->