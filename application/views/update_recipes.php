<div class="update-recipes-container">
<div class="row">
		<div class="small-12 column noSpace">
			<button class="btn back-btn"><a href="<?php echo base_url('addRecipe/recipes') ?>"><i class="fi-arrow-left"></i>Back to Recipes</a></button>
		</div>
	</div>
	<div class="row">
		<div class="small-12 column">
			<div class="recipes">
				<?php foreach($recipes as $row) : ?>
					<?php 
						$recipe_title =  $row->title;
						$recipe_id =  $row->id;
					    $recipe_description =  $row->description; 
					    $recipe_directions =  $row->directions; 
					    $recipe_link =  $row->link; 
					    $recipe_genre =  $row->genre; 
					    $posted =  $row->posted; 
					    $rating =  $row->stars; 
					?>
				<?php endforeach; ?>
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
			</div>
			<div class="form">
				<?php 
					$attributes = array('id' => 'update-recipe-form');
		    		echo form_open('addRecipe/update', $attributes);
					$data = array(
					          'class' => 'hide',
					          'name' => 'recipe_id',
					          'value' => $recipe_id
					        );
					echo form_input($data);
				 
					echo form_label('Title:', 'recipe_name');
					echo form_input('recipe_name', $recipe_title);

					echo form_label('Recipe Description:', 'recipe_description');
					echo form_input('recipe_description', $recipe_description);

					echo form_label('Recipe Rating:', 'rating');
					$rating_options = array(1 => '1star',
					                       2 => '2star',
					                       3 => '3star',
					                       4 => '4star',
					                       5 => '5star'
					                      );
					$selected = ($this->input->post('rating')) ? $this->input->post('rating') : $rating;                        
						echo form_dropdown('rating', $rating_options, $selected);

					echo form_label('Recipe Directions:', 'recipe_directions');
					echo form_textarea('recipe_directions', $recipe_directions);

					echo form_label('Recipe Genre:', 'recipe_genre');
					$genre_options = array('Soup' => 'Soup',
					                       'Breakfast' => 'Breakfast',
					                       'Chicken' => 'Chicken',
					                       'Pork' => 'Pork',
					                       'Desert' => 'Desert',
					                       'Appetizers' => 'Appetizers',
					                       'Healthy' => 'Healthy',
					                       'Main Dish' => 'Main Dish',
					                       'Slow Cooker' => 'Slow Cooker',
					                       'BBQ and Grill' => 'BBQ and Grill'
					                      );
					$selected = ($this->input->post('genre')) ? $this->input->post('genre') : $recipe_genre;                        
					echo form_dropdown('recipe_genre', $genre_options, $selected);

					echo form_label('Link to Recipe Image:', 'recipe_link');
					echo form_input('recipe_link', $recipe_link);
					$data = array(
					      'name'        => 'recipe_update',
					      'value'       => 'Update Recipe',
					      'class'       => 'btn button'
					    );?>
					<button class="btn" type="submit" name="update_recipe">Update Recipe</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
