<?php 
	if($this->session->userdata('is_logged_in')){
		echo '<div id="bottom-nav">
			<div class="small-3 columns">
				<div class="signin">
					<button class="button"><a href="'.site_url('login/members') .'">Home</a></button>
				</div>
			</div>
			<div class="small-3 columns">
				<div class="create-account">
					<button class="button"><a href="'.site_url('addRecipe/stopwatch').'">Stop Watch</a></button>
				</div>
			</div>
			<div class="small-3 columns">
				<div class="create-account">
					<button class="button"><a href="'.site_url('addRecipe/recipes').'">Recipes</a></button>
				</div>
			</div>
			<div class="small-3 columns">
				<div class="create-account">
					<button class="button"><a href="'.site_url('addRecipe').'">Add Recipes</a></button>
				</div>
			</div>
		</div><!-- END OF BOTTOM-NAV -->';
	} else {
		echo    '<div id="bottom-nav">
					<div class="small-12 column">
						
					</div>
				</div><!-- END OF BOTTOM-NAV -->';
	}
?>
