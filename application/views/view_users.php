<div class="view_users-container">
	<div class="row">
		<div class="small-12 columns">
			<?php foreach($user_info as $row) : ?>
				<?php 
					$user_name = $row->firstname;
				    $user_email = $row->email; 
				?>
				<button class="btn"><?php echo $user_name ?></button>
			<? endforeach; ?>
		</div>
	</div>
</div>

