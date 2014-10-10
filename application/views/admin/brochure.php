<div>
	<?php echo form_open_multipart('admin/addfile', array('role'=>'form', 'class'=>'form-horizontal'));?>
	 
	<div class="form-group">
		<label class="col-sm-2 control-label">Add Brochure :</label>
		<div class="col-sm-10">
			<input type="file" id="file" name="file"  accept="application/pdf" required/>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<button type="submit" class="btn btn-default">Add</button>
		</div>
	</div>

	<?php echo form_close(); ?>
</div>

<hr>

<a href='<?php echo base_url("assets/files/brochure.pdf"); ?>' target="_blank">View Brochure</a>