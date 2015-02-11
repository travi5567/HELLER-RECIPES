<div class="update-recipes-container">
	<div class="row">
		<div class="small-12 column noSpace">
			<button class="btn back-btn"><a href="<?php echo base_url('addRecipe/recipes') ?>"><i class="fi-arrow-left"></i>Back to Recipes</a></button>
		</div>
	</div>
	<div class="row">
		<div class="small-12 column">
				<?php 
					foreach($recipes as $row){
						$recipe_title =  $row->title;
						$recipe_id =  $row->id;
					    $recipe_description =  $row->description; 
					    $recipe_directions =  $row->directions; 
					    $recipe_genre =  $row->genre; 
					    $posted =  $row->posted; 
					    $rating =  $row->stars;
					    $image =  $row->image; 
					}
					$attributes = array('id' => 'update-recipe-form');
			 		echo form_open_multipart('uploadimage/update_recipe/'.$recipe_id.'', $attributes);
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

					echo form_label('Upload Recipe Image:', 'userfile');
					$valueArray = array(
						'name' => 'userfile',
						'value' => $image
					);
					echo form_upload($valueArray);

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
