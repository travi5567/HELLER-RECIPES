<div class="error-container">
<?php $id = $this->uri->segment(3); ?>
	<h1>Are you sure you want to delete this recipe?</h1>
	<div class="row">
		<div class="small-12 column">
			<button class="btn-back"><a href='<?php echo base_url('uploadimage/delete_recipe/')."/".$id.""; ?>'>Yes</a></button>
			<button class="btn-back"><a href="javascript:window.history.go(-1);">Cancel</a></button>
		</div>
	</div>
</div>

