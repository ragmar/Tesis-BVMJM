<ul class="breadcrumb" style="margin: 0">
	<li>
		<?php echo $this->Html->link(__('Inicio', true), array('controller' => 'pages')); ?>
	</li>
	<li>Datos del Usuario</li>
</ul>

<?php echo $this->Form->create('User'); ?>
	<div class="col-md-4 column">
	<h1>&nbsp;</h1>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name', array('class' => 'form-control'));
			echo $this->Form->input('lastname', array('class' => 'form-control'));
			echo $this->Form->input('group_id', array('class' => 'form-control'));
			echo $this->Form->input('profile_id', array('class' => 'form-control'));
		?>
	</div>
	<div class="col-md-4 column">
		<h1>Datos del Usuario</h1>
		<div class="users form">
			<!-- <legend><?php if ($this->Session->read('Auth.User.group_id') == '1') { __('Modificar Usuario');} else { __('Datos del Usuario');} ?></legend> -->
			<?php
				//echo $this->Form->input('password');
				//echo $this->Form->input('country');
				echo $this->Form->input('country_id', array('class' => 'form-control'));
				echo $this->Form->input('city', array('class' => 'form-control'));
				echo $this->Form->input('address', array('class' => 'form-control'));
				//echo $this->Form->input('last_login');
				//if ($this->Session->read('Auth.User.group_id') == '1') {
					//echo $this->Form->input('active', array('class' => 'form-control'));
				//}
			?>
			<br />
			<div class="text-center"><?php echo $this->Form->button('Guardar', array('class' => 'btn btn-primary')); ?></div>
			<br />
		</div>
	</div>
	<div class="col-md-4 column">
		<h1>&nbsp;</h1>
		<?php
			echo $this->Form->input('postal_code', array('class' => 'form-control'));
			echo $this->Form->input('email', array('class' => 'form-control'));
			echo $this->Form->input('username', array('class' => 'form-control'));
			echo $this->Form->input('gender', array('options' => array('Male' => 'Masculino', 'Female' => 'Femenino'), 'empty' => 'Seleccione', 'class' => 'form-control'));
		?>
	</div>
<?php echo $this->Form->end(); ?>