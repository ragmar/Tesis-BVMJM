<ul class="breadcrumb" style="margin: 0">
	<li><a href="<?php echo $this->base; ?>/magazines">Revistas</a> <span class="divider">/</span></li>
	<li>B&uacute;squeda Avanzada<span class="divider">/</span></li>
</ul>

<div align="center" style="padding-top: 5px; color: #828793; font-size: 18px; background: -webkit-linear-gradient(#d0d6e2, #ffffff); background: -moz-linear-gradient(#d0d6e2, #ffffff); background: -o-linear-gradient(#d0d6e2, #ffffff);"><strong>B&uacute;squeda Avanzada</strong></div>

<div class="items" style="text-align: center;">
<?php echo $this->Form->create('Magazine'); ?>
<fieldset>

<br />

	<div style="float: left; width: 100%">
		<div style="float: left; width: 50%; text-align: right;">
			<?php echo $this->Form->input('245', array('div' => false, 'label' => false, 'placeholder' => 'Título')); ?>
			&nbsp;
		</div>
		<div style="float: left; width: 50%; text-align: left;">
			&nbsp;
			<?php echo $this->Form->input('130', array('div' => false, 'label' => false, 'placeholder' => 'Autor')); ?>
		</div>
		
		<br /><br />
		
		<div style="float: left; width: 50%; text-align: right;">
			<?php echo $this->Form->input('260', array('div' => false, 'label' => false, 'placeholder' => 'Lugar, editor y/o fecha')); ?>
			&nbsp;
		</div>
		<div style="float: left; width: 50%; text-align: left;">
			&nbsp;
			<?php echo $this->Form->input('653', array('div' => false, 'label' => false, 'placeholder' => 'Materia')); ?>
		</div>
		
		<br /><br />
		
		<div style="float: left; width: 100%; text-align: center;">
			&nbsp;
			<?php echo $this->Form->input('690', array('div' => false, 'label' => false, 'placeholder' => 'Siglo')); ?>
		</div>
	</div>
	
	</fieldset>
<?php echo $this->Form->end(__('Search', true));?>
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

<div style="padding-left: 50px; padding-right: 50px;">

<div <?php if (($this->Session->check('Auth.User')) && ($this->Session->read('Auth.User.group_id') != 3)) {echo "class='items view'";} ?> style="text-align: center;">

	<table>
	<tr>
		<th><?php __('Portada');?></th>
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
		
		// Tipo revista.
		if (($t1 == 'a') && ($t2 == 's')) {
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
		<td style="background-color: <?php echo $color; ?>; text-align: center; width: 80px;">
		<?php
			if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/tesis/webroot/covers/" . $item['Item']['cover_path']))){
				echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('width' => '70px'));
			} else {
				echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('width' => '70px'));
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
								echo $this->Html->link($title['a'], 'view/'.$item['Item']['id'], array('title' => 'Haga click para ver los detalles.'));
								if (isset($title['b'])) {echo ' ' . $title['b'];}
								if (isset($title['c'])) {echo ' ' . $title['c'];}
								if (isset($title['h'])) {echo ' ' . $title['h'];}
							}
						}
					?>
				</dd>
				<dt style="width: 120px">
					<?php __('Author:');?>
				</dt>
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
				<dt style="width: 120px"><?php __('Publicación:');?></dt>
				<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['260'])) {
							$publication = marc21_decode($item['Item']['260']);
							echo $publication['a'];
							if (isset($publication['b'])) {echo ' ' . $publication['b'];}
							if (isset($publication['c'])) {echo ' ' . $publication['c'];}
						}
					
					?>
				</dd>
				<dt style="width: 120px"><?php __('Tipo:');?></dt>
				<dd style="margin-left: 130px">
				<?php
					$t1 = $item['Item']['h-006'];
					$t2 = $item['Item']['h-007'];
					
					// Tipo libro.
					if (($t1 == 'a') && ($t2 == 'm')) {
						echo "Libro";
					}
					
					// Tipo revista.
					if (($t1 == 'a') && ($t2 == 's')) {
						echo "Revista";
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

	<?php if ((isset($this->Paginator)) && ($this->Paginator->params['paging']['Item']['pageCount'] > 1)) { ?>
	<div class="pagination" align="center">
		<ul>
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
		</ul>
	</div><br />
	<?php } ?>
</div>
<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>