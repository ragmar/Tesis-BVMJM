<?php
//debug($this->Session->read('Search'));
echo $this->Html->script('zoomooz/jquery.zoomooz-helpers');
echo $this->Html->script('zoomooz/jquery.zoomooz-anim');
echo $this->Html->script('zoomooz/jquery.zoomooz-core');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomTarget');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomContainer');
echo $this->Html->script('zoomooz/purecssmatrix');
echo $this->Html->script('zoomooz/sylvester.src.stripped');
//echo $this->Html->css('website-assets/website');

$centuries = array(
	'18' => 'XIIX',
	'19' => 'XIX',
	'20' => 'XX',
	'21' => 'XXI',
	'22' => 'XXII'
);

//debug($this->data);
//debug($this->passedArgs);
//debug($this->Session->read());

if (!empty($this->data)) { // Si viene de una búsqueda.
	$busqueda = 1;
	if (true) {
		
	}
} else {
	$busqueda = 0;
}

?>
<ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>/books">Libros</a> <span class="divider">/</span></li>
  <?php if (!isset($this->passedArgs[0])) { ?>
  <li>T&iacute;tulo<span class="divider">/</span></li>
  <?php } else { ?>
  <li><a href="<?php echo $this->base; ?>/books/title">T&iacute;tulo</a><span class="divider">/</span></li>
  <li class="active"><?php echo $this->passedArgs[0]; ?></li>
  <?php } ?>
</ul>

<div align="center" style="padding-top: 5px; color: #828793; font-size: 18px; background: -webkit-linear-gradient(#d0d6e2, #ffffff); background: -moz-linear-gradient(#d0d6e2, #ffffff); background: -o-linear-gradient(#d0d6e2, #ffffff);"><strong>Módulo de Libros</strong></div>

<div style="padding-left: 50px; padding-right: 50px;">

<div style="height: 46px; border-bottom-style: inset; border-bottom-color: #BBBBBB;">
<br />
<table style="font-size: smaller; width: 75%;">
	<tr>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><strong><a href="<?php echo $this->base; ?>/books">Presentación</a></strong></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/books/century">Siglo</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/books/author">Autor</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s2.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/books/title">Título</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/books/year">Año</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/books/matter">Materia</a></td>
	</tr>
</table>
</div>

<div class='century view' style="text-align: center;">
<!-- 
	<?php echo $this->Form->create('Magazine', array('action' => 'index'));?>
		<?php
		if ($this->Session->check('Search.Item.title')) {
			echo $this->Form->input('title', array('label' => 'Titulo de la Obra', 'style' => 'width: 65%', 'value' => $this->Session->read('Search.Item.title')));
		} else {
			echo $this->Form->input('title', array('label' => 'Titulo de la Obra', 'style' => 'width: 65%'));
		}
		?>

		<?php echo $this->Form->button(__('Buscar', true), array('type' => 'submit', 'class' => "btn btn-primary")); ?>&nbsp;
		<?php //echo $this->Form->button(__('Restaurar', true), array('type' => 'reset', 'class' => "btn btn-primary")); ?>
 	
	<div id="searchForm" <?php if (!isset($this->data)){ echo "style='display: none;'";} ?>>
	<br />

		<div style="float: left; width: 100%">
			<div style="float: left; width: 50%; text-align: right;">
				<?php
				if ($this->Session->check('Search.Item.author_id')) {
					echo $this->Form->input('author_id', array('div' => false, 'empty' => __('Author', true), 'label' => false, 'selected' => $this->Session->read('Search.Item.author_id')));
				} else {
					echo $this->Form->input('author_id', array('div' => false, 'empty' => __('Author', true), 'label' => false));
				}
				?>
				&nbsp;
			</div>
			<div style="float: left; width: 50%; text-align: left;">
				&nbsp;
				<?php
					if ($this->Session->check('Search.Item.type_id')) {
						echo $this->Form->input('type_id', array('div' => false, 'empty' => __('Type', true), 'label' => false, 'selected' => $this->Session->read('Search.Item.type_id')));
					} else {
						echo $this->Form->input('type_id', array('div' => false, 'empty' => __('Type', true), 'label' => false));
					}
				?>
			</div>
			<div style="float: left; width: 50%; text-align: right;">
				<?php
				if ($this->Session->read('Search.Item.topic_id')) {
					echo $this->Form->input('topic_id', array('div' => false, 'empty' => __('Topic', true), 'label' => false, 'selected' => $this->Session->read('Search.Item.topic_id')));
				} else {
					echo $this->Form->input('topic_id', array('div' => false, 'empty' => __('Topic', true), 'label' => false));
				}
				?>
				&nbsp;
			</div>
			<div style="float: left; width: 50%; text-align: left;">
				&nbsp;
				<?php
				if ($this->Session->check('Search:item.year')) {
					echo $this->Form->year('year', 1700, date('Y'), null, array('div' => false, 'label' => false, 'empty' => __('Year', true), 'value' => $this->Session->read('Search:item.year')));
				} else {
					echo $this->Form->year('year', 1700, date('Y'), null, array('div' => false, 'label' => false, 'empty' => __('Year', true)));
				}
				?>
			</div>
		</div>
		<br /><br /><br /><br />
	<?php echo $this->Form->end();?>
	</div>
	
	<div id="searchForm" style="border-top: 1px solid #ccc; text-align: right;">
		<label style="background: #cccccc; cursor: pointer; color: brown; width: 200px; float: right; text-align: center;" onclick="$('#searchForm').slideToggle('slow');"><b>B&uacute;squeda Avanzada</b></label>	
	</div>
	-->
	
	<!-- <h2><?php __('Obras');?></h2> -->
	<table>
	<tr>
		<th><?php __('Cover');?></th>
		<th><?php __('Details of the work');?></th>
	</tr>
	<?php foreach ($items as $item): ?>
	<?php
		switch ($item['Type']['id']){
			case 1:
				$color = "#9dae8a";
				$controller = "books";
				break;
			case 2:
				$color = "#b3bbce";
				$controller = "books";
				break;
			case 3:
				$color = "#aea16c";
				$controller = "";
				break;
			case 4:
				$color = "#d5b59e";
				$controller = "";
				break;
			case 5:
				$color = "#ba938e";
				$controller = "";
				break;
			case 6:
				$color = "#d1c7be";
				$controller = "";
				break;
			default:
				$color = "white";
				$controller = "";
				break;
		}
	?>
	<tr>
		<td class="zoomTarget" data-closeclick="true" style="text-align: center; width: 80px;" title="<?php echo $item['Type']['name'] . ': ' . $item['Item']['title']; ?>">
		<?php //if ($item['Item']['cover']) echo $this->Html->image("/webroot/files/covers/" . $item['Item']['cover_path'], array('width' => '70px', 'class' => 'img-polaroid')); ?>
		<?php if (!empty($item['ItemsPicture'])) {?>
			<?php echo $this->Html->image("/webroot/attachments/files/big/" . $item['ItemsPicture'][0]['picture_file_path'], array('class' => 'thumbnail', 'width' => '70px', 'class' => 'img-polaroid zoomTarget', 'data-closeclick' => 'true')); ?>
		<?php } else { ?>
			<?php echo $this->Html->image("/webroot/attachments/files/big/portada_nodisponible.jpg", array('class' => 'thumbnail', 'width' => '70px')); ?>
		<?php } ?>
		</td>
		<td>
			<dl class="dl-horizontal">
				<dt style="width: 120px"><?php __('Title:');?></dt>
				<dd style="margin-left: 130px"><?php echo $this->Html->link($item['Item']['title'].'.', array('action' => 'view', $item['Item']['id'])); ?></dd>
				<dt style="width: 120px"><?php __('Author:');?></dt>
				<dd style="margin-left: 130px"><?php echo $this->Html->link($item['Author']['fullname'].'.', array('controller' => 'authors', 'action' => 'view', $item['Author']['id'])); ?></dd>
				<dt style="width: 120px"><?php __('Topic:');?></dt>
				<dd style="margin-left: 130px"><?php echo $this->Html->link($item['Topic']['name'].'.', array('controller' => 'topics', 'action' => 'view', $item['Topic']['id']), array('title' => $item['Topic']['description'])); ?></dd>
				<!-- <dt style="width: 120px"><?php __('Type:');?></dt>
				<dd style="margin-left: 80px"><?php echo $this->Html->link($item['Type']['name'].'.', array('controller' => 'types', 'action' => 'view', $item['Type']['id'])); ?></dd> -->
				<!-- <dd style="margin-left: 130px"><?php echo $this->Html->link($item['Type']['name'].'.', array('controller' => $controller, 'action' => 'index')); ?></dd> -->
				<dt style="width: 120px"><?php __('Año / Siglo:');?></dt>
				<dd style="margin-left: 130px">
					<?php
						if ($item['Item']['year']) {
							echo $item['Item']['year'] . " / ";

							if (substr($item['Item']['year'], 2, 2) != "00"){
								//echo $this->Html->link((substr($item['Item']['year'], 0, 2) + 1), array('action' => 'view', $item['Item']['year']));
								echo $centuries[substr($item['Item']['year'], 0, 2) + 1];
							} else {
								//echo $this->Html->link((substr($item['Item']['year'], 0, 2)), array('action' => 'view', $item['Item']['year']));
								echo $centuries[substr($item['Item']['year'], 0, 2)];
							}
						}
					?>
				</dd>
				<dt style="width: 120px">
				<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') != '3'))) { ?>
					<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $item['Item']['id']), null, sprintf(__("¿Desea eliminar '%s'?", true), $item['Item']['title'])); ?>
				<?php } ?>
				</dt>
				<dd style="margin-left: 130px"></dd>
				<!--
				<dt style="width: 120px"><?php __('Century:');?></dt>
				<dd style="margin-left: 130px">
					<?php if ($item['Item']['year']) {
						// Cálculo de siglo de acuerdo al año.
						if (substr($item['Item']['year'], 2, 2) != "00"){
							//echo $this->Html->link((substr($item['Item']['year'], 0, 2) + 1), array('action' => 'view', $item['Item']['year']));
							echo $centuries[substr($item['Item']['year'], 0, 2) + 1];
						} else {
							//echo $this->Html->link((substr($item['Item']['year'], 0, 2)), array('action' => 'view', $item['Item']['year']));
							echo $centuries[substr($item['Item']['year'], 0, 2)];
						}
					} ?>
				</dd>-->
			</dl>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	
	<!-- <p align="center">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p> -->

	<?php if ($this->Paginator->params['paging']['Item']['pageCount'] > 1) { ?>
	<div class="pagination" align="center">
		<ul>
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
		</ul>
	</div><br />
	<?php } ?>
</div>
<?php //if (($this->Session->check('Auth.User')) && ($this->Session->read('Auth.User.group_id') != 3)) { ?>
<div class="actions">
	<br />
	<ul>
		<li><label><?php __('Revistas que comienzan por:'); ?></label></li>
		<li style="float: left;"><?php echo $this->Html->link(__('A', true), array('action' => 'title/A'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('B', true), array('action' => 'title/B'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('C', true), array('action' => 'title/C'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('D', true), array('action' => 'title/D'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('E', true), array('action' => 'title/E'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('F', true), array('action' => 'title/F'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('G', true), array('action' => 'title/G'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('H', true), array('action' => 'title/H'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('I', true), array('action' => 'title/I'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('J', true), array('action' => 'title/J'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('K', true), array('action' => 'title/K'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('L', true), array('action' => 'title/L'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('M', true), array('action' => 'title/M'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('N', true), array('action' => 'title/N'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('O', true), array('action' => 'title/O'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('P', true), array('action' => 'title/P'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('Q', true), array('action' => 'title/Q'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('R', true), array('action' => 'title/R'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('S', true), array('action' => 'title/S'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('T', true), array('action' => 'title/T'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('U', true), array('action' => 'title/U'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('V', true), array('action' => 'title/V'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('W', true), array('action' => 'title/W'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('X', true), array('action' => 'title/X'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('Y', true), array('action' => 'title/Y'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('Z', true), array('action' => 'title/Z'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('0-9', true), array('action' => 'title/0-9'), array('style' => 'width: 20px')); ?></li>
	
		<!--
		<li><?php echo $this->Html->link(__('Configuration', true), array('controller' => 'configurations')); ?></li>
		<li><?php echo $this->Html->link(__('New Item', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors', true), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author', true), array('controller' => 'authors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types', true), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type', true), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics', true), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic', true), array('controller' => 'topics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Values', true), array('controller' => 'values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Value', true), array('controller' => 'values', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicators', true), array('controller' => 'indicators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicator', true), array('controller' => 'indicators', 'action' => 'add')); ?> </li>
		-->
	</ul>
	<br />
	<div style="text-align: center;"><?php echo $this->Html->image('ts/logo_meseron_1.jpg'); ?></div>
	<br />
</div>
<?php //} ?>
<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>