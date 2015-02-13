<div class="error-container">
	<h1>You have experienced an error when updating the recipe form.</h1>
	<div class="row">
		<div class="small-12 column">
			<?php echo $error; ?>
			<p>Images must be less than 600 pixles in width and height.</p>
		</div>
	</div>
	<div class="row">
		<a href="<?php echo base_url('addRecipe/recipes'); ?>">Back to Recipes</a>
	</div>
</div>

