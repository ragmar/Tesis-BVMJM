<?php
// El zoom daña la revista.
/*echo $this->Html->script('zoomooz/jquery.zoomooz-helpers');
echo $this->Html->script('zoomooz/jquery.zoomooz-anim');
echo $this->Html->script('zoomooz/jquery.zoomooz-core');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomTarget');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomContainer');
echo $this->Html->script('zoomooz/purecssmatrix');
echo $this->Html->script('zoomooz/sylvester.src.stripped');
echo $this->Html->css('website-assets/website');*/
echo $this->Html->script('jquery.easing.1.3.js');
echo $this->Html->script('turn');
//echo $this->Html->script('wijmo/jquery.wijmo-open.all.2.2.1.min');
//echo $this->Html->script('wijmo/jquery.wijmo-complete.all.2.2.1.min');
//echo $this->Html->script('wijmo/jquery.wijmo.wijcarousel');
echo $this->Html->script('bootstrap/bootstrap-tab');
//echo $this->Html->script('pdfobject_source');
?>
<?php
	$centuries = array(
		'15' => 'XV', 
		'16' => 'XVI', 
		'17' => 'XVII', 
		'18' => 'XVIII', 
		'19' => 'XIX', 
		'20' => 'XX',
		'21' => 'XXI');
?>
<style type="text/css">
body{
	background:#ccc;
}
#magazine{
	width:800px;
	height:600px;
	margin-left: 70px;
}
#magazine .turn-page{
	background-color:#ccc;
	background-size:100% 100%;
}
</style>

<ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>/magazines">Revistas</a><span class="divider">/</span></li>
  <li><?php echo $item['Item']['245']; ?><span class="divider">/</span></li>
</ul>

<div align="center" style="padding-top: 5px; color: #828793; font-size: 18px; background: -webkit-linear-gradient(#d0d6e2, #ffffff); background: -moz-linear-gradient(#d0d6e2, #ffffff); background: -o-linear-gradient(#d0d6e2, #ffffff);"><strong>Módulo de Revistas</strong></div>

<div style="padding-left: 50px; padding-right: 50px;">

<div style="height: 46px; border-bottom-style: inset; border-bottom-color: #BBBBBB;">
<br />
<table style="font-size: smaller; width: 75%;">
	<tr>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><strong><a href="<?php echo $this->base; ?>/magazines">Presentación</a></strong></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/century">Siglo</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/author">Autor</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/title">Título</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/year">Año</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/matter">Materia</a></td>
	</tr>
</table>
</div>

<div class="magazines">
	<br />
		<div>
			<div style="width: 20%; float: left; text-align: center">
				<?php if (!empty($item['ItemsPicture'])):?>
				<?php echo $this->Html->image("/webroot/attachments/files/big/" . $item['ItemsPicture'][0]['picture_file_path'], array('width' => '120px', 'class' => 'img-polaroid zoomTarget', 'data-closeclick' => 'true')); ?>
				<?php endif; ?>
				
				<br />
				
				<?php if (!empty($item['Item']['item_file_path'])) { ?>
					<a href="http://<?php echo $_SERVER['HTTP_HOST'] . $this->base . '/webroot/attachments/files/' . $item['Item']['item_file_path']; ?>" target="_blank" title="Descargue el documento en su computadora."><i class='icon-download-alt'></i> Documento</a>
					&nbsp;
				<?php } ?>
				
				<br /><br />
			</div>
			<div style="width: 40%; float: left;">
				<dl class="dl-horizontal">
					<dt><?php __('Title'); ?>:</dt>
					<dd>
						<?php echo $item['Item']['title']; ?>
					</dd>
					<dt><?php __('Topic'); ?>:</dt>
					<dd>
						<?php echo $this->Html->link($item['Topic']['name'], array('controller' => 'topics', 'action' => 'view', $item['Topic']['id']), array('title' => $item['Topic']['description'])); ?>
					</dd>
					<dt><?php __('Year'); ?>:</dt>
					<dd>
						<?php echo $item['Item']['year']; ?>
					</dd>
					<dt><?php __('Created'); ?>:</dt>
					<dd>
						<?php echo $time->format('d-m-Y', $item['Item']['created']); ?>
					</dd>
					<?php if (!empty($item['Item']['description'])) { ?>
					<dt><?php __('Description'); ?>:</dt>
					<dd>
						<?php echo $item['Item']['description']; ?>
					</dd>
					<?php } ?>
				</dl>
				
				<?php if ($this->Session->check('Auth.User')) { ?>
				<?php echo $this->Form->create('UserItem', array('id' => 'UserItemForm', 'action' => 'add'));?>
				<?php
					echo $this->Form->hidden('user_id', array('type' => 'text', 'value' => $this->Session->read('Auth.User.id')));
					echo $this->Form->hidden('item_id', array('type' => 'text', 'value' => $item['Item']['id']));
				?>
				<?php echo $this->Form->end();?>
				<div style="text-align: center;"><?php echo $this->Form->button(__('Agregar a Mi Biblioteca', true), array('onclick' => "$('#UserItemForm').submit();")); ?></div>
				<?php } ?>
			</div>
			<div style="width: 40%; float: left;">
				<dl class="dl-horizontal">
					<dt><?php __('Author'); ?>:</dt>
					<dd>
						<?php echo $this->Html->link($item['Author']['fullname'], array('controller' => 'authors', 'action' => 'view', $item['Author']['id'])); ?>
					</dd>
					<dt><?php __('Type'); ?>:</dt>
					<dd>
						<?php echo $this->Html->link($item['Type']['name'], array('controller' => 'types', 'action' => 'view', $item['Type']['id'])); ?>
					</dd>
					<dt><?php __('Century'); ?>:</dt>
					<dd>
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
					</dd>
					<dt><?php __('Modified'); ?>:</dt>
					<dd>
						<?php echo $time->format('d-m-Y', $item['Item']['modified']); ?>
					</dd>
					<?php if (!empty($item['Item']['dedicatory'])) { ?>
					<dt><?php __('Dedicatory'); ?>:</dt>
					<dd>
						<?php echo $item['Item']['dedicatory']; ?>
					</dd>
					<?php } ?>
				</dl>
				
				<?php if ($this->Session->check('Auth.User')) { ?>
				<div style="text-align: center;"><?php //echo $this->Form->button(__('Compartir', true), array('action' => 'add')); ?></div>
				<?php } ?>
								
				<br /><br />
			</div>
		</div>
	
	<div style="clear: both;"></div>
	
<ul class="nav nav-tabs" id="myTab">
	<li class="active"><a href="#pdf">PDF</a></li>
	<li><a href="#revista">Revista</a></li>
	<!-- <?php //if (($this->Session->check('Auth.User')) && ($this->Session->read('Auth.User.group_id') != 3)) { ?><li><a href="#fotos">Fotos</a></li><?php //} ?> -->
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="pdf">
		<?php if ($item['Item']['item_content_type'] == "application/pdf") { ?>
			<?php if ($item['Item']['item_file_path']) { ?>
				<!-- <iframe src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/attachments/files/' . $item['Item']['item_file_path']; ?>" width="99%" height="600px"></iframe> -->
				<!-- <iframe src="http://docs.google.com/viewer?url=<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/attachments/files/' . $item['Item']['item_file_path']; ?>" width="99%" height="600px"></iframe> -->
				<!-- <object width="99%" height="600" type="application/pdf" data="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/attachments/files/' . $item['Item']['item_file_path']; ?>">
				<param name="src" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/attachments/files/' . $item['Item']['item_file_path']; ?>" />
				<p>N o PDF available</p>
				</object> -->
				
				<object data="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/attachments/files/' . $item['Item']['item_file_path']; ?>" type="application/pdf" width="100%" height="600px">
				<br /><br />
				<div style="text-align: center;">
					Lamentablemente este navegador no posee un plugin para visualizar PDF's.
				<br />
					Instale un plugin para visualizar el PDF o descargue el archivo <a href="http://<?php echo $_SERVER['HTTP_HOST'] . $this->base . '/webroot/attachments/files/' . $item['Item']['item_file_path']; ?>" target="_blank" title="Descargue el documento en su computadora.">aquí</a>. 
				<br /><br /><br /><br />
				</div>
				</object>
				
			<?php } ?>
		<?php } else {echo "<div style='text-align: center'>El archivo no tiene formato pdf.</div><br />";} ?>
	</div>
	<div class="tab-pane" id="revista">
		<div id="magazine" style="padding-bottom: 20px; overflow: hidden;">
			<?php foreach ($item['ItemsPicture'] as $picture): ?>
					<div style="background-image:url(<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base; ?>/webroot/attachments/files/big/<?php echo $picture['picture_file_path']; ?>);"></div>
			<?php endforeach; ?>
			<?php
					$w = 700;
					$h = 600;
				if (($this->Session->check('Auth.User')) && ($this->Session->read('Auth.User.group_id') != 3)){
					$w = 300;
					$h = 200;
				} 
			?>
		</div>
		
		<script type="text/javascript">
			$(window).ready(function() {
				$('#magazine').turn({
									display: 'double',
									width: <?php echo $w; ?>,
									height: <?php echo $h; ?>
									/*
									acceleration: true,
									gradients: !$.isTouch,
									elevation:50,
									when: {
										turned: function(e, page) {
											//console.log('Current view: ', $(this).turn('view'));
										}
									}*/
				});

				$(window).bind('keydown', function(e){
					if (e.keyCode==37)
						$('#magazine').turn('previous');
					else if (e.keyCode==39)
						$('#magazine').turn('next');
				});
				
				/*$(".zt2").zoomTarget({
					targetsize: 2,
					duration: 600
				});*/
		
				/*$(".zt2").click(function(evt) {
					$(this).zoomTo({
						targetsize: 2,
						duration: 600
					});
					evt.stopPropagation();
					//$('.zoomTarget').attr('style', 'top: 140px');
				});*/
			});
		</script>
	</div>
	<?php if (($this->Session->check('Auth.User')) && ($this->Session->read('Auth.User.group_id') != "3")) { ?>
	<div class="tab-pane" id="fotos">
		<div class="related">
			<?php if (!empty($item['ItemsPicture'])):?>
			<table>
			<tr>
				<!-- <th><?php __('Id'); ?></th> -->
				<th><?php __('Name'); ?></th>
				<th><?php __('Size'); ?></th>
				<th><?php __('Created'); ?></th>
				<!-- <th><?php __('Modified'); ?></th> -->
				<th class="actions"><?php //__('Actions');?></th>
			</tr>
			<?php
				$i = 0;
				foreach ($item['ItemsPicture'] as $picture):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
				<tr<?php echo $class;?>>
					<!-- <td><?php echo $picture['id'];?></td> -->
					<td><?php echo $picture['picture_file_name'];?></td>
					<td><?php echo $picture['picture_file_size'];?></td>
					<td><?php echo $time->format('d-m-Y', $picture['created']);?></td>
					<!-- <td><?php echo $time->format('d-m-Y', $picture['modified']);?></td> -->
					<td class="actions">
						<?php //echo $this->Html->link(__('View', true), array('controller' => 'items_pictures', 'action' => 'view', $picture['id'])); ?>
						<?php //echo $this->Html->link(__('Edit', true), array('controller' => 'items_pictures', 'action' => 'edit', $picture['id'])); ?>
						<?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'items_pictures', 'action' => 'delete', $picture['id'], $item['Item']['id']), null, sprintf(__('Desea eliminar el archivo %s?', true), $picture['picture_file_name'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php endif; ?>
		
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('Agregar Fotos', true), array('controller' => 'items_pictures', 'action' => 'images', $item['Item']['id']));?> </li>
				</ul>
			</div>
		<!--
			<br /><br /><br />
			<div id="wijcarousel">
				<ul>
					<?php foreach ($item['ItemsPicture'] as $picture): ?>
					<li>
						<?php echo $this->Html->image("/attachments/files/med/" . $picture['picture_file_path'], array('alt' => $picture['picture_file_name'], 'title' => $picture['picture_file_name'])); ?>
						<span>Caption</span>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		-->
			<script id="scriptInit" type="text/javascript">
			/*$(document).ready(function () {
		            $("#wijcarousel").wijcarousel({
		                display: 3,
		                step: 2,
		                orientation: "horizontal"
		            });
		        });*/
		    </script>
		    	
			<!-- Button to trigger modal -->
		<!-- <a href="#myModal" role="button" class="btn" data-toggle="modal">Subir páginas de la obra</a> -->
		
		<!-- Modal -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
		    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
		    <h3 id="myModalLabel">Modal header</h3>
		  </div>
		  <div class="modal-body">
		
		  </div>
		  <div class="modal-footer">
		    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		    <button class="btn btn-primary">Save changes</button>
		  </div>
		</div>
		
		</div>
	</div>
	<?php } ?>
</div>
 
<script type="text/javascript">
$('#myTab a').click(function (e) {
	e.preventDefault();
	$(this).tab('show');
});
</script>	
	
</div>

<!--
<?php if (($this->Session->check('Auth.User')) && ($this->Session->read('Auth.User.group_id') != 3)) { ?>
<div class="actions">
	<br />
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Configuration', true), array('controller' => 'configurations')); ?></li>
		<li><?php echo $this->Html->link(__('List Items', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Item', true), array('action' => 'edit', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Item', true), array('action' => 'delete', $item['Item']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics', true), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic', true), array('controller' => 'topics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types', true), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type', true), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors', true), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author', true), array('controller' => 'authors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Values', true), array('controller' => 'values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Value', true), array('controller' => 'values', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicators', true), array('controller' => 'indicators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicator', true), array('controller' => 'indicators', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php } ?>
-->
<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>