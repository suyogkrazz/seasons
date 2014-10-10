<?php $serviceName = $this->db->where('id', $this->uri->segment(3))->get('service')->result(); ?>
<div class="sub-heading"><?php echo ucfirst($serviceName[0]->name); ?> / Add Packages</div>

<?php echo form_open_multipart('admin/events_post/', array('role'=>'form', 'class'=>'form-horizontal'))?>

	<div class="form-group">
		<label class="col-sm-2 control-label">Package Name :</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" placeholder="Name of package" name="name"  required>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Price :</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" placeholder="In $" name="price" required>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Image :</label>
		<div class="col-sm-10">
			<input type="file" id="file" name="file[]" multiple="multiple" accept="image/gif, image/jpeg, image/png" required/>
		</div>
	</div>

	<div>
		<label class="control-label">Package Description :</label>
		<textarea name="description" id="body" required><?php echo set_value('description'); ?></textarea>
		<script>
	        CKEDITOR.replace( 'body' );
	    </script>
	</div>

	<div>
		<label class="control-label">Package Detail :</label>
		<textarea name="detail" id="body1" required><?php echo set_value(); ?></textarea>
		<script>
	        CKEDITOR.replace( 'body1' );
	    </script>
	</div>

	<input type="hidden" name="service_id" value="<?php echo $this->uri->segment(3); ?>" >

	<div class="submit">
		<button type="submit" class="btn btn-default">Submit</button>
	</div>

<?php echo form_close(); ?>