<div class="add-recipe-container">
	<div class="row">
		<div class="small-12 column">
			<?php   
		    		$attributes = array('id' => 'add-recipe-form');
		    		echo form_open('addRecipe/create', $attributes);
				 	echo "<h1>Add New Recipe</h1>";
					echo form_label('Title:', 'recipe_name');
					echo form_input('recipe_name');

					echo form_label('Recipe Description:', 'recipe_description');
					echo form_input('recipe_description');

					echo form_label('Recipe Rating:', 'rating');
					$rating_options = array(1 => '1star',
					                       2 => '2star',
					                       3 => '3star',
					                       4 => '4star',
					                       5 => '5star'
					                      );
					$selected = ($this->input->post('rating')) ? $this->input->post('rating') : '1star';                        
						echo form_dropdown('rating', $rating_options, $selected);

					echo form_label('Recipe Directions:', 'recipe_directions');
					echo form_textarea('recipe_directions');

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
					$selected = ($this->input->post('genre')) ? $this->input->post('genre') : 'Recipe genre';                        
					echo form_dropdown('recipe_genre', $genre_options, $selected);

					echo form_label('Link to Recipe Image:', 'recipe_link');
					echo form_input('recipe_link');
					$data = array(
					      'name'        => 'recipe_update',
					      'value'       => 'Update Recipe',
					      'class'       => 'btn button'
					    );?>
					<button class="btn" type="submit" name="add_recipe">Add Recipe</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

