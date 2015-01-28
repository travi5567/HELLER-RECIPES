<div class="sign-in-container">
	<h1>CREATE ACCOUNT</h1>
	<form id="create-account-form">
		<div class="row">
			<div class="small-7 columns">
				<input type="text" name="firstname" class="firstname" placeholder="First Nname" tabindex="1" />
				<input type="text" name="lastname" class="lastname" placeholder="Last Nname" tabindex="2" />
				<input type="password" name="password" class="password" placeholder="password" tabindex="3" />
				
				<div class="checkbox-wrapper">
					<input type="checkbox" name="email-notifications" class="email-notifications" tabindex="4" /><p>Recieve Email Notifications on Recipe updates.</p>
				</div>
			</div>
			<div class="small-4 columns">
				<div class="profile-image-holder">
					<i class="fi-torso"></i>
				</div>
				<div class="fileUpload btn small">
				    <span>Upload Profile Image</span>
				    <input type="file" class="upload-image" />
				</div>
			</div>
		</div>
		<div class="row">
			<button class="submit button" type="submit" tabindex="6">Save Profile Info</button>
		</div>
	</form>
	
</div>
<div id="bottom-nav">
	<div class="small-6 columns">
		<div class="signin">
			<button class="button"><a href="<?php echo site_url('site/signin');?>">SIGN IN</a></button>
		</div>
	</div>
	<div class="small-6 columns">
		<div class="create-account">
			<button class="button"><a class="inactive-btn" href="<?php echo site_url('site/createAccount') ?>">Create Account</a></button>
		</div>
	</div>
</div>

