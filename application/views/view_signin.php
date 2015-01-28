<div class="sign-in-container">
	<?php if($this->session->userdata('is_logged_in')){
			echo "<div class='logged-in'>";
				echo "<h1>You are already logged in</h1>";
				echo "<button class='button btn'><a href='".base_url('login/logout')."'>Click Here to 	Logout</a></button>";
			echo "</div>";

		}else{
			echo "<h1>SIGN IN</h1>";
			 echo validation_errors();
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
				echo "<a href='".base_url('login/signup')."'>Not a member? Click here to create an account!</a>";
		} ?>

	
</div>

