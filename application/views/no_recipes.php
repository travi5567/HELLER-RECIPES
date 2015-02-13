<div class="recipes-container">
	<div class="row">
		<div class="small-12 medium-12 column">
			<?php $attributes = array('id' => 'search-form');?>
			<?=form_open('addRecipe/search', $attributes);?>
				<div class="small-6 columns noSpace" ><?php $search = array('name'=>'search','id'=>'search','value'=>'');?><?=form_input($search);?></p></div>
				<div class="small-6 columns " ><button type='submit' class='btn-search' id="btn-search" ><i class="fi-magnifying-glass"></i>Search</button></div>
			<?=form_close();?>
		</div>
	</div>
	<div class="row">
		<div class="small-12 column">
			<div class="recipes">
				<h2>Their are currently no recipes at this time.</h2>
				<p>Be the first to add a recipe and click the link below.</p>
				<button class="button left btn"><a href="<?php echo site_url('uploadimage/view_image'); ?>"><i class="fi-plus"></i>Add Recipe</a></button>
			</div><!-- END OF RECIPES -->
		</div>
	</div>
</div>