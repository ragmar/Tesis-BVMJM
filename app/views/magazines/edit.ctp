<?php echo $this->Html->css('autocomplete/autocomplete'); ?>
<?php echo $this->Html->css('jquery-ui'); ?>
<?php echo $this->Html->script('jquery-ui'); ?>
<?php echo $this->Html->css('tagit/jquery.tagit'); ?>
<?php echo $this->Html->css('tagit/tagit.ui-zendesk'); ?>
<?php echo $this->Html->script('tagit/tag-it.min'); ?>
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
<style>
.table {
	border: solid 1px #6c3f30;
}

th {
	color: #FFF;
	background-color: #6c3f30;
	border: solid 1px #E8DED4;
}
</style>
<ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>">Inicio</a></li>
  <li><a href="<?php echo $this->base; ?>/magazines">Hemerografías</a></li>
  <li>Modificar Hemerografía</li>
</ul>

<div class="items">
<div class="col-md-12 column">
<h2>Modificar Hemerografía</h2>

<?php echo $this->Form->create('Magazine', array('enctype' => 'multipart/form-data')); ?>
<?php echo $this->Form->hidden('id', array('value' => $item['Item']['id']));?>

<h5>Datos de Cabecera o Líder</h5>

<!--
<div style="text-align: center;">
	<select id="tipo" class="form-control">
			<option value="0">Seleccione el tipo de registro</option>
		<optgroup label="MATERIAL TEXTUAL">
			<option value="1">Libro</option>
			<option value="2">Revista</option>
			<option value="3">Parte de Libro</option>
			<option value="4">Parte de Revista</option>
		</optgroup>
		<optgroup label="MÚSICA ESCRITA">
			<option value="5">Música Impresa</option>
			<option value="6">Música Manuscrita</option>
			<option value="7">Música Impresa (parte componente)</option>
			<option value="8">Música Manuscrita (parte componente)</option>
			<option value="9">Música Impresa (parte de revista)</option>
			<option value="10">Música Impresa (colección)</option>
			<option value="11">Música Manuscrita (colección facticia)</option>
		</optgroup>
		<optgroup label="MATERIAL GRÁFICO">
			<option value="12">Imágenes fijas bidimensionales</option>
			<option value="13">Imágenes fijas bidimensionales (parte de libro)</option>
			<option value="14">Imágenes fijas bidimensionales (parte de revista)</option>
		</optgroup>
	</select>
</div>

<br />
-->

<table class="table">
	<tr>
		<th><label>Estado del Registro.</label></th>
		<td>
		<?php
			echo $this->Form->input('h-005', array('label' => false, 'class' => 'form-control',
				'options' => array(
					'a' => 'a - Aumentado el nivel de codificación.', 
					'c' => 'c - Corregido o revisado.',
					'd' => 'd - Suprimido.',
					'n' => 'n - Nuevo.',
					'p' => 'p - Aumentado el nivel de codificación utilizado antes de la publicación.'
					),
				'selected' => $item['Item']['h-005'],
				'empty' => 'Seleccione'
			));?>
		</td>
	</tr>
	<tr>
		<th><label>Tipo de Registro.</label></th>
		<td>
		<?php
		echo $this->Form->input('h-006', array('label' => false, 'class' => 'form-control',
			'options' => array(
				'a' => 'a - Material textual.'/*,
				'c' => 'c - Música notada impresa.',
				'd' => 'd - Música notada manuscrita.',
				'e' => 'e - Material cartográfico.',
				'f' => 'f - Material cartográfico manuscrito.',
				'g' => 'g - Material gráfico proyectable.',
				'i' => 'i - Grabación sonora no musical.',
				'j' => 'j - Grabación sonora musical.',
				'k' => 'k - Material gráfico bidimensional, no proyectable.',
				'm' => 'm - Archivo de ordenador.',
				'o' => 'o - Kit.',
				'p' => 'p - Material mixto.',
				'r' => 'r - Objeto tridimensional artificial o natural.',
				't' => 't - Material textual manuscrito.'*/
				),
			'selected' => $item['Item']['h-006']/*,
			'empty' => 'Seleccione'*/
		)); ?>
		</td>
	</tr>
	<tr>
		<th><label>Nivel Bibliográfico.</label></th>
		<td>
		<?php
		echo $this->Form->input('h-007', array('label' => false, 'class' => 'form-control',
			'options' => array(
				/*'a' => 'a - Parte componente monográfica.',*/
				'b' => 'b - Parte componente seriada.',/*
				'c' => 'c - Colección.',
				'd' => 'd - Subunidad.',
				'i' => 'i - Recurso integrable.',
				'm' => 'm - Monografía.',*/
				's' => 's - Publicación seriada.'
			),
			'selected' => $item['Item']['h-007']/*,
			'empty' => 'Seleccione'*/
		));?>
		</td>
	</tr>
	<tr>
		<th><label>Nivel de Codificación.</label></th>
		<td>
		<?php
		echo $this->Form->input('h-017', array('label' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - Nivel completo.',
				'1' => '1 - Nivel completo, material no examinado.',
				'2' => '2 - Nivel incompleto, material no examinado.',
				'3' => '3 - Nivel abreviado.',
				'4' => '4 - Nivel básico.',
				'5' => '5 - Nivel parcial (preliminar).',
				'7' => '7 - Nivel mínimo.',
				'8' => '8 - Nivel de prepublicación.',
				'u' => 'u - Desconocido.',
				'z' => 'z - No aplicable.'
			),
			'selected' => $item['Item']['h-017'],
			'empty' => 'Seleccione'
		));?>
		</td>
	</tr>
	<tr>
		<th><label>Forma de Catalogación Descriptiva.</label></th>
		<td>
		<?php
		echo $this->Form->input('h-018', array('label' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No es ISBD.',
				'a' => 'a - AACR 2.',
				'c' => 'c - ISBD sin puntuación.',
				'i' => 'i - ISBD con puntuación.',
				'u' => 'u - Desconocida.'
			),
			'selected' => $item['Item']['h-018'],
			'empty' => 'Seleccione'
		));
		?>
		</td>
	</tr>
</table>

<a name="top" href=""></a>

<ul class="nav nav-tabs">
	<li class="active"><a class="tab" name="all-tabs" href="" id="t0xx">0XX</a></li>
	<li><a class="tab" href="" id="t1xx">1XX</a></li>
	<li><a class="tab" href="" id="t2xx">2XX</a></li>
	<li><a class="tab" href="" id="t3xx">3XX</a></li>
	<li class="disabled"><a class="tab" href="" id="t4xx">4XX</a></li>
	<li><a class="tab" href="" id="t5xx">5XX</a></li>
	<li><a class="tab" href="" id="t6xx">6XX</a></li>
	<li><a class="tab" href="" id="t7xx">7XX</a></li>
	<li><a class="tab" href="" id="t8xx">8XX</a></li>
	<li class="disabled"><a class="tab" href="" id="t9xx">9XX</a></li>
	<li><a class="tab" href="" id="ocultar">Ocultar Campos</a></li>
</ul>

<div id="0xx" class="tabs">

<table class="table">
	<tr>
		<th style="width: 10%;"><b>008</b></th>
		<th style="width: 45%;"><b>Códigos de información de longitud fija.</b></th>
		<th style="width: 45%;">
			<?php
				$c008 = "";
				if ($item['Item']['008']) {
					$c008 = $item['Item']['008'];
				} else {
					$c008 = date('ymd', time());
				}
			?>
			<label id="l-008"><?php echo $c008; ?></label>
			<?php echo $this->Form->hidden('008', array('id' => '008', 'label' => false, 'div' => false, 'value' => $item['Item']['008'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>008 [06]</b></td>
		<td>Tipo de fecha/estado de la publicación.</td>
		<td>
			<?php echo $this->Form->input('008-06', array('id' => '008-06', 'label' => false, 'class' => 'form-control', 'div' => false, 
			'options' => array(
				'b' => 'b - No consta información; implica fechas A.C.',
				'c' => 'c - Recurso continuado con publicación en curso',
				'd' => 'd - Publicación cerrada',
				'e' => 'e - Fecha detallada',
				'i' => 'i - Fechas comprendidas en una colección',
				'k' => 'k - Rango de años del grueso de la colección',
				'm' => 'm - Fechas múltiples',
				'n' => 'n - Fecha desconocida',
				'p' => 'p - Fechas de distribución/estreno/edición y de sesión de producción/grabación cuando difiere',
				'q' => 'q - Fecha dudosa',
				'r' => 'r - Fechas de la reimpresión/reedición y del original',
				's' => 's - Fecha única conocida/probable',
				't' => 't - Fechas de publicación y de copyright',
				'u' => 'u - Estado desconocido',
				'|' => '| - No se utiliza'
			), 'selected' => substr($c008, 6, 1)
		)); ?></td>
	</tr>
	<tr>
		<td nowrap="nowrap"><b>008 [07-10]</b></td>
		<td>Primera fecha.</td>
		<td>
			<table id="008pf">
				<tr>
					<td>
						<?php
							// Decodifica el campo 008.
							$c0080710_1 = substr($c008, 7, 1);
							$c0080710_2 = ""; // Fecha 1
							$c0080710_3 = "";
							$c0080710_4 = ""; // Fecha 2
							$c0081517 = "";
							$c00818 = "";
							$c00820 = "";
							$c00819 = "";
							$c00821 = "";
							$c0083537 = "";
							
							// La primera fecha no se utiliza (||||).
							if ($c0080710_1 == '|') { // Caso 4.
								$c0080710_1 = "||||";
								
								if ((substr($c008, 11, 1) != '|') && (substr($c008, 11, 1) != '#') && (substr($c008, 11, 1) != 'u')) { // Si la segunda fecha se utiliza ...
									$c0080710_3 = "sf";
									$c0080710_4 = substr($c008, 11, 4); // Carga la segunda fecha.
									$c0081517 = substr($c008, 15, 3);
									$c00818 = substr($c008, 18, 1);
									$c00819 = substr($c008, 19, 1);
									$c00820 = substr($c008, 20, 1);
									$c00821 = substr($c008, 22, 1);
									$c0083537 = substr($c008, 22, 3);
								} else {
									if (substr($c008, 11, 1) == '|') { // Si no se utiliza el campo segunda fecha ...
										$c0080710_3 = "||||";
										$c0080710_4 = ""; // Carga la segunda fecha.
										$c0081517 = substr($c008, 15, 3);
										$c00818 = substr($c008, 18, 1);
										$c00819 = substr($c008, 19, 1);
										$c00820 = substr($c008, 20, 1);
										$c00821 = substr($c008, 22, 1);
										$c0083537 = substr($c008, 22, 3);
									} else { // Si la segunda fecha es '#' o 'u' ...
										$c0080710_3 = substr($c008, 11, 1);
										$c0081517 = substr($c008, 12, 3);
										$c00818 = substr($c008, 15, 1);
										$c00819 = substr($c008, 16, 1);
										$c00820 = substr($c008, 17, 1);
										$c00821 = substr($c008, 18, 1);
										$c0083537 = substr($c008, 19, 3);
									}
								}
							}

							// La primera fecha se utiliza (pf - yyyy).
							if (($c0080710_1 != "||||") && ($c0080710_1 != '#') && ($c0080710_1 != 'u')) { // Caso 1.
								$c0080710_1 = "pf";
								$c0080710_2 = substr($c008, 7, 4); // Carga la primera fecha.
								
								if ((substr($c008, 11, 1) != '#') && (substr($c008, 11, 1) != '|') && (substr($c008, 11, 1) != 'u')) { // Si consigue segunda fecha ...
									$c0080710_3 = "sf";
									$c0080710_4 = substr($c008, 11, 4); // Carga la segunda fecha.
									$c0081517 = substr($c008, 15, 3);
									$c00818 = substr($c008, 18, 1);
									$c00819 = substr($c008, 19, 1);
									$c00820 = substr($c008, 20, 1);
									$c00821 = substr($c008, 22, 1);
									$c0083537 = substr($c008, 22, 3);
								} else {
									if (substr($c008, 11, 1) == '|') { // Si no se utiliza el campo segunda fecha ...
										$c0080710_3 = "||||";
										$c0081517 = substr($c008, 15, 3);
										$c00818 = substr($c008, 18, 1);
										$c00819 = substr($c008, 19, 1);
										$c00820 = substr($c008, 20, 1);
										$c00821 = substr($c008, 21, 1);
										$c0083537 = substr($c008, 22, 3);
									} else { // Si la segunda fecha es '#' o 'u' ...
										$c0080710_3 = substr($c008, 11, 1);
										$c0081517 = substr($c008, 12, 3);
										$c00818 = substr($c008, 15, 1);
										$c00819 = substr($c008, 16, 1);
										$c00820 = substr($c008, 17, 1);
										$c00821 = substr($c008, 18, 1);
										$c0083537 = substr($c008, 19, 3);
									}
								}
							}
							
							// La primera fecha es '#' o 'u'.
							if (($c0080710_1 == '#') || ($c0080710_1 == 'u')) { // Caso 2 y 3. 
								$c0080710_3 = substr($c008, 8, 6);
								
								if ((substr($c008, 8, 1) != '|') && (substr($c008, 8, 1) != '#') && (substr($c008, 8, 1) != 'u')) { // Si tiene segunda fecha ...
									$c0080710_3 = "sf";
									$c0080710_4 = substr($c008, 8, 4);
									$c0081517 = substr($c008, 12, 3);
									$c00818 = substr($c008, 15, 1);
									$c00819 = substr($c008, 16, 1);
									$c00820 = substr($c008, 17, 1);
									$c00821 = substr($c008, 18, 1);
									$c0083537 = substr($c008, 19, 3);
								} else {
									if (substr($c008, 11, 1) == '|') { // Si no se utiliza el campo segunda fecha ...
										$c0080710_3 = "||||";
										$c0081517 = substr($c008, 12, 3);
										$c00818 = substr($c008, 15, 1);
										$c00819 = substr($c008, 16, 1);
										$c00820 = substr($c008, 17, 1);
										$c00821 = substr($c008, 18, 1);
										$c0083537 = substr($c008, 19, 3);
									} else { // Si la segunda fecha es '#' o 'u' ...
										$c0080710_3 = substr($c008, 8, 1);
										$c0081517 = substr($c008, 9, 3);
										$c00818 = substr($c008, 12, 1);
										$c00819 = substr($c008, 13, 1);
										$c00820 = substr($c008, 14, 1);
										$c00821 = substr($c008, 15, 1);
										$c0083537 = substr($c008, 16, 3);
									}
								}
							}
						?>
						<?php echo $this->Form->input('008-07-10', array('id' => '008-07-10', 'label' => false, 'class' => 'form-control', 'div' => false,
						'options' => array(
							'pf' => 'Primera Fecha (yyyy)',
							'#' => '# - El elemento fecha no es aplicable',
							'u' => 'u - Fecha total o parcialmente desconocida',
							'||||' => '|||| - No se utiliza'
							), 'selected' => $c0080710_1
						)); ?>
					</td>
					<td>
						<?php
							if ($c0080710_1 != 'pf') {
								echo $this->Form->input('fecha1-008-07-10', array('id' => 'fecha008-07-10', 'label' => false, 'class' => 'form-control', 'div' => false, 'maxlength' => '4', 'disabled' => 'disabled', 'placeholder' => 'yyyy', 'value' => $c0080710_2));
							} else {
								echo $this->Form->input('fecha1-008-07-10', array('id' => 'fecha008-07-10', 'label' => false, 'class' => 'form-control', 'div' => false, 'maxlength' => '4', 'placeholder' => 'yyyy', 'value' => $c0080710_2));
							}
						?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap"><b>008 [11-14]</b></td>
		<td>Segunda fecha.</td>
		<td>
			<table id="008sf">
				<tr>
					<td>
						<?php echo $this->Form->input('008-11-14', array('id' => '008-11-14', 'label' => false, 'class' => 'form-control', 'div' => false,
						'options' => array(
							'sf' => 'Segunda Fecha (yyyy)',
							'#' => '# - El elemento fecha no es aplicable',
							'u' => 'u - Fecha total o parcialmente desconocida',
							'||||' => '|||| - No se utiliza'
							), 'selected' => $c0080710_3
						)); ?>
					</td>
					<td>
						<?php
							if ($c0080710_3 != 'sf') {
								echo $this->Form->input('fecha2-008-11-14', array('id' => 'fecha008-11-14', 'label' => false, 'class' => 'form-control', 'div' => false, 'maxlength' => '4', 'disabled' => 'disabled', 'placeholder' => 'yyyy', 'value' => $c0080710_4));
							} else {
								echo $this->Form->input('fecha2-008-11-14', array('id' => 'fecha008-11-14', 'label' => false, 'class' => 'form-control', 'div' => false, 'maxlength' => '4', 'placeholder' => 'yyyy', 'value' => $c0080710_4));
							}
						?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<!-- <tr>
		<td><b>008[11-14]</b></td>
		<td>Segunda fecha.</td>
		<td><?php echo $this->Form->input('008-11-14', array('id' => '008-11-14', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
	</tr> -->
	<tr>
		<td nowrap="nowrap"><b>008 [15-17]</b></td>
		<td>Lugar de publicación, producción o ejecución.</td>
		<td><?php echo $this->Form->input('008-15-17', array('id' => '008-15-17', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'-aa' => 'Albania',
				'abc' => 'Alberta',
				'-ac' => 'Ashmore and Cartier Islands',
				'-ae' => 'Algeria',
				'-af' => 'Afghanistan',
				'-ag' => 'Argentina',
				'-ai' => 'Anguilla',
				'-ai' => 'Armenia (Republic)',
				'air' => 'Armenian S.S.R.',
				'-aj' => 'Azerbaijan',
				'ajr' => 'Azerbaijan S.S.R.',
				'aku' => 'Alaska',
				'alu' => 'Alabama',
				'-am' => 'Anguilla',
				'-an' => 'Andorra',
				'-ao' => 'Angola',
				'-aq' => 'Antigua and Barbuda',
				'aru' => 'Arkansas',
				'-as' => 'American Samoa',
				'-at' => 'Australia',
				'-au' => 'Austria',
				'-aw' => 'Aruba',
				'-ay' => 'Antarctica',
				'azu' => 'Arizona',
				'-ba' => 'Bahrain',
				'-bb' => 'Barbados',
				'bcc' => 'British Columbia',
				'-bd' => 'Burundi',
				'-be' => 'Belgium',
				'-bf' => 'Bahamas',
				'-bg' => 'Bangladesh',
				'-bh' => 'Belize',
				'-bi' => 'British Indian Ocean Territory',
				'-bl' => 'Brazil',
				'-bm' => 'Bermuda Islands',
				'-bn' => 'Bosnia and Hercegovina',
				'-bo' => 'Bolivia',
				'-bp' => 'Solomon Islands',
				'-br' => 'Burma',
				'-bs' => 'Botswana',
				'-bt' => 'Bhutan',
				'-bu' => 'Bulgaria',
				'-bv' => 'Bouvet Island',
				'-bw' => 'Belarus',
				'bwr' => 'Byelorussian S.S.R.',
				'-bx' => 'Brunei',
				'cau' => 'California',
				'-cb' => 'Cambodia',
				'-cc' => 'China',
				'-cd' => 'Chad',
				'-ce' => 'Sri Lanka',
				'-cf' => 'Congo (Brazzaville)',
				'-cg' => 'Congo (Democratic Republic)',
				'-ch' => 'China (Republic : 1949- )',
				'-ci' => 'Croatia',
				'-cj' => 'Cayman Islands',
				'-ck' => 'Colombia',
				'-cl' => 'Chile',
				'-cm' => 'Cameroon',
				'-cn' => 'Canada',
				'cou' => 'Colorado',
				'-cp' => 'Canton and Enderbury Islands',
				'-cq' => 'Comoros',
				'-cr' => 'Costa Rica',
				'-cs' => 'Czechoslovakia',
				'ctu' => 'Connecticut',
				'-cu' => 'Cuba',
				'-cv' => 'Cape Verde',
				'-cw' => 'Cook Islands',
				'-cx' => 'Central African Republic',
				'-cy' => 'Cyprus',
				'-cz' => 'Canal Zone',
				'dcu' => 'District of Columbia',
				'deu' => 'Delaware',
				'-dk' => 'Denmark',
				'-dm' => 'Benin',
				'-dq' => 'Dominica',
				'-dr' => 'Dominican Republic',
				'-ea' => 'Eritrea',
				'-ec' => 'Ecuador',
				'-eg' => 'Equatorial Guinea',
				'-em' => 'East Timor',
				'enk' => 'England',
				'-er' => 'Estonia',
				/*'err' => 'Estonia',*/
				'-es' => 'El Salvador',
				'-et' => 'Ethiopia',
				'-fa' => 'Faroe Islands',
				'-fg' => 'French Guiana',
				'-fi' => 'Finland',
				'-fj' => 'Fiji',
				'-fk' => 'Falkland Islands',
				'flu' => 'Florida',
				'-fm' => 'Micronesia (Federated States)',
				'-fp' => 'French Polynesia',
				'-fr' => 'France',
				'-fs' => 'Terres australes et antarctiques françaises',
				'-ft' => 'Djibouti',
				'gau' => 'GeorgiaCode Sequence',
				'-gb' => 'Kiribati',
				'-gd' => 'Grenada',
				'-ge' => 'Germany (East)',
				'-gh' => 'Ghana',
				'-gi' => 'Gibraltar',
				'-gl' => 'Greenland',
				'-gm' => 'Gambia',
				'-gn' => 'Gilbert and Ellice Islands',
				'-go' => 'Gabon',
				'-gp' => 'Guadeloupe',
				'-gr' => 'Greece',
				'-gs' => 'Georgia (Republic)',
				'gsr' => 'Georgian S.S.R.',
				'-gt' => 'Guatemala',
				'-gu' => 'Guam',
				'-gv' => 'Guinea',
				'-gw' => 'Germany',
				'-gy' => 'Guyana',
				'-gz' => 'Gaza Strip',
				'hiu' => 'Hawaii',
				'-hk' => 'Hong Kong',
				'-hm' => 'Heard and McDonald Islands',
				'-ho' => 'Honduras',
				'-ht' => 'Haiti',
				'-hu' => 'Hungary',
				'iau' => 'Iowa',
				'-ic' => 'Iceland',
				'idu' => 'Idaho',
				'-ie' => 'Ireland',
				'-ii' => 'India',
				'ilu' => 'Illinois',
				'inu' => 'Indiana',
				'-io' => 'Indonesia',
				'-iq' => 'Iraq',
				'-ir' => 'Iran',
				'-is' => 'Israel',
				'-it' => 'Italy',
				'-iu' => 'Israel-Syria Demilitarized Zones',
				'-iv' => "Côte d’Ivoire",
				'-iw' => 'Israel-Jordan Demilitarized Zones',
				'-iy' => 'Iraq-Saudi Arabia Neutral Zone',
				'-ja' => 'Japan',
				'-ji' => 'Johnston Atoll',
				'-jm' => 'Jamaica',
				'-jn' => 'Jan Mayen',
				'-jo' => 'Jordan',
				'-ke' => 'Kenya',
				'-kg' => 'Kyrgyzstan',
				'kgr' => 'Kirghiz S.S.R.',
				'-kn' => 'Korea (North)',
				'-ko' => 'Korea (South)',
				'ksu' => 'Kansas',
				'-ku' => 'Kuwait',
				'kyu' => 'Kentucky',
				'-kz' => 'Kazakhstan',
				'kzr' => 'Kazakh S.S.R.',
				'lau' => 'Louisiana',
				'-lb' => 'Liberia',
				'-le' => 'Lebanon',
				'-lh' => 'Liechtenstein',
				'-li' => 'Lithuania',
				/*'lir' => 'Lithuania',*/
				'-ln' => 'Central and Southern Line Islands',
				'-lo' => 'Lesotho',
				'-ls' => 'Laos',
				'-lu' => 'Luxembourg',
				'-lv' => 'Latvia',
				/*'lvr' => 'Latvia',*/
				'-ly' => 'Libya',
				'mau' => 'Massachusetts',
				'mbc' => 'Manitoba',
				'-mc' => 'Monaco',
				'mdu' => 'Maryland',
				'meu' => 'Maine',
				'-mf' => 'Mauritius',
				'-mg' => 'Madagascar',
				'-mh' => 'Macao',
				'miu' => 'Michigan',
				'-mj' => 'Montserrat',
				'-mk' => 'Oman',
				'-ml' => 'Mali',
				'-mm' => 'Malta',
				'mnu' => 'Minnesota',
				'mou' => 'Missouri',
				'-mp' => 'Mongolia',
				'-mq' => 'Martinique',
				'-mr' => 'Morocco',
				'msu' => 'Mississippi',
				'mtu' => 'Montana',
				'-mu' => 'Mauritania',
				'-mv' => 'Moldova',
				'mvr' => 'Moldavian S.S.R.',
				'-mw' => 'Malawi',
				'-mx' => 'Mexico',
				'-my' => 'Malaysia',
				'-mz' => 'Mozambique',
				'-na' => 'Netherlands Antilles',
				'nbu' => 'Nebraska',
				'ncu' => 'North Carolina',
				'ndu' => 'North Dakota',
				'-ne' => 'Netherlands',
				'nfc' => 'Newfoundland and Labrador',
				'-ng' => 'Niger',
				'nhu' => 'New Hampshire',
				'nik' => 'Northern Ireland',
				'nju' => 'New Jersey',
				'nkc' => 'New Brunswick',
				'-nl' => 'New CaledoniaCode Sequence',
				'-nm' => 'Northern Mariana Islands',
				'nmu' => 'New Mexico',
				'-nn' => 'Vanuatu',
				'-no' => 'Norway',
				'-np' => 'Nepal',
				'-nq' => 'Nicaragua',
				'-nr' => 'Nigeria',
				'nsc' => 'Nova Scotia',
				'ntc' => 'Northwest Territories',
				'-nu' => 'Nauru',
				'nuc' => 'Nunavut',
				'nvu' => 'Nevada',
				'-nx' => 'Norfolk Island',
				'nyu' => 'New York (State)',
				'-nz' => 'New Zealand',
				'ohu' => 'Ohio',
				'oku' => 'Oklahoma',
				'onc' => 'Ontario',
				'oru' => 'Oregon',
				'-ot' => 'Mayotte',
				'pau' => 'Pennsylvania',
				'-pc' => 'Pitcairn Island',
				'-pe' => 'Peru',
				'-pf' => 'Paracel Islands',
				'-pg' => 'Guinea-Bissau',
				'-ph' => 'Philippines',
				'pic' => 'Prince Edward Island',
				'-pk' => 'Pakistan',
				'-pl' => 'Poland',
				'-pn' => 'Panama',
				'-po' => 'Portugal',
				'-pp' => 'Papua New Guinea',
				'-pr' => 'Puerto Rico',
				'-pt' => 'Portuguese Timor',
				'-pw' => 'Palau',
				'-py' => 'Paraguay',
				'-qa' => 'Qatar',
				'quc' => 'Québec (Province)',
				'-re' => 'Réunion',
				'-rh' => 'Zimbabwe',
				'riu' => 'Rhode Island',
				'-rm' => 'Romania',
				'-ru' => 'Russia (Federation)',
				'rur' => 'Russian S.F.S.R.',
				'-rw' => 'Rwanda',
				'-ry' => 'Ryukyu Islands, Southern',
				'-sa' => 'South Africa',
				'-sb' => 'Svalbard',
				'scu' => 'South Carolina',
				'sdu' => 'South Dakota',
				'-se' => 'Seychelles',
				'-sf' => 'Sao Tome and Principe',
				'-sg' => 'Senegal',
				'-sh' => 'Spanish North Africa',
				'-si' => 'Singapore',
				'-sj' => 'Sudan',
				'-sk' => 'Sikkim',
				'-sl' => 'Sierra Leone',
				'-sm' => 'San Marino',
				'snc' => 'Saskatchewan',
				'-so' => 'Somalia',
				'-sp' => 'Spain',
				'-sq' => 'Swaziland',
				'-sr' => 'Surinam',
				'-ss' => 'Western Sahara',
				'stk' => 'Scotland',
				'-su' => 'Saudi Arabia',
				'-sv' => 'Swan Islands',
				'-sw' => 'Sweden',
				'-sx' => 'Namibia',
				'-sy' => 'Syria',
				'-sz' => 'Switzerland',
				'-ta' => 'Tajikistan',
				'tar' => 'Tajik S.S.R.',
				'-tc' => 'Turks and Caicos Islands',
				'-tg' => 'Togo',
				'-th' => 'Thailand',
				'-ti' => 'Tunisia',
				'-tk' => 'Turkmenistan',
				'tkr' => 'Turkmen S.S.R.',
				'-tl' => 'Tokelau',
				'tnu' => 'Tennessee',
				'-to' => 'Tonga',
				'-tr' => 'Trinidad and Tobago',
				'-ts' => 'United Arab Emirates',
				'-tt' => 'Trust Territory of the Pacific Islands',
				'-tu' => 'Turkey',
				'-tv' => 'Tuvalu',
				'txu' => 'Texas',
				'-tz' => 'Tanzania',
				'-ua' => 'Egypt',
				'-uc' => 'United States Misc. Caribbean Islands',
				'-ug' => 'Uganda',
				'-ui' => 'United Kingdom Misc. Islands',
				/*'uik' => 'United Kingdom Misc. Islands',*/
				'-uk' => 'United Kingdom',
				'-un' => 'Ukraine',
				/*'unr' => 'Ukraine',*/
				'-up' => 'United States Misc. Pacific Islands',
				'-ur' => 'Soviet Union',
				'-us' => 'United States',
				'utu' => 'Utah',
				'-uv' => 'Burkina Faso',
				'-uy' => 'Uruguay',
				'-uz' => 'Uzbekistan',
				'uzr' => 'Uzbek S.S.R.Code Sequence',
				'vau' => 'Virginia',
				'-vb' => 'British Virgin Islands',
				'-vc' => 'Vatican City',
				'-ve' => 'Venezuela',
				'-vi' => 'Virgin Islands of the United States',
				'-vm' => 'Vietnam',
				'-vn' => 'Vietnam, North',
				'-vp' => 'Various places',
				'-vs' => 'Vietnam, South',
				'vtu' => 'Vermont',
				'wau' => 'Washington (State)',
				'-wb' => 'West Berlin',
				'-wf' => 'Wallis and Futuna',
				'wiu' => 'Wisconsin',
				'-wj' => 'West Bank of the Jordan River',
				'-wk' => 'Wake Island',
				'wlk' => 'Wales',
				'-ws' => 'Samoa',
				'wvu' => 'West Virginia',
				'wyu' => 'Wyoming',
				'-xa' => 'Christmas Island (Indian Ocean)',
				'-xb' => 'Cocos (Keeling)Islands',
				'-xc' => 'Maldives',
				'-xd' => 'Saint Kitts-Nevis',
				'-xe' => 'Marshall Islands',
				'-xf' => 'Midway Islands',
				'-xh' => 'Niue',
				'-xi' => 'Saint Kitts-Nevis-Anguilla',
				'-xj' => 'Saint Helena',
				'-xk' => 'Saint Lucia',
				'-xl' => 'Saint Pierre and Miquelon',
				'-xm' => 'Saint Vincent and the Grenadines',
				'-xn' => 'Macedonia',
				'-xo' => 'Slovakia',
				'-xp' => 'Spratly Island',
				'-xr' => 'Czech Republic',
				'-xs' => 'South Georgia and the South Sandwich Islands',
				'-xv' => 'Slovenia',
				'xxx' => 'No place, unknown, or undetermined',
				/*'xxc' => 'Canada',
				'xxk' => 'United Kingdom',*/
				/*'xxr' => 'Soviet Union',*/
				/*'xxu' => 'United States',*/
				'-ye' => 'Yemen',
				'ykc' => 'Yukon Territory',
				'-ys' => 'Yemen (People’s Democratic Republic)',
				'-yu' => 'Serbia and Montenegro',
				'-za' => 'Zambia'
			), 'selected' => $c0081517
		)); ?>
		<script type="text/javascript">
			// Se ordena la lista.
			$("#008-15-17").append($("#008-15-17 option").remove().sort(function(a, b) {
			    var at = $(a).text(), bt = $(b).text();
			    return (at > bt)?1:((at < bt)?-1:0);
			}));
			$('#008-15-17').val('<?php echo $c0081517; ?>');
		</script>
		</td>
	</tr>
	<tr>
		<td><b>008 [18]</b></td>
		<td>Periodicidad.</td>
		<td><?php echo $this->Form->input('008-18', array('id' => '008-18', 'label' => false, 'class' => 'form-control', 'div' => false, 
			'options' => array(
				'#' => '# - Periodicidad no determinada',
				'a' => 'a - Anual',
				'b' => 'b - Bimestral',
				'c' => 'c - Bisemanal',
				'd' => 'd - Diaria',
				'e' => 'e - Bimensual',
				'f' => 'f - Semestral',
				'g' => 'g - Bienal',
				'h' => 'h - Trienal',
				'j' => 'j - Trimensual',
				'k' => 'k - Actualizado de forma continuada',
				'm' => 'm - Mensual',
				'q' => 'q - Trimestral',
				's' => 's - Quincenal',
				't' => 't - Cuatrimestral',
				'u' => 'u - Desconocido',
				'w' => 'w - Semanal',
				'z' => 'z - Otro',
				'|' => '| - No se utiliza'
			), 'selected' => $c00818
		)); ?></td>
	</tr>
	<tr>
		<td><b>008 [19]</b></td>
		<td>Regularidad.</td>
		<td><?php echo $this->Form->input('008-19', array('id' => '008-19', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'n' => 'n - Irregular normalizada',
				'r' => 'r - Regular',
				'u' => 'u - Desconocida',
				'x' => 'x - Completamente irregular',
				'|' => '| - No se utiliza'
			), 'selected' => $c00819
		)); ?></td>
	</tr>
	<tr>
		<td><b>008 [20]</b></td>
		<td>No definida.</td>
		<td><?php echo $this->Form->input('008-20', array('id' => '008-20', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'#' => '# - No definida'
			), 'selected' => $c00820
		)); ?></td>
	</tr>
	<tr>
		<td><b>008 [21]</b></td>
		<td>Tipo de recurso continuado.</td>
		<td><?php echo $this->Form->input('008-21', array('id' => '008-21', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'#' => '# - Ninguno de los siguientes',
				'd' => 'd - Base de datos actualizable',
				'l' => 'l - Hojas sueltas actualizables',
				'm' => 'm - Serie monográfica',
				'n' => 'n - Periódico',
				'p' => 'p - Revista',
				'w' => 'w - Sitio web actualizable',
				'|' => '| - No se utiliza'
			), 'selected' => $c00821
		)); ?></td>
	</tr>
	<tr>
		<td><b>008 [35-37]</b></td>
		<td>Lengua.</td>
		<td><?php echo $this->Form->input('008-35-37', array('id' => '008-35-37', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'aar' => 'Afar',
				'abk' => 'Abkhaz',
				'ace' => 'Achinese',
				'ach' => 'Acoli',
				'ada' => 'Adangme',
				'ady' => 'Adygei',
				'afa' => 'Afroasiatic (Other)',
				'afh' => 'Afrihili (Artificial language)',
				'afr' => 'Afrikaans',
				'ain' => 'Ainu',
				'ajm' => 'Aljamía',
				'aka' => 'Akan',
				'akk' => 'Akkadian',
				'alb' => 'Albanian',
				'ale' => 'Aleut',
				'alg' => 'Algonquian (Other)',
				'alt' => 'Altai',
				'amh' => 'Amharic',
				'ang' => 'English, Old (ca. 450-1100)',
				'anp' => 'Angika',
				'apa' => 'Apache languages',
				'ara' => 'Arabic',
				'arc' => 'Aramaic',
				'arg' => 'Aragonese Spanish',
				'arm' => 'Armenian',
				'arn' => 'Mapuche',
				'arp' => 'Arapaho',
				'art' => 'Artificial (Other)',
				'arw' => 'Arawak',
				'asm' => 'Assamese',
				'ast' => 'Bable',
				'ath' => 'Athapascan (Other)',
				'aus' => 'Australian languages',
				'ava' => 'Avaric',
				'ave' => 'Avestan',
				'awa' => 'Awadhi',
				'aym' => 'Aymara',
				'aze' => 'Azerbaijani',
				'bad' => 'Banda languages',
				'bai' => 'Bamileke languages',
				'bak' => 'Bashkir',
				'bal' => 'Baluchi',
				'bam' => 'Bambara',
				'ban' => 'Balinese',
				'baq' => 'Basque',
				'bas' => 'Basa',
				'bat' => 'Baltic (Other)',
				'bej' => 'Beja',
				'bel' => 'Belarusian',
				'bem' => 'Bemba',
				'ben' => 'Bengali',
				'ber' => 'Berber (Other)',
				'bho' => 'Bhojpuri',
				'bih' => 'Bihari',
				'bik' => 'Bikol',
				'bin' => 'Edo',
				'bis' => 'Bislama',
				'bla' => 'Siksika',
				'bnt' => 'Bantu (Other)',
				'bos' => 'Bosnian',
				'bra' => 'Braj',
				'bre' => 'Breton',
				'btk' => 'Batak',
				'bua' => 'Buriat',
				'bug' => 'Bugis',
				'bul' => 'Bulgarian',
				'bur' => 'Burmese',
				'byn' => 'Bilin',
				'cad' => 'Caddo',
				'cai' => 'Central American Indian (Other)',
				'cam' => 'Khmer',
				'car' => 'Carib',
				'cat' => 'Catalan',
				'cau' => 'Caucasian (Other)',
				'ceb' => 'Cebuano',
				'cel' => 'Celtic (Other)',
				'cha' => 'Chamorro',
				'chb' => 'Chibcha',
				'che' => 'Chechen',
				'chg' => 'Chagatai',
				'chi' => 'Chinese',
				'chk' => 'Chuukese',
				'chm' => 'Mari',
				'chn' => 'Chinook jargon',
				'cho' => 'Choctaw',
				'chp' => 'Chipewyan',
				'chr' => 'Cherokee',
				'chu' => 'Church Slavic',
				'chv' => 'Chuvash',
				'chy' => 'Cheyenne',
				'cmc' => 'Chamic languages',
				'cop' => 'Coptic',
				'cor' => 'Cornish',
				'cos' => 'Corsican',
				'cpe' => 'Creoles and Pidgins, French-based (Other)',
				'cpf' => 'Creoles and Pidgins, Portuguese-based (Other)',
				'cre' => 'Cree',
				'crh' => 'Crimean Tatar',
				'crp' => 'Creoles and Pidgins (Other)',
				'csb' => 'Kashubian',
				'cus' => 'Cushitic (Other)',
				'cze' => 'Czech',
				'dak' => 'Dakota',
				'dan' => 'Danish',
				'dar' => 'Dargwa',
				'day' => 'Dayak',
				'del' => 'Delaware',
				'den' => 'Slave',
				'dgr' => 'Dogrib',
				'din' => 'Dinka',
				'div' => 'Divehi',
				'doi' => 'Dogri',
				'dra' => 'Dravidian (Other)',
				'dsb' => 'Lower Sorbian',
				'dua' => 'Duala',
				'dum' => 'Dutch, Middle (ca. 1050-1350)',
				'dut' => 'Dutch',
				'dyu' => 'Dyula',
				'dzo' => 'Dzongkha',
				'efi' => 'Efik',
				'egy' => 'Egyptian',
				'eka' => 'Ekajuk',
				'elx' => 'Elamite',
				'eng' => 'English',
				'enm' => 'English, Middle (1100-1500)',
				'epo' => 'Esperanto',
				'esk' => 'Eskimo languages',
				'esp' => 'Esperanto',
				'est' => 'Estonian',
				'eth' => 'Ethiopic',
				'ewe' => 'Ewe',
				'ewo' => 'Ewondo',
				'fan' => 'Fang',
				'fao' => 'Faroese',
				'far' => 'Faroese',
				'fat' => 'Fanti',
				'fij' => 'Fijian',
				'fil' => 'Filipino',
				'fin' => 'Finnish',
				'fiu' => 'Finno-Ugrian (Other)',
				'fon' => 'Fon',
				'fre' => 'French',
				'fri' => 'Frisian',
				'frm' => 'French, Middle (ca. 1300-1600)',
				'fro' => 'French, Old (ca. 842-1300)',
				'frr' => 'North Frisian',
				'frs' => 'East Frisian',
				'fry' => 'Frisian',
				'ful' => 'Fula',
				'fur' => 'Friulian',
				'gaa' => 'Gã',
				'gae' => 'Scottish Gaelix',
				'gag' => 'Galician',
				'gal' => 'Oromo',
				'gay' => 'Gayo',
				'gba' => 'Gbaya',
				'gem' => 'Germanic (Other)',
				'geo' => 'Georgian',
				'ger' => 'German',
				'gez' => 'Ethiopic',
				'gil' => 'Gilbertese',
				'gla' => 'Scottish Gaelic',
				'gle' => 'Irish',
				'glg' => 'Galician',
				'glv' => 'Manx',
				'gmh' => 'German, Middle High (ca. 1050-1500)',
				'goh' => 'German, Old High (ca. 750-1050)',
				'gon' => 'Gondi',
				'gor' => 'Gorontalo',
				'got' => 'Gothic',
				'grb' => 'Grebo',
				'grc' => 'Greek, Ancient (to 1453)',
				'gre' => 'Greek, Modern (1453- )',
				'grn' => 'Guarani',
				'gsw' => 'Swiss German',
				'gua' => 'Guarani',
				'guj' => 'Gujarati',
				'gwi' => "Gwich'in",
				'hai' => 'Haida',
				'hat' => 'Haitian French Creole',
				'hau' => 'Hausa',
				'haw' => 'Hawaiian',
				'heb' => 'Hebrew',
				'her' => 'Herero',
				'hil' => 'Hiligaynon',
				'him' => 'Himachali',
				'hin' => 'Hindi',
				'hit' => 'Hittite',
				'hmn' => 'Hmong',
				'hmo' => 'Hiri Motu',
				'hsb' => 'Upper Sorbian',
				'hun' => 'Hungarian',
				'iba' => 'Iban',
				'ibo' => 'Igbo',
				'ice' => 'Icelandic',
				'ido' => 'Ido',
				'iii' => 'Sichuan Yi',
				'ijo' => 'Ijo',
				'iku' => 'Inuktitut',
				'ile' => 'Interlingue',
				'ilo' => 'Iloko',
				'inc' => 'Indic (Other)',
				'ind' => 'Indonesian',
				'ine' => 'Indo-European (Other)',
				'inh' => 'Ingush',
				'ipk' => 'Inupiaq',
				'ira' => 'Iranian (Other)',
				'iri' => 'Irish',
				'iro' => 'Iroquoian (Other)',
				'ita' => 'Italian',
				'jav' => 'Javanese',
				'jbo' => 'Lojban (Artificial language)',
				'jpn' => 'Japanese',
				'jpr' => 'Judeo-Persian',
				'jrb' => 'Judeo-Arabic',
				'kaa' => 'Kara-Kalpak',
				'kab' => 'Kabyle',
				'kac' => 'Kachin',
				'kal' => 'Kalâtdlisut',
				'kam' => 'Kamba',
				'kan' => 'Kannada',
				'kar' => 'Karen languages',
				'kas' => 'Kashmiri',
				'kau' => 'Kanuri',
				'kaw' => 'Kawi',
				'kaz' => 'Kazakh',
				'kbd' => 'Kabardian',
				'kha' => 'Khasi',
				'khi' => 'Khoisan (Other)',
				'khm' => 'Khmer',
				'kho' => 'Khotanese',
				'kik' => 'Kikuyu',
				'kin' => 'Kinyarwanda',
				'kir' => 'Kyrgyz',
				'kmb' => 'Kimbundu',
				'kok' => 'Konkani',
				'kom' => 'Komi',
				'kon' => 'Kongo',
				'kor' => 'Korean',
				'kos' => 'Kusaie',
				'kpe' => 'Kpelle',
				'krc' => 'Karachay-Balkar',
				'krl' => 'Karelian',
				'kro' => 'Kru (Other)',
				'kru' => 'Kurukh',
				'kua' => 'Kuanyama',
				'kum' => 'Kumyk',
				'kur' => 'Kurdish',
				'kus' => 'Kusaie',
				'kut' => 'Kootenai',
				'lad' => 'Ladino',
				'lah' => 'Lahndā',
				'lam' => 'Lamba (Zambia and Congo)',
				'lan' => 'Occitan (post 1500)',
				'lao' => 'Lao',
				'lap' => 'Sami',
				'lat' => 'Latin',
				'lav' => 'Latvian',
				'lez' => 'Lezgian',
				'lim' => 'Limburgish',
				'lin' => 'Lingala',
				'lit' => 'Lithuanian',
				'lol' => 'Mongo-Nkundu',
				'loz' => 'Lozi',
				'ltz' => 'Luxembourgish',
				'lua' => 'Luba-Lulua',
				'lub' => 'Luba-Katanga',
				'lug' => 'Ganda',
				'lui' => 'Luiseño',
				'lun' => 'Lunda',
				'luo' => 'Luo (Kenya and Tanzania)',
				'lus' => 'Lushai',
				'mac' => 'Macedonian',
				'mad' => 'Madurese',
				'mag' => 'Magahi',
				'mah' => 'Marshallese',
				'mai' => 'Maithili',
				'mak' => 'Makasar',
				'mal' => 'Malayalam',
				'man' => 'Mandingo',
				'mao' => 'Maori',
				'map' => 'Austronesian (Other)',
				'mar' => 'Marathi',
				'mas' => 'Masai',
				'max' => 'Manx',
				'may' => 'Malay',
				'mdf' => 'Moksha',
				'mdr' => 'Mandar',
				'men' => 'Mende',
				'mic' => 'Micmac',
				'min' => 'Minangkabau',
				'mis' => 'Miscellaneous languages',
				'mkh' => 'Mon-Khmer (Other)',
				'mla' => 'Malagasy',
				'mlg' => 'Malagasy',
				'mlt' => 'Maltese',
				'mnc' => 'Manchu',
				'mni' => 'Manipuri',
				'mno' => 'Manobo languages',
				'moh' => 'Mohawk',
				'mol' => 'Moldavian',
				'mon' => 'Mongolian',
				'mos' => 'Mooré',
				'mul' => 'Multiple languages',
				'mun' => 'Munda (Other)',
				'mus' => 'Creek',
				'mwl' => 'Mirandese',
				'mwr' => 'Marwari',
				'myn' => 'Mayan languages',
				'myv' => 'Erzya',
				'nah' => 'Nahuatl',
				'nai' => 'North American Indian (Other)',
				'nap' => 'Neapolitan Italian',
				'nau' => 'Nauru',
				'nav' => 'Navajo',
				'nbl' => 'Ndebele (South Africa)',
				'nde' => 'Ndebele (Zimbabwe)',
				'ndo' => 'Ndonga',
				'nds' => 'Low German',
				'nep' => 'Nepali',
				'new' => 'Newari',
				'nia' => 'Nias',
				'nic' => 'Niger-Kordofanian (Other)',
				'niu' => 'Niuean',
				'nno' => 'Norwegian (Nynorsk)',
				'nob' => 'Norwegian (Bokmål)',
				'nog' => 'Nogai',
				'non' => 'Old Norse',
				'nor' => 'Norwegian',
				'nqo' => "N'Ko",
				'nso' => 'Northern Sotho',
				'nub' => 'Nubian languages',
				'nwc' => 'Newari, Old',
				'nya' => 'Nyanja',
				'nym' => 'Nyamwezi',
				'nyn' => 'Nyankole',
				'nyo' => 'Nyoro',
				'nzi' => 'Nzima',
				'oci' => 'Occitan (post 1500)',
				'oji' => 'Ojibwa',
				'ori' => 'Oriya',
				'orm' => 'Oromo',
				'osa' => 'Osage',
				'oss' => 'Ossetic',
				'ota' => 'Turkish, Ottoman',
				'oto' => 'Otomian languages',
				'paa' => 'Papuan (Other)',
				'pag' => 'Pangasinan',
				'pal' => 'Pahlavi',
				'pam' => 'Pampanga',
				'pan' => 'Panjabi',
				'pap' => 'Papiamento',
				'pau' => 'Palauan',
				'peo' => 'Old Persian (ca. 600-400 B.C.)',
				'per' => 'Persian',
				'phi' => 'Philippine (Other)',
				'phn' => 'Phoenician',
				'pli' => 'Pali',
				'pol' => 'Polish',
				'pon' => 'Ponape',
				'por' => 'Portuguese',
				'pra' => 'Prakrit languages',
				'pro' => 'Provençal (to 1500)',
				'pus' => 'Pushto',
				'que' => 'Quechua',
				'raj' => 'Rajasthani',
				'rap' => 'Rapanui',
				'rar' => 'Rarotongan',
				'roa' => 'Romance (Other)',
				'roh' => 'Raeto-Romance',
				'rom' => 'Romani',
				'rum' => 'Romanian',
				'run' => 'Rundi',
				'rup' => 'Aromanian',
				'rus' => 'Russian',
				'sad' => 'Sandawe',
				'sag' => 'Sango (Ubangi Creole)',
				'sah' => 'Yakut',
				'sai' => 'South American Indian (Other)',
				'sal' => 'Salishan languages',
				'sam' => 'Samaritan Aramaic',
				'san' => 'Sanskrit',
				'sao' => 'Samoan',
				'sas' => 'Sasak',
				'sat' => 'Santali',
				'scc' => 'Serbian',
				'scn' => 'Sicilian Italian',
				'sco' => 'Scots',
				'scr' => 'Croatian',
				'sel' => 'Selkup',
				'sga' => 'Irish, Old (to 1100)',
				'sgn' => 'Sign languages',
				'shn' => 'Shan',
				'sho' => 'Shona',
				'sid' => 'Sidamo',
				'sin' => 'Sinhalese',
				'sio' => 'Siouan (Other)',
				'sit' => 'Sino-Tibetan (Other)',
				'sla' => 'Slavic (Other)',
				'slo' => 'Slovak',
				'slv' => 'Slovenian',
				'sma' => 'Southern Sami',
				'sme' => 'Northern Sami',
				'smi' => 'Sami',
				'smj' => 'Lule Sami',
				'smn' => 'Inari Sami',
				'smo' => 'Samoan',
				'sms' => 'Skolt Sami',
				'sna' => 'Shona',
				'snd' => 'Sindhi',
				'snh' => 'Sinhalese',
				'snk' => 'Soninke',
				'sog' => 'Sogdian',
				'som' => 'Somali',
				'son' => 'Songhai',
				'sot' => 'Sotho',
				'spa' => 'Spanish',
				'srd' => 'Sardinian',
				'srn' => 'Sranan',
				'srr' => 'Serer',
				'ssa' => 'Nilo-Saharan (Other)',
				'sso' => 'Sotho',
				'ssw' => 'Swazi',
				'suk' => 'Sukuma',
				'sun' => 'Sundanese',
				'sus' => 'Susu',
				'sux' => 'Sumerian',
				'swa' => 'Swahili',
				'swe' => 'Swedish',
				'swz' => 'Swazi',
				'syc' => 'Syriac',
				'syr' => 'Syriac, Modern',
				'tag' => 'Tagalog',
				'tah' => 'Tahitian',
				'tai' => 'Tai (Other)',
				'taj' => 'Tajik',
				'tam' => 'Tamil',
				'tar' => 'Tatar',
				'tat' => 'Tatar',
				'tel' => 'Telugu',
				'tem' => 'Temne',
				'ter' => 'Terena',
				'tet' => 'Tetum',
				'tgk' => 'Tajik',
				'tgl' => 'Tagalog',
				'tha' => 'Thai',
				'tib' => 'Tibetan',
				'tig' => 'Tigré',
				'tir' => 'Tigrinya',
				'tiv' => 'Tiv',
				'tkl' => 'Tokelauan',
				'tlh' => 'Klingon (Artificial language)',
				'tli' => 'Tlingit',
				'tmh' => 'Tamashek',
				'tog' => 'Tonga (Nyasa)',
				'ton' => 'Tongan',
				'tpi' => 'Tok Pisin',
				'tru' => 'Truk',
				'tsi' => 'Tsimshian',
				'tsn' => 'Tswana',
				'tso' => 'Tsonga',
				'tsw' => 'Tswana',
				'tuk' => 'Turkmen',
				'tum' => 'Tumbuka',
				'tup' => 'Tupi languages',
				'tur' => 'Turkish',
				'tut' => 'Altaic (Other)',
				'tvl' => 'Tuvaluan',
				'twi' => 'Twi',
				'tyv' => 'Tuvinian',
				'udm' => 'Udmurt',
				'uga' => 'Ugaritic',
				'uig' => 'Uighur',
				'ukr' => 'Ukrainian',
				'umb' => 'Umbundu',
				'und' => 'Undetermined',
				'urd' => 'Urdu',
				'uzb' => 'Uzbek',
				'vai' => 'Vai',
				'ven' => 'Venda',
				'vie' => 'Vietnamese',
				'vol' => 'Volapük',
				'vot' => 'Votic',
				'wak' => 'Wakashan languages',
				'wal' => 'Wolayta',
				'war' => 'Waray',
				'was' => 'Washo',
				'wel' => 'Welsh',
				'wen' => 'Sorbian (Other)',
				'wln' => 'Walloon',
				'wol' => 'Wolof',
				'xho' => 'Xhosa',
				'yao' => 'Yao (Africa)',
				'yap' => 'Yapese',
				'yid' => 'Yiddish',
				'yor' => 'Yoruba',
				'ypk' => 'Yupik languages',
				'zap' => 'Zapotec',
				'zbl' => 'Blissymbolics',
				'zen' => 'Zenaga',
				'zha' => 'Zhuang',
				'znd' => 'Zande languages',
				'zul' => 'Zulu',
				'zun' => 'Zuni',
				'zxx' => 'No linguistic content',
				'zza' => 'Zaza'
			), 'selected' => $c0083537
		)); ?>
		<script type="text/javascript">
			// Se ordena la lista.
			$("#008-35-37").append($("#008-35-37 option").remove().sort(function(a, b) {
			    var at = $(a).text(), bt = $(b).text();
			    return (at > bt)?1:((at < bt)?-1:0);
			}));
			$('#008-35-37').val('<?php echo $c0083537; ?>');
		</script>
		</td>
	</tr>
</table>

<?php $c028 = marc21_decode($item['Item']['028']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>028</b></th>
		<th style="width: 45%;"><b>Número de plancha.</b></th>
		<th style="width: 45%;">
			<label id="l-028"><?php echo $item['Item']['028']; ?></label>
			<?php echo $this->Form->hidden('028', array('id' => '028', 'label' => false, 'div' => false, 'value' => $item['Item']['028'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Número de plancha.</td>
		<td>
			<?php
			if (isset($c028['a'])) {
				echo $this->Form->input('028a', array('id' => '028a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c028['a']));
			} else {
				echo $this->Form->input('028a', array('id' => '028a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Fuente del número de plancha.</td>
		<td>
			<?php
			if (isset($c028['b'])) {
				echo $this->Form->input('028b', array('id' => '028b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c028['b']));
			} else {
				echo $this->Form->input('028b', array('id' => '028b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c040 = marc21_decode($item['Item']['040']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>040</b></th>
		<th style="width: 45%;"><b>Fuente de la catalogación.</b></th>
		<th style="width: 45%;">
			<label id="l-040"><?php echo $item['Item']['040']; ?></label>
			<?php echo $this->Form->hidden('040', array('id' => '040', 'label' => false, 'div' => false, 'value' => $item['Item']['040'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Centro catalogador de origen.</td>
		<td>
			<?php
			if (isset($c040['a'])) {
				echo $this->Form->input('040a', array('id' => '040a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c040['a']));
			} else {
				echo $this->Form->input('040a', array('id' => '040a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c041 = marc21_decode($item['Item']['041']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>041</b></th>
		<th style="width: 45%;"><b>Código de lengua.</b></th>
		<th style="width: 45%;">
			<label id="l-041"><?php echo $item['Item']['041']; ?></label>
			<?php echo $this->Form->hidden('041', array('id' => '041', 'label' => false, 'div' => false, 'value' => $item['Item']['041'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Indicación de traducción.</td>
		<td><?php echo $this->Form->input('041i1', array('id' => '041i1', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - El documento no es ni incluye una traducción',
				'1' => '1 - El documento es o incluye una traducción'
			), 'selected' => substr($c041['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Fuente del código.</td>
		<td><?php echo $this->Form->input('041i2', array('id' => '041i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - Código MARC de lengua',
					'7' => '7 - Fuente especificada en el subcampo $b'
			), 'selected' => substr($c041['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Código del idioma.</td>
		<td>
			<?php
				echo $this->Form->input('041a', array('id' => '041a', 'label' => false, 'class' => 'form-control', 'div' => false,
					'options' => array(
						'aar' => 'Afar',
						'abk' => 'Abkhaz',
						'ace' => 'Achinese',
						'ach' => 'Acoli',
						'ada' => 'Adangme',
						'ady' => 'Adygei',
						'afa' => 'Afroasiatic (Other)',
						'afh' => 'Afrihili (Artificial language)',
						'afr' => 'Afrikaans',
						'ain' => 'Ainu',
						'ajm' => 'Aljamía',
						'aka' => 'Akan',
						'akk' => 'Akkadian',
						'alb' => 'Albanian',
						'ale' => 'Aleut',
						'alg' => 'Algonquian (Other)',
						'alt' => 'Altai',
						'amh' => 'Amharic',
						'ang' => 'English, Old (ca. 450-1100)',
						'anp' => 'Angika',
						'apa' => 'Apache languages',
						'ara' => 'Arabic',
						'arc' => 'Aramaic',
						'arg' => 'Aragonese Spanish',
						'arm' => 'Armenian',
						'arn' => 'Mapuche',
						'arp' => 'Arapaho',
						'art' => 'Artificial (Other)',
						'arw' => 'Arawak',
						'asm' => 'Assamese',
						'ast' => 'Bable',
						'ath' => 'Athapascan (Other)',
						'aus' => 'Australian languages',
						'ava' => 'Avaric',
						'ave' => 'Avestan',
						'awa' => 'Awadhi',
						'aym' => 'Aymara',
						'aze' => 'Azerbaijani',
						'bad' => 'Banda languages',
						'bai' => 'Bamileke languages',
						'bak' => 'Bashkir',
						'bal' => 'Baluchi',
						'bam' => 'Bambara',
						'ban' => 'Balinese',
						'baq' => 'Basque',
						'bas' => 'Basa',
						'bat' => 'Baltic (Other)',
						'bej' => 'Beja',
						'bel' => 'Belarusian',
						'bem' => 'Bemba',
						'ben' => 'Bengali',
						'ber' => 'Berber (Other)',
						'bho' => 'Bhojpuri',
						'bih' => 'Bihari',
						'bik' => 'Bikol',
						'bin' => 'Edo',
						'bis' => 'Bislama',
						'bla' => 'Siksika',
						'bnt' => 'Bantu (Other)',
						'bos' => 'Bosnian',
						'bra' => 'Braj',
						'bre' => 'Breton',
						'btk' => 'Batak',
						'bua' => 'Buriat',
						'bug' => 'Bugis',
						'bul' => 'Bulgarian',
						'bur' => 'Burmese',
						'byn' => 'Bilin',
						'cad' => 'Caddo',
						'cai' => 'Central American Indian (Other)',
						'cam' => 'Khmer',
						'car' => 'Carib',
						'cat' => 'Catalan',
						'cau' => 'Caucasian (Other)',
						'ceb' => 'Cebuano',
						'cel' => 'Celtic (Other)',
						'cha' => 'Chamorro',
						'chb' => 'Chibcha',
						'che' => 'Chechen',
						'chg' => 'Chagatai',
						'chi' => 'Chinese',
						'chk' => 'Chuukese',
						'chm' => 'Mari',
						'chn' => 'Chinook jargon',
						'cho' => 'Choctaw',
						'chp' => 'Chipewyan',
						'chr' => 'Cherokee',
						'chu' => 'Church Slavic',
						'chv' => 'Chuvash',
						'chy' => 'Cheyenne',
						'cmc' => 'Chamic languages',
						'cop' => 'Coptic',
						'cor' => 'Cornish',
						'cos' => 'Corsican',
						'cpe' => 'Creoles and Pidgins, French-based (Other)',
						'cpf' => 'Creoles and Pidgins, Portuguese-based (Other)',
						'cre' => 'Cree',
						'crh' => 'Crimean Tatar',
						'crp' => 'Creoles and Pidgins (Other)',
						'csb' => 'Kashubian',
						'cus' => 'Cushitic (Other)',
						'cze' => 'Czech',
						'dak' => 'Dakota',
						'dan' => 'Danish',
						'dar' => 'Dargwa',
						'day' => 'Dayak',
						'del' => 'Delaware',
						'den' => 'Slave',
						'dgr' => 'Dogrib',
						'din' => 'Dinka',
						'div' => 'Divehi',
						'doi' => 'Dogri',
						'dra' => 'Dravidian (Other)',
						'dsb' => 'Lower Sorbian',
						'dua' => 'Duala',
						'dum' => 'Dutch, Middle (ca. 1050-1350)',
						'dut' => 'Dutch',
						'dyu' => 'Dyula',
						'dzo' => 'Dzongkha',
						'efi' => 'Efik',
						'egy' => 'Egyptian',
						'eka' => 'Ekajuk',
						'elx' => 'Elamite',
						'eng' => 'English',
						'enm' => 'English, Middle (1100-1500)',
						'epo' => 'Esperanto',
						'esk' => 'Eskimo languages',
						'esp' => 'Esperanto',
						'est' => 'Estonian',
						'eth' => 'Ethiopic',
						'ewe' => 'Ewe',
						'ewo' => 'Ewondo',
						'fan' => 'Fang',
						'fao' => 'Faroese',
						'far' => 'Faroese',
						'fat' => 'Fanti',
						'fij' => 'Fijian',
						'fil' => 'Filipino',
						'fin' => 'Finnish',
						'fiu' => 'Finno-Ugrian (Other)',
						'fon' => 'Fon',
						'fre' => 'French',
						'fri' => 'Frisian',
						'frm' => 'French, Middle (ca. 1300-1600)',
						'fro' => 'French, Old (ca. 842-1300)',
						'frr' => 'North Frisian',
						'frs' => 'East Frisian',
						'fry' => 'Frisian',
						'ful' => 'Fula',
						'fur' => 'Friulian',
						'gaa' => 'Gã',
						'gae' => 'Scottish Gaelix',
						'gag' => 'Galician',
						'gal' => 'Oromo',
						'gay' => 'Gayo',
						'gba' => 'Gbaya',
						'gem' => 'Germanic (Other)',
						'geo' => 'Georgian',
						'ger' => 'German',
						'gez' => 'Ethiopic',
						'gil' => 'Gilbertese',
						'gla' => 'Scottish Gaelic',
						'gle' => 'Irish',
						'glg' => 'Galician',
						'glv' => 'Manx',
						'gmh' => 'German, Middle High (ca. 1050-1500)',
						'goh' => 'German, Old High (ca. 750-1050)',
						'gon' => 'Gondi',
						'gor' => 'Gorontalo',
						'got' => 'Gothic',
						'grb' => 'Grebo',
						'grc' => 'Greek, Ancient (to 1453)',
						'gre' => 'Greek, Modern (1453- )',
						'grn' => 'Guarani',
						'gsw' => 'Swiss German',
						'gua' => 'Guarani',
						'guj' => 'Gujarati',
						'gwi' => "Gwich'in",
						'hai' => 'Haida',
						'hat' => 'Haitian French Creole',
						'hau' => 'Hausa',
						'haw' => 'Hawaiian',
						'heb' => 'Hebrew',
						'her' => 'Herero',
						'hil' => 'Hiligaynon',
						'him' => 'Himachali',
						'hin' => 'Hindi',
						'hit' => 'Hittite',
						'hmn' => 'Hmong',
						'hmo' => 'Hiri Motu',
						'hsb' => 'Upper Sorbian',
						'hun' => 'Hungarian',
						'iba' => 'Iban',
						'ibo' => 'Igbo',
						'ice' => 'Icelandic',
						'ido' => 'Ido',
						'iii' => 'Sichuan Yi',
						'ijo' => 'Ijo',
						'iku' => 'Inuktitut',
						'ile' => 'Interlingue',
						'ilo' => 'Iloko',
						'inc' => 'Indic (Other)',
						'ind' => 'Indonesian',
						'ine' => 'Indo-European (Other)',
						'inh' => 'Ingush',
						'ipk' => 'Inupiaq',
						'ira' => 'Iranian (Other)',
						'iri' => 'Irish',
						'iro' => 'Iroquoian (Other)',
						'ita' => 'Italian',
						'jav' => 'Javanese',
						'jbo' => 'Lojban (Artificial language)',
						'jpn' => 'Japanese',
						'jpr' => 'Judeo-Persian',
						'jrb' => 'Judeo-Arabic',
						'kaa' => 'Kara-Kalpak',
						'kab' => 'Kabyle',
						'kac' => 'Kachin',
						'kal' => 'Kalâtdlisut',
						'kam' => 'Kamba',
						'kan' => 'Kannada',
						'kar' => 'Karen languages',
						'kas' => 'Kashmiri',
						'kau' => 'Kanuri',
						'kaw' => 'Kawi',
						'kaz' => 'Kazakh',
						'kbd' => 'Kabardian',
						'kha' => 'Khasi',
						'khi' => 'Khoisan (Other)',
						'khm' => 'Khmer',
						'kho' => 'Khotanese',
						'kik' => 'Kikuyu',
						'kin' => 'Kinyarwanda',
						'kir' => 'Kyrgyz',
						'kmb' => 'Kimbundu',
						'kok' => 'Konkani',
						'kom' => 'Komi',
						'kon' => 'Kongo',
						'kor' => 'Korean',
						'kos' => 'Kusaie',
						'kpe' => 'Kpelle',
						'krc' => 'Karachay-Balkar',
						'krl' => 'Karelian',
						'kro' => 'Kru (Other)',
						'kru' => 'Kurukh',
						'kua' => 'Kuanyama',
						'kum' => 'Kumyk',
						'kur' => 'Kurdish',
						'kus' => 'Kusaie',
						'kut' => 'Kootenai',
						'lad' => 'Ladino',
						'lah' => 'Lahndā',
						'lam' => 'Lamba (Zambia and Congo)',
						'lan' => 'Occitan (post 1500)',
						'lao' => 'Lao',
						'lap' => 'Sami',
						'lat' => 'Latin',
						'lav' => 'Latvian',
						'lez' => 'Lezgian',
						'lim' => 'Limburgish',
						'lin' => 'Lingala',
						'lit' => 'Lithuanian',
						'lol' => 'Mongo-Nkundu',
						'loz' => 'Lozi',
						'ltz' => 'Luxembourgish',
						'lua' => 'Luba-Lulua',
						'lub' => 'Luba-Katanga',
						'lug' => 'Ganda',
						'lui' => 'Luiseño',
						'lun' => 'Lunda',
						'luo' => 'Luo (Kenya and Tanzania)',
						'lus' => 'Lushai',
						'mac' => 'Macedonian',
						'mad' => 'Madurese',
						'mag' => 'Magahi',
						'mah' => 'Marshallese',
						'mai' => 'Maithili',
						'mak' => 'Makasar',
						'mal' => 'Malayalam',
						'man' => 'Mandingo',
						'mao' => 'Maori',
						'map' => 'Austronesian (Other)',
						'mar' => 'Marathi',
						'mas' => 'Masai',
						'max' => 'Manx',
						'may' => 'Malay',
						'mdf' => 'Moksha',
						'mdr' => 'Mandar',
						'men' => 'Mende',
						'mic' => 'Micmac',
						'min' => 'Minangkabau',
						'mis' => 'Miscellaneous languages',
						'mkh' => 'Mon-Khmer (Other)',
						'mla' => 'Malagasy',
						'mlg' => 'Malagasy',
						'mlt' => 'Maltese',
						'mnc' => 'Manchu',
						'mni' => 'Manipuri',
						'mno' => 'Manobo languages',
						'moh' => 'Mohawk',
						'mol' => 'Moldavian',
						'mon' => 'Mongolian',
						'mos' => 'Mooré',
						'mul' => 'Multiple languages',
						'mun' => 'Munda (Other)',
						'mus' => 'Creek',
						'mwl' => 'Mirandese',
						'mwr' => 'Marwari',
						'myn' => 'Mayan languages',
						'myv' => 'Erzya',
						'nah' => 'Nahuatl',
						'nai' => 'North American Indian (Other)',
						'nap' => 'Neapolitan Italian',
						'nau' => 'Nauru',
						'nav' => 'Navajo',
						'nbl' => 'Ndebele (South Africa)',
						'nde' => 'Ndebele (Zimbabwe)',
						'ndo' => 'Ndonga',
						'nds' => 'Low German',
						'nep' => 'Nepali',
						'new' => 'Newari',
						'nia' => 'Nias',
						'nic' => 'Niger-Kordofanian (Other)',
						'niu' => 'Niuean',
						'nno' => 'Norwegian (Nynorsk)',
						'nob' => 'Norwegian (Bokmål)',
						'nog' => 'Nogai',
						'non' => 'Old Norse',
						'nor' => 'Norwegian',
						'nqo' => "N'Ko",
						'nso' => 'Northern Sotho',
						'nub' => 'Nubian languages',
						'nwc' => 'Newari, Old',
						'nya' => 'Nyanja',
						'nym' => 'Nyamwezi',
						'nyn' => 'Nyankole',
						'nyo' => 'Nyoro',
						'nzi' => 'Nzima',
						'oci' => 'Occitan (post 1500)',
						'oji' => 'Ojibwa',
						'ori' => 'Oriya',
						'orm' => 'Oromo',
						'osa' => 'Osage',
						'oss' => 'Ossetic',
						'ota' => 'Turkish, Ottoman',
						'oto' => 'Otomian languages',
						'paa' => 'Papuan (Other)',
						'pag' => 'Pangasinan',
						'pal' => 'Pahlavi',
						'pam' => 'Pampanga',
						'pan' => 'Panjabi',
						'pap' => 'Papiamento',
						'pau' => 'Palauan',
						'peo' => 'Old Persian (ca. 600-400 B.C.)',
						'per' => 'Persian',
						'phi' => 'Philippine (Other)',
						'phn' => 'Phoenician',
						'pli' => 'Pali',
						'pol' => 'Polish',
						'pon' => 'Ponape',
						'por' => 'Portuguese',
						'pra' => 'Prakrit languages',
						'pro' => 'Provençal (to 1500)',
						'pus' => 'Pushto',
						'que' => 'Quechua',
						'raj' => 'Rajasthani',
						'rap' => 'Rapanui',
						'rar' => 'Rarotongan',
						'roa' => 'Romance (Other)',
						'roh' => 'Raeto-Romance',
						'rom' => 'Romani',
						'rum' => 'Romanian',
						'run' => 'Rundi',
						'rup' => 'Aromanian',
						'rus' => 'Russian',
						'sad' => 'Sandawe',
						'sag' => 'Sango (Ubangi Creole)',
						'sah' => 'Yakut',
						'sai' => 'South American Indian (Other)',
						'sal' => 'Salishan languages',
						'sam' => 'Samaritan Aramaic',
						'san' => 'Sanskrit',
						'sao' => 'Samoan',
						'sas' => 'Sasak',
						'sat' => 'Santali',
						'scc' => 'Serbian',
						'scn' => 'Sicilian Italian',
						'sco' => 'Scots',
						'scr' => 'Croatian',
						'sel' => 'Selkup',
						'sga' => 'Irish, Old (to 1100)',
						'sgn' => 'Sign languages',
						'shn' => 'Shan',
						'sho' => 'Shona',
						'sid' => 'Sidamo',
						'sin' => 'Sinhalese',
						'sio' => 'Siouan (Other)',
						'sit' => 'Sino-Tibetan (Other)',
						'sla' => 'Slavic (Other)',
						'slo' => 'Slovak',
						'slv' => 'Slovenian',
						'sma' => 'Southern Sami',
						'sme' => 'Northern Sami',
						'smi' => 'Sami',
						'smj' => 'Lule Sami',
						'smn' => 'Inari Sami',
						'smo' => 'Samoan',
						'sms' => 'Skolt Sami',
						'sna' => 'Shona',
						'snd' => 'Sindhi',
						'snh' => 'Sinhalese',
						'snk' => 'Soninke',
						'sog' => 'Sogdian',
						'som' => 'Somali',
						'son' => 'Songhai',
						'sot' => 'Sotho',
						'spa' => 'Spanish',
						'srd' => 'Sardinian',
						'srn' => 'Sranan',
						'srr' => 'Serer',
						'ssa' => 'Nilo-Saharan (Other)',
						'sso' => 'Sotho',
						'ssw' => 'Swazi',
						'suk' => 'Sukuma',
						'sun' => 'Sundanese',
						'sus' => 'Susu',
						'sux' => 'Sumerian',
						'swa' => 'Swahili',
						'swe' => 'Swedish',
						'swz' => 'Swazi',
						'syc' => 'Syriac',
						'syr' => 'Syriac, Modern',
						'tag' => 'Tagalog',
						'tah' => 'Tahitian',
						'tai' => 'Tai (Other)',
						'taj' => 'Tajik',
						'tam' => 'Tamil',
						'tar' => 'Tatar',
						'tat' => 'Tatar',
						'tel' => 'Telugu',
						'tem' => 'Temne',
						'ter' => 'Terena',
						'tet' => 'Tetum',
						'tgk' => 'Tajik',
						'tgl' => 'Tagalog',
						'tha' => 'Thai',
						'tib' => 'Tibetan',
						'tig' => 'Tigré',
						'tir' => 'Tigrinya',
						'tiv' => 'Tiv',
						'tkl' => 'Tokelauan',
						'tlh' => 'Klingon (Artificial language)',
						'tli' => 'Tlingit',
						'tmh' => 'Tamashek',
						'tog' => 'Tonga (Nyasa)',
						'ton' => 'Tongan',
						'tpi' => 'Tok Pisin',
						'tru' => 'Truk',
						'tsi' => 'Tsimshian',
						'tsn' => 'Tswana',
						'tso' => 'Tsonga',
						'tsw' => 'Tswana',
						'tuk' => 'Turkmen',
						'tum' => 'Tumbuka',
						'tup' => 'Tupi languages',
						'tur' => 'Turkish',
						'tut' => 'Altaic (Other)',
						'tvl' => 'Tuvaluan',
						'twi' => 'Twi',
						'tyv' => 'Tuvinian',
						'udm' => 'Udmurt',
						'uga' => 'Ugaritic',
						'uig' => 'Uighur',
						'ukr' => 'Ukrainian',
						'umb' => 'Umbundu',
						'und' => 'Undetermined',
						'urd' => 'Urdu',
						'uzb' => 'Uzbek',
						'vai' => 'Vai',
						'ven' => 'Venda',
						'vie' => 'Vietnamese',
						'vol' => 'Volapük',
						'vot' => 'Votic',
						'wak' => 'Wakashan languages',
						'wal' => 'Wolayta',
						'war' => 'Waray',
						'was' => 'Washo',
						'wel' => 'Welsh',
						'wen' => 'Sorbian (Other)',
						'wln' => 'Walloon',
						'wol' => 'Wolof',
						'xho' => 'Xhosa',
						'yao' => 'Yao (Africa)',
						'yap' => 'Yapese',
						'yid' => 'Yiddish',
						'yor' => 'Yoruba',
						'ypk' => 'Yupik languages',
						'zap' => 'Zapotec',
						'zbl' => 'Blissymbolics',
						'zen' => 'Zenaga',
						'zha' => 'Zhuang',
						'znd' => 'Zande languages',
						'zul' => 'Zulu',
						'zun' => 'Zuni',
						'zxx' => 'No linguistic content',
						'zza' => 'Zaza'
					), 'selected' => $c041['a']
				));
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Código de idioma del sumario o resumen.</td>
		<td>
			<?php
			if (isset($c041['b'])) {
				echo $this->Form->input('041b', array('id' => '041b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c041['b']));
			} else {
				echo $this->Form->input('041b', array('id' => '041b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$h</b></td>
		<td>Código de idioma original.</td>
		<td>
			<?php
			if (isset($c041['h'])) {
				echo $this->Form->input('041h', array('id' => '041h', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c041['h']));
			} else {
				echo $this->Form->input('041h', array('id' => '041h', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c044 = marc21_decode($item['Item']['044']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>044</b></th>
		<th style="width: 45%;"><b>Código del país de la entidad editora/productora.</b></th>
		<th style="width: 45%;">
			<label id="l-044"><?php echo $item['Item']['044']; ?></label>
			<?php echo $this->Form->hidden('044', array('id' => '044', 'label' => false, 'div' => false, 'value' => $item['Item']['044'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Código MARC del país.</td>
		<td>
			<?php
			if (isset($c044['a'])) {
				echo $this->Form->input('044a', array('id' => '044a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c044['a'], 'div' => false,
			'options' => array(
				'-aa' => 'Albania',
				'abc' => 'Alberta',
				'-ac' => 'Ashmore and Cartier Islands',
				'-ae' => 'Algeria',
				'-af' => 'Afghanistan',
				'-ag' => 'Argentina',
				'-ai' => 'Anguilla',
				'-ai' => 'Armenia (Republic)',
				'air' => 'Armenian S.S.R.',
				'-aj' => 'Azerbaijan',
				'ajr' => 'Azerbaijan S.S.R.',
				'aku' => 'Alaska',
				'alu' => 'Alabama',
				'-am' => 'Anguilla',
				'-an' => 'Andorra',
				'-ao' => 'Angola',
				'-aq' => 'Antigua and Barbuda',
				'aru' => 'Arkansas',
				'-as' => 'American Samoa',
				'-at' => 'Australia',
				'-au' => 'Austria',
				'-aw' => 'Aruba',
				'-ay' => 'Antarctica',
				'azu' => 'Arizona',
				'-ba' => 'Bahrain',
				'-bb' => 'Barbados',
				'bcc' => 'British Columbia',
				'-bd' => 'Burundi',
				'-be' => 'Belgium',
				'-bf' => 'Bahamas',
				'-bg' => 'Bangladesh',
				'-bh' => 'Belize',
				'-bi' => 'British Indian Ocean Territory',
				'-bl' => 'Brazil',
				'-bm' => 'Bermuda Islands',
				'-bn' => 'Bosnia and Hercegovina',
				'-bo' => 'Bolivia',
				'-bp' => 'Solomon Islands',
				'-br' => 'Burma',
				'-bs' => 'Botswana',
				'-bt' => 'Bhutan',
				'-bu' => 'Bulgaria',
				'-bv' => 'Bouvet Island',
				'-bw' => 'Belarus',
				'bwr' => 'Byelorussian S.S.R.',
				'-bx' => 'Brunei',
				'cau' => 'California',
				'-cb' => 'Cambodia',
				'-cc' => 'China',
				'-cd' => 'Chad',
				'-ce' => 'Sri Lanka',
				'-cf' => 'Congo (Brazzaville)',
				'-cg' => 'Congo (Democratic Republic)',
				'-ch' => 'China (Republic : 1949- )',
				'-ci' => 'Croatia',
				'-cj' => 'Cayman Islands',
				'-ck' => 'Colombia',
				'-cl' => 'Chile',
				'-cm' => 'Cameroon',
				'-cn' => 'Canada',
				'cou' => 'Colorado',
				'-cp' => 'Canton and Enderbury Islands',
				'-cq' => 'Comoros',
				'-cr' => 'Costa Rica',
				'-cs' => 'Czechoslovakia',
				'ctu' => 'Connecticut',
				'-cu' => 'Cuba',
				'-cv' => 'Cape Verde',
				'-cw' => 'Cook Islands',
				'-cx' => 'Central African Republic',
				'-cy' => 'Cyprus',
				'-cz' => 'Canal Zone',
				'dcu' => 'District of Columbia',
				'deu' => 'Delaware',
				'-dk' => 'Denmark',
				'-dm' => 'Benin',
				'-dq' => 'Dominica',
				'-dr' => 'Dominican Republic',
				'-ea' => 'Eritrea',
				'-ec' => 'Ecuador',
				'-eg' => 'Equatorial Guinea',
				'-em' => 'East Timor',
				'enk' => 'England',
				'-er' => 'Estonia',
				/*'err' => 'Estonia',*/
				'-es' => 'El Salvador',
				'-et' => 'Ethiopia',
				'-fa' => 'Faroe Islands',
				'-fg' => 'French Guiana',
				'-fi' => 'Finland',
				'-fj' => 'Fiji',
				'-fk' => 'Falkland Islands',
				'flu' => 'Florida',
				'-fm' => 'Micronesia (Federated States)',
				'-fp' => 'French Polynesia',
				'-fr' => 'France',
				'-fs' => 'Terres australes et antarctiques françaises',
				'-ft' => 'Djibouti',
				'gau' => 'GeorgiaCode Sequence',
				'-gb' => 'Kiribati',
				'-gd' => 'Grenada',
				'-ge' => 'Germany (East)',
				'-gh' => 'Ghana',
				'-gi' => 'Gibraltar',
				'-gl' => 'Greenland',
				'-gm' => 'Gambia',
				'-gn' => 'Gilbert and Ellice Islands',
				'-go' => 'Gabon',
				'-gp' => 'Guadeloupe',
				'-gr' => 'Greece',
				'-gs' => 'Georgia (Republic)',
				'gsr' => 'Georgian S.S.R.',
				'-gt' => 'Guatemala',
				'-gu' => 'Guam',
				'-gv' => 'Guinea',
				'-gw' => 'Germany',
				'-gy' => 'Guyana',
				'-gz' => 'Gaza Strip',
				'hiu' => 'Hawaii',
				'-hk' => 'Hong Kong',
				'-hm' => 'Heard and McDonald Islands',
				'-ho' => 'Honduras',
				'-ht' => 'Haiti',
				'-hu' => 'Hungary',
				'iau' => 'Iowa',
				'-ic' => 'Iceland',
				'idu' => 'Idaho',
				'-ie' => 'Ireland',
				'-ii' => 'India',
				'ilu' => 'Illinois',
				'inu' => 'Indiana',
				'-io' => 'Indonesia',
				'-iq' => 'Iraq',
				'-ir' => 'Iran',
				'-is' => 'Israel',
				'-it' => 'Italy',
				'-iu' => 'Israel-Syria Demilitarized Zones',
				'-iv' => "Côte d’Ivoire",
				'-iw' => 'Israel-Jordan Demilitarized Zones',
				'-iy' => 'Iraq-Saudi Arabia Neutral Zone',
				'-ja' => 'Japan',
				'-ji' => 'Johnston Atoll',
				'-jm' => 'Jamaica',
				'-jn' => 'Jan Mayen',
				'-jo' => 'Jordan',
				'-ke' => 'Kenya',
				'-kg' => 'Kyrgyzstan',
				'kgr' => 'Kirghiz S.S.R.',
				'-kn' => 'Korea (North)',
				'-ko' => 'Korea (South)',
				'ksu' => 'Kansas',
				'-ku' => 'Kuwait',
				'kyu' => 'Kentucky',
				'-kz' => 'Kazakhstan',
				'kzr' => 'Kazakh S.S.R.',
				'lau' => 'Louisiana',
				'-lb' => 'Liberia',
				'-le' => 'Lebanon',
				'-lh' => 'Liechtenstein',
				'-li' => 'Lithuania',
				/*'lir' => 'Lithuania',*/
				'-ln' => 'Central and Southern Line Islands',
				'-lo' => 'Lesotho',
				'-ls' => 'Laos',
				'-lu' => 'Luxembourg',
				'-lv' => 'Latvia',
				/*'lvr' => 'Latvia',*/
				'-ly' => 'Libya',
				'mau' => 'Massachusetts',
				'mbc' => 'Manitoba',
				'-mc' => 'Monaco',
				'mdu' => 'Maryland',
				'meu' => 'Maine',
				'-mf' => 'Mauritius',
				'-mg' => 'Madagascar',
				'-mh' => 'Macao',
				'miu' => 'Michigan',
				'-mj' => 'Montserrat',
				'-mk' => 'Oman',
				'-ml' => 'Mali',
				'-mm' => 'Malta',
				'mnu' => 'Minnesota',
				'mou' => 'Missouri',
				'-mp' => 'Mongolia',
				'-mq' => 'Martinique',
				'-mr' => 'Morocco',
				'msu' => 'Mississippi',
				'mtu' => 'Montana',
				'-mu' => 'Mauritania',
				'-mv' => 'Moldova',
				'mvr' => 'Moldavian S.S.R.',
				'-mw' => 'Malawi',
				'-mx' => 'Mexico',
				'-my' => 'Malaysia',
				'-mz' => 'Mozambique',
				'-na' => 'Netherlands Antilles',
				'nbu' => 'Nebraska',
				'ncu' => 'North Carolina',
				'ndu' => 'North Dakota',
				'-ne' => 'Netherlands',
				'nfc' => 'Newfoundland and Labrador',
				'-ng' => 'Niger',
				'nhu' => 'New Hampshire',
				'nik' => 'Northern Ireland',
				'nju' => 'New Jersey',
				'nkc' => 'New Brunswick',
				'-nl' => 'New CaledoniaCode Sequence',
				'-nm' => 'Northern Mariana Islands',
				'nmu' => 'New Mexico',
				'-nn' => 'Vanuatu',
				'-no' => 'Norway',
				'-np' => 'Nepal',
				'-nq' => 'Nicaragua',
				'-nr' => 'Nigeria',
				'nsc' => 'Nova Scotia',
				'ntc' => 'Northwest Territories',
				'-nu' => 'Nauru',
				'nuc' => 'Nunavut',
				'nvu' => 'Nevada',
				'-nx' => 'Norfolk Island',
				'nyu' => 'New York (State)',
				'-nz' => 'New Zealand',
				'ohu' => 'Ohio',
				'oku' => 'Oklahoma',
				'onc' => 'Ontario',
				'oru' => 'Oregon',
				'-ot' => 'Mayotte',
				'pau' => 'Pennsylvania',
				'-pc' => 'Pitcairn Island',
				'-pe' => 'Peru',
				'-pf' => 'Paracel Islands',
				'-pg' => 'Guinea-Bissau',
				'-ph' => 'Philippines',
				'pic' => 'Prince Edward Island',
				'-pk' => 'Pakistan',
				'-pl' => 'Poland',
				'-pn' => 'Panama',
				'-po' => 'Portugal',
				'-pp' => 'Papua New Guinea',
				'-pr' => 'Puerto Rico',
				'-pt' => 'Portuguese Timor',
				'-pw' => 'Palau',
				'-py' => 'Paraguay',
				'-qa' => 'Qatar',
				'quc' => 'Québec (Province)',
				'-re' => 'Réunion',
				'-rh' => 'Zimbabwe',
				'riu' => 'Rhode Island',
				'-rm' => 'Romania',
				'-ru' => 'Russia (Federation)',
				'rur' => 'Russian S.F.S.R.',
				'-rw' => 'Rwanda',
				'-ry' => 'Ryukyu Islands, Southern',
				'-sa' => 'South Africa',
				'-sb' => 'Svalbard',
				'scu' => 'South Carolina',
				'sdu' => 'South Dakota',
				'-se' => 'Seychelles',
				'-sf' => 'Sao Tome and Principe',
				'-sg' => 'Senegal',
				'-sh' => 'Spanish North Africa',
				'-si' => 'Singapore',
				'-sj' => 'Sudan',
				'-sk' => 'Sikkim',
				'-sl' => 'Sierra Leone',
				'-sm' => 'San Marino',
				'snc' => 'Saskatchewan',
				'-so' => 'Somalia',
				'-sp' => 'Spain',
				'-sq' => 'Swaziland',
				'-sr' => 'Surinam',
				'-ss' => 'Western Sahara',
				'stk' => 'Scotland',
				'-su' => 'Saudi Arabia',
				'-sv' => 'Swan Islands',
				'-sw' => 'Sweden',
				'-sx' => 'Namibia',
				'-sy' => 'Syria',
				'-sz' => 'Switzerland',
				'-ta' => 'Tajikistan',
				'tar' => 'Tajik S.S.R.',
				'-tc' => 'Turks and Caicos Islands',
				'-tg' => 'Togo',
				'-th' => 'Thailand',
				'-ti' => 'Tunisia',
				'-tk' => 'Turkmenistan',
				'tkr' => 'Turkmen S.S.R.',
				'-tl' => 'Tokelau',
				'tnu' => 'Tennessee',
				'-to' => 'Tonga',
				'-tr' => 'Trinidad and Tobago',
				'-ts' => 'United Arab Emirates',
				'-tt' => 'Trust Territory of the Pacific Islands',
				'-tu' => 'Turkey',
				'-tv' => 'Tuvalu',
				'txu' => 'Texas',
				'-tz' => 'Tanzania',
				'-ua' => 'Egypt',
				'-uc' => 'United States Misc. Caribbean Islands',
				'-ug' => 'Uganda',
				'-ui' => 'United Kingdom Misc. Islands',
				/*'uik' => 'United Kingdom Misc. Islands',*/
				'-uk' => 'United Kingdom',
				'-un' => 'Ukraine',
				/*'unr' => 'Ukraine',*/
				'-up' => 'United States Misc. Pacific Islands',
				'-ur' => 'Soviet Union',
				'-us' => 'United States',
				'utu' => 'Utah',
				'-uv' => 'Burkina Faso',
				'-uy' => 'Uruguay',
				'-uz' => 'Uzbekistan',
				'uzr' => 'Uzbek S.S.R.Code Sequence',
				'vau' => 'Virginia',
				'-vb' => 'British Virgin Islands',
				'-vc' => 'Vatican City',
				'-ve' => 'Venezuela',
				'-vi' => 'Virgin Islands of the United States',
				'-vm' => 'Vietnam',
				'-vn' => 'Vietnam, North',
				'-vp' => 'Various places',
				'-vs' => 'Vietnam, South',
				'vtu' => 'Vermont',
				'wau' => 'Washington (State)',
				'-wb' => 'West Berlin',
				'-wf' => 'Wallis and Futuna',
				'wiu' => 'Wisconsin',
				'-wj' => 'West Bank of the Jordan River',
				'-wk' => 'Wake Island',
				'wlk' => 'Wales',
				'-ws' => 'Samoa',
				'wvu' => 'West Virginia',
				'wyu' => 'Wyoming',
				'-xa' => 'Christmas Island (Indian Ocean)',
				'-xb' => 'Cocos (Keeling)Islands',
				'-xc' => 'Maldives',
				'-xd' => 'Saint Kitts-Nevis',
				'-xe' => 'Marshall Islands',
				'-xf' => 'Midway Islands',
				'-xh' => 'Niue',
				'-xi' => 'Saint Kitts-Nevis-Anguilla',
				'-xj' => 'Saint Helena',
				'-xk' => 'Saint Lucia',
				'-xl' => 'Saint Pierre and Miquelon',
				'-xm' => 'Saint Vincent and the Grenadines',
				'-xn' => 'Macedonia',
				'-xo' => 'Slovakia',
				'-xp' => 'Spratly Island',
				'-xr' => 'Czech Republic',
				'-xs' => 'South Georgia and the South Sandwich Islands',
				'-xv' => 'Slovenia',
				'xxx' => 'No place, unknown, or undetermined',
				/*'xxc' => 'Canada',
				'xxk' => 'United Kingdom',*/
				/*'xxr' => 'Soviet Union',*/
				/*'xxu' => 'United States',*/
				'-ye' => 'Yemen',
				'ykc' => 'Yukon Territory',
				'-ys' => 'Yemen (People’s Democratic Republic)',
				'-yu' => 'Serbia and Montenegro',
				'-za' => 'Zambia'
			), 'default' => $c044['a']
			));
			} else {
				echo $this->Form->input('044a', array('id' => '044a', 'label' => false, 'div' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'-aa' => 'Albania',
				'abc' => 'Alberta',
				'-ac' => 'Ashmore and Cartier Islands',
				'-ae' => 'Algeria',
				'-af' => 'Afghanistan',
				'-ag' => 'Argentina',
				'-ai' => 'Anguilla',
				'-ai' => 'Armenia (Republic)',
				'air' => 'Armenian S.S.R.',
				'-aj' => 'Azerbaijan',
				'ajr' => 'Azerbaijan S.S.R.',
				'aku' => 'Alaska',
				'alu' => 'Alabama',
				'-am' => 'Anguilla',
				'-an' => 'Andorra',
				'-ao' => 'Angola',
				'-aq' => 'Antigua and Barbuda',
				'aru' => 'Arkansas',
				'-as' => 'American Samoa',
				'-at' => 'Australia',
				'-au' => 'Austria',
				'-aw' => 'Aruba',
				'-ay' => 'Antarctica',
				'azu' => 'Arizona',
				'-ba' => 'Bahrain',
				'-bb' => 'Barbados',
				'bcc' => 'British Columbia',
				'-bd' => 'Burundi',
				'-be' => 'Belgium',
				'-bf' => 'Bahamas',
				'-bg' => 'Bangladesh',
				'-bh' => 'Belize',
				'-bi' => 'British Indian Ocean Territory',
				'-bl' => 'Brazil',
				'-bm' => 'Bermuda Islands',
				'-bn' => 'Bosnia and Hercegovina',
				'-bo' => 'Bolivia',
				'-bp' => 'Solomon Islands',
				'-br' => 'Burma',
				'-bs' => 'Botswana',
				'-bt' => 'Bhutan',
				'-bu' => 'Bulgaria',
				'-bv' => 'Bouvet Island',
				'-bw' => 'Belarus',
				'bwr' => 'Byelorussian S.S.R.',
				'-bx' => 'Brunei',
				'cau' => 'California',
				'-cb' => 'Cambodia',
				'-cc' => 'China',
				'-cd' => 'Chad',
				'-ce' => 'Sri Lanka',
				'-cf' => 'Congo (Brazzaville)',
				'-cg' => 'Congo (Democratic Republic)',
				'-ch' => 'China (Republic : 1949- )',
				'-ci' => 'Croatia',
				'-cj' => 'Cayman Islands',
				'-ck' => 'Colombia',
				'-cl' => 'Chile',
				'-cm' => 'Cameroon',
				'-cn' => 'Canada',
				'cou' => 'Colorado',
				'-cp' => 'Canton and Enderbury Islands',
				'-cq' => 'Comoros',
				'-cr' => 'Costa Rica',
				'-cs' => 'Czechoslovakia',
				'ctu' => 'Connecticut',
				'-cu' => 'Cuba',
				'-cv' => 'Cape Verde',
				'-cw' => 'Cook Islands',
				'-cx' => 'Central African Republic',
				'-cy' => 'Cyprus',
				'-cz' => 'Canal Zone',
				'dcu' => 'District of Columbia',
				'deu' => 'Delaware',
				'-dk' => 'Denmark',
				'-dm' => 'Benin',
				'-dq' => 'Dominica',
				'-dr' => 'Dominican Republic',
				'-ea' => 'Eritrea',
				'-ec' => 'Ecuador',
				'-eg' => 'Equatorial Guinea',
				'-em' => 'East Timor',
				'enk' => 'England',
				'-er' => 'Estonia',
				/*'err' => 'Estonia',*/
				'-es' => 'El Salvador',
				'-et' => 'Ethiopia',
				'-fa' => 'Faroe Islands',
				'-fg' => 'French Guiana',
				'-fi' => 'Finland',
				'-fj' => 'Fiji',
				'-fk' => 'Falkland Islands',
				'flu' => 'Florida',
				'-fm' => 'Micronesia (Federated States)',
				'-fp' => 'French Polynesia',
				'-fr' => 'France',
				'-fs' => 'Terres australes et antarctiques françaises',
				'-ft' => 'Djibouti',
				'gau' => 'GeorgiaCode Sequence',
				'-gb' => 'Kiribati',
				'-gd' => 'Grenada',
				'-ge' => 'Germany (East)',
				'-gh' => 'Ghana',
				'-gi' => 'Gibraltar',
				'-gl' => 'Greenland',
				'-gm' => 'Gambia',
				'-gn' => 'Gilbert and Ellice Islands',
				'-go' => 'Gabon',
				'-gp' => 'Guadeloupe',
				'-gr' => 'Greece',
				'-gs' => 'Georgia (Republic)',
				'gsr' => 'Georgian S.S.R.',
				'-gt' => 'Guatemala',
				'-gu' => 'Guam',
				'-gv' => 'Guinea',
				'-gw' => 'Germany',
				'-gy' => 'Guyana',
				'-gz' => 'Gaza Strip',
				'hiu' => 'Hawaii',
				'-hk' => 'Hong Kong',
				'-hm' => 'Heard and McDonald Islands',
				'-ho' => 'Honduras',
				'-ht' => 'Haiti',
				'-hu' => 'Hungary',
				'iau' => 'Iowa',
				'-ic' => 'Iceland',
				'idu' => 'Idaho',
				'-ie' => 'Ireland',
				'-ii' => 'India',
				'ilu' => 'Illinois',
				'inu' => 'Indiana',
				'-io' => 'Indonesia',
				'-iq' => 'Iraq',
				'-ir' => 'Iran',
				'-is' => 'Israel',
				'-it' => 'Italy',
				'-iu' => 'Israel-Syria Demilitarized Zones',
				'-iv' => "Côte d’Ivoire",
				'-iw' => 'Israel-Jordan Demilitarized Zones',
				'-iy' => 'Iraq-Saudi Arabia Neutral Zone',
				'-ja' => 'Japan',
				'-ji' => 'Johnston Atoll',
				'-jm' => 'Jamaica',
				'-jn' => 'Jan Mayen',
				'-jo' => 'Jordan',
				'-ke' => 'Kenya',
				'-kg' => 'Kyrgyzstan',
				'kgr' => 'Kirghiz S.S.R.',
				'-kn' => 'Korea (North)',
				'-ko' => 'Korea (South)',
				'ksu' => 'Kansas',
				'-ku' => 'Kuwait',
				'kyu' => 'Kentucky',
				'-kz' => 'Kazakhstan',
				'kzr' => 'Kazakh S.S.R.',
				'lau' => 'Louisiana',
				'-lb' => 'Liberia',
				'-le' => 'Lebanon',
				'-lh' => 'Liechtenstein',
				'-li' => 'Lithuania',
				/*'lir' => 'Lithuania',*/
				'-ln' => 'Central and Southern Line Islands',
				'-lo' => 'Lesotho',
				'-ls' => 'Laos',
				'-lu' => 'Luxembourg',
				'-lv' => 'Latvia',
				/*'lvr' => 'Latvia',*/
				'-ly' => 'Libya',
				'mau' => 'Massachusetts',
				'mbc' => 'Manitoba',
				'-mc' => 'Monaco',
				'mdu' => 'Maryland',
				'meu' => 'Maine',
				'-mf' => 'Mauritius',
				'-mg' => 'Madagascar',
				'-mh' => 'Macao',
				'miu' => 'Michigan',
				'-mj' => 'Montserrat',
				'-mk' => 'Oman',
				'-ml' => 'Mali',
				'-mm' => 'Malta',
				'mnu' => 'Minnesota',
				'mou' => 'Missouri',
				'-mp' => 'Mongolia',
				'-mq' => 'Martinique',
				'-mr' => 'Morocco',
				'msu' => 'Mississippi',
				'mtu' => 'Montana',
				'-mu' => 'Mauritania',
				'-mv' => 'Moldova',
				'mvr' => 'Moldavian S.S.R.',
				'-mw' => 'Malawi',
				'-mx' => 'Mexico',
				'-my' => 'Malaysia',
				'-mz' => 'Mozambique',
				'-na' => 'Netherlands Antilles',
				'nbu' => 'Nebraska',
				'ncu' => 'North Carolina',
				'ndu' => 'North Dakota',
				'-ne' => 'Netherlands',
				'nfc' => 'Newfoundland and Labrador',
				'-ng' => 'Niger',
				'nhu' => 'New Hampshire',
				'nik' => 'Northern Ireland',
				'nju' => 'New Jersey',
				'nkc' => 'New Brunswick',
				'-nl' => 'New CaledoniaCode Sequence',
				'-nm' => 'Northern Mariana Islands',
				'nmu' => 'New Mexico',
				'-nn' => 'Vanuatu',
				'-no' => 'Norway',
				'-np' => 'Nepal',
				'-nq' => 'Nicaragua',
				'-nr' => 'Nigeria',
				'nsc' => 'Nova Scotia',
				'ntc' => 'Northwest Territories',
				'-nu' => 'Nauru',
				'nuc' => 'Nunavut',
				'nvu' => 'Nevada',
				'-nx' => 'Norfolk Island',
				'nyu' => 'New York (State)',
				'-nz' => 'New Zealand',
				'ohu' => 'Ohio',
				'oku' => 'Oklahoma',
				'onc' => 'Ontario',
				'oru' => 'Oregon',
				'-ot' => 'Mayotte',
				'pau' => 'Pennsylvania',
				'-pc' => 'Pitcairn Island',
				'-pe' => 'Peru',
				'-pf' => 'Paracel Islands',
				'-pg' => 'Guinea-Bissau',
				'-ph' => 'Philippines',
				'pic' => 'Prince Edward Island',
				'-pk' => 'Pakistan',
				'-pl' => 'Poland',
				'-pn' => 'Panama',
				'-po' => 'Portugal',
				'-pp' => 'Papua New Guinea',
				'-pr' => 'Puerto Rico',
				'-pt' => 'Portuguese Timor',
				'-pw' => 'Palau',
				'-py' => 'Paraguay',
				'-qa' => 'Qatar',
				'quc' => 'Québec (Province)',
				'-re' => 'Réunion',
				'-rh' => 'Zimbabwe',
				'riu' => 'Rhode Island',
				'-rm' => 'Romania',
				'-ru' => 'Russia (Federation)',
				'rur' => 'Russian S.F.S.R.',
				'-rw' => 'Rwanda',
				'-ry' => 'Ryukyu Islands, Southern',
				'-sa' => 'South Africa',
				'-sb' => 'Svalbard',
				'scu' => 'South Carolina',
				'sdu' => 'South Dakota',
				'-se' => 'Seychelles',
				'-sf' => 'Sao Tome and Principe',
				'-sg' => 'Senegal',
				'-sh' => 'Spanish North Africa',
				'-si' => 'Singapore',
				'-sj' => 'Sudan',
				'-sk' => 'Sikkim',
				'-sl' => 'Sierra Leone',
				'-sm' => 'San Marino',
				'snc' => 'Saskatchewan',
				'-so' => 'Somalia',
				'-sp' => 'Spain',
				'-sq' => 'Swaziland',
				'-sr' => 'Surinam',
				'-ss' => 'Western Sahara',
				'stk' => 'Scotland',
				'-su' => 'Saudi Arabia',
				'-sv' => 'Swan Islands',
				'-sw' => 'Sweden',
				'-sx' => 'Namibia',
				'-sy' => 'Syria',
				'-sz' => 'Switzerland',
				'-ta' => 'Tajikistan',
				'tar' => 'Tajik S.S.R.',
				'-tc' => 'Turks and Caicos Islands',
				'-tg' => 'Togo',
				'-th' => 'Thailand',
				'-ti' => 'Tunisia',
				'-tk' => 'Turkmenistan',
				'tkr' => 'Turkmen S.S.R.',
				'-tl' => 'Tokelau',
				'tnu' => 'Tennessee',
				'-to' => 'Tonga',
				'-tr' => 'Trinidad and Tobago',
				'-ts' => 'United Arab Emirates',
				'-tt' => 'Trust Territory of the Pacific Islands',
				'-tu' => 'Turkey',
				'-tv' => 'Tuvalu',
				'txu' => 'Texas',
				'-tz' => 'Tanzania',
				'-ua' => 'Egypt',
				'-uc' => 'United States Misc. Caribbean Islands',
				'-ug' => 'Uganda',
				'-ui' => 'United Kingdom Misc. Islands',
				/*'uik' => 'United Kingdom Misc. Islands',*/
				'-uk' => 'United Kingdom',
				'-un' => 'Ukraine',
				/*'unr' => 'Ukraine',*/
				'-up' => 'United States Misc. Pacific Islands',
				'-ur' => 'Soviet Union',
				'-us' => 'United States',
				'utu' => 'Utah',
				'-uv' => 'Burkina Faso',
				'-uy' => 'Uruguay',
				'-uz' => 'Uzbekistan',
				'uzr' => 'Uzbek S.S.R.Code Sequence',
				'vau' => 'Virginia',
				'-vb' => 'British Virgin Islands',
				'-vc' => 'Vatican City',
				'-ve' => 'Venezuela',
				'-vi' => 'Virgin Islands of the United States',
				'-vm' => 'Vietnam',
				'-vn' => 'Vietnam, North',
				'-vp' => 'Various places',
				'-vs' => 'Vietnam, South',
				'vtu' => 'Vermont',
				'wau' => 'Washington (State)',
				'-wb' => 'West Berlin',
				'-wf' => 'Wallis and Futuna',
				'wiu' => 'Wisconsin',
				'-wj' => 'West Bank of the Jordan River',
				'-wk' => 'Wake Island',
				'wlk' => 'Wales',
				'-ws' => 'Samoa',
				'wvu' => 'West Virginia',
				'wyu' => 'Wyoming',
				'-xa' => 'Christmas Island (Indian Ocean)',
				'-xb' => 'Cocos (Keeling)Islands',
				'-xc' => 'Maldives',
				'-xd' => 'Saint Kitts-Nevis',
				'-xe' => 'Marshall Islands',
				'-xf' => 'Midway Islands',
				'-xh' => 'Niue',
				'-xi' => 'Saint Kitts-Nevis-Anguilla',
				'-xj' => 'Saint Helena',
				'-xk' => 'Saint Lucia',
				'-xl' => 'Saint Pierre and Miquelon',
				'-xm' => 'Saint Vincent and the Grenadines',
				'-xn' => 'Macedonia',
				'-xo' => 'Slovakia',
				'-xp' => 'Spratly Island',
				'-xr' => 'Czech Republic',
				'-xs' => 'South Georgia and the South Sandwich Islands',
				'-xv' => 'Slovenia',
				'xxx' => 'No place, unknown, or undetermined',
				/*'xxc' => 'Canada',
				'xxk' => 'United Kingdom',*/
				/*'xxr' => 'Soviet Union',*/
				/*'xxu' => 'United States',*/
				'-ye' => 'Yemen',
				'ykc' => 'Yukon Territory',
				'-ys' => 'Yemen (People’s Democratic Republic)',
				'-yu' => 'Serbia and Montenegro',
				'-za' => 'Zambia'
			), 'default' => 'xxx'
			));
			}
			?>
			
			<script type="text/javascript">
				// Se ordena la lista.
				$("#044a").append($("#044a option").remove().sort(function(a, b) {
				    var at = $(a).text(), bt = $(b).text();
				    return (at > bt)?1:((at < bt)?-1:0);
				}));

				if ('<?php echo isset($c044['a']); ?>') {
					$('#044a').val('<?php echo $c044['a']; ?>');
				} else {
					$('#044a').val('xxx');
				}
			</script>
		</td>
	</tr>
</table>

<?php $c082 = marc21_decode($item['Item']['082']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>082</b></th>
		<th style="width: 45%;"><b>Número de la Clasificación Decimal Dewey.</b></th>
		<th style="width: 45%;">
			<label id="l-082"><?php echo $item['Item']['082']; ?></label>
			<?php echo $this->Form->hidden('082', array('id' => '082', 'label' => false, 'div' => false, 'value' => $item['Item']['082'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de edición.</td>
		<td><?php echo $this->Form->input('082i1', array('id' => '082i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Completa',
				'1' => '1 - Abreviada'
			), 'selected' => substr($c082['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Fuente del número de clasificación.</td>
		<td><?php echo $this->Form->input('082i2', array('id' => '082i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Asignado por la LC',
				'4' => '4 - Asignado por una agencia distinta de la LC'
			), 'selected' => substr($c082['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Número de clasificación.</td>
		<td>
			<?php
			if (isset($c082['a'])) {
				echo $this->Form->input('082a', array('id' => '082a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c082['a']));
			} else {
				echo $this->Form->input('082a', array('id' => '082a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Número de documento.</td>
		<td>
			<?php
			if (isset($c082['b'])) {
				echo $this->Form->input('082b', array('id' => '082b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c082['b']));
			} else {
				echo $this->Form->input('082b', array('id' => '082b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c092 = marc21_decode($item['Item']['092']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>092</b></th>
		<th style="width: 45%;"><b>Clasificación local (COTA).</b></th>
		<th style="width: 45%;">
			<label id="l-092"><?php echo $item['Item']['092']; ?></label>
			<?php echo $this->Form->hidden('092', array('id' => '092', 'label' => false, 'div' => false, 'value' => $item['Item']['092'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>A disposición del centro catalogador.</td>
		<td>
			<?php
			if (isset($c092['a'])) {
				echo $this->Form->input('092a', array('id' => '092a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c092['a']));
			} else {
				echo $this->Form->input('092a', array('id' => '092a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>A disposición del centro catalogador.</td>
		<td>
			<?php
			if (isset($c092['b'])) {
				echo $this->Form->input('092b', array('id' => '092b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c092['b']));
			} else {
				echo $this->Form->input('092b', array('id' => '092b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>A disposición del centro catalogador.</td>
		<td>
			<?php
			if (isset($c092['c'])) {
				echo $this->Form->input('092c', array('id' => '092c', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c092['c']));
			} else {
				echo $this->Form->input('092c', array('id' => '092c', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>
</div>

<div id="1xx" class="tabs" style="display: none;">
<?php $c100 = marc21_decode($item['Item']['100']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>100</b></th>
		<th style="width: 45%;"><b>Punto de acceso principal - Nombre de persona.</b></th>
		<th style="width: 45%;">
			<label id="l-100"><?php echo $item['Item']['100']; ?></label>
			<?php echo $this->Form->hidden('100', array('id' => '100', 'label' => false, 'div' => false, 'value' => $item['Item']['100'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de elemento inicial del nombre de persona.</td>
		<td><?php echo $this->Form->input('100i1', array('id' => '100i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Nombre',
				'1' => '1 - Apellido (s)',
				'3' => '3 - Nombre de familia'
			), 'selected' => substr($c100['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('100i2', array('id' => '100i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No definido'
			), 'selected' => substr($c100['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de persona.</td>
		<td>
			<?php
			if (isset($c100['a'])) {
				echo $this->Form->input('100a', array('id' => '100a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c100['a']));
			} else {
				echo $this->Form->input('100a', array('id' => '100a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Numeración.</td>
		<td>
			<?php
			if (isset($c100['b'])) {
				echo $this->Form->input('100b', array('id' => '100b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c100['b']));
			} else {
				echo $this->Form->input('100b', array('id' => '100b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Fechas asociadas al nombre.</td>
		<td>
			<?php
			if (isset($c100['d'])) {
				echo $this->Form->input('100d', array('id' => '100d', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c100['d']));
			} else {
				echo $this->Form->input('100d', array('id' => '100d', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c110 = marc21_decode($item['Item']['110']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>110</b></th>
		<th style="width: 45%;"><b>Autor corporativo.</b></th>
		<th style="width: 45%;">
			<label id="l-110"><?php echo $item['Item']['110']; ?></label>
			<?php echo $this->Form->hidden('110', array('id' => '110', 'label' => false, 'div' => false, 'value' => $item['Item']['110'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de elemento inicial del nombre de entidad corporativa.</td>
		<td><?php echo $this->Form->input('110i1', array('id' => '110i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No definido',
				'0' => '0 - Nombre en orden inverso',
				'1' => '1 - Nombre de jurisdicción',
				'2' => '2 - Nombre en orden directo'
			), 'selected' => substr($c110['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('110i2', array('id' => '110i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No definido'
			), 'selected' => substr($c110['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de autor corporativo.</td>
		<td>
			<?php
			if (isset($c110['a'])) {
				echo $this->Form->input('110a', array('id' => '110a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c110['a']));
			} else {
				echo $this->Form->input('110a', array('id' => '110a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Unidad subordinada.</td>
		<td>
			<?php
			if (isset($c110['b'])) {
				echo $this->Form->input('110b', array('id' => '110b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c110['b']));
			} else {
				echo $this->Form->input('110b', array('id' => '110b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c130 = marc21_decode($item['Item']['130']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>130</b></th>
		<th style="width: 45%;"><b>Título uniforme (Punto de acceso).</b></th>
		<th style="width: 45%;">
			<label id="l-130"><?php echo $item['Item']['130']; ?></label>
			<?php echo $this->Form->hidden('130', array('id' => '130', 'label' => false, 'div' => false, 'value' => $item['Item']['130'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Caracteres que no alfabetizan.</td>
		<td><?php echo $this->Form->input('130i1', array('id' => '130i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9',		
			), 'selected' => substr($c130['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('130i2', array('id' => '130i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			), 'selected' => substr($c130['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título uniforme.</td>
		<td>
			<?php
			if (isset($c130['a'])) {
				echo $this->Form->input('130a', array('id' => '130a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c130['a']));
			} else {
				echo $this->Form->input('130a', array('id' => '130a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Número de parte o sección de la obra.</td>
		<td>
			<?php
			if (isset($c130['n'])) {
				echo $this->Form->input('130n', array('id' => '130n', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c130['n']));
			} else {
				echo $this->Form->input('130n', array('id' => '130n', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Nombre de parte o sección de la obra.</td>
		<td>
			<?php
			if (isset($c130['p'])) {
				echo $this->Form->input('130p', array('id' => '130p', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c130['p']));
			} else {
				echo $this->Form->input('130p', array('id' => '130p', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>
</div>

<div id="2xx" class="tabs" style="display: none;">
<?php $c222 = marc21_decode($item['Item']['222']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>222</b></th>
		<th style="width: 45%;"><b>Título clave.</b></th>
		<th style="width: 45%;">
			<label id="l-222"><?php echo $item['Item']['222']; ?></label>
			<?php echo $this->Form->hidden('222', array('id' => '222', 'label' => false, 'div' => false, 'value' => $item['Item']['222'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('222i1', array('id' => '222i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No definido'
			), 'selected' => substr($c222['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Caracteres que no alfabetizan.</td>
		<td><?php echo $this->Form->input('222i2', array('id' => '222i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9'
			), 'selected' => substr($c222['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título clave.</td>
		<td>
			<?php
			if (isset($c222['a'])) {
				echo $this->Form->input('222a', array('id' => '222a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c222['a']));
			} else {
				echo $this->Form->input('222a', array('id' => '222a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Información adicional.</td>
		<td>
			<?php
			if (isset($c222['b'])) {
				echo $this->Form->input('222b', array('id' => '222b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c222['b']));
			} else {
				echo $this->Form->input('222b', array('id' => '222b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c240 = marc21_decode($item['Item']['240']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>240</b></th>
		<th style="width: 45%;"><b>Título uniforme.</b></th>
		<th style="width: 45%;">
			<label id="l-240"><?php echo $item['Item']['240']; ?></label>
			<?php echo $this->Form->hidden('240', array('id' => '240', 'label' => false, 'div' => false, 'value' => $item['Item']['240'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Impresión o visualización.</td>
		<td><?php echo $this->Form->input('240i1', array('id' => '240i1', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - No se imprime ni se visualiza',
				'1' => '1 - Se imprime o se visualiza'
			), 'selected' => substr($c240['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Caracteres que no alfabetizan.</td>
		<td><?php echo $this->Form->input('240i2', array('id' => '240i2', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9',		
			), 'selected' => substr($c240['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título uniforme.</td>
		<td>
			<?php
			if (isset($c240['a'])) {
				echo $this->Form->input('240a', array('id' => '240a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c240['a']));
			} else {
				echo $this->Form->input('240a', array('id' => '240a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Número de parte o sección de la obra.</td>
		<td>
			<?php
			if (isset($c240['n'])) {
				echo $this->Form->input('240n', array('id' => '240n', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c240['n']));
			} else {
				echo $this->Form->input('240n', array('id' => '240n', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Nombre de parte o sección de la obra.</td>
		<td>
			<?php
			if (isset($c240['p'])) {
				echo $this->Form->input('240p', array('id' => '240p', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c240['p']));
			} else {
				echo $this->Form->input('240p', array('id' => '240p', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c245 = marc21_decode($item['Item']['245']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>245</b></th>
		<th style="width: 45%;"><b>Mención de título.</b></th>
		<th style="width: 45%;">
			<label id="l-245"><?php echo $item['Item']['245']; ?></label>
			<?php echo $this->Form->hidden('245', array('id' => '245', 'label' => false, 'div' => false, 'value' => $item['Item']['245'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Punto de acceso adicional de título.</td>
		<td><?php echo $this->Form->input('245i1', array('id' => '245i1', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - No hay punto de acceso adicional',
				'1' => '1 - Hay punto de acceso adicional'
			), 'selected' => substr($c245['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Caracteres que no alfabetizan.</td>
		<td><?php echo $this->Form->input('245i2', array('id' => '245i2', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9',		
			), 'selected' => substr($c245['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título <font color="red">(Obligatorio)</font>.</td>
		<td>
			<?php
			if (isset($c245['a'])) {
				echo $this->Form->input('245a', array('id' => '245a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c245['a']));
			} else {
				echo $this->Form->input('245a', array('id' => '245a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Subtítulo o título paralelo.</td>
		<td>
			<?php
			if (isset($c245['b'])) {
				echo $this->Form->input('245b', array('id' => '245b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c245['b']));
			} else {
				echo $this->Form->input('245b', array('id' => '245b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Mención de responsabilidad.</td>
		<td>
			<?php
			if (isset($c245['c'])) {
				echo $this->Form->input('245c', array('id' => '245c', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c245['c']));
			} else {
				echo $this->Form->input('245c', array('id' => '245c', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$f</b></td>
		<td>Fechas extremas.</td>
		<td>
			<?php
			if (isset($c245['f'])) {
				echo $this->Form->input('245f', array('id' => '245f', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c245['f']));
			} else {
				echo $this->Form->input('245f', array('id' => '245f', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$g</b></td>
		<td>Fechas predominantes.</td>
		<td>
			<?php
			if (isset($c245['g'])) {
				echo $this->Form->input('245g', array('id' => '245g', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c245['g']));
			} else {
				echo $this->Form->input('245g', array('id' => '245g', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$h</b></td>
		<td>Tipo de material.</td>
		<td>
			<?php
			if (isset($c245['h'])) {
				echo $this->Form->input('245h', array('id' => '245h', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c245['h']));
			} else {
				echo $this->Form->input('245h', array('id' => '245h', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$k</b></td>
		<td>Forma.</td>
		<td>
			<?php
			if (isset($c245['k'])) {
				echo $this->Form->input('245k', array('id' => '245k', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c245['k']));
			} else {
				echo $this->Form->input('245k', array('id' => '245k', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Número de parte o sección de la obra.</td>
		<td>
			<?php
			if (isset($c245['n'])) {
				echo $this->Form->input('245n', array('id' => '245n', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c245['n']));
			} else {
				echo $this->Form->input('245n', array('id' => '245n', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Nombre de parte o sección de la obra.</td>
		<td>
			<?php
			if (isset($c245['p'])) {
				echo $this->Form->input('245p', array('id' => '245p', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c245['p']));
			} else {
				echo $this->Form->input('245p', array('id' => '245p', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$s</b></td>
		<td>Versión.</td>
		<td>
			<?php
			if (isset($c245['s'])) {
				echo $this->Form->input('245s', array('id' => '245s', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c245['s']));
			} else {
				echo $this->Form->input('245s', array('id' => '245s', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c246 = marc21_decode($item['Item']['246']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>246</b></th>
		<th style="width: 45%;"><b>Variante de título.</b></th>
		<th style="width: 45%;">
			<label id="l-246"><?php echo $item['Item']['246']; ?></label>
			<?php echo $this->Form->hidden('246', array('id' => '246', 'label' => false, 'div' => false, 'value' => $item['Item']['246'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de nota/punto de acceso adicional.</td>
		<td><?php echo $this->Form->input('246i1', array('id' => '246i1', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - Nota, no hay punto de acceso adicional',
				'1' => '1 - Nota, hay punto de acceso adicional',
				'2' => '2 - Ni hay nota ni punto de acceso adicional',
				'3' => '3 - No hay nota, hay punto de acceso adicional'
			), 'selected' => substr($c246['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tipo de título.</td>
		<td><?php echo $this->Form->input('246i2', array('id' => '246i2', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se especifica',
				'0' => '0 - Parte de título',
				'1' => '1 - Título paralelo',
				'2' => '2 - Título distintivo',
				'3' => '3 - Otro título',
				'4' => '4 - Título de la cubierta',
				'5' => '5 - Título de la portada adicional',
				'6' => '6 - Título de la cabecera',
				'7' => '7 - “Titulillo”, título de margen',
				'8' => '8 - Título del lomo'		
			), 'selected' => substr($c246['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título.</td>
		<td>
			<?php
			if (isset($c246['a'])) {
				echo $this->Form->input('246a', array('id' => '246a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c246['a']));
			} else {
				echo $this->Form->input('246a', array('id' => '246a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Subtítulo o título paralelo.</td>
		<td>
			<?php
			if (isset($c246['b'])) {
				echo $this->Form->input('246b', array('id' => '246b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c246['b']));
			} else {
				echo $this->Form->input('246b', array('id' => '246b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$i</b></td>
		<td>Texto de visualización.</td>
		<td>
			<?php
			if (isset($c246['i'])) {
				echo $this->Form->input('246i', array('id' => '246i', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c246['i']));
			} else {
				echo $this->Form->input('246i', array('id' => '246i', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c247 = marc21_decode($item['Item']['247']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>247</b></th>
		<th style="width: 45%;"><b>Título anterior.</b></th>
		<th style="width: 45%;">
			<label id="l-247"><?php echo $item['Item']['247']; ?></label>
			<?php echo $this->Form->hidden('247', array('id' => '247', 'label' => false, 'div' => false, 'value' => $item['Item']['247'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título.</td>
		<td>
			<?php
			if (isset($c247['a'])) {
				echo $this->Form->input('247a', array('id' => '247a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c247['a']));
			} else {
				echo $this->Form->input('247a', array('id' => '247a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Subtítulo o título paralelo.</td>
		<td>
			<?php
			if (isset($c247['b'])) {
				echo $this->Form->input('247b', array('id' => '247b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c247['b']));
			} else {
				echo $this->Form->input('247b', array('id' => '247b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$f</b></td>
		<td>Fecha o designación secuencial.</td>
		<td>
			<?php
			if (isset($c247['f'])) {
				echo $this->Form->input('247f', array('id' => '247f', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c247['f']));
			} else {
				echo $this->Form->input('247f', array('id' => '247f', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$g</b></td>
		<td>Nota sobre el título anterior.</td>
		<td>
			<?php
			if (isset($c247['g'])) {
				echo $this->Form->input('247g', array('id' => '247g', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c247['g']));
			} else {
				echo $this->Form->input('247g', array('id' => '247g', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Número de parte o sección de la obra.</td>
		<td>
			<?php
			if (isset($c247['n'])) {
				echo $this->Form->input('247n', array('id' => '247n', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c247['n']));
			} else {
				echo $this->Form->input('247n', array('id' => '247n', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Nombre de parte o sección de la obra.</td>
		<td>
			<?php
			if (isset($c247['p'])) {
				echo $this->Form->input('247p', array('id' => '247p', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c247['p']));
			} else {
				echo $this->Form->input('247p', array('id' => '247p', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c250 = marc21_decode($item['Item']['250']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>250</b></th>
		<th style="width: 45%;"><b>Mención de edición.</b></th>
		<th style="width: 45%;">
			<label id="l-250"><?php echo $item['Item']['250']; ?></label>
			<?php echo $this->Form->hidden('250', array('id' => '250', 'label' => false, 'div' => false, 'value' => $item['Item']['250'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Mención de edición.</td>
		<td>
			<?php
			if (isset($c250['a'])) {
				echo $this->Form->input('250a', array('id' => '250a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c250['a']));
			} else {
				echo $this->Form->input('250a', array('id' => '250a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Resto de la mención de edición.</td>
		<td>
			<?php
			if (isset($c250['b'])) {
				echo $this->Form->input('250b', array('id' => '250b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c250['b']));
			} else {
				echo $this->Form->input('250b', array('id' => '250b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c260 = marc21_decode($item['Item']['260']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>260</b></th>
		<th style="width: 45%;"><b>Publicación, distribución, etc. (pie de imprenta).</b></th>
		<th style="width: 45%;">
			<label id="l-260"><?php echo $item['Item']['260']; ?></label>
			<?php echo $this->Form->hidden('260', array('id' => '260', 'label' => false, 'div' => false, 'value' => $item['Item']['260'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Lugar de publicación, distribución, etc.</td>
		<td>
			<?php
			if (isset($c260['a'])) {
				echo $this->Form->input('260a', array('id' => '260a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c260['a']));
			} else {
				echo $this->Form->input('260a', array('id' => '260a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Nombre del editor, distribuidor, etc.</td>
		<td>
			<?php
			if (isset($c260['b'])) {
				echo $this->Form->input('260b', array('id' => '260b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c260['b']));
			} else {
				echo $this->Form->input('260b', array('id' => '260b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Fecha de publicación, distribución, etc.</td>
		<td>
			<?php
			if (isset($c260['c'])) {
				echo $this->Form->input('260c', array('id' => '260c', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c260['c']));
			} else {
				echo $this->Form->input('260c', array('id' => '260c', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>
</div>

<div id="3xx" class="tabs" style="display: none;">
<?php $c300 = marc21_decode($item['Item']['300']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>300</b></th>
		<th style="width: 45%;"><b>Descripción física.</b></th>
		<th style="width: 45%;">
			<label id="l-300"><?php echo $item['Item']['300']; ?></label>
			<?php echo $this->Form->hidden('300', array('id' => '300', 'label' => false, 'div' => false, 'value' => $item['Item']['300'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Extensión.</td>
		<td>
			<?php
			if (isset($c300['a'])) {
				echo $this->Form->input('300a', array('id' => '300a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c300['a']));
			} else {
				echo $this->Form->input('300a', array('id' => '300a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Otras características físicas.</td>
		<td>
			<?php
			if (isset($c300['b'])) {
				echo $this->Form->input('300b', array('id' => '300b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c300['b']));
			} else {
				echo $this->Form->input('300b', array('id' => '300b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Dimensiones.</td>
		<td>
			<?php
			if (isset($c300['c'])) {
				echo $this->Form->input('300c', array('id' => '300c', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c300['c']));
			} else {
				echo $this->Form->input('300c', array('id' => '300c', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Material anejo.</td>
		<td>
			<?php
			if (isset($c300['e'])) {
				echo $this->Form->input('300e', array('id' => '300e', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c300['e']));
			} else {
				echo $this->Form->input('300e', array('id' => '300e', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c310 = marc21_decode($item['Item']['310']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>310</b></th>
		<th style="width: 45%;"><b>Periodicidad actual.</b></th>
		<th style="width: 45%;">
			<label id="l-310"><?php echo $item['Item']['310']; ?></label>
			<?php echo $this->Form->hidden('310', array('id' => '310', 'label' => false, 'div' => false, 'value' => $item['Item']['310'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Periodicidad actual.</td>
		<td>
			<?php
			if (isset($c310['a'])) {
				echo $this->Form->input('310a', array('id' => '310a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c310['a']));
			} else {
				echo $this->Form->input('310a', array('id' => '310a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Fecha de comienzo de la periodicidad actual.</td>
		<td>
			<?php
			if (isset($c310['b'])) {
				echo $this->Form->input('310b', array('id' => '310b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c310['b']));
			} else {
				echo $this->Form->input('310b', array('id' => '310b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c321 = marc21_decode($item['Item']['321']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>321</b></th>
		<th style="width: 45%;"><b>Periodicidad anterior.</b></th>
		<th style="width: 45%;">
			<label id="l-321"><?php echo $item['Item']['321']; ?></label>
			<?php echo $this->Form->hidden('321', array('id' => '321', 'label' => false, 'div' => false, 'value' => $item['Item']['321'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Periodicidad anterior.</td>
		<td>
			<?php
			if (isset($c321['a'])) {
				echo $this->Form->input('321a', array('id' => '321a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c321['a']));
			} else {
				echo $this->Form->input('321a', array('id' => '321a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Fechas de la periodicidad anterior.</td>
		<td>
			<?php
			if (isset($c321['b'])) {
				echo $this->Form->input('321b', array('id' => '321b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c321['b']));
			} else {
				echo $this->Form->input('321b', array('id' => '321b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c362 = marc21_decode($item['Item']['362']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>362</b></th>
		<th style="width: 45%;"><b>Fechas de publicación y/o designación secuencial.</b></th>
		<th style="width: 45%;">
			<label id="l-362"><?php echo $item['Item']['362']; ?></label>
			<?php echo $this->Form->hidden('362', array('id' => '362', 'label' => false, 'div' => false, 'value' => $item['Item']['362'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Fechas de publicación y/o designación secuencial.</td>
		<td>
			<?php
			if (isset($c362['a'])) {
				echo $this->Form->input('362a', array('id' => '362a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c362['a']));
			} else {
				echo $this->Form->input('362a', array('id' => '362a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>
</div>

<div id="5xx" class="tabs" style="display: none;">
<?php $c500 = marc21_decode($item['Item']['500']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>500</b></th>
		<th style="width: 45%;"><b>Nota general.</b></th>
		<th style="width: 45%;">
			<label id="l-500"><?php echo $item['Item']['500']; ?></label>
			<?php echo $this->Form->hidden('500', array('id' => '500', 'label' => false, 'div' => false, 'value' => $item['Item']['500'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota general.</td>
		<td>
			<?php
			if (isset($c500['a'])) {
				echo $this->Form->input('500a', array('id' => '500a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c500['a']));
			} else {
				echo $this->Form->input('500a', array('id' => '500a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c501 = marc21_decode($item['Item']['501']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>501</b></th>
		<th style="width: 45%;"><b>Nota de “Con”.</b></th>
		<th style="width: 45%;">
			<label id="l-501"><?php echo $item['Item']['501']; ?></label>
			<?php echo $this->Form->hidden('501', array('id' => '501', 'label' => false, 'div' => false, 'value' => $item['Item']['501'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Con.</td>
		<td>
			<?php
			if (isset($c501['a'])) {
				echo $this->Form->input('501a', array('id' => '501a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c501['a']));
			} else {
				echo $this->Form->input('501a', array('id' => '501a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c505 = marc21_decode($item['Item']['505']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>505</b></th>
		<th style="width: 45%;"><b>Nota de contenido con formato.</b></th>
		<th style="width: 45%;">
			<label id="l-505"><?php echo $item['Item']['505']; ?></label>
			<?php echo $this->Form->hidden('505', array('id' => '505', 'label' => false, 'div' => false, 'value' => $item['Item']['505'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de visualización asociada.</td>
		<td><?php echo $this->Form->input('505i1', array('id' => '505i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Contenido completo',
				'1' => '1 - Contenido incompleto',
				'2' => '2 - Contenido parcial',
				'8' => '8 - No genera visualización asociada'
			), 'selected' => substr($c505['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Nivel de designación del contenido.</td>
		<td><?php echo $this->Form->input('505i2', array('id' => '505i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - Básico',
					'0' => '0 - Completo'
			), 'selected' => substr($c505['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de contenido con formato.</td>
		<td>
			<?php
			if (isset($c505['a'])) {
				echo $this->Form->input('505a', array('id' => '505a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c505['a']));
			} else {
				echo $this->Form->input('505a', array('id' => '505a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c510 = marc21_decode($item['Item']['510']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>510</b></th>
		<th style="width: 45%;"><b>Nota de citas o referencias bibliográficas.</b></th>
		<th style="width: 45%;">
			<label id="l-510"><?php echo $item['Item']['510']; ?></label>
			<?php echo $this->Form->hidden('510', array('id' => '510', 'label' => false, 'div' => false, 'value' => $item['Item']['510'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Cobertura/localización dentro de la fuente.</td>
		<td><?php echo $this->Form->input('510i1', array('id' => '510i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Cobertura desconocida',
				'1' => '1 - Cobertura completa',
				'2' => '2 - Cobertura selectiva',
				'3' => '3 - No se indica la localización dentro de la fuente',
				'4' => '4 - Se indica la localización dentro de la fuente'
			), 'selected' => substr($c510['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('510i2', array('id' => '510i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			), 'selected' => substr($c510['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de la fuente.</td>
		<td>
			<?php
			if (isset($c510['a'])) {
				echo $this->Form->input('510a', array('id' => '510a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c510['a']));
			} else {
				echo $this->Form->input('510a', array('id' => '510a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Localización dentro de la fuente.</td>
		<td>
			<?php
			if (isset($c510['c'])) {
				echo $this->Form->input('510c', array('id' => '510c', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c510['c']));
			} else {
				echo $this->Form->input('510c', array('id' => '510c', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c515 = marc21_decode($item['Item']['515']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>515</b></th>
		<th style="width: 45%;"><b>Nota de peculiaridades de la numeración.</b></th>
		<th style="width: 45%;">
			<label id="l-515"><?php echo $item['Item']['515']; ?></label>
			<?php echo $this->Form->hidden('515', array('id' => '515', 'label' => false, 'div' => false, 'value' => $item['Item']['515'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de peculiaridades de la numeración.</td>
		<td>
			<?php
			if (isset($c515['a'])) {
				echo $this->Form->input('515a', array('id' => '515a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c515['a']));
			} else {
				echo $this->Form->input('515a', array('id' => '515a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c520 = marc21_decode($item['Item']['520']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>520</b></th>
		<th style="width: 45%;"><b>Nota de sumario, etc.</b></th>
		<th style="width: 45%;">
			<label id="l-520"><?php echo $item['Item']['520']; ?></label>
			<?php echo $this->Form->hidden('520', array('id' => '520', 'label' => false, 'div' => false, 'value' => $item['Item']['520'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de visualización asociada.</td>
		<td><?php echo $this->Form->input('520i1', array('id' => '520i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - Sumario',
				'0' => '0 - Materia',
				'1' => '1 - Reseña',
				'2' => '2 - Alcance y contenido',
				'3' => '3 - Resumen',
				'4' => '4 - Aviso sobre el contenido',
				'8' => '8 - No genera visualización asociada'
			), 'selected' => substr($c520['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('520i2', array('id' => '520i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			), 'selected' => substr($c520['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Sumario, etc.</td>
		<td>
			<?php
			if (isset($c520['a'])) {
				echo $this->Form->input('520a', array('id' => '520a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c520['a']));
			} else {
				echo $this->Form->input('520a', array('id' => '520a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c530 = marc21_decode($item['Item']['530']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>530</b></th>
		<th style="width: 45%;"><b>Nota de formato físico adicional disponible.</b></th>
		<th style="width: 45%;">
			<label id="l-530"><?php echo $item['Item']['530']; ?></label>
			<?php echo $this->Form->hidden('530', array('id' => '530', 'label' => false, 'div' => false, 'value' => $item['Item']['530'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de formato físico adicional disponible.</td>
		<td>
			<?php
			if (isset($c530['a'])) {
				echo $this->Form->input('530a', array('id' => '530a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c530['a']));
			} else {
				echo $this->Form->input('530a', array('id' => '530a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Condiciones de adquisición.</td>
		<td>
			<?php
			if (isset($c530['c'])) {
				echo $this->Form->input('530c', array('id' => '530c', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c530['c']));
			} else {
				echo $this->Form->input('530c', array('id' => '530c', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$u</b></td>
		<td>Dirección electrónica.</td>
		<td>
			<?php
			if (isset($c530['u'])) {
				echo $this->Form->input('530u', array('id' => '530u', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c530['u']));
			} else {
				echo $this->Form->input('530u', array('id' => '530u', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c534 = marc21_decode($item['Item']['534']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>534</b></th>
		<th style="width: 45%;"><b>Nota sobre la versión original.</b></th>
		<th style="width: 45%;">
			<label id="l-534"><?php echo $item['Item']['534']; ?></label>
			<?php echo $this->Form->hidden('534', array('id' => '534', 'label' => false, 'div' => false, 'value' => $item['Item']['534'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Encabezamiento principal del original.</td>
		<td>
			<?php
			if (isset($c534['a'])) {
				echo $this->Form->input('534a', array('id' => '534a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '2', 'value' => $c534['a']));
			} else {
				echo $this->Form->input('534a', array('id' => '534a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '2'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Mención de edición del original.</td>
		<td>
			<?php
			if (isset($c534['b'])) {
				echo $this->Form->input('534b', array('id' => '534b', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '2', 'value' => $c534['b']));
			} else {
				echo $this->Form->input('534b', array('id' => '534b', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '2'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Publicación, distribución, etc. del original.</td>
		<td>
			<?php
			if (isset($c534['c'])) {
				echo $this->Form->input('534c', array('id' => '534c', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '2', 'value' => $c534['c']));
			} else {
				echo $this->Form->input('534c', array('id' => '534c', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '2'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Descripción física, etc. del original.</td>
		<td>
			<?php
			if (isset($c534['e'])) {
				echo $this->Form->input('534e', array('id' => '534e', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '2', 'value' => $c534['e']));
			} else {
				echo $this->Form->input('534e', array('id' => '534e', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '2'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Frase introductoria.</td>
		<td>
			<?php
			if (isset($c534['p'])) {
				echo $this->Form->input('534p', array('id' => '534p', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '2', 'value' => $c534['p']));
			} else {
				echo $this->Form->input('534p', array('id' => '534p', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '2'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$t</b></td>
		<td>Mención de título del original.</td>
		<td>
			<?php
			if (isset($c534['t'])) {
				echo $this->Form->input('534t', array('id' => '534t', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '2', 'value' => $c534['t']));
			} else {
				echo $this->Form->input('534t', array('id' => '534t', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '2'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c546 = marc21_decode($item['Item']['546']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>546</b></th>
		<th style="width: 45%;"><b>Nota de lengua.</b></th>
		<th style="width: 45%;">
			<label id="l-546"><?php echo $item['Item']['546']; ?></label>
			<?php echo $this->Form->hidden('546', array('id' => '546', 'label' => false, 'div' => false, 'value' => $item['Item']['546'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de lengua.</td>
		<td>
			<?php
			if (isset($c546['a'])) {
				echo $this->Form->input('546a', array('id' => '546a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c546['a']));
			} else {
				echo $this->Form->input('546a', array('id' => '546a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Información sobre el código o alfabeto.</td>
		<td>
			<?php
			if (isset($c546['c'])) {
				echo $this->Form->input('546c', array('id' => '546c', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c546['c']));
			} else {
				echo $this->Form->input('546c', array('id' => '546c', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c555 = marc21_decode($item['Item']['555']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>555</b></th>
		<th style="width: 45%;"><b>Nota de índice acumulativo u otros instrumentos bibliográficos.</b></th>
		<th style="width: 45%;">
			<label id="l-555"><?php echo $item['Item']['555']; ?></label>
			<?php echo $this->Form->hidden('555', array('id' => '555', 'label' => false, 'div' => false, 'value' => $item['Item']['555'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de índice acumulativo u otros instrumentos bibliográficos.</td>
		<td>
			<?php
			if (isset($c555['a'])) {
				echo $this->Form->input('555a', array('id' => '555a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c555['a']));
			} else {
				echo $this->Form->input('555a', array('id' => '555a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Fuente de la adquisición.</td>
		<td>
			<?php
			if (isset($c555['b'])) {
				echo $this->Form->input('555b', array('id' => '555b', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c555['b']));
			} else {
				echo $this->Form->input('555b', array('id' => '555b', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Referencia bibliográfica.</td>
		<td>
			<?php
			if (isset($c555['d'])) {
				echo $this->Form->input('555d', array('id' => '555d', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c555['d']));
			} else {
				echo $this->Form->input('555d', array('id' => '555d', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$u</b></td>
		<td>Dirección electrónica.</td>
		<td>
			<?php
			if (isset($c555['u'])) {
				echo $this->Form->input('555u', array('id' => '555u', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c555['u']));
			} else {
				echo $this->Form->input('555u', array('id' => '555u', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c561 = marc21_decode($item['Item']['561']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>561</b></th>
		<th style="width: 45%;"><b>Nota de procedencia.</b></th>
		<th style="width: 45%;">
			<label id="l-561"><?php echo $item['Item']['561']; ?></label>
			<?php echo $this->Form->hidden('561', array('id' => '561', 'label' => false, 'div' => false, 'value' => $item['Item']['561'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Privacidad.</td>
		<td><?php echo $this->Form->input('561i1', array('id' => '561i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Información privada',
				'1' => '1 - Información no privada'
			), 'selected' => substr($c561['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('561i2', array('id' => '561i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			), 'selected' => substr($c561['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Procedencia.</td>
		<td>
			<?php
				if (isset($c561['a'])) {
					echo $this->Form->input('561a', array('id' => '561a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c561['a']));
				} else {
					echo $this->Form->input('561a', array('id' => '561a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
				}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$u</b></td>
		<td>Identificador Uniforme del Recurso.</td>
		<td>
			<?php
			if (isset($c561['u'])) {
				echo $this->Form->input('561u', array('id' => '561u', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c561['u']));
			} else {
				echo $this->Form->input('561u', array('id' => '561u', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c588 = marc21_decode($item['Item']['588']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>588</b></th>
		<th style="width: 45%;"><b>Nota de fuente de la descripción.</b></th>
		<th style="width: 45%;">
			<label id="l-588"><?php echo $item['Item']['588']; ?></label>
			<?php echo $this->Form->hidden('588', array('id' => '588', 'label' => false, 'div' => false, 'value' => $item['Item']['588'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de fuente de la descripción.</td>
		<td>
			<?php
			if (isset($c588['a'])) {
				echo $this->Form->input('588a', array('id' => '588a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3', 'value' => $c588['a']));
			} else {
				echo $this->Form->input('588a', array('id' => '588a', 'label' => false, 'div' => false, 'class' => 'form-control', 'type' => 'textarea', 'rows' => '3'));
			}
			?>
		</td>
	</tr>
</table>
</div>

<div id="6xx" class="tabs" style="display: none;">
<?php $c600 = marc21_decode($item['Item']['600']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>600</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de materia - Nombre de persona.</b></th>
		<th style="width: 45%;">
			<label id="l-600"><?php echo $item['Item']['600']; ?></label>
			<?php echo $this->Form->hidden('600', array('id' => '600', 'label' => false, 'div' => false, 'value' => $item['Item']['600'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Elemento inicial del nombre de persona.</td>
		<td><?php echo $this->Form->input('600i1', array('id' => '600i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No definido',
				'0' => '0 – Nombre',
				'1' => '1 - Apellido(s)',
				'3' => '3 - Nombre de familia'
			), 'selected' => substr($c600['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tesauro.</td>
		<td><?php echo $this->Form->input('600i2', array('id' => '600i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - Encabezamientos de Materia de la Library of Congress',
				'1' => '1 - Encabezamientos de Materia de LC para literatura infantil',
				'2' => '2 - Encabezamientos de Materia de Medicina',
				'3' => '3 - Fichero de autoridades de materia de la National Agricultural Library',
				'4' => '4 - Fuente no especificada',
				'5' => '5 - Encabezamientos de Materia de Canadá',
				'6' => '6 - Répertoire de vedettes-matière',
				'7' => '7 - Fuente especificada en el subcampo $2'
			), 'selected' => substr($c600['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de persona.</td>
		<td>
			<?php
			if (isset($c600['a'])) {
				echo $this->Form->input('600a', array('id' => '600a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c600['a']));
			} else {
				echo $this->Form->input('600a', array('id' => '600a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Numeración.</td>
		<td>
			<?php
			if (isset($c600['b'])) {
				echo $this->Form->input('600b', array('id' => '600b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c600['b']));
			} else {
				echo $this->Form->input('600b', array('id' => '600b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Títulos y otros términos asociados al nombre.</td>
		<td>
			<?php
			if (isset($c600['c'])) {
				echo $this->Form->input('600c', array('id' => '600c', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c600['c']));
			} else {
				echo $this->Form->input('600c', array('id' => '600c', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Fechas asociadas al nombre.</td>
		<td>
			<?php
			if (isset($c600['d'])) {
				echo $this->Form->input('600d', array('id' => '600d', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c600['d']));
			} else {
				echo $this->Form->input('600d', array('id' => '600d', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Término indicativo de función.</td>
		<td>
			<?php
			if (isset($c600['e'])) {
				echo $this->Form->input('600e', array('id' => '600e', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c600['e']));
			} else {
				echo $this->Form->input('600e', array('id' => '600e', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Subdivisión de forma.</td>
		<td>
			<?php
			if (isset($c600['v'])) {
				echo $this->Form->input('600v', array('id' => '600v', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c600['v']));
			} else {
				echo $this->Form->input('600v', array('id' => '600v', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Subdivisión de materia general.</td>
		<td>
			<?php
			if (isset($c600['x'])) {
				echo $this->Form->input('600x', array('id' => '600x', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c600['x']));
			} else {
				echo $this->Form->input('600x', array('id' => '600x', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Subdivisión cronológica.</td>
		<td>
			<?php
			if (isset($c600['y'])) {
				echo $this->Form->input('600y', array('id' => '600y', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c600['y']));
			} else {
				echo $this->Form->input('600y', array('id' => '600y', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Subdivisión geográfica.</td>
		<td>
			<?php
			if (isset($c600['z'])) {
				echo $this->Form->input('600z', array('id' => '600z', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c600['z']));
			} else {
				echo $this->Form->input('600z', array('id' => '600z', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c610 = marc21_decode($item['Item']['610']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>610</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de materia - Nombre de entidad corporativa.</b></th>
		<th style="width: 45%;">
			<label id="l-610"><?php echo $item['Item']['610']; ?></label>
			<?php echo $this->Form->hidden('610', array('id' => '610', 'label' => false, 'div' => false, 'value' => $item['Item']['610'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de elemento inicial del nombre de entidad corporativa.</td>
		<td><?php echo $this->Form->input('610i1', array('id' => '610i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Nombre en orden inverso',
				'1' => '1 - Nombre de jurisdicción',
				'2' => '2 - Nombre en orden directo'
			), 'selected' => substr($c610['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tesauro.</td>
		<td><?php echo $this->Form->input('610i2', array('id' => '610i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - Encabezamientos de Materia de la Library of Congress',
				'1' => '1 - Encabezamientos de Materia de LC para literatura infantil',
				'2' => '2 - Encabezamientos de Materia de Medicina',
				'3' => '3 - Fichero de autoridades de materia de la National Agricultural Library',
				'4' => '4 - Fuente no especificada',
				'5' => '5 - Encabezamientos de Materia de Canadá',
				'6' => '6 - Répertoire de vedettes-matière',
				'7' => '7 - Fuente especificada en el subcampo $2'
			), 'selected' => substr($c610['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de entidad corporativa.</td>
		<td>
			<?php
			if (isset($c610['a'])) {
				echo $this->Form->input('610a', array('id' => '610a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c610['a']));
			} else {
				echo $this->Form->input('610a', array('id' => '610a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Unidad subordinada.</td>
		<td>
			<?php
			if (isset($c610['b'])) {
				echo $this->Form->input('610b', array('id' => '610b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c610['b']));
			} else {
				echo $this->Form->input('610b', array('id' => '610b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Término indicativo de función.</td>
		<td>
			<?php
			if (isset($c610['e'])) {
				echo $this->Form->input('610e', array('id' => '610e', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c610['e']));
			} else {
				echo $this->Form->input('610e', array('id' => '610e', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Subdivisión de forma.</td>
		<td>
			<?php
			if (isset($c610['v'])) {
				echo $this->Form->input('610v', array('id' => '610v', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c610['v']));
			} else {
				echo $this->Form->input('610v', array('id' => '610v', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Subdivisión de materia general.</td>
		<td>
			<?php
			if (isset($c610['x'])) {
				echo $this->Form->input('610x', array('id' => '610x', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c610['x']));
			} else {
				echo $this->Form->input('610x', array('id' => '610x', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Subdivisión cronológica.</td>
		<td>
			<?php
			if (isset($c610['y'])) {
				echo $this->Form->input('610y', array('id' => '610y', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c610['y']));
			} else {
				echo $this->Form->input('610y', array('id' => '610y', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Subdivisión geográfica.</td>
		<td>
			<?php
			if (isset($c610['z'])) {
				echo $this->Form->input('610z', array('id' => '610z', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c610['z']));
			} else {
				echo $this->Form->input('610z', array('id' => '610z', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c648 = marc21_decode($item['Item']['648']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>648</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de materia -Término cronológico.</b></th>
		<th style="width: 45%;">
			<label id="l-648"><?php echo $item['Item']['648']; ?></label>
			<?php echo $this->Form->hidden('648', array('id' => '648', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de fecha o período de tiempo.</td>
		<td><?php echo $this->Form->input('648i1', array('id' => '648i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Fecha o periodo de tiempo cubierto o representado',
				'1' => '1 - Fecha o periodo de tiempo de creación u origen'
			), 'selected' => substr($c648['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tesauro.</td>
		<td><?php echo $this->Form->input('648i2', array('id' => '648i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - Encabezamientos de Materia de la Library of Congress',
				'1' => '1 - Encabezamientos de Materia de LC para literatura infantil',
				'2' => '2 - Encabezamientos de Materia de Medicina',
				'3' => '3 - Fichero de autoridades de materia de la National Agricultural Library',
				'4' => '4 - Fuente no especificada',
				'5' => '5 - Encabezamientos de Materia de Canadá',
				'6' => '6 - Répertoire de vedettes-matière',
				'7' => '7 - Fuente especificada en el subcampo $2'
			), 'selected' => substr($c648['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Término cronológico.</td>
		<td>
			<?php
				if (isset($c648['a'])) {
					echo $this->Form->input('648a', array('id' => '648a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c648['a']));
				} else {
					echo $this->Form->input('648a', array('id' => '648a', 'label' => false, 'div' => false, 'class' => 'form-control'));
				}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Subdivisión de forma.</td>
		<td>
			<?php
				if (isset($c648['v'])) {
					echo $this->Form->input('648v', array('id' => '648v', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c648['v']));
				} else {
					echo $this->Form->input('648v', array('id' => '648v', 'label' => false, 'div' => false, 'class' => 'form-control'));
				}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Subdivisión de materia general.</td>
		<td>
			<?php
				if (isset($c648['x'])) {
					echo $this->Form->input('648x', array('id' => '648x', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c648['x']));
				} else {
					echo $this->Form->input('648x', array('id' => '648x', 'label' => false, 'div' => false, 'class' => 'form-control'));
				}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Subdivisión cronológica.</td>
		<td>
			<?php
				if (isset($c648['y'])) {
					echo $this->Form->input('648y', array('id' => '648y', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c648['y']));
				} else {
					echo $this->Form->input('648y', array('id' => '648y', 'label' => false, 'div' => false, 'class' => 'form-control'));
				}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Subdivisión geográfica.</td>
		<td>
			<?php
				if (isset($c648['z'])) {
					echo $this->Form->input('648z', array('id' => '648z', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c648['z']));
				} else {
					echo $this->Form->input('648z', array('id' => '648z', 'label' => false, 'div' => false, 'class' => 'form-control'));
				}
			?>
		</td>
	</tr>
</table>

<?php $c650 = marc21_decode($item['Item']['650']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>650</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de materia – Término de materia.</b></th>
		<th style="width: 45%;">
			<label id="l-650"><?php echo $item['Item']['650']; ?></label>
			<?php echo $this->Form->hidden('650', array('id' => '650', 'label' => false, 'div' => false, 'value' => $item['Item']['650'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Nivel de materia.</td>
		<td><?php echo $this->Form->input('650i1', array('id' => '650i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - No se especifica',
				'1' => '1 - Principal',
				'2' => '2 - Secundaria'
			), 'selected' => substr($c650['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tesauro.</td>
		<td><?php echo $this->Form->input('650i2', array('id' => '650i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - Encabezamientos de Materia de la Library of Congress',
				'1' => '1 - Encabezamientos de Materia de LC para literatura infantil',
				'2' => '2 - Encabezamientos de Materia de Medicina',
				'3' => '3 - Fichero de autoridades de materia de la National Agricultural Library',
				'4' => '4 - Fuente no especificada',
				'5' => '5 - Encabezamientos de Materia de Canadá',
				'6' => '6 - Répertoire de vedettes-matière',
				'7' => '7 - Fuente especificada en el subcampo $2'
			), 'selected' => substr($c650['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Materia.</td>
		<td>
			<?php
			if (isset($c650['a'])) {
				echo $this->Form->input('650a', array('id' => '650a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c650['a']));
			} else {
				echo $this->Form->input('650a', array('id' => '650a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Subdivisión de forma.</td>
		<td>
			<?php
			if (isset($c650['v'])) {
				echo $this->Form->input('650v', array('id' => '650v', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c650['v']));
			} else {
				echo $this->Form->input('650v', array('id' => '650v', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Subdivisión de materia general.</td>
		<td>
			<?php
			if (isset($c650['x'])) {
				echo $this->Form->input('650x', array('id' => '650x', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c650['x']));
			} else {
				echo $this->Form->input('650x', array('id' => '650x', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Subdivisión cronológica.</td>
		<td>
			<?php
			if (isset($c650['y'])) {
				echo $this->Form->input('650y', array('id' => '650y', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c650['y']));
			} else {
				echo $this->Form->input('650y', array('id' => '650y', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Subdivisión geográfica.</td>
		<td>
			<?php
			if (isset($c650['z'])) {
				echo $this->Form->input('650z', array('id' => '650z', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c650['z']));
			} else {
				echo $this->Form->input('650z', array('id' => '650z', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c651 = marc21_decode($item['Item']['651']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>651</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de materia - Nombre geográfico.</b></th>
		<th style="width: 45%;">
			<label id="l-651"><?php echo $item['Item']['651']; ?></label>
			<?php echo $this->Form->hidden('651', array('id' => '651', 'label' => false, 'div' => false, 'value' => $item['Item']['651'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Nivel de materia.</td>
		<td><?php echo $this->Form->input('651i1', array('id' => '651i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - No se especifica',
				'1' => '1 - Principal',
				'2' => '2 - Secundaria'
			), 'selected' => substr($c651['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tesauro.</td>
		<td><?php echo $this->Form->input('651i2', array('id' => '651i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - Encabezamientos de Materia de la Library of Congress',
				'1' => '1 - Encabezamientos de Materia de LC para literatura infantil',
				'2' => '2 - Encabezamientos de Materia de Medicina',
				'3' => '3 - Fichero de autoridades de materia de la National Agricultural Library',
				'4' => '4 - Fuente no especificada',
				'5' => '5 - Encabezamientos de Materia de Canadá',
				'6' => '6 - Répertoire de vedettes-matière',
				'7' => '7 - Fuente especificada en el subcampo $2'
			), 'selected' => substr($c651['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Materia.</td>
		<td>
			<?php
			if (isset($c651['a'])) {
				echo $this->Form->input('651a', array('id' => '651a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c651['a']));
			} else {
				echo $this->Form->input('651a', array('id' => '651a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Subdivisión de forma.</td>
		<td>
			<?php
			if (isset($c651['v'])) {
				echo $this->Form->input('651v', array('id' => '651v', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c651['v']));
			} else {
				echo $this->Form->input('651v', array('id' => '651v', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Subdivisión de materia general.</td>
		<td>
			<?php
			if (isset($c651['x'])) {
				echo $this->Form->input('651x', array('id' => '651x', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c651['x']));
			} else {
				echo $this->Form->input('651x', array('id' => '651x', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Subdivisión cronológica.</td>
		<td>
			<?php
			if (isset($c651['y'])) {
				echo $this->Form->input('651y', array('id' => '651y', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c651['y']));
			} else {
				echo $this->Form->input('651y', array('id' => '651y', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Subdivisión geográfica.</td>
		<td>
			<?php
			if (isset($c651['z'])) {
				echo $this->Form->input('651z', array('id' => '651z', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c651['z']));
			} else {
				echo $this->Form->input('651z', array('id' => '651z', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c653 = marc21_decode($item['Item']['653']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>653</b></th>
		<th style="width: 45%;"><b>Término de indización – No controlado.</b></th>
		<th style="width: 45%;">
			<label id="l-653"><?php echo $item['Item']['653']; ?></label>
			<?php echo $this->Form->hidden('653', array('id' => '653', 'label' => false, 'div' => false, 'value' => $item['Item']['653'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Nivel del término de indización.</td>
		<td><?php echo $this->Form->input('653i1', array('id' => '653i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - No se especifica',
				'1' => '1 - Principal',
				'2' => '2 - Secundaria'
			), 'selected' => substr($c653['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tipo de término o nombre.</td>
		<td><?php echo $this->Form->input('653i2', array('id' => '653i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Término de materia',
				'1' => '1 - Nombre de persona',
				'2' => '2 - Nombre de entidad',
				'3' => '3 - Nombre de congreso',
				'4' => '4 - Término cronológico',
				'5' => '5 - Nombre geográfico',
				'6' => '6 - Término de género/forma'
			), 'selected' => substr($c653['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Palabra clave.</td>
		<td>
			<?php
			if (isset($c653['a'])) {
				echo $this->Form->input('653a', array('id' => '653a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c653['a']));
			} else {
				echo $this->Form->input('653a', array('id' => '653a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>
<script type="text/javascript">
	$("#653a").tagit({
	    availableTags: [<?php echo $this->requestAction('/magazines/tags'); ?>]
	});
</script>

<?php $c690 = marc21_decode($item['Item']['690']); ?>
<table class="table" style="display: none;">
	<tr>
		<th style="width: 10%;"><b>690</b></th>
		<th style="width: 45%;"><b>Siglo.</b></th>
		<th style="width: 45%;">
			<label id="l-690"><?php echo $item['Item']['690']; ?></label>
			<?php echo $this->Form->hidden('690', array('id' => '690', 'label' => false, 'div' => false, 'value' => $item['Item']['690'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Siglo.</td>
		<td><?php echo $this->Form->input('690a', array('id' => '690a', 'label' => false, 'div' => false, 'class' => 'form-control', 'selected' => $c690['a'], 'options' => array('XVII' => 'XVII', 'XVIII' => 'XVIII', 'XIX' => 'XIX', 'XX' => 'XX'))); ?></td>
	</tr>
</table>
</div>

<div id="7xx" class="tabs" style="display: none;">
<?php $c700 = marc21_decode($item['Item']['700']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>700</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional - Nombre personal.</b></th>
		<th style="width: 45%;">
			<label id="l-700"><?php echo $item['Item']['700']; ?></label>
			<?php echo $this->Form->hidden('700', array('id' => '700', 'label' => false, 'div' => false, 'value' => $item['Item']['700'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de elemento inicial del nombre de persona.</td>
		<td><?php echo $this->Form->input('700i1', array('id' => '700i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Nombre',
				'1' => '1 - Apellido(s)',
				'3' => '3 - Nombre de familia'
			), 'selected' => substr($c700['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tipo de punto de acceso adicional.</td>
		<td><?php echo $this->Form->input('700i2', array('id' => '700i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'2' => '2 - Entrada analítica'
			), 'selected' => substr($c700['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de persona.</td>
		<td>
			<?php
			if (isset($c700['a'])) {
				echo $this->Form->input('700a', array('id' => '700a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c700['a']));
			} else {
				echo $this->Form->input('700a', array('id' => '700a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Numeración.</td>
		<td>
			<?php
			if (isset($c700['b'])) {
				echo $this->Form->input('700b', array('id' => '700b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c700['b']));
			} else {
				echo $this->Form->input('700b', array('id' => '700b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Títulos y otros términos asociados al nombre.</td>
		<td>
			<?php
			if (isset($c700['c'])) {
				echo $this->Form->input('700c', array('id' => '700c', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c700['c']));
			} else {
				echo $this->Form->input('700c', array('id' => '700c', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Fechas asociadas al nombre.</td>
		<td>
			<?php
			if (isset($c700['d'])) {
				echo $this->Form->input('700d', array('id' => '700d', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c700['d']));
			} else {
				echo $this->Form->input('700d', array('id' => '700d', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Término indicativo de función.</td>
		<td>
			<?php
			if (isset($c700['e'])) {
				echo $this->Form->input('700e', array('id' => '700e', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c700['e']));
			} else {
				echo $this->Form->input('700e', array('id' => '700e', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$q</b></td>
		<td>Forma desarrollada del nombre.</td>
		<td>
			<?php
			if (isset($c700['q'])) {
				echo $this->Form->input('700q', array('id' => '700q', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c700['q']));
			} else {
				echo $this->Form->input('700q', array('id' => '700q', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$t</b></td>
		<td>Título de la obra.</td>
		<td>
			<?php
			if (isset($c700['t'])) {
				echo $this->Form->input('700t', array('id' => '700t', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c700['t']));
			} else {
				echo $this->Form->input('700t', array('id' => '700t', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$4</b></td>
		<td>Código de función.</td>
		<td>
			<?php
			if (isset($c700['4'])) {
				echo $this->Form->input('7004', array('id' => '7004', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c700['4']));
			} else {
				echo $this->Form->input('7004', array('id' => '7004', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c710 = marc21_decode($item['Item']['710']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>710</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional - Nombre de entidad.</b></th>
		<th style="width: 45%;">
			<label id="l-710"><?php echo $item['Item']['710']; ?></label>
			<?php echo $this->Form->hidden('710', array('id' => '710', 'label' => false, 'div' => false, 'value' => $item['Item']['710'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de elemento inicial del  nombre de entidad.</td>
		<td><?php echo $this->Form->input('710i1', array('id' => '710i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Nombre en orden inverso',
				'1' => '1 – Nombre de jurisdicción',
				'3' => '3 - Nombre en orden directo'
			), 'selected' => substr($c710['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tipo de punto de acceso adicional.</td>
		<td><?php echo $this->Form->input('710i2', array('id' => '710i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'2' => '2 - Entrada analítica'
			), 'selected' => substr($c710['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de entidad o nombre de jurisdicción como elemento inicial.</td>
		<td>
			<?php
			if (isset($c710['a'])) {
				echo $this->Form->input('710a', array('id' => '710a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['a']));
			} else {
				echo $this->Form->input('710a', array('id' => '710a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Unidad subordinada.</td>
		<td>
			<?php
			if (isset($c710['b'])) {
				echo $this->Form->input('710b', array('id' => '710b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['b']));
			} else {
				echo $this->Form->input('710b', array('id' => '710b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Sede del congreso.</td>
		<td>
			<?php
			if (isset($c710['c'])) {
				echo $this->Form->input('710c', array('id' => '710c', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['c']));
			} else {
				echo $this->Form->input('710c', array('id' => '710c', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Fecha del congreso o de la firma de un tratado.</td>
		<td>
			<?php
			if (isset($c710['d'])) {
				echo $this->Form->input('710d', array('id' => '710d', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['d']));
			} else {
				echo $this->Form->input('710d', array('id' => '710d', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Término indicativo de función.</td>
		<td>
			<?php
			if (isset($c710['e'])) {
				echo $this->Form->input('710e', array('id' => '710e', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['e']));
			} else {
				echo $this->Form->input('710e', array('id' => '710e', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$f</b></td>
		<td>Fecha de publicación.</td>
		<td>
			<?php
			if (isset($c710['f'])) {
				echo $this->Form->input('710f', array('id' => '710f', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['f']));
			} else {
				echo $this->Form->input('710f', array('id' => '710f', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$g</b></td>
		<td>Información miscelánea.</td>
		<td>
			<?php
			if (isset($c710['g'])) {
				echo $this->Form->input('710g', array('id' => '710g', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['g']));
			} else {
				echo $this->Form->input('710g', array('id' => '710g', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$h</b></td>
		<td>Tipo de material.</td>
		<td>
			<?php
			if (isset($c710['h'])) {
				echo $this->Form->input('710h', array('id' => '710h', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['h']));
			} else {
				echo $this->Form->input('710h', array('id' => '710h', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$i</b></td>
		<td>Información sobre la relación.</td>
		<td>
			<?php
			if (isset($c710['i'])) {
				echo $this->Form->input('710i', array('id' => '710i', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['i']));
			} else {
				echo $this->Form->input('710i', array('id' => '710i', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$k</b></td>
		<td>Subencabezamiento de forma.</td>
		<td>
			<?php
			if (isset($c710['k'])) {
				echo $this->Form->input('710k', array('id' => '710k', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['k']));
			} else {
				echo $this->Form->input('710k', array('id' => '710k', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$l</b></td>
		<td>Lengua de la obra.</td>
		<td>
			<?php
			if (isset($c710['l'])) {
				echo $this->Form->input('710l', array('id' => '710l', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['l']));
			} else {
				echo $this->Form->input('710l', array('id' => '710l', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$m</b></td>
		<td>Medio de interpretación.</td>
		<td>
			<?php
			if (isset($c710['m'])) {
				echo $this->Form->input('710m', array('id' => '710m', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['m']));
			} else {
				echo $this->Form->input('710m', array('id' => '710m', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Número del congreso o número de parte o sección de la obra.</td>
		<td>
			<?php
			if (isset($c710['n'])) {
				echo $this->Form->input('710n', array('id' => '710n', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['n']));
			} else {
				echo $this->Form->input('710n', array('id' => '710n', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$o</b></td>
		<td>Arreglo.</td>
		<td>
			<?php
			if (isset($c710['o'])) {
				echo $this->Form->input('710o', array('id' => '710o', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['o']));
			} else {
				echo $this->Form->input('710o', array('id' => '710o', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Nombre de parte o sección de la obra.</td>
		<td>
			<?php
			if (isset($c710['p'])) {
				echo $this->Form->input('710p', array('id' => '710p', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['p']));
			} else {
				echo $this->Form->input('710p', array('id' => '710p', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$r</b></td>
		<td>Tonalidad.</td>
		<td>
			<?php
			if (isset($c710['r'])) {
				echo $this->Form->input('710r', array('id' => '710r', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['r']));
			} else {
				echo $this->Form->input('710r', array('id' => '710r', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$s</b></td>
		<td>Versión.</td>
		<td>
			<?php
			if (isset($c710['s'])) {
				echo $this->Form->input('710s', array('id' => '710s', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['s']));
			} else {
				echo $this->Form->input('710s', array('id' => '710s', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$t</b></td>
		<td>Título de la obra.</td>
		<td>
			<?php
			if (isset($c710['t'])) {
				echo $this->Form->input('710t', array('id' => '710t', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['t']));
			} else {
				echo $this->Form->input('710t', array('id' => '710t', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$u</b></td>
		<td>Filiación.</td>
		<td>
			<?php
			if (isset($c710['u'])) {
				echo $this->Form->input('710u', array('id' => '710u', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['u']));
			} else {
				echo $this->Form->input('710u', array('id' => '710u', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Número Internacional Normalizado para Publicaciones Seriadas (ISSN).</td>
		<td>
			<?php
			if (isset($c710['x'])) {
				echo $this->Form->input('710x', array('id' => '710x', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['x']));
			} else {
				echo $this->Form->input('710x', array('id' => '710x', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c740 = marc21_decode($item['Item']['740']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>740</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional - Título relacionado o analítico no controlado.</b></th>
		<th style="width: 45%;">
			<label id="l-740"><?php echo $item['Item']['740']; ?></label>
			<?php echo $this->Form->hidden('740', array('id' => '740', 'label' => false, 'div' => false, 'value' => $item['Item']['740'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Caracteres que no alfabetizan.</td>
		<td><?php echo $this->Form->input('740i1', array('id' => '740i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9',		
			), 'selected' => substr($c740['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tipo de asiento secundario.</td>
		<td><?php echo $this->Form->input('740i2', array('id' => '740i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - No hay punto de acceso adicional',
				'1' => '1 - Hay punto de acceso adicional'
			), 'selected' => substr($c740['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título relacionado o analítico no controlado.</td>
		<td>
			<?php
			if (isset($c740['a'])) {
				echo $this->Form->input('740a', array('id' => '740a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c740['a']));
			} else {
				echo $this->Form->input('740a', array('id' => '740a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Número de la parte o sección de una obra.</td>
		<td>
			<?php
			if (isset($c740['n'])) {
				echo $this->Form->input('740n', array('id' => '740n', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c740['n']));
			} else {
				echo $this->Form->input('740n', array('id' => '740n', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Nombre de la parte/sección de una obra.</td>
		<td>
			<?php
			if (isset($c740['p'])) {
				echo $this->Form->input('740p', array('id' => '740p', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c740['p']));
			} else {
				echo $this->Form->input('740p', array('id' => '740p', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c773 = marc21_decode($item['Item']['773']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>773</b></th>
		<th style="width: 45%;"><b>Enlace al documento fuente.</b></th>
		<th style="width: 45%;">
			<label id="l-773"><?php echo $item['Item']['773']; ?></label>
			<?php echo $this->Form->hidden('773', array('id' => '773', 'label' => false, 'div' => false, 'value' => $item['Item']['773'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de nota.</td>
		<td><?php echo $this->Form->input('773i1', array('id' => '773i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Genera nota',
				'1' => '1 - No genera nota'
			), 'selected' => substr($c773['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Control de visualización asociada.</td>
		<td><?php echo $this->Form->input('773i2', array('id' => '773i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - En',
				'8' => '8 - No genera visualización asociada'
			), 'selected' => substr($c773['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Autor.</td>
		<td>
			<?php
			if (isset($c773['a'])) {
				echo $this->Form->input('773a', array('id' => '773a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c773['a']));
			} else {
				echo $this->Form->input('773a', array('id' => '773a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Edición.</td>
		<td>
			<?php
			if (isset($c773['b'])) {
				echo $this->Form->input('773b', array('id' => '773b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c773['b']));
			} else {
				echo $this->Form->input('773b', array('id' => '773b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Lugar, editor y fecha de publicación.</td>
		<td>
			<?php
			if (isset($c773['d'])) {
				echo $this->Form->input('773d', array('id' => '773d', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c773['d']));
			} else {
				echo $this->Form->input('773d', array('id' => '773d', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$g</b></td>
		<td>Parte(s) relacionada(s).</td>
		<td>
			<?php
			if (isset($c773['g'])) {
				echo $this->Form->input('773g', array('id' => '773g', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c773['g']));
			} else {
				echo $this->Form->input('773g', array('id' => '773g', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$h</b></td>
		<td>Descripción física.</td>
		<td>
			<?php
			if (isset($c773['h'])) {
				echo $this->Form->input('773h', array('id' => '773h', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c773['h']));
			} else {
				echo $this->Form->input('773h', array('id' => '773h', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$k</b></td>
		<td>Datos de la serie del documento relacionado.</td>
		<td>
			<?php
			if (isset($c773['k'])) {
				echo $this->Form->input('773k', array('id' => '773k', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c773['k']));
			} else {
				echo $this->Form->input('773k', array('id' => '773k', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Nota.</td>
		<td>
			<?php
			if (isset($c773['n'])) {
				echo $this->Form->input('773n', array('id' => '773n', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c773['n']));
			} else {
				echo $this->Form->input('773n', array('id' => '773n', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$q</b></td>
		<td>Numeración y primera página.</td>
		<td>
			<?php
			if (isset($c773['q'])) {
				echo $this->Form->input('773q', array('id' => '773q', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c773['q']));
			} else {
				echo $this->Form->input('773q', array('id' => '773q', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$t</b></td>
		<td>Título.</td>
		<td>
			<?php
			if (isset($c773['t'])) {
				echo $this->Form->input('773t', array('id' => '773t', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c773['t']));
			} else {
				echo $this->Form->input('773t', array('id' => '773t', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Número Internacional Normalizado para Libros (ISBN).</td>
		<td>
			<?php
			if (isset($c773['z'])) {
				echo $this->Form->input('773z', array('id' => '773z', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c773['z']));
			} else {
				echo $this->Form->input('773z', array('id' => '773z', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>
</div>

<div id="8xx" class="tabs" style="display: none;">
<?php $c850 = marc21_decode($item['Item']['850']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>850</b></th>
		<th style="width: 45%;"><b>Institución que posee los fondos.</b></th>
		<th style="width: 45%;">
			<label id="l-850"><?php echo $item['Item']['850']; ?></label>
			<?php echo $this->Form->hidden('850', array('id' => '850', 'label' => false, 'div' => false, 'value' => $item['Item']['850'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de la institución que posee los fondos.</td>
		<td>
			<?php
			if (isset($c850['a'])) {
				echo $this->Form->input('850a', array('id' => '850a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c850['a']));
			} else {
				echo $this->Form->input('850a', array('id' => '850a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c852 = marc21_decode($item['Item']['852']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>852</b></th>
		<th style="width: 45%;"><b>Localización.</b></th>
		<th style="width: 45%;">
			<label id="l-852"><?php echo $item['Item']['852']; ?></label>
			<?php echo $this->Form->hidden('852', array('id' => '852', 'label' => false, 'div' => false, 'value' => $item['Item']['852'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Sistema de colocación.</td>
		<td><?php echo $this->Form->input('852i1', array('id' => '852i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Clasificación de la Biblioteca del Congreso',
				'1' => '1 - Clasificación Decimal Dewey',
				'2' => '2 - Clasificación de la National Library of Medicine',
				'3' => '3 - Clasificación del Superintendent of Documents',
				'4' => '4 - Por número de control en estantería',
				'5' => '5 - Por título',
				'6' => '6 - Colocación dispersa',
				'7' => '7 - Fuente especificada en el subcampo $2',
				'8' => '8 - Otro sistema'
			), 'selected' => substr($c852['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Orden de colocación.</td>
		<td><?php echo $this->Form->input('852i2', array('id' => '852i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Sin numeración',
				'1' => '1 - Por numeración principal',
				'2' => '2 - Por numeración alternativa'
			), 'selected' => substr($c852['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Localización.</td>
		<td>
			<?php
			if (isset($c852['a'])) {
				echo $this->Form->input('852a', array('id' => '852a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c852['a']));
			} else {
				echo $this->Form->input('852a', array('id' => '852a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Sublocalización o colección.</td>
		<td>
			<?php
			if (isset($c852['b'])) {
				echo $this->Form->input('852b', array('id' => '852b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c852['b']));
			} else {
				echo $this->Form->input('852b', array('id' => '852b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Ubicación en estantería.</td>
		<td>
			<?php
			if (isset($c852['c'])) {
				echo $this->Form->input('852c', array('id' => '852c', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c852['c']));
			} else {
				echo $this->Form->input('852c', array('id' => '852c', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$h</b></td>
		<td>Parte de la signatura que corresponde a la clasificación.</td>
		<td>
			<?php
			if (isset($c852['h'])) {
				echo $this->Form->input('852h', array('id' => '852h', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c852['h']));
			} else {
				echo $this->Form->input('852h', array('id' => '852h', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$i</b></td>
		<td>Parte de la signatura que identifica al ejemplar.</td>
		<td>
			<?php
			if (isset($c852['i'])) {
				echo $this->Form->input('852i', array('id' => '852i', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c852['i']));
			} else {
				echo $this->Form->input('852i', array('id' => '852i', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$j</b></td>
		<td>Número de control en estantería.</td>
		<td>
			<?php
			if (isset($c852['j'])) {
				echo $this->Form->input('852j', array('id' => '852j', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c852['j']));
			} else {
				echo $this->Form->input('852j', array('id' => '852j', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$k</b></td>
		<td>Prefijo de la signatura.</td>
		<td>
			<?php
			if (isset($c852['k'])) {
				echo $this->Form->input('852k', array('id' => '852k', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c852['k']));
			} else {
				echo $this->Form->input('852k', array('id' => '852k', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$m</b></td>
		<td>Sufijo de la signatura.</td>
		<td>
			<?php
			if (isset($c852['m'])) {
				echo $this->Form->input('852m', array('id' => '852m', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c852['m']));
			} else {
				echo $this->Form->input('852m', array('id' => '852m', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c856 = marc21_decode($item['Item']['856']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>856</b></th>
		<th style="width: 45%;"><b>Localización y acceso electrónicos.</b></th>
		<th style="width: 45%;">
			<label id="l-856"><?php echo $item['Item']['856']; ?></label>
			<?php echo $this->Form->hidden('856', array('id' => '856', 'label' => false, 'div' => false, 'value' => $item['Item']['856'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Método de acceso.</td>
		<td><?php echo $this->Form->input('856i1', array('id' => '856i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Correo electrónico',
				'1' => '1 - FTP',
				'2' => '2 - Conexión remota (Telnet)',
				'3' => '3 - Llamada telefónica',
				'4' => '4 – HTTP',
				'7' => '7 - Método especificado en el subcampo $2'
			), 'selected' => substr($c856['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Relación.</td>
		<td><?php echo $this->Form->input('856i2', array('id' => '856i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Recurso',
				'1' => '1 - Versión del recurso',
				'2' => '2 - Recurso relacionado',
				'8' => '8 - No hay visualización asociada'
			), 'selected' => substr($c856['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre del host.</td>
		<td>
			<?php
			if (isset($c856['a'])) {
				echo $this->Form->input('856a', array('id' => '856a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c856['a']));
			} else {
				echo $this->Form->input('856a', array('id' => '856a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Ruta.</td>
		<td>
			<?php
			if (isset($c856['d'])) {
				echo $this->Form->input('856d', array('id' => '856d', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c856['d']));
			} else {
				echo $this->Form->input('856d', array('id' => '856d', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$u</b></td>
		<td>Dirección electrónica.</td>
		<td>
			<?php
			if (isset($c856['u'])) {
				echo $this->Form->input('856u', array('id' => '856u', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c856['u']));
			} else {
				echo $this->Form->input('856u', array('id' => '856u', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

</div>

<?php echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Auth.User.id'))); ?>
	
	<table class="table">
		<tr>
			<th style="width: 50%;">Portada de la obra (preferiblemente jpg o gif).</th>
			<th style="width: 50%;">Archivo o Documento (preferiblemente pdf o doc).</th>
		</tr>
		<tr>
			<td>
				<div style="float: left; width: 20%;">
				<?php
					if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){
						if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/webroot/attachments/files/med/" . $item['Item']['cover_path']))){
							echo $this->Html->image("/webroot/attachments/files/med/" . $item['Item']['cover_path'], array('width' => '70px'));
						} else {
							echo $this->Html->image("/webroot/img/sin_portada.jpg", array('width' => '70px'));
						}
					} else {
						if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/attachments/files/med/" . $item['Item']['cover_path']))){
							echo $this->Html->image("/app/webroot/attachments/files/med/" . $item['Item']['cover_path'], array('width' => '70px'));
						} else {
							echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('width' => '70px'));
						}
					}
				?>
				</div>
				<div style="float: left; width: 80%;">
				<br />
				<?php echo $this->Form->input('cover', array('label' => false, 'type' => 'file', 'style' => 'width: 100%')); ?>
				</div>
			</td>
			<td>
				<br />
				<?php
					echo $this->Form->input('item', array('label' => false, 'type' => 'file', 'style' => 'width: 100%'));
					echo "<b>Tamaño máximo permitido: " . ini_get('upload_max_filesize') . '.</b>';
				?>
			</td>
		</tr>
	</table>
	
	<input type="checkbox" id="MagazinePublished" value="1" checked="checked" name="data[Magazine][published]" style="width: 30px;">Publicado
	
	<div style="text-align: right;"><a href="#top" class="btn btn-primary">Ir Arriba</a></div>
	
	<br />
	
	<div class="text-center">
		<?php
			echo $this->Form->submit('Guardar', array('id' => 'guardar', 'class' => 'btn btn-primary', 'div' => false));
			echo "&nbsp;";
			//echo $this->Form->link('Cancelar', array('id' => 'cancelar', 'class' => 'btn btn-primary', 'div' => false, 'style' => 'width: 200px;'));
			echo $this->Html->link('Cancelar', 'view/'.$item['Item']['id'], array('class' => 'btn btn-primary', 'style' => 'width: 200px;'));
		?>
	</div>
	
<?php echo $this->Form->end();?>
</div>
</div>

<div style="clear: both;"></div>

<script type="text/javascript">
$(document).ready(function() {

	//-------------- Pestañas ---------------

	$(".tab").click(function(event) {
		var id = $(this).attr('id');

		if (id.localeCompare("t4xx") && id.localeCompare("t9xx")) {
			$(".tabs").hide();
			$('.active').removeClass('active');
			$(this).parent().addClass('active');
		}

		if (id == "t0xx"){ $('#0xx').show(); }
		if (id == "t1xx"){ $('#1xx').show(); }
		if (id == "t2xx"){ $('#2xx').show(); }
		if (id == "t3xx"){ $('#3xx').show(); }
		//if (id == "t4xx"){ $('#4xx').show(); }
		if (id == "t5xx"){ $('#5xx').show(); }
		if (id == "t6xx"){ $('#6xx').show(); }
		if (id == "t7xx"){ $('#7xx').show(); }
		if (id == "t8xx"){ $('#8xx').show(); }
		//if (id == "t9xx"){ $('#9xx').show(); }

		return false;
	});
	
	//-------------- Validaciones ---------------
	
	$("#008-07-10").change(function(event) {
		if($("#008-07-10 option:selected").val() != 'pf'){
			$("#fecha008-07-10").prop('disabled', true);
			$("#fecha008-07-10").val('');
		} else {
			$("#fecha008-07-10").prop('disabled', false);
		}
	});

	$("#fecha008-07-10").bind('blur', function(event) {
		if (!$("#fecha008-07-10").prop("disabled") && ($("#fecha008-07-10").val().length < 4)) {
			alert("La primera fecha debe tener 4 dígitos correspondientes al año.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t0xx').parent().addClass('active');
			$('#0xx').show();
			$('#fecha008-07-10').focus();
			return false;
		} else {
			if ((!$("#fecha008-07-10").prop("disabled")) && ((isNaN($("#fecha008-07-10").val())))) {
				alert("La primera fecha debe ser un valor numérico.");
				$(".tabs").hide();
				$('.active').removeClass('active');
				$('#t0xx').parent().addClass('active');
				$('#0xx').show();
				$('#fecha008-07-10').focus();
				return false;
			}
		}
	});
	
	$("#008-11-14").change(function(event) {
		if($("#008-11-14 option:selected").val() != 'sf'){
			$("#fecha008-11-14").prop('disabled', true);
			$("#fecha008-11-14").val('');
		} else {
			$("#fecha008-11-14").prop('disabled', false);
		}
	});

	$("#fecha008-11-14").bind('blur', function(event) {
		if (!$("#fecha008-11-14").prop("disabled") && ($("#fecha008-11-14").val().length < 4)) {
			alert("La segunda fecha debe tener 4 dígitos correspondientes al año.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t0xx').parent().addClass('active');
			$('#0xx').show();
			$('#fecha008-11-14').focus();
			return false;
		} else {
			if ((!$("#fecha008-11-14").prop("disabled")) && ((isNaN($("#fecha008-11-14").val())))) {
				alert("La segunda fecha debe ser un valor numérico.");
				$(".tabs").hide();
				$('.active').removeClass('active');
				$('#t0xx').parent().addClass('active');
				$('#0xx').show();
				$('#fecha008-11-14').focus();
				return false;
			}
		}
	});
	
	// El campo 008 al cargar la pagina.
	/*var tmp_008 = "";

	if ($('#008-06').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-06').val();
	}

	if ($('#008-07-10').val().length > 0) {
		if($("#008-07-10 option:selected").val() != 'pf'){
			tmp_008 = tmp_008 + $('#008-07-10').val();
		} else {
			tmp_008 = tmp_008 + $('#fecha008-07-10').val();
		}
	}

	if ($('#008-11-14').val().length > 0) {
		if($("#008-11-14 option:selected").val() != 'sf'){
			tmp_008 = tmp_008 + $('#008-11-14').val();
		} else {
			tmp_008 = tmp_008 + $('#fecha008-11-14').val();
		}
	}

	if ($('#008-15-17').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-15-17').val();
	}

	if ($('#008-18').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-18').val();
	}

	if ($('#008-19').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-19').val();
	}

	if ($('#008-20').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-20').val();
	}

	if ($('#008-21').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-21').val();
	}

	if ($('#008-35-37').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-35-37').val();
	}
	
	if (tmp_008.length > 0) {
		$("#008").val('<?php //echo date('ymd', time()); ?>' + tmp_008);
		$("#l-008").html('<?php //echo date('ymd', time()); ?>' + tmp_008);
	} else {
		$("#008").val('');
		$("#l-008").html('&nbsp;');
	}*/
	
	$("#008-06").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-07-10").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#fecha008-07-10").bind('keyup change', function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-11-14").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#fecha008-11-14").bind('keyup change', function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});
	
	$("#008-15-17").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-18").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-19").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-20").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-21").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-35-37").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});
	
	$("#017a").bind('keyup change', function(event) {
		if ($('#017a').val().length > 0) {
			$("#017").val('##' + '^a' + $('#017a').val());
			$("#l-017").html('##' + '^a' + $('#017a').val());
		} else {
			$("#017").val('');
			$("#l-017").html('&nbsp;');
		}
	});

	$("#020a").bind('keyup change', function(event) {
		var tmp_020 = "";

		if ($('#020a').val().length > 0) {
			tmp_020 = tmp_020 + '^a' + $('#020a').val();
		}

		if ($('#020c').val().length > 0) {
			tmp_020 = tmp_020 + '^c' + $('#020c').val();
		}
		
		if ($('#020z').val().length > 0) {
			tmp_020 = tmp_020 + '^z' + $('#020z').val();
		}

		if (tmp_020.length > 0) {
			$("#020").val('##' + tmp_020);
			$("#l-020").html('##' + tmp_020);
		} else {
			$("#020").val('');
			$("#l-020").html('&nbsp;');
		}
	});

	$("#020c").bind('keyup change', function(event) {
		var tmp_020 = "";

		if ($('#020a').val().length > 0) {
			tmp_020 = tmp_020 + '^a' + $('#020a').val();
		}

		if ($('#020c').val().length > 0) {
			tmp_020 = tmp_020 + '^c' + $('#020c').val();
		}
		
		if ($('#020z').val().length > 0) {
			tmp_020 = tmp_020 + '^z' + $('#020z').val();
		}

		if (tmp_020.length > 0) {
			$("#020").val('##' + tmp_020);
			$("#l-020").html('##' + tmp_020);
		} else {
			$("#020").val('');
			$("#l-020").html('&nbsp;');
		}
	});

	$("#020z").bind('keyup change', function(event) {
		var tmp_020 = "";

		if ($('#020a').val().length > 0) {
			tmp_020 = tmp_020 + '^a' + $('#020a').val();
		}

		if ($('#020c').val().length > 0) {
			tmp_020 = tmp_020 + '^c' + $('#020c').val();
		}
		
		if ($('#020z').val().length > 0) {
			tmp_020 = tmp_020 + '^z' + $('#020z').val();
		}

		if (tmp_020.length > 0) {
			$("#020").val('##' + tmp_020);
			$("#l-020").html('##' + tmp_020);
		} else {
			$("#020").val('');
			$("#l-020").html('&nbsp;');
		}
	});
	
	$("#022a").bind('keyup change', function(event) {
		var tmp_022 = "";

		if ($('#022a').val().length > 0) {
			tmp_022 = tmp_022 + '^a' + $('#022a').val();
		}

		if ($('#022y').val().length > 0) {
			tmp_022 = tmp_022 + '^y' + $('#022y').val();
		}
		
		if ($('#022z').val().length > 0) {
			tmp_022 = tmp_022 + '^z' + $('#022z').val();
		}

		if (tmp_022.length > 0) {
			$("#022").val('##' + tmp_022);
			$("#l-022").html('##' + tmp_022);
		} else {
			$("#022").val('');
			$("#l-022").html('&nbsp;');
		}
	});

	$("#022y").bind('keyup change', function(event) {
		var tmp_022 = "";

		if ($('#022a').val().length > 0) {
			tmp_022 = tmp_022 + '^a' + $('#022a').val();
		}

		if ($('#022y').val().length > 0) {
			tmp_022 = tmp_022 + '^y' + $('#022y').val();
		}
		
		if ($('#022z').val().length > 0) {
			tmp_022 = tmp_022 + '^z' + $('#022z').val();
		}

		if (tmp_022.length > 0) {
			$("#022").val('##' + tmp_022);
			$("#l-022").html('##' + tmp_022);
		} else {
			$("#022").val('');
			$("#l-022").html('&nbsp;');
		}
	});

	$("#022z").bind('keyup change', function(event) {
		var tmp_022 = "";

		if ($('#022a').val().length > 0) {
			tmp_022 = tmp_022 + '^a' + $('#022a').val();
		}

		if ($('#022y').val().length > 0) {
			tmp_022 = tmp_022 + '^y' + $('#022y').val();
		}
		
		if ($('#022z').val().length > 0) {
			tmp_022 = tmp_022 + '^z' + $('#022z').val();
		}

		if (tmp_022.length > 0) {
			$("#022").val('##' + tmp_022);
			$("#l-022").html('##' + tmp_022);
		} else {
			$("#022").val('');
			$("#l-022").html('&nbsp;');
		}
	});

	$("#028a").bind('keyup change', function(event) {
		var tmp_028 = "";

		if ($('#028a').val().length > 0) {
			tmp_028 = tmp_028 + '^a' + $('#028a').val();
		}

		if ($('#028b').val().length > 0) {
			tmp_028 = tmp_028 + '^b' + $('#028b').val();
		}

		if (tmp_028.length > 0) {
			$("#028").val('20' + tmp_028);
			$("#l-028").html('20' + tmp_028);
		} else {
			$("#028").val('');
			$("#l-028").html('&nbsp;');
		}
	});

	$("#028b").bind('keyup change', function(event) {
		var tmp_028 = "";

		if ($('#028a').val().length > 0) {
			tmp_028 = tmp_028 + '^a' + $('#028a').val();
		}

		if ($('#028b').val().length > 0) {
			tmp_028 = tmp_028 + '^b' + $('#028b').val();
		}

		if (tmp_028.length > 0) {
			$("#028").val('20' + tmp_028);
			$("#l-028").html('20' + tmp_028);
		} else {
			$("#028").val('');
			$("#l-028").html('&nbsp;');
			
		}		
	});

	$("#040a").bind('keyup change', function(event) {
		var tmp_040 = "";

		if ($('#040a').val().length > 0) {
			tmp_040 = tmp_040 + '^a' + $('#040a').val();
		}

		if (tmp_040.length > 0) {
			$("#040").val('##' + tmp_040);
			$("#l-040").html('##' + tmp_040);
		} else {
			$("#040").val('');
			$("#l-040").html('&nbsp;');
		}
	});

	$("#041i1").change(function(event) {
		var tmp_041 = "";

		if ($('#041a').val().length > 0) {
			tmp_041 = tmp_041 + '^a' + $('#041a').val();
		}

		if ($('#041b').val().length > 0) {
			tmp_041 = tmp_041 + '^b' + $('#041b').val();
		}
		
		if ($('#041h').val().length > 0) {
			tmp_041 = tmp_041 + '^h' + $('#041h').val();
		}
		
		if (tmp_041.length > 0) {
			$("#041").val($("#041i1").val() + $("#041i2").val() + tmp_041);
			$("#l-041").html($("#041i1").val() + $("#041i2").val() + tmp_041);
		} else {
			$("#041").val('');
			$("#l-041").html('&nbsp;');
		}
	});

	$("#041i2").change(function(event) {
		var tmp_041 = "";

		if ($('#041a').val().length > 0) {
			tmp_041 = tmp_041 + '^a' + $('#041a').val();
		}

		if ($('#041b').val().length > 0) {
			tmp_041 = tmp_041 + '^b' + $('#041b').val();
		}
		
		if ($('#041h').val().length > 0) {
			tmp_041 = tmp_041 + '^h' + $('#041h').val();
		}
		
		if (tmp_041.length > 0) {
			$("#041").val($("#041i1").val() + $("#041i2").val() + tmp_041);
			$("#l-041").html($("#041i1").val() + $("#041i2").val() + tmp_041);
		} else {
			$("#041").val('');
			$("#l-041").html('&nbsp;');
		}
	});

	$("#041a").bind('keyup change', function(event) {
		var tmp_041 = "";

		if ($('#041a').val().length > 0) {
			tmp_041 = tmp_041 + '^a' + $('#041a').val();
		}

		if ($('#041b').val().length > 0) {
			tmp_041 = tmp_041 + '^b' + $('#041b').val();
		}
		
		if ($('#041h').val().length > 0) {
			tmp_041 = tmp_041 + '^h' + $('#041h').val();
		}
		
		if (tmp_041.length > 0) {
			$("#041").val($("#041i1").val() + $("#041i2").val() + tmp_041);
			$("#l-041").html($("#041i1").val() + $("#041i2").val() + tmp_041);
		} else {
			$("#041").val('');
			$("#l-041").html('&nbsp;');
		}
	});
	
	$("#041b").bind('keyup change', function(event) {
		var tmp_041 = "";

		if ($('#041a').val().length > 0) {
			tmp_041 = tmp_041 + '^a' + $('#041a').val();
		}

		if ($('#041b').val().length > 0) {
			tmp_041 = tmp_041 + '^b' + $('#041b').val();
		}

		if ($('#041h').val().length > 0) {
			tmp_041 = tmp_041 + '^h' + $('#041h').val();
		}
		
		if (tmp_041.length > 0) {
			$("#041").val($("#041i1").val() + $("#041i2").val() + tmp_041);
			$("#l-041").html($("#041i1").val() + $("#041i2").val() + tmp_041);
		} else {
			$("#041").val('');
			$("#l-041").html('&nbsp;');
		}
	});

	$("#041h").bind('keyup change', function(event) {
		var tmp_041 = "";

		if ($('#041a').val().length > 0) {
			tmp_041 = tmp_041 + '^a' + $('#041a').val();
		}

		if ($('#041b').val().length > 0) {
			tmp_041 = tmp_041 + '^b' + $('#041b').val();
		}

		if ($('#041h').val().length > 0) {
			tmp_041 = tmp_041 + '^h' + $('#041h').val();
		}
		
		if (tmp_041.length > 0) {
			$("#041").val($("#041i1").val() + $("#041i2").val() + tmp_041);
			$("#l-041").html($("#041i1").val() + $("#041i2").val() + tmp_041);
		} else {
			$("#041").val('');
			$("#l-041").html('&nbsp;');
		}
	});

	$("#044a").bind('keyup change', function(event) {
		if ($('#044a').val().length > 0) {
			$("#044").val('##' + '^a' + $('#044a').val());
			$("#l-044").html('##' + '^a' + $('#044a').val());
		} else {
			$("#044").val('');
			$("#l-044").html('&nbsp;');
		}
	});

	$("#082i1").change(function(event) {
		var tmp_082 = "";

		if ($('#082a').val().length > 0) {
			tmp_082 = tmp_082 + '^a' + $('#082a').val();
		}

		if ($('#082b').val().length > 0) {
			tmp_082 = tmp_082 + '^b' + $('#082b').val();
		}
		
		if (tmp_082.length > 0) {
			$("#082").val($("#082i1").val() + $("#082i2").val() + tmp_082);
			$("#l-082").html($("#082i1").val() + $("#082i2").val() + tmp_082);
		} else {
			$("#082").val('');
			$("#l-082").html('&nbsp;');
		}
	});

	$("#082i2").change(function(event) {
		var tmp_082 = "";

		if ($('#082a').val().length > 0) {
			tmp_082 = tmp_082 + '^a' + $('#082a').val();
		}

		if ($('#082b').val().length > 0) {
			tmp_082 = tmp_082 + '^b' + $('#082b').val();
		}
		
		if (tmp_082.length > 0) {
			$("#082").val($("#082i1").val() + $("#082i2").val() + tmp_082);
			$("#l-082").html($("#082i1").val() + $("#082i2").val() + tmp_082);
		} else {
			$("#082").val('');
			$("#l-082").html('&nbsp;');
		}
	});

	$("#082a").bind('keyup change', function(event) {
		var tmp_082 = "";

		if ($('#082a').val().length > 0) {
			tmp_082 = tmp_082 + '^a' + $('#082a').val();
		}

		if ($('#082b').val().length > 0) {
			tmp_082 = tmp_082 + '^b' + $('#082b').val();
		}
		
		if (tmp_082.length > 0) {
			$("#082").val($("#082i1").val() + $("#082i2").val() + tmp_082);
			$("#l-082").html($("#082i1").val() + $("#082i2").val() + tmp_082);
		} else {
			$("#082").val('');
			$("#l-082").html('&nbsp;');
		}
	});
	
	$("#082b").bind('keyup change', function(event) {
		var tmp_082 = "";

		if ($('#082a').val().length > 0) {
			tmp_082 = tmp_082 + '^a' + $('#082a').val();
		}

		if ($('#082b').val().length > 0) {
			tmp_082 = tmp_082 + '^b' + $('#082b').val();
		}

		if (tmp_082.length > 0) {
			$("#082").val($("#082i1").val() + $("#082i2").val() + tmp_082);
			$("#l-082").html($("#082i1").val() + $("#082i2").val() + tmp_082);
		} else {
			$("#082").val('');
			$("#l-082").html('&nbsp;');
		}
	});

	$("#092a").bind('keyup change', function(event) {
		var tmp_092 = "";

		if ($('#092a').val().length > 0) {
			tmp_092 = tmp_092 + '^a' + $('#092a').val();
		}

		if ($('#092b').val().length > 0) {
			tmp_092 = tmp_092 + '^b' + $('#092b').val();
		}
		
		if ($('#092c').val().length > 0) {
			tmp_092 = tmp_092 + '^c' + $('#092c').val();
		}

		if (tmp_092.length > 0) {
			$("#092").val('##' + tmp_092);
			$("#l-092").html('##' + tmp_092);
		} else {
			$("#092").val('');
			$("#l-092").html('&nbsp;');
		}
	});

	$("#092b").bind('keyup change', function(event) {
		var tmp_092 = "";

		if ($('#092a').val().length > 0) {
			tmp_092 = tmp_092 + '^a' + $('#092a').val();
		}

		if ($('#092b').val().length > 0) {
			tmp_092 = tmp_092 + '^b' + $('#092b').val();
		}
		
		if ($('#092c').val().length > 0) {
			tmp_092 = tmp_092 + '^c' + $('#092c').val();
		}

		if (tmp_092.length > 0) {
			$("#092").val('##' + tmp_092);
			$("#l-092").html('##' + tmp_092);
		} else {
			$("#092").val('');
			$("#l-092").html('&nbsp;');
		}
	});

	$("#092c").bind('keyup change', function(event) {
		var tmp_092 = "";

		if ($('#092a').val().length > 0) {
			tmp_092 = tmp_092 + '^a' + $('#092a').val();
		}

		if ($('#092b').val().length > 0) {
			tmp_092 = tmp_092 + '^b' + $('#092b').val();
		}
		
		if ($('#092c').val().length > 0) {
			tmp_092 = tmp_092 + '^c' + $('#092c').val();
		}

		if (tmp_092.length > 0) {
			$("#092").val('##' + tmp_092);
			$("#l-092").html('##' + tmp_092);
		} else {
			$("#092").val('');
			$("#l-092").html('&nbsp;');
		}
	});

	$("#100i1, #100i2, #100a, #100b, #100d").bind('keyup change', function(event) {
		var tmp_100 = "";

		if ($('#100a').val().length > 0) {
			tmp_100 = tmp_100 + '^a' + $('#100a').val();
		}

		if ($('#100b').val().length > 0) {
			tmp_100 = tmp_100 + '^b' + $('#100b').val();
		}

		if ($('#100d').val().length > 0) {
			tmp_100 = tmp_100 + '^d' + $('#100d').val();
		}
		
		if (tmp_100.length > 0) {
			$("#100").val($("#100i1").val() + $("#100i2").val() + tmp_100);
			$("#l-100").html($("#100i1").val() + $("#100i2").val() + tmp_100);
		} else {
			$("#100").val('');
			$("#l-100").html('&nbsp;');
		}
	});

	$("#110i1").change(function(event) {
		var tmp_110 = "";

		if ($('#110a').val().length > 0) {
			tmp_110 = tmp_110 + '^a' + $('#110a').val();
		}

		if ($('#110b').val().length > 0) {
			tmp_110 = tmp_110 + '^b' + $('#110b').val();
		}
		
		if (tmp_110.length > 0) {
			$("#110").val($("#110i1").val() + $("#110i2").val() + tmp_110);
			$("#l-110").html($("#110i1").val() + $("#110i2").val() + tmp_110);
		} else {
			$("#110").val('');
			$("#l-110").html('&nbsp;');
		}
	});

	$("#110i2").change(function(event) {
		var tmp_110 = "";

		if ($('#110a').val().length > 0) {
			tmp_110 = tmp_110 + '^a' + $('#110a').val();
		}

		if ($('#110b').val().length > 0) {
			tmp_110 = tmp_110 + '^b' + $('#110b').val();
		}
		
		if (tmp_110.length > 0) {
			$("#110").val($("#110i1").val() + $("#110i2").val() + tmp_110);
			$("#l-110").html($("#110i1").val() + $("#110i2").val() + tmp_110);
		} else {
			$("#110").val('');
			$("#l-110").html('&nbsp;');
		}
	});

	$("#110a").bind('keyup change', function(event) {
		var tmp_110 = "";

		if ($('#110a').val().length > 0) {
			tmp_110 = tmp_110 + '^a' + $('#110a').val();
		}

		if ($('#110b').val().length > 0) {
			tmp_110 = tmp_110 + '^b' + $('#110b').val();
		}
		
		if (tmp_110.length > 0) {
			$("#110").val($("#110i1").val() + $("#110i2").val() + tmp_110);
			$("#l-110").html($("#110i1").val() + $("#110i2").val() + tmp_110);
		} else {
			$("#110").val('');
			$("#l-110").html('&nbsp;');
		}
	});
	
	$("#110b").bind('keyup change', function(event) {
		var tmp_110 = "";

		if ($('#110a').val().length > 0) {
			tmp_110 = tmp_110 + '^a' + $('#110a').val();
		}

		if ($('#110b').val().length > 0) {
			tmp_110 = tmp_110 + '^b' + $('#110b').val();
		}

		if (tmp_110.length > 0) {
			$("#110").val($("#110i1").val() + $("#110i2").val() + tmp_110);
			$("#l-110").html($("#110i1").val() + $("#110i2").val() + tmp_110);
		} else {
			$("#110").val('');
			$("#l-110").html('&nbsp;');
		}
	});

	$("#130i1").change(function(event) {
		var tmp_130 = "";

		if ($('#130a').val().length > 0) {
			tmp_130 = tmp_130 + '^a' + $('#130a').val();
		}

		if ($('#130n').val().length > 0) {
			tmp_130 = tmp_130 + '^n' + $('#130n').val();
		}
		
		if ($('#130p').val().length > 0) {
			tmp_130 = tmp_130 + '^p' + $('#130p').val();
		}
		
		if (tmp_130.length > 0) {
			$("#130").val($("#130i1").val() + $("#130i2").val() + tmp_130);
			$("#l-130").html($("#130i1").val() + $("#130i2").val() + tmp_130);
		} else {
			$("#130").val('');
			$("#l-130").html('&nbsp;');
		}
	});

	$("#130i2").change(function(event) {
		var tmp_130 = "";

		if ($('#130a').val().length > 0) {
			tmp_130 = tmp_130 + '^a' + $('#130a').val();
		}

		if ($('#130n').val().length > 0) {
			tmp_130 = tmp_130 + '^n' + $('#130n').val();
		}
		
		if ($('#130p').val().length > 0) {
			tmp_130 = tmp_130 + '^p' + $('#130p').val();
		}
		
		if (tmp_130.length > 0) {
			$("#130").val($("#130i1").val() + $("#130i2").val() + tmp_130);
			$("#l-130").html($("#130i1").val() + $("#130i2").val() + tmp_130);
		} else {
			$("#130").val('');
			$("#l-130").html('&nbsp;');
		}
	});

	$("#130a").bind('keyup change', function(event) {
		var tmp_130 = "";

		if ($('#130a').val().length > 0) {
			tmp_130 = tmp_130 + '^a' + $('#130a').val();
		}

		if ($('#130n').val().length > 0) {
			tmp_130 = tmp_130 + '^n' + $('#130n').val();
		}
		
		if ($('#130p').val().length > 0) {
			tmp_130 = tmp_130 + '^p' + $('#130p').val();
		}
		
		if (tmp_130.length > 0) {
			$("#130").val($("#130i1").val() + $("#130i2").val() + tmp_130);
			$("#l-130").html($("#130i1").val() + $("#130i2").val() + tmp_130);
		} else {
			$("#130").val('');
			$("#l-130").html('&nbsp;');
		}
	});
	
	$("#130n").bind('keyup change', function(event) {
		var tmp_130 = "";

		if ($('#130a').val().length > 0) {
			tmp_130 = tmp_130 + '^a' + $('#130a').val();
		}

		if ($('#130n').val().length > 0) {
			tmp_130 = tmp_130 + '^n' + $('#130n').val();
		}

		if ($('#130p').val().length > 0) {
			tmp_130 = tmp_130 + '^p' + $('#130p').val();
		}
		
		if (tmp_130.length > 0) {
			$("#130").val($("#130i1").val() + $("#130i2").val() + tmp_130);
			$("#l-130").html($("#130i1").val() + $("#130i2").val() + tmp_130);
		} else {
			$("#130").val('');
			$("#l-130").html('&nbsp;');
		}
	});

	$("#130p").bind('keyup change', function(event) {
		var tmp_130 = "";

		if ($('#130a').val().length > 0) {
			tmp_130 = tmp_130 + '^a' + $('#130a').val();
		}

		if ($('#130n').val().length > 0) {
			tmp_130 = tmp_130 + '^n' + $('#130n').val();
		}

		if ($('#130p').val().length > 0) {
			tmp_130 = tmp_130 + '^p' + $('#130p').val();
		}
		
		if (tmp_130.length > 0) {
			$("#130").val($("#130i1").val() + $("#130i2").val() + tmp_130);
			$("#l-130").html($("#130i1").val() + $("#130i2").val() + tmp_130);
		} else {
			$("#130").val('');
			$("#l-130").html('&nbsp;');
		}
	});

	$("#222i1").change(function(event) {
		var tmp_222 = "";

		if ($('#222a').val().length > 0) {
			tmp_222 = tmp_222 + '^a' + $('#222a').val();
		}

		if ($('#222b').val().length > 0) {
			tmp_222 = tmp_222 + '^b' + $('#222b').val();
		}
		
		if (tmp_222.length > 0) {
			$("#222").val($("#222i1").val() + $("#222i2").val() + tmp_222);
			$("#l-222").html($("#222i1").val() + $("#222i2").val() + tmp_222);
		} else {
			$("#222").val('');
			$("#l-222").html('&nbsp;');
		}
	});

	$("#222i2").change(function(event) {
		var tmp_222 = "";

		if ($('#222a').val().length > 0) {
			tmp_222 = tmp_222 + '^a' + $('#222a').val();
		}

		if ($('#222b').val().length > 0) {
			tmp_222 = tmp_222 + '^b' + $('#222b').val();
		}
		
		if (tmp_222.length > 0) {
			$("#222").val($("#222i1").val() + $("#222i2").val() + tmp_222);
			$("#l-222").html($("#222i1").val() + $("#222i2").val() + tmp_222);
		} else {
			$("#222").val('');
			$("#l-222").html('&nbsp;');
		}
	});

	$("#222a").bind('keyup change', function(event) {
		var tmp_222 = "";

		if ($('#222a').val().length > 0) {
			tmp_222 = tmp_222 + '^a' + $('#222a').val();
		}

		if ($('#222b').val().length > 0) {
			tmp_222 = tmp_222 + '^b' + $('#222b').val();
		}
		
		if (tmp_222.length > 0) {
			$("#222").val($("#222i1").val() + $("#222i2").val() + tmp_222);
			$("#l-222").html($("#222i1").val() + $("#222i2").val() + tmp_222);
		} else {
			$("#222").val('');
			$("#l-222").html('&nbsp;');
		}
	});
	
	$("#222b").bind('keyup change', function(event) {
		var tmp_222 = "";

		if ($('#222a').val().length > 0) {
			tmp_222 = tmp_222 + '^a' + $('#222a').val();
		}

		if ($('#222b').val().length > 0) {
			tmp_222 = tmp_222 + '^b' + $('#222b').val();
		}

		if (tmp_222.length > 0) {
			$("#222").val($("#222i1").val() + $("#222i2").val() + tmp_222);
			$("#l-222").html($("#222i1").val() + $("#222i2").val() + tmp_222);
		} else {
			$("#222").val('');
			$("#l-222").html('&nbsp;');
		}
	});

	$("#240i1").change(function(event) {
		var tmp_240 = "";

		if ($('#240a').val().length > 0) {
			tmp_240 = tmp_240 + '^a' + $('#240a').val();
		}

		if ($('#240n').val().length > 0) {
			tmp_240 = tmp_240 + '^n' + $('#240n').val();
		}

		if ($('#240p').val().length > 0) {
			tmp_240 = tmp_240 + '^p' + $('#240p').val();
		}
		
		if (tmp_240.length > 0) {
			$("#240").val($("#240i1").val() + $("#240i2").val() + tmp_240);
			$("#l-240").html($("#240i1").val() + $("#240i2").val() + tmp_240);
		} else {
			$("#240").val('');
			$("#l-240").html('&nbsp;');
		}
	});

	$("#240i2").change(function(event) {
		var tmp_240 = "";

		if ($('#240a').val().length > 0) {
			tmp_240 = tmp_240 + '^a' + $('#240a').val();
		}

		if ($('#240n').val().length > 0) {
			tmp_240 = tmp_240 + '^n' + $('#240n').val();
		}

		if ($('#240p').val().length > 0) {
			tmp_240 = tmp_240 + '^p' + $('#240p').val();
		}
		
		if (tmp_240.length > 0) {
			$("#240").val($("#240i1").val() + $("#240i2").val() + tmp_240);
			$("#l-240").html($("#240i1").val() + $("#240i2").val() + tmp_240);
		} else {
			$("#240").val('');
			$("#l-240").html('&nbsp;');
		}
	});
	
	$("#240a").bind('keyup change', function(event) {
		var tmp_240 = "";

		if ($('#240a').val().length > 0) {
			tmp_240 = tmp_240 + '^a' + $('#240a').val();
		}

		if ($('#240n').val().length > 0) {
			tmp_240 = tmp_240 + '^n' + $('#240n').val();
		}

		if ($('#240p').val().length > 0) {
			tmp_240 = tmp_240 + '^p' + $('#240p').val();
		}
		
		if (tmp_240.length > 0) {
			$("#240").val($("#240i1").val() + $("#240i2").val() + tmp_240);
			$("#l-240").html($("#240i1").val() + $("#240i2").val() + tmp_240);
		} else {
			$("#240").val('');
			$("#l-240").html('&nbsp;');
		}
	});

	$("#240n").bind('keyup change', function(event) {
		var tmp_240 = "";

		if ($('#240a').val().length > 0) {
			tmp_240 = tmp_240 + '^a' + $('#240a').val();
		}

		if ($('#240n').val().length > 0) {
			tmp_240 = tmp_240 + '^n' + $('#240n').val();
		}

		if ($('#240p').val().length > 0) {
			tmp_240 = tmp_240 + '^p' + $('#240p').val();
		}
		
		if (tmp_240.length > 0) {
			$("#240").val($("#240i1").val() + $("#240i2").val() + tmp_240);
			$("#l-240").html($("#240i1").val() + $("#240i2").val() + tmp_240);
		} else {
			$("#240").val('');
			$("#l-240").html('&nbsp;');
		}
	});

	$("#240p").bind('keyup change', function(event) {
		var tmp_240 = "";

		if ($('#240a').val().length > 0) {
			tmp_240 = tmp_240 + '^a' + $('#240a').val();
		}

		if ($('#240n').val().length > 0) {
			tmp_240 = tmp_240 + '^n' + $('#240n').val();
		}

		if ($('#240p').val().length > 0) {
			tmp_240 = tmp_240 + '^p' + $('#240p').val();
		}
		
		if (tmp_240.length > 0) {
			$("#240").val($("#240i1").val() + $("#240i2").val() + tmp_240);
			$("#l-240").html($("#240i1").val() + $("#240i2").val() + tmp_240);
		} else {
			$("#240").val('');
			$("#l-240").html('&nbsp;');
		}
	});
	
	$("#245i1, #245i2, #245a, #245b, #245c, #245f, #245g, #245h, #245k, #245n, #245p, #245s").bind('keyup change', function(event) {
		var tmp_245 = "";

		if ($('#245a').val().length > 0) {
			tmp_245 = tmp_245 + '^a' + $('#245a').val();
		}

		if ($('#245b').val().length > 0) {
			tmp_245 = tmp_245 + '^b' + $('#245b').val();
		}

		if ($('#245c').val().length > 0) {
			tmp_245 = tmp_245 + '^c' + $('#245c').val();
		}

		if ($('#245f').val().length > 0) {
			tmp_245 = tmp_245 + '^f' + $('#245f').val();
		}

		if ($('#245g').val().length > 0) {
			tmp_245 = tmp_245 + '^g' + $('#245g').val();
		}
		
		if ($('#245h').val().length > 0) {
			tmp_245 = tmp_245 + '^h' + $('#245h').val();
		}

		if ($('#245k').val().length > 0) {
			tmp_245 = tmp_245 + '^k' + $('#245k').val();
		}

		if ($('#245n').val().length > 0) {
			tmp_245 = tmp_245 + '^n' + $('#245n').val();
		}

		if ($('#245p').val().length > 0) {
			tmp_245 = tmp_245 + '^p' + $('#245p').val();
		}

		if ($('#245s').val().length > 0) {
			tmp_245 = tmp_245 + '^s' + $('#245s').val();
		}
		
		if (tmp_245.length > 0) {
			$("#245").val($("#245i1").val() + $("#245i2").val() + tmp_245);
			$("#l-245").html($("#245i1").val() + $("#245i2").val() + tmp_245);
		} else {
			$("#245").val('');
			$("#l-245").html('&nbsp;');
		}
	});

	$("#246i1").change(function(event) {
		var tmp_246 = "";

		if ($('#246a').val().length > 0) {
			tmp_246 = tmp_246 + '^a' + $('#246a').val();
		}

		if ($('#246b').val().length > 0) {
			tmp_246 = tmp_246 + '^b' + $('#246b').val();
		}

		if ($('#246i').val().length > 0) {
			tmp_246 = tmp_246 + '^i' + $('#246i').val();
		}
		
		if (tmp_246.length > 0) {
			$("#246").val($("#246i1").val() + $("#246i2").val() + tmp_246);
			$("#l-246").html($("#246i1").val() + $("#246i2").val() + tmp_246);
		} else {
			$("#246").val('');
			$("#l-246").html('&nbsp;');
		}
	});

	$("#246i2").change(function(event) {
		var tmp_246 = "";

		if ($('#246a').val().length > 0) {
			tmp_246 = tmp_246 + '^a' + $('#246a').val();
		}

		if ($('#246b').val().length > 0) {
			tmp_246 = tmp_246 + '^b' + $('#246b').val();
		}

		if ($('#246i').val().length > 0) {
			tmp_246 = tmp_246 + '^i' + $('#246i').val();
		}

		if (tmp_246.length > 0) {
			$("#246").val($("#246i1").val() + $("#246i2").val() + tmp_246);
			$("#l-246").html($("#246i1").val() + $("#246i2").val() + tmp_246);
		} else {
			$("#246").val('');
			$("#l-246").html('&nbsp;');
		}
	});
	
	$("#246a").bind('keyup change', function(event) {
		var tmp_246 = "";

		if ($('#246a').val().length > 0) {
			tmp_246 = tmp_246 + '^a' + $('#246a').val();
		}

		if ($('#246b').val().length > 0) {
			tmp_246 = tmp_246 + '^b' + $('#246b').val();
		}

		if ($('#246i').val().length > 0) {
			tmp_246 = tmp_246 + '^i' + $('#246i').val();
		}

		if (tmp_246.length > 0) {
			$("#246").val($("#246i1").val() + $("#246i2").val() + tmp_246);
			$("#l-246").html($("#246i1").val() + $("#246i2").val() + tmp_246);
		} else {
			$("#246").val('');
			$("#l-246").html('&nbsp;');
		}
	});

	$("#246b").bind('keyup change', function(event) {
		var tmp_246 = "";

		if ($('#246a').val().length > 0) {
			tmp_246 = tmp_246 + '^a' + $('#246a').val();
		}

		if ($('#246b').val().length > 0) {
			tmp_246 = tmp_246 + '^b' + $('#246b').val();
		}

		if ($('#246i').val().length > 0) {
			tmp_246 = tmp_246 + '^i' + $('#246i').val();
		}

		if (tmp_246.length > 0) {
			$("#246").val($("#246i1").val() + $("#246i2").val() + tmp_246);
			$("#l-246").html($("#246i1").val() + $("#246i2").val() + tmp_246);
		} else {
			$("#246").val('');
			$("#l-246").html('&nbsp;');
		}
	});

	$("#246i").bind('keyup change', function(event) {
		var tmp_246 = "";

		if ($('#246a').val().length > 0) {
			tmp_246 = tmp_246 + '^a' + $('#246a').val();
		}

		if ($('#246b').val().length > 0) {
			tmp_246 = tmp_246 + '^b' + $('#246b').val();
		}

		if ($('#246i').val().length > 0) {
			tmp_246 = tmp_246 + '^i' + $('#246i').val();
		}

		if (tmp_246.length > 0) {
			$("#246").val($("#246i1").val() + $("#246i2").val() + tmp_246);
			$("#l-246").html($("#246i1").val() + $("#246i2").val() + tmp_246);
		} else {
			$("#246").val('');
			$("#l-246").html('&nbsp;');
		}
	});

	$("#247a").bind('keyup change', function(event) {
		var tmp_247 = "";

		if ($('#247a').val().length > 0) {
			tmp_247 = tmp_247 + '^a' + $('#247a').val();
		}

		if ($('#247b').val().length > 0) {
			tmp_247 = tmp_247 + '^b' + $('#247b').val();
		}

		if ($('#247f').val().length > 0) {
			tmp_247 = tmp_247 + '^f' + $('#247f').val();
		}

		if ($('#247g').val().length > 0) {
			tmp_247 = tmp_247 + '^g' + $('#247g').val();
		}

		if ($('#247n').val().length > 0) {
			tmp_247 = tmp_247 + '^n' + $('#247n').val();
		}

		if ($('#247p').val().length > 0) {
			tmp_247 = tmp_247 + '^p' + $('#247p').val();
		}
		
		if (tmp_247.length > 0) {
			$("#247").val('##' + tmp_247);
			$("#l-247").html('##' + tmp_247);
		} else {
			$("#247").val('');
			$("#l-247").html('&nbsp;');
		}
	});

	$("#247b").bind('keyup change', function(event) {
		var tmp_247 = "";

		if ($('#247a').val().length > 0) {
			tmp_247 = tmp_247 + '^a' + $('#247a').val();
		}

		if ($('#247b').val().length > 0) {
			tmp_247 = tmp_247 + '^b' + $('#247b').val();
		}

		if ($('#247f').val().length > 0) {
			tmp_247 = tmp_247 + '^f' + $('#247f').val();
		}

		if ($('#247g').val().length > 0) {
			tmp_247 = tmp_247 + '^g' + $('#247g').val();
		}

		if ($('#247n').val().length > 0) {
			tmp_247 = tmp_247 + '^n' + $('#247n').val();
		}

		if ($('#247p').val().length > 0) {
			tmp_247 = tmp_247 + '^p' + $('#247p').val();
		}
		
		if (tmp_247.length > 0) {
			$("#247").val('##' + tmp_247);
			$("#l-247").html('##' + tmp_247);
		} else {
			$("#247").val('');
			$("#l-247").html('&nbsp;');
		}
	});

	$("#247f").bind('keyup change', function(event) {
		var tmp_247 = "";

		if ($('#247a').val().length > 0) {
			tmp_247 = tmp_247 + '^a' + $('#247a').val();
		}

		if ($('#247b').val().length > 0) {
			tmp_247 = tmp_247 + '^b' + $('#247b').val();
		}

		if ($('#247f').val().length > 0) {
			tmp_247 = tmp_247 + '^f' + $('#247f').val();
		}

		if ($('#247g').val().length > 0) {
			tmp_247 = tmp_247 + '^g' + $('#247g').val();
		}

		if ($('#247n').val().length > 0) {
			tmp_247 = tmp_247 + '^n' + $('#247n').val();
		}

		if ($('#247p').val().length > 0) {
			tmp_247 = tmp_247 + '^p' + $('#247p').val();
		}
		
		if (tmp_247.length > 0) {
			$("#247").val('##' + tmp_247);
			$("#l-247").html('##' + tmp_247);
		} else {
			$("#247").val('');
			$("#l-247").html('&nbsp;');
		}
	});

	$("#247g").bind('keyup change', function(event) {
		var tmp_247 = "";

		if ($('#247a').val().length > 0) {
			tmp_247 = tmp_247 + '^a' + $('#247a').val();
		}

		if ($('#247b').val().length > 0) {
			tmp_247 = tmp_247 + '^b' + $('#247b').val();
		}

		if ($('#247f').val().length > 0) {
			tmp_247 = tmp_247 + '^f' + $('#247f').val();
		}

		if ($('#247g').val().length > 0) {
			tmp_247 = tmp_247 + '^g' + $('#247g').val();
		}

		if ($('#247n').val().length > 0) {
			tmp_247 = tmp_247 + '^n' + $('#247n').val();
		}

		if ($('#247p').val().length > 0) {
			tmp_247 = tmp_247 + '^p' + $('#247p').val();
		}
		
		if (tmp_247.length > 0) {
			$("#247").val('##' + tmp_247);
			$("#l-247").html('##' + tmp_247);
		} else {
			$("#247").val('');
			$("#l-247").html('&nbsp;');
		}
	});

	$("#247n").bind('keyup change', function(event) {
		var tmp_247 = "";

		if ($('#247a').val().length > 0) {
			tmp_247 = tmp_247 + '^a' + $('#247a').val();
		}

		if ($('#247b').val().length > 0) {
			tmp_247 = tmp_247 + '^b' + $('#247b').val();
		}

		if ($('#247f').val().length > 0) {
			tmp_247 = tmp_247 + '^f' + $('#247f').val();
		}

		if ($('#247g').val().length > 0) {
			tmp_247 = tmp_247 + '^g' + $('#247g').val();
		}

		if ($('#247n').val().length > 0) {
			tmp_247 = tmp_247 + '^n' + $('#247n').val();
		}

		if ($('#247p').val().length > 0) {
			tmp_247 = tmp_247 + '^p' + $('#247p').val();
		}
		
		if (tmp_247.length > 0) {
			$("#247").val('##' + tmp_247);
			$("#l-247").html('##' + tmp_247);
		} else {
			$("#247").val('');
			$("#l-247").html('&nbsp;');
		}
	});

	$("#247p").bind('keyup change', function(event) {
		var tmp_247 = "";

		if ($('#247a').val().length > 0) {
			tmp_247 = tmp_247 + '^a' + $('#247a').val();
		}

		if ($('#247b').val().length > 0) {
			tmp_247 = tmp_247 + '^b' + $('#247b').val();
		}

		if ($('#247f').val().length > 0) {
			tmp_247 = tmp_247 + '^f' + $('#247f').val();
		}

		if ($('#247g').val().length > 0) {
			tmp_247 = tmp_247 + '^g' + $('#247g').val();
		}

		if ($('#247n').val().length > 0) {
			tmp_247 = tmp_247 + '^n' + $('#247n').val();
		}

		if ($('#247p').val().length > 0) {
			tmp_247 = tmp_247 + '^p' + $('#247p').val();
		}
		
		if (tmp_247.length > 0) {
			$("#247").val('##' + tmp_247);
			$("#l-247").html('##' + tmp_247);
		} else {
			$("#247").val('');
			$("#l-247").html('&nbsp;');
		}
	});

	$("#250a").bind('keyup change', function(event) {
		var tmp_250 = "";

		if ($('#250a').val().length > 0) {
			tmp_250 = tmp_250 + '^a' + $('#250a').val();
		}

		if ($('#250b').val().length > 0) {
			tmp_250 = tmp_250 + '^b' + $('#250b').val();
		}
		
		if (tmp_250.length > 0) {
			$("#250").val('##' + tmp_250);
			$("#l-250").html('##' + tmp_250);
		} else {
			$("#250").val('');
			$("#l-250").html('&nbsp;');
		}
	});

	$("#250b").bind('keyup change', function(event) {
		var tmp_250 = "";

		if ($('#250a').val().length > 0) {
			tmp_250 = tmp_250 + '^a' + $('#250a').val();
		}

		if ($('#250b').val().length > 0) {
			tmp_250 = tmp_250 + '^b' + $('#250b').val();
		}
		
		if (tmp_250.length > 0) {
			$("#250").val('##' + tmp_250);
			$("#l-250").html('##' + tmp_250);
		} else {
			$("#250").val('');
			$("#l-250").html('&nbsp;');
		}
	});

	$("#260a").bind('keyup change', function(event) {
		var tmp_260 = "";

		if ($('#260a').val().length > 0) {
			tmp_260 = tmp_260 + '^a' + $('#260a').val();
		}

		if ($('#260b').val().length > 0) {
			tmp_260 = tmp_260 + '^b' + $('#260b').val();
		}

		if ($('#260c').val().length > 0) {
			tmp_260 = tmp_260 + '^c' + $('#260c').val();
		}
		
		if (tmp_260.length > 0) {
			$("#260").val('##' + tmp_260);
			$("#l-260").html('##' + tmp_260);
		} else {
			$("#260").val('');
			$("#l-260").html('&nbsp;');
		}
	});

	$("#260b").bind('keyup change', function(event) {
		var tmp_260 = "";

		if ($('#260a').val().length > 0) {
			tmp_260 = tmp_260 + '^a' + $('#260a').val();
		}

		if ($('#260b').val().length > 0) {
			tmp_260 = tmp_260 + '^b' + $('#260b').val();
		}

		if ($('#260c').val().length > 0) {
			tmp_260 = tmp_260 + '^c' + $('#260c').val();
		}
		
		if (tmp_260.length > 0) {
			$("#260").val('##' + tmp_260);
			$("#l-260").html('##' + tmp_260);
		} else {
			$("#260").val('');
			$("#l-260").html('&nbsp;');
		}
	});

	$("#260c").bind('keyup change', function(event) {
		var tmp_260 = "";

		if ($('#260a').val().length > 0) {
			tmp_260 = tmp_260 + '^a' + $('#260a').val();
		}

		if ($('#260b').val().length > 0) {
			tmp_260 = tmp_260 + '^b' + $('#260b').val();
		}

		if ($('#260c').val().length > 0) {
			tmp_260 = tmp_260 + '^c' + $('#260c').val();
		}
		
		if (tmp_260.length > 0) {
			$("#260").val('##' + tmp_260);
			$("#l-260").html('##' + tmp_260);
		} else {
			$("#260").val('');
			$("#l-260").html('&nbsp;');
		}

		// Calculo del siglo segun el año.
		var year = $(this).val();
		
		if ((year.length == 4) && (!isNaN(year))) {
			var y = year.substr(0, 2);
			var z = year.substr(2, 2);
			var w = "";

			if (z != "00") {
				y++;
			}
			
			if (y == 17) {$("#690a option[value=XVII]").attr("selected", true); w = "XVII";}
			if (y == 18) {$("#690a option[value=XVIII]").attr("selected", true); w = "XVIII";}
			if (y == 19) {$("#690a option[value=XIX]").attr("selected", true); w = "XIX";}
			if (y == 20) {$("#690a option[value=XX]").attr("selected", true); w = "XX";}

			var tmp_690 = '^a' + w;
			
			if (tmp_690.length > 0) {
				$("#690").val('##' + tmp_690);
				$("#l-690").html('##' + tmp_690);
			} else {
				$("#690").val('');
				$("#l-690").html('&nbsp;');
			}
		}
		
	});

	<?php
	/*	if ($item['Item']['year']) {
			// Cálculo de siglo de acuerdo al año.
			if (substr($item['Item']['year'], 2, 2) != "00"){
				echo $centuries[substr($item['Item']['year'], 0, 2) + 1];
			} else {
				echo $centuries[substr($item['Item']['year'], 0, 2)];
			}
		}*/
	?>
		
	$("#300a").bind('keyup change', function(event) {
		var tmp_300 = "";

		if ($('#300a').val().length > 0) {
			tmp_300 = tmp_300 + '^a' + $('#300a').val();
		}

		if ($('#300b').val().length > 0) {
			tmp_300 = tmp_300 + '^b' + $('#300b').val();
		}

		if ($('#300c').val().length > 0) {
			tmp_300 = tmp_300 + '^c' + $('#300c').val();
		}

		if ($('#300e').val().length > 0) {
			tmp_300 = tmp_300 + '^e' + $('#300e').val();
		}
		
		if (tmp_300.length > 0) {
			$("#300").val('##' + tmp_300);
			$("#l-300").html('##' + tmp_300);
		} else {
			$("#300").val('');
			$("#l-300").html('&nbsp;');
		}
	});

	$("#300b").bind('keyup change', function(event) {
		var tmp_300 = "";

		if ($('#300a').val().length > 0) {
			tmp_300 = tmp_300 + '^a' + $('#300a').val();
		}

		if ($('#300b').val().length > 0) {
			tmp_300 = tmp_300 + '^b' + $('#300b').val();
		}

		if ($('#300c').val().length > 0) {
			tmp_300 = tmp_300 + '^c' + $('#300c').val();
		}

		if ($('#300e').val().length > 0) {
			tmp_300 = tmp_300 + '^e' + $('#300e').val();
		}
		
		if (tmp_300.length > 0) {
			$("#300").val('##' + tmp_300);
			$("#l-300").html('##' + tmp_300);
		} else {
			$("#300").val('');
			$("#l-300").html('&nbsp;');
		}
	});

	$("#300c").bind('keyup change', function(event) {
		var tmp_300 = "";

		if ($('#300a').val().length > 0) {
			tmp_300 = tmp_300 + '^a' + $('#300a').val();
		}

		if ($('#300b').val().length > 0) {
			tmp_300 = tmp_300 + '^b' + $('#300b').val();
		}

		if ($('#300c').val().length > 0) {
			tmp_300 = tmp_300 + '^c' + $('#300c').val();
		}

		if ($('#300e').val().length > 0) {
			tmp_300 = tmp_300 + '^e' + $('#300e').val();
		}
		
		if (tmp_300.length > 0) {
			$("#300").val('##' + tmp_300);
			$("#l-300").html('##' + tmp_300);
		} else {
			$("#300").val('');
			$("#l-300").html('&nbsp;');
		}
	});

	$("#300e").bind('keyup change', function(event) {
		var tmp_300 = "";

		if ($('#300a').val().length > 0) {
			tmp_300 = tmp_300 + '^a' + $('#300a').val();
		}

		if ($('#300b').val().length > 0) {
			tmp_300 = tmp_300 + '^b' + $('#300b').val();
		}

		if ($('#300c').val().length > 0) {
			tmp_300 = tmp_300 + '^c' + $('#300c').val();
		}

		if ($('#300e').val().length > 0) {
			tmp_300 = tmp_300 + '^e' + $('#300e').val();
		}
		
		if (tmp_300.length > 0) {
			$("#300").val('##' + tmp_300);
			$("#l-300").html('##' + tmp_300);
		} else {
			$("#300").val('');
			$("#l-300").html('&nbsp;');
		}
	});

	$("#310a").bind('keyup change', function(event) {
		var tmp_310 = "";

		if ($('#310a').val().length > 0) {
			tmp_310 = tmp_310 + '^a' + $('#310a').val();
		}

		if ($('#310b').val().length > 0) {
			tmp_310 = tmp_310 + '^b' + $('#310b').val();
		}
		
		if (tmp_310.length > 0) {
			$("#310").val('##' + tmp_310);
			$("#l-310").html('##' + tmp_310);
		} else {
			$("#310").val('');
			$("#l-310").html('&nbsp;');
		}
	});

	$("#310b").bind('keyup change', function(event) {
		var tmp_310 = "";

		if ($('#310a').val().length > 0) {
			tmp_310 = tmp_310 + '^a' + $('#310a').val();
		}

		if ($('#310b').val().length > 0) {
			tmp_310 = tmp_310 + '^b' + $('#310b').val();
		}
		
		if (tmp_310.length > 0) {
			$("#310").val('##' + tmp_310);
			$("#l-310").html('##' + tmp_310);
		} else {
			$("#310").val('');
			$("#l-310").html('&nbsp;');
		}
	});

	$("#321a").bind('keyup change', function(event) {
		var tmp_321 = "";

		if ($('#321a').val().length > 0) {
			tmp_321 = tmp_321 + '^a' + $('#321a').val();
		}

		if ($('#321b').val().length > 0) {
			tmp_321 = tmp_321 + '^b' + $('#321b').val();
		}
		
		if (tmp_321.length > 0) {
			$("#321").val('##' + tmp_321);
			$("#l-321").html('##' + tmp_321);
		} else {
			$("#321").val('');
			$("#l-321").html('&nbsp;');
		}
	});

	$("#321b").bind('keyup change', function(event) {
		var tmp_321 = "";

		if ($('#321a').val().length > 0) {
			tmp_321 = tmp_321 + '^a' + $('#321a').val();
		}

		if ($('#321b').val().length > 0) {
			tmp_321 = tmp_321 + '^b' + $('#321b').val();
		}
		
		if (tmp_321.length > 0) {
			$("#321").val('##' + tmp_321);
			$("#l-321").html('##' + tmp_321);
		} else {
			$("#321").val('');
			$("#l-321").html('&nbsp;');
		}
	});

	$("#362a").bind('keyup change', function(event) {
		var tmp_362 = "";

		if ($('#362a').val().length > 0) {
			tmp_362 = tmp_362 + '^a' + $('#362a').val();
		}

		if (tmp_362.length > 0) {
			$("#362").val('0#' + tmp_362);
			$("#l-362").html('0#' + tmp_362);
		} else {
			$("#362").val('');
			$("#l-362").html('&nbsp;');
		}
	});

	$("#380a").bind('keyup change', function(event) {
		var tmp_380 = "";

		if ($('#380a').val().length > 0) {
			tmp_380 = tmp_380 + '^a' + $('#380a').val();
		}

		if (tmp_380.length > 0) {
			$("#380").val('##' + tmp_380);
			$("#l-380").html('##' + tmp_380);
		} else {
			$("#380").val('');
			$("#l-380").html('&nbsp;');
		}
	});

	$("#500a").bind('keyup change', function(event) {
		var tmp_500 = "";

		if ($('#500a').val().length > 0) {
			tmp_500 = tmp_500 + '^a' + $('#500a').val();
		}

		if (tmp_500.length > 0) {
			$("#500").val('##' + tmp_500);
			$("#l-500").html('##' + tmp_500);
		} else {
			$("#500").val('');
			$("#l-500").html('&nbsp;');
		}
	});

	$("#501a").bind('keyup change', function(event) {
		var tmp_501 = "";

		if ($('#501a').val().length > 0) {
			tmp_501 = tmp_501 + '^a' + $('#501a').val();
		}

		if (tmp_501.length > 0) {
			$("#501").val('##' + tmp_501);
			$("#l-501").html('##' + tmp_501);
		} else {
			$("#501").val('');
			$("#l-501").html('&nbsp;');
		}
	});

	$("#505i1").change(function(event) {
		var tmp_505 = "";

		if ($('#505a').val().length > 0) {
			tmp_505 = tmp_505 + '^a' + $('#505a').val();
		}

		if (tmp_505.length > 0) {
			$("#505").val($("#505i1").val() + $("#505i2").val() + tmp_505);
			$("#l-505").html($("#505i1").val() + $("#505i2").val() + tmp_505);
		} else {
			$("#505").val('');
			$("#l-505").html('&nbsp;');
		}
	});

	$("#505i2").change(function(event) {
		var tmp_505 = "";

		if ($('#505a').val().length > 0) {
			tmp_505 = tmp_505 + '^a' + $('#505a').val();
		}

		if (tmp_505.length > 0) {
			$("#505").val($("#505i1").val() + $("#505i2").val() + tmp_505);
			$("#l-505").html($("#505i1").val() + $("#505i2").val() + tmp_505);
		} else {
			$("#505").val('');
			$("#l-505").html('&nbsp;');
		}
	});

	$("#505a").bind('keyup change', function(event) {
		var tmp_505 = "";

		if ($('#505a').val().length > 0) {
			tmp_505 = tmp_505 + '^a' + $('#505a').val();
		}

		if (tmp_505.length > 0) {
			$("#505").val($("#505i1").val() + $("#505i2").val() + tmp_505);
			$("#l-505").html($("#505i1").val() + $("#505i2").val() + tmp_505);
		} else {
			$("#505").val('');
			$("#l-505").html('&nbsp;');
		}
	});

	$("#510i1").change(function(event) {
		var tmp_510 = "";

		if ($('#510a').val().length > 0) {
			tmp_510 = tmp_510 + '^a' + $('#510a').val();
		}

		if ($('#510c').val().length > 0) {
			tmp_510 = tmp_510 + '^c' + $('#510c').val();
		}
		
		if (tmp_510.length > 0) {
			$("#510").val($("#510i1").val() + $("#510i2").val() + tmp_510);
			$("#l-510").html($("#510i1").val() + $("#510i2").val() + tmp_510);
		} else {
			$("#510").val('');
			$("#l-510").html('&nbsp;');
		}
	});

	$("#510i2").change(function(event) {
		var tmp_510 = "";

		if ($('#510a').val().length > 0) {
			tmp_510 = tmp_510 + '^a' + $('#510a').val();
		}

		if ($('#510c').val().length > 0) {
			tmp_510 = tmp_510 + '^c' + $('#510c').val();
		}
		
		if (tmp_510.length > 0) {
			$("#510").val($("#510i1").val() + $("#510i2").val() + tmp_510);
			$("#l-510").html($("#510i1").val() + $("#510i2").val() + tmp_510);
		} else {
			$("#510").val('');
			$("#l-510").html('&nbsp;');
		}
	});

	$("#510a").bind('keyup change', function(event) {
		var tmp_510 = "";

		if ($('#510a').val().length > 0) {
			tmp_510 = tmp_510 + '^a' + $('#510a').val();
		}

		if ($('#510c').val().length > 0) {
			tmp_510 = tmp_510 + '^c' + $('#510c').val();
		}
		
		if (tmp_510.length > 0) {
			$("#510").val($("#510i1").val() + $("#510i2").val() + tmp_510);
			$("#l-510").html($("#510i1").val() + $("#510i2").val() + tmp_510);
		} else {
			$("#510").val('');
			$("#l-510").html('&nbsp;');
		}
	});

	$("#510c").bind('keyup change', function(event) {
		var tmp_510 = "";

		if ($('#510a').val().length > 0) {
			tmp_510 = tmp_510 + '^a' + $('#510a').val();
		}

		if ($('#510c').val().length > 0) {
			tmp_510 = tmp_510 + '^c' + $('#510c').val();
		}
		
		if (tmp_510.length > 0) {
			$("#510").val($("#510i1").val() + $("#510i2").val() + tmp_510);
			$("#l-510").html($("#510i1").val() + $("#510i2").val() + tmp_510);
		} else {
			$("#510").val('');
			$("#l-510").html('&nbsp;');
		}
	});

	$("#515a").bind('keyup change', function(event) {
		var tmp_515 = "";

		if ($('#515a').val().length > 0) {
			tmp_515 = tmp_515 + '^a' + $('#515a').val();
		}

		if (tmp_515.length > 0) {
			$("#515").val('##' + tmp_515);
			$("#l-515").html('##' + tmp_515);
		} else {
			$("#515").val('');
			$("#l-515").html('&nbsp;');
		}
	});

	$("#520i1").change(function(event) {
		var tmp_520 = "";

		if ($('#520a').val().length > 0) {
			tmp_520 = tmp_520 + '^a' + $('#520a').val();
		}

		if (tmp_520.length > 0) {
			$("#520").val($("#520i1").val() + $("#520i2").val() + tmp_520);
			$("#l-520").html($("#520i1").val() + $("#520i2").val() + tmp_520);
		} else {
			$("#520").val('');
			$("#l-520").html('&nbsp;');
		}
	});

	$("#520i2").change(function(event) {
		var tmp_520 = "";

		if ($('#520a').val().length > 0) {
			tmp_520 = tmp_520 + '^a' + $('#520a').val();
		}

		if (tmp_520.length > 0) {
			$("#520").val($("#520i1").val() + $("#520i2").val() + tmp_520);
			$("#l-520").html($("#520i1").val() + $("#520i2").val() + tmp_520);
		} else {
			$("#520").val('');
			$("#l-520").html('&nbsp;');
		}
	});

	$("#520a").bind('keyup change', function(event) {
		var tmp_520 = "";

		if ($('#520a').val().length > 0) {
			tmp_520 = tmp_520 + '^a' + $('#520a').val();
		}

		if (tmp_520.length > 0) {
			$("#520").val($("#520i1").val() + $("#520i2").val() + tmp_520);
			$("#l-520").html($("#520i1").val() + $("#520i2").val() + tmp_520);
		} else {
			$("#520").val('');
			$("#l-520").html('&nbsp;');
		}
	});

	$("#530a").bind('keyup change', function(event) {
		var tmp_530 = "";

		if ($('#530a').val().length > 0) {
			tmp_530 = tmp_530 + '^a' + $('#530a').val();
		}

		if ($('#530c').val().length > 0) {
			tmp_530 = tmp_530 + '^c' + $('#530c').val();
		}

		if ($('#530u').val().length > 0) {
			tmp_530 = tmp_530 + '^u' + $('#530u').val();
		}
		
		if (tmp_530.length > 0) {
			$("#530").val('##' + tmp_530);
			$("#l-530").html('##' + tmp_530);
		} else {
			$("#530").val('');
			$("#l-530").html('&nbsp;');
		}
	});

	$("#530c").bind('keyup change', function(event) {
		var tmp_530 = "";

		if ($('#530a').val().length > 0) {
			tmp_530 = tmp_530 + '^a' + $('#530a').val();
		}

		if ($('#530c').val().length > 0) {
			tmp_530 = tmp_530 + '^c' + $('#530c').val();
		}

		if ($('#530u').val().length > 0) {
			tmp_530 = tmp_530 + '^u' + $('#530u').val();
		}
		
		if (tmp_530.length > 0) {
			$("#530").val('##' + tmp_530);
			$("#l-530").html('##' + tmp_530);
		} else {
			$("#530").val('');
			$("#l-530").html('&nbsp;');
		}
	});

	$("#530u").bind('keyup change', function(event) {
		var tmp_530 = "";

		if ($('#530a').val().length > 0) {
			tmp_530 = tmp_530 + '^a' + $('#530a').val();
		}

		if ($('#530c').val().length > 0) {
			tmp_530 = tmp_530 + '^c' + $('#530c').val();
		}

		if ($('#530u').val().length > 0) {
			tmp_530 = tmp_530 + '^u' + $('#530u').val();
		}
		
		if (tmp_530.length > 0) {
			$("#530").val('##' + tmp_530);
			$("#l-530").html('##' + tmp_530);
		} else {
			$("#530").val('');
			$("#l-530").html('&nbsp;');
		}
	});

	$("#534a, #534b, #534c, #534e, #534p, #534t").bind('keyup change', function(event) {
		var tmp_534 = "";

		if ($('#534a').val().length > 0) {
			tmp_534 = tmp_534 + '^a' + $('#534a').val();
		}

		if ($('#534b').val().length > 0) {
			tmp_534 = tmp_534 + '^b' + $('#534b').val();
		}
		
		if ($('#534c').val().length > 0) {
			tmp_534 = tmp_534 + '^c' + $('#534c').val();
		}

		if ($('#534e').val().length > 0) {
			tmp_534 = tmp_534 + '^e' + $('#534e').val();
		}

		if ($('#534p').val().length > 0) {
			tmp_534 = tmp_534 + '^p' + $('#534p').val();
		}

		if ($('#534t').val().length > 0) {
			tmp_534 = tmp_534 + '^t' + $('#534t').val();
		}
		
		if (tmp_534.length > 0) {
			$("#534").val('##' + tmp_534);
			$("#l-534").html('##' + tmp_534);
		} else {
			$("#534").val('');
			$("#l-534").html('&nbsp;');
		}
	});

	$("#546a").bind('keyup change', function(event) {
		var tmp_546 = "";

		if ($('#546a').val().length > 0) {
			tmp_546 = tmp_546 + '^a' + $('#546a').val();
		}

		if ($('#546c').val().length > 0) {
			tmp_546 = tmp_546 + '^c' + $('#546c').val();
		}
		
		if (tmp_546.length > 0) {
			$("#546").val('##' + tmp_546);
			$("#l-546").html('##' + tmp_546);
		} else {
			$("#546").val('');
			$("#l-546").html('&nbsp;');
		}
	});

	$("#546c").bind('keyup change', function(event) {
		var tmp_546 = "";

		if ($('#546a').val().length > 0) {
			tmp_546 = tmp_546 + '^a' + $('#546a').val();
		}

		if ($('#546c').val().length > 0) {
			tmp_546 = tmp_546 + '^c' + $('#546c').val();
		}
		
		if (tmp_546.length > 0) {
			$("#546").val('##' + tmp_546);
			$("#l-546").html('##' + tmp_546);
		} else {
			$("#546").val('');
			$("#l-546").html('&nbsp;');
		}
	});

	$("#555a").bind('keyup change', function(event) {
		var tmp_555 = "";

		if ($('#555a').val().length > 0) {
			tmp_555 = tmp_555 + '^a' + $('#555a').val();
		}

		if ($('#555b').val().length > 0) {
			tmp_555 = tmp_555 + '^b' + $('#555b').val();
		}

		if ($('#555d').val().length > 0) {
			tmp_555 = tmp_555 + '^d' + $('#555d').val();
		}

		if ($('#555u').val().length > 0) {
			tmp_555 = tmp_555 + '^u' + $('#555u').val();
		}
		
		if (tmp_555.length > 0) {
			$("#555").val('##' + tmp_555);
			$("#l-555").html('##' + tmp_555);
		} else {
			$("#555").val('');
			$("#l-555").html('&nbsp;');
		}
	});

	$("#555b").bind('keyup change', function(event) {
		var tmp_555 = "";

		if ($('#555a').val().length > 0) {
			tmp_555 = tmp_555 + '^a' + $('#555a').val();
		}

		if ($('#555b').val().length > 0) {
			tmp_555 = tmp_555 + '^b' + $('#555b').val();
		}

		if ($('#555d').val().length > 0) {
			tmp_555 = tmp_555 + '^d' + $('#555d').val();
		}

		if ($('#555u').val().length > 0) {
			tmp_555 = tmp_555 + '^u' + $('#555u').val();
		}
		
		if (tmp_555.length > 0) {
			$("#555").val('##' + tmp_555);
			$("#l-555").html('##' + tmp_555);
		} else {
			$("#555").val('');
			$("#l-555").html('&nbsp;');
		}
	});

	$("#555d").bind('keyup change', function(event) {
		var tmp_555 = "";

		if ($('#555a').val().length > 0) {
			tmp_555 = tmp_555 + '^a' + $('#555a').val();
		}

		if ($('#555b').val().length > 0) {
			tmp_555 = tmp_555 + '^b' + $('#555b').val();
		}

		if ($('#555d').val().length > 0) {
			tmp_555 = tmp_555 + '^d' + $('#555d').val();
		}

		if ($('#555u').val().length > 0) {
			tmp_555 = tmp_555 + '^u' + $('#555u').val();
		}
		
		if (tmp_555.length > 0) {
			$("#555").val('##' + tmp_555);
			$("#l-555").html('##' + tmp_555);
		} else {
			$("#555").val('');
			$("#l-555").html('&nbsp;');
		}
	});

	$("#555u").bind('keyup change', function(event) {
		var tmp_555 = "";

		if ($('#555a').val().length > 0) {
			tmp_555 = tmp_555 + '^a' + $('#555a').val();
		}

		if ($('#555b').val().length > 0) {
			tmp_555 = tmp_555 + '^b' + $('#555b').val();
		}

		if ($('#555d').val().length > 0) {
			tmp_555 = tmp_555 + '^d' + $('#555d').val();
		}

		if ($('#555u').val().length > 0) {
			tmp_555 = tmp_555 + '^u' + $('#555u').val();
		}
		
		if (tmp_555.length > 0) {
			$("#555").val('##' + tmp_555);
			$("#l-555").html('##' + tmp_555);
		} else {
			$("#555").val('');
			$("#l-555").html('&nbsp;');
		}
	});

	$("#561i1, #561i2, #561a, #561u").bind('keyup change', function(event) {
		var tmp_561 = "";

		if ($('#561a').val().length > 0) {
			tmp_561 = tmp_561 + '^a' + $('#561a').val();
		}

		if ($('#561u').val().length > 0) {
			tmp_561 = tmp_561 + '^u' + $('#561u').val();
		}

		if (tmp_561.length > 0) {
			$("#561").val($("#561i1").val() + $("#561i2").val() + tmp_561);
			$("#l-561").html($("#561i1").val() + $("#561i2").val() + tmp_561);
		} else {
			$("#561").val('');
			$("#l-561").html('&nbsp;');
		}
	});
	
	$("#588a").bind('keyup change', function(event) {
		var tmp_588 = "";

		if ($('#588a').val().length > 0) {
			tmp_588 = tmp_588 + '^a' + $('#588a').val();
		}
		
		if (tmp_588.length > 0) {
			$("#588").val('##' + tmp_588);
			$("#l-588").html('##' + tmp_588);
		} else {
			$("#588").val('');
			$("#l-588").html('&nbsp;');
		}
	});

	$("#600i1, #600i2, #600a, #600b, #600d, #600c, #600e, #600v, #600x, #600y, #600z").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
		}

		if ($('#600b').val().length > 0) {
			tmp_600 = tmp_600 + '^b' + $('#600b').val();
		}
		
		if ($('#600d').val().length > 0) {
			tmp_600 = tmp_600 + '^d' + $('#600d').val();
		}

		if ($('#600c').val().length > 0) {
			tmp_600 = tmp_600 + '^c' + $('#600c').val();
		}

		if ($('#600e').val().length > 0) {
			tmp_600 = tmp_600 + '^e' + $('#600e').val();
		}

		if ($('#600v').val().length > 0) {
			tmp_600 = tmp_600 + '^v' + $('#600v').val();
		}

		if ($('#600x').val().length > 0) {
			tmp_600 = tmp_600 + '^x' + $('#600x').val();
		}

		if ($('#600y').val().length > 0) {
			tmp_600 = tmp_600 + '^y' + $('#600y').val();
		}

		if ($('#600z').val().length > 0) {
			tmp_600 = tmp_600 + '^z' + $('#600z').val();
		}
		
		if (tmp_600.length > 0) {
			$("#600").val($("#600i1").val() + $("#600i2").val() + tmp_600);
			$("#l-600").html($("#600i1").val() + $("#600i2").val() + tmp_600);
		} else {
			$("#600").val('');
			$("#l-600").html('&nbsp;');
		}
	});

	$("#610i1").change(function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#610i2").change(function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});
	
	$("#610a").bind('keyup change', function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#610b").bind('keyup change', function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#610e").bind('keyup change', function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#610v").bind('keyup change', function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#610x").bind('keyup change', function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#610y").bind('keyup change', function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#610z").bind('keyup change', function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#648i1, #648i2, #648a, #648v, #648x, #648y, #648z").bind('keyup change', function(event) {
		var tmp_648 = "";

		if ($('#648a').val().length > 0) {
			tmp_648 = tmp_648 + '^a' + $('#648a').val();
		}

		if ($('#648v').val().length > 0) {
			tmp_648 = tmp_648 + '^v' + $('#648v').val();
		}

		if ($('#648x').val().length > 0) {
			tmp_648 = tmp_648 + '^x' + $('#648x').val();
		}

		if ($('#648y').val().length > 0) {
			tmp_648 = tmp_648 + '^y' + $('#648y').val();
		}

		if ($('#648z').val().length > 0) {
			tmp_648 = tmp_648 + '^z' + $('#648z').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val($("#648i1").val() + $("#648i2").val() + tmp_648);
			$("#l-648").html($("#648i1").val() + $("#648i2").val() + tmp_648);
		} else {
			$("#648").val('');
			$("#l-648").html('&nbsp;');
		}
	});
	
	$("#650i1").change(function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});

	$("#650i2").change(function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});

	$("#650a").bind('keyup change', function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});
	
	$("#650a").bind('keyup change', function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});

	$("#650v").bind('keyup change', function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});

	$("#650x").bind('keyup change', function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});

	$("#650y").bind('keyup change', function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});

	$("#650z").bind('keyup change', function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});

	$("#651i1").change(function(event) {
		var tmp_651 = "";

		if ($('#651a').val().length > 0) {
			tmp_651 = tmp_651 + '^a' + $('#651a').val();
		}

		if ($('#651v').val().length > 0) {
			tmp_651 = tmp_651 + '^v' + $('#651v').val();
		}

		if ($('#651x').val().length > 0) {
			tmp_651 = tmp_651 + '^x' + $('#651x').val();
		}

		if ($('#651y').val().length > 0) {
			tmp_651 = tmp_651 + '^y' + $('#651y').val();
		}

		if ($('#651z').val().length > 0) {
			tmp_651 = tmp_651 + '^z' + $('#651z').val();
		}
		
		if (tmp_651.length > 0) {
			$("#651").val($("#651i1").val() + $("#651i2").val() + tmp_651);
			$("#l-651").html($("#651i1").val() + $("#651i2").val() + tmp_651);
		} else {
			$("#651").val('');
			$("#l-651").html('&nbsp;');
		}
	});

	$("#651i2").change(function(event) {
		var tmp_651 = "";

		if ($('#651a').val().length > 0) {
			tmp_651 = tmp_651 + '^a' + $('#651a').val();
		}

		if ($('#651v').val().length > 0) {
			tmp_651 = tmp_651 + '^v' + $('#651v').val();
		}

		if ($('#651x').val().length > 0) {
			tmp_651 = tmp_651 + '^x' + $('#651x').val();
		}

		if ($('#651y').val().length > 0) {
			tmp_651 = tmp_651 + '^y' + $('#651y').val();
		}

		if ($('#651z').val().length > 0) {
			tmp_651 = tmp_651 + '^z' + $('#651z').val();
		}
		
		if (tmp_651.length > 0) {
			$("#651").val($("#651i1").val() + $("#651i2").val() + tmp_651);
			$("#l-651").html($("#651i1").val() + $("#651i2").val() + tmp_651);
		} else {
			$("#651").val('');
			$("#l-651").html('&nbsp;');
		}
	});

	$("#651a").bind('keyup change', function(event) {
		var tmp_651 = "";

		if ($('#651a').val().length > 0) {
			tmp_651 = tmp_651 + '^a' + $('#651a').val();
		}

		if ($('#651v').val().length > 0) {
			tmp_651 = tmp_651 + '^v' + $('#651v').val();
		}

		if ($('#651x').val().length > 0) {
			tmp_651 = tmp_651 + '^x' + $('#651x').val();
		}

		if ($('#651y').val().length > 0) {
			tmp_651 = tmp_651 + '^y' + $('#651y').val();
		}

		if ($('#651z').val().length > 0) {
			tmp_651 = tmp_651 + '^z' + $('#651z').val();
		}
		
		if (tmp_651.length > 0) {
			$("#651").val($("#651i1").val() + $("#651i2").val() + tmp_651);
			$("#l-651").html($("#651i1").val() + $("#651i2").val() + tmp_651);
		} else {
			$("#651").val('');
			$("#l-651").html('&nbsp;');
		}
	});

	$("#651v").bind('keyup change', function(event) {
		var tmp_651 = "";

		if ($('#651a').val().length > 0) {
			tmp_651 = tmp_651 + '^a' + $('#651a').val();
		}

		if ($('#651v').val().length > 0) {
			tmp_651 = tmp_651 + '^v' + $('#651v').val();
		}

		if ($('#651x').val().length > 0) {
			tmp_651 = tmp_651 + '^x' + $('#651x').val();
		}

		if ($('#651y').val().length > 0) {
			tmp_651 = tmp_651 + '^y' + $('#651y').val();
		}

		if ($('#651z').val().length > 0) {
			tmp_651 = tmp_651 + '^z' + $('#651z').val();
		}
		
		if (tmp_651.length > 0) {
			$("#651").val($("#651i1").val() + $("#651i2").val() + tmp_651);
			$("#l-651").html($("#651i1").val() + $("#651i2").val() + tmp_651);
		} else {
			$("#651").val('');
			$("#l-651").html('&nbsp;');
		}
	});

	$("#651x").bind('keyup change', function(event) {
		var tmp_651 = "";

		if ($('#651a').val().length > 0) {
			tmp_651 = tmp_651 + '^a' + $('#651a').val();
		}

		if ($('#651v').val().length > 0) {
			tmp_651 = tmp_651 + '^v' + $('#651v').val();
		}

		if ($('#651x').val().length > 0) {
			tmp_651 = tmp_651 + '^x' + $('#651x').val();
		}

		if ($('#651y').val().length > 0) {
			tmp_651 = tmp_651 + '^y' + $('#651y').val();
		}

		if ($('#651z').val().length > 0) {
			tmp_651 = tmp_651 + '^z' + $('#651z').val();
		}
		
		if (tmp_651.length > 0) {
			$("#651").val($("#651i1").val() + $("#651i2").val() + tmp_651);
			$("#l-651").html($("#651i1").val() + $("#651i2").val() + tmp_651);
		} else {
			$("#651").val('');
			$("#l-651").html('&nbsp;');
		}
	});

	$("#651y").bind('keyup change', function(event) {
		var tmp_651 = "";

		if ($('#651a').val().length > 0) {
			tmp_651 = tmp_651 + '^a' + $('#651a').val();
		}

		if ($('#651v').val().length > 0) {
			tmp_651 = tmp_651 + '^v' + $('#651v').val();
		}

		if ($('#651x').val().length > 0) {
			tmp_651 = tmp_651 + '^x' + $('#651x').val();
		}

		if ($('#651y').val().length > 0) {
			tmp_651 = tmp_651 + '^y' + $('#651y').val();
		}

		if ($('#651z').val().length > 0) {
			tmp_651 = tmp_651 + '^z' + $('#651z').val();
		}
		
		if (tmp_651.length > 0) {
			$("#651").val($("#651i1").val() + $("#651i2").val() + tmp_651);
			$("#l-651").html($("#651i1").val() + $("#651i2").val() + tmp_651);
		} else {
			$("#651").val('');
			$("#l-651").html('&nbsp;');
		}
	});

	$("#651z").bind('keyup change', function(event) {
		var tmp_651 = "";

		if ($('#651a').val().length > 0) {
			tmp_651 = tmp_651 + '^a' + $('#651a').val();
		}

		if ($('#651v').val().length > 0) {
			tmp_651 = tmp_651 + '^v' + $('#651v').val();
		}

		if ($('#651x').val().length > 0) {
			tmp_651 = tmp_651 + '^x' + $('#651x').val();
		}

		if ($('#651y').val().length > 0) {
			tmp_651 = tmp_651 + '^y' + $('#651y').val();
		}

		if ($('#651z').val().length > 0) {
			tmp_651 = tmp_651 + '^z' + $('#651z').val();
		}
		
		if (tmp_651.length > 0) {
			$("#651").val($("#651i1").val() + $("#651i2").val() + tmp_651);
			$("#l-651").html($("#651i1").val() + $("#651i2").val() + tmp_651);
		} else {
			$("#651").val('');
			$("#l-651").html('&nbsp;');
		}
	});

	$("#653i1").change(function(event) {
		var tmp_653 = "";

		if ($('#653a').val().length > 0) {
			tmp_653 = tmp_653 + '^a' + $('#653a').val();
		}
		
		if (tmp_653.length > 0) {
			$("#653").val($("#653i1").val() + $("#653i2").val() + tmp_653);
			$("#l-653").html($("#653i1").val() + $("#653i2").val() + tmp_653);
		} else {
			$("#653").val('');
			$("#l-653").html('&nbsp;');
		}
	});

	$("#653i2").change(function(event) {
		var tmp_653 = "";

		if ($('#653a').val().length > 0) {
			tmp_653 = tmp_653 + '^a' + $('#653a').val();
		}
		
		if (tmp_653.length > 0) {
			$("#653").val($("#653i1").val() + $("#653i2").val() + tmp_653);
			$("#l-653").html($("#653i1").val() + $("#653i2").val() + tmp_653);
		} else {
			$("#653").val('');
			$("#l-653").html('&nbsp;');
		}
	});

	$("#653a").bind('keyup change', function(event) {
		var tmp_653 = "";

		if ($('#653a').val().length > 0) {
			tmp_653 = tmp_653 + '^a' + $('#653a').val();
		}
		
		if (tmp_653.length > 0) {
			$("#653").val($("#653i1").val() + $("#653i2").val() + tmp_653);
			$("#l-653").html($("#653i1").val() + $("#653i2").val() + tmp_653);
		} else {
			$("#653").val('');
			$("#l-653").html('&nbsp;');
		}
	});

	$("#690a").bind('keyup change', function(event) {
		var tmp_690 = "";

		if ($('#690a').val().length > 0) {
			tmp_690 = tmp_690 + '^a' + $('#690a').val();
		}
		
		if (tmp_690.length > 0) {
			$("#690").val(tmp_690);
			$("#l-690").html(tmp_690);
		} else {
			$("#690").val('');
			$("#l-690").html('&nbsp;');
		}
	});

	$("#700i1").change(function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700i2").change(function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700a").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700b").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700c").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700d").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700e").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700q").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700t").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#7004").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#710i1, #710i2, #710a, #710b, #710c, #710d, #710e, #710f, #710g, #710h, #710i, #710k, #710l, #710m, #710n, #710o, #710p, #710r, #710s, #710t, #710u, #710x").bind('keyup change', function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710c').val().length > 0) {
			tmp_710 = tmp_710 + '^c' + $('#710c').val();
		}

		if ($('#710d').val().length > 0) {
			tmp_710 = tmp_710 + '^d' + $('#710d').val();
		}
		
		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710f').val().length > 0) {
			tmp_710 = tmp_710 + '^f' + $('#710f').val();
		}

		if ($('#710g').val().length > 0) {
			tmp_710 = tmp_710 + '^g' + $('#710g').val();
		}

		if ($('#710h').val().length > 0) {
			tmp_710 = tmp_710 + '^h' + $('#710h').val();
		}

		if ($('#710i').val().length > 0) {
			tmp_710 = tmp_710 + '^i' + $('#710i').val();
		}

		if ($('#710k').val().length > 0) {
			tmp_710 = tmp_710 + '^k' + $('#710k').val();
		}

		if ($('#710l').val().length > 0) {
			tmp_710 = tmp_710 + '^l' + $('#710l').val();
		}

		if ($('#710m').val().length > 0) {
			tmp_710 = tmp_710 + '^m' + $('#710m').val();
		}

		if ($('#710n').val().length > 0) {
			tmp_710 = tmp_710 + '^n' + $('#710n').val();
		}

		if ($('#710o').val().length > 0) {
			tmp_710 = tmp_710 + '^o' + $('#710o').val();
		}

		if ($('#710p').val().length > 0) {
			tmp_710 = tmp_710 + '^p' + $('#710p').val();
		}

		if ($('#710r').val().length > 0) {
			tmp_710 = tmp_710 + '^r' + $('#710r').val();
		}

		if ($('#710s').val().length > 0) {
			tmp_710 = tmp_710 + '^s' + $('#710s').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#710u').val().length > 0) {
			tmp_710 = tmp_710 + '^u' + $('#710u').val();
		}

		if ($('#710x').val().length > 0) {
			tmp_710 = tmp_710 + '^x' + $('#710x').val();
		}
		
		if (tmp_710.length > 0) {
			$("#710").val($("#710i1").val() + $("#710i2").val() + tmp_710);
			$("#l-710").html($("#710i1").val() + $("#710i2").val() + tmp_710);
		} else {
			$("#710").val('');
			$("#l-710").html('&nbsp;');
		}
	});

	$("#740i1").change(function(event) {
		var tmp_740 = "";

		if ($('#740a').val().length > 0) {
			tmp_740 = tmp_740 + '^a' + $('#740a').val();
		}

		if ($('#740n').val().length > 0) {
			tmp_740 = tmp_740 + '^n' + $('#740n').val();
		}

		if ($('#740p').val().length > 0) {
			tmp_740 = tmp_740 + '^p' + $('#740p').val();
		}
		
		if (tmp_740.length > 0) {
			$("#740").val($("#740i1").val() + $("#740i2").val() + tmp_740);
			$("#l-740").html($("#740i1").val() + $("#740i2").val() + tmp_740);
		} else {
			$("#740").val('');
			$("#l-740").html('&nbsp;');
		}
	});

	$("#740i2").change(function(event) {
		var tmp_740 = "";

		if ($('#740a').val().length > 0) {
			tmp_740 = tmp_740 + '^a' + $('#740a').val();
		}

		if ($('#740n').val().length > 0) {
			tmp_740 = tmp_740 + '^n' + $('#740n').val();
		}

		if ($('#740p').val().length > 0) {
			tmp_740 = tmp_740 + '^p' + $('#740p').val();
		}
		
		if (tmp_740.length > 0) {
			$("#740").val($("#740i1").val() + $("#740i2").val() + tmp_740);
			$("#l-740").html($("#740i1").val() + $("#740i2").val() + tmp_740);
		} else {
			$("#740").val('');
			$("#l-740").html('&nbsp;');
		}
	});

	$("#740a").bind('keyup change', function(event) {
		var tmp_740 = "";

		if ($('#740a').val().length > 0) {
			tmp_740 = tmp_740 + '^a' + $('#740a').val();
		}

		if ($('#740n').val().length > 0) {
			tmp_740 = tmp_740 + '^n' + $('#740n').val();
		}

		if ($('#740p').val().length > 0) {
			tmp_740 = tmp_740 + '^p' + $('#740p').val();
		}
		
		if (tmp_740.length > 0) {
			$("#740").val($("#740i1").val() + $("#740i2").val() + tmp_740);
			$("#l-740").html($("#740i1").val() + $("#740i2").val() + tmp_740);
		} else {
			$("#740").val('');
			$("#l-740").html('&nbsp;');
		}
	});
	
	$("#740n").bind('keyup change', function(event) {
		var tmp_740 = "";

		if ($('#740a').val().length > 0) {
			tmp_740 = tmp_740 + '^a' + $('#740a').val();
		}

		if ($('#740n').val().length > 0) {
			tmp_740 = tmp_740 + '^n' + $('#740n').val();
		}

		if ($('#740p').val().length > 0) {
			tmp_740 = tmp_740 + '^p' + $('#740p').val();
		}
		
		if (tmp_740.length > 0) {
			$("#740").val($("#740i1").val() + $("#740i2").val() + tmp_740);
			$("#l-740").html($("#740i1").val() + $("#740i2").val() + tmp_740);
		} else {
			$("#740").val('');
			$("#l-740").html('&nbsp;');
		}
	});

	$("#740p").bind('keyup change', function(event) {
		var tmp_740 = "";

		if ($('#740a').val().length > 0) {
			tmp_740 = tmp_740 + '^a' + $('#740a').val();
		}

		if ($('#740n').val().length > 0) {
			tmp_740 = tmp_740 + '^n' + $('#740n').val();
		}

		if ($('#740p').val().length > 0) {
			tmp_740 = tmp_740 + '^p' + $('#740p').val();
		}
		
		if (tmp_740.length > 0) {
			$("#740").val($("#740i1").val() + $("#740i2").val() + tmp_740);
			$("#l-740").html($("#740i1").val() + $("#740i2").val() + tmp_740);
		} else {
			$("#740").val('');
			$("#l-740").html('&nbsp;');
		}
	});

	$("#773i1").change(function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773i2").change(function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773a").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773b").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773d").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773g").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773h").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773k").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773n").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773q").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773t").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773z").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#850a").bind('keyup change', function(event) {
		var tmp_850 = "";

		if ($('#850a').val().length > 0) {
			tmp_850 = tmp_850 + '^a' + $('#850a').val();
		}
		
		if (tmp_850.length > 0) {
			$("#850").val('##' + tmp_850);
			$("#l-850").html('##' + tmp_850);
		} else {
			$("#850").val('');
			$("#l-850").html('&nbsp;');
		}
	});

	$("#852i1").change(function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852i2").change(function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852a").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852b").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852c").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852h").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852i").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852j").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852k").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852m").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#856i1").change(function(event) {
		var tmp_856 = "";

		if ($('#856a').val().length > 0) {
			tmp_856 = tmp_856 + '^a' + $('#856a').val();
		}

		if ($('#856d').val().length > 0) {
			tmp_856 = tmp_856 + '^d' + $('#856d').val();
		}

		if ($('#856u').val().length > 0) {
			tmp_856 = tmp_856 + '^u' + $('#856u').val();
		}

		if (tmp_856.length > 0) {
			$("#856").val($("#856i1").val() + $("#856i2").val() + tmp_856);
			$("#l-856").html($("#856i1").val() + $("#856i2").val() + tmp_856);
		} else {
			$("#856").val('');
			$("#l-856").html('&nbsp;');
		}
	});

	$("#856i2").change(function(event) {
		var tmp_856 = "";

		if ($('#856a').val().length > 0) {
			tmp_856 = tmp_856 + '^a' + $('#856a').val();
		}

		if ($('#856d').val().length > 0) {
			tmp_856 = tmp_856 + '^d' + $('#856d').val();
		}

		if ($('#856u').val().length > 0) {
			tmp_856 = tmp_856 + '^u' + $('#856u').val();
		}

		if (tmp_856.length > 0) {
			$("#856").val($("#856i1").val() + $("#856i2").val() + tmp_856);
			$("#l-856").html($("#856i1").val() + $("#856i2").val() + tmp_856);
		} else {
			$("#856").val('');
			$("#l-856").html('&nbsp;');
		}
	});

	$("#856a").bind('keyup change', function(event) {
		var tmp_856 = "";

		if ($('#856a').val().length > 0) {
			tmp_856 = tmp_856 + '^a' + $('#856a').val();
		}

		if ($('#856d').val().length > 0) {
			tmp_856 = tmp_856 + '^d' + $('#856d').val();
		}

		if ($('#856u').val().length > 0) {
			tmp_856 = tmp_856 + '^u' + $('#856u').val();
		}

		if (tmp_856.length > 0) {
			$("#856").val($("#856i1").val() + $("#856i2").val() + tmp_856);
			$("#l-856").html($("#856i1").val() + $("#856i2").val() + tmp_856);
		} else {
			$("#856").val('');
			$("#l-856").html('&nbsp;');
		}
	});

	$("#856d").bind('keyup change', function(event) {
		var tmp_856 = "";

		if ($('#856a').val().length > 0) {
			tmp_856 = tmp_856 + '^a' + $('#856a').val();
		}

		if ($('#856d').val().length > 0) {
			tmp_856 = tmp_856 + '^d' + $('#856d').val();
		}

		if ($('#856u').val().length > 0) {
			tmp_856 = tmp_856 + '^u' + $('#856u').val();
		}

		if (tmp_856.length > 0) {
			$("#856").val($("#856i1").val() + $("#856i2").val() + tmp_856);
			$("#l-856").html($("#856i1").val() + $("#856i2").val() + tmp_856);
		} else {
			$("#856").val('');
			$("#l-856").html('&nbsp;');
		}
	});

	$("#856u").bind('keyup change', function(event) {
		var tmp_856 = "";

		if ($('#856a').val().length > 0) {
			tmp_856 = tmp_856 + '^a' + $('#856a').val();
		}

		if ($('#856d').val().length > 0) {
			tmp_856 = tmp_856 + '^d' + $('#856d').val();
		}

		if ($('#856u').val().length > 0) {
			tmp_856 = tmp_856 + '^u' + $('#856u').val();
		}

		if (tmp_856.length > 0) {
			$("#856").val($("#856i1").val() + $("#856i2").val() + tmp_856);
			$("#l-856").html($("#856i1").val() + $("#856i2").val() + tmp_856);
		} else {
			$("#856").val('');
			$("#l-856").html('&nbsp;');
		}
	});

	//-------------- Validaciones ---------------
	
	// Campos obligatorios vacíos.
	$('#MagazineEditForm').submit(function(event) {
		if (!$("#fecha008-07-10").prop("disabled") && ($("#fecha008-07-10").val().length < 4)) {
			alert("La primera fecha debe tener 4 dígitos correspondientes al año.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t0xx').parent().addClass('active');
			$('#0xx').show();
			$('#fecha008-07-10').focus();
			return false;
		} else {
			if ((!$("#fecha008-07-10").prop("disabled")) && ((isNaN($("#fecha008-07-10").val())))) {
				alert("La primera fecha debe ser un valor numérico.");
				$(".tabs").hide();
				$('.active').removeClass('active');
				$('#t0xx').parent().addClass('active');
				$('#0xx').show();
				$('#fecha008-07-10').focus();
				return false;
			}
		}

		if (!$("#fecha008-11-14").prop("disabled") && ($("#fecha008-11-14").val().length < 4)) {
			alert("La segunda fecha debe tener 4 dígitos correspondientes al año.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t0xx').parent().addClass('active');
			$('#0xx').show();
			$('#fecha008-11-14').focus();
			return false;
		} else {
			if ((!$("#fecha008-11-14").prop("disabled")) && ((isNaN($("#fecha008-11-14").val())))) {
				alert("La segunda fecha debe ser un valor numérico.");
				$(".tabs").hide();
				$('.active').removeClass('active');
				$('#t0xx').parent().addClass('active');
				$('#0xx').show();
				$('#fecha008-11-14').focus();
				return false;
			}
		}
		
		/*if ($('#100a').val() == ""){
			alert("EL campo 'Nombre de persona' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t1xx').parent().addClass('active');
			$('#1xx').show();
			$('#100a').focus();
			return false;
		}*/

		if ($('#245a').val() == ""){
			alert("EL campo 'Mención de título' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t2xx').parent().addClass('active');
			$('#2xx').show();
			$('#245a').focus();
			return false;
		}

		/*
		if ($('#260a').val() == ""){
			alert("EL campo 'Lugar de publicación, distribución, etc.' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t2xx').parent().addClass('active');
			$('#2xx').show();
			$('#260a').focus();
			return false;
		}

		if ($('#260b').val() == ""){
			alert("EL campo 'Nombre del editor, distribuidor, etc.' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t2xx').parent().addClass('active');
			$('#2xx').show();
			$('#260b').focus();
			return false;
		}

		if ($('#260c').val() == ""){
			alert("EL campo 'Fecha de publicación, distribución, etc.' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t2xx').parent().addClass('active');
			$('#2xx').show();
			$('#260c').focus();
			return false;
		}

		if ($('#653a').val() == ""){
			alert("EL campo 'Término de indización – No controlado' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t6xx').parent().addClass('active');
			$('#6xx').show();
			$('#653a').focus();
			return false;
		}

		if ($('#690a option:selected').val() == ""){
			alert("EL campo 'Siglo' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t6xx').parent().addClass('active');
			$('#6xx').show();
			$('#690a').focus();
			return false;
		}
		
		if ($('#MagazineCover').val() == ""){
			alert("Debe seleccionar una portada para la obra.");
			$('#ItemItem').focus();
			return false;
		}

		if ($('#MagazineItem').val() == ""){
			alert("Debe seleccionar el archivo o documento de la obra.");
			$('#ItemItem').focus();
			return false;
		}
		*/
		
		return true;
	});

	$('#245a').change(function() {
		$.post("<?php echo $this->base; ?>/items/publications/" + $(this).val(), function(data) {
			//publications = data;
			//Actualizar object DOM publications.
		});
	});
});

var authors = <?php echo $authors; ?>;
var titles = <?php echo $titles; ?>;
var places = <?php echo $places; ?>;
var editors = <?php echo $editors; ?>;
var years = <?php echo $years; ?>;
var publications = <?php echo $publications; ?>;
var matters = <?php echo $matters; ?>;
</script>
<?php echo $this->Html->script('autocomplete/jquery.autocomplete.min'); ?>
<?php echo $this->Html->script('autocomplete/currency-autocomplete'); ?>
<script type="text/javascript">
$(document).ready(function() {
	// Ancho del autocompletar.
	$('.autocomplete-suggestions').css('width', '30%');
});
</script>