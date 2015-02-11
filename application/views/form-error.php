<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Heller - Recipes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
 	<script src="<?php echo base_url(); ?>assets/js/jqModal.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jqModal.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/foundation.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/foundation-icons/foundation-icons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/base.css">
</head>
<body>
<div class="form-error-container">
	<h1>Something went wrong with form submission</h1>
	<h2>A list of what needs to be fixed in order for your submission to be succesfull.</h2>
	<?php echo validation_errors('<p class="error">- ', '</p>'); ?>
	<?php echo $error;  ?>
	<button class="button btn"><a href="<?php echo site_url('uploadimage/view_image'); ?>">Return to Form</a></button>

</div>

<?php 
	if($this->session->userdata('is_logged_in')){
		echo '<div id="bottom-nav">
			<div class="small-3 columns">
				<button class="button"><a href="'.site_url('login/members') .'"><i class="fi-home"></i>Home</a></button>
			</div>
			<div class="small-3 columns">
				<button class="button"><a href="'.site_url('addRecipe/stopwatch').'"><i class="fi-clock"></i>Stop Watch</a></button>
			</div>
			<div class="small-3 columns">
				<button class="button"><a href="'.site_url('addRecipe/recipes').'"><i class="fi-book"></i>Recipes</a></button>
			</div>
			<div class="small-3 columns">
				<button class="button"><a href="'.site_url('uploadimage/view_image').'"><i class="fi-plus"></i>Add Recipes</a></button>
			</div>
		</div><!-- END OF BOTTOM-NAV -->';
	} else {
		echo    '<div id="bottom-nav">
					<div class="small-12 column">
						
					</div>
				</div><!-- END OF BOTTOM-NAV -->';
	}
?>
 <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
 <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/libs/min/jquery.min.js"><\/script>')</script>
 <script src="<?php echo base_url(); ?>assets/js/foundation.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.4.6/js/foundation.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
</body>
</html>