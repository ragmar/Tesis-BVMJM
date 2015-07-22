<ul class="breadcrumb">
    <li>
    	<?php echo $this->Html->link(__('Inicio', true), array('controller' => 'pages')); ?>
    </li>
    <li class="active">
    	<?php echo $text['Pagetext']['title']; ?>
    </li>
</ul>

<?php //if ($text['Pagetext']['enabled']) { ?>
<div class="pagetexts">
	<div id="message" style="width: 50%; float: left; <?php if ($text['Pagetext']['id'] != '15') {echo "display: none";} ?>">
	<?php echo $this->Form->create('Message', array('controller' => 'messages', 'action' => 'add'));?>
			<h3><?php __('Contacto'); ?></h3>
			<?php
				if ($this->Session->read('Auth.User')) {
					echo $this->Form->input('name', array('label' => 'Nombre', 'value' => $this->Session->read('Auth.User.name') . " " . $this->Session->read('Auth.User.lastname'), 'disabled' => 'disabled', 'class' => 'form-control'));
					echo $this->Form->input('email', array('label' => 'Correo Electrónico', 'value' => $this->Session->read('Auth.User.email'), 'disabled' => 'disabled', 'class' => 'form-control'));
					echo $this->Form->input('subject', array('label' => 'Asunto', 'class' => 'form-control'));
					echo $this->Form->input('message', array('label' => 'Mensaje', 'type' => 'textarea', 'class' => 'form-control'));
				} else {
					echo $this->Form->input('name', array('label' => 'Nombre', 'class' => 'form-control'));
					echo $this->Form->input('email', array('label' => 'Correo Electrónico', 'class' => 'form-control'));
					echo $this->Form->input('subject', array('label' => 'Asunto', 'class' => 'form-control'));
					echo $this->Form->input('message', array('label' => 'Mensaje', 'type' => 'textarea', 'class' => 'form-control'));
				}
			?>
		<br />
	<?php echo $this->Form->button(__('Enviar', true), array('class' => 'btn btn-primary'));?>
	&nbsp;
	<?php echo $this->Form->button(__('Restaurar', true), array('type' => 'reset', 'class' => 'btn btn-primary'));?>
	<?php echo $this->Form->end();?>

	</div>
	
	<div id="info" style="<?php if ($text['Pagetext']['id'] != '15') {echo "width: 100%;";} else {echo "width: 50%;";} ?> float: left;">
		<h2 style="text-align: center;"><?php echo $text['Pagetext']['title']; ?></h2>
		<?php
			echo $text['Pagetext']['description'];
		?>
	</div>
</div>

<div style="clear: both;"></div>

<?php //} else { ?>
	<!-- <p style="text-align: center;">
		<br />P&aacute;gina Inactiva.<br /><br />
	</p> -->
<?php //} ?>