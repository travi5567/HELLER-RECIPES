<div class="view_users-container">
	<div class="row">
		<div class="small-12 columns">
			<?php foreach($user_info as $row) : ?>
				<?php 
					$user_name = $row->firstname;
				    $user_email = $row->email; 
				?>
				<button class="btn"><a href="<?php echo site_url('users/show_comment_user/'.$user_name.'');?>"><i class="fi-torso"></i><?php echo $user_name ?></a></button>
				<div class="user">
					
				</div>
			<? endforeach; ?>
		</div>
	</div>
</div>

