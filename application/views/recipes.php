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
			<div class="recipes">
				<?php foreach($recipes as $row) : ?>
					<?php 
						$recipe_title =  $row->title;
						$recipe_id =  $row->id;
					    $recipe_description =  $row->description; 
					    $recipe_directions =  $row->directions; 
					    $posted =  $row->posted; 
					    $rating =  $row->stars; 
					    $image =  $row->image; 
					?>
					<div class="recipe">
						<div class="row top-heading">
							<div class="small-9 columns">
								<h1><?php echo $recipe_title; ?></h1>
							</div>
							<div class="small-3 columns">
								<h1>
									<?php 
										if($rating > 0){
											for($i = 0;$i<$rating;$i++){
												echo '<i class="fi fi-star left"></i>';
											}
										}else{
											echo '<i class="fi fi-skull"></i>';
										} 
									?>
								</h1>
							</div>
						</div><!-- END OF TOP-HEADING -->

						<div class="row bottom-info">
							<div class="row">
								<div class="small-12 column">
									<p class="description">
										<span>Description: </span>
										<?php if($recipe_description){
											echo $recipe_description;
										}else{
											echo "<blockquote>Their is currently no description for this recipe at the time. Feel free to update the recipe with a description of the recipe.</blockquote>";
										}?>
									</p>
								</div>
								<hr>
							</div>
								<?php if($image){
									echo '<div class="row">';
										echo '<div class="small-12 medium-4 left columns">';
											echo '<img src="' . site_url('assets/uploads/'. $image) . '" alt="" />';
											if($this->session->userdata('email') === 'theller5567@gmail.com'){
												echo '<button class="delete"><a href="' . site_url('uploadimage/delete_recipe/')."/".$recipe_id . '">Delete Recipe <i class="fi-trash"></i></a></button>';
											}
											echo '<button class="delete"><a href="' . site_url('comments/show_comment_id/')."/".$recipe_id . '">Comments <i class="fi-comments"></i></a></button>';
											echo '<button class="delete"><a href="' . site_url('addRecipe/show_recipe_id/')."/".$recipe_id . '">Edit <i class="fi-pencil"></i></a></button>';
										echo '</div>';
										echo '<div class="small-12 medium-8 right columns">';
											echo '<p class="directions"><span>Directions: </span>' . $recipe_directions . '</p>';
										echo '</div>';
									echo '</div>';
								}else{
									echo '<div class="row">';
										echo '<div class="small-12 medium-4 columns">';
											echo '<p class="lead">Currently thier is no image available, be the first to add an image to this recipe.</p>';
											if($this->session->userdata('email') === 'theller5567@gmail.com'){
												echo '<button class="delete"><a href="' . site_url('uploadimage/delete_recipe/')."/".$recipe_id . '">Delete Recipe <i class="fi-trash"></i></a></button>';
											}
											echo '<button class="delete"><a href="' . site_url('comments/show_comment_id/')."/".$recipe_id . '">Comments <i class="fi-comments"></i></a></button>';
											echo '<button class="delete"><a href="' . site_url('addRecipe/show_recipe_id/')."/".$recipe_id . '">Edit <i class="fi-pencil"></i></a></button>';
										echo '</div>';
										echo '<div class="small-12 medium-8 columns">';
											echo '<p class="directions"><span>Directions: </span>' . $recipe_directions . '</p>';

										echo '</div>';
									echo '</div>';
									echo '';
									} 
								?>
								<hr>
						</div><!-- END OF BOTTOM-INFO -->
					</div><!-- END OF RECIPE -->
				<?php endforeach; ?>
			</div><!-- END OF RECIPES -->
		</div>
	</div>
</div>