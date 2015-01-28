<div class="recipes-container">
	<div class="row">
		<div class="small-12 medium-12 column">
			<p>A list of some of the most amzing meals conjured up and enjoyed by the Heller's. Enjoy, and please give credit where credit is do.</p>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-12 column">
			<?php $attributes = array('id' => 'search-form');?>
			<?=form_open('addRecipe/search', $attributes);?>
				<div class="small-8 columns noSpace" ><?php $search = array('name'=>'search','id'=>'search','value'=>'');?><?=form_input($search);?></p></div>
				<div class="small-4 columns " ><input type='submit' value='Search' class='btn-search' id="btn-search" /></div>
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
			</div>
			<div class="recipes">
				<?php foreach($recipes as $row) : ?>
					<?php 
						$recipe_title =  $row->title;
						$recipe_id =  $row->id;
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
							<div class="row">
								<div class="small-12 column">
									<a href="<?php echo site_url('addRecipe/show_recipe_id/')."/".$recipe_id; ?>">Edit Recipe <i class="fi-pencil"></i></a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>