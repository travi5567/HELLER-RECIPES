<body>
<div class="bgOverlay"></div>
<div id="navigation-header">
	<div class="small-12 medium-8 columns removePadding">
		<div class="logo">
			<a class="" href="<?php echo site_url('login/members') ?>"><h1>Heller<span>Recipes</span></h1></a><?php 
					if($this->uri->segment(1) === 'login' && $this->uri->segment(2) === 'members'){
						echo "<p>| Members</p>";
					}
					if($this->uri->segment(1) === 'login' && $this->uri->segment(2) == null){
						echo "<p>| Login</p>";
					}
					if($this->uri->segment(1) === 'addRecipe' && $this->uri->segment(2) === 'stopwatch'){
						echo "<p>| Stop Watch</p>";
					}
					if($this->uri->segment(1) === 'uploadimage' && $this->uri->segment(2) == 'view_image'){
						echo "<p>| Add Recipe</p>";
					}
					if($this->uri->segment(1) === 'login' && $this->uri->segment(2) === 'view_users'){
						echo "<p>| view_users</p>";
					}
					if($this->uri->segment(1) === 'addRecipe' && $this->uri->segment(2) === 'recipes'){
						echo "<p>| Recipe Book</p>";
					}
					if($this->uri->segment(1) === 'addRecipe' && $this->uri->segment(2) === 'search'){
						echo "<p>| Recipes - Search Results</p>";
					}
					if($this->uri->segment(1) === 'addRecipe' && $this->uri->segment(2) === 'show_recipe_id'){
						echo "<p>| Recipes - Update Recipe</p>";
					}
					if($this->uri->segment(1) === 'login' && $this->uri->segment(2) === 'signup'){
						echo "<p>| Create Account</p>";
					}
					if($this->uri->segment(1) === 'login' && $this->uri->segment(2) === 'signin'){
						echo "<p>| Login</p>";
					}
					if($this->uri->segment(1) === 'login' && $this->uri->segment(2) === 'login_validation'){
						echo "<p>| Login</p>";
					}
					if($this->uri->segment(1) === 'comments'){
						echo "<p>| Comments</p>";
					}
					if($this->uri->segment(1) === 'users' && $this->uri->segment(2) == null){
						echo "<p>| Users</p>";
					}
					if($this->uri->segment(1) === 'users' && $this->uri->segment(2) === 'show_comment_user'){
						echo "<p>| User Profile</p>";
					}
					if($this->uri->segment(1) === 'addRecipe' && $this->uri->segment(2) === 'recipe'){
						echo "<p>| Recipe View</p>";
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
					echo "<span class='username'>Hello ".$session_fn." - Admin</span><a href='".site_url('login/logout')."'> | Logout</a>";
				}else {
					echo "";
				}
			}else{
				if($this->session->userdata('is_logged_in')){
					$session_fn = $this->session->userdata('firstname');
					echo "<span class='username'>Hello ".$session_fn."</span><a href='".site_url('login/logout')."'> | Logout</a>";
				}else {
					echo "";
				}
			}
			
		?>
		</div>
	</div>
</div>
