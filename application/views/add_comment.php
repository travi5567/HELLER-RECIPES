<div class="add-recipe-container">
	<div class="row">
		<div class="small-12 column">
			<?php   
		    		$attributes = array('id' => 'add-comment-form');
		    		echo form_open('comments/add_comment', $attributes);
				 	echo "<h1>Add New Comment</h1>";
					echo form_label('Comment:', 'comment');
					echo form_textarea('comment');

					echo form_label('Author:', 'author');
					echo form_input('author');
					?>
					<button class="btn" type="submit" name="add_recipe">Add Recipe</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

