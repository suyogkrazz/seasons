<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php foreach($images as $img): ?>
				<img src="<?php echo base_url('assets/images/'.$img->path); ?>">
			<?php endforeach; ?>
		</div>

		<div class="col-md-4">
			<h3 class="row">Info</h3>
			<div class="row">
				<?php echo "<strong>".$detail[0]->name."</strong>"; ?>
				<?php echo $detail[0]->info; ?>
			</div>
		</div>		
	</div>

	<div class="row">
		<h2>Article</h2>
		<?php echo $detail[0]->description; ?>
	</div>

	<div class="row">
		<h2>Related Media</h2>
		<?php echo $detail[0]->video; ?>
	</div>
</div>