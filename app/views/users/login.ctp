<ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>">Inicio</a></li>
  <li>Ingreso de Usuario</li>
</ul>

<div class="users">
	<div class="col-md-3 column"></div>
	<div class="col-md-6 column" style="text-align: center;">
	<h2>Ingreso de Usuario</h2>
	<br />
	<?php echo $this->Form->create('User', array('action' => 'login'));?>
		<?php
			echo $this->Form->input('username', array('label' => false, 'class' => 'form-control', 'placeholder' => __('Username', true)));
			echo $this->Form->input('password', array('label' => false, 'class' => 'form-control', 'placeholder' => __('Password', true)));
		?>
		<br />
		<?php echo $this->Form->button(__('Login', true), array('action' => 'login', 'class' => 'btn btn-primary')); ?>
		<?php echo $this->Html->link(__('Register', true), '/users/register', array('class' => 'btn btn-primary'));?>
		<?php echo $this->Html->link(__('Reset Password', true), '/users/reset', array('class' => 'btn btn-primary'));?>
	<?php echo $this->Form->end(); ?>
	<br />
	</div>
	<div class="col-md-3 column"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#UserUsername').focus();
});
</script>