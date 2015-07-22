                                <ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>">Inicio</a></li>
  <li>Restaurar Contrase&ntilde;a</li>
</ul>

<div class="users">
	<div class="col-md-3 column"></div>
	<div class="col-md-6 column text-center">
	<h2>Recuperar Contrase&ntilde;a</h2>
	<?php echo $this->Form->create('User', array('action' => 'reset'));?>
	
		<br />
	
		Introduzca su correo electr&oacute;nico para restaurar su contrase&ntilde;a.
		<?php
			echo $this->Form->input('email', array('label' => false, 'placeholder' => __('Email', true), 'class' => 'form-control'));
			//echo $this->Form->input('password', array('label' => false, 'placeholder' => __('Password', true)));
		?>
		
		<br />
		
		<div class="text-center">
			<?php echo $this->Form->button(__('Reset', true), array('action' => 'reset', 'class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Register', true), '/users/register', array('class' => 'btn btn-primary'));?>
			<?php echo $this->Html->link(__('Ingresar', true), '/users/login', array('class' => 'btn btn-primary'));?>
		</div>
		
		<br />
		
	<?php echo $this->Form->end();?>
	</div>
	<div class="col-md-3 column"></div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('.sidebar-nav').hide();
	$('.span2').hide();
});
</script>
                            