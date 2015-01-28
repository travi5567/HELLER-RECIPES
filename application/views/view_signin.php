<div class="sign-in-container">
	<h1>SIGN IN</h1>
	<?php echo validation_errors(); ?>
	<?php 
		$attributes = array('id' => 'sign-in-form');
		echo form_open('login/login_validation', $attributes);
		
			echo "<p><label for='email'>Email: </label>";
			echo form_input('email');
			echo "</p>";

			echo "<p><label for='password'>Password: </label>";
			echo form_password('password');
			echo "</p>";

			$data = array(
			          'name'        => 'login_submit',
			          'value'       => 'Login',
			          'class'       => 'btn button'
			        );
			echo "<p class='submit'>" . form_submit($data) . "</p>";
		echo form_close();
	?>

	<a href="<?php echo base_url() . 'login/signup'  ?>">Not a member? Click here to sign up!</a>
</div>

