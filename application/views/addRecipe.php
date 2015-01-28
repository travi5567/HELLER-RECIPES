<div class="add-recipe-container">
	<div class="row">
		<div class="small-12 column">
			<?php echo form_open('addRecipe/create'); ?>
				<fieldset class="name">
					<legend>Name of recipe</legend>
					<input type="text" name="recipe_name" class="recipe_name" placeholder="Name of Recipe" tabindex="1">
				</fieldset>
				<fieldset class="description">
					<legend>Description of recipe</legend>
					<textarea type="textarea" rows="4" cols="50" name="recipe_description" class="recipe_description" placeholder="Description of Recipe" tabindex="2"></textarea>
				</fieldset>
				<fieldset class="rating">
				    <legend>Rate your recipe</legend>
				    <input type="radio" id="star5" name="rating" value="5" tabindex="2" /><label for="star5" title="Rocks!">5 stars</label>
				    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
				    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
				    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
				    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
				</fieldset>
				<fieldset class="directions">
					<legend>Directions</legend>
					<textarea type="textarea" rows="4" cols="50" name="recipe_directions" class="recipe_directions" placeholder="Directions of Recipe" tabindex="4" ></textarea>
				</fieldset>
				<fieldset class="genre">
					<legend>Genre</legend>
					<select name="genre">
						<option type="select" name="genre" value="Genre">Genre</option>
						<option type="select" name="genre" value="Soup">Soup</option>
						<option type="select" name="genre" value="Breakfast">Breakfast</option>
						<option type="select" name="genre" value="Chicken">Chickekn</option>
						<option type="select" name="genre" value="Pork">Pork</option>
						<option type="select" name="genre" value="Desert">Desert</option>
						<option type="select" name="genre" value="Appetizers">Appetizers</option>
						<option type="select" name="genre" value="Healthy">Healthy</option>
						<option type="select" name="genre" value="Main Dish">Main Dish</option>
						<option type="select" name="genre" value="Slow Cooker">Slow Cooker</option>
						<option type="select" name="genre" value="BBQ &amp; Grill">BBQ &amp; Grill</option>
					</select>
				</fieldset>
				<fieldset class="name">
					<legend>Link to image of recipe</legend>
					<input type="text" name="recipe_link" class="recipe_link" placeholder="Link to Image of Recipe" tabindex="5">
				</fieldset>
				<button class="btn" type="submit" name="submitRecipe" tabindex="6">Submit Recipe</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

