<h1 class="heading">Add Album</h1>

<?php echo form_open_multipart('admin/addalbum/', array('data-toggle' => 'validator'))?>
  	<div class="form-group">
  		<input type="text"  class="form-control" id ="album_name" name="album_name" placeholder="Enter Album Name" required>
  		<div class="help-block with-errors"></div>
  	</div>
	<input type="submit" class="btn btn-default" value="Add album" >
<?php echo form_close(); ?>

<div class="row separator">
	<?php foreach($album as $album): ?>
	<div class="col-md-4 news-col">
		<div class="admin-album">

		<?php $image = $this->admin_model->get_album_cover_image($album->id); ?>

			<a href="<?php echo base_url('admin/images/'.$album->id) ?>">
				<div class='album-title'><?php echo $album->name; ?></div>

				<?php foreach($image as $images): ?>

					<?php if(empty($images->path)): ?>
						<img src="<?php echo base_url('assets/images/default.jpg'); ?>">
					<?php else: ?>							
						<img src="<?php echo base_url('assets/images/album/'.$images->path); ?>">
					<?php endif; ?>

				<?php endforeach; ?>
			</a>
			<div class="row">
				<div class="album-action action">
					<div class="col-md-6"><?php echo anchor("admin/deletealbum/$album->id", "<span class='glyphicon glyphicon-trash'></span>", array('data-toggle'=>'tooltip', 'title'=>'Delete'));	?></div>
					<div class="col-md-6"><?php echo anchor("admin/images/$album->id", "<span class='glyphicon glyphicon-plus'></span>", array('data-toggle'=>'tooltip', 'title'=>'Add Image')); ?></div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>