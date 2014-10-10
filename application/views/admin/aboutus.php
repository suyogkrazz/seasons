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
<div>
	<strong>Image For Chairman Profile :</strong>
	<?php echo form_open_multipart('admin/add_image_chair'); ?>
		<?php foreach($about as $m): ?>
			<div>
				<img id="chairmanPreview1" src='<?php echo base_url("assets/images/$m->chair_path"); ?>' width="180px" height="180px">
				<img id="chairmanPreview" width="120px" height="120px">
			</div>
		<?php endforeach; ?>
		<div class="choose">
			<button class="btn btn-default changeImage">Change</button>
			<input type="file" class="btn imageFile" id="uploadChairmanImage" name="file" accept="image/gif, image/jpeg, image/png" required/>
		</div>
		<div class="submit">
			<button type="submit" class="btn btn-default">Update</button>
		</div>
	<?php echo form_close(); ?>
</div>

<hr />

<div>
	<strong>My Message :</strong>
	<?php echo form_open('admin/add_message'); ?>
		<div>
			<textarea name="message" id="message">
			<?php foreach($about as $m): ?>
				<?php echo $m->message_from_chairman; ?>
			<?php endforeach; ?>
			</textarea>
		</div>
		<script type="text/javascript">
			CKEDITOR.replace('message');
		</script>
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

<div>
	<strong>Why Fishtail Adventure? :</strong>
	<?php echo form_open('admin/addwhy'); ?>
		<div>
			<textarea name="about" id="why">
			<?php foreach($about as $m): ?>
				<?php echo $m->why; ?>
			<?php endforeach; ?>
			</textarea>
		</div>
		<script type="text/javascript">
			CKEDITOR.replace('why');
		</script>
		<div class="submit">
			<button type="submit" class="btn btn-default">Update</button>
		
	<?php echo form_close(); ?>
</div>