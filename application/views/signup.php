<div class="sign-up-container">
	<h1>SIGN UP PAGE</h1>
	<p class='left'>Password must be more than 5 characters long and no more than 15.</p>
	<div class="small-12 column noSpace">
		<?php 
			$attributes = array('id' => 'sign-up-form');
			echo form_open('login/signup_validation', $attributes);

				echo validation_errors('<p class="error">', '</p>');
				echo "<p><label for='firstname'>First Name: </label>";
					echo form_input('firstname', $this->input->post('firstname'));
				echo "</p>";

				echo "<p><label for='email'>Email: </label>";
					echo form_input('email', $this->input->post('email'));
				echo "</p>";

				echo "<p><label for='password'>Password: </label>";
					echo form_password('password');
				echo "</p>";

				echo "<p><label for='cpassword'>Confirm Password: </label>";
					echo form_password('cpassword');
				echo "</p>";

				$data = array(
				          'name'        => 'signup_submit',
				          'value'       => 'Sign Up',
				          'class'       => 'btn button'
				        );
				echo "<p class='submit'>" . form_submit($data) . "</p>";


			echo form_close();
		?>
		<a href="<?php echo base_url('login');  ?>">Already a member? Click here to login!</a>
	</div>
</div>

