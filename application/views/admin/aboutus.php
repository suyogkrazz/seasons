<h1 class="heading">About Us</h1>

<div>
	<strong>Image For Company Profile :</strong>
	<?php echo form_open_multipart('admin/add_image'); ?>
		<?php foreach($about as $m): ?>
			<div>
				<img id="imagePreview1" src='<?php echo base_url("assets/images/$m->path"); ?>' width="180px" height="180px">
				<img id="imagePreview" width="120px" height="120px">
			</div>
		<?php endforeach; ?>
		<div class="choose">
			<button class="btn btn-default changeImage">Change</button>
			<input type="file" class="btn imageFile" id="uploadImage" name="file" accept="image/gif, image/jpeg, image/png" required/>
		</div>
		<div class="submit">
			<button type="submit" class="btn btn-default">Update</button>
		</div>
	<?php echo form_close(); ?>
</div>

<hr />

<div>
	<strong>About Us :</strong>
	<?php echo form_open('admin/addaboutus'); ?>
		<div>
			<textarea name="about" id="about">
			<?php foreach($about as $m): ?>
				<?php echo $m->description; ?>
			<?php endforeach; ?>
			</textarea>
		</div>
		<script type="text/javascript">
			CKEDITOR.replace('about');
		</script>
		<div class="submit">
			<button type="submit" class="btn btn-default">Update</button>
		
	<?php echo form_close(); ?>
</div>