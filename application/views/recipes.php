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
			<div class="row heading">
				<div class="small-9 columns">
					<h1>Title:</h1>
				</div>
				<div class="small-3 columns">
					<h1>Rating:</h1>
				</div>
			</div><!-- END OF HEADING -->
			<?php include('templates/recipes.php'); ?>
		</div>
	</div>
</div>