<div class="view_comments-container">
	<div class="row">
		<div class="small-12 columns">
			<?php echo '<button class="btn back-btn"><a href="'.site_url('addRecipe/recipes').'"><i class="fi-arrow-left"></i>Back to Recipes</a></button>'; ?>
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			<div class="comments">
				
				<?php 
					foreach($recipes as $row){
							$recipe_title =  $row->title;
							 $recipe_id = $row->id;
							echo "<h1>".ucwords($recipe_title)."</h1>";
						}
					if(!$comments == array()){
						
						foreach($comments as $row){
								$comment = $row->comment;
							    $author = $row->author; 
							    $recipe_id = $row->id; 
							    $recipe_rating = $row->rating; 
							echo "<div class='comment'>";
								echo "<p class='recipe-comment'><i class='fi-comment'></i> " . $comment . "</p>";
								echo "<p class='recipe-author'>Posted by: ". $author . "</p>";
								foreach($recipes as $row){
									$recipe_title =  $row->title;
									echo "<span class='recipe-title right'>". $recipe_rating . "<i class='fi-star'></i> | ". $recipe_title . "</span>";
								}

							echo "</div>";//end of comment container

						}
					}else{
						echo "<h2>No comments for this recipe yet.</h2>";
					}
				?>
				<div class="form add_comment">
					<div class="row">
						<div class="small-12 column">
							<?php   
							 $session_fn = $this->session->userdata('firstname');
								foreach($recipes as $row){
									$recipe_title =  $row->title;
									$recipe_id = $row->id;
							    	$attributes = array('id' => 'addCommentForm');
							    	echo form_open('comments/add_comment/'.$recipe_id.'/', $attributes);
								 	echo "<h1>Add New Comment</h1>";
								 	echo validation_errors();
									echo form_label('Comment:', 'comment');
									echo form_textarea('comment');
									echo "<input type='text' class='hide' name='recipeTitle' value='".$recipe_title."' placeholder='".$recipe_title."' />";
									echo "<input type='text' class='hide' name='recipeId' value='".$recipe_id."' placeholder='".$recipe_id."' />";
									echo "<input type='text' class='hide' name='date' value='".NOW()."' placeholder='".NOW()."' />";
									echo form_label('Rating:', 'rating');
									$rating_options = array(1 => '1star',
					                    2 => '2star',
					                    3 => '3star',
					                    4 => '4star',
					                    5 => '5star'
					                 );
									$selected = ($this->input->post('rating')) ? $this->input->post('rating') : '1star';                        
									echo form_dropdown('rating', $rating_options, $selected);
									echo form_label('Author:', 'author');
									echo "<input type='text' class='hide' name='author' value='".$session_fn."' />";
								}
							?>
							<button class="button" type="submit" name="add_comment">Add Comment</button>
							<?php echo form_close(); ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
