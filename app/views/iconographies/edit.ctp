<?php echo $this->Html->css('autocomplete/autocomplete'); ?>
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

<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '2'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li><a href="<?php echo $this->base; ?>/iconographies">Iconografía Musical en Venezuela</a></li>
  <li>Modificar Obra</li>
</ul>
<?php } else if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '1'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li><a href="<?php echo $this->base; ?>/iconographies">Iconografía Musical en Venezuela</a></li>
   <li>Modificar Obra</li>
</ul>
<?php } else { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/pages">Inicio</a></li>
 <li><a href="<?php echo $this->base; ?>/iconographies">Iconografía Musical en Venezuela</a></li>
 <li>Modificar Obra</li>
</ul>
<?php } ?>


<div class="items">
<div class="col-md-12 column">
<h2>Modificar Obra</h2>

<?php echo $this->Form->create('Iconographie', array('enctype' => 'multipart/form-data')); ?>
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
				/*'a' => 'a - Material textual.',
				'c' => 'c - Música notada impresa.',
				'd' => 'd - Música notada manuscrita.',
				'e' => 'e - Material cartográfico.',
				'f' => 'f - Material cartográfico manuscrito.',
				'g' => 'g - Material gráfico proyectable.',
				'i' => 'i - Grabación sonora no musical.',
				'j' => 'j - Grabación sonora musical.',*/
				'k' => 'k - Material gráfico bidimensional, no proyectable.',
				/*'m' => 'm - Archivo de ordenador.',
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
				'a' => 'a - Parte componente monográfica.',
				'b' => 'b - Parte componente seriada.',
				/*'c' => 'c - Colección.',
				'd' => 'd - Subunidad.',
				'i' => 'i - Recurso integrable.',*/
				'm' => 'm - Monografía.'/*,
				's' => 's - Publicación seriada.'*/
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
	<li class="disabled"><a class="tab" href="" id="t9xx">4XX</a></li>
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
							$c0080710_2 = "aammdd"; // Fecha 1
							$c0080710_3 = "";
							$c0080710_4 = "aammdd"; // Fecha 2
							$c0081517 = "";
							$c0083537 = "";
							$c00838 = "";
							$c00839 = "";
							
							// La primera fecha no se utiliza (||||).
							if ($c0080710_1 == '|') { // Caso 4.
								$c0080710_1 = "||||";
								
								if ((substr($c008, 11, 1) != '|') && (substr($c008, 11, 1) != '#') && (substr($c008, 11, 1) != 'u')) {
									$c0080710_3 = "sf";
									$c0080710_4 = substr($c008, 11, 6);
								} else {
									if (substr($c008, 13, 1) == '|') {
										$c0080710_3 = "||||";
									} else {
										$c0080710_3 = substr($c008, 11, 1);
									}
								}
							}

							// La primera fecha se utiliza (pf - aammdd).
							if (($c0080710_1 != "||||") && ($c0080710_1 != '#') && ($c0080710_1 != 'u')) { // Caso 1.
								$c0080710_1 = "pf";
								$c0080710_2 = substr($c008, 7, 6);
								
								if ((substr($c008, 13, 1) != '#') && (substr($c008, 13, 1) != '|') && (substr($c008, 13, 1) != 'u')) {
									$c0080710_3 = "sf";
									$c0080710_4 = substr($c008, 13, 6);
									$c0081517 = substr($c008, 19, 3);
									$c0083537 = substr($c008, 22, 3);
									$c00838 = substr($c008, 25, 1);
									$c00839 = substr($c008, 26, 1);
									
								} else {
									if (substr($c008, 13, 1) == '|') {
										$c0080710_3 = "||||";
										$c0081517 = substr($c008, 17, 3);
										$c0083537 = substr($c008, 20, 3);
										$c00838 = substr($c008, 23, 1);
										$c00839 = substr($c008, 24, 1);
									} else {
										$c0080710_3 = substr($c008, 13, 1);
										$c0081517 = substr($c008, 14, 3);
										$c0083537 = substr($c008, 17, 3);
										$c00838 = substr($c008, 20, 1);
										$c00839 = substr($c008, 21, 1);
									}
								}
							}
							
							// La primera fecha es '#' o 'u'.
							if (($c0080710_1 == '#') || ($c0080710_1 == 'u')) { // Caso 2 y 3. 
								$c0080710_3 = substr($c008, 8, 6);
								
								if ((substr($c008, 8, 1) != '|') && (substr($c008, 8, 1) != '#') && (substr($c008, 8, 1) != 'u')) {
									$c0080710_3 = "sf";
									$c0080710_4 = substr($c008, 8, 6);
									$c0081517 = substr($c008, 14, 3);
									$c0083537 = substr($c008, 17, 3);
									$c00838 = substr($c008, 20, 1);
									$c00839 = substr($c008, 21, 1);
								} else {
									if (substr($c008, 11, 1) == '|') {
										$c0080710_3 = "||||";
										$c0081517 = substr($c008, 12, 3);
										$c0083537 = substr($c008, 19, 3);
										$c00838 = substr($c008, 22, 1);
										$c00839 = substr($c008, 23, 1);
									} else {
										$c0080710_3 = substr($c008, 8, 1);
										$c0081517 = substr($c008, 9, 3);
										$c0083537 = substr($c008, 16, 3);
										$c00838 = substr($c008, 19, 1);
										$c00839 = substr($c008, 20, 1);
									}
								}
							}
						?>
						<?php echo $this->Form->input('008-07-10', array('id' => '008-07-10', 'label' => false, 'class' => 'form-control', 'div' => false,
						'options' => array(
							'pf' => 'Primera Fecha (aammdd)',
							'#' => '# - El elemento fecha no es aplicable',
							'u' => 'u - Fecha total o parcialmente desconocida',
							'||||' => '|||| - No se utiliza'
							), 'selected' => $c0080710_1
						)); ?>
					</td>
					<td>
						<?php
							if ($c0080710_1 != 'pf') {
								echo $this->Form->input('fecha1-008-07-10', array('id' => 'fecha008-07-10', 'label' => false, 'class' => 'form-control', 'div' => false, 'maxlength' => '6', 'disabled' => 'disabled', 'value' => $c0080710_2));
							} else {
								echo $this->Form->input('fecha1-008-07-10', array('id' => 'fecha008-07-10', 'label' => false, 'class' => 'form-control', 'div' => false, 'maxlength' => '6', 'value' => $c0080710_2));
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
							'sf' => 'Segunda Fecha (aammdd)',
							'#' => '# - El elemento fecha no es aplicable',
							'u' => 'u - Fecha total o parcialmente desconocida',
							'||||' => '|||| - No se utiliza'
							), 'selected' => $c0080710_3
						)); ?>
					</td>
					<td>
						<?php
							if ($c0080710_3 != 'sf') {
								echo $this->Form->input('fecha2-008-11-14', array('id' => 'fecha008-11-14', 'label' => false, 'class' => 'form-control', 'div' => false, 'maxlength' => '6', 'disabled' => 'disabled', 'value' => $c0080710_4));
							} else {
								echo $this->Form->input('fecha2-008-11-14', array('id' => 'fecha008-11-14', 'label' => false, 'class' => 'form-control', 'div' => false, 'maxlength' => '6', 'value' => $c0080710_4));
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
			'-aa' => '-aa Albania',
				'abc' => 'abc - Alberta',
				'-ac' => '-ac - Ashmore and Cartier Islands',
				'-ae' => '-ae - Algeria',
				'-af' => '-af - Afghanistan',
				'-ag' => '-ag -Argentina',
				'-ai' => '-ai - Anguilla',
				'aip' => 'aip Armenia (Republic)',
				'air' => 'air - Armenian S.S.R.',
				'-aj' => '-aj - Azerbaijan',
				'ajr' => 'ajr - Azerbaijan S.S.R.',
				'aku' => 'aku - Alaska',
				'alu' => 'alu - Alabama',
				'-am' => '-am - Anguilla',
				'-an' => '-an - Andorra',
				'-ao' => '-ao - Angola',
				'-aq' => '-aq - Antigua and Barbuda',
				'aru' => 'aru - Arkansas',
				'-as' => '-as - American Samoa',
				'-at' => '-at - Australia',
				'-au' => '-au - Austria',
				'-aw' => '-aw - Aruba',
				'-ay' => '-ay - Antarctica',
				'azu' => 'azu - Arizona',
				'-ba' => '-ba - Bahrain',
				'-bb' => '-bb - Barbados',
				'bcc' => 'bcc - British Columbia',
				'-bd' => '-bd - Burundi',
				'-be' => '-be - Belgium',
				'-bf' => '-bf - Bahamas',
				'-bg' => '-bg - Bangladesh',
				'-bh' => '-bh - Belize',
				'-bi' => '-bi - British Indian Ocean Territory',
				'-bl' => '-bl - Brazil',
				'-bm' => '-bm- Bermuda Islands',
				'-bn' => '-bn - Bosnia and Hercegovina',
				'-bo' => '-bo - Bolivia',
				'-bp' => '-bp - Solomon Islands',
				'-br' => '-br - Burma',
				'-bs' => '-bs - Botswana',
				'-bt' => '-bt - Bhutan',
				'-bu' => '-bu -Bulgaria',
				'-bv' => '-bv - Bouvet Island',
				'-bw' => '-bw - Belarus',
				'bwr' => 'bwr - Byelorussian S.S.R.',
				'-bx' => '-bx - Brunei',
				'cau' => 'cau - California',
				'-cb' => '-cb - Cambodia',
				'-cc' => '-cc -China',
				'-cd' => '-cd - Chad',
				'-ce' => '-ce - Sri Lanka',
				'-cf' => '-cf - Congo (Brazzaville)',
				'-cg' => '-cg - Congo (Democratic Republic)',
				'-ch' => '-ch - China (Republic : 1949- )',
				'-ci' => '-ci - Croatia',
				'-cj' => '-cj - Cayman Islands',
				'-ck' => '-ck - Colombia',
				'-cl' => '-cl - Chile',
				'-cm' => '-cm - Cameroon',
				'-cn' => '-cn - Canada',
				'cou' => 'cou - Colorado',
				'-cp' => '-cp - Canton and Enderbury Islands',
				'-cq' => '-cq - Comoros',
				'-cr' => '-cr - Costa Rica',
				'-cs' => '-cs - Czechoslovakia',
				'ctu' => 'ctu - Connecticut',
				'-cu' => '-cu - Cuba',
				'-cv' => '-cv - Cape Verde',
				'-cw' => '-cw - Cook Islands',
				'-cx' => '-cx - Central African Republic',
				'-cy' => '-cy - Cyprus',
				'-cz' => '-cz - Canal Zone',
				'dcu' => 'dcu - District of Columbia',
				'deu' => 'deu - Delaware',
				'-dk' => '-dk - Denmark',
				'-dm' => '-dm - Benin',
				'-dq' => '-dq - Dominica',
				'-dr' => '-dr - Dominican Republic',
				'-ea' => '-ea - Eritrea',
				'-ec' => '-ec - Ecuador',
				'-eg' => '-eg - Equatorial Guinea',
				'-em' => '-em - East Timor',
				'enk' => 'enk - England',
				'-er' => '-er - Estonia',
				/*'err' => 'Estonia',*/
				'-es' => '-es - El Salvador',
				'-et' => '-et - Ethiopia',
				'-fa' => '-fa - Faroe Islands',
				'-fg' => '-fg - French Guiana',
				'-fi' => '-fi - Finland',
				'-fj' => '-fj - Fiji',
				'-fk' => '-fk - Falkland Islands',
				'flu' => 'flu - Florida',
				'-fm' => '-fm - Micronesia (Federated States)',
				'-fp' => '-fp - French Polynesia',
				'-fr' => '-fr - France',
				'-fs' => '-fs - Terres australes et antarctiques françaises',
				'-ft' => '-ft - Djibouti',
				'gau' => 'gau - GeorgiaCode Sequence',
				'-gb' => '-gb - Kiribati',
				'-gd' => '-gd - Grenada',
				'-ge' => '-ge - Germany (East)',
				'-gh' => '-gh - Ghana',
				'-gi' => '-gi - Gibraltar',
				'-gl' => '-gl - Greenland',
				'-gm' => '-gm - Gambia',
				'-gn' => '-gn - Gilbert and Ellice Islands',
				'-go' => '-go - Gabon',
				'-gp' => '-gp - Guadeloupe',
				'-gr' => '-gr - Greece',
				'-gs' => '-gs - Georgia (Republic)',
				'gsr' => 'gsr - Georgian S.S.R.',
				'-gt' => '-gt - Guatemala',
				'-gu' => '-gu - Guam',
				'-gv' => '-gv - Guinea',
				'-gw' => '-gw - Germany',
				'-gy' => '-gy - Guyana',
				'-gz' => '-gz - Gaza Strip',
				'hiu' => 'hiu - Hawaii',
				'-hk' => '-hk - Hong Kong',
				'-hm' => '-hm - Heard and McDonald Islands',
				'-ho' => '-ho - Honduras',
				'-ht' => '-ht - Haiti',
				'-hu' => '-hu - Hungary',
				'iau' => 'iau - Iowa',
				'-ic' => '-ic - Iceland',
				'idu' => 'idu - Idaho',
				'-ie' => '-ie - Ireland',
				'-ii' => '-ii - India',
				'ilu' => 'ilu - Illinois',
				'inu' => 'inu - Indiana',
				'-io' => '-io - Indonesia',
				'-iq' => '-iq - Iraq',
				'-ir' => '-ir - Iran',
				'-is' => '-is - Israel',
				'-it' => '-it - Italy',
				'-iu' => '-iu - Israel-Syria Demilitarized Zones',
				'-iv' => "-iv - Côte d’Ivoire",
				'-iw' => '-iw - Israel-Jordan Demilitarized Zones',
				'-iy' => '-iy - Iraq-Saudi Arabia Neutral Zone',
				'-ja' => '-ja - Japan',
				'-ji' => '-ji - Johnston Atoll',
				'-jm' => '-jm - Jamaica',
				'-jn' => '-jn - Jan Mayen',
				'-jo' => '-jo - Jordan',
				'-ke' => '-ke - Kenya',
				'-kg' => '-kg - Kyrgyzstan',
				'kgr' => 'kgr - Kirghiz S.S.R.',
				'-kn' => '-kn - Korea (North)',
				'-ko' => '-ko - Korea (South)',
				'ksu' => 'ksu - Kansas',
				'-ku' => '-ku - Kuwait',
				'kyu' => 'kyu -Kentucky',
				'-kz' => '-kz - Kazakhstan',
				'kzr' => 'kzr - Kazakh S.S.R.',
				'lau' => 'lau - Louisiana',
				'-lb' => 'Liberia',
				'-le' => '-lb - Lebanon',
				'-lh' => '-lh - Liechtenstein',
				'-li' => '-li - Lithuania',
				/*'lir' => 'Lithuania',*/
				'-ln' => '-ln - Central and Southern Line Islands',
				'-lo' => '-lo - Lesotho',
				'-ls' => '-ls - Laos',
				'-lu' => '-lu - Luxembourg',
				'-lv' => '-lv - Latvia',
				/*'lvr' => 'Latvia',*/
				'-ly' => '-ly - Libya',
				'mau' => 'mau - Massachusetts',
				'mbc' => 'mbc - Manitoba',
				'-mc' => '-mc - Monaco',
				'mdu' => 'mdu - Maryland',
				'meu' => 'meu - Maine',
				'-mf' => '-mf - Mauritius',
				'-mg' => '-mg - Madagascar',
				'-mh' => '-mh - Macao',
				'miu' => 'miu - Michigan',
				'-mj' => '-mj - Montserrat',
				'-mk' => '-mk - Oman',
				'-ml' => '-ml - Mali',
				'-mm' => '-mm - Malta',
				'mnu' => 'mnu - Minnesota',
				'mou' => 'mou - Missouri',
				'-mp' => '-mp - Mongolia',
				'-mq' => '-mq - Martinique',
				'-mr' => '-mr - Morocco',
				'msu' => 'msu - Mississippi',
				'mtu' => 'mtu - Montana',
				'-mu' => '-mu - Mauritania',
				'-mv' => '-mv - Moldova',
				'mvr' => 'mvr - Moldavian S.S.R.',
				'-mw' => '-mw - Malawi',
				'-mx' => '-mx - Mexico',
				'-my' => '-my - Malaysia',
				'-mz' => '-mz - Mozambique',
				'-na' => '-na - Netherlands Antilles',
				'nbu' => 'nbu - Nebraska',
				'ncu' => 'ncu - North Carolina',
				'ndu' => 'ndu - North Dakota',
				'-ne' => '-ne - Netherlands',
				'nfc' => 'nfc - Newfoundland and Labrador',
				'-ng' => '-ng - Niger',
				'nhu' => 'nhu - New Hampshire',
				'nik' => 'nik - Northern Ireland',
				'nju' => 'nju - New Jersey',
				'nkc' => 'nkc - New Brunswick',
				'-nl' => '-nl - New CaledoniaCode Sequence',
				'-nm' => '-nm - Northern Mariana Islands',
				'nmu' => 'nmu - New Mexico',
				'-nn' => '-nn - Vanuatu',
				'-no' => '-no - Norway',
				'-np' => '-np - Nepal',
				'-nq' => '-nq - Nicaragua',
				'-nr' => '-nr - Nigeria',
				'nsc' => 'nsc - Nova Scotia',
				'ntc' => 'ntc - Northwest Territories',
				'-nu' => '-nu - Nauru',
				'nuc' => 'nuc - Nunavut',
				'nvu' => 'nvu - Nevada',
				'-nx' => '-nx - Norfolk Island',
				'nyu' => 'nyu - New York (State)',
				'-nz' => '-nz - New Zealand',
				'ohu' => 'ohu - Ohio',
				'oku' => 'oku - Oklahoma',
				'onc' => 'onc - Ontario',
				'oru' => 'oru - Oregon',
				'-ot' => '-ot - Mayotte',
				'pau' => 'pau - Pennsylvania',
				'-pc' => '-pc - Pitcairn Island',
				'-pe' => '-pe - Peru',
				'-pf' => '-pf - Paracel Islands',
				'-pg' => '-pg - Guinea-Bissau',
				'-ph' => '-ph - Philippines',
				'pic' => 'pic - Prince Edward Island',
				'-pk' => '-pk - Pakistan',
				'-pl' => '-pl - Poland',
				'-pn' => '-pn - Panama',
				'-po' => '-po - Portugal',
				'-pp' => '-pp - Papua New Guinea',
				'-pr' => '-pr - Puerto Rico',
				'-pt' => '-pt - Portuguese Timor',
				'-pw' => '-pw - Palau',
				'-py' => '-py - Paraguay',
				'-qa' => '-qa - Qatar',
				'quc' => 'quc - Québec (Province)',
				'-re' => '-re - Réunion',
				'-rh' => '-rh - Zimbabwe',
				'riu' => 'riu - Rhode Island',
				'-rm' => '-rm - Romania',
				'-ru' => '-ru - Russia (Federation)',
				'rur' => 'rur - Russian S.F.S.R.',
				'-rw' => '-rw - Rwanda',
				'-ry' => '-ry - Ryukyu Islands, Southern',
				'-sa' => '-sa - South Africa',
				'-sb' => '-sb - Svalbard',
				'scu' => 'scu - South Carolina',
				'sdu' => 'sdu - South Dakota',
				'-se' => '-se - Seychelles',
				'-sf' => '-sf - Sao Tome and Principe',
				'-sg' => '-sg - Senegal',
				'-sh' => '-sh - Spanish North Africa',
				'-si' => '-si - Singapore',
				'-sj' => '-sj - Sudan',
				'-sk' => '-sk - Sikkim',
				'-sl' => '-sl - Sierra Leone',
				'-sm' => '-sm - San Marino',
				'snc' => 'snc - Saskatchewan',
				'-so' => '-so - Somalia',
				'-sp' => '-sp - Spain',
				'-sq' => '-sq - Swaziland',
				'-sr' => '-sr - Surinam',
				'-ss' => '-ss - Western Sahara',
				'stk' => 'stk - Scotland',
				'-su' => '-su - Saudi Arabia',
				'-sv' => '-sv - Swan Islands',
				'-sw' => '-sw - Sweden',
				'-sx' => '-sx - Namibia',
				'-sy' => '-sy - Syria',
				'-sz' => '-sz - Switzerland',
				'-ta' => '-ta - Tajikistan',
				'tar' => 'tar - Tajik S.S.R.',
				'-tc' => '-tc - Turks and Caicos Islands',
				'-tg' => '-tg - Togo',
				'-th' => '-th - Thailand',
				'-ti' => '-ti - Tunisia',
				'-tk' => '-tk - Turkmenistan',
				'tkr' => 'tkr - Turkmen S.S.R.',
				'-tl' => '-tl - Tokelau',
				'tnu' => 'tnu - Tennessee',
				'-to' => '-to - Tonga',
				'-tr' => '-tr - Trinidad and Tobago',
				'-ts' => '-ts - United Arab Emirates',
				'-tt' => '-tt - Trust Territory of the Pacific Islands',
				'-tu' => '-tu - Turkey',
				'-tv' => '-tv - Tuvalu',
				'txu' => 'txu - Texas',
				'-tz' => '-tz - Tanzania',
				'-ua' => '-ua - Egypt',
				'-uc' => '-uc - United States Misc. Caribbean Islands',
				'-ug' => '-ug - Uganda',
				'-ui' => '-ui - United Kingdom Misc. Islands',
				/*'uik' => 'United Kingdom Misc. Islands',*/
				'-uk' => '-uk - United Kingdom',
				'-un' => '-un - Ukraine',
				/*'unr' => 'Ukraine',*/
				'-up' => '-up - United States Misc. Pacific Islands',
				'-ur' => '-ur - Soviet Union',
				'-us' => '-us - United States',
				'utu' => 'utu - Utah',
				'-uv' => '-uv - Burkina Faso',
				'-uy' => '-uy - Uruguay',
				'-uz' => '-uz - Uzbekistan',
				'uzr' => 'uzr - Uzbek S.S.R.Code Sequence',
				'vau' => 'vau - Virginia',
				'-vb' => '-vb - British Virgin Islands',
				'-vc' => '-vc - Vatican City',
				'-ve' => '-ve - Venezuela',
				'-vi' => '-vi - Virgin Islands of the United States',
				'-vm' => '-vm - Vietnam',
				'-vn' => '-vn - Vietnam, North',
				'-vp' => '-vp - Various places',
				'-vs' => '-vs - Vietnam, South',
				'vtu' => 'vtu - Vermont',
				'wau' => 'wau - Washington (State)',
				'-wb' => '-wb - West Berlin',
				'-wf' => '-wf - Wallis and Futuna',
				'wiu' => 'wiu - Wisconsin',
				'-wj' => '-wj - West Bank of the Jordan River',
				'-wk' => '-wk - Wake Island',
				'wlk' => 'wlk - Wales',
				'-ws' => '-ws - Samoa',
				'wvu' => 'wvu - West Virginia',
				'wyu' => 'wyu - Wyoming',
				'-xa' => '-xa - Christmas Island (Indian Ocean)',
				'-xb' => '-xb - Cocos (Keeling)Islands',
				'-xc' => '-xc - Maldives',
				'-xd' => '-xd - Saint Kitts-Nevis',
				'-xe' => '-xe - Marshall Islands',
				'-xf' => '-xf - Midway Islands',
				'-xh' => '-xh - Niue',
				'-xi' => '-xi - Saint Kitts-Nevis-Anguilla',
				'-xj' => '-xj - Saint Helena',
				'-xk' => '-xk - Saint Lucia',
				'-xl' => '-xl - Saint Pierre and Miquelon',
				'-xm' => '-xm - Saint Vincent and the Grenadines',
				'-xn' => '-xn - Macedonia',
				'-xo' => '-xo - Slovakia',
				'-xp' => '-xp - Spratly Island',
				'-xr' => '-xr - Czech Republic',
				'-xs' => '-xs - South Georgia and the South Sandwich Islands',
				'-xv' => '-xv - lovenia',
				'xxx' => 'xxx - No place, unknown, or undetermined',
				/*'xxc' => 'Canada',
				'xxk' => 'United Kingdom',*/
				/*'xxr' => 'Soviet Union',*/
				/*'xxu' => 'United States',*/
				'-ye' => '-ye - Yemen',
				'ykc' => 'Ykc - ukon Territory',
				'-ys' => '-ys - Yemen (People’s Democratic Republic)',
				'-yu' => '-yu - Serbia and Montenegro',
				'-za' => '-za - Zambia'
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
		<td><b>008 [35-37]</b></td>
		<td>Lengua.</td>
		<td><?php echo $this->Form->input('008-35-37', array('id' => '008-35-37', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'aar' => 'aar - Afar',
				'abk' => 'abk - Abkhaz',
				'ace' => 'ace - Achinese',
				'ach' => 'ach - Acoli',
				'ada' => 'ada - Adangme',
				'ady' => 'ady - Adygei',
				'afa' => 'afa - Afroasiatic (Other)',
				'afh' => 'afh - Afrihili (Artificial language)',
				'afr' => 'afr - Afrikaans',
				'ain' => 'ain - Ainu',
				'ajm' => 'ajm - Aljamía',
				'aka' => 'aka - Akan',
				'akk' => 'akk - Akkadian',
				'alb' => 'alb - Albanian',
				'ale' => 'ale - Aleut',
				'alg' => 'alg - Algonquian (Other)',
				'alt' => 'alt - Altai',
				'amh' => 'amh - Amharic',
				'ang' => 'ang - English, Old (ca. 450-1100)',
				'anp' => 'anp - Angika',
				'apa' => 'apa - Apache languages',
				'ara' => 'ara - Arabic',
				'arc' => 'arc - Aramaic',
				'arg' => 'arg - Aragonese Spanish',
				'arm' => 'arm - Armenian',
				'arn' => 'arn - Mapuche',
				'arp' => 'arp - Arapaho',
				'art' => 'art - Artificial (Other)',
				'arw' => 'arw - Arawak',
				'asm' => 'asm - Assamese',
				'ast' => 'ast - Bable',
				'ath' => 'ath - Athapascan (Other)',
				'aus' => 'aus - Australian languages',
				'ava' => 'ava - Avaric',
				'ave' => 'ave - Avestan',
				'awa' => 'awa - Awadhi',
				'aym' => 'aym - Aymara',
				'aze' => 'aze - Azerbaijani',
				'bad' => 'bad - Banda languages',
				'bai' => 'bai - Bamileke languages',
				'bak' => 'bak - Bashkir',
				'bal' => 'bal - Baluchi',
				'bam' => 'bam - Bambara',
				'ban' => 'ban - Balinese',
				'baq' => 'baq - Basque',
				'bas' => 'bas - Basa',
				'bat' => 'bat - Baltic (Other)',
				'bej' => 'bej - Beja',
				'bel' => 'bel - Belarusian',
				'bem' => 'bem - Bemba',
				'ben' => 'ben - Bengali',
				'ber' => 'ber - Berber (Other)',
				'bho' => 'bho - Bhojpuri',
				'bih' => 'bih - Bihari',
				'bik' => 'bik - Bikol',
				'bin' => 'bin - Edo',
				'bis' => 'bis - Bislama',
				'bla' => 'bla - Siksika',
				'bnt' => 'bnt - Bantu (Other)',
				'bos' => 'bos - Bosnian',
				'bra' => 'bra - Braj',
				'bre' => 'bre - Breton',
				'btk' => 'btk - Batak',
				'bua' => 'bua - Buriat',
				'bug' => 'bug - Bugis',
				'bul' => 'bul - Bulgarian',
				'bur' => 'bur - Burmese',
				'byn' => 'byn - Bilin',
				'cad' => 'cad - Caddo',
				'cai' => 'cai - Central American Indian (Other)',
				'cam' => 'cam - Khmer',
				'car' => 'car - Carib',
				'cat' => 'cat - Catalan',
				'cau' => 'cau - Caucasian (Other)',
				'ceb' => 'ceb - Cebuano',
				'cel' => 'cel - Celtic (Other)',
				'cha' => 'cha - Chamorro',
				'chb' => 'chb - Chibcha',
				'che' => 'che - Chechen',
				'chg' => 'chg - Chagatai',
				'chi' => 'chi - Chinese',
				'chk' => 'chk - Chuukese',
				'chm' => 'chm - Mari',
				'chn' => 'chn - Chinook jargon',
				'cho' => 'cho - Choctaw',
				'chp' => 'chp - Chipewyan',
				'chr' => 'chr - Cherokee',
				'chu' => 'chu - Church Slavic',
				'chv' => 'chv - Chuvash',
				'chy' => 'chy - Cheyenne',
				'cmc' => 'cmc - Chamic languages',
				'cop' => 'cop - Coptic',
				'cor' => 'cor - Cornish',
				'cos' => 'cos - Corsican',
				'cpe' => 'cpe - Creoles and Pidgins, French-based (Other)',
				'cpf' => 'cpf - Creoles and Pidgins, Portuguese-based (Other)',
				'cre' => 'cre - Cree',
				'crh' => 'crh - Crimean Tatar',
				'crp' => 'crp - Creoles and Pidgins (Other)',
				'csb' => 'csb - Kashubian',
				'cus' => 'cus - Cushitic (Other)',
				'cze' => 'cze - Czech',
				'dak' => 'dak - Dakota',
				'dan' => 'dan - Danish',
				'dar' => 'dar - Dargwa',
				'day' => 'day - Dayak',
				'del' => 'del - Delaware',
				'den' => 'den - Slave',
				'dgr' => 'dgr - Dogrib',
				'din' => 'din - Dinka',
				'div' => 'div - Divehi',
				'doi' => 'doi - Dogri',
				'dra' => 'dra - Dravidian (Other)',
				'dsb' => 'dsb - Lower Sorbian',
				'dua' => 'dua - Duala',
				'dum' => 'dum - Dutch, Middle (ca. 1050-1350)',
				'dut' => 'dut - Dutch',
				'dyu' => 'dyu - Dyula',
				'dzo' => 'dzo - Dzongkha',
				'efi' => 'efi - Efik',
				'egy' => 'egy - Egyptian',
				'eka' => 'eka - Ekajuk',
				'elx' => 'elx - Elamite',
				'eng' => 'eng - English',
				'enm' => 'enm - English, Middle (1100-1500)',
				'epo' => 'epo - Esperanto',
				'esk' => 'esk - Eskimo languages',
				'esp' => 'esp - Esperanto',
				'est' => 'est - Estonian',
				'eth' => 'eth - Ethiopic',
				'ewe' => 'ewe - Ewe',
				'ewo' => 'ewo - Ewondo',
				'fan' => 'fan - Fang',
				'fao' => 'fao - Faroese',
				'far' => 'far - Faroese',
				'fat' => 'fat - Fanti',
				'fij' => 'fij - Fijian',
				'fil' => 'fil - Filipino',
				'fin' => 'fin - Finnish',
				'fiu' => 'fiu - Finno-Ugrian (Other)',
				'fon' => 'fon - Fon',
				'fre' => 'fre - French',
				'fri' => 'fri - Frisian',
				'frm' => 'frm - French, Middle (ca. 1300-1600)',
				'fro' => 'fro - French, Old (ca. 842-1300)',
				'frr' => 'frr - North Frisian',
				'frs' => 'frs - East Frisian',
				'fry' => 'fry - Frisian',
				'ful' => 'ful - Fula',
				'fur' => 'fur - Friulian',
				'gaa' => 'gaa - Gã',
				'gae' => 'gae - Scottish Gaelix',
				'gag' => 'gag - Galician',
				'gal' => 'gal - Oromo',
				'gay' => 'gay - Gayo',
				'gba' => 'gba - Gbaya',
				'gem' => 'gem - Germanic (Other)',
				'geo' => 'geo - Georgian',
				'ger' => 'ger - German',
				'gez' => 'gez - Ethiopic',
				'gil' => 'gil - Gilbertese',
				'gla' => 'gla - Scottish Gaelic',
				'gle' => 'gle - Irish',
				'glg' => 'glg - Galician',
				'glv' => 'glv - Manx',
				'gmh' => 'gmh - German, Middle High (ca. 1050-1500)',
				'goh' => 'goh - German, Old High (ca. 750-1050)',
				'gon' => 'gon - Gondi',
				'gor' => 'gor - Gorontalo',
				'got' => 'got - Gothic',
				'grb' => 'grb - Grebo',
				'grc' => 'grc - Greek, Ancient (to 1453)',
				'gre' => 'gre - Greek, Modern (1453- )',
				'grn' => 'grn - Guarani',
				'gsw' => 'gsw - Swiss German',
				'gua' => 'gua - Guarani',
				'guj' => 'guj - Gujarati',
				'gwi' => 'gwi - Gwichin',
				'hai' => 'hai - Haida',
				'hat' => 'hat - Haitian French Creole',
				'hau' => 'hau - Hausa',
				'haw' => 'haw - Hawaiian',
				'heb' => 'heb - Hebrew',
				'her' => 'her - Herero',
				'hil' => 'hil - Hiligaynon',
				'him' => 'him - Himachali',
				'hin' => 'hin - Hindi',
				'hit' => 'hit - Hittite',
				'hmn' => 'hmn - Hmong',
				'hmo' => 'hmo - Hiri Motu',
				'hsb' => 'hsb - Upper Sorbian',
				'hun' => 'hun - Hungarian',
				'iba' => 'iba - Iban',
				'ibo' => 'ibo - Igbo',
				'ice' => 'ice - Icelandic',
				'ido' => 'ido - Ido',
				'iii' => 'iii - Sichuan Yi',
				'ijo' => 'ijo - Ijo',
				'iku' => 'iku - Inuktitut',
				'ile' => 'ile - Interlingue',
				'ilo' => 'ilo - Iloko',
				'inc' => 'inc - Indic (Other)',
				'ind' => 'ind - Indonesian',
				'ine' => 'ine - Indo-European (Other)',
				'inh' => 'inh - Ingush',
				'ipk' => 'ipk - Inupiaq',
				'ira' => 'ira - Iranian (Other)',
				'iri' => 'iri - Irish',
				'iro' => 'iro - Iroquoian (Other)',
				'ita' => 'ita - Italian',
				'jav' => 'jav - Javanese',
				'jbo' => 'jbo - Lojban (Artificial language)',
				'jpn' => 'jpn - Japanese',
				'jpr' => 'jpr - Judeo-Persian',
				'jrb' => 'jrb - Judeo-Arabic',
				'kaa' => 'kaa - Kara-Kalpak',
				'kab' => 'kab - Kabyle',
				'kac' => 'kac - Kachin',
				'kal' => 'kal - Kalâtdlisut',
				'kam' => 'kam - Kamba',
				'kan' => 'kan - Kannada',
				'kar' => 'kar - Karen languages',
				'kas' => 'kas - Kashmiri',
				'kau' => 'kau - Kanuri',
				'kaw' => 'kaw - Kawi',
				'kaz' => 'kaz - Kazakh',
				'kbd' => 'kbd - Kabardian',
				'kha' => 'kha - Khasi',
				'khi' => 'khi - Khoisan (Other)',
				'khm' => 'khm - Khmer',
				'kho' => 'kho - Khotanese',
				'kik' => 'kik - Kikuyu',
				'kin' => 'kin - Kinyarwanda',
				'kir' => 'kir - Kyrgyz',
				'kmb' => 'kmb - Kimbundu',
				'kok' => 'kok - Konkani',
				'kom' => 'kom - Komi',
				'kon' => 'kon - Kongo',
				'kor' => 'kor - Korean',
				'kos' => 'kos - Kusaie',
				'kpe' => 'kpe - Kpelle',
				'krc' => 'krc - Karachay-Balkar',
				'krl' => 'krl - Karelian',
				'kro' => 'kro - Kru (Other)',
				'kru' => 'kru - Kurukh',
				'kua' => 'kua - Kuanyama',
				'kum' => 'kum - Kumyk',
				'kur' => 'kur - Kurdish',
				'kus' => 'kus - Kusaie',
				'kut' => 'kut - Kootenai',
				'lad' => 'lad - Ladino',
				'lah' => 'lah - Lahndā',
				'lam' => 'lam - Lamba (Zambia and Congo)',
				'lan' => 'lan - Occitan (post 1500)',
				'lao' => 'lao - Lao',
				'lap' => 'lap - Sami',
				'lat' => 'lat - Latin',
				'lav' => 'lav - Latvian',
				'lez' => 'lez - Lezgian',
				'lim' => 'lim - Limburgish',
				'lin' => 'lin - Lingala',
				'lit' => 'lit - Lithuanian',
				'lol' => 'lol - Mongo-Nkundu',
				'loz' => 'loz - Lozi',
				'ltz' => 'ltz - Luxembourgish',
				'lua' => 'lua - Luba-Lulua',
				'lub' => 'lub - Luba-Katanga',
				'lug' => 'lug - Ganda',
				'lui' => 'lui - Luiseño',
				'lun' => 'lun - Lunda',
				'luo' => 'Luo - Luo (Kenya and Tanzania)',
				'lus' => 'lus - Lushai',
				'mac' => 'mac - Macedonian',
				'mad' => 'mad - Madurese',
				'mag' => 'mag - Magahi',
				'mah' => 'mah - Marshallese',
				'mai' => 'mai - Maithili',
				'mak' => 'mak - Makasar',
				'mal' => 'mal - Malayalam',
				'man' => 'man - Mandingo',
				'mao' => 'mao - Maori',
				'map' => 'map - map - Austronesian (Other)',
				'mar' => 'mar - Marathi',
				'mas' => 'mas - Masai',
				'max' => 'max - Manx',
				'may' => 'may - Malay',
				'mdf' => 'mdf - Moksha',
				'mdr' => 'mdr - Mandar',
				'men' => 'men - Mende',
				'mic' => 'mic - Micmac',
				'min' => 'min - Minangkabau',
				'mis' => 'mis - Miscellaneous languages',
				'mkh' => 'mkh - Mon-Khmer (Other)',
				'mla' => 'mla - Malagasy',
				'mlg' => 'mlg - Malagasy',
				'mlt' => 'mlt - Maltese',
				'mnc' => 'mnc - Manchu',
				'mni' => 'mni - Manipuri',
				'mno' => 'mno - Manobo languages',
				'moh' => 'moh - Mohawk',
				'mol' => 'mol - Moldavian',
				'mon' => 'mon - Mongolian',
				'mos' => 'mos - Mooré',
				'mul' => 'mul - Multiple languages',
				'mun' => 'mun - Munda (Other)',
				'mus' => 'mus - Creek',
				'mwl' => 'mwl - Mirandese',
				'mwr' => 'mwr - Marwari',
				'myn' => 'myn - Mayan languages',
				'myv' => 'myv - Erzya',
				'nah' => 'nah - Nahuatl',
				'nai' => 'nai - North American Indian (Other)',
				'nap' => 'nap - Neapolitan Italian',
				'nau' => 'nau - Nauru',
				'nav' => 'nav - Navajo',
				'nbl' => 'nbl - Ndebele (South Africa)',
				'nde' => 'nde - Ndebele (Zimbabwe)',
				'ndo' => 'ndo - Ndonga',
				'nds' => 'nds - Low German',
				'nep' => 'nep - Nepali',
				'new' => 'new - Newari',
				'nia' => 'nia - Nias',
				'nic' => 'nic - Niger-Kordofanian (Other)',
				'niu' => 'niu - Niuean',
				'nno' => 'nno - Norwegian (Nynorsk)',
				'nob' => 'nob - Norwegian (Bokmål)',
				'nog' => 'nog - Nogai',
				'non' => 'non - Old Norse',
				'nor' => 'nor - Norwegian',
				'nqo' => "nqo - N'Ko",
				'nso' => 'nso - Northern Sotho',
				'nub' => 'nub - Nubian languages',
				'nwc' => 'nwc - Newari, Old',
				'nya' => 'nya - Nyanja',
				'nym' => 'nym - Nyamwezi',
				'nyn' => 'nyn - Nyankole',
				'nyo' => 'nyo - Nyoro',
				'nzi' => 'nzi - Nzima',
				'oci' => 'oci - Occitan (post 1500)',
				'oji' => 'oji - Ojibwa',
				'ori' => 'ori - Oriya',
				'orm' => 'or, - Oromo',
				'osa' => 'osa - Osage',
				'oss' => 'oss - Ossetic',
				'ota' => 'ota - Turkish, Ottoman',
				'oto' => 'oto - Otomian languages',
				'paa' => 'paa - Papuan (Other)',
				'pag' => 'pag - Pangasinan',
				'pal' => 'pal - Pahlavi',
				'pam' => 'pam - Pampanga',
				'pan' => 'pan - Panjabi',
				'pap' => 'pap - Papiamento',
				'pau' => 'peu - Palauan',
				'peo' => 'peo - Old Persian (ca. 600-400 B.C.)',
				'per' => 'per - Persian',
				'phi' => 'phi -  Philippine (Other)',
				'phn' => 'phn - Phoenician',
				'pli' => 'pli - Pali',
				'pol' => 'pol - Polish',
				'pon' => 'pon - Ponape',
				'por' => 'por - Portuguese',
				'pra' => 'pra - Prakrit languages',
				'pro' => 'pro - Provençal (to 1500)',
				'pus' => 'pus - Pushto',
				'que' => 'que - Quechua',
				'raj' => 'raj - Rajasthani',
				'rap' => 'rap - Rapanui',
				'rar' => 'rar - Rarotongan',
				'roa' => 'roa - Romance (Other)',
				'roh' => 'roh - Raeto-Romance',
				'rom' => 'rom - Romani',
				'rum' => 'rum - Romanian',
				'run' => 'run - Rundi',
				'rup' => 'sup - Aromanian',
				'rus' => 'rus - Russian',
				'sad' => 'sad - Sandawe',
				'sag' => 'sag - Sango (Ubangi Creole)',
				'sah' => 'sah - Yakut',
				'sai' => 'sai - South American Indian (Other)',
				'sal' => 'sal - Salishan languages',
				'sam' => 'sam - Samaritan Aramaic',
				'san' => 'san - Sanskrit',
				'sao' => 'sao - Samoan',
				'sas' => 'sas - Sasak',
				'sat' => 'sat - Santali',
				'scc' => 'scc - Serbian',
				'scn' => 'scn - Sicilian Italian',
				'sco' => 'sco - Scots',
				'scr' => 'scr - Croatian',
				'sel' => 'sel - Selkup',
				'sga' => 'sga - Irish, Old (to 1100)',
				'sgn' => 'sgn - Sign languages',
				'shn' => 'shn - Shan',
				'sho' => 'sho - Shona',
				'sid' => 'sid - Sidamo',
				'sin' => 'sin - Sinhalese',
				'sio' => 'sio - Siouan (Other)',
				'sit' => 'sit - Sino-Tibetan (Other)',
				'sla' => 'sla - Slavic (Other)',
				'slo' => 'slo - Slovak',
				'slv' => 'slv - Slovenian',
				'sma' => 'sma - Southern Sami',
				'sme' => 'sme - Northern Sami',
				'smi' => 'smi - Sami',
				'smj' => 'smj - Lule Sami',
				'smn' => 'smn - Inari Sami',
				'smo' => 'smo - Samoan',
				'sms' => 'sms - Skolt Sami',
				'sna' => 'sna - Shona',
				'snd' => 'snd - Sindhi',
				'snh' => 'snh - Sinhalese',
				'snk' => 'snk - Soninke',
				'sog' => 'sog - Sogdian',
				'som' => 'som - Somali',
				'son' => 'son - Songhai',
				'sot' => 'sot - Sotho',
				'spa' => 'spa - Spanish',
				'srd' => 'srd - Sardinian',
				'srn' => 'srn - Sranan',
				'srr' => 'srr - Serer',
				'ssa' => 'ssa - Nilo-Saharan (Other)',
				'sso' => 'sso - Sotho',
				'ssw' => 'ssw - Swazi',
				'suk' => 'suk - Sukuma',
				'sun' => 'sun - Sundanese',
				'sus' => 'sus - Susu',
				'sux' => 'sux - Sumerian',
				'swa' => 'swa - Swahili',
				'swe' => 'swe - Swedish',
				'swz' => 'swz - Swazi',
				'syc' => 'syc - Syriac',
				'syr' => 'syr - Syriac, Modern',
				'tag' => 'tag - Tagalog',
				'tah' => 'tah - Tahitian',
				'tai' => 'tai - Tai (Other)',
				'taj' => 'taj - Tajik',
				'tam' => 'tam - Tamil',
				'tar' => 'tar - Tatar',
				'tat' => 'tat - Tatar',
				'tel' => 'tel - Telugu',
				'tem' => 'tem - Temne',
				'ter' => 'ter - Terena',
				'tet' => 'tet - Tetum',
				'tgk' => 'tgk - Tajik',
				'tgl' => 'tgl - Tagalog',
				'tha' => 'tha - Thai',
				'tib' => 'tib - Tibetan',
				'tig' => 'tig - Tigré',
				'tir' => 'tir - Tigrinya',
				'tiv' => 'tiv - Tiv',
				'tkl' => 'tkl - Tokelauan',
				'tlh' => 'tlh - Klingon (Artificial language)',
				'tli' => 'tli - Tlingit',
				'tmh' => 'tmh - Tamashek',
				'tog' => 'tog - Tonga (Nyasa)',
				'ton' => 'ton - Tongan',
				'tpi' => 'tpi - Tok Pisin',
				'tru' => 'tru - Truk',
				'tsi' => 'tsi - Tsimshian',
				'tsn' => 'tsn - Tswana',
				'tso' => 'tso - Tsonga',
				'tsw' => 'tsw - Tswana',
				'tuk' => 'tuk - Turkmen',
				'tum' => 'tum - Tumbuka',
				'tup' => 'tup - Tupi languages',
				'tur' => 'tur - Turkish',
				'tut' => 'tut - Altaic (Other)',
				'tvl' => 'tvl - Tuvaluan',
				'twi' => 'twi - Twi',
				'tyv' => 'tyv - Tuvinian',
				'udm' => 'udm - Udmurt',
				'uga' => 'uga - Ugaritic',
				'uig' => 'iug - Uighur',
				'ukr' => 'ukr - Ukrainian',
				'umb' => 'umb - Umbundu',
				'und' => 'und - Undetermined',
				'urd' => 'urd - Urdu',
				'uzb' => 'uzb - Uzbek',
				'vai' => 'vai - Vai',
				'ven' => 'ven - Venda',
				'vie' => 'vie - Vietnamese',
				'vol' => 'vol - Volapük',
				'vot' => 'vot - Votic',
				'wak' => 'wak - Wakashan languages',
				'wal' => 'wal - Wolayta',
				'war' => 'war - Waray',
				'was' => 'was - Washo',
				'wel' => 'wel - Welsh',
				'wen' => 'wen - Sorbian (Other)',
				'wln' => 'wln - Walloon',
				'wol' => 'wol - Wolof',
				'xho' => 'xho - Xhosa',
				'yao' => 'yao - Yao (Africa)',
				'yap' => 'yap - Yapese',
				'yid' => 'yid - Yiddish',
				'yor' => 'yor - Yoruba',
				'ypk' => 'ypk - Yupik languages',
				'zap' => 'zap - Zapotec',
				'zbl' => 'zbl - Blissymbolics',
				'zen' => 'zen - Zenaga',
				'zha' => 'zha - Zhuang',
				'znd' => 'znd - Zande languages',
				'zul' => 'zul - Zulu',
				'zun' => 'zun - Zuni',
				'zxx' => 'zxx - No linguistic content',
				'zza' => 'zza - Zaza'
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
	
	<tr>
		<td><b>008 [38]</b></td>
		<td>Registro modificado.</td>
		<td><?php echo $this->Form->input('008-38', array('id' => '008-38', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'#' => '# - No modificado',
				'd' => 'd - Se omite información pertinente',
				'o' => 'o - Completamente transliterado/fichas impresas en alfabeto latino',
				'r' => 'r - Completamente transliterado/fichas impresas en alfabeto no latino',
				's' => 's - Abreviado',
				'x' => 'x - Caracteres omitidos',
				'|' => '| - No se utiliza'
			),'select'=> $c00838
		)); ?>
		<script type="text/javascript">
			// Se ordena la lista.
			$("#008-38").append($("#008-38 option").remove().sort(function(a, b) {
			    var at = $(a).text(), bt = $(b).text();
			    return (at > bt)?1:((at < bt)?-1:0);
			}));
			$('#008-38').val('<?php echo $c00838; ?>');
		</script>
		</td>
	</tr>
	
	<tr>
		<td><b>008 [39]</b></td>
		<td>Funte de la catalogación.</td>
		<td><?php echo $this->Form->input('008-39', array('id' => '008-39', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'#'=> '# - Agencia bibliográfica nacional',
				'c' => 'c - Programa de catalogación cooperativa',
				'd' => 'd - Otros',
				'u' => 'u - Desconocido',
				'|' => '| - No se utiliza',
			),'select'=> $c00839
		)); ?>
		<script type="text/javascript">
			// Se ordena la lista.
			$("#008-39").append($("#008-39 option").remove().sort(function(a, b) {
			    var at = $(a).text(), bt = $(b).text();
			    return (at > bt)?1:((at < bt)?-1:0);
			}));
			$('#008-39').val('<?php echo $c00839; ?>');
		</script>
		</td>
	</tr>
	
</table>

<?php $c017 = marc21_decode($item['Item']['017']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>017</b></th>
		<th style="width: 45%;"><b>Número de copyright o de depósito legal.</b></th>
		<th style="width: 45%;">
			<label id="l-017"><?php echo $item['Item']['017']; ?></label>
			<?php echo $this->Form->hidden('017', array('id' => '017', 'label' => false, 'div' => false, 'value' => $item['Item']['017'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Número de copyright o de depósito legal.</td>
		<td>
			<?php
			if (isset($c017['a'])) {
				echo $this->Form->input('017a', array('id' => '017a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c017['a']));
			} else {
				echo $this->Form->input('017a', array('id' => '017a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c022 = marc21_decode($item['Item']['022']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>022</b></th>
		<th style="width: 45%;"><b>Número Internacional Normalizado para Publicaciones Seriadas (ISSN).</b></th>
		<th style="width: 45%;">
			<label id="l-022"><?php echo $item['Item']['022']; ?></label>
			<?php echo $this->Form->hidden('022', array('id' => '022', 'label' => false, 'div' => false, 'value' => $item['Item']['022'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>ISSN.</td>
		<td>
			<?php
			if (isset($c022['a'])) {
				echo $this->Form->input('022a', array('id' => '022a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c022['a']));
			} else {
				echo $this->Form->input('022a', array('id' => '022a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>ISSN incorrecto.</td>
		<td>
			<?php
			if (isset($c022['y'])) {
				echo $this->Form->input('022y', array('id' => '022y', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c022['y']));
			} else {
				echo $this->Form->input('022y', array('id' => '022y', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>ISSN cancelado.</td>
		<td>
			<?php
			if (isset($c022['z'])) {
				echo $this->Form->input('022z', array('id' => '022z', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c022['z']));
			} else {
				echo $this->Form->input('022z', array('id' => '022z', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
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
			if (isset($c041['a'])) {
				echo $this->Form->input('041a', array('id' => '041a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c041['a']));
			} else {
				echo $this->Form->input('041a', array('id' => '041a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
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
				echo $this->Form->input('044a', array('id' => '044a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c044['a']));
			} else {
				echo $this->Form->input('044a', array('id' => '044a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
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
		<td>Nombre de persona <font color="red">(Obligatorio)</font>.</td>
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

</div>

<div id="2xx" class="tabs" style="display: none;">


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
		<td>Lugar de publicación, distribución, etc <font color="red">(Obligatorio)</font>.</td>
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
		<td>Nombre del editor, distribuidor, etc <font color="red">(Obligatorio)</font>.</td>
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
		<td>Fecha de publicación, distribución, etc <font color="red">(Obligatorio)</font>.</td>
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

<?php $c336 = marc21_decode($item['Item']['336']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>336</b></th>
		<th style="width: 45%;"><b>Tipo de contenido.</b></th>
		<th style="width: 45%;">
			<label id="l-336"><?php echo $item['Item']['336']; ?></label>
			<?php echo $this->Form->hidden('336', array('id' => '336', 'label' => false, 'div' => false, 'value' => $item['Item']['336'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Término del tipo de contenido.</td>
		<td>
			<?php
			if (isset($c336['a'])) {
				echo $this->Form->input('336a', array('id' => '336a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c336['a']));
			} else {
				echo $this->Form->input('336a', array('id' => '336a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
		<tr>
		<td><b>$b</b></td>
		<td>Código de tipo de contenido.</td>
		<td>
			<?php
			if (isset($c336['b'])) {
				echo $this->Form->input('336b', array('id' => '336b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c336['b']));
			} else {
				echo $this->Form->input('336b', array('id' => '336b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	</table>
	
<?php $c337 = marc21_decode($item['Item']['337']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>337</b></th>
		<th style="width: 45%;"><b>Tipo de medio.</b></th>
		<th style="width: 45%;">
			<label id="l-337"><?php echo $item['Item']['337']; ?></label>
			<?php echo $this->Form->hidden('337', array('id' => '337', 'label' => false, 'div' => false, 'value' => $item['Item']['337'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre del tipo de medio.</td>
		<td>
			<?php
			if (isset($c337['a'])) {
				echo $this->Form->input('337a', array('id' => '337a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c337['a']));
			} else {
				echo $this->Form->input('337a', array('id' => '337a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
		<tr>
		<td><b>$b</b></td>
		<td>Código de tipo de medio.</td>
		<td>
			<?php
			if (isset($c337['b'])) {
				echo $this->Form->input('337b', array('id' => '337b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c337['b']));
			} else {
				echo $this->Form->input('337b', array('id' => '337b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	</table>	

<?php $c340 = marc21_decode($item['Item']['340']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>340</b></th>
		<th style="width: 45%;"><b>Medio físico/Tipo de Soporte.</b></th>
		<th style="width: 45%;">
			<label id="l-340"><?php echo $item['Item']['340']; ?></label>
			<?php echo $this->Form->hidden('340', array('id' => '340', 'label' => false, 'div' => false, 'value' => $item['Item']['340'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Base y configuración del material.</td>
		<td>
			<?php
			if (isset($c340['a'])) {
				echo $this->Form->input('340a', array('id' => '340a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c340['a']));
			} else {
				echo $this->Form->input('340a', array('id' => '340a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
		<tr>
		<td><b>$b</b></td>
		<td>Dimensiones.</td>
		<td>
			<?php
			if (isset($c340['b'])) {
				echo $this->Form->input('340b', array('id' => '340b', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c340['b']));
			} else {
				echo $this->Form->input('340b', array('id' => '340b', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Materiales aplicados a la superficie.</td>
		<td>
			<?php
			if (isset($c340['c'])) {
				echo $this->Form->input('340c', array('id' => '340c', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c340['c']));
			} else {
				echo $this->Form->input('340c', array('id' => '340c', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Técnica en la que se registra la información.</td>
		<td>
			<?php
			if (isset($c340['d'])) {
				echo $this->Form->input('340d', array('id' => '340d', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c340['d']));
			} else {
				echo $this->Form->input('340d', array('id' => '340d', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Soporte.</td>
		<td>
			<?php
			if (isset($c340['e'])) {
				echo $this->Form->input('340e', array('id' => '340e', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c340['e']));
			} else {
				echo $this->Form->input('340e', array('id' => '340e', 'label' => false, 'div' => false, 'class' => 'form-control'));
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
				echo $this->Form->input('500a', array('id' => '500a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c500['a']));
			} else {
				echo $this->Form->input('500a', array('id' => '500a', 'label' => false, 'div' => false, 'class' => 'form-control'));
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
				echo $this->Form->input('510a', array('id' => '510a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c510['a']));
			} else {
				echo $this->Form->input('510a', array('id' => '510a', 'label' => false, 'div' => false, 'class' => 'form-control'));
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
				echo $this->Form->input('510c', array('id' => '510c', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c510['c']));
			} else {
				echo $this->Form->input('510c', array('id' => '510c', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c511 = marc21_decode($item['Item']['511']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>511</b></th>
		<th style="width: 45%;"><b>Nota de participantes o intérpretes.</b></th>
		<th style="width: 45%;">
			<label id="l-511"><?php echo $item['Item']['511']; ?></label>
			<?php echo $this->Form->hidden('511', array('id' => '511', 'label' => false, 'div' => false, 'value' => $item['Item']['511'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de visualización asociada.</td>
		<td><?php echo $this->Form->input('511i1', array('id' => '511i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Cobertura desconocida',
				'1' => '1 - Cobertura completa',
				'2' => '2 - Cobertura selectiva',
				'3' => '3 - No se indica la localización dentro de la fuente',
				'4' => '4 - Se indica la localización dentro de la fuente'
			), 'selected' => substr($c511['indicators'], 0, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('511i2', array('id' => '511i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			), 'selected' => substr($c511['indicators'], 1, 1)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de participantes o intérpretes.</td>
		<td>
			<?php
			if (isset($c511['a'])) {
				echo $this->Form->input('511a', array('id' => '511a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c511['a']));
			} else {
				echo $this->Form->input('511a', array('id' => '511a', 'label' => false, 'div' => false, 'class' => 'form-control'));
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
				echo $this->Form->input('520a', array('id' => '520a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c520['a']));
			} else {
				echo $this->Form->input('520a', array('id' => '520a', 'label' => false, 'div' => false, 'class' => 'form-control'));
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
		<td>Autor.</td>
		<td>
			<?php
			if (isset($c534['a'])) {
				echo $this->Form->input('534a', array('id' => '534a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c534['a']));
			} else {
				echo $this->Form->input('534a', array('id' => '534a', 'label' => false, 'div' => false, 'class' => 'form-control'));
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
				echo $this->Form->input('534c', array('id' => '534c', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c534['c']));
			} else {
				echo $this->Form->input('534c', array('id' => '534c', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
	<tr>
		<td><b>$l</b></td>
		<td>Localización del original.</td>
		<td>
			<?php
			if (isset($c534['l'])) {
				echo $this->Form->input('534l', array('id' => '534l', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c534['l']));
			} else {
				echo $this->Form->input('534l', array('id' => '534l', 'label' => false, 'div' => false, 'class' => 'form-control'));
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
				echo $this->Form->input('534p', array('id' => '534p', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c534['p']));
			} else {
				echo $this->Form->input('534p', array('id' => '534p', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
	</tr>
</table>

<?php $c535 = marc21_decode($item['Item']['535']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>535</b></th>
		<th style="width: 45%;"><b>Nota de localización de originales/duplicados.</b></th>
		<th style="width: 45%;">
			<label id="l-535"><?php echo $item['Item']['535']; ?></label>
			<?php echo $this->Form->hidden('588', array('id' => '535', 'label' => false, 'div' => false, 'value' => $item['Item']['535'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Depositario.</td>
		<td>
			<?php
			if (isset($c535['a'])) {
				echo $this->Form->input('535a', array('id' => '535a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c535['a']));
			} else {
				echo $this->Form->input('535a', array('id' => '535a', 'label' => false, 'div' => false, 'class' => 'form-control'));
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
				echo $this->Form->input('588a', array('id' => '588a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c588['a']));
			} else {
				echo $this->Form->input('588a', array('id' => '588a', 'label' => false, 'div' => false, 'class' => 'form-control'));
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
		<th style="width: 45%;"><b>Siglo.</b></th>
		<th style="width: 45%;">
			<label id="l-648"><?php echo $item['Item']['648']; ?></label>
			<?php echo $this->Form->hidden('648', array('id' => '648', 'label' => false, 'div' => false, 'value' => $item['Item']['648'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Siglo.</td>
		<td><?php echo $this->Form->input('648a', array('id' => '648a', 'label' => false, 'div' => false, 'class' => 'form-control', 'selected' => $c648['a'], 'options' => array('XVII' => 'XVII', 'XVIII' => 'XVIII', 'XIX' => 'XIX', 'XX' => 'XX', 'XXI' => 'XXI'))); ?></td>
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
		<td>Materia <font color="red">(Obligatorio).</td>
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
	<tr>
		<td><b>$2</b></td>
		<td>Fuente del encabezamiento o término..</td>
		<td>
			<?php
			if (isset($c650['2'])) {
				echo $this->Form->input('6502', array('id' => '6502', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c650['2']));
			} else {
				echo $this->Form->input('6502', array('id' => '6502', 'label' => false, 'div' => false, 'class' => 'form-control'));
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
		<td>Palabra clave <font color="red">(Obligatorio)</font>.</td>
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
<?php $c655 = marc21_decode($item['Item']['655']); ?>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>655</b></th>
		<th style="width: 45%;"><b>Género/forma.</b></th>
		<th style="width: 45%;">
			<label id="l-655"><?php echo $item['Item']['655']; ?></label>
			<?php echo $this->Form->hidden('655', array('id' => '655', 'label' => false, 'div' => false, 'value' => $item['Item']['655'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Datos o término principal de género/forma.</td>
		<td>
			<?php
			if (isset($c655['a'])) {
				echo $this->Form->input('655a', array('id' => '655a', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c655['a']));
			} else {
				echo $this->Form->input('655a', array('id' => '655a', 'label' => false, 'div' => false, 'class' => 'form-control'));
			}
			?>
		</td>
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
		<th style="width: 45%;"><b>Punto de acceso adicional - Nombre corporativo.</b></th>
		<th style="width: 45%;">
			<label id="l-710"><?php echo $item['Item']['710']; ?></label>
			<?php echo $this->Form->hidden('710', array('id' => '710', 'label' => false, 'div' => false, 'value' => $item['Item']['710'])); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de elemento inicial del nombre de persona.</td>
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
		<td>Nombre de persona.</td>
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
		<td>Numeración.</td>
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
		<td><b>$e</b></td>
		<td>Forma desarrollada del nombre.</td>
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
		<td><b>$4</b></td>
		<td>Código de función.</td>
		<td>
			<?php
			if (isset($c710['4'])) {
				echo $this->Form->input('7104', array('id' => '7104', 'label' => false, 'div' => false, 'class' => 'form-control', 'value' => $c710['4']));
			} else {
				echo $this->Form->input('7104', array('id' => '7104', 'label' => false, 'div' => false, 'class' => 'form-control'));
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
			<th style="width: 50%;">Archivo o Documento (preferiblemente pdf o doc). (Obligatorio).</th>
		</tr>
		<tr>
			<td>
				<div style="float: left; width: 20%;">
				<?php
				if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/webroot/covers/" . $item['Item']['cover_path']))){
					echo $this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('width' => '70px'));
				} else {
					echo $this->Html->image("/webroot/img/sin_portada.jpg", array('width' => '70px'));
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
				<?php echo $this->Form->input('item', array('label' => false, 'type' => 'file', 'style' => 'width: 100%')); ?>
			</td>
		</tr>
	</table>
	
	<input type="checkbox" id="IconographiePublished" value="1" checked="checked" name="data[Iconographie][published]" style="width: 30px;">Publicado
	
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

<div style="clear: both;"><br /><br /></div>

<script type="text/javascript">
$(document).ready(function() {

	//-------------- Pestañas ---------------

	$(".tab").click(function(event) {
		var id = $(this).attr('id');

		if  (id.localeCompare("t9xx")) {
			$(".tabs").hide();
			$('.active').removeClass('active');
			$(this).parent().addClass('active');
		}

		if (id == "t0xx"){ $('#0xx').show(); }
		if (id == "t1xx"){ $('#1xx').show(); }
		if (id == "t2xx"){ $('#2xx').show(); }
		if (id == "t3xx"){ $('#3xx').show(); }
		if (id == "t4xx"){ $('#4xx').show(); }
		if (id == "t5xx"){ $('#5xx').show(); }
		if (id == "t6xx"){ $('#6xx').show(); }
		if (id == "t7xx"){ $('#7xx').show(); }
		if (id == "t8xx"){ $('#8xx').show(); }
		//if (id == "t9xx"){ $('#9xx').show(); }

		return false;
	});
	
	//-------------- Validaciones ---------------
	
	/*
	$("#tipo").change(function(event) {
		var valor = $(this).val();

		$("#BookH-005 option[value=n]").attr("selected", true);
		$("#BookH-017 option[value=7]").attr("selected", true);
		$("#BookH-018 option[value=a]").attr("selected", true);
		
		switch (valor){
			case '1': 	$("#BookH-006 option[value=a]").attr("selected", true);
						$("#BookH-007 option[value=m]").attr("selected", true);
						break;
						
			case '2': 	$("#BookH-006 option[value=a]").attr("selected", true);
						$("#BookH-007 option[value=s]").attr("selected", true);
						break;
						
			case '3': 	$("#BookH-006 option[value=a]").attr("selected", true);
						$("#BookH-007 option[value=a]").attr("selected", true);
						break;
						
			case '4': 	$("#BookH-006 option[value=a]").attr("selected", true);
						$("#BookH-007 option[value=b]").attr("selected", true);
						break;
						
			case '5': 	$("#BookH-006 option[value=c]").attr("selected", true);
						$("#BookH-007 option[value=m]").attr("selected", true);
						break;
						
			case '6': 	$("#BookH-006 option[value=d]").attr("selected", true);
						$("#BookH-007 option[value=m]").attr("selected", true);
						break;
						
			case '7': 	$("#BookH-006 option[value=c]").attr("selected", true);
						$("#BookH-007 option[value=a]").attr("selected", true);
						break;
						
			case '8': 	$("#BookH-006 option[value=d]").attr("selected", true);
						$("#BookH-007 option[value=a]").attr("selected", true);
						break;
						
			case '9': 	$("#BookH-006 option[value=c]").attr("selected", true);
						$("#BookH-007 option[value=b]").attr("selected", true);
						break;
			
			case '10': 	$("#BookH-006 option[value=c]").attr("selected", true);
						$("#BookH-007 option[value=c]").attr("selected", true);
						break;
			
			case '11': 	$("#BookH-006 option[value=d]").attr("selected", true);
						$("#BookH-007 option[value=c]").attr("selected", true);
						break;
						
			case '12': 	$("#BookH-006 option[value=k]").attr("selected", true);
						$("#BookH-007 option[value=m]").attr("selected", true);
						break;
						
			case '13': 	$("#BookH-006 option[value=k]").attr("selected", true);
						$("#BookH-007 option[value=a]").attr("selected", true);
						break;
						
			case '14': 	$("#BookH-006 option[value=k]").attr("selected", true);
						$("#BookH-007 option[value=b]").attr("selected", true);
						break;
		}
	});*/
		
	$("#008-07-10").change(function(event) {
		if($("#008-07-10 option:selected").val() != 'pf'){
			$("#fecha008-07-10").prop('disabled', true);
			$("#fecha008-07-10").val('aammdd');
		} else {
			$("#fecha008-07-10").prop('disabled', false);
		}
	});
	
	$("#008-11-14").change(function(event) {
		if($("#008-11-14 option:selected").val() != 'sf'){
			$("#fecha008-11-14").prop('disabled', true);
			$("#fecha008-11-14").val('aammdd');
		} else {
			$("#fecha008-11-14").prop('disabled', false);
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

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		if ($('#008-38').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-38').val();
		}
		if ($('#008-39').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-39').val();
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

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		if ($('#008-38').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-38').val();
		}
		if ($('#008-39').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-39').val();
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

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		if ($('#008-38').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-38').val();
		}
		if ($('#008-39').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-39').val();
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

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		if ($('#008-38').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-38').val();
		}
		if ($('#008-39').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-39').val();
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

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		if ($('#008-38').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-38').val();
		}
		if ($('#008-39').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-39').val();
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

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		if ($('#008-38').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-38').val();
		}
		if ($('#008-39').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-39').val();
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
	
		$("#008-38").change(function(event) {
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

		
		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		if ($('#008-38').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-38').val();
		}
		if ($('#008-39').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-39').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-39").change(function(event) {
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

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		if ($('#008-38').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-38').val();
		}
		if ($('#008-39').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-39').val();
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

	$("#100i1").change(function(event) {
		var tmp_100 = "";

		if ($('#100a').val().length > 0) {
			tmp_100 = tmp_100 + '^a' + $('#100a').val();
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

	$("#100i2").change(function(event) {
		var tmp_100 = "";

		if ($('#100a').val().length > 0) {
			tmp_100 = tmp_100 + '^a' + $('#100a').val();
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

	$("#100a").bind('keyup change', function(event) {
		var tmp_100 = "";

		if ($('#100a').val().length > 0) {
			tmp_100 = tmp_100 + '^a' + $('#100a').val();
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
	
	$("#100d").bind('keyup change', function(event) {
		var tmp_100 = "";

		if ($('#100a').val().length > 0) {
			tmp_100 = tmp_100 + '^a' + $('#100a').val();
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
	
	$("#245i1").change(function(event) {
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

		if ($('#245h').val().length > 0) {
			tmp_245 = tmp_245 + '^h' + $('#245h').val();
		}
		
		if (tmp_245.length > 0) {
			$("#245").val($("#245i1").val() + $("#245i2").val() + tmp_245);
			$("#l-245").html($("#245i1").val() + $("#245i2").val() + tmp_245);
		} else {
			$("#245").val('');
			$("#l-245").html('&nbsp;');
		}
	});

	$("#245i2").change(function(event) {
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

		if ($('#245h').val().length > 0) {
			tmp_245 = tmp_245 + '^h' + $('#245h').val();
		}
		
		if (tmp_245.length > 0) {
			$("#245").val($("#245i1").val() + $("#245i2").val() + tmp_245);
			$("#l-245").html($("#245i1").val() + $("#245i2").val() + tmp_245);
		} else {
			$("#245").val('');
			$("#l-245").html('&nbsp;');
		}
	});
	
	$("#245a").bind('keyup change', function(event) {
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

		if ($('#245h').val().length > 0) {
			tmp_245 = tmp_245 + '^h' + $('#245h').val();
		}
		
		if (tmp_245.length > 0) {
			$("#245").val($("#245i1").val() + $("#245i2").val() + tmp_245);
			$("#l-245").html($("#245i1").val() + $("#245i2").val() + tmp_245);
		} else {
			$("#245").val('');
			$("#l-245").html('&nbsp;');
		}
	});

	$("#245b").bind('keyup change', function(event) {
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

		if ($('#245h').val().length > 0) {
			tmp_245 = tmp_245 + '^h' + $('#245h').val();
		}
		
		if (tmp_245.length > 0) {
			$("#245").val($("#245i1").val() + $("#245i2").val() + tmp_245);
			$("#l-245").html($("#245i1").val() + $("#245i2").val() + tmp_245);
		} else {
			$("#245").val('');
			$("#l-245").html('&nbsp;');
		}
	});

	$("#245c").bind('keyup change', function(event) {
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

		if ($('#245h').val().length > 0) {
			tmp_245 = tmp_245 + '^h' + $('#245h').val();
		}
		
		if (tmp_245.length > 0) {
			$("#245").val($("#245i1").val() + $("#245i2").val() + tmp_245);
			$("#l-245").html($("#245i1").val() + $("#245i2").val() + tmp_245);
		} else {
			$("#245").val('');
			$("#l-245").html('&nbsp;');
		}
	});

	$("#245h").bind('keyup change', function(event) {
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

		if ($('#245h').val().length > 0) {
			tmp_245 = tmp_245 + '^h' + $('#245h').val();
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
			
			if (y == 17) {$("#648a option[value=XVII]").attr("selected", true); w = "XVII";}
			if (y == 18) {$("#648a option[value=XVIII]").attr("selected", true); w = "XVIII";}
			if (y == 19) {$("#648a option[value=XIX]").attr("selected", true); w = "XIX";}
			if (y == 20) {$("#648a option[value=XX]").attr("selected", true); w = "XX";}
			if (y == 21) {$("#648a option[value=XXI]").attr("selected", true); w = "XXI";}
			var tmp_648 = '^a' + w;
			
			if (tmp_648.length > 0) {
				$("#648").val('##' + tmp_648);
				$("#l-648").html('##' + tmp_648);
			} else {
				$("#648").val('');
				$("#l-648").html('&nbsp;');
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
	
		$("#336a").bind('keyup change', function(event) {
		var tmp_336 = "";

		if ($('#336a').val().length > 0) {
			tmp_336 = tmp_336 + '^a' + $('#336a').val();
		}

		if ($('#336b').val().length > 0) {
			tmp_336 = tmp_336 + '^b' + $('#336b').val();
		}
		
		if (tmp_336.length > 0) {
			$("#336").val('##' + tmp_336);
			$("#l-336").html('##' + tmp_336);
		} else {
			$("#336").val('');
			$("#l-336").html('&nbsp;');
		}
	});

	$("#336b").bind('keyup change', function(event) {
		var tmp_336 = "";

		if ($('#336a').val().length > 0) {
			tmp_336 = tmp_336 + '^a' + $('#336a').val();
		}

		if ($('#336b').val().length > 0) {
			tmp_336 = tmp_336 + '^b' + $('#336b').val();
		}
		
		if (tmp_336.length > 0) {
			$("#336").val('##' + tmp_336);
			$("#l-336").html('##' + tmp_336);
		} else {
			$("#336").val('');
			$("#l-336").html('&nbsp;');
		}
	});

	$("#337a").bind('keyup change', function(event) {
		var tmp_337 = "";

		if ($('#337a').val().length > 0) {
			tmp_337 = tmp_337 + '^a' + $('#337a').val();
		}
		if ($('#337b').val().length > 0) {
			tmp_337 = tmp_337 + '^b' + $('#337b').val();
		}
		
		if (tmp_337.length > 0) {
			$("#337").val('##' + tmp_337);
			$("#l-337").html('##' + tmp_337);
		} else {
			$("#337").val('');
			$("#l-337").html('&nbsp;');
		}
	});
	$("#337b").bind('keyup change', function(event) {
		var tmp_337 = "";

		if ($('#337a').val().length > 0) {
			tmp_337 = tmp_337 + '^a' + $('#337a').val();
		}
		if ($('#337b').val().length > 0) {
			tmp_337 = tmp_337 + '^b' + $('#337b').val();
		}
		
		if (tmp_337.length > 0) {
			$("#337").val('##' + tmp_337);
			$("#l-337").html('##' + tmp_337);
		} else {
			$("#337").val('');
			$("#l-337").html('&nbsp;');
		}
	});
	
	$("#340a").bind('keyup change', function(event) {
		var tmp_340 = "";

		if ($('#340a').val().length > 0) {
			tmp_340 = tmp_340 + '^a' + $('#340a').val();
		}
		if ($('#340b').val().length > 0) {
			tmp_340 = tmp_340 + '^b' + $('#340b').val();
		}
		if ($('#340c').val().length > 0) {
			tmp_340 = tmp_340 + '^c' + $('#340c').val();
		}
		if ($('#340d').val().length > 0) {
			tmp_340 = tmp_340 + '^d' + $('#340d').val();
		}
		if ($('#340e').val().length > 0) {
			tmp_340 = tmp_340 + '^e' + $('#340e').val();
		}
		if (tmp_340.length > 0) {
			$("#340").val('##' + tmp_340);
			$("#l-340").html('##' + tmp_340);
		} else {
			$("#340").val('');
			$("#l-340").html('&nbsp;');
		}
	});
	$("#340b").bind('keyup change', function(event) {
		var tmp_340 = "";

		if ($('#340a').val().length > 0) {
			tmp_340 = tmp_340 + '^a' + $('#340a').val();
		}
		if ($('#340b').val().length > 0) {
			tmp_340 = tmp_340 + '^b' + $('#340b').val();
		}
		if ($('#340c').val().length > 0) {
			tmp_340 = tmp_340 + '^c' + $('#340c').val();
		}
		if ($('#340d').val().length > 0) {
			tmp_340 = tmp_340 + '^d' + $('#340d').val();
		}
		if ($('#340e').val().length > 0) {
			tmp_340 = tmp_340 + '^e' + $('#340e').val();
		}
		if (tmp_340.length > 0) {
			$("#340").val('##' + tmp_340);
			$("#l-340").html('##' + tmp_340);
		} else {
			$("#340").val('');
			$("#l-340").html('&nbsp;');
		}
	});
	$("#340c").bind('keyup change', function(event) {
		var tmp_340 = "";

		if ($('#340a').val().length > 0) {
			tmp_340 = tmp_340 + '^a' + $('#340a').val();
		}
		if ($('#340b').val().length > 0) {
			tmp_340 = tmp_340 + '^b' + $('#340b').val();
		}
		if ($('#340c').val().length > 0) {
			tmp_340 = tmp_340 + '^c' + $('#340c').val();
		}
		if ($('#340d').val().length > 0) {
			tmp_340 = tmp_340 + '^d' + $('#340d').val();
		}
		if ($('#340e').val().length > 0) {
			tmp_340 = tmp_340 + '^e' + $('#340e').val();
		}
		if (tmp_340.length > 0) {
			$("#340").val('##' + tmp_340);
			$("#l-340").html('##' + tmp_340);
		} else {
			$("#340").val('');
			$("#l-340").html('&nbsp;');
		}
	});
	$("#340d").bind('keyup change', function(event) {
		var tmp_340 = "";

		if ($('#340a').val().length > 0) {
			tmp_340 = tmp_340 + '^a' + $('#340a').val();
		}
		if ($('#340b').val().length > 0) {
			tmp_340 = tmp_340 + '^b' + $('#340b').val();
		}
		if ($('#340c').val().length > 0) {
			tmp_340 = tmp_340 + '^c' + $('#340c').val();
		}
		if ($('#340d').val().length > 0) {
			tmp_340 = tmp_340 + '^d' + $('#340d').val();
		}
		if ($('#340e').val().length > 0) {
			tmp_340 = tmp_340 + '^e' + $('#340e').val();
		}
		if (tmp_340.length > 0) {
			$("#340").val('##' + tmp_340);
			$("#l-340").html('##' + tmp_340);
		} else {
			$("#340").val('');
			$("#l-340").html('&nbsp;');
		}
	});
	$("#340e").bind('keyup change', function(event) {
		var tmp_340 = "";

		if ($('#340a').val().length > 0) {
			tmp_340 = tmp_340 + '^a' + $('#340a').val();
		}
		if ($('#340b').val().length > 0) {
			tmp_340 = tmp_340 + '^b' + $('#340b').val();
		}
		if ($('#340c').val().length > 0) {
			tmp_340 = tmp_340 + '^c' + $('#340c').val();
		}
		if ($('#340d').val().length > 0) {
			tmp_340 = tmp_340 + '^d' + $('#340d').val();
		}
		if ($('#340e').val().length > 0) {
			tmp_340 = tmp_340 + '^e' + $('#340e').val();
		}
		if (tmp_340.length > 0) {
			$("#340").val('##' + tmp_340);
			$("#l-340").html('##' + tmp_340);
		} else {
			$("#340").val('');
			$("#l-340").html('&nbsp;');
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
		$("#511i1").bind('keyup change', function(event) {
		var tmp_511 = "";

		if ($('#511a').val().length > 0) {
			tmp_511 = tmp_511 + '^a' + $('#511a').val();
		}
		
		if (tmp_511.length > 0) {
			$("#511").val($("#511i1").val() + $("#511i2").val() + tmp_511);
			$("#l-511").html($("#511i1").val() + $("#511i2").val() + tmp_511);
		} else {
			$("#511").val('');
			$("#l-511").html('&nbsp;');
		}
	});
		$("#511i2").bind('keyup change', function(event) {
		var tmp_511 = "";

		if ($('#511a').val().length > 0) {
			tmp_511 = tmp_511 + '^a' + $('#511a').val();
		}
		
		if (tmp_511.length > 0) {
			$("#511").val($("#511i1").val() + $("#511i2").val() + tmp_511);
			$("#l-511").html($("#511i1").val() + $("#511i2").val() + tmp_511);
		} else {
			$("#511").val('');
			$("#l-511").html('&nbsp;');
		}
	});
		$("#511a").bind('keyup change', function(event) {
		var tmp_511 = "";

		if ($('#511a').val().length > 0) {
			tmp_511 = tmp_511 + '^a' + $('#511a').val();
		}
		
		if (tmp_511.length > 0) {
			$("#511").val($("#511i1").val() + $("#511i2").val() + tmp_511);
			$("#l-511").html($("#511i1").val() + $("#511i2").val() + tmp_511);
		} else {
			$("#511").val('');
			$("#l-511").html('&nbsp;');
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

	$("#534a").bind('keyup change', function(event) {
		var tmp_534 = "";

		if ($('#534a').val().length > 0) {
			tmp_534 = tmp_534 + '^a' + $('#534a').val();
		}

		if ($('#534c').val().length > 0) {
			tmp_534 = tmp_534 + '^c' + $('#534c').val();
		}

		if ($('#534l').val().length > 0) {
			tmp_534 = tmp_534 + '^l' + $('#534l').val();
		}

		if ($('#534p').val().length > 0) {
			tmp_534 = tmp_534 + '^p' + $('#534p').val();
		}
		
		if (tmp_534.length > 0) {
			$("#534").val('##' + tmp_534);
			$("#l-534").html('##' + tmp_534);
		} else {
			$("#534").val('');
			$("#l-534").html('&nbsp;');
		}
	});

	$("#534c").bind('keyup change', function(event) {
		var tmp_534 = "";

		if ($('#534a').val().length > 0) {
			tmp_534 = tmp_534 + '^a' + $('#534a').val();
		}

		if ($('#534c').val().length > 0) {
			tmp_534 = tmp_534 + '^c' + $('#534c').val();
		}

		if ($('#534l').val().length > 0) {
			tmp_534 = tmp_534 + '^l' + $('#534l').val();
		}

		if ($('#534p').val().length > 0) {
			tmp_534 = tmp_534 + '^p' + $('#534p').val();
		}
		
		if (tmp_534.length > 0) {
			$("#534").val('##' + tmp_534);
			$("#l-534").html('##' + tmp_534);
		} else {
			$("#534").val('');
			$("#l-534").html('&nbsp;');
		}
	});

	$("#534l").bind('keyup change', function(event) {
		var tmp_534 = "";

		if ($('#534a').val().length > 0) {
			tmp_534 = tmp_534 + '^a' + $('#534a').val();
		}

		if ($('#534c').val().length > 0) {
			tmp_534 = tmp_534 + '^c' + $('#534c').val();
		}

		if ($('#534l').val().length > 0) {
			tmp_534 = tmp_534 + '^l' + $('#534l').val();
		}

		if ($('#534p').val().length > 0) {
			tmp_534 = tmp_534 + '^p' + $('#534p').val();
		}
		
		if (tmp_534.length > 0) {
			$("#534").val('##' + tmp_534);
			$("#l-534").html('##' + tmp_534);
		} else {
			$("#534").val('');
			$("#l-534").html('&nbsp;');
		}
	});

	$("#534p").bind('keyup change', function(event) {
		var tmp_534 = "";

		if ($('#534a').val().length > 0) {
			tmp_534 = tmp_534 + '^a' + $('#534a').val();
		}

		if ($('#534c').val().length > 0) {
			tmp_534 = tmp_534 + '^c' + $('#534c').val();
		}

		if ($('#534l').val().length > 0) {
			tmp_534 = tmp_534 + '^l' + $('#534l').val();
		}

		if ($('#534p').val().length > 0) {
			tmp_534 = tmp_534 + '^p' + $('#534p').val();
		}
		
		if (tmp_534.length > 0) {
			$("#534").val('##' + tmp_534);
			$("#l-534").html('##' + tmp_534);
		} else {
			$("#534").val('');
			$("#l-534").html('&nbsp;');
		}
	});

	$("#535a").bind('keyup change', function(event) {
		var tmp_535 = "";

		if ($('#535a').val().length > 0) {
			tmp_535 = tmp_535 + '^a' + $('#535a').val();
		}
		
		if (tmp_535.length > 0) {
			$("#535").val('##' + tmp_535);
			$("#l-535").html('##' + tmp_535);
		} else {
			$("#535").val('');
			$("#l-535").html('&nbsp;');
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

	$("#600i1").change(function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
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

	$("#600i2").change(function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
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
	
	$("#600a").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
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

	$("#600d").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
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

	$("#600c").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
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

	$("#600e").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
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

	$("#600v").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
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

	$("#600x").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
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

	$("#600y").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
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

	$("#600z").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
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
	
	$("#6501i1").change(function(event) {
		var tmp_6501 = "";

		if ($('#6501a').val().length > 0) {
			tmp_6501 = tmp_6501 + '^a' + $('#6501a').val();
		}

		if ($('#6501v').val().length > 0) {
			tmp_6501 = tmp_6501 + '^v' + $('#6501v').val();
		}

		if ($('#6501x').val().length > 0) {
			tmp_6501 = tmp_6501 + '^x' + $('#6501x').val();
		}

		if ($('#6501y').val().length > 0) {
			tmp_6501 = tmp_6501 + '^y' + $('#6501y').val();
		}

		if ($('#6501z').val().length > 0) {
			tmp_6501 = tmp_6501 + '^z' + $('#6501z').val();
		}
		
		if (tmp_6501.length > 0) {
			$("#6501").val($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
			$("#l-6501").html($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
		} else {
			$("#6501").val('');
			$("#l-6501").html('&nbsp;');
		}
	});

	$("#6501i2").change(function(event) {
		var tmp_6501 = "";

		if ($('#6501a').val().length > 0) {
			tmp_6501 = tmp_6501 + '^a' + $('#6501a').val();
		}

		if ($('#6501v').val().length > 0) {
			tmp_6501 = tmp_6501 + '^v' + $('#6501v').val();
		}

		if ($('#6501x').val().length > 0) {
			tmp_6501 = tmp_6501 + '^x' + $('#6501x').val();
		}

		if ($('#6501y').val().length > 0) {
			tmp_6501 = tmp_6501 + '^y' + $('#6501y').val();
		}

		if ($('#6501z').val().length > 0) {
			tmp_6501 = tmp_6501 + '^z' + $('#6501z').val();
		}
		
		if (tmp_6501.length > 0) {
			$("#6501").val($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
			$("#l-6501").html($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
		} else {
			$("#6501").val('');
			$("#l-6501").html('&nbsp;');
		}
	});

	$("#6501a").bind('keyup change', function(event) {
		var tmp_6501 = "";

		if ($('#6501a').val().length > 0) {
			tmp_6501 = tmp_6501 + '^a' + $('#6501a').val();
		}

		if ($('#6501v').val().length > 0) {
			tmp_6501 = tmp_6501 + '^v' + $('#6501v').val();
		}

		if ($('#6501x').val().length > 0) {
			tmp_6501 = tmp_6501 + '^x' + $('#6501x').val();
		}

		if ($('#6501y').val().length > 0) {
			tmp_6501 = tmp_6501 + '^y' + $('#6501y').val();
		}

		if ($('#6501z').val().length > 0) {
			tmp_6501 = tmp_6501 + '^z' + $('#6501z').val();
		}
		
		if (tmp_6501.length > 0) {
			$("#6501").val($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
			$("#l-6501").html($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
		} else {
			$("#6501").val('');
			$("#l-6501").html('&nbsp;');
		}
	});
	
	$("#6501a").bind('keyup change', function(event) {
		var tmp_6501 = "";

		if ($('#6501a').val().length > 0) {
			tmp_6501 = tmp_6501 + '^a' + $('#6501a').val();
		}

		if ($('#6501v').val().length > 0) {
			tmp_6501 = tmp_6501 + '^v' + $('#6501v').val();
		}

		if ($('#6501x').val().length > 0) {
			tmp_6501 = tmp_6501 + '^x' + $('#6501x').val();
		}

		if ($('#6501y').val().length > 0) {
			tmp_6501 = tmp_6501 + '^y' + $('#6501y').val();
		}

		if ($('#6501z').val().length > 0) {
			tmp_6501 = tmp_6501 + '^z' + $('#6501z').val();
		}
		
		if (tmp_6501.length > 0) {
			$("#6501").val($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
			$("#l-6501").html($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
		} else {
			$("#6501").val('');
			$("#l-6501").html('&nbsp;');
		}
	});

	$("#6501v").bind('keyup change', function(event) {
		var tmp_6501 = "";

		if ($('#6501a').val().length > 0) {
			tmp_6501 = tmp_6501 + '^a' + $('#6501a').val();
		}

		if ($('#6501v').val().length > 0) {
			tmp_6501 = tmp_6501 + '^v' + $('#6501v').val();
		}

		if ($('#6501x').val().length > 0) {
			tmp_6501 = tmp_6501 + '^x' + $('#6501x').val();
		}

		if ($('#6501y').val().length > 0) {
			tmp_6501 = tmp_6501 + '^y' + $('#6501y').val();
		}

		if ($('#6501z').val().length > 0) {
			tmp_6501 = tmp_6501 + '^z' + $('#6501z').val();
		}
		
		if (tmp_6501.length > 0) {
			$("#6501").val($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
			$("#l-6501").html($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
		} else {
			$("#6501").val('');
			$("#l-6501").html('&nbsp;');
		}
	});

	$("#6501x").bind('keyup change', function(event) {
		var tmp_6501 = "";

		if ($('#6501a').val().length > 0) {
			tmp_6501 = tmp_6501 + '^a' + $('#6501a').val();
		}

		if ($('#6501v').val().length > 0) {
			tmp_6501 = tmp_6501 + '^v' + $('#6501v').val();
		}

		if ($('#6501x').val().length > 0) {
			tmp_6501 = tmp_6501 + '^x' + $('#6501x').val();
		}

		if ($('#6501y').val().length > 0) {
			tmp_6501 = tmp_6501 + '^y' + $('#6501y').val();
		}

		if ($('#6501z').val().length > 0) {
			tmp_6501 = tmp_6501 + '^z' + $('#6501z').val();
		}
		
		if (tmp_6501.length > 0) {
			$("#6501").val($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
			$("#l-6501").html($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
		} else {
			$("#6501").val('');
			$("#l-6501").html('&nbsp;');
		}
	});

	$("#6501y").bind('keyup change', function(event) {
		var tmp_6501 = "";

		if ($('#6501a').val().length > 0) {
			tmp_6501 = tmp_6501 + '^a' + $('#6501a').val();
		}

		if ($('#6501v').val().length > 0) {
			tmp_6501 = tmp_6501 + '^v' + $('#6501v').val();
		}

		if ($('#6501x').val().length > 0) {
			tmp_6501 = tmp_6501 + '^x' + $('#6501x').val();
		}

		if ($('#6501y').val().length > 0) {
			tmp_6501 = tmp_6501 + '^y' + $('#6501y').val();
		}

		if ($('#6501z').val().length > 0) {
			tmp_6501 = tmp_6501 + '^z' + $('#6501z').val();
		}
		
		if (tmp_6501.length > 0) {
			$("#6501").val($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
			$("#l-6501").html($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
		} else {
			$("#6501").val('');
			$("#l-6501").html('&nbsp;');
		}
	});

	$("#6501z").bind('keyup change', function(event) {
		var tmp_6501 = "";

		if ($('#6501a').val().length > 0) {
			tmp_6501 = tmp_6501 + '^a' + $('#6501a').val();
		}

		if ($('#6501v').val().length > 0) {
			tmp_6501 = tmp_6501 + '^v' + $('#6501v').val();
		}

		if ($('#6501x').val().length > 0) {
			tmp_6501 = tmp_6501 + '^x' + $('#6501x').val();
		}

		if ($('#6501y').val().length > 0) {
			tmp_6501 = tmp_6501 + '^y' + $('#6501y').val();
		}

		if ($('#6501z').val().length > 0) {
			tmp_6501 = tmp_6501 + '^z' + $('#6501z').val();
		}
		
		if (tmp_6501.length > 0) {
			$("#6501").val($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
			$("#l-6501").html($("#6501i1").val() + $("#6501i2").val() + tmp_6501);
		} else {
			$("#6501").val('');
			$("#l-6501").html('&nbsp;');
		}
	});
	
$("#6502i1").change(function(event) {
		var tmp_6502 = "";

		if ($('#6502a').val().length > 0) {
			tmp_6502 = tmp_6502 + '^a' + $('#6502a').val();
		}

		if ($('#6502v').val().length > 0) {
			tmp_6502 = tmp_6502 + '^v' + $('#6502v').val();
		}

		if ($('#6502x').val().length > 0) {
			tmp_6502 = tmp_6502 + '^x' + $('#6502x').val();
		}

		if ($('#6502y').val().length > 0) {
			tmp_6502 = tmp_6502 + '^y' + $('#6502y').val();
		}

		if ($('#6502z').val().length > 0) {
			tmp_6502 = tmp_6502 + '^z' + $('#6502z').val();
		}
		
		if (tmp_6502.length > 0) {
			$("#6502").val($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
			$("#l-6502").html($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
		} else {
			$("#6502").val('');
			$("#l-6502").html('&nbsp;');
		}
	});

	$("#6502i2").change(function(event) {
		var tmp_6502 = "";

		if ($('#6502a').val().length > 0) {
			tmp_6502 = tmp_6502 + '^a' + $('#6502a').val();
		}

		if ($('#6502v').val().length > 0) {
			tmp_6502 = tmp_6502 + '^v' + $('#6502v').val();
		}

		if ($('#6502x').val().length > 0) {
			tmp_6502 = tmp_6502 + '^x' + $('#6502x').val();
		}

		if ($('#6502y').val().length > 0) {
			tmp_6502 = tmp_6502 + '^y' + $('#6502y').val();
		}

		if ($('#6502z').val().length > 0) {
			tmp_6502 = tmp_6502 + '^z' + $('#6502z').val();
		}
		
		if (tmp_6502.length > 0) {
			$("#6502").val($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
			$("#l-6502").html($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
		} else {
			$("#6502").val('');
			$("#l-6502").html('&nbsp;');
		}
	});

	$("#6502a").bind('keyup change', function(event) {
		var tmp_6502 = "";

		if ($('#6502a').val().length > 0) {
			tmp_6502 = tmp_6502 + '^a' + $('#6502a').val();
		}

		if ($('#6502v').val().length > 0) {
			tmp_6502 = tmp_6502 + '^v' + $('#6502v').val();
		}

		if ($('#6502x').val().length > 0) {
			tmp_6502 = tmp_6502 + '^x' + $('#6502x').val();
		}

		if ($('#6502y').val().length > 0) {
			tmp_6502 = tmp_6502 + '^y' + $('#6502y').val();
		}

		if ($('#6502z').val().length > 0) {
			tmp_6502 = tmp_6502 + '^z' + $('#6502z').val();
		}
		
		if (tmp_6502.length > 0) {
			$("#6502").val($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
			$("#l-6502").html($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
		} else {
			$("#6502").val('');
			$("#l-6502").html('&nbsp;');
		}
	});
	
	$("#6502a").bind('keyup change', function(event) {
		var tmp_6502 = "";

		if ($('#6502a').val().length > 0) {
			tmp_6502 = tmp_6502 + '^a' + $('#6502a').val();
		}

		if ($('#6502v').val().length > 0) {
			tmp_6502 = tmp_6502 + '^v' + $('#6502v').val();
		}

		if ($('#6502x').val().length > 0) {
			tmp_6502 = tmp_6502 + '^x' + $('#6502x').val();
		}

		if ($('#6502y').val().length > 0) {
			tmp_6502 = tmp_6502 + '^y' + $('#6502y').val();
		}

		if ($('#6502z').val().length > 0) {
			tmp_6502 = tmp_6502 + '^z' + $('#6502z').val();
		}
		
		if (tmp_6502.length > 0) {
			$("#6502").val($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
			$("#l-6502").html($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
		} else {
			$("#6502").val('');
			$("#l-6502").html('&nbsp;');
		}
	});

	$("#6502v").bind('keyup change', function(event) {
		var tmp_6502 = "";

		if ($('#6502a').val().length > 0) {
			tmp_6502 = tmp_6502 + '^a' + $('#6502a').val();
		}

		if ($('#6502v').val().length > 0) {
			tmp_6502 = tmp_6502 + '^v' + $('#6502v').val();
		}

		if ($('#6502x').val().length > 0) {
			tmp_6502 = tmp_6502 + '^x' + $('#6502x').val();
		}

		if ($('#6502y').val().length > 0) {
			tmp_6502 = tmp_6502 + '^y' + $('#6502y').val();
		}

		if ($('#6502z').val().length > 0) {
			tmp_6502 = tmp_6502 + '^z' + $('#6502z').val();
		}
		
		if (tmp_6502.length > 0) {
			$("#6502").val($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
			$("#l-6502").html($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
		} else {
			$("#6502").val('');
			$("#l-6502").html('&nbsp;');
		}
	});

	$("#6502x").bind('keyup change', function(event) {
		var tmp_6502 = "";

		if ($('#6502a').val().length > 0) {
			tmp_6502 = tmp_6502 + '^a' + $('#6502a').val();
		}

		if ($('#6502v').val().length > 0) {
			tmp_6502 = tmp_6502 + '^v' + $('#6502v').val();
		}

		if ($('#6502x').val().length > 0) {
			tmp_6502 = tmp_6502 + '^x' + $('#6502x').val();
		}

		if ($('#6502y').val().length > 0) {
			tmp_6502 = tmp_6502 + '^y' + $('#6502y').val();
		}

		if ($('#6502z').val().length > 0) {
			tmp_6502 = tmp_6502 + '^z' + $('#6502z').val();
		}
		
		if (tmp_6502.length > 0) {
			$("#6502").val($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
			$("#l-6502").html($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
		} else {
			$("#6502").val('');
			$("#l-6502").html('&nbsp;');
		}
	});

	$("#6502y").bind('keyup change', function(event) {
		var tmp_6502 = "";

		if ($('#6502a').val().length > 0) {
			tmp_6502 = tmp_6502 + '^a' + $('#6502a').val();
		}

		if ($('#6502v').val().length > 0) {
			tmp_6502 = tmp_6502 + '^v' + $('#6502v').val();
		}

		if ($('#6502x').val().length > 0) {
			tmp_6502 = tmp_6502 + '^x' + $('#6502x').val();
		}

		if ($('#6502y').val().length > 0) {
			tmp_6502 = tmp_6502 + '^y' + $('#6502y').val();
		}

		if ($('#6502z').val().length > 0) {
			tmp_6502 = tmp_6502 + '^z' + $('#6502z').val();
		}
		
		if (tmp_6502.length > 0) {
			$("#6502").val($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
			$("#l-6502").html($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
		} else {
			$("#6502").val('');
			$("#l-6502").html('&nbsp;');
		}
	});

	$("#6502z").bind('keyup change', function(event) {
		var tmp_6502 = "";

		if ($('#6502a').val().length > 0) {
			tmp_6502 = tmp_6502 + '^a' + $('#6502a').val();
		}

		if ($('#6502v').val().length > 0) {
			tmp_6502 = tmp_6502 + '^v' + $('#6502v').val();
		}

		if ($('#6502x').val().length > 0) {
			tmp_6502 = tmp_6502 + '^x' + $('#6502x').val();
		}

		if ($('#6502y').val().length > 0) {
			tmp_6502 = tmp_6502 + '^y' + $('#6502y').val();
		}

		if ($('#6502z').val().length > 0) {
			tmp_6502 = tmp_6502 + '^z' + $('#6502z').val();
		}
		
		if (tmp_6502.length > 0) {
			$("#6502").val($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
			$("#l-6502").html($("#6502i1").val() + $("#6502i2").val() + tmp_6502);
		} else {
			$("#6502").val('');
			$("#l-6502").html('&nbsp;');
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
	
		$("#655a").bind('keyup change', function(event) {
		var tmp_655 = "";

		if ($('#655a').val().length > 0) {
			tmp_655 = tmp_655 + '^a' + $('#655a').val();
		}
		
		if (tmp_655.length > 0) {
			$("#655").val('00' + tmp_655);
			$("#l-655").html('00' + tmp_655);
		} else {
			$("#655").val('');
			$("#l-655").html('&nbsp;');
		}
	});

	$("#648a").bind('keyup change', function(event) {
		var tmp_648 = "";

		if ($('#648a').val().length > 0) {
			tmp_648 = tmp_648 + '^a' + $('#648a').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val(tmp_648);
			$("#l-648").html(tmp_648);
		} else {
			$("#648").val('');
			$("#l-648").html('&nbsp;');
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

	$("#710i1").change(function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#7104').val().length > 0) {
			tmp_710 = tmp_710 + '^4' + $('#7104').val();
		}
		
		if (tmp_710.length > 0) {
			$("#710").val($("#710i1").val() + $("#710i2").val() + tmp_710);
			$("#l-710").html($("#710i1").val() + $("#710i2").val() + tmp_710);
		} else {
			$("#710").val('');
			$("#l-710").html('&nbsp;');
		}
	});

	$("#710i2").change(function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#7104').val().length > 0) {
			tmp_710 = tmp_710 + '^4' + $('#7104').val();
		}
		
		if (tmp_710.length > 0) {
			$("#710").val($("#710i1").val() + $("#710i2").val() + tmp_710);
			$("#l-710").html($("#710i1").val() + $("#710i2").val() + tmp_710);
		} else {
			$("#710").val('');
			$("#l-710").html('&nbsp;');
		}
	});

	$("#710a").bind('keyup change', function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#7104').val().length > 0) {
			tmp_710 = tmp_710 + '^4' + $('#7104').val();
		}
		
		if (tmp_710.length > 0) {
			$("#710").val($("#710i1").val() + $("#710i2").val() + tmp_710);
			$("#l-710").html($("#710i1").val() + $("#710i2").val() + tmp_710);
		} else {
			$("#710").val('');
			$("#l-710").html('&nbsp;');
		}
	});

	$("#710b").bind('keyup change', function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#7104').val().length > 0) {
			tmp_710 = tmp_710 + '^4' + $('#7104').val();
		}
		
		if (tmp_710.length > 0) {
			$("#710").val($("#710i1").val() + $("#710i2").val() + tmp_710);
			$("#l-710").html($("#710i1").val() + $("#710i2").val() + tmp_710);
		} else {
			$("#710").val('');
			$("#l-710").html('&nbsp;');
		}
	});

	$("#710e").bind('keyup change', function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#7104').val().length > 0) {
			tmp_710 = tmp_710 + '^4' + $('#7104').val();
		}
		
		if (tmp_710.length > 0) {
			$("#710").val($("#710i1").val() + $("#710i2").val() + tmp_710);
			$("#l-710").html($("#710i1").val() + $("#710i2").val() + tmp_710);
		} else {
			$("#710").val('');
			$("#l-710").html('&nbsp;');
		}
	});

	$("#710t").bind('keyup change', function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#7104').val().length > 0) {
			tmp_710 = tmp_710 + '^4' + $('#7104').val();
		}
		
		if (tmp_710.length > 0) {
			$("#710").val($("#710i1").val() + $("#710i2").val() + tmp_710);
			$("#l-710").html($("#710i1").val() + $("#710i2").val() + tmp_710);
		} else {
			$("#710").val('');
			$("#l-710").html('&nbsp;');
		}
	});

	$("#7104").bind('keyup change', function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#7104').val().length > 0) {
			tmp_710 = tmp_710 + '^4' + $('#7104').val();
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
	$('#IconographieAddForm').submit(function(event) {
		if ($('#100a').val() == ""){
			alert("EL campo 'Nombre de persona' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t1xx').parent().addClass('active');
			$('#1xx').show();
			$('#100a').focus();
			return false;
		}

		if ($('#245a').val() == ""){
			alert("EL campo 'Mención de título' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t2xx').parent().addClass('active');
			$('#2xx').show();
			$('#245a').focus();
			return false;
		}

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
		
		if ($('#650a').val() == ""){
			alert("EL campo 'Materia.' No puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t6xx').parent().addClass('active');
			$('#6xx').show();
			$('#650a').focus();
			return false;
		}
	/*	if ($('#6501a').val() == ""){
			alert("EL campo 'Materia.' No puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t6xx').parent().addClass('active');
			$('#6xx').show();
			$('#6501a').focus();
			return false;
		}*/
		if ($('#653a').val() == ""){
			alert("EL campo 'Término de indización – No controlado' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t6xx').parent().addClass('active');
			$('#6xx').show();
			$('#653a').focus();
			return false;

		}if ($('#773t').val() == ""){
			alert("EL campo 'Título.' No puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t7xx').parent().addClass('active');
			$('#7xx').show();
			$('#773t').focus();
			return false;
		}

		if ($('#IconographieCover').val() == ""){
			alert("Debe seleccionar una portada para la obra.");
			$('#ItemItem').focus();
			return false;
		}
		
		return true;
	});

	$('#245a').change(function() {
		$.post("<?php echo $this->base; ?>/items/publications/" + $(this).val(), function(data) {
			//publications = data;
			//Actualizar object DOM publications.
		});
	});
});

//var authors = <?php echo $authors; ?>;
//var titles = <?php echo $titles; ?>;
//var places = <?php echo $places; ?>;
//var editors = <?php echo $editors; ?>;
//var years = <?php echo $years; ?>;
//var publications = <?php echo $publications; ?>;
//var matters = <?php echo $matters; ?>;
</script>
<?php echo $this->Html->script('autocomplete/jquery.autocomplete.min'); ?>
<?php echo $this->Html->script('autocomplete/currency-autocomplete'); ?>
<script type="text/javascript">
$(document).ready(function() {
	// Ancho del autocompletar.
	$('.autocomplete-suggestions').css('width', '30%');
});
</script>