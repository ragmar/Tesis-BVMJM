<?php
	echo $this->Html->script('wijmo/jquery.wijmo.wijprogressbar');
?>
<div style="padding-left: 50px; padding-right: 50px;">

<div class="images">
	<h2><?php //__('Imágenes de La revista.');?></h2>

	<?php echo $this->Form->create('ItemsPictures', array('enctype' => 'multipart/form-data', 'action' => 'images'));?>
	<?php echo $this->Form->hidden('item_id', array('type' => 'text', 'value' => $this->passedArgs[0])); ?>
		<div>
			<br />
			<h4>Seleccione las im&aacute;genes de las p&aacute;ginas de la obra para mostrarla como una revista en el orden deseado.</h4>
			<div id="container" style="text-align: left; float: left;">
				<div style="width: 33%; float: left;">01) <input type="file" id="picture01" name="data[Item][picture01]"></div>
				<div style="width: 33%; float: left;">02) <input type="file" id="picture02" name="data[Item][picture02]"></div>
				<div style="width: 33%; float: left;">03) <input type="file" id="picture03" name="data[Item][picture03]"></div>
				<div style="width: 33%; float: left;">04) <input type="file" id="picture04" name="data[Item][picture04]"></div>
				<div style="width: 33%; float: left;">05) <input type="file" id="picture05" name="data[Item][picture05]"></div>
				<div style="width: 33%; float: left;">06) <input type="file" id="picture06" name="data[Item][picture06]"></div>
				<div style="width: 33%; float: left;">07) <input type="file" id="picture07" name="data[Item][picture07]"></div>
				<div style="width: 33%; float: left;">08) <input type="file" id="picture08" name="data[Item][picture08]"></div>
				<div style="width: 33%; float: left;">09) <input type="file" id="picture09" name="data[Item][picture09]"></div>
			</div>
		</div>

		<div style="text-align: center; float: left; width: 100%;">
			<br />
			<input id="submit" type="submit" value="Subir" title="Comienza a subir los archivos seleccionados.">&nbsp;
			<input id="add" type="button" value="Más Campos" title="Agrega otra fila de campos para seleccionar imagenes a subir.">
			<br /><br />
		</div>
	<?php echo $this->Form->end();?>
</div>

<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>

<script type="text/javascript">
	var i = 10;
    $(document).ready(function () {
    	$('#add').click(function() {
        	$("#container").append("<div style='width: 33%; float: left;'>"+i+") <input type='file' id='picture" + i + "' name='data[Item][picture" + i + "]'></div>");
        	i++;
        	$("#container").append("<div style='width: 33%; float: left;'>"+i+") <input type='file' id='picture" + i + "' name='data[Item][picture" + i + "]'></div>");
        	i++;
        	$("#container").append("<div style='width: 33%; float: left;'>"+i+") <input type='file' id='picture" + i + "' name='data[Item][picture" + i + "]'></div>");
        	i++;
		});
    });
</script>
<?php //if (isset($files)){debug($files);} ?>