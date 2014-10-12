<?php $serviceName = $this->db->where('id', $this->uri->segment(3))->get('categories')->result(); ?>
<div class="sub-heading"><?php echo ucfirst($serviceName[0]->name); ?> / Add New</div>

<?php echo form_open_multipart('admin/events_post/', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator'))?>

	<div class="form-group">
		<label class="col-sm-2 control-label">Name :</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" placeholder="Name of hotel" name="name" required>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Image :</label>
		<div class="col-sm-10">
			<input type="file" id="file" name="file[]" multiple="multiple" accept="image/gif, image/jpeg, image/png">
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Video :</label>
		<div class="col-sm-10">
			<input type="text" name="video" placeholder="Place youtube embed code" class="form-control">
		</div>
	</div>

	<div>
		<label class="control-label">Contact Info :</label>
		<textarea name="info" id="body" required><?php echo set_value('description'); ?></textarea>
		<script>
	        CKEDITOR.replace( 'body' );
	    </script>
	</div>

	<div>
		<label class="control-label">Description :</label>
		<textarea name="description" id="body1" required><?php echo set_value(); ?></textarea>
		<script>
	        CKEDITOR.replace( 'body1' );
	    </script>
	</div>

	<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>" >

	<div class="submit">
		<button type="submit" class="btn btn-default">Submit</button>
	</div>

<?php echo form_close(); ?>