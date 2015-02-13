<?php 
	if($this->session->userdata('is_logged_in')){
		echo '<div id="bottom-nav">
			<div class="small-3 columns">
				<button class="button"><a href="'.site_url('login/members') .'"><i class="fi-home"></i>Home</a></button>
			</div>
			<div class="small-3 columns">
				<button class="button"><a href="'.site_url('addRecipe/stopwatch').'"><i class="fi-clock"></i>Stop Watch</a></button>
			</div>
			<div class="small-3 columns">
				<button class="button"><a href="'.site_url('addRecipe/recipes').'"><i class="fi-book"></i>Recipes</a></button>
			</div>
			<div class="small-3 columns">
				<button class="button"><a href="'.site_url('uploadimage/view_image').'"><i class="fi-plus"></i>Add Recipe</a></button>
			</div>
		</div><!-- END OF BOTTOM-NAV -->';
	} else {
		echo    '<div id="bottom-nav">
					<div class="small-12 column">
						
					</div>
				</div><!-- END OF BOTTOM-NAV -->';
	}
?>
