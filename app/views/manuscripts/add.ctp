<?php echo $this->Html->css('autocomplete/autocomplete'); ?>
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


<!--CODIGO DE ALEJANDRO -->
<?php echo $this->Html->script('incipit/incipitManager'); ?>
<?php echo $this->Html->css('incipit/incipit-css'); ?>
<script type="text/javascript">

	function addLoadEvent(func) {
	  var oldonload = window.onload;
	  if (typeof window.onload != 'function') {
	    window.onload = func;
	  } else {
	    window.onload = function() {
	      if (oldonload) {
	        oldonload();
	      }
	      func();
	    }
	  }
	}
</script>

<style>
	@font-face 
	{
	  	font-family: Maestro;
	  	src: url(<?php echo $this->Html->url('/files/incipit/Maestro.ttf'); ?>) format('truetype');

		/*src: url('StreetFighter.eot'); /* IE9 Compat Modes */
		/*src: url('StreetFighter.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
	    /*url('StreetFighter.woff') format('woff'), /* Modern Browsers */
	    /*url('StreetFighter.ttf')  format('truetype'), /* Safari, Android, iOS */
	    /*url('StreetFighter.svg') format('svg'); /* Legacy iOS */
	}

	.maestro
	{
		font-family: Maestro;
		font-size: 15pt;
	} 
</style>

<!--FIN DEL CODIGO DE ALEJANDRO -->

<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '2'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
<li><a href="<?php echo $this->base; ?>/manuscripts">Música Manuscrita</a></li>
  <li>Agregar Partitura </li>
</ul>
<?php } else if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '1'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
<li><a href="<?php echo $this->base; ?>/manuscripts">Música Manuscrita</a></li>
  <li>Agregar Partitura </li>
</ul>
<?php } else { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/pages">Inicio</a></li>
<li><a href="<?php echo $this->base; ?>/manuscripts">Música Manuscrita</a></li>
 <li>Agregar Partitura </li>
</ul>
<?php } ?>


<div class="items">
<div class="col-md-12 column">
<h2>Agregar Partitura</h2>
<h2 style="margin-left: 480px; margin-top: -40px">Música Manuscrita</h2>

<?php echo $this->Form->create('Manuscript', array('enctype' => 'multipart/form-data')); ?>

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
				'selected' => 'n',
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
				'c' => 'c - Música notada impresa.',*/
				'd' => 'd - Música notada manuscrita.',
				/*'e' => 'e - Material cartográfico.',
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
			'selected' => 'd'/*,
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
				/*'b' => 'b - Parte componente seriada.',*/
				'c' => 'c - Colección.',
				/*'d' => 'd - Subunidad.',
				'i' => 'i - Recurso integrable.',*/
				'm' => 'm - Monografía.',
				/*'s' => 's - Publicación seriada.'*/
			),
			'selected' => 'm'/*,
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
			'selected' => '7',
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
			'selected' => 'a',
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
	<li><a class="tab" href="" id="t4xx">4XX</a></li>
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
			<label id="l-008"><?php echo date('ymd', time()); ?></label>
			<?php echo $this->Form->hidden('008', array('id' => '008', 'label' => false, 'div' => false, 'value' => date('ymd', time()))); ?>
		</th>
	</tr>
	<tr>
		<td><b>008 [06]</b></td>
		<td>Tipo de fecha/estado de la publicación.</td>
		<td><?php echo $this->Form->input('008-06', array('id' => '008-06', 'label' => false, 'class' => 'form-control', 'div' => false, 
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
			), 'selected' => 's'
		)); ?></td>
	</tr>
	<tr>
		<td nowrap="nowrap"><b>008 [07-10]</b></td>
		<td>Primera fecha.</td>
		<td>
			<table id="008pf">
				<tr>
					<td>
						<?php echo $this->Form->input('008-07-10', array('id' => '008-07-10', 'label' => false, 'class' => 'form-control', 'div' => false,
						'options' => array(
							'pf' => 'Primera Fecha (aammdd)',
							'#' => '# - El elemento fecha no es aplicable',
							'u' => 'u - Fecha total o parcialmente desconocida',
							'||||' => '|||| - No se utiliza'
							)
						)); ?>
					</td>
					<td>
						<?php echo $this->Form->input('fecha1-008-07-10', array('id' => 'fecha008-07-10', 'label' => false, 'class' => 'form-control', 'div' => false, 'maxlength' => '6', 'value' => 'yymmdd')); ?>
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
							)
						)); ?>
					</td>
					<td>
						<?php echo $this->Form->input('fecha2-008-11-14', array('id' => 'fecha008-11-14', 'label' => false, 'class' => 'form-control', 'div' => false, 'maxlength' => '6', 'value' => 'yymmdd')); ?>
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
			), 'default' => '-ve'
		)); ?></td>
	</tr>
	<tr>
		<td nowrap="nowrap"><b>008 [18-19]</b></td>
		<td>Forma de la composición.</td>
		<td><?php echo $this->Form->input('008-18-19', array('id' => '008-18-19', 'label' => false, 'class' => 'form-control', 'div' => false,
		'options' => array(
				'an' => 'an - Antífonas',
				'bd' => 'bd - Baladas',
				'bg' => 'bg - Bluegrass',
				'bl' => 'bl - Blues',
				'bt' => 'bt - Ballets',
				'ca' => 'ca - Chaconas',
				'cb' => 'cb - Cantos, otras religiones',
				'cc' => 'cc - Cantos cristianos',
				'cg' => 'cg - Concerti grossi',
				'ch' => 'ch - Corales',
				'cl' => 'cl - Preludios corales',
				'cn' => 'cn - Cánones',
				'co' => 'co - Conciertos',
				'cp' => 'cp - Polifonías',
				'cr' => 'cr - Canciones de navidad',
				'cs' => 'cs - Música aleatoria',
				'ct' => 'ct - Cantatas',
				'cy' => 'cy - Música country',
				'cz' => 'cz - Canzonas',
				'df' => 'df - Bailes',
				'dv' => 'dv - Divertimentos, serenatas, casaciones o nocturnos',
				'fg' => 'fg - Fugas',
				'fl' => 'fl- Flamenco',
				'fm' => 'fm - Música popular',
				'ft' => 'ft - Fantasías',
				'gm' => 'gm - Música gospel',
				'hy' => 'hy - Himnos',
				'jz' => 'jz - Jazz',
				'mc' => 'mc - Revistas y comedias musicales',
				'md' => 'md - Madrigales',
				'mi' => 'mi - Minuetos',
				'mo' => 'mo - Motetes',
				'mp' => 'mp - Música para cine',
				'mr' => 'mr - Marchas',
				'ms' => 'ms - Misas',
				'mu' => 'mu - Varias formas musicales',
				'mz' => 'mz - Mazurcas',
				'nc' => 'nc - Nocturnos',
				'nn' => 'nn - No aplicable',
				'op' => 'op - Óperas',
				'or' => 'or - Oratorios',
				'ov' => 'ov - Oberturas',
				'pg' => 'pg - Música de programa',
				'po' => 'po - Polonesas',
				'pp' => 'pp - Música ligera',
				'pr' => 'pr - Preludios',
				'ps' => 'ps - Pasacalles',
				'pt' => 'pt - Cantos polifónicos',
				'pv' => 'pv - Pavanas',
				'rc' => 'rc - Música rock',
				'rd' => 'rd - Rondós',
				'rg' => 'rg - Ragtime',
				'ri' => 'ri - Ricercares',
				'rp' => 'rp - Rapsodias',
				'rq' => 'rq - Requiems',
				'sd' => 'sd - Música de baile',
				'sg' => 'sg - Canciones',
				'sn' => 'sn - Sonatas',
				'sp' => 'sp - Poemas sinfónicos',
				'st' => 'st - Estudios y ejercicios',
				'su' => 'su - Suites',
				'sy' => 'sy - Sinfonías',
				'tc' => 'tc - Tocatas',
				'tl' => 'tl - Teatro lírico',
				'ts' => 'ts - Trío-sonatas',
				'uu' => 'uu - Desconocido',
				'vi' => 'vi - Villancicos',
				'vr' => 'vr - Variaciones',
				'wz' => 'wz - Valses',
				'za' => 'za - Zarzuelas',
				'zz' => 'zz - Otro',
				'||' => '|| - No se utiliza'	
				)
			)); ?></td>
	</tr>	
		
	<tr>
		<td><b>008 [20]</b></td>
		<td>Formato de música.</td>
		<td><?php echo $this->Form->input('008-20', array('id' => '008-20', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
					'a' => 'a - Partitura',
					'b' => 'b - Partitura de estudio o miniatura',
					'c' => 'c - Acompañamiento reducido para teclado',
					'd' => 'd - Partitura vocal',
					'e' => 'e - Guión o Partitura de piano director',
					'g' => 'g - Partitura abreviada',
					'h' => 'h - Partitura de coro',
					'i' => 'i - Partitura condensada',
					'j' => 'j - Parte para intérprete director',
					'm' => 'm - Múltiples formatos',
					'n' => 'n - No aplicable',
					'u' => 'u - Desconocido',
					'z' => 'z - Otro',
					'|' => '| - No se utiliza'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>008 [21]</b></td>
		<td>Partes musicales.</td>
		<td><?php echo $this->Form->input('008-21', array('id' => '008-21', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'#' => '# - No se dispone de partes o no están especificadas',
				'd' => 'd - Partes intrumentales y vocales',
				'e' => 'e - Partes instrumentales',
				'f' => 'f - Partes vocales',
				'n' => 'n - No aplicable',
				'u' => 'u - Desconocido',
				'|' => '| - No se utiliza'
			)
		)); ?></td>
	</tr>
	
		<tr>
		<td><b>008 [24-29]</b></td>
		<td>Material anejo.</td>
		<td><?php echo $this->Form->input('008-24-29', array('id' => '008-24-29', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'#' => '# - No hay material anejo',
				'a' => 'a - Discografía',
				'b' => 'b - Bibliografía',
				'c' => 'c - Índice temático',
				'd' => 'd - Libreto o texto',
				'e' => 'e - Biografía del compositor o autor',
				'f' => 'f - Biografía del intérprete o historia del grupo musical o del conjunto orquestal',
				'g' => 'g - Características técnicas y/o históricas sobre los instrumentos',
				'h' => 'h - Características técnicas sobre la música',
				'i' => 'i - Información histórica',
				'k' => 'k - Información etnológica',
				'r' => 'r - Material didáctico',
				's' => 's - Música',
				'z' => 'z - Otro',
				'|' => '| - No se utiliza'
			)
		)); ?></td>
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
			), 'default' => 'und'
		)); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>031</b></th>
		<th style="width: 45%;"><b>Información del íncipit musical.</b></th>
		<th style="width: 45%;">
			<label id="l-031">&nbsp;</label>
			<?php echo $this->Form->hidden('031', array('id' => '031', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Número de una obra.</td>
		<td><?php echo $this->Form->input('031a', array('id' => '031a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Número de movimiento.</td>
		<td><?php echo $this->Form->input('031b', array('id' => '031b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Número del pasaje.</td>
		<td><?php echo $this->Form->input('031c', array('id' => '031c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Título o encabezamiento.</td>
		<td><?php echo $this->Form->input('031d', array('id' => '031d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Personaje.</td>
		<td><?php echo $this->Form->input('031e', array('id' => '031e', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
		<tr>
		<td><b>$g</b></td>
		<td>Clave.</td>
		<td><?php echo $this->Form->input('031g', array('id' => '031g', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$m</b></td>
		<td>Voz/instrumento</td>
		<td><?php echo $this->Form->input('031m', array('id' => '031m', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Armadura.</td>
		<td><?php echo $this->Form->input('031n', array('id' => '031n', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$o</b></td>
		<td>Compás.</td>
		<td><?php echo $this->Form->input('031o', array('id' => '031o', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>
			Notación musical.
		<!-- Codigo de alejandro -->
			<div style="clear: both;">
				<label>Alteraciones:</label><br />
			</div>
			<div class="maestro" style="clear: both;">
				<!-- From L to P!-->
				<?php echo $this->Html->link('p', array('action' => 'p'), array('id' => 'Accidentales-p', 'class' => 'btn-primary buton-incipit','onclick' => 'accidentalPressed("p"); return false;')); ?>
				<?php echo $this->Html->link('l', array('action' => 'l'), array('id' => 'Accidentales-l', 'class' => 'btn-primary buton-incipit','onclick' => 'accidentalPressed("l"); return false;')); ?>
				<?php echo $this->Html->link('m', array('action' => 'm'), array('id' => 'Accidentales-m', 'class' => 'btn-primary buton-incipit','onclick' => 'accidentalPressed("m"); return false;')); ?>
				<?php echo $this->Html->link('n', array('action' => 'n'), array('id' => 'Accidentales-n', 'class' => 'btn-primary buton-incipit','onclick' => 'accidentalPressed("n"); return false;')); ?>
				<?php echo $this->Html->link('o', array('action' => 'o'), array('id' => 'Accidentales-o', 'class' => 'btn-primary buton-incipit','onclick' => 'accidentalPressed("o"); return false;')); ?>
			</div>

			<div style="clear: both;">
				<label>Armadura de Compás:</label><br />
			</div>
			<div class="maestro" style="clear: both;">		
				<?php echo $this->Html->link('t', array('action' => 't'), array('id' => 'Time-t', 'class' => 'btn-primary buton-incipit', 'onclick' => 'TimePressed("t"); return false;')); ?>
				<?php echo $this->Html->link('u', array('action' => 'u'), array('id' => 'Time-u', 'class' => 'btn-primary buton-incipit', 'onclick' => 'TimePressed("u"); return false;')); ?>
				<?php echo $this->Html->link('v', array('action' => 'v'), array('id' => 'Time-v', 'class' => 'btn-primary buton-incipit', 'onclick' => 'TimePressed("v"); return false;')); ?>
				<?php echo $this->Html->link('w', array('action' => 'w'), array('id' => 'Time-w', 'class' => 'btn-primary buton-incipit', 'onclick' => 'TimePressed("w"); return false;')); ?>
				<?php echo $this->Html->link('x', array('action' => 'x'), array('id' => 'Time-x', 'class' => 'btn-primary buton-incipit', 'onclick' => 'TimePressed("x"); return false;')); ?>
				<?php echo $this->Html->link('y', array('action' => 'y'), array('id' => 'Time-y', 'class' => 'btn-primary buton-incipit', 'onclick' => 'TimePressed("y"); return false;')); ?>
				<?php echo $this->Html->link('z', array('action' => 'z'), array('id' => 'Time-z', 'class' => 'btn-primary buton-incipit', 'onclick' => 'TimePressed("z"); return false;')); ?>
				<?php echo $this->Html->link('{', array('action' => '{'), array('id' => 'Time-{', 'class' => 'btn-primary buton-incipit', 'onclick' => 'TimePressed("{"); return false;')); ?>
				<?php echo $this->Html->link('|', array('action' => '|'), array('id' => 'Time-|', 'class' => 'btn-primary buton-incipit', 'onclick' => 'TimePressed("|"); return false;')); ?>
			</div>

			<div style="clear: both;">
				<label>Barras de Compás:</label><br />
			</div>
			<div class="maestro" style="clear: both;">	
				<?php echo $this->Html->link(';', array('action' => ';'), array('i;' => 'Barra-y', 'class' => 'btn-primary buton-incipit', 'onclick' => 'BarPressed(";"); return false;')); ?>	
				<?php echo $this->Html->link('<', array('action' => '<'), array('id' => 'Barra-<', 'class' => 'btn-primary buton-incipit', 'onclick' => 'BarPressed("<"); return false;')); ?>
				<?php echo $this->Html->link('>', array('action' => '>'), array('id' => 'Barra->', 'class' => 'btn-primary buton-incipit', 'onclick' => 'BarPressed(">"); return false;')); ?>
				<?php echo $this->Html->link('?', array('action' => '?'), array('id' => 'Barra-?', 'class' => 'btn-primary buton-incipit', 'onclick' => 'BarPressed("?"); return false;')); ?>
				<?php echo $this->Html->link('@', array('action' => '@'), array('id' => 'Barra-@', 'class' => 'btn-primary buton-incipit', 'onclick' => 'BarPressed("@"); return false;')); ?>
			</div>
			
			<div style="clear: both;">
				<label>Figuras Rítmicas:</label><br />
			</div>
			<div class="maestro" style="clear: both;">		
				<?php echo $this->Html->link('b', array('action' => 'b'), array('id' => 'Ritmo-b', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("b"); return false;')); ?>
				<?php echo $this->Html->link('c', array('action' => 'c'), array('id' => 'Ritmo-c', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("c"); return false;')); ?>
				<?php echo $this->Html->link('d', array('action' => 'd'), array('id' => 'Ritmo-d', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("d"); return false;')); ?>
				<?php echo $this->Html->link('e', array('action' => 'e'), array('id' => 'Ritmo-e', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("e"); return false;')); ?>
				<?php echo $this->Html->link('f', array('action' => 'f'), array('id' => 'Ritmo-f', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("f"); return false;')); ?>
				<?php echo $this->Html->link('g', array('action' => 'g'), array('id' => 'Ritmo-g', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("g"); return false;')); ?>
				<?php echo $this->Html->link('h', array('action' => 'h'), array('id' => 'Ritmo-h', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("h"); return false;')); ?>
				<?php echo $this->Html->link('i', array('action' => 'i'), array('id' => 'Ritmo-i', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("i"); return false;')); ?>
				<?php echo $this->Html->link('j', array('action' => 'j'), array('id' => 'Ritmo-j', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("j"); return false;')); ?>
				<?php echo $this->Html->link('"', array('action' => '"'), array('id' => 'Ritmo-"', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("\""); return false;')); ?>
				<?php echo $this->Html->link('#', array('action' => '#'), array('id' => 'Ritmo-#', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("#"); return false;')); ?>
				<?php echo $this->Html->link('$', array('action' => '$'), array('id' => 'Ritmo-$', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("$"); return false;')); ?>
				<?php echo $this->Html->link('%', array('action' => '%'), array('id' => 'Ritmo-%', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("%"); return false;')); ?>
				<?php echo $this->Html->link('&', array('action' => '&'), array('id' => 'Ritmo-&', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("&"); return false;')); ?>
				<?php echo $this->Html->link('\'', array('action' => '\''), array('id' => 'Ritmo-\'', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("\'"); return false;')); ?>
				<?php echo $this->Html->link('(', array('action' => '('), array('id' => 'Ritmo-(', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("("); return false;')); ?>
				<?php echo $this->Html->link(')', array('action' => ')'), array('id' => 'Ritmo-)', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed(")"); return false;')); ?>
				<?php echo $this->Html->link('*', array('action' => '*'), array('id' => 'Ritmo-*', 'class' => 'btn-primary buton-incipit', 'onclick' => 'NotePressed("*"); return false;')); ?>
				<?php echo $this->Html->link('q', array('action' => 'q'), array('id' => 'Puntillo-q', 'class' => 'btn-primary buton-incipit', 'onclick' => 'dotPressed("q"); return false;')); ?>
			</div>
			<div style="clear: both;">
				<label>Claves:</label><br />
			</div>
			<div class="maestro" style="clear: both;">
				<!-- From K to P!-->
				<?php echo $this->Html->link('1', array('action' => '1'), array('id' => 'Clave-1', 'class' => 'btn-primary buton-incipit', 'onclick' => 'ClefPressed("1"); return false;')); ?>
				<?php echo $this->Html->link('2', array('action' => '2'), array('id' => 'Clave-2', 'class' => 'btn-primary buton-incipit', 'onclick' => 'ClefPressed("2"); return false;')); ?>
				<?php echo $this->Html->link('3', array('action' => '3'), array('id' => 'Clave-3', 'class' => 'btn-primary buton-incipit', 'onclick' => 'ClefPressed("3"); return false;')); ?>
			</div>
		<!-- fin del codigo de alejandro-->
		</td>
		<td class="col-xs-12">
		<!-- Codigo de alejandro -->
		
			<div style="float: right">
				<?php echo $this->Html->link('Borrar Nota', array('action' => 'DeleteNote'), array('id' => 'DeleteNote', 'class' => 'btn-primary buton-incipit', 'style' => 'width: 100px;','onclick' => 'deleteNote(false); return false;')); ?>
				<?php echo $this->Html->link('Borrar Íncipit', array('action' => 'DeleteIncipit'), array('id' => 'DeleteIncipit', 'class' => 'btn-primary buton-incipit', 'style' => 'width: 100px;', 'onclick' => 'deleteNote(true); return false;')); ?>
			</div>
			<?php echo $this->Form->button('^', array('type' => 'button', 'id' => 'toneUp', 'onclick' => 'toneUpDown(-1);', 'class' => 'toneUp')); ?>
			<?php echo $this->Form->button('^', array('type' => 'button', 'id' => 'toneDown', 'class' => 'toneDown', 'onclick' => 'toneUpDown(1);')); ?>
			<?php 
				echo $this->Form->hidden('ItemsIncipit.paec', array('id' => 'incipitPaec', 'label' => false, 'div' => false, 'class' => 'form-control'));
				echo $this->Form->hidden('ItemsIncipit.transposition', array('id' => 'incipitTransposition', 'label' => false, 'div' => false, 'class' => 'form-control')); 
			?>

			<?php echo $this->Form->button('^', array('type' => 'button', 'id' => 'toneUp', 'onclick' => 'toneUpDown(-1);', 'class' => 'toneUp')); ?>
			<?php echo $this->Form->button('^', array('type' => 'button', 'id' => 'toneDown', 'class' => 'toneDown', 'onclick' => 'toneUpDown(1);')); ?>
			<canvas id="incipit" width="800" height="320">
				<script> 
					addLoadEvent(
						function() {
							var incipitDocument = document.getElementById("incipit");
							initializeIncipit(incipitDocument.id, "add", null , null); 
						}
					);
				</script>
			</canvas>
		<!-- fin del codigo de alejandro-->
		<?php echo $this->Form->input('031p', array('id' => '031p', 'label' => false, 'div' => false, 'class' => 'form-control')); ?>
		
		</td>
	</tr>
	<tr>
		<td><b>$q</b></td>
		<td>Nota general.</td>
		<td><?php echo $this->Form->input('031q', array('id' => '031q', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$r</b></td>
		<td>Tonalidad o modo.</td>
		<td><?php echo $this->Form->input('031r', array('id' => '031r', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$s</b></td>
		<td>Nota de validez codificada.</td>
		<td><?php echo $this->Form->input('031s', array('id' => '031s', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$t</b></td>
		<td>Texto del íncipit.</td>
		<td><?php echo $this->Form->input('031t', array('id' => '031t', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$u</b></td>
		<td>Identificador Uniforme del Recurso.</td>
		<td><?php echo $this->Form->input('031u', array('id' => '031u', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Texto del enlace.</td>
		<td><?php echo $this->Form->input('031y', array('id' => '031y', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Nota pública.</td>
		<td><?php echo $this->Form->input('031z', array('id' => '031z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$2</b></td>
		<td>Código del sistema.</td>
		<td><?php echo $this->Form->input('0312', array('id' => '0312', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$6</b></td>
		<td>Enlace.</td>
		<td><?php echo $this->Form->input('0316', array('id' => '0316', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$8</b></td>
		<td>Enlace entre campos y número de secuencia.</td>
		<td><?php echo $this->Form->input('0318', array('id' => '0318', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	
</table>


<table class="table">
	<tr>
		<th style="width: 10%;"><b>040</b></th>
		<th style="width: 45%;"><b>Fuente de la catalogación.</b></th>
		<th style="width: 45%;">
			<label id="l-040">&nbsp;</label>
			<?php echo $this->Form->hidden('040', array('id' => '040', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Centro catalogador de origen.</td>
		<td><?php echo $this->Form->input('040a', array('id' => '040a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>041</b></th>
		<th style="width: 45%;"><b>Código de lengua.</b></th>
		<th style="width: 45%;">
			<label id="l-041">&nbsp;</label>
			<?php echo $this->Form->hidden('041', array('id' => '041', 'label' => false, 'div' => false)); ?>
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
			), 'selected' => '0'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Fuente del código.</td>
		<td><?php echo $this->Form->input('041i2', array('id' => '041i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - Código MARC de lengua',
					'7' => '7 - Fuente especificada en el subcampo $b'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Código del idioma.</td>
		<td><?php echo $this->Form->input('041a', array('id' => '041a', 'label' => false, 'div' => false, 'class' => 'form-control',
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
			), 'default' => 'spa'
		)); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Código de idioma del sumario o resumen.</td>
		<td><?php echo $this->Form->input('041b', array('id' => '041b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$h</b></td>
		<td>Código de idioma original.</td>
		<td><?php echo $this->Form->input('041h', array('id' => '041h', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>044</b></th>
		<th style="width: 45%;"><b>Código del país de la entidad editora/productora.</b></th>
		<th style="width: 45%;">
			<label id="l-044">&nbsp;</label>
			<?php echo $this->Form->hidden('044', array('id' => '044', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Código MARC del país.</td>
		<td><?php echo $this->Form->input('044a', array('id' => '044a', 'label' => false, 'div' => false, 'class' => 'form-control',
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
				've' => '-ve - Venezuela',
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
			), 'default' => 've'
		)); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>047</b></th>
		<th style="width: 45%;"><b>Código de forma de composición musical.</b></th>
		<th style="width: 45%;">
			<label id="l-047">&nbsp;</label>
			<?php echo $this->Form->hidden('047', array('id' => '047', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
		<tr>
		<td><b>I1</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('047i1', array('id' => '047i1', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información'
			), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Fuente del código.</td>
		<td><?php echo $this->Form->input('047i2', array('id' => '047i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - Código MARC de lengua',
					'7' => '7 - Fuente especificada en el subcampo $b'
			), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Código de la forma de composición musical.</font>.</td>
		<td><?php echo $this->Form->input('047a', array('id' => '047a', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'an' => 'an - Antífonas',
				'bd' => 'bd - Baladas',
				'bg' => 'bg - Bluegrass',
				'bl' => 'bl - Blues',
				'bt' => 'bt - Ballets',
				'ca' => 'ca - Chaconas',
				'cb' => 'cb - Cantos, otras religiones',
				'cc' => 'cc - Cantos cristianos',
				'cg' => 'cg - Concerti grossi',
				'ch' => 'ch - Corales',
				'cl' => 'cl - Preludios corales',
				'cn' => 'cn - Cánones',
				'co' => 'co - Conciertos',
				'cp' => 'cp - Polifonías',
				'cr' => 'cr - Canciones de navidad',
				'cs' => 'cs - Música aleatoria',
				'ct' => 'ct - Cantatas',
				'cy' => 'cy - Música country',
				'cz' => 'cz - Canzonas',
				'df' => 'df - Bailes',
				'dv' => 'dv - Divertimentos, serenatas, casaciones o nocturnos',
				'fg' => 'fg - Fugas',
				'fl' => 'fl- Flamenco',
				'fm' => 'fm - Música popular',
				'ft' => 'ft - Fantasías',
				'gm' => 'gm - Música gospel',
				'hy' => 'hy - Himnos',
				'jz' => 'jz - Jazz',
				'mc' => 'mc - Revistas y comedias musicales',
				'md' => 'md - Madrigales',
				'mi' => 'mi - Minuetos',
				'mo' => 'mo - Motetes',
				'mp' => 'mp - Música para cine',
				'mr' => 'mr - Marchas',
				'ms' => 'ms - Misas',
				'mu' => 'mu - Varias formas musicales',
				'mz' => 'mz - Mazurcas',
				'nc' => 'nc - Nocturnos',
				'nn' => 'nn - No aplicable',
				'op' => 'op - Óperas',
				'or' => 'or - Oratorios',
				'ov' => 'ov - Oberturas',
				'pg' => 'pg - Música de programa',
				'po' => 'po - Polonesas',
				'pp' => 'pp - Música ligera',
				'pr' => 'pr - Preludios',
				'ps' => 'ps - Pasacalles',
				'pt' => 'pt - Cantos polifónicos',
				'pv' => 'pv - Pavanas',
				'rc' => 'rc - Música rock',
				'rd' => 'rd - Rondós',
				'rg' => 'rg - Ragtime',
				'ri' => 'ri - Ricercares',
				'rp' => 'rp - Rapsodias',
				'rq' => 'rq - Requiems',
				'sd' => 'sd - Música de baile',
				'sg' => 'sg - Canciones',
				'sn' => 'sn - Sonatas',
				'sp' => 'sp - Poemas sinfónicos',
				'st' => 'st - Estudios y ejercicios',
				'su' => 'su - Suites',
				'sy' => 'sy - Sinfonías',
				'tc' => 'tc - Tocatas',
				'tl' => 'tl - Teatro lírico',
				'ts' => 'ts - Trío-sonatas',
				'uu' => 'uu - Desconocido',
				'vi' => 'vi - Villancicos',
				'vr' => 'vr - Variaciones',
				'wz' => 'wz - Valses',
				'za' => 'za - Zarzuelas',
				'zz' => 'zz - Otro',
				'||' => '|| - No se utiliza'
				)
		)); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>048</b></th>
		<th style="width: 45%;"><b>Número de instrumentos y voces.</b></th>
		<th style="width: 45%;">
			<label id="l-048">&nbsp;</label>
			<?php echo $this->Form->hidden('048', array('id' => '048', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('048i1', array('id' => '048i1', 'label' => false, 'div' => false,  'class' => 'form-control',
			'options' => array(
				'#' => '# - No definido',
			), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Fuente del código.</td>
		<td><?php echo $this->Form->input('048i2', array('id' => '048i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - Código MARC',
				'7'	=>	'7 - Fuente especificada en el subcampo $2',
				), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Código de ejecutante o conjunto.</font>.</td>
		<td><?php echo $this->Form->input('048a', array('id' => '048a', 'label' => false, 'div' => false, 'class' => 'form-control',
		'options' => array(
			'ba' => 'ba Metales – Corno', 
'bb' => 'bb Metales – Trompeta', 
'bc' => 'bc Metales – Corneta', 
'bd' => 'bd Metales – Trombón', 
'be' => 'be Metales – Tuba', 
'bf' => 'bf Metales – Saxofon barítono', 
'bn' => 'bn Metales – No determinado', 
'bu' => 'bu Metales – Desconocido', 
'by' => 'by Metales – Étnico', 
'bz' => 'bz Metales – Otros', 
'ca' => 'ca Coros – Mixtos', 
'cb' => 'cb Coros – Femenino', 
'cc' => 'cc Coros – Masculino', 
'cd' => 'cd Coros – Infantil', 
'cn' => 'cn Coros – No determinado', 
'cu' => 'cu Coros – Desconocido', 
'cy' => 'cy Coros – Étnico', 
'ea' => 'ea Electrónico – Sintetizador', 
'eb' => 'eb Electrónico – Cinta', 
'ec' => 'ec Electrónico – Computador',
'ed' => 'ed Electrónico – Ondas Martinot', 
'en' => 'en Electrónico – No determinado', 
'eu' => 'eu Electrónico – Desconocido', 
'ez' => 'ez Electrónico – Otros', 
'ka' => 'ka Teclados – Piano', 
'kb' => 'kb Teclados – Órgano', 
'kc' => 'kc Teclados – Clave', 
'kd' => 'kd Teclados – Clavicordio', 
'ke' => 'ke Teclados – Contínuo', 
'kf' => 'kf Teclados – Celeste', 
'kn' => 'kn Teclados – No determinado', 
'ku' => 'ku Teclados – Desconocido', 
'ky' => 'ky Teclados – Étnico',
'kz' => 'kz Teclados – Otros', 
'oa' => 'oa Conjunto mayor – Orquesta completa', 
'ob' => 'ob Conjunto mayor – Orquesta de cámara',
'oc' => 'oc Conjunto mayor – Orquesta de cuerdas', 
'od' => 'od Conjunto mayor – Banda',
'oe' => 'oe Conjunto mayor – Orquesta de baile', 
'of' => 'of Conjunto mayor – Bandas de alientos metálicos (con o sin percusión)',
'on' => 'on Conjunto mayor – No especificado',
'ou' => 'ou Conjunto mayor – Desconocido',
'oy' => 'oy Conjunto mayor – Étnico',
'oz' => 'oz Conjunto mayor – Otros', 
'pa' => 'pa Percusión – Timpano', 
'pb' => 'pb Percusión – Xilófono', 
'pc' => 'pc Percusión – Marimba', 
'pd' => 'pd Percusión Tambor', 
'pn' => 'pn Percusión – No especificado', 
'pu' => 'pu Percusión – Desconocido',
'py' => 'py Percusión – Étnico', 
'pz' => 'pz Percusión – Otros', 
'sa' => 'sa Cuerdas con arco Violín',
'sb' => 'sb Cuerdas con arco – Viola', 
'sc' => 'sc Cuerdas con arco – Violonchelo',
'sd' => 'sd Cuerdas con arco Violón', 
'se' => 'se Cuerdas con arco – Viola antigua', 
'sf' => "sf Cuerdas con arco – Viola d'amore", 
'sg' => 'sg Cuerdas con arco – Viola de gamba', 
'sn' => 'sn Cuerdas con arco – No definido', 
'su' => 'su Cuerdas con arco – Desconocido', 
'sy' => 'sy Cuerdas con arco – Étnico', 
'sz' => 'sz Cuerdas con arco – Otros', 
'ta' => 'ta Cuerdas pulsadas – Arpa', 
'tb' => 'tb Cuerdas pulsadas – Guitarra', 
'tc' => 'tc Cuerdas pulsadas – Laúd', 
'td' => 'td Cuerdas pulsadas – Mandolina', 
'tn' => 'tn Cuerdas pulsadas -  No definido', 
'tu' => 'tu Cuerdas pulsadas – Desconocido', 
'ty' => 'ty Cuerdas pulsadas – Étnico', 
'tz' => 'tz Cuerdas pulsadas – Otros', 
'va' => 'va Voces – Soprano', 
'vb' => 'vb Voces – Mezzo soprano', 
'vc' => 'vc Voces – Contralto', 
'vd' => 'vd Voces – Tenor', 
've' => 've Voces – Barítono', 
'vf' => 'vf Voces – Bajo', 
'vg' => 'vg Voces- Contralto (masculino)', 
'vh' => 'vh Voces – Voz alta', 
'vi' => 'vi Voces – Media voz',
'vj' => 'vj Voces – Voz baja', 
'vn' => 'vn Voces – No definido',
'vu' => 'vu Voces – Desconocido', 
'vy' => 'vy Voces – Étnico', 
'wa' => 'wa Alientos de madera – Flauta', 
'wb' => 'wb Alientos de madera – Oboe', 
'wc' => 'wc Alientos de madera – Clarinete', 
'wd' => 'wd Alientos de madera – Fagot', 
'we' => 'we Alientos de madera – Flautín', 
'wf' => 'wf Alientos de madera – Corno inglés', 
'wg' => 'wg Alientos de madera – Clarinete bajo', 
'wh' => 'wh Alientos de madera – Flauta dulce', 
'wi' => 'wi Alientos de madera – Saxofón', 
'wn' => 'wn Alientos de madera – No definido', 
'wu' => 'wu Alientos de madera Desconocido', 
'wy' => 'wy Alientos de madera – Étnico', 
'wz' => 'wz Alientos de madera – Otros', 
'zn' => 'zn Instrumentos no definidos',
'zu' => 'zu Desconocido')
		)); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Código del solista.</font>.</td>
		<td><?php echo $this->Form->input('048b', array('id' => '048b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>


<table class="table">
	<tr>
		<th style="width: 10%;"><b>082</b></th>
		<th style="width: 45%;"><b>Número de la Clasificación Decimal Dewey.</b></th>
		<th style="width: 45%;">
			<label id="l-082">&nbsp;</label>
			<?php echo $this->Form->hidden('082', array('id' => '082', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de edición.</td>
		<td><?php echo $this->Form->input('082i1', array('id' => '082i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Completa',
				'1' => '1 - Abreviada'
			), 'selected' => '0'
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
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Número de clasificación.</td>
		<td><?php echo $this->Form->input('082a', array('id' => '082a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Número de documento.</td>
		<td><?php echo $this->Form->input('082b', array('id' => '082b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>092</b></th>
		<th style="width: 45%;"><b>Clasificación local (COTA).</b></th>
		<th style="width: 45%;">
			<label id="l-092">&nbsp;</label>
			<?php echo $this->Form->hidden('092', array('id' => '092', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>A disposición del centro catalogador.</td>
		<td><?php echo $this->Form->input('092a', array('id' => '092a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>A disposición del centro catalogador.</td>
		<td><?php echo $this->Form->input('092b', array('id' => '092b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>A disposición del centro catalogador.</td>
		<td><?php echo $this->Form->input('092c', array('id' => '092c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

</div>

<div id="1xx" class="tabs" style="display: none;">
<table class="table">
	<tr>
		<th style="width: 10%;"><b>100</b></th>
		<th style="width: 45%;"><b>Punto de acceso principal - Nombre de persona.</b></th>
		<th style="width: 45%;">
			<label id="l-100">&nbsp;</label>
			<?php echo $this->Form->hidden('100', array('id' => '100', 'label' => false, 'div' => false)); ?>
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
			), 'selected' => '1'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('100i2', array('id' => '100i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de persona <font color="red">(Obligatorio)</font>.</td>
		<td><?php echo $this->Form->input('100a', array('id' => '100a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Fechas asociadas al nombre.</td>
		<td><?php echo $this->Form->input('100d', array('id' => '100d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>110</b></th>
		<th style="width: 45%;"><b>Autor corporativo.</b></th>
		<th style="width: 45%;">
			<label id="l-110">&nbsp;</label>
			<?php echo $this->Form->hidden('110', array('id' => '110', 'label' => false, 'div' => false)); ?>
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
			), 'selected' => '2'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('110i2', array('id' => '110i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de autor corporativo.</td>
		<td><?php echo $this->Form->input('110a', array('id' => '110a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Unidad subordinada.</td>
		<td><?php echo $this->Form->input('110b', array('id' => '110b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

</div>

<div id="2xx" class="tabs" style="display: none;">

<table class="table">
	<tr>
		<th style="width: 10%;"><b>240</b></th>
		<th style="width: 45%;"><b>Título uniforme.</b></th>
		<th style="width: 45%;">
			<label id="l-240">&nbsp;</label>
			<?php echo $this->Form->hidden('240', array('id' => '240', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Impresión o visualización.</td>
		<td><?php echo $this->Form->input('240i1', array('id' => '240i1', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - No se imprime ni se visualiza',
				'1' => '1 - Se imprime o se visualiza'
			), 'selected' => '1'
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
			), 'selected' => '0'
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título uniforme.</td>
		<td><?php echo $this->Form->input('240a', array('id' => '240a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>245</b></th>
		<th style="width: 45%;"><b>Mención de título.</b></th>
		<th style="width: 45%;">
			<label id="l-245">&nbsp;</label>
			<?php echo $this->Form->hidden('245', array('id' => '245', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Punto de acceso adicional de título.</td>
		<td><?php echo $this->Form->input('245i1', array('id' => '245i1', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - No hay punto de acceso adicional',
				'1' => '1 - Hay punto de acceso adicional'
			), 'selected' => '1'
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
			), 'selected' => '0'
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título <font color="red">(Obligatorio)</font>.</td>
		<td><?php echo $this->Form->input('245a', array('id' => '245a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Subtítulo o título paralelo.</td>
		<td><?php echo $this->Form->input('245b', array('id' => '245b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Mención de responsabilidad.</td>
		<td><?php echo $this->Form->input('245c', array('id' => '245c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$h</b></td>
		<td>Tipo de material.</td>
		<td><?php echo $this->Form->input('245h', array('id' => '245h', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>246</b></th>
		<th style="width: 45%;"><b>Variante de título.</b></th>
		<th style="width: 45%;">
			<label id="l-246">&nbsp;</label>
			<?php echo $this->Form->hidden('246', array('id' => '246', 'label' => false, 'div' => false)); ?>
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
			)
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
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título.</td>
		<td><?php echo $this->Form->input('246a', array('id' => '246a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Subtítulo o título paralelo.</td>
		<td><?php echo $this->Form->input('246b', array('id' => '246b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$i</b></td>
		<td>Texto de visualización.</td>
		<td><?php echo $this->Form->input('246i', array('id' => '246i', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>254</b></th>
		<th style="width: 45%;"><b>Mención de presentación musical.</b></th>
		<th style="width: 45%;">
			<label id="l-254">&nbsp;</label>
			<?php echo $this->Form->hidden('254', array('id' => '254', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Mención de edición o presentación musical.</td>
		<td><?php echo $this->Form->input('254a', array('id' => '254a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Resto de la mención de edición o presentación musical.</td>
		<td><?php echo $this->Form->input('254b', array('id' => '254b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>260</b></th>
		<th style="width: 45%;"><b>Publicación, distribución, etc. (pie de imprenta).</b></th>
		<th style="width: 45%;">
			<label id="l-260">&nbsp;</label>
			<?php echo $this->Form->hidden('260', array('id' => '260', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Lugar de publicación, distribución, etc.</td>
		<td><?php echo $this->Form->input('260a', array('id' => '260a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Nombre del editor, distribuidor, etc.</td>
		<td><?php echo $this->Form->input('260b', array('id' => '260b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Fecha de publicación, distribución, etc.</td>
		<td><?php echo $this->Form->input('260c', array('id' => '260c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
</div>

<div id="3xx" class="tabs" style="display: none;">
<table class="table">
	<tr>
		<th style="width: 10%;"><b>300</b></th>
		<th style="width: 45%;"><b>Descripción física.</b></th>
		<th style="width: 45%;">
			<label id="l-300">&nbsp;</label>
			<?php echo $this->Form->hidden('300', array('id' => '300', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Extensión.</td>
		<td><?php echo $this->Form->input('300a', array('id' => '300a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Otras características físicas.</td>
		<td><?php echo $this->Form->input('300b', array('id' => '300b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Dimensiones.</td>
		<td><?php echo $this->Form->input('300c', array('id' => '300c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Material anejo.</td>
		<td><?php echo $this->Form->input('300e', array('id' => '300e', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>306</b></th>
		<th style="width: 45%;"><b>Duración.</b></th>
		<th style="width: 45%;">
			<label id="l-306">&nbsp;</label>
			<?php echo $this->Form->hidden('306', array('id' => '306', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Duración.</td>
		<td><?php echo $this->Form->input('306a', array('id' => '306a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Fecha de comienzo de la periodicidad actual.</td>
		<td><?php echo $this->Form->input('306b', array('id' => '306b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>380</b></th>
		<th style="width: 45%;"><b>Forma de la obra.</b></th>
		<th style="width: 45%;">
			<label id="l-380">&nbsp;</label>
			<?php echo $this->Form->hidden('380', array('id' => '380', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Forma de la obra.</td>
		<td><?php echo $this->Form->input('380a', array('id' => '380a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$0</b></td>
		<td>Número de control del registro.</td>
		<td><?php echo $this->Form->input('3800', array('id' => '3800', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$2</b></td>
		<td>Fuente del término.</td>
		<td><?php echo $this->Form->input('3802', array('id' => '3802', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$6</b></td>
		<td>Enlace.</td>
		<td><?php echo $this->Form->input('3806', array('id' => '3806', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$8</b></td>
		<td>Enlace entre campos y número de secuencia.</td>
		<td><?php echo $this->Form->input('3808', array('id' => '3808', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>381</b></th>
		<th style="width: 45%;"><b>Otras características distintivas de obra (Compás).</b></th>
		<th style="width: 45%;">
			<label id="l-381">&nbsp;</label>
			<?php echo $this->Form->hidden('381', array('id' => '381', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nomenclatura de compás.</td>
		<td><?php echo $this->Form->input('381a', array('id' => '381a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>382</b></th>
		<th style="width: 45%;"><b>Medio de interpretación.</b></th>
		<th style="width: 45%;">
			<label id="l-382">&nbsp;</label>
			<?php echo $this->Form->hidden('382', array('id' => '382', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Medio de interpretación.</td>
		<td><?php echo $this->Form->input('382a', array('id' => '382a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>383</b></th>
		<th style="width: 45%;"><b>Designación numérica de obra musical.</b></th>
		<th style="width: 45%;">
			<label id="l-383">&nbsp;</label>
			<?php echo $this->Form->hidden('383', array('id' => '383', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Número de serie.</td>
		<td><?php echo $this->Form->input('383a', array('id' => '383a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Número de opus.</td>
		<td><?php echo $this->Form->input('383b', array('id' => '383b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Número de catálogo temático.</td>
		<td><?php echo $this->Form->input('383c', array('id' => '383c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Código de catálogo temático.</td>
		<td><?php echo $this->Form->input('383d', array('id' => '383d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Editor asociado al número de serie o de opus.</td>
		<td><?php echo $this->Form->input('383e', array('id' => '383e', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>384</b></th>
		<th style="width: 45%;"><b>Tonalidad.</b></th>
		<th style="width: 45%;">
			<label id="l-384">&nbsp;</label>
			<?php echo $this->Form->hidden('384', array('id' => '384', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de tonalidad.</td>
		<td><?php echo $this->Form->input('384i1', array('id' => '384i1', 'label' => false, 'div' => false,  'class' => 'form-control',
			'options' => array(
					'#' => '# - Se desconoce la relación con la tonalidad original',
					'0' => '0 - Tonalidad original',
					'1' => '1 - Tonalidad transportada'
			), 'selected' => '0'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('384i2', array('id' => '384i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Tonalidad.</td>
		<td><?php echo $this->Form->input('384a', array('id' => '384a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>


</div>

<div id="4xx" class="tabs" style="display: none;">

<table class="table">
	<tr>
		<th style="width: 1o%;"><b>490</b></th>
		<th style="width: 45%;"><b> Mención de la serie.</b></th>
		<th style="width: 45%;">
			<label id="l-490">&nbsp;</label>
			<?php echo $this->Form->hidden('490', array('id' => '490', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Política de recuperación de series.</td>
		<td><?php echo $this->Form->input('490i1', array('id' => '490i1', 'label' => false, 'div' => false,  'class' => 'form-control',
			'options' => array(
					'0' => '0 - Serie sin recuperación',
					'1' => '1 - Serie con recuperación'
			), 'selected' => '0'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('490i2', array('id' => '490i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de la fuente.</td>
		<td><?php echo $this->Form->input('490a', array('id' => '490a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Localización dentro de la fuente.</td>
		<td><?php echo $this->Form->input('490v', array('id' => '490v', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
</div>

<div id="5xx" class="tabs" style="display: none;">
<table class="table">
	<tr>
		<th style="width: 10%;"><b>500</b></th>
		<th style="width: 45%;"><b>Nota general.</b></th>
		<th style="width: 45%;">
			<label id="l-500">&nbsp;</label>
			<?php echo $this->Form->hidden('500', array('id' => '500', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota general.</td>
		<td><?php echo $this->Form->input('500a', array('id' => '500a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>501</b></th>
		<th style="width: 45%;"><b>Nota de “Con”.</b></th>
		<th style="width: 45%;">
			<label id="l-501">&nbsp;</label>
			<?php echo $this->Form->hidden('501', array('id' => '501', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Con.</td>
		<td><?php echo $this->Form->input('501a', array('id' => '501a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>505</b></th>
		<th style="width: 45%;"><b>Nota de contenido con formato.</b></th>
		<th style="width: 45%;">
			<label id="l-505">&nbsp;</label>
			<?php echo $this->Form->hidden('505', array('id' => '505', 'label' => false, 'div' => false)); ?>
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
			), 'selected' => '0'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Nivel de designación del contenido.</td>
		<td><?php echo $this->Form->input('505i2', array('id' => '505i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - Básico',
					'0' => '0 - Completo'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de contenido con formato.</td>
		<td><?php echo $this->Form->input('505a', array('id' => '505a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>508</b></th>
		<th style="width: 45%;"><b>Nota de créditos de creación o producción.</b></th>
		<th style="width: 45%;">
			<label id="l-508">&nbsp;</label>
			<?php echo $this->Form->hidden('508', array('id' => '508', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de créditos de creación o producción.</td>
		<td><?php echo $this->Form->input('508a', array('id' => '508a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>511</b></th>
		<th style="width: 45%;"><b>Nota de participantes o intérpretes.</b></th>
		<th style="width: 45%;">
			<label id="l-511">&nbsp;</label>
			<?php echo $this->Form->hidden('511', array('id' => '511', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de visualización asociada.</td>
		<td><?php echo $this->Form->input('511i1', array('id' => '511i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - No genera visualización asociada',
				'1' => '1 - Intérpretes'
			), 'selected' => '1'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('511i2', array('id' => '511i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de participantes o intérpretes.</font></td>
		<td><?php echo $this->Form->input('511a', array('id' => '511a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>518</b></th>
		<th style="width: 45%;"><b>Nota de fecha/hora y lugar de un acontecimiento.</b></th>
		<th style="width: 45%;">
			<label id="l-518">&nbsp;</label>
			<?php echo $this->Form->hidden('518', array('id' => '518', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de fecha/hora y lugar de un acontecimiento.</td>
		<td><?php echo $this->Form->input('518a', array('id' => '518a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>520</b></th>
		<th style="width: 45%;"><b>Nota de sumario, etc.</b></th>
		<th style="width: 45%;">
			<label id="l-520">&nbsp;</label>
			<?php echo $this->Form->hidden('520', array('id' => '520', 'label' => false, 'div' => false)); ?>
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
			), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('520i2', array('id' => '520i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Sumario, etc.</td>
		<td><?php echo $this->Form->input('520a', array('id' => '520a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Otras explicaciones complementarias.</td>
		<td><?php echo $this->Form->input('520b', array('id' => '520b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>521</b></th>
		<th style="width: 45%;"><b>Nota de público destinatario.</b></th>
		<th style="width: 45%;">
			<label id="l-521">&nbsp;</label>
			<?php echo $this->Form->hidden('521', array('id' => '521', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de visualización asociada.</td>
		<td><?php echo $this->Form->input('521i1', array('id' => '521i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => 'Destinatario' ,
			'0'=> 'Nivel de lectura',
			'1'=> 'Edad',
			'2' => 'Curso',
			'3' => 'Características especiales del destinatario',
			'4' => 'Nivel de interés o motivación',
			'8' => 'No genera visualización asociada'
			), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('521i2', array('id' => '521i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de audiencia.</td>
		<td><?php echo $this->Form->input('521a', array('id' => '521a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>545</b></th>
		<th style="width: 45%;"><b>Datos biográficos o históricos.</b></th>
		<th style="width: 45%;">
			<label id="l-545">&nbsp;</label>
			<?php echo $this->Form->hidden('545', array('id' => '545', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de visualización asociada.</td>
		<td><?php echo $this->Form->input('545i1', array('id' => '545i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Resumen biográfico',
				'1' => '1 - Historia administrativa'
			), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('545i2', array('id' => '545i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Datos biográficos o históricos.</td>
		<td><?php echo $this->Form->input('545a', array('id' => '545a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>546</b></th>
		<th style="width: 45%;"><b>Nota de lengua.</b></th>
		<th style="width: 45%;">
			<label id="l-546">&nbsp;</label>
			<?php echo $this->Form->hidden('546', array('id' => '546', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de lengua.</td>
		<td><?php echo $this->Form->input('546a', array('id' => '546a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Información sobre el código o alfabeto.</td>
		<td><?php echo $this->Form->input('546c', array('id' => '546c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>561</b></th>
		<th style="width: 45%;"><b>Nota de procedencia.</b></th>
		<th style="width: 45%;">
			<label id="l-561">&nbsp;</label>
			<?php echo $this->Form->hidden('561', array('id' => '561', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Procedencia.</td>
		<td><?php echo $this->Form->input('561a', array('id' => '561a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>588</b></th>
		<th style="width: 45%;"><b>Nota de fuente de la descripción.</b></th>
		<th style="width: 45%;">
			<label id="l-588">&nbsp;</label>
			<?php echo $this->Form->hidden('588', array('id' => '588', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de fuente de la descripción.</td>
		<td><?php echo $this->Form->input('588a', array('id' => '588a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 5%;"><b>592</b></th>
		<th style="width: 45%;"><b>Partes vocales/instrumentales.</b></th>
		<th style="width: 45%;">
			<label id="l-592">&nbsp;</label>
			<?php echo $this->Form->hidden('592', array('id' => '592', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Instrumento - Medio sonoro.</font>.</td>
		<td><?php echo $this->Form->input('592b', array('id' => '592b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>593</b></th>
		<th style="width: 45%;"><b>Íncipit musical codificado (Búsqueda).</b></th>
		<th style="width: 45%;">
			<label id="l-593">&nbsp;</label>
			<?php echo $this->Form->hidden('593', array('id' => '593', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Íncipit musical codificado.</td>
		<td><?php echo $this->Form->input('593a', array('id' => '593a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

</div>

<div id="6xx" class="tabs" style="display: none;">
<table class="table">
	<tr>
		<th style="width: 10%;"><b>600</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de materia - Nombre de persona.</b></th>
		<th style="width: 45%;">
			<label id="l-600">&nbsp;</label>
			<?php echo $this->Form->hidden('600', array('id' => '600', 'label' => false, 'div' => false)); ?>
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
			), 'selected' => '#'
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
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de persona.</td>
		<td><?php echo $this->Form->input('600a', array('id' => '600a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Fechas asociadas al nombre.</td>
		<td><?php echo $this->Form->input('600d', array('id' => '600d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Títulos y otros términos asociados al nombre.</td>
		<td><?php echo $this->Form->input('600c', array('id' => '600c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Término indicativo de función.</td>
		<td><?php echo $this->Form->input('600e', array('id' => '600e', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Subdivisión de forma.</td>
		<td><?php echo $this->Form->input('600v', array('id' => '600v', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Subdivisión de materia general.</td>
		<td><?php echo $this->Form->input('600x', array('id' => '600x', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Subdivisión cronológica.</td>
		<td><?php echo $this->Form->input('600y', array('id' => '600y', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Subdivisión geográfica.</td>
		<td><?php echo $this->Form->input('600z', array('id' => '600z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>610</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de materia - Nombre de entidad corporativa.</b></th>
		<th style="width: 45%;">
			<label id="l-610">&nbsp;</label>
			<?php echo $this->Form->hidden('610', array('id' => '610', 'label' => false, 'div' => false)); ?>
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
			), 'selected' => '2'
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
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de entidad corporativa.</td>
		<td><?php echo $this->Form->input('610a', array('id' => '610a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Unidad subordinada.</td>
		<td><?php echo $this->Form->input('610b', array('id' => '610b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Término indicativo de función.</td>
		<td><?php echo $this->Form->input('610e', array('id' => '610e', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Subdivisión de forma.</td>
		<td><?php echo $this->Form->input('610v', array('id' => '610v', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Subdivisión de materia general.</td>
		<td><?php echo $this->Form->input('610x', array('id' => '610x', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Subdivisión cronológica.</td>
		<td><?php echo $this->Form->input('610y', array('id' => '610y', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Subdivisión geográfica.</td>
		<td><?php echo $this->Form->input('610z', array('id' => '610z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>648</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de materia -Término cronológico.</b></th>
		<th style="width: 45%;">
			<label id="l-648">&nbsp;</label>
			<?php echo $this->Form->hidden('648', array('id' => '648', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Término cronológico.</font>.</td>
		<td><?php echo $this->Form->input('648a', array('id' => '648a', 'label' => false, 'div' => false, 'class' => 'form-control', 'empty' => 'Seleccione', 'options' => array('XVII' => 'XVII', 'XVIII' => 'XVIII', 'XIX' => 'XIX', 'XX' => 'XX'))); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>650</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de materia – Término de materia.</b></th>
		<th style="width: 45%;">
			<label id="l-650">&nbsp;</label>
			<?php echo $this->Form->hidden('650', array('id' => '650', 'label' => false, 'div' => false)); ?>
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
			)
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
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Materia.</td>
		<td><?php echo $this->Form->input('650a', array('id' => '650a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Subdivisión de forma.</td>
		<td><?php echo $this->Form->input('650v', array('id' => '650v', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Subdivisión de materia general.</td>
		<td><?php echo $this->Form->input('650x', array('id' => '650x', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Subdivisión cronológica.</td>
		<td><?php echo $this->Form->input('650y', array('id' => '650y', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Subdivisión geográfica.</td>
		<td><?php echo $this->Form->input('650z', array('id' => '650z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>651</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de materia - Nombre geográfico.</b></th>
		<th style="width: 45%;">
			<label id="l-651">&nbsp;</label>
			<?php echo $this->Form->hidden('651', array('id' => '651', 'label' => false, 'div' => false)); ?>
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
			)
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
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Materia.</td>
		<td><?php echo $this->Form->input('651a', array('id' => '651a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Subdivisión de forma.</td>
		<td><?php echo $this->Form->input('651v', array('id' => '651v', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Subdivisión de materia general.</td>
		<td><?php echo $this->Form->input('651x', array('id' => '651x', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Subdivisión cronológica.</td>
		<td><?php echo $this->Form->input('651y', array('id' => '651y', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Subdivisión geográfica.</td>
		<td><?php echo $this->Form->input('651z', array('id' => '651z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>653</b></th>
		<th style="width: 45%;"><b>Término de indización – No controlado.</b></th>
		<th style="width: 45%;">
			<label id="l-653">&nbsp;</label>
			<?php echo $this->Form->hidden('653', array('id' => '653', 'label' => false, 'div' => false)); ?>
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
			)
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
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Palabra clave.</td>
		<td><?php echo $this->Form->input('653a', array('id' => '653a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

</div>

<div id="7xx" class="tabs" style="display: none;">
<table class="table">
	<tr>
		<th style="width: 10%;"><b>700</b></th>
		<th style="width: 45%;"><b>Menciones de Responsabilidad.</b></th>
		<th style="width: 45%;">
			<label id="l-700">&nbsp;</label>
			<?php echo $this->Form->hidden('700', array('id' => '700', 'label' => false, 'div' => false)); ?>
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
			), 'selected' => '1'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tipo de punto de acceso adicional.</td>
		<td><?php echo $this->Form->input('700i2', array('id' => '700i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'2' => '2 - Entrada analítica'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de persona.</td>
		<td><?php echo $this->Form->input('700a', array('id' => '700a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Numeración.</td>
		<td><?php echo $this->Form->input('700b', array('id' => '700b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Títulos y otros términos asociados al nombre.</td>
		<td><?php echo $this->Form->input('700c', array('id' => '700c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Fechas asociadas al nombre.</td>
		<td><?php echo $this->Form->input('700d', array('id' => '700d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Término indicativo de función.</td>
		<td><?php echo $this->Form->input('700e', array('id' => '700e', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$q</b></td>
		<td>Forma desarrollada del nombre.</td>
		<td><?php echo $this->Form->input('700q', array('id' => '700q', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$t</b></td>
		<td>Título de la obra.</td>
		<td><?php echo $this->Form->input('700t', array('id' => '700t', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$4</b></td>
		<td>Código de función.</td>
		<td><?php echo $this->Form->input('7004', array('id' => '7004', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>710</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional - Nombre corporativo.</b></th>
		<th style="width: 45%;">
			<label id="l-710">&nbsp;</label>
			<?php echo $this->Form->hidden('710', array('id' => '710', 'label' => false, 'div' => false)); ?>
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
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tipo de punto de acceso adicional.</td>
		<td><?php echo $this->Form->input('710i2', array('id' => '710i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'2' => '2 - Entrada analítica'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de persona.</td>
		<td><?php echo $this->Form->input('710a', array('id' => '710a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Numeración.</td>
		<td><?php echo $this->Form->input('710b', array('id' => '710b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Forma desarrollada del nombre.</td>
		<td><?php echo $this->Form->input('710e', array('id' => '710e', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$t</b></td>
		<td>Título de la obra.</td>
		<td><?php echo $this->Form->input('710t', array('id' => '710t', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$4</b></td>
		<td>Código de función.</td>
		<td><?php echo $this->Form->input('7104', array('id' => '7104', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>740</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional - Título relacionado o analítico no controlado.</b></th>
		<th style="width: 45%;">
			<label id="l-740">&nbsp;</label>
			<?php echo $this->Form->hidden('740', array('id' => '740', 'label' => false, 'div' => false)); ?>
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
			), 'selected' => '0'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tipo de asiento secundario.</td>
		<td><?php echo $this->Form->input('740i2', array('id' => '740i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - No hay punto de acceso adicional',
				'1' => '1 - Hay punto de acceso adicional'
			), 'selected' => '1'
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título relacionado o analítico no controlado.</td>
		<td><?php echo $this->Form->input('740a', array('id' => '740a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Número de la parte o sección de una obra.</td>
		<td><?php echo $this->Form->input('740n', array('id' => '740n', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Nombre de la parte/sección de una obra.</td>
		<td><?php echo $this->Form->input('740p', array('id' => '740p', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>773</b></th>
		<th style="width: 45%;"><b>Enlace al documento fuente.</b></th>
		<th style="width: 45%;">
			<label id="l-773">&nbsp;</label>
			<?php echo $this->Form->hidden('773', array('id' => '773', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de nota.</td>
		<td><?php echo $this->Form->input('773i1', array('id' => '773i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Genera nota',
				'1' => '1 - No genera nota'
			), 'selected' => '1'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Control de visualización asociada.</td>
		<td><?php echo $this->Form->input('773i2', array('id' => '773i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - En',
				'8' => '8 - No genera visualización asociada'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Autor.</td>
		<td><?php echo $this->Form->input('773a', array('id' => '773a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Edición.</td>
		<td><?php echo $this->Form->input('773b', array('id' => '773b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Lugar, editor y fecha de publicación.</td>
		<td><?php echo $this->Form->input('773d', array('id' => '773d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$g</b></td>
		<td>Parte(s) relacionada(s).</td>
		<td><?php echo $this->Form->input('773g', array('id' => '773g', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$h</b></td>
		<td>Descripción física.</td>
		<td><?php echo $this->Form->input('773h', array('id' => '773h', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$k</b></td>
		<td>Datos de la serie del documento relacionado.</td>
		<td><?php echo $this->Form->input('773k', array('id' => '773k', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Nota.</td>
		<td><?php echo $this->Form->input('773n', array('id' => '773n', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$q</b></td>
		<td>Numeración y primera página.</td>
		<td><?php echo $this->Form->input('773q', array('id' => '773q', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$t</b></td>
		<td>Título.</td>
		<td><?php echo $this->Form->input('773t', array('id' => '773t', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Número Internacional Normalizado para Libros (ISBN).</td>
		<td><?php echo $this->Form->input('773z', array('id' => '773z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
</div>

<div id="8xx" class="tabs" style="display: none;">
	
	<table class="table">
	<tr>
		<th style="width: 10%;"><b>800</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de serie - Nombre de persona.</b></th>
		<th style="width: 45%;">
			<label id="l-800">&nbsp;</label>
			<?php echo $this->Form->hidden('800', array('id' => '800', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Elemento inicial del nombre de persona.</td>
		<td><?php echo $this->Form->input('800i1', array('id' => '800i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Nombre',
				'1' => '1 - Apellido(s)',
				'3' => '3 - Nombre de familia'
				),
			'selected' => '1',
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('800i2', array('id' => '800i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de persona.</td>
		<td><?php echo $this->Form->input('800a', array('id' => '800a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Fechas asociadas al nombre.</td>
		<td><?php echo $this->Form->input('800d', array('id' => '800d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$t</b></td>
		<td>Título de la obra.</td>
		<td><?php echo $this->Form->input('800t', array('id' => '800t', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>

</table>
	
<table class="table">
	<tr>
		<th style="width: 10%;"><b>810</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de serie - Nombre de entidad.</b></th>
		<th style="width: 45%;">
			<label id="l-810">&nbsp;</label>
			<?php echo $this->Form->hidden('810', array('id' => '810', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Elemento inicial del nombre de entidad.</td>
		<td><?php echo $this->Form->input('810i1', array('id' => '810i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Nombre en orden inverso',
				'1' => '1 - Nombre de jurisdicción',
				'2' => '2 - Nombre en orden directo'
				),
			'selected' => '2',
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('810i2', array('id' => '810i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de persona.</td>
		<td><?php echo $this->Form->input('810a', array('id' => '810a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Fechas asociadas al nombre.</td>
		<td><?php echo $this->Form->input('810b', array('id' => '810b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>

</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>811</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de serie - Nombre de congreso.</b></th>
		<th style="width: 45%;">
			<label id="l-811">&nbsp;</label>
			<?php echo $this->Form->hidden('811', array('id' => '811', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Elemento inicial del nombre de congreso.</td>
		<td><?php echo $this->Form->input('811i1', array('id' => '811i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Nombre en orden inverso',
				'1' => '1 - Nombre de jurisdicción',
				'2' => '2 - Nombre en orden directo'
				),
			'selected' => '2',
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('811i2', array('id' => '811i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de congreso o nombre de jurisdicción como elemento inicial.</td>
		<td><?php echo $this->Form->input('811a', array('id' => '811a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Fecha del congreso.</td>
		<td><?php echo $this->Form->input('811d', array('id' => '811d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>

</table>
	
<table class="table">
	<tr>
		<th style="width: 10%;"><b>850</b></th>
		<th style="width: 45%;"><b>Institución que posee los fondos.</b></th>
		<th style="width: 45%;">
			<label id="l-850">&nbsp;</label>
			<?php echo $this->Form->hidden('850', array('id' => '850', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de la institución que posee los fondos.</td>
		<td><?php echo $this->Form->input('850a', array('id' => '850a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>852</b></th>
		<th style="width: 45%;"><b>Localización.</b></th>
		<th style="width: 45%;">
			<label id="l-852">&nbsp;</label>
			<?php echo $this->Form->hidden('852', array('id' => '852', 'label' => false, 'div' => false)); ?>
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
			)
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
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Localización.</td>
		<td><?php echo $this->Form->input('852a', array('id' => '852a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>

	<tr>
		<td><b>$c</b></td>
		<td>Ubicación en estantería.</td>
		<td><?php echo $this->Form->input('852c', array('id' => '852c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>856</b></th>
		<th style="width: 45%;"><b>Localización y acceso electrónicos.</b></th>
		<th style="width: 45%;">
			<label id="l-856">&nbsp;</label>
			<?php echo $this->Form->hidden('856', array('id' => '856', 'label' => false, 'div' => false)); ?>
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
			)
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
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre del host.</td>
		<td><?php echo $this->Form->input('856a', array('id' => '856a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Ruta.</td>
		<td><?php echo $this->Form->input('856d', array('id' => '856d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$u</b></td>
		<td>Dirección electrónica.</td>
		<td><?php echo $this->Form->input('856u', array('id' => '856u', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

</div>

<?php echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Auth.User.id'))); ?>
	
	<table class="table">
		<tr>
			<th style="width: 50%;">Portada de la obra (preferiblemente jpg o tiff). (Obligatorio).</th>
			<th style="width: 50%;">Archivo o Documento (preferiblemente pdf, odt o  doc). (Obligatorio).</th>
		</tr>
		<tr>
			<td><?php echo $this->Form->input('cover', array('label' => false, 'type' => 'file', 'style' => 'width: 100%')); ?>
			<?php echo "<b>Tamaño máximo permitido: 2M" . ini_set('upload_max_filesize', '2M') . '.</b>';?></td>
			<td><?php echo $this->Form->input('item', array('label' => false, 'type' => 'file', 'style' => 'width: 100%')); ?>
			<?php echo "<b>Tamaño máximo permitido: 2M" . ini_set('upload_max_filesize', '2M') . '.</b>';?></td>
		</tr>
	</table>
	
	<input type="checkbox" id="ManuscriptPublished" value="1" checked="checked" name="data[Manuscript][published]" style="width: 30px;">Publicado

	<div style="text-align: right;"><a href="#top" class="btn btn-primary">Ir Arriba</a></div>
	
	<br />
	
	<div class="text-center">
		<?php echo $this->Form->submit('Guardar', array('id' => 'guardar', 'class' => 'btn btn-primary')); ?>
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

		if (id.localeCompare("t9xx")) {
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
			$("#fecha008-07-10").val('yymmdd');
		} else {
			$("#fecha008-07-10").prop('disabled', false);
		}
	});
	
	$("#008-11-14").change(function(event) {
		if($("#008-11-14 option:selected").val() != 'sf'){
			$("#fecha008-11-14").prop('disabled', true);
			$("#fecha008-11-14").val('yymmdd');
		} else {
			$("#fecha008-11-14").prop('disabled', false);
		}
	});

	// El campo 008 al cargar la pagina.
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

	if ($('#008-18-19').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-18-19').val();
	}

	if ($('#008-20').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-20').val();
	}

	if ($('#008-21').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-21').val();
	}
	if ($('#008-24-29').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-24-29').val();
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

		if ($('#008-18-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}
		if ($('#008-24-29').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-24-29').val();
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

		if ($('#008-18-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}
		if ($('#008-24-29').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-24-29').val();
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

		if ($('#008-18-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}
		if ($('#008-24-29').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-24-29').val();
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

		if ($('#008-18-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}
		if ($('#008-24-29').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-24-29').val();
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

		if ($('#008-18-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18-19').val();
		}
		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}
		if ($('#008-24-29').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-24-29').val();
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

		if ($('#008-18-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}
		if ($('#008-24-29').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-24-29').val();
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

	$("#008-18-19").change(function(event) {
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

		if ($('#008-18-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}
		if ($('#008-24-29').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-24-29').val();
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

		if ($('#008-18-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18-19').val();
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

		if ($('#008-18-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18-19').val();
		}
		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}
		if ($('#008-24-29').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-24-29').val();
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

		$("#008-24-29").change(function(event) {
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

		if ($('#008-18-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}
		if ($('#008-24-29').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-24-29').val();
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

		if ($('#008-18-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}
		if ($('#008-24-29').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-24-29').val();
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
	
	$("#024a").bind('keyup change', function(event) {
		var tmp_024 = "";

		if ($('#024a').val().length > 0) {
			tmp_024 = tmp_024 + '^a' + $('#024a').val();
		}

		if ($('#024y').val().length > 0) {
			tmp_024 = tmp_024 + '^y' + $('#024y').val();
		}
		
		if (tmp_024.length > 0) {
			$("#024").val($("#024i1").val() + $("#024i2").val() + tmp_024);
			$("#l-024").html($("#024i1").val() + $("#024i2").val() + tmp_024);
		} else {
			$("#024").val('');
			$("#l-024").html('&nbsp;');
		}
	});
	
	$("#024y").bind('keyup change', function(event) {
		var tmp_024 = "";

		if ($('#024a').val().length > 0) {
			tmp_024 = tmp_024 + '^a' + $('#024a').val();
		}

		if ($('#024y').val().length > 0) {
			tmp_024 = tmp_024 + '^y' + $('#024y').val();
		}
		
		if (tmp_024.length > 0) {
			$("#024").val($("#024i1").val() + $("#024i2").val() + tmp_024);
			$("#l-024").html($("#024i1").val() + $("#024i2").val() + tmp_024);
		} else {
			$("#024").val('');
			$("#l-024").html('&nbsp;');
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
	
	$("#031a").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});

$("#031b").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031c").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031d").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031e").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031g").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031m").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031n").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031o").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031p").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});

	$("#031q").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031r").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031s").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});

	$("#031t").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031u").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031y").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	$("#031z").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	$("#0312").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	$("#0316").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	$("#0318").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
	
		if ($('#031y').val().length > 0) {
			tmp_031 = tmp_031 + '^y' + $('#031y').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if ($('#0312').val().length > 0) {
			tmp_031 = tmp_031 + '^2' + $('#0312').val();
		}
		if ($('#0316').val().length > 0) {
			tmp_031 = tmp_031 + '^6' + $('#0316').val();
		}
		if ($('#0318').val().length > 0) {
			tmp_031 = tmp_031 + '^8' + $('#0318').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
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
	
	$("#047a").bind('keyup change', function(event) {
		var tmp_047 = "";

		if ($('#047a').val().length > 0) {
			tmp_047 = tmp_047 + '^a' + $('#047a').val();
		}

		if ($('#047a').val().length > 0) {
			$("#047").val('##' + '^a' + $('#047a').val());
			$("#l-047").html('##' + '^a' + $('#047a').val());
		} else {
			$("#047").val('');
			$("#l-047").html('&nbsp;');
		}
	});

	
	$("#048i1").bind('keyup change', function(event) {
		var tmp_048 = "";

		if ($('#048a').val().length > 0) {
			tmp_048 = tmp_048 + '^a' + $('#048a').val();
		}
		if ($('#048b').val().length > 0) {
			tmp_048 = tmp_048 + '^b' + $('#048b').val();
		}
		if (tmp_048.length > 0) {
			$("#048").val($("#048i1").val() + $("#048i2").val() + tmp_048);
			$("#l-048").html($("#048i1").val() + $("#048i2").val() + tmp_048);
		} else {
			$("#048").val('');
			$("#l-048").html('&nbsp;');
		}
	});
	$("#048i2").bind('keyup change', function(event) {
		var tmp_048 = "";

		if ($('#048a').val().length > 0) {
			tmp_048 = tmp_048 + '^a' + $('#048a').val();
		}
		if ($('#048b').val().length > 0) {
			tmp_048 = tmp_048 + '^b' + $('#048b').val();
		}
		if (tmp_048.length > 0) {
			$("#048").val($("#048i1").val() + $("#048i2").val() + tmp_048);
			$("#l-048").html($("#048i1").val() + $("#048i2").val() + tmp_048);
		} else {
			$("#048").val('');
			$("#l-048").html('&nbsp;');
		}
	});
	$("#048a").bind('keyup change', function(event) {
		var tmp_048 = "";

		if ($('#048a').val().length > 0) {
			tmp_048 = tmp_048 + '^a' + $('#048a').val();
		}
		if ($('#048b').val().length > 0) {
			tmp_048 = tmp_048 + '^b' + $('#048b').val();
		}
		if (tmp_048.length > 0) {
			$("#048").val($("#048i1").val() + $("#048i2").val() + tmp_048);
			$("#l-048").html($("#048i1").val() + $("#048i2").val() + tmp_048);
		} else {
			$("#048").val('');
			$("#l-048").html('&nbsp;');
		}
	});
	$("#048b").bind('keyup change', function(event) {
		var tmp_048 = "";

		if ($('#048a').val().length > 0) {
			tmp_048 = tmp_048 + '^a' + $('#048a').val();
		}
		if ($('#048b').val().length > 0) {
			tmp_048 = tmp_048 + '^b' + $('#048b').val();
		}
		if (tmp_048.length > 0) {
			$("#048").val($("#048i1").val() + $("#048i2").val() + tmp_048);
			$("#l-048").html($("#048i1").val() + $("#048i2").val() + tmp_048);
		} else {
			$("#048").val('');
			$("#l-048").html('&nbsp;');
		}
	});
	
	$("#049a").bind('keyup change', function(event) {
		var tmp_049 = "";

		if ($('#049a').val().length > 0) {
			tmp_049 = tmp_049 + '^a' + $('#049a').val();
		}
		if ($('#049b').val().length > 0) {
			tmp_049 = tmp_049 + '^b' + $('#049b').val();
		}
		if (tmp_049.length > 0) {
			$("#049").val('##' + tmp_049);
			$("#l-049").html('##' + tmp_049);
		} else {
			$("#049").val('');
		}	
	});

	$("#049b").bind('keyup change', function(event) {
		var tmp_049 = "";

		if ($('#049a').val().length > 0) {
			tmp_049 = tmp_049 + '^a' + $('#049a').val();
		}
		if ($('#049b').val().length > 0) {
			tmp_049 = tmp_049 + '^b' + $('#049b').val();
		}
		if (tmp_049.length > 0) {
			$("#049").val('##' + tmp_049);
			$("#l-049").html('##' + tmp_049);
		} else {
			$("#049").val('');
			$("#l-049").html('&nbsp;');
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
	
	$("#099a").bind('keyup change', function(event) {
		var tmp_099 = "";

		if ($('#099a').val().length > 0) {
			tmp_099 = tmp_099 + '^a' + $('#099a').val();
		}

		if ($('#099b').val().length > 0) {
			tmp_099 = tmp_099 + '^b' + $('#099b').val();
		}
		
		if (tmp_099.length > 0) {
			$("#099").val('##' + tmp_099);
			$("#l-099").html('##' + tmp_099);
		} else {
			$("#099").val('');
			$("#l-099").html('&nbsp;');
		}
	});
		$("#099b").bind('keyup change', function(event) {
		var tmp_099 = "";

		if ($('#099a').val().length > 0) {
			tmp_099 = tmp_099 + '^a' + $('#099a').val();
		}

		if ($('#099b').val().length > 0) {
			tmp_099 = tmp_099 + '^b' + $('#099b').val();
		}
		
		if (tmp_099.length > 0) {
			$("#099").val('##' + tmp_099);
			$("#l-099").html('##' + tmp_099);
		} else {
			$("#099").val('');
			$("#l-099").html('&nbsp;');
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
	
	$("#254a").bind('keyup change', function(event) {
		var tmp_254 = "";

		if ($('#254a').val().length > 0) {
			tmp_254 = tmp_254 + '^a' + $('#254a').val();
		}

		if ($('#254b').val().length > 0) {
			tmp_254 = tmp_254 + '^b' + $('#254b').val();
		}
		
		if (tmp_254.length > 0) {
			$("#254").val('##' + tmp_254);
			$("#l-254").html('##' + tmp_254);
		} else {
			$("#254").val('');
			$("#l-254").html('&nbsp;');
		}
	});
	
	$("#254b").bind('keyup change', function(event) {
		var tmp_254 = "";

		if ($('#254a').val().length > 0) {
			tmp_254 = tmp_254 + '^a' + $('#254a').val();
		}

		if ($('#254b').val().length > 0) {
			tmp_254 = tmp_254 + '^b' + $('#254b').val();
		}
		
		if (tmp_254.length > 0) {
			$("#254").val('##' + tmp_254);
			$("#l-254").html('##' + tmp_254);
		} else {
			$("#254").val('');
			$("#l-254").html('&nbsp;');
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
	
	$("#306a").bind('keyup change', function(event) {
		var tmp_306 = "";

		if ($('#306a').val().length > 0) {
			tmp_306 = tmp_306 + '^a' + $('#306a').val();
		}

		if ($('#306b').val().length > 0) {
			tmp_306= tmp_306 + '^b' + $('#306b').val();
		}
		
		if (tmp_306.length > 0) {
			$("#306").val('##' + tmp_306);
			$("#l-306").html('##' + tmp_306);
		} else {
			$("#306").val('');
			$("#l-306").html('&nbsp;');
		}
	});
	
	$("#306b").bind('keyup change', function(event) {
		var tmp_306 = "";

		if ($('#306a').val().length > 0) {
			tmp_306 = tmp_306 + '^a' + $('#306a').val();
		}

		if ($('#306b').val().length > 0) {
			tmp_306= tmp_306 + '^b' + $('#306b').val();
		}
		
		if (tmp_306.length > 0) {
			$("#306").val('##' + tmp_306);
			$("#l-306").html('##' + tmp_306);
		} else {
			$("#306").val('');
			$("#l-306").html('&nbsp;');
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

	
	$("#383a").bind('keyup change', function(event) {
		var tmp_383 = "";

		if ($('#383a').val().length > 0) {
			tmp_383 = tmp_383 + '^a' + $('#383a').val();
		}
		if ($('#383b').val().length > 0) {
			tmp_383 = tmp_383 + '^b' + $('#383b').val();
		}
		if ($('#383c').val().length > 0) {
			tmp_383 = tmp_383 + '^c' + $('#383c').val();
		}
		if ($('#383d').val().length > 0) {
			tmp_383 = tmp_383 + '^d' + $('#383d').val();
		}
		if ($('#383e').val().length > 0) {
			tmp_383 = tmp_383 + '^e' + $('#383e').val();
		}
		if (tmp_383.length > 0) {
			$("#383").val('##' + tmp_383);
			$("#l-383").html('##' + tmp_383);
		} else {
			$("#383").val('');
			$("#l-383").html('&nbsp;');
		}
	});
	
	$("#383b").bind('keyup change', function(event) {
		var tmp_383 = "";

		if ($('#383a').val().length > 0) {
			tmp_383 = tmp_383 + '^a' + $('#383a').val();
		}
		if ($('#383b').val().length > 0) {
			tmp_383 = tmp_383 + '^b' + $('#383b').val();
		}
		if ($('#383c').val().length > 0) {
			tmp_383 = tmp_383 + '^c' + $('#383c').val();
		}
		if ($('#383d').val().length > 0) {
			tmp_383 = tmp_383 + '^d' + $('#383d').val();
		}
		if ($('#383e').val().length > 0) {
			tmp_383 = tmp_383 + '^e' + $('#383e').val();
		}
		if (tmp_383.length > 0) {
			$("#383").val('##' + tmp_383);
			$("#l-383").html('##' + tmp_383);
		} else {
			$("#383").val('');
			$("#l-383").html('&nbsp;');
		}
	});
	$("#383c").bind('keyup change', function(event) {
		var tmp_383 = "";

		if ($('#383a').val().length > 0) {
			tmp_383 = tmp_383 + '^a' + $('#383a').val();
		}
		if ($('#383b').val().length > 0) {
			tmp_383 = tmp_383 + '^b' + $('#383b').val();
		}
		if ($('#383c').val().length > 0) {
			tmp_383 = tmp_383 + '^c' + $('#383c').val();
		}
		if ($('#383d').val().length > 0) {
			tmp_383 = tmp_383 + '^d' + $('#383d').val();
		}
		if ($('#383e').val().length > 0) {
			tmp_383 = tmp_383 + '^e' + $('#383e').val();
		}
		if (tmp_383.length > 0) {
			$("#383").val('##' + tmp_383);
			$("#l-383").html('##' + tmp_383);
		} else {
			$("#383").val('');
			$("#l-383").html('&nbsp;');
		}
	});
	$("#380a").bind('keyup change', function(event) {
		var tmp_380 = "";

		if ($('#380a').val().length > 0) {
			tmp_380 = tmp_380 + '^a' + $('#380a').val();
		}
		if ($('#3800').val().length > 0) {
			tmp_380 = tmp_380 + '^0' + $('#3800').val();
		}
		if ($('#3802').val().length > 0) {
			tmp_380 = tmp_380 + '^2' + $('#3802').val();
		}
		if ($('#3806').val().length > 0) {
			tmp_380 = tmp_380 + '^6' + $('#3806').val();
		}
		if ($('#3808').val().length > 0) {
			tmp_380 = tmp_380 + '^8' + $('#3808').val();
		}
		if (tmp_380.length > 0) {
			$("#380").val('##' + tmp_380);
			$("#l-380").html('##' + tmp_380);
		} else {
			$("#380").val('');
			$("#l-380").html('&nbsp;');
		}
	});
	$("#3800").bind('keyup change', function(event) {
		var tmp_380 = "";

		if ($('#380a').val().length > 0) {
			tmp_380 = tmp_380 + '^a' + $('#380a').val();
		}
		if ($('#3800').val().length > 0) {
			tmp_380 = tmp_380 + '^0' + $('#3800').val();
		}
		if ($('#3802').val().length > 0) {
			tmp_380 = tmp_380 + '^2' + $('#3802').val();
		}
		if ($('#3806').val().length > 0) {
			tmp_380 = tmp_380 + '^6' + $('#3806').val();
		}
		if ($('#3808').val().length > 0) {
			tmp_380 = tmp_380 + '^8' + $('#3808').val();
		}
		if (tmp_380.length > 0) {
			$("#380").val('##' + tmp_380);
			$("#l-380").html('##' + tmp_380);
		} else {
			$("#380").val('');
			$("#l-380").html('&nbsp;');
		}
	});
	$("#3802").bind('keyup change', function(event) {
		var tmp_380 = "";

		if ($('#380a').val().length > 0) {
			tmp_380 = tmp_380 + '^a' + $('#380a').val();
		}
		if ($('#3800').val().length > 0) {
			tmp_380 = tmp_380 + '^0' + $('#3800').val();
		}
		if ($('#3802').val().length > 0) {
			tmp_380 = tmp_380 + '^2' + $('#3802').val();
		}
		if ($('#3806').val().length > 0) {
			tmp_380 = tmp_380 + '^6' + $('#3806').val();
		}
		if ($('#3808').val().length > 0) {
			tmp_380 = tmp_380 + '^8' + $('#3808').val();
		}
		if (tmp_380.length > 0) {
			$("#380").val('##' + tmp_380);
			$("#l-380").html('##' + tmp_380);
		} else {
			$("#380").val('');
			$("#l-380").html('&nbsp;');
		}
	});
	$("#3806").bind('keyup change', function(event) {
		var tmp_380 = "";

		if ($('#380a').val().length > 0) {
			tmp_380 = tmp_380 + '^a' + $('#380a').val();
		}
		if ($('#3800').val().length > 0) {
			tmp_380 = tmp_380 + '^0' + $('#3800').val();
		}
		if ($('#3802').val().length > 0) {
			tmp_380 = tmp_380 + '^2' + $('#3802').val();
		}
		if ($('#3806').val().length > 0) {
			tmp_380 = tmp_380 + '^6' + $('#3806').val();
		}
		if ($('#3808').val().length > 0) {
			tmp_380 = tmp_380 + '^8' + $('#3808').val();
		}
		if (tmp_380.length > 0) {
			$("#380").val('##' + tmp_380);
			$("#l-380").html('##' + tmp_380);
		} else {
			$("#380").val('');
			$("#l-380").html('&nbsp;');
		}
	});
	$("#3808").bind('keyup change', function(event) {
		var tmp_380 = "";

		if ($('#380a').val().length > 0) {
			tmp_380 = tmp_380 + '^a' + $('#380a').val();
		}
		if ($('#3800').val().length > 0) {
			tmp_380 = tmp_380 + '^0' + $('#3800').val();
		}
		if ($('#3802').val().length > 0) {
			tmp_380 = tmp_380 + '^2' + $('#3802').val();
		}
		if ($('#3806').val().length > 0) {
			tmp_380 = tmp_380 + '^6' + $('#3806').val();
		}
		if ($('#3808').val().length > 0) {
			tmp_380 = tmp_380 + '^8' + $('#3808').val();
		}
		if (tmp_380.length > 0) {
			$("#380").val('##' + tmp_380);
			$("#l-380").html('##' + tmp_380);
		} else {
			$("#380").val('');
			$("#l-380").html('&nbsp;');
		}
	});
	
	$("#381a").bind('keyup change', function(event) {
		var tmp_381 = "";

		if ($('#381a').val().length > 0) {
			tmp_381 = tmp_381 + '^a' + $('#381a').val();
		}
		if (tmp_381.length > 0) {
			$("#381").val('##' + tmp_381);
			$("#l-381").html('##' + tmp_381);
		} else {
			$("#381").val('');
			$("#l-381").html('&nbsp;');
		}
	});
	
	$("#382a").bind('keyup change', function(event) {
		var tmp_382 = "";

		if ($('#382a').val().length > 0) {
			tmp_382 = tmp_382 + '^a' + $('#382a').val();
		}
		if (tmp_382.length > 0) {
			$("#382").val('##' + tmp_382);
			$("#l-382").html('##' + tmp_382);
		} else {
			$("#382").val('');
			$("#l-382").html('&nbsp;');
		}
	});
	
	$("#383d").bind('keyup change', function(event) {
		var tmp_383 = "";

		if ($('#383a').val().length > 0) {
			tmp_383 = tmp_383 + '^a' + $('#383a').val();
		}
		if ($('#383b').val().length > 0) {
			tmp_383 = tmp_383 + '^b' + $('#383b').val();
		}
		if ($('#383c').val().length > 0) {
			tmp_383 = tmp_383 + '^c' + $('#383c').val();
		}
		if ($('#383d').val().length > 0) {
			tmp_383 = tmp_383 + '^d' + $('#383d').val();
		}
		if ($('#383e').val().length > 0) {
			tmp_383 = tmp_383 + '^e' + $('#383e').val();
		}
		if (tmp_383.length > 0) {
			$("#383").val('##' + tmp_383);
			$("#l-383").html('##' + tmp_383);
		} else {
			$("#383").val('');
			$("#l-383").html('&nbsp;');
		}
	});
	$("#383e").bind('keyup change', function(event) {
		var tmp_383 = "";

		if ($('#383a').val().length > 0) {
			tmp_383 = tmp_383 + '^a' + $('#383a').val();
		}
		if ($('#383b').val().length > 0) {
			tmp_383 = tmp_383 + '^b' + $('#383b').val();
		}
		if ($('#383c').val().length > 0) {
			tmp_383 = tmp_383 + '^c' + $('#383c').val();
		}
		if ($('#383d').val().length > 0) {
			tmp_383 = tmp_383 + '^d' + $('#383d').val();
		}
		if ($('#383e').val().length > 0) {
			tmp_383 = tmp_383 + '^e' + $('#383e').val();
		}
		if (tmp_383.length > 0) {
			$("#383").val('##' + tmp_383);
			$("#l-383").html('##' + tmp_383);
		} else {
			$("#383").val('');
			$("#l-383").html('&nbsp;');
		}
	});
	
	$("#490a").bind('keyup change', function(event) {
		var tmp_490 = "";

		if ($('#490a').val().length > 0) {
			tmp_490 = tmp_490 + '^a' + $('#490a').val();
		}
		if ($('#490v').val().length > 0) {
			tmp_490 = tmp_490 + '^v' + $('#490v').val();
		}
		if (tmp_490.length > 0) {
			$("#490").val('##' + tmp_490);
			$("#l-490").html('##' + tmp_490);
		} else {
			$("#490").val('');
			$("#l-490").html('&nbsp;');
		}
	});
	
	$("#384a").bind('keyup change', function(event) {
		var tmp_384 = "";

		if ($('#384a').val().length > 0) {
			tmp_384 = tmp_384 + '^a' + $('#384a').val();
		}
		if (tmp_384.length > 0) {
			$("#384").val($("#384i1").val() + $("#384i2").val() + tmp_384);
			$("#l-384").html($("#384i1").val() + $("#384i2").val() + tmp_384);
		} else {
			$("#384").val('');
			$("#l-384").html('&nbsp;');
		}
	});
	
	$("#490v").bind('keyup change', function(event) {
		var tmp_490= "";

		if ($('#490a').val().length > 0) {
			tmp_490 = tmp_490 + '^a' + $('#490a').val();
		}
		if ($('#490v').val().length > 0) {
			tmp_490 = tmp_490 + '^v' + $('#490v').val();
		}
		if (tmp_490.length > 0) {
			$("#490").val('##' + tmp_490);
			$("#l-490").html('##' + tmp_490);
		} else {
			$("#490").val('');
			$("#l-490").html('&nbsp;');
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
			$("#505").val($("#505i1").val() + $("#i2").val() + tmp_505);
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
$("#508a").bind('keyup change', function(event) {
		var tmp_508 = "";

		if ($('#508a').val().length > 0) {
			tmp_508 = tmp_508 + '^a' + $('#508a').val();
		}
		
		if (tmp_508.length > 0) {
			$("#508").val('##' + tmp_508);
			$("#l-508").html('##' + tmp_508);
		} else {
			$("#508").val('');
			$("#l-508").html('&nbsp;');
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

	$("#518a").bind('keyup change', function(event) {
		var tmp_518 = "";

		if ($('#518a').val().length > 0) {
			tmp_518 = tmp_518 + '^a' + $('#518a').val();
		}
		
		if (tmp_518.length > 0) {
			$("#518").val('##' + tmp_518);
			$("#l-518").html('##' + tmp_518);
		} else {
			$("#518").val('');
			$("#l-518").html('&nbsp;');
		}
	});

	$("#520i1").change(function(event) {
		var tmp_520 = "";

		if ($('#520a').val().length > 0) {
			tmp_520 = tmp_520 + '^a' + $('#520a').val();
		}
		if ($('#520b').val().length > 0) {
			tmp_520 = tmp_520 + '^b' + $('#520b').val();
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
		if ($('#520b').val().length > 0) {
			tmp_520 = tmp_520 + '^b' + $('#520b').val();
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
		if ($('#520b').val().length > 0) {
			tmp_520 = tmp_520 + '^b' + $('#520b').val();
		}
		if (tmp_520.length > 0) {
			$("#520").val($("#520i1").val() + $("#520i2").val() + tmp_520);
			$("#l-520").html($("#520i1").val() + $("#520i2").val() + tmp_520);
		} else {
			$("#520").val('');
			$("#l-520").html('&nbsp;');
		}
	});
	$("#520b").bind('keyup change', function(event) {
		var tmp_520 = "";

		if ($('#520a').val().length > 0) {
			tmp_520 = tmp_520 + '^a' + $('#520a').val();
		}
		if ($('#520b').val().length > 0) {
			tmp_520 = tmp_520 + '^b' + $('#520b').val();
		}
		if (tmp_520.length > 0) {
			$("#520").val($("#520i1").val() + $("#520i2").val() + tmp_520);
			$("#l-520").html($("#520i1").val() + $("#520i2").val() + tmp_520);
		} else {
			$("#520").val('');
			$("#l-520").html('&nbsp;');
		}
	});
	
	$("#521a").bind('keyup change', function(event) {
		var tmp_521 = "";

		if ($('#521a').val().length > 0) {
			tmp_521 = tmp_521 + '^a' + $('#521a').val();
		}
		if (tmp_521.length > 0) {
			$("#521").val('##' + tmp_521);
			$("#l-521").html('##' + tmp_521);
		} else {
			$("#521").val('');
			$("#l-521").html('&nbsp;');
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
	
	$("#545i1").change(function(event) {
		var tmp_545 = "";

		if ($('#545a').val().length > 0) {
			tmp_545 = tmp_545 + '^a' + $('#545a').val();
		}
		if (tmp_545.length > 0) {
			$("#545").val($("#545i1").val() + $("#545i2").val() + tmp_545);
			$("#l-545").html($("#545i1").val() + $("#545i2").val() + tmp_545);
		} else {
			$("#545").val('');
			$("#l-545").html('&nbsp;');
		}
	});

	$("#545i2").change(function(event) {
		var tmp_545 = "";

		if ($('#545a').val().length > 0) {
			tmp_545 = tmp_545 + '^a' + $('#545a').val();
		}
		if (tmp_545.length > 0) {
			$("#545").val($("#545i1").val() + $("#545i2").val() + tmp_545);
			$("#l-545").html($("#545i1").val() + $("#545i2").val() + tmp_545);
		} else {
			$("#545").val('');
			$("#l-545").html('&nbsp;');
		}
	});

	$("#545a").bind('keyup change', function(event) {
		var tmp_545 = "";

		if ($('#545a').val().length > 0) {
			tmp_545 = tmp_545 + '^a' + $('#545a').val();
		}
		if (tmp_545.length > 0) {
			$("#545").val($("#545i1").val() + $("#545i2").val() + tmp_545);
			$("#l-545").html($("#545i1").val() + $("#545i2").val() + tmp_545);
		} else {
			$("#545").val('');
			$("#l-545").html('&nbsp;');
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
	
	$("#561a").bind('keyup change', function(event) {
		var tmp_561 = "";

		if ($('#561a').val().length > 0) {
			tmp_561 = tmp_561 + '^a' + $('#561a').val();
		}
		
		if (tmp_561.length > 0) {
			$("#561").val('##' + tmp_561);
			$("#l-561").html('##' + tmp_561);
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
	
	$("#590a").bind('keyup change', function(event) {
		var tmp_590 = "";

		if ($('#590a').val().length > 0) {
			tmp_590 = tmp_590 + '^a' + $('#590a').val();
		}
		
		if (tmp_590.length > 0) {
			$("#590").val('##' + tmp_590);
			$("#l-590").html('##' + tmp_590);
		} else {
			$("#590").val('');
			$("#l-590").html('&nbsp;');
		}
	});
	$("#592a").bind('keyup change', function(event) {
		var tmp_592 = "";

		if ($('#592a').val().length > 0) {
			tmp_592 = tmp_592 + '^a' + $('#592a').val();
		}
		if (tmp_592.length > 0) {
			$("#592").val('##' + tmp_592);
			$("#l-592").html('##' + tmp_592);
		} else {
			$("#592").val('');
			$("#l-592").html('&nbsp;');
		}
	});

	$("#593a").bind('keyup change', function(event) {
		var tmp_593 = "";

		if ($('#593a').val().length > 0) {
			tmp_593 = tmp_593 + '^a' + $('#593a').val();
		}
		if (tmp_593.length > 0) {
			$("#593").val('##' + tmp_593);
			$("#l-593").html('##' + tmp_593);
		} else {
			$("#593").val('');
			$("#l-593").html('&nbsp;');
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
	
	$("#648a").bind('keyup change', function(event) {
		var tmp_648 = "";

		if ($('#648a').val().length > 0) {
			tmp_648 = tmp_648 + '^a' + $('#648a').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val('##' + tmp_648);
			$("#l-648").html('##' + tmp_648);
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


		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
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

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
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

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
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

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
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

		$("#800i1").change(function(event) {
		var tmp_800 = "";

		if ($('#800a').val().length > 0) {
			tmp_800 = tmp_800 + '^a' + $('#800a').val();
		}

		if ($('#800d').val().length > 0) {
			tmp_800 = tmp_800 + '^d' + $('#800d').val();
		}

		if ($('#800t').val().length > 0) {
			tmp_800 = tmp_800 + '^t' + $('#800t').val();
		}

		if (tmp_800.length > 0) {
			$("#800").val($("#800i1").val() + $("#800i2").val() + tmp_800);
			$("#l-800").html($("#800i1").val() + $("#800i2").val() + tmp_800);
		} else {
			$("#800").val('');
			$("#l-800").html('&nbsp;');
		}
	});

	$("#800i2").change(function(event) {
		var tmp_800 = "";

		if ($('#800a').val().length > 0) {
			tmp_800 = tmp_800 + '^a' + $('#800a').val();
		}

		if ($('#800d').val().length > 0) {
			tmp_800 = tmp_800 + '^d' + $('#800d').val();
		}

		if ($('#800t').val().length > 0) {
			tmp_800 = tmp_800 + '^t' + $('#800t').val();
		}

		if (tmp_800.length > 0) {
			$("#800").val($("#800i1").val() + $("#800i2").val() + tmp_800);
			$("#l-800").html($("#800i1").val() + $("#800i2").val() + tmp_800);
		} else {
			$("#800").val('');
			$("#l-800").html('&nbsp;');
		}
	});

	$("#800a").bind('keyup change', function(event) {
		var tmp_800 = "";

		if ($('#800a').val().length > 0) {
			tmp_800 = tmp_800 + '^a' + $('#800a').val();
		}

		if ($('#800d').val().length > 0) {
			tmp_800 = tmp_800 + '^d' + $('#800d').val();
		}

		if ($('#800t').val().length > 0) {
			tmp_800 = tmp_800 + '^t' + $('#800t').val();
		}

		if (tmp_800.length > 0) {
			$("#800").val($("#800i1").val() + $("#800i2").val() + tmp_800);
			$("#l-800").html($("#800i1").val() + $("#800i2").val() + tmp_800);
		} else {
			$("#800").val('');
			$("#l-800").html('&nbsp;');
		}
	});
	
		$("#800d").bind('keyup change', function(event) {
		var tmp_800 = "";

		if ($('#800a').val().length > 0) {
			tmp_800 = tmp_800 + '^a' + $('#800a').val();
		}

		if ($('#800d').val().length > 0) {
			tmp_800 = tmp_800 + '^d' + $('#800d').val();
		}

		if ($('#800t').val().length > 0) {
			tmp_800 = tmp_800 + '^t' + $('#800t').val();
		}

		if (tmp_800.length > 0) {
			$("#800").val($("#800i1").val() + $("#800i2").val() + tmp_800);
			$("#l-800").html($("#800i1").val() + $("#800i2").val() + tmp_800);
		} else {
			$("#800").val('');
			$("#l-800").html('&nbsp;');
		}
	});
	
		$("#800t").bind('keyup change', function(event) {
		var tmp_800 = "";

		if ($('#800a').val().length > 0) {
			tmp_800 = tmp_800 + '^a' + $('#800a').val();
		}

		if ($('#800d').val().length > 0) {
			tmp_800 = tmp_800 + '^d' + $('#800d').val();
		}

		if ($('#800t').val().length > 0) {
			tmp_800 = tmp_800 + '^t' + $('#800t').val();
		}

		if (tmp_800.length > 0) {
			$("#800").val($("#800i1").val() + $("#800i2").val() + tmp_800);
			$("#l-800").html($("#800i1").val() + $("#800i2").val() + tmp_800);
		} else {
			$("#800").val('');
			$("#l-800").html('&nbsp;');
		}
	});

	$("#810i1").change(function(event) {
		var tmp_810 = "";

		if ($('#810a').val().length > 0) {
			tmp_810 = tmp_810 + '^a' + $('#810a').val();
		}

		if ($('#810b').val().length > 0) {
			tmp_810 = tmp_810 + '^b' + $('#810b').val();
		}
		if (tmp_810.length > 0) {
			$("#810").val($("#810i1").val() + $("#810i2").val() + tmp_810);
			$("#l-810").html($("#810i1").val() + $("#810i2").val() + tmp_810);
		} else {
			$("#810").val('');
			$("#l-810").html('&nbsp;');
		}
	});

	$("#810i2").change(function(event) {
		var tmp_810 = "";

		if ($('#810a').val().length > 0) {
			tmp_810 = tmp_810 + '^a' + $('#810a').val();
		}

		if ($('#810b').val().length > 0) {
			tmp_810 = tmp_810 + '^b' + $('#810b').val();
		}
		if (tmp_810.length > 0) {
			$("#810").val($("#810i1").val() + $("#810i2").val() + tmp_810);
			$("#l-810").html($("#810i1").val() + $("#810i2").val() + tmp_810);
		} else {
			$("#810").val('');
			$("#l-810").html('&nbsp;');
		}
	});

	$("#810a").bind('keyup change', function(event) {
		var tmp_810 = "";

		if ($('#810a').val().length > 0) {
			tmp_810 = tmp_810 + '^a' + $('#810a').val();
		}

		if ($('#810b').val().length > 0) {
			tmp_810 = tmp_810 + '^b' + $('#810b').val();
		}

		if (tmp_810.length > 0) {
			$("#810").val($("#810i1").val() + $("#810i2").val() + tmp_810);
			$("#l-810").html($("#810i1").val() + $("#810i2").val() + tmp_810);
		} else {
			$("#810").val('');
			$("#l-810").html('&nbsp;');
		}
	});
	
		$("#810b").bind('keyup change', function(event) {
		var tmp_810 = "";

		if ($('#810a').val().length > 0) {
			tmp_810 = tmp_810 + '^a' + $('#810a').val();
		}

		if ($('#810b').val().length > 0) {
			tmp_810 = tmp_810 + '^b' + $('#810b').val();
		}

		if (tmp_810.length > 0) {
			$("#810").val($("#810i1").val() + $("#810i2").val() + tmp_810);
			$("#l-810").html($("#810i1").val() + $("#810i2").val() + tmp_810);
		} else {
			$("#810").val('');
			$("#l-810").html('&nbsp;');
		}
	});

		$("#811i1").change(function(event) {
		var tmp_811 = "";

		if ($('#811a').val().length > 0) {
			tmp_811 = tmp_811 + '^a' + $('#811a').val();
		}

		if ($('#811d').val().length > 0) {
			tmp_811 = tmp_811 + '^d' + $('#811d').val();
		}
		if (tmp_811.length > 0) {
			$("#811").val($("#811i1").val() + $("#811i2").val() + tmp_811);
			$("#l-811").html($("#811i1").val() + $("#811i2").val() + tmp_811);
		} else {
			$("#811").val('');
			$("#l-811").html('&nbsp;');
		}
	});

	$("#811i2").change(function(event) {
		var tmp_811 = "";

		if ($('#811a').val().length > 0) {
			tmp_811 = tmp_811 + '^a' + $('#811a').val();
		}

		if ($('#811d').val().length > 0) {
			tmp_811 = tmp_811 + '^d' + $('#811d').val();
		}
		if (tmp_811.length > 0) {
			$("#811").val($("#811i1").val() + $("#811i2").val() + tmp_811);
			$("#l-811").html($("#811i1").val() + $("#811i2").val() + tmp_811);
		} else {
			$("#811").val('');
			$("#l-811").html('&nbsp;');
		}
	});

	$("#811a").bind('keyup change', function(event) {
		var tmp_811 = "";

		if ($('#811a').val().length > 0) {
			tmp_811 = tmp_811 + '^a' + $('#811a').val();
		}

		if ($('#811d').val().length > 0) {
			tmp_811 = tmp_811 + '^d' + $('#811d').val();
		}

		if (tmp_811.length > 0) {
			$("#811").val($("#811i1").val() + $("#811i2").val() + tmp_811);
			$("#l-811").html($("#811i1").val() + $("#811i2").val() + tmp_811);
		} else {
			$("#811").val('');
			$("#l-811").html('&nbsp;');
		}
	});
	
		$("#811d").bind('keyup change', function(event) {
		var tmp_811 = "";

		if ($('#811a').val().length > 0) {
			tmp_811 = tmp_811 + '^a' + $('#811a').val();
		}

		if ($('#811d').val().length > 0) {
			tmp_811 = tmp_811 + '^d' + $('#811d').val();
		}

		if (tmp_811.length > 0) {
			$("#811").val($("#811i1").val() + $("#811i2").val() + tmp_811);
			$("#l-811").html($("#811i1").val() + $("#811i2").val() + tmp_811);
		} else {
			$("#811").val('');
			$("#l-811").html('&nbsp;');
		}
	});
	

	//-------------- Validaciones ---------------//
	
	// Campos obligatorios vacíos.
	$('#ManuscriptAddForm').submit(function(event) {
		/*if ($('#031d').val() == ""){
			alert("EL campo 'Voz o instrumento' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t0xx').parent().addClass('active');
			$('#0xx').show();
			$('#031d').focus();
			return false;
		}
		if ($('#031g').val() == ""){
			alert("EL campo 'Tonalidad o modo' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t0xx').parent().addClass('active');
			$('#0xx').show();
			$('#031g').focus();
			return false;
		}*/
		/*if ($('#031t').val() == ""){
			alert("EL campo 'Íncipit literario' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t0xx').parent().addClass('active');
			$('#0xx').show();
			$('#031t').focus();
			return false;
		}
		*/
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

		if ($('#031r').val() == "" && $('#031p').val() != ""){
			alert("EL campo 'Tonalidad o modo' no puede estar vacío si hay un íncipit presente.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t0xx').parent().addClass('active');
			$('#0xx').show();
			$('#031r').focus();
			return false;
		}


		/*if ($('#260a').val() == ""){
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
		}*/
	
	/*	if ($('#650a').val() == ""){
			alert("EL campo 'Materia.' No puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t6xx').parent().addClass('active');
			$('#6xx').show();
			$('#650a').focus();
			return false;
		}*/

		/*if ($('#653a').val() == ""){
			alert("EL campo 'Término de indización – No controlado' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t6xx').parent().addClass('active');
			$('#6xx').show();
			$('#653a').focus();
			return false;

		}*/
		/*	if ($('#700a').val() == ""){
			alert("EL campo 'Nombre de persona' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t7xx').parent().addClass('active');
			$('#7xx').show();
			$('#700a').focus();
			return false;

		}*/
		if ($('#ManuscriptCover').val() == ""){
			alert("Debe seleccionar una portada para la obra.");
			$('#ItemItem').focus();
			return false;
		}

		if ($('#ManuscriptItem').val() == ""){
			alert("Debe seleccionar el archivo o documento de la obra.");
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