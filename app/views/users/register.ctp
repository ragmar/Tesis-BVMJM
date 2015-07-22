<script type="text/javascript">
	function validate (){
		if ($('#UserName').val().length < 1){
			$('#UserName').focus();
			alert('Por favor ingrese su nombre.');
			return false;
		}
		if ($('#UserLastname').val().length < 1){
			$('#UserLastname').focus();
			alert('Por favor ingrese su apellido.');
			return false;
		}
		if ($('#UserProfileId').val().length < 1){
			$('#UserProfileId').focus();
			alert('Por favor seleccione su perfil.');
			return false;
		}
		if ($('#UserEmail').val().length < 1){
			$('#UserEmail').focus();
			alert('Por favor ingrese su email.');
			return false;
		}
		if ($('#UserUsername').val().length < 1){
			$('#UserUsername').focus();
			alert('Por favor ingrese su nombre de usuario.');
			return false;
		}
		if ($('#UserPassword').val().length < 1){
			$('#UserPassword').focus();
			alert('Por favor ingrese su contraseña.');
			return false;
		}
		if ($('#UserCountryId').val().length < 1){
			$('#UserCountryId').focus();
			alert('Por favor seleccione su país.');
			return false;
		}
		if ($('#UserCity').val().length < 1){
			$('#UserCity').focus();
			alert('Por favor ingrese su ciudad.');
			return false;
		}
		if ($('#UserPostalCode').val().length < 1){
			$('#UserPostalCode').focus();
			alert('Por favor ingrese su código postal.');
			return false;
		}
		if ($('#UserGender').val().length < 1){
			$('#UserGender').focus();
			alert('Por favor seleccione su sexo.');
			return false;
		}
		return true;
	}
</script>

<style>
label {
	margin-top: 10px;
}
</style>

<ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>">Inicio</a></li>
  <li>Registro de Usuario</li>
</ul>

<div class="users">
<?php echo $this->Form->create('User', array('onsubmit' => 'return validate();')); ?>
	
	<?php
		echo $this->Form->hidden('group_id', array('selected' => '2'));
		//echo $this->Form->input('last_login');
		echo $this->Form->hidden('active', array('value' => '1'));
		//echo $this->Form->input('ip');
	?>
	<div>
		<div class="col-md-4 column">
			<br /><br /><br />
			<?php
				echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Nombre'));
				echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Correo Electrónico', 'label' => 'Correo Electrónico'));
				echo $this->Form->input('country_id', array('selected' => '232', 'empty' => 'Seleccione', 'class' => 'form-control'));
				echo $this->Form->hidden('country', array('class' => 'form-control'));
				echo $this->Form->input('postal_code', array('class' => 'form-control', 'placeholder' => 'Código Postal'));
			?>
		</div>
		<div class="col-md-4 column">
			<h2 class="text-center">Registro de Usuario</h2>
			<?php
				echo $this->Form->input('lastname', array('class' => 'form-control', 'placeholder' => 'Apellido'));
				echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Nombre de Usuario'));
				echo $this->Form->input('city', array('class' => 'form-control', 'placeholder' => 'Ciudad'));
				echo $this->Form->input('gender', array('options' => array('Male' => 'Hombre', 'Female' => 'Mujer'), 'empty' => 'Seleccione', 'class' => 'form-control'));
			?>
			
			<div style="text-align: center;">
				<br />
				<?php echo $this->Form->button(__('Register', true), array('class' => 'btn btn-primary', 'div' => false)); ?>
			</div>
		</div>
		<div class="col-md-4 column">
			<br /><br /><br />
			<?php
				echo $this->Form->input('profile_id', array('selected' => '4', 'empty' => 'Seleccione', 'class' => 'form-control'));
				echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Contraseña'));
				echo $this->Form->input('address', array('class' => 'form-control', 'rows' => '4', 'placeholder' => 'Dirección'));
				echo $this->Form->hidden('ip', array('value' => $_SERVER['REMOTE_ADDR']));
			?>
		</div>
	</div>
<?php echo $this->Form->end();?>
<br />
</div>
<!--
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Profiles', true), array('controller' => 'profiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profile', true), array('controller' => 'profiles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries', true), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country', true), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->