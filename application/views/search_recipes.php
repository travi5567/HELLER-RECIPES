<div class="recipes-container">
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
				<p><?php echo 'Results found for '.$searchKey; ?></p>
				<?php foreach($query as $row) : ?>
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
								<h1><?php if($rating > 0){echo $rating . '<i class="fi fi-star"></i>';}else{echo '<i class="fi fi-skull"></i>';} ?></h1>
							</div>
						</div><!-- END OF TOP-HEADING -->

						<div class="row bottom-info">
							<div class="small-8 columns">
								<p class="description">
									<?php if($recipe_description){
											echo $recipe_description;
										}else{
											echo "<blockquote>Their is currently no description for this recipe at the time. Feel free to update the recipe with a description of the recipe.</blockquote>";
										}
									?>
								</p>
								<p class="directions"><?php echo $recipe_directions; ?></p>
							</div>
							<div class="small-4 columns">
								<img src="<?php echo site_url('assets/uploads/'. $image);?>" alt="" />
							</div>
							<div class="small-12 column">
								<div class="small-6 columns">
									<a class="view-comments left" href="<?php echo site_url('comments/show_comment_id/')."/".$recipe_id; ?>">Comments <i class="fi-comments"></i></a>
								</div>
								<div class="small-6 columns">
									<a class="edit-recipe" href="<?php echo site_url('addRecipe/show_recipe_id/')."/".$recipe_id; ?>">Edit <i class="fi-pencil"></i></a>
								</div>
							</div>
						</div><!-- END OF BOTTOM-INFO -->
					</div><!-- END OF RECIPE -->
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

