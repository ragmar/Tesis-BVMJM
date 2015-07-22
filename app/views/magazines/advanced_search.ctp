<style type="text/css">
	.table {
		border: solid 1px #6c3f30;
	}
	
	th {
		color: #FFF;
		background-color: #6c3f30;
		border: solid 1px #E8DED4;
	}
	
	.btn-primary {
		width: 200px;
		height: 35px;
		margin: 2px 2px 0px 0px;
		padding: 0px 0px 0px 0px;
		text-align: center;
		float: left;
	}
	
	.btn-primary:hover {
		text-decoration: none;
	}
</style>

<div class="items" style="text-align: center;">
<?php echo $this->Form->create('Magazine'); ?>
	<h2>Búsqueda Avanzada de Hemerografías</h2>
	<table class="table">
		<tr>
			<th style="width: 10%">017</th>
			<th style="width: 45%">Número de copyright o de depósito legal.</th>
			<td style="width: 45%">
				<?php
					if (!empty($this->data)) {
						echo $this->Form->input('017', array('id' => '017', 'label' => false, 'class' => 'form-control', 'div' => false, 'value' => $this->data['Magazine']['017']));
					} else {
						echo $this->Form->input('017', array('id' => '017', 'label' => false, 'class' => 'form-control', 'div' => false));
					}
				?>
			</td>
		</tr>
		<tr>
			<th style="width: 10%">020</th>
			<th style="width: 45%">Número Internacional Normalizado para Libros (ISBN).</th>
			<td style="width: 45%">
				<?php
					if (!empty($this->data)) {
						echo $this->Form->input('020', array('id' => '020', 'label' => false, 'class' => 'form-control', 'div' => false, 'value' => $this->data['Magazine']['020']));
					} else {
						echo $this->Form->input('020', array('id' => '020', 'label' => false, 'class' => 'form-control', 'div' => false));
					}
				?>
			</td>
		</tr>
		<tr>
			<th style="width: 10%">022</th>
			<th style="width: 45%">Número Internacional Normalizado para Publicaciones Seriadas (ISSN).</th>
			<td style="width: 45%">
				<?php
					if (!empty($this->data)) {
						echo $this->Form->input('022', array('id' => '022', 'label' => false, 'class' => 'form-control', 'div' => false, 'value' => $this->data['Magazine']['022']));
					} else {
						echo $this->Form->input('022', array('id' => '022', 'label' => false, 'class' => 'form-control', 'div' => false));
					}
				?>
			</td>
		</tr>
		<tr>
			<th style="width: 10%">028</th>
			<th style="width: 45%">Número de plancha.</th>
			<td style="width: 45%">
				<?php
					if (!empty($this->data)) {
						echo $this->Form->input('028', array('id' => '028', 'label' => false, 'class' => 'form-control', 'div' => false, 'value' => $this->data['Magazine']['028']));
					} else {
						echo $this->Form->input('028', array('id' => '028', 'label' => false, 'class' => 'form-control', 'div' => false));
					}
				?>
			</td>
		</tr>
		<tr>
			<th style="width: 10%">040</th>
			<th style="width: 45%">Fuente de la catalogación.</th>
			<td style="width: 45%">
				<?php
					if (!empty($this->data)) {
						echo $this->Form->input('040', array('id' => '040', 'label' => false, 'class' => 'form-control', 'div' => false, 'value' => $this->data['Magazine']['040']));
					} else {
						echo $this->Form->input('040', array('id' => '040', 'label' => false, 'class' => 'form-control', 'div' => false));
					}
				?>
			</td>
		</tr>
		<tr>
			<th style="width: 10%">041</th>
			<th style="width: 45%">Código de lengua.</th>
			<td style="width: 45%">
				<?php
					if (!empty($this->data)) {
						echo $this->Form->input('041', array('id' => '041', 'label' => false, 'class' => 'form-control', 'div' => false, 'value' => $this->data['Magazine']['041']));
					} else {
						echo $this->Form->input('041', array('id' => '041', 'label' => false, 'class' => 'form-control', 'div' => false));
					}
				?>
			</td>
		</tr>
		<tr>
			<th style="width: 10%">044</th>
			<th style="width: 45%">Código del país de la entidad editora/productora.</th>
			<td style="width: 45%">
				<?php
					if (!empty($this->data)) {
						echo $this->Form->input('044', array('id' => '044', 'label' => false, 'class' => 'form-control', 'div' => false, 'value' => $this->data['Magazine']['044']));
					} else {
						echo $this->Form->input('044', array('id' => '044', 'label' => false, 'class' => 'form-control', 'div' => false));
					}
				?>
			</td>
		</tr>
		<tr>
			<th style="width: 10%">082</th>
			<th style="width: 45%">Número de la Clasificación Decimal Dewey.</th>
			<td style="width: 45%">
				<?php
					if (!empty($this->data)) {
						echo $this->Form->input('082', array('id' => '082', 'label' => false, 'class' => 'form-control', 'div' => false, 'value' => $this->data['Magazine']['082']));
					} else {
						echo $this->Form->input('082', array('id' => '082', 'label' => false, 'class' => 'form-control', 'div' => false));
					}
				?>
			</td>
		</tr>
		<tr>
			<th style="width: 10%">092</th>
			<th style="width: 45%">Clasificación local (COTA).</th>
			<td style="width: 45%">
				<?php
					if (!empty($this->data)) {
						echo $this->Form->input('092', array('id' => '092', 'label' => false, 'class' => 'form-control', 'div' => false, 'value' => $this->data['Magazine']['092']));
					} else {
						echo $this->Form->input('092', array('id' => '092', 'label' => false, 'class' => 'form-control', 'div' => false));
					}
				?>
			</td>
		</tr>
		
		<tr>
			<th style="width: 10%">100</th>
			<th style="width: 45%">Punto de acceso principal - Nombre de persona.</th>
			<td style="width: 45%"><?php echo $this->Form->input('100', array('id' => '100', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">110</th>
			<th style="width: 45%">Autor corporativo.</th>
			<td style="width: 45%"><?php echo $this->Form->input('110', array('id' => '110', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">130</th>
			<th style="width: 45%">Título uniforme (Punto de acceso).</th>
			<td style="width: 45%"><?php echo $this->Form->input('130', array('id' => '130', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		
		<tr>
			<th style="width: 10%">222</th>
			<th style="width: 45%">Título clave.</th>
			<td style="width: 45%"><?php echo $this->Form->input('222', array('id' => '222', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">240</th>
			<th style="width: 45%">Título uniforme.</th>
			<td style="width: 45%"><?php echo $this->Form->input('240', array('id' => '240', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">245</th>
			<th style="width: 45%">Mención de título.</th>
			<td style="width: 45%"><?php echo $this->Form->input('245', array('id' => '245', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">246</th>
			<th style="width: 45%">Variante de título.</th>
			<td style="width: 45%"><?php echo $this->Form->input('246', array('id' => '246', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">247</th>
			<th style="width: 45%">Título anterior.</th>
			<td style="width: 45%"><?php echo $this->Form->input('247', array('id' => '247', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">250</th>
			<th style="width: 45%">Mención de edición.</th>
			<td style="width: 45%"><?php echo $this->Form->input('250', array('id' => '250', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">260</th>
			<th style="width: 45%">Publicación, distribución, etc. (pie de imprenta).</th>
			<td style="width: 45%"><?php echo $this->Form->input('260', array('id' => '260', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		
		<tr>
			<th style="width: 10%">300</th>
			<th style="width: 45%">Descripción física.</th>
			<td style="width: 45%"><?php echo $this->Form->input('300', array('id' => '300', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">310</th>
			<th style="width: 45%">Periodicidad actual.</th>
			<td style="width: 45%"><?php echo $this->Form->input('310', array('id' => '310', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">321</th>
			<th style="width: 45%">Periodicidad anterior.</th>
			<td style="width: 45%"><?php echo $this->Form->input('321', array('id' => '321', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">362</th>
			<th style="width: 45%">Fechas de publicación y/o designación secuencial.</th>
			<td style="width: 45%"><?php echo $this->Form->input('362', array('id' => '362', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">380</th>
			<th style="width: 45%">Forma de la obra.</th>
			<td style="width: 45%"><?php echo $this->Form->input('380', array('id' => '380', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		
		<tr>
			<th style="width: 10%">500</th>
			<th style="width: 45%">Nota general.</th>
			<td style="width: 45%"><?php echo $this->Form->input('500', array('id' => '500', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">501</th>
			<th style="width: 45%">Nota de “Con”.</th>
			<td style="width: 45%"><?php echo $this->Form->input('501', array('id' => '501', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">505</th>
			<th style="width: 45%">Nota de contenido con formato.</th>
			<td style="width: 45%"><?php echo $this->Form->input('505', array('id' => '505', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">510</th>
			<th style="width: 45%">Nota de citas o referencias bibliográficas.</th>
			<td style="width: 45%"><?php echo $this->Form->input('510', array('id' => '510', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">515</th>
			<th style="width: 45%">Nota de peculiaridades de la numeración.</th>
			<td style="width: 45%"><?php echo $this->Form->input('515', array('id' => '515', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">520</th>
			<th style="width: 45%">Nota de sumario, etc.</th>
			<td style="width: 45%"><?php echo $this->Form->input('520', array('id' => '520', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">530</th>
			<th style="width: 45%">Nota de formato físico adicional disponible.</th>
			<td style="width: 45%"><?php echo $this->Form->input('530', array('id' => '530', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">534</th>
			<th style="width: 45%">Nota sobre la versión original.</th>
			<td style="width: 45%"><?php echo $this->Form->input('534', array('id' => '534', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">546</th>
			<th style="width: 45%">Nota de lengua.</th>
			<td style="width: 45%"><?php echo $this->Form->input('546', array('id' => '546', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">555</th>
			<th style="width: 45%">Nota de índice acumulativo u otros instrumentos bibliográficos.</th>
			<td style="width: 45%"><?php echo $this->Form->input('555', array('id' => '555', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">588</th>
			<th style="width: 45%">Nota de fuente de la descripción.</th>
			<td style="width: 45%"><?php echo $this->Form->input('588', array('id' => '588', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		
		<tr>
			<th style="width: 10%">600</th>
			<th style="width: 45%">Punto de acceso adicional de materia - Nombre de persona.</th>
			<td style="width: 45%"><?php echo $this->Form->input('600', array('id' => '600', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">610</th>
			<th style="width: 45%">Punto de acceso adicional de materia - Nombre de entidad corporativa.</th>
			<td style="width: 45%"><?php echo $this->Form->input('610', array('id' => '610', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">650</th>
			<th style="width: 45%">Punto de acceso adicional de materia – Término de materia.</th>
			<td style="width: 45%"><?php echo $this->Form->input('650', array('id' => '650', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">651</th>
			<th style="width: 45%">Punto de acceso adicional de materia - Nombre geográfico.</th>
			<td style="width: 45%"><?php echo $this->Form->input('651', array('id' => '651', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">653</th>
			<th style="width: 45%">Término de indización – No controlado.</th>
			<td style="width: 45%"><?php echo $this->Form->input('653', array('id' => '653', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">690</th>
			<th style="width: 45%">Siglo.</th>
			<td style="width: 45%"><?php echo $this->Form->input('690', array('id' => '690', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		
		<tr>
			<th style="width: 10%">700</th>
			<th style="width: 45%">Punto de acceso adicional - Nombre personal.</th>
			<td style="width: 45%"><?php echo $this->Form->input('700', array('id' => '700', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">710</th>
			<th style="width: 45%">Punto de acceso adicional - Nombre corporativo.</th>
			<td style="width: 45%"><?php echo $this->Form->input('710', array('id' => '710', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">740</th>
			<th style="width: 45%">Punto de acceso adicional - Título relacionado o analítico no controlado.</th>
			<td style="width: 45%"><?php echo $this->Form->input('740', array('id' => '740', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">773</th>
			<th style="width: 45%">Enlace al documento fuente.</th>
			<td style="width: 45%"><?php echo $this->Form->input('773', array('id' => '773', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		
		<tr>
			<th style="width: 10%">850</th>
			<th style="width: 45%">Institución que posee los fondos.</th>
			<td style="width: 45%"><?php echo $this->Form->input('850', array('id' => '850', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">852</th>
			<th style="width: 45%">Localización.</th>
			<td style="width: 45%"><?php echo $this->Form->input('852', array('id' => '852', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
		<tr>
			<th style="width: 10%">856</th>
			<th style="width: 45%">Localización y acceso electrónicos.</th>
			<td style="width: 45%"><?php echo $this->Form->input('856', array('id' => '856', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
		</tr>
	</table>

	<div style="padding-left: 32%;">
		<?php echo $this->Form->submit('Buscar', array('id' => 'buscar', 'class' => 'btn btn-primary')); ?>
		<?php echo $this->Form->button('Limpiar', array('id' => 'buscar', 'type' => 'reset', 'class' => 'btn btn-primary')); ?>
	</div>
		
	<br /><br />
	
<?php echo $this->Form->end(); ?>
</div>

<!--
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics', true), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types', true), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors', true), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author', true), array('controller' => 'authors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type', true), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic', true), array('controller' => 'topics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Values', true), array('controller' => 'values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Value', true), array('controller' => 'values', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicators', true), array('controller' => 'indicators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicator', true), array('controller' => 'indicators', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->

<?php
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

<?php if (isset($this->data)) { ?>
	
	<h3>
		<a name="resultado" id="resultado">
			Resultados de la Búsqueda:
		</a>
	</h3>
	
	<?php if (!empty($items)) { ?>
	<table class="table">
		<tr>
			<th style="width: 100px;"><?php __('Portada');?></th>
			<th><?php __('Detalles de la Obra');?></th>
		</tr>
		<?php
		if (isset($items)) {
		foreach ($items as $item):
		
			$t1 = $item['Item']['h-006'];
			$t2 = $item['Item']['h-007'];
			
			// Tipo libro.
			if (($t1 == 'a') && ($t2 == 'm')) {
				$color = "#9dae8a";
			}
			
			// Tipo libro.
			if (($t1 == 'a') && ($t2 == 'a')) {
				$color = "#9dae8a";
			}
			
			// Tipo revista.
			if (($t1 == 'a') && ($t2 == 's')) {
				$color = "#b3bbce";
			}
			
			// Tipo revista.
			if (($t1 == 'a') && ($t2 == 'b')) {
				$color = "#b3bbce";
			}
	
			// Música impresa.
			if (($t1 == 'c') && ($t2 == 'm')) {
				$color = "#d5b59e";
			}
			
			// Música manuscrita.
			if (($t1 == 'd') && ($t2 == 'm')) {
				$color = "#aea16c";
			}
			
			// Iconografía musical.
			if (($t1 == 'k') && ($t2 == 'm')) {
				$color = "#ba938e";
			}
			
			// Trabajos académicos.
			if (($t1 == 'a') && ($t2 == 'a')) {
				$color = "#d1c7be";
			}
		?>
		<tr>
			<td style="background-color: <?php echo $color; ?>; text-align: center;">
			<?php
				if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){
					if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/webroot/attachments/files/med/" . $item['Item']['cover_path']))){
						echo $this->Html->image("/webroot/attachments/files/med/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => 'magazines', 'action' => 'view', $item['Item']['id'])));
					} else {
						echo $this->Html->image("/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => 'magazines', 'action' => 'view', $item['Item']['id'])));
					}
				} else {
					if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/attachments/files/med/" . $item['Item']['cover_path']))){
						echo $this->Html->image("/app/webroot/attachments/files/med/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => 'magazines', 'action' => 'view', $item['Item']['id'])));
					} else {
						echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => 'magazines', 'action' => 'view', $item['Item']['id'])));
					}
				}
			?>
			</td>
			<td>
				<dl class="dl-horizontal">
					<dt style="width: 120px">
						<?php __('Title:');?>
					</dt>
					<dd style="margin-left: 130px">
						<?php
							if (!empty($item['Item']['245'])) {
								$title = marc21_decode($item['Item']['245']);
								if ($title) {
									//echo $this->Html->link($title['a'], 'view/'.$item['Item']['id'], array('title' => 'Haga click para ver los detalles.'));
									echo $title['a'] . ' ';
									if (isset($title['b'])) {echo ' ' . $title['b'];}
									if (isset($title['c'])) {echo ' ' . $title['c'];}
									if (isset($title['h'])) {echo ' ' . $title['h'];}
								}
							}
						?>
					</dd>
					<?php if (!empty($item['Item']['100'])) { ?>
					<dt style="width: 120px"><?php __('Author:');?></dt>
					<dd style="margin-left: 130px">
						<?php
							if (!empty($item['Item']['100'])) {
								$author = marc21_decode($item['Item']['100']);
								echo $author['a'];
								if (isset($author['n'])) {echo ' ' . $author['n'];}
								if (isset($author['p'])) {echo ' ' . $author['p'];}
							}
						?>
					</dd>
					<?php } ?>
					<?php if (!empty($item['Item']['260'])) { ?>
					<dt style="width: 120px"><?php __('Publicación:');?></dt>
					<dd style="margin-left: 130px">
						<?php
							$publication = marc21_decode($item['Item']['260']);
							echo $publication['a'];
							if (isset($publication['b'])) {echo ' ' . $publication['b'];}
							if (isset($publication['c'])) {echo ' ' . $publication['c'];}
						?>
					</dd>
					<?php } ?>
					<dt style="width: 120px"><?php __('Tipo:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$t1 = $item['Item']['h-006'];
						$t2 = $item['Item']['h-007'];
						
						// Tipo libro.
						if (($t1 == 'a') && ($t2 == 'm')) {
							echo "Libro.";
						}
						
						// Tipo parte de libro.
						if (($t1 == 'a') && ($t2 == 'a')) {
							echo "Artículo de un Libro.";
						}
						
						// Tipo revista.
						if (($t1 == 'a') && ($t2 == 's')) {
							echo "Hemerografía.";
						}
						
						// Tipo parte de revista.
						if (($t1 == 'a') && ($t2 == 'b')) {
							echo "Artículo de una Hemerografía.";
						}

						// Música impresa.
						if (($t1 == 'c') && ($t2 == 'm')) {
							echo "Música Impresa";
						}
						
						// Música manuscrita.
						if (($t1 == 'd') && ($t2 == 'm')) {
							echo "Música Manuscrita";
						}
					?>
					</dd>
					<?php if (!empty($item['Item']['690'])) { ?>
					<dt style="width: 120px"><?php __('Siglo:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$century = marc21_decode($item['Item']['690']);
						echo $century['a'];
					?>
					</dd>
					<?php } ?>
					<?php if (!empty($item['Item']['653'])) { ?>
					<dt style="width: 120px"><?php __('Materia:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$century = marc21_decode($item['Item']['653']);
						echo $century['a'];
					?>
					</dd>
					<?php } ?>
				</dl>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php } ?>
	</table>
	<?php } else { ?>
	<p class="text-center">No hay coincidencias.</p>
	<?php } ?>

	<?php if ((isset($this->Paginator)) && ($this->Paginator->params['paging']['Item']['pageCount'] > 1)) { ?>
	<div class="pagination" align="center">
		<ul>
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
		</ul>
	</div>
	<br />
	<?php } ?>
<?php } ?>
<script type="text/javascript">
	$(document).ready(function(){
		if ('<?php echo isset($this->data); ?>') {
			var new_position = jQuery('#resultado').offset();
			window.scrollTo(new_position.left,new_position.top);
		}
	});
</script>