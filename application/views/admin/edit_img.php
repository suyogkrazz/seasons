<?php echo form_open_multipart('admin/post_edit_image'); ?>
	Choose Chairman Image:
		<input type="file" id="file" name="file" accept="image/gif, image/jpeg, image/png" required/>
		<?php
			$obj = $this->uri->segment(3);
		?>
	<input type="hidden" name="field" value="<?php echo $obj; ?>">

	<input type="submit" value="Update">

<?php echo form_close(); ?>