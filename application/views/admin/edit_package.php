<h1 class="heading">Service / Advertise / Edit</h1>

<?php echo form_open_multipart('admin/events_postupdate/', array('role'=>'form', 'class'=>'form-horizontal'))?>

	<div class="form-group">
		<label class="col-sm-2 control-label">Name :</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="<?php echo $package[0]->name; ?>" name="name"  required>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Video :</label>
		<div class="col-sm-10">
			<input type="text" name="video" value="<?php echo $package[0]->video; ?>" placeholder="Place youtube embed code" class="form-control">
		</div>
	</div>

	<div>
		<label class="control-label">Contact Info :</label>
		<textarea name="info" id="body" required><?php echo $package[0]->info; ?></textarea>
		<script>
	        CKEDITOR.replace( 'body' );
	    </script>
	</div>

	<div>
		<label class="control-label">Description :</label>
		<textarea name="description" id="body1" required><?php echo $package[0]->description; ?></textarea>
		<script>
	        CKEDITOR.replace( 'body1' );
	    </script>
	</div>

	<input type="hidden" name="service_id" value="<?php echo $package[0]->ad_id ?>" >
	<input type="hidden" name="id" value="<?php echo $package[0]->id ; ?>" >
	<div class="submit">
		<button type="submit" class="btn btn-default">Update Advertisement</button>
	</div>
<?php echo form_close(); ?>

<hr />

<?php echo form_open_multipart('admin/Package_image_add/', array('role'=>'form', 'class'=>'form-horizontal'))?>

	<div class="form-group">
		<label class="col-sm-2 control-label">Image :</label>
		<div class="col-sm-10">
			<input type="file" id="file" name="file[]" multiple="multiple" accept="image/gif, image/jpeg, image/png" required/>
		</div>
	</div>

	<input type="hidden" name="package_id" value="<?php echo $package[0]->id ; ?>" >

	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<button type="submit" class="btn btn-default">Add</button>
		</div>
	</div>

<?php echo form_close(); ?>

<hr />

<div class="row">


	<?php foreach ($package_img as $photos):?>
		<div class="col-md-2">
			<div class="package-images">
				<a class="example-image-link thumb" href="<?php echo base_url('assets/images/'.$photos->path); ?>" data-lightbox="example-set" >
			<img class="example-image" height="100" width="100" src="<?php echo base_url('assets/images/'.$photos->path); ?>" alt=""/>
			</a>
				
				<div class="delete">
					<a href='<?php echo base_url("admin/delete_package_img/$photos->id"); ?>'><span class="glyphicon glyphicon glyphicon-trash"></span></a>
				</div>
			</div>
		</div>

	<?php endforeach; ?>

</div>