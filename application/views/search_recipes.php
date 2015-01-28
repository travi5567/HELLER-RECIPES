<div class="recipes-container">
	<div class="row">
		
	</div>
	<div class="row">
		<div class="small-12 medium-12 columns">
			<p>A list of some of the most amzing meals conjured up and enjoyed by the Heller's. Enjoy, and please give credit where credit is do.</p>
		</div>
		<div class="small-12 column noSpace">
			<button class="btn back-btn"><a href="<?php echo base_url('addRecipe/recipes') ?>"><i class="fi fi-arrow-left"></i>Back to Recipes</a></button>
		</div>
		<div class="small-12 medium-12 columns">
		<?php $attributes = array('id' => 'search-form');?>
			<?=form_open('addRecipe/search', $attributes);?>
				<div class="small-8 columns noSpace" ><?php $search = array('name'=>'search','id'=>'search','value'=>'');?><?=form_input($search);?></p></div>
				<div class="small-4 columns " ><button type='submit' id="btn-search" /><i class="fi-magnifying-glass"></i>Search</button></div>
			<?=form_close();?>
		</div>
	</div>
	<div class="row">
		<div class="small-12 column">
			<div class="recipes">
				<?php foreach($query as $row) : ?>
					<?php 
						$recipe_title =  $row->title;
					    $recipe_description =  $row->description; 
					    $recipe_directions =  $row->directions; 
					    $recipe_link =  $row->link; 
					    $posted =  $row->posted; 
					    $rating =  $row->stars; 
					?>
					<div class="recipe">
						<div class="row top-heading">
							<div class="small-9 columns">
								<h1><?php echo $recipe_title; ?></h1>
							</div>
							<div class="small-3 columns">
								<h1><?php if($rating > 0){echo $rating . '<i class="fi fi-star"></i>';}else{echo '<i class="fi fi-skull"></i>';} ?></h1>
							</div>
						</div>
						<div class="row bottom-info">
							<div class="small-8 columns">
								<p class="description"><?php echo $recipe_description; ?></p>
								<p class="directions"><?php echo $recipe_directions; ?></p>
							</div>
							<div class="small-4 columns">
								<img src="<?php echo $recipe_link; ?>" alt="<?php echo $recipe_link; ?>">
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

