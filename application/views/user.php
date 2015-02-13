<div class="user-container">
	<div class="row">
		<div class="small-12 columns">
		<button class="btn back-btn"><a href="<?php echo base_url('users') ?>"><i class="fi fi-arrow-left"></i>Back to Users</a></button>
			<div class="user">
				<h1><?php echo ucwords($author)."'s Profile"; ?></h1>
				<?php 
					if(!$comments == array()){
						echo "<h2>Comments ".$author." has added to recipes.</h2>";
						foreach($comments as $row){
								$comment = $row->comment;
							    $author = $row->author; 
							    $recipe_id = $row->recipeId; 
							    $recipe_rating = $row->rating; 
							    $recipe_title = $row->recipeTitle;
							echo "<div class='comment-container'>";
								//echo "<div class='corner-graphic'></div>";
								echo "<div class='row cmnt-header'>";
									echo "<div class='small-6 columns'>";
										echo "<h2>".$recipe_title."</h2>";
									echo "</div>";
									echo "<div class='small-6 columns'>";
										echo "<div class='rating'>";
											if($recipe_rating > 0){
												for($i = 0;$i<$recipe_rating;$i++){
													echo '<i class="fi fi-star left"></i>';
												}
											}else{
												echo '<i class="fi fi-skull"></i>';
											} 
										echo "</div>";
									echo "</div>";
								echo "</div>";
								echo "<div class='row'>";
									echo "<div class='small-12 column'>";
										echo "<div class='comment'>";
											echo "<p class='recipe-comment'><i class='fi-comment'></i> " . $comment . "</p>";
										echo "</div>";//end of comment
									echo "</div>";
								echo "</div>";
								echo "<div class='row'>";
									echo "<div class='small-12 column'>";
										echo "<button class='btn goto-btn'><a href='".site_url('addRecipe/recipe/'.$recipe_id)."'>Go to recipe <i class='fi fi-arrow-right'></i></a><div class='corner-graphic'></div></button>";
									echo "</div>";
								echo "</div>";
							echo "</div>";//end of comment-container
						}
					}else{
						echo "<h2>".$author." has not added any comments to recipes yet.</h2>";
					}
				?>
			</div>
		</div>
	</div>
</div>

