<body>
<div id="navigation-header">
	<div class="small-12 medium-8 columns removePadding">
		<div class="logo">
			<a class="" href="<?php echo site_url('login/members') ?>"><h1>Heller<span>Recipes</span></h1></a>
		</div>
		<div class="page-title">
				<?php 
					if($this->uri->segment(1) === 'login' && $this->uri->segment(2) === 'members'){
						echo "<p>| Members</p>";
					}
					if($this->uri->segment(1) === 'login' && $this->uri->segment(2) == null){
						echo "<p>| Login</p>";
					}
					if($this->uri->segment(1) === 'addRecipe' && $this->uri->segment(2) === 'stopwatch'){
						echo "<p>| Stop Watch</p>";
					}
					if($this->uri->segment(1) === 'addRecipe' && $this->uri->segment(2) == null){
						echo "<p>| Add Recipe</p>";
					}
					if($this->uri->segment(1) === 'login' && $this->uri->segment(2) === 'view_users'){
						echo "<p>| view_users</p>";
					}
					if($this->uri->segment(1) === 'addRecipe' && $this->uri->segment(2) === 'recipes'){
						echo "<p>| Recipes Book</p>";
					}
					if($this->uri->segment(1) === 'addRecipe' && $this->uri->segment(2) === 'search'){
						echo "<p>| Recipes - Search Results</p>";
					}
					if($this->uri->segment(1) === 'addRecipe' && $this->uri->segment(2) === 'show_recipe_id'){
						echo "<p>| Recipes - Update Recipe</p>";
					}
					if($this->uri->segment(1) === 'login' && $this->uri->segment(2) === 'signup'){
						echo "<p>| Recipes - Create Account</p>";
					}
					if($this->uri->segment(1) === 'login' && $this->uri->segment(2) === 'signin'){
						echo "<p>| Login</p>";
					}
					if($this->uri->segment(1) === 'login' && $this->uri->segment(2) === 'login_validation'){
						echo "<p>| Login</p>";
					}
				?>
		</div>
	</div>
	<div class="small-12 medium-4 columns removePadding">
		<div class="menu-toggle">
		<?php 
			if($this->session->userdata('email') === 'theller5567@gmail.com'){
				if($this->session->userdata('is_logged_in')){
					$session_fn = $this->session->userdata('firstname');
					echo "<span class='username'>Hello ".$session_fn." - Admin</span>";
				}else {
					echo "";
				}
			}else{
				if($this->session->userdata('is_logged_in')){
					$session_fn = $this->session->userdata('firstname');
					echo "<span class='username'>Hello ".$session_fn."</span>";
				}else {
					echo "";
				}
			}
			
		?>
		</div>
	</div>
</div>
