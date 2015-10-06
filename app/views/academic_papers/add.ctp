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
<ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>">Inicio</a></li>
  <li><a href="<?php echo $this->base; ?>/academic_papers">Trabajos Acad&eacute;micos</a></li>
  <li>Agregar Trabajo </li>
</ul>

<div class="items">
<div class="col-md-12 column">
<h2>Agregar Trabajo Acad&eacute;mico</h2>

<?php echo $this->Form->create('AcademicPaper', array('enctype' => 'multipart/form-data')); ?>

<h5>Datos de Cabecera o Líder</h5>

<table class="table">
	<tr>
		<th><label>Estado del Registro.</label></th>
		<td>
		<?php
			echo $this->Form->input('h-005', array('label' => false, 'class' => 'form-control',
				'options' => array(
// 					'a' => 'a - Aumentado el nivel de codificación.', 
// 					'c' => 'c - Corregido o revisado.',
// 					'd' => 'd - Suprimido.',
					'n' => 'n - Nuevo.',
// 					'p' => 'p - Aumentado el nivel de codificación utilizado antes de la publicación.'
					),
				'selected' => 'n',
// 				'empty' => 'Seleccione'
			));?>
		</td>
	</tr>
	<tr>
		<th><label>Tipo de Registro.</label></th>
		<td>
		<?php
		echo $this->Form->input('h-006', array('label' => false, 'class' => 'form-control',
			'options' => array(
// 				'a' => 'a - Material textual.',
// 				'c' => 'c - Música notada impresa.',
// 				'd' => 'd - Música notada manuscrita.',
// 				'e' => 'e - Material cartográfico.',
// 				'f' => 'f - Material cartográfico manuscrito.',
// 				'g' => 'g - Material gráfico proyectable.',
// 				'i' => 'i - Grabación sonora no musical.',
// 				'j' => 'j - Grabación sonora musical.',
// 				'k' => 'k - Material gráfico bidimensional, no proyectable.',
// 				'm' => 'm - Archivo de ordenador.',
// 				'o' => 'o - Kit.',
// 				'p' => 'p - Material mixto.',
// 				'r' => 'r - Objeto tridimensional artificial o natural.',
				't' => 't - Material textual manuscrito.'
				),
			'selected' => 't'/*,
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
// 				'a' => 'a - Parte componente monográfica.',
// 				'b' => 'b - Parte componente seriada.',
// 				'c' => 'c - Colección.',
// 				'd' => 'd - Subunidad.',
// 				'i' => 'i - Recurso integrable.',
				'm' => 'm - Monografía.',
// 				's' => 's - Publicación seriada.'
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
// 				'#' => '# - Nivel completo.',
// 				'1' => '1 - Nivel completo, material no examinado.',
// 				'2' => '2 - Nivel incompleto, material no examinado.',
// 				'3' => '3 - Nivel abreviado.',
// 				'4' => '4 - Nivel básico.',
// 				'5' => '5 - Nivel parcial (preliminar).',
				'7' => '7 - Nivel mínimo.',
// 				'8' => '8 - Nivel de prepublicación.',
// 				'u' => 'u - Desconocido.',
// 				'z' => 'z - No aplicable.'
			),
			'selected' => '7',
// 			'empty' => 'Seleccione'
		));?>
		</td>
	</tr>
	<tr>
		<th><label>Forma de Catalogación Descriptiva.</label></th>
		<td>
		<?php
		echo $this->Form->input('h-018', array('label' => false, 'class' => 'form-control',
			'options' => array(
// 				'#' => '# - No es ISBD.',
				'a' => 'a - AACR 2.',
// 				'c' => 'c - ISBD sin puntuación.',
// 				'i' => 'i - ISBD con puntuación.',
// 				'u' => 'u - Desconocida.'
			),
			'selected' => 'a',
// 			'empty' => 'Seleccione'
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
			<label id="l-008"><?php echo date('ymd', time()); ?></label>
			<?php echo $this->Form->hidden('008', array('id' => '008', 'label' => false, 'div' => false, 'value' => date('ymd', time()))); ?>
		</th>
	</tr>
	<tr>
		<td><b>008 [06]</b></td>
		<td>Tipo de fecha/estado de la publicación.</td>
		<td><?php echo $this->Form->input('008-06', array('id' => '008-06', 'label' => false, 'class' => 'form-control', 'div' => false, 
			'options' => array(
// 				'b' => 'b - No consta información; implica fechas A.C.',
// 				'c' => 'c - Recurso continuado con publicación en curso',
// 				'd' => 'd - Publicación cerrada',
// 				'e' => 'e - Fecha detallada',
// 				'i' => 'i - Fechas comprendidas en una colección',
// 				'k' => 'k - Rango de años del grueso de la colección',
// 				'm' => 'm - Fechas múltiples',
// 				'n' => 'n - Fecha desconocida',
// 				'p' => 'p - Fechas de distribución/estreno/edición y de sesión de producción/grabación cuando difiere',
// 				'q' => 'q - Fecha dudosa',
// 				'r' => 'r - Fechas de la reimpresión/reedición y del original',
				's' => 's - Fecha única conocida/probable',
// 				't' => 't - Fechas de publicación y de copyright',
// 				'u' => 'u - Estado desconocido',
// 				'|' => '| - No se utiliza'
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
		)); ?></td>
	</tr>
	<tr>
		<td><b>008 [24-27]</b></td>
		<td>Naturaleza del contenido.</td>
		<td><?php echo $this->Form->input('008-24-27', array('id' => '008-24-27', 'label' => false, 'class' => 'form-control', 'div' => false, 
			'options' => array(
// 				'#' => '# - No se especifica la naturaleza del contenido',
// 				'a' => 'a - Resúmenes/sumarios',
				'b' => 'b - Bibliografías',
// 				'c' => 'c - Catálogos',
// 				'd' => 'd - Diccionarios',
// 				'e' => 'e - Enciclopedias',
// 				'f' => 'f - Manuales',
// 				'g' => 'g - Artículos sobre temas legales',
// 				'i' => 'i - Índices',
// 				'j' => 'j - Documentos de patente',
// 				'k' => 'k - Discografías',
// 				'l' => 'l - Legislación',
				'm' => 'm - Tesis',
// 				'n' => 'n - Estado de la cuestión en una materia',
// 				'o' => 'o - Reseñas',
			)
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
			), 'default' => 'und'
		)); ?></td>
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
		<td><?php echo $this->Form->input('041a', array('id' => '041a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
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
		<td><?php echo $this->Form->input('044a', array('id' => '044a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
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

</div>

<div id="2xx" class="tabs" style="display: none;">

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
		<th style="width: 10%;"><b>260</b></th>
		<th style="width: 45%;"><b>Publicación, distribución, etc. (pie de imprenta).</b></th>
		<th style="width: 45%;">
			<label id="l-260">&nbsp;</label>
			<?php echo $this->Form->hidden('260', array('id' => '260', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Lugar de publicación, distribución, etc <font color="red">(Obligatorio)</font>.</td>
		<td><?php echo $this->Form->input('260a', array('id' => '260a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Nombre del editor, distribuidor, etc <font color="red">(Obligatorio)</font>.</td>
		<td><?php echo $this->Form->input('260b', array('id' => '260b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Fecha de publicación, distribución, etc <font color="red">(Obligatorio)</font>.</td>
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
		<th style="width: 10%;"><b>502</b></th>
		<th style="width: 45%;"><b>Nota de tesis.</b></th>
		<th style="width: 45%;">
			<label id="l-502">&nbsp;</label>
			<?php echo $this->Form->hidden('502', array('id' => '502', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de tesis.</td>
		<td><?php echo $this->Form->input('502a', array('id' => '502a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Tipo de título.</td>
		<td><?php echo $this->Form->input('502b', array('id' => '502b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Nombre de la institución.</td>
		<td><?php echo $this->Form->input('502c', array('id' => '502c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Año del título.</td>
		<td><?php echo $this->Form->input('502d', array('id' => '502d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>504</b></th>
		<th style="width: 45%;"><b>Nota de bibliografía, etc.</b></th>
		<th style="width: 45%;">
			<label id="l-504">&nbsp;</label>
			<?php echo $this->Form->hidden('504', array('id' => '504', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de bibliografía, etc.</td>
		<td><?php echo $this->Form->input('504a', array('id' => '504a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
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
			), 'selected' => '2'
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
		<th style="width: 45%;"><b>Asiento secundario de materia – T&eacute;rmino cronol&oacute;gico.</b></th>
		<th style="width: 45%;">
			<label id="l-648">&nbsp;</label>
			<?php echo $this->Form->hidden('648', array('id' => '648', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>#</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('648i1', array('id' => '648i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No definido',
			)
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
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Término cronológico.
		<td><?php echo $this->Form->input('648a', array('id' => '648a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Subdivisión de forma.</td>
		<td><?php echo $this->Form->input('648v', array('id' => '648v', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Subdivisión general.</td>
		<td><?php echo $this->Form->input('648x', array('id' => '648x', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Subdivisión cronológica.</td>
		<td><?php echo $this->Form->input('648y', array('id' => '648y', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Subdivisión geográfica.</td>
		<td><?php echo $this->Form->input('648z', array('id' => '648z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$0</b></td>
		<td>Número de control de registro de autoridad.</td>
		<td><?php echo $this->Form->input('6480', array('id' => '6480', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$2</b></td>
		<td>Fuente del encabezamientoo término.</td>
		<td><?php echo $this->Form->input('6482', array('id' => '6482', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$3</b></td>
		<td>Materiales específicos de los cuales se aplica el campo.</td>
		<td><?php echo $this->Form->input('6483', array('id' => '6483', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$6</b></td>
		<td>Enlace.</td>
		<td><?php echo $this->Form->input('6486', array('id' => '6486', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$8</b></td>
		<td>Vínculo de campo y número de secuencia.</td>
		<td><?php echo $this->Form->input('6488', array('id' => '6488', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
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
		<td>Materia <font color="red">(Obligatorio).</td>
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
		<td>Palabra clave <font color="red">(Obligatorio)</font>.</td>
		<td><?php echo $this->Form->input('653a', array('id' => '653a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>


</div>

<div id="7xx" class="tabs" style="display: none;">
<table class="table">
	<tr>
		<th style="width: 10%;"><b>700</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional - Nombre personal.</b></th>
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
</div>

<div id="8xx" class="tabs" style="display: none;">
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
		<td><b>$b</b></td>
		<td>Sublocalización o colección.</td>
		<td><?php echo $this->Form->input('852b', array('id' => '852b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Ubicación en estantería.</td>
		<td><?php echo $this->Form->input('852c', array('id' => '852c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$h</b></td>
		<td>Parte de la signatura que corresponde a la clasificación.</td>
		<td><?php echo $this->Form->input('852h', array('id' => '852h', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$i</b></td>
		<td>Parte de la signatura que identifica al ejemplar.</td>
		<td><?php echo $this->Form->input('852i', array('id' => '852i', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$j</b></td>
		<td>Número de control en estantería.</td>
		<td><?php echo $this->Form->input('852j', array('id' => '852j', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$k</b></td>
		<td>Prefijo de la signatura.</td>
		<td><?php echo $this->Form->input('852k', array('id' => '852k', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$m</b></td>
		<td>Sufijo de la signatura.</td>
		<td><?php echo $this->Form->input('852m', array('id' => '852m', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
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
			<th style="width: 50%;">Portada de la obra (formato JPG o GIF).</th>
			<th style="width: 50%;">Archivo o Documento (formato PDF). (Obligatorio).</th>
		</tr>
		<tr>
			<td><?php echo $this->Form->input('cover', array('label' => false, 'type' => 'file', 'style' => 'width: 100%')); ?></td>
			<td><?php echo $this->Form->input('item', array('label' => false, 'type' => 'file', 'style' => 'width: 100%')); ?></td>
		</tr>
	</table>
	
	<input type="checkbox" id="AcademicPaperPublished" value="1" checked="checked" name="data[AcademicPaper][published]" style="width: 30px;">Publicado

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

		if (id.localeCompare("t4xx") && id.localeCompare("t9xx")) {
			$(".tabs").hide();
			$('.active').removeClass('active');
			$(this).parent().addClass('active');
		}

		if (id == "t0xx"){ $('#0xx').show(); }
		if (id == "t1xx"){ $('#1xx').show(); }
		if (id == "t2xx"){ $('#2xx').show(); }
		if (id == "t3xx"){ $('#3xx').show(); }
// 		if (id == "t4xx"){ $('#4xx').show(); }
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

	if ($('#008-24-27').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-24-27').val();
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

		if ($('#008-24-27').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-24-27').val();
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

		if ($('#008-24-27').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-24-27').val();
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

		if ($('#008-24-27').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-24-27').val();
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

		if ($('#008-24-27').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-24-27').val();
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

		if ($('#008-24-27').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-24-27').val();
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

		if ($('#008-24-27').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-24-27').val();
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

	$("#008-24-27").change(function(event) {
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

		if ($('#008-24-27').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-24-27').val();
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

		if ($('#008-24-27').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-24-27').val();
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

	$("#502a").bind('keyup change', function(event) {
		var tmp_502 = "";

		if ($('#502a').val().length > 0) {
			tmp_502 = tmp_502 + '^a' + $('#502a').val();
		}

		if ($('#502b').val().length > 0) {
			tmp_502 = tmp_502 + '^b' + $('#502b').val();
		}

		if ($('#502c').val().length > 0) {
			tmp_502 = tmp_502 + '^c' + $('#502c').val();
		}

		if ($('#502d').val().length > 0) {
			tmp_502 = tmp_502 + '^d' + $('#502d').val();
		}

		if (tmp_502.length > 0) {
			$("#502").val('##' + tmp_502);
			$("#l-502").html('##' + tmp_502);
		} else {
			$("#502").val('');
			$("#l-502").html('&nbsp;');
		}
	});

	$("#502b").bind('keyup change', function(event) {
		var tmp_502 = "";

		if ($('#502a').val().length > 0) {
			tmp_502 = tmp_502 + '^a' + $('#502a').val();
		}

		if ($('#502b').val().length > 0) {
			tmp_502 = tmp_502 + '^b' + $('#502b').val();
		}

		if ($('#502c').val().length > 0) {
			tmp_502 = tmp_502 + '^c' + $('#502c').val();
		}

		if ($('#502d').val().length > 0) {
			tmp_502 = tmp_502 + '^d' + $('#502d').val();
		}
		
		if (tmp_502.length > 0) {
			$("#502").val('##' + tmp_502);
			$("#l-502").html('##' + tmp_502);
		} else {
			$("#502").val('');
			$("#l-502").html('&nbsp;');
		}
	});

	$("#502c").bind('keyup change', function(event) {
		var tmp_502 = "";

		if ($('#502a').val().length > 0) {
			tmp_502 = tmp_502 + '^a' + $('#502a').val();
		}

		if ($('#502b').val().length > 0) {
			tmp_502 = tmp_502 + '^b' + $('#502b').val();
		}

		if ($('#502c').val().length > 0) {
			tmp_502 = tmp_502 + '^c' + $('#502c').val();
		}

		if ($('#502d').val().length > 0) {
			tmp_502 = tmp_502 + '^d' + $('#502d').val();
		}
		
		if (tmp_502.length > 0) {
			$("#502").val('##' + tmp_502);
			$("#l-502").html('##' + tmp_502);
		} else {
			$("#502").val('');
			$("#l-502").html('&nbsp;');
		}
	});

	$("#502d").bind('keyup change', function(event) {
		var tmp_502 = "";

		if ($('#502a').val().length > 0) {
			tmp_502 = tmp_502 + '^a' + $('#502a').val();
		}

		if ($('#502b').val().length > 0) {
			tmp_502 = tmp_502 + '^b' + $('#502b').val();
		}

		if ($('#502c').val().length > 0) {
			tmp_502 = tmp_502 + '^c' + $('#502c').val();
		}

		if ($('#502d').val().length > 0) {
			tmp_502 = tmp_502 + '^d' + $('#502d').val();
		}
		
		if (tmp_502.length > 0) {
			$("#502").val('##' + tmp_502);
			$("#l-502").html('##' + tmp_502);
		} else {
			$("#502").val('');
			$("#l-502").html('&nbsp;');
		}
	});

	$("#504a").bind('keyup change', function(event) {
		var tmp_504 = "";

		if ($('#504a').val().length > 0) {
			tmp_504 = tmp_504 + '^a' + $('#504a').val();
		}

		if (tmp_504.length > 0) {
			$("#504").val('##' + tmp_504);
			$("#l-504").html('##' + tmp_504);
		} else {
			$("#504").val('');
			$("#l-504").html('&nbsp;');
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
	/*Campo 648*/

	$("#648i1").change(function(event) {
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

		if ($('#6480').val().length > 0) {
			tmp_648 = tmp_648 + '^0' + $('#6480').val();
		}
		if ($('#6482').val().length > 0) {
			tmp_648 = tmp_648 + '^2' + $('#6482').val();
		}

		if ($('#6483').val().length > 0) {
			tmp_648 = tmp_648 + '^3' + $('#6483').val();
		}

		if ($('#6486').val().length > 0) {
			tmp_648 = tmp_648 + '^6' + $('#6486').val();
		}

		if ($('#6488').val().length > 0) {
			tmp_648 = tmp_648 + '^8' + $('#6488').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val($("#648i1").val() + $("#648i2").val() + tmp_648);
			$("#l-648").html($("#648i1").val() + $("#648i2").val() + tmp_648);
		} else {
			$("#648").val('');
			$("#l-648").html('&nbsp;');
		}
	});

	$("#648i2").change(function(event) {
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

		if ($('#6480').val().length > 0) {
			tmp_648 = tmp_648 + '^0' + $('#6480').val();
		}
		if ($('#6482').val().length > 0) {
			tmp_648 = tmp_648 + '^2' + $('#6482').val();
		}

		if ($('#6483').val().length > 0) {
			tmp_648 = tmp_648 + '^3' + $('#6483').val();
		}

		if ($('#6486').val().length > 0) {
			tmp_648 = tmp_648 + '^6' + $('#6486').val();
		}

		if ($('#6488').val().length > 0) {
			tmp_648 = tmp_648 + '^8' + $('#6488').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val($("#648i1").val() + $("#648i2").val() + tmp_648);
			$("#l-648").html($("#648i1").val() + $("#648i2").val() + tmp_648);
		} else {
			$("#648").val('');
			$("#l-648").html('&nbsp;');
		}
	});

	$("#648a").bind('keyup change', function(event) {
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

		if ($('#6480').val().length > 0) {
			tmp_648 = tmp_648 + '^0' + $('#6480').val();
		}
		if ($('#6482').val().length > 0) {
			tmp_648 = tmp_648 + '^2' + $('#6482').val();
		}

		if ($('#6483').val().length > 0) {
			tmp_648 = tmp_648 + '^3' + $('#6483').val();
		}

		if ($('#6486').val().length > 0) {
			tmp_648 = tmp_648 + '^6' + $('#6486').val();
		}

		if ($('#6488').val().length > 0) {
			tmp_648 = tmp_648 + '^8' + $('#6488').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val($("#648i1").val() + $("#648i2").val() + tmp_648);
			$("#l-648").html($("#648i1").val() + $("#648i2").val() + tmp_648);
		} else {
			$("#648").val('');
			$("#l-648").html('&nbsp;');
		}
	});
	
	$("#648a").bind('keyup change', function(event) {
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

		if ($('#6480').val().length > 0) {
			tmp_648 = tmp_648 + '^0' + $('#6480').val();
		}
		if ($('#6482').val().length > 0) {
			tmp_648 = tmp_648 + '^2' + $('#6482').val();
		}

		if ($('#6483').val().length > 0) {
			tmp_648 = tmp_648 + '^3' + $('#6483').val();
		}

		if ($('#6486').val().length > 0) {
			tmp_648 = tmp_648 + '^6' + $('#6486').val();
		}

		if ($('#6488').val().length > 0) {
			tmp_648 = tmp_648 + '^8' + $('#6488').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val($("#648i1").val() + $("#648i2").val() + tmp_648);
			$("#l-648").html($("#648i1").val() + $("#648i2").val() + tmp_648);
		} else {
			$("#648").val('');
			$("#l-648").html('&nbsp;');
		}
	});

	$("#648v").bind('keyup change', function(event) {
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

		if ($('#6480').val().length > 0) {
			tmp_648 = tmp_648 + '^0' + $('#6480').val();
		}
		if ($('#6482').val().length > 0) {
			tmp_648 = tmp_648 + '^2' + $('#6482').val();
		}

		if ($('#6483').val().length > 0) {
			tmp_648 = tmp_648 + '^3' + $('#6483').val();
		}

		if ($('#6486').val().length > 0) {
			tmp_648 = tmp_648 + '^6' + $('#6486').val();
		}

		if ($('#6488').val().length > 0) {
			tmp_648 = tmp_648 + '^8' + $('#6488').val();
		}
	});

	$("#648x").bind('keyup change', function(event) {
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

		if ($('#6480').val().length > 0) {
			tmp_648 = tmp_648 + '^0' + $('#6480').val();
		}
		if ($('#6482').val().length > 0) {
			tmp_648 = tmp_648 + '^2' + $('#6482').val();
		}

		if ($('#6483').val().length > 0) {
			tmp_648 = tmp_648 + '^3' + $('#6483').val();
		}

		if ($('#6486').val().length > 0) {
			tmp_648 = tmp_648 + '^6' + $('#6486').val();
		}

		if ($('#6488').val().length > 0) {
			tmp_648 = tmp_648 + '^8' + $('#6488').val();
		}
	});

	$("#648y").bind('keyup change', function(event) {
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

		if ($('#6480').val().length > 0) {
			tmp_648 = tmp_648 + '^0' + $('#6480').val();
		}
		if ($('#6482').val().length > 0) {
			tmp_648 = tmp_648 + '^2' + $('#6482').val();
		}

		if ($('#6483').val().length > 0) {
			tmp_648 = tmp_648 + '^3' + $('#6483').val();
		}

		if ($('#6486').val().length > 0) {
			tmp_648 = tmp_648 + '^6' + $('#6486').val();
		}

		if ($('#6488').val().length > 0) {
			tmp_648 = tmp_648 + '^8' + $('#6488').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val($("#648i1").val() + $("#648i2").val() + tmp_648);
			$("#l-648").html($("#648i1").val() + $("#648i2").val() + tmp_648);
		} else {
			$("#648").val('');
			$("#l-648").html('&nbsp;');
		}

	});

	$("#648z").bind('keyup change', function(event) {
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

		if ($('#6480').val().length > 0) {
			tmp_648 = tmp_648 + '^0' + $('#6480').val();
		}
		if ($('#6482').val().length > 0) {
			tmp_648 = tmp_648 + '^2' + $('#6482').val();
		}

		if ($('#6483').val().length > 0) {
			tmp_648 = tmp_648 + '^3' + $('#6483').val();
		}

		if ($('#6486').val().length > 0) {
			tmp_648 = tmp_648 + '^6' + $('#6486').val();
		}

		if ($('#6488').val().length > 0) {
			tmp_648 = tmp_648 + '^8' + $('#6488').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val($("#648i1").val() + $("#648i2").val() + tmp_648);
			$("#l-648").html($("#648i1").val() + $("#648i2").val() + tmp_648);
		} else {
			$("#648").val('');
			$("#l-648").html('&nbsp;');
		}
	});

	$("#6480").bind('keyup change', function(event) {
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

		if ($('#6480').val().length > 0) {
			tmp_648 = tmp_648 + '^0' + $('#6480').val();
		}
		if ($('#6482').val().length > 0) {
			tmp_648 = tmp_648 + '^2' + $('#6482').val();
		}

		if ($('#6483').val().length > 0) {
			tmp_648 = tmp_648 + '^3' + $('#6483').val();
		}

		if ($('#6486').val().length > 0) {
			tmp_648 = tmp_648 + '^6' + $('#6486').val();
		}

		if ($('#6488').val().length > 0) {
			tmp_648 = tmp_648 + '^8' + $('#6488').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val($("#648i1").val() + $("#648i2").val() + tmp_648);
			$("#l-648").html($("#648i1").val() + $("#648i2").val() + tmp_648);
		} else {
			$("#648").val('');
			$("#l-648").html('&nbsp;');
		}
	});

	$("#6482").bind('keyup change', function(event) {
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

		if ($('#6480').val().length > 0) {
			tmp_648 = tmp_648 + '^0' + $('#6480').val();
		}
		if ($('#6482').val().length > 0) {
			tmp_648 = tmp_648 + '^2' + $('#6482').val();
		}

		if ($('#6483').val().length > 0) {
			tmp_648 = tmp_648 + '^3' + $('#6483').val();
		}

		if ($('#6486').val().length > 0) {
			tmp_648 = tmp_648 + '^6' + $('#6486').val();
		}

		if ($('#6488').val().length > 0) {
			tmp_648 = tmp_648 + '^8' + $('#6488').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val($("#648i1").val() + $("#648i2").val() + tmp_648);
			$("#l-648").html($("#648i1").val() + $("#648i2").val() + tmp_648);
		} else {
			$("#648").val('');
			$("#l-648").html('&nbsp;');
		}
	});

	$("#6483").bind('keyup change', function(event) {
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

		if ($('#6480').val().length > 0) {
			tmp_648 = tmp_648 + '^0' + $('#6480').val();
		}
		if ($('#6482').val().length > 0) {
			tmp_648 = tmp_648 + '^2' + $('#6482').val();
		}

		if ($('#6483').val().length > 0) {
			tmp_648 = tmp_648 + '^3' + $('#6483').val();
		}

		if ($('#6486').val().length > 0) {
			tmp_648 = tmp_648 + '^6' + $('#6486').val();
		}

		if ($('#6488').val().length > 0) {
			tmp_648 = tmp_648 + '^8' + $('#6488').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val($("#648i1").val() + $("#648i2").val() + tmp_648);
			$("#l-648").html($("#648i1").val() + $("#648i2").val() + tmp_648);
		} else {
			$("#648").val('');
			$("#l-648").html('&nbsp;');
		}
	});

	$("#6484").bind('keyup change', function(event) {
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

		if ($('#6480').val().length > 0) {
			tmp_648 = tmp_648 + '^0' + $('#6480').val();
		}
		if ($('#6482').val().length > 0) {
			tmp_648 = tmp_648 + '^2' + $('#6482').val();
		}

		if ($('#6483').val().length > 0) {
			tmp_648 = tmp_648 + '^3' + $('#6483').val();
		}

		if ($('#6486').val().length > 0) {
			tmp_648 = tmp_648 + '^6' + $('#6486').val();
		}

		if ($('#6488').val().length > 0) {
			tmp_648 = tmp_648 + '^$8' + $('#6488').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val($("#648i1").val() + $("#648i2").val() + tmp_648);
			$("#l-648").html($("#648i1").val() + $("#648i2").val() + tmp_648);
		} else {
			$("#648").val('');
			$("#l-648").html('&nbsp;');
		}
	});

	$("#6486").bind('keyup change', function(event) {
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

		if ($('#6480').val().length > 0) {
			tmp_648 = tmp_648 + '^0' + $('#6480').val();
		}
		if ($('#6482').val().length > 0) {
			tmp_648 = tmp_648 + '^2' + $('#6482').val();
		}

		if ($('#6483').val().length > 0) {
			tmp_648 = tmp_648 + '^3' + $('#6483').val();
		}

		if ($('#6486').val().length > 0) {
			tmp_648 = tmp_648 + '^6' + $('#6486').val();
		}

		if ($('#6488').val().length > 0) {
			tmp_648 = tmp_648 + '^8' + $('#6488').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val($("#648i1").val() + $("#648i2").val() + tmp_648);
			$("#l-648").html($("#648i1").val() + $("#648i2").val() + tmp_648);
		} else {
			$("#648").val('');
			$("#l-648").html('&nbsp;');
		}
	});

	$("#6488").bind('keyup change', function(event) {
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

		if ($('#6480').val().length > 0) {
			tmp_648 = tmp_648 + '^0' + $('#6480').val();
		}
		if ($('#6482').val().length > 0) {
			tmp_648 = tmp_648 + '^2' + $('#6482').val();
		}

		if ($('#6483').val().length > 0) {
			tmp_648 = tmp_648 + '^3' + $('#6483').val();
		}

		if ($('#6486').val().length > 0) {
			tmp_648 = tmp_648 + '^6' + $('#6486').val();
		}

		if ($('#6488').val().length > 0) {
			tmp_648 = tmp_648 + '^8' + $('#6488').val();
		}
		
		if (tmp_648.length > 0) {
			$("#648").val($("#648i1").val() + $("#648i2").val() + tmp_648);
			$("#l-648").html($("#648i1").val() + $("#648i2").val() + tmp_648);
		} else {
			$("#648").val('');
			$("#l-648").html('&nbsp;');
		}
	});
	/* Campo 650*/

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
	$('#AcademicPaperAddForm').submit(function(event) {
// 		if ($('#041a').val() == ""){
// 			alert("EL campo 'Código de idioma' no puede estar vacío.");
// 			$(".tabs").hide();
// 			$('.active').removeClass('active');
// 			$('#t0xx').parent().addClass('active');
// 			$('#0xx').show();
// 			$('#041a').focus();
// 			return false;
// 		}

// 		if ($('#041b').val() == ""){
// 			alert("EL campo 'Código de idioma del sumario o resumen' no puede estar vacío.");
// 			$(".tabs").hide();
// 			$('.active').removeClass('active');
// 			$('#t0xx').parent().addClass('active');
// 			$('#0xx').show();
// 			$('#041b').focus();
// 			return false;
// 		}

// 		if ($('#041h').val() == ""){
// 			alert("EL campo 'Código de idioma original' no puede estar vacío.");
// 			$(".tabs").hide();
// 			$('.active').removeClass('active');
// 			$('#t0xx').parent().addClass('active');
// 			$('#0xx').show();
// 			$('#041h').focus();
// 			return false;
// 		}
		
		if ($('#100a').val() == ""){
			alert("El campo 'Nombre de persona' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t1xx').parent().addClass('active');
			$('#1xx').show();
			$('#100a').focus();
			return false;
		}

		if ($('#245a').val() == ""){
			alert("El campo 'Título' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t2xx').parent().addClass('active');
			$('#2xx').show();
			$('#245a').focus();
			return false;
		}

		if ($('#260a').val() == ""){
			alert("El campo 'Lugar de publicación, distribución, etc.' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t2xx').parent().addClass('active');
			$('#2xx').show();
			$('#260a').focus();
			return false;
		}

		if ($('#260b').val() == ""){
			alert("El campo 'Nombre del editor, distribuidor, etc.' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t2xx').parent().addClass('active');
			$('#2xx').show();
			$('#260b').focus();
			return false;
		}

		if ($('#260c').val() == ""){
			alert("El campo 'Fecha de publicación, distribución, etc.' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t2xx').parent().addClass('active');
			$('#2xx').show();
			$('#260c').focus();
			return false;
		}
		
		if ($('#650a').val() == ""){
			alert("El campo 'Materia.' No puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t6xx').parent().addClass('active');
			$('#6xx').show();
			$('#650a').focus();
			return false;
		}

		if ($('#653a').val() == ""){
			alert("El campo 'Término de indización – No controlado' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t6xx').parent().addClass('active');
			$('#6xx').show();
			$('#653a').focus();
			return false;

		}

// 		if ($('#AcademicPaperCover').val() == ""){
// 			alert("Debe seleccionar una portada para la obra.");
// 			$('#ItemItem').focus();
// 			return false;
// 		}

		if ($('#AcademicPaperItem').val() == ""){
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


</script>
<?php echo $this->Html->script('autocomplete/jquery.autocomplete.min'); ?>
<?php echo $this->Html->script('autocomplete/currency-autocomplete'); ?>
<script type="text/javascript">
$(document).ready(function() {
	// Ancho del autocompletar.
	$('.autocomplete-suggestions').css('width', '30%');
});
</script>