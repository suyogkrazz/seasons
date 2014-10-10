<h1 class="heading">Add Services</h1>

<?php echo form_open_multipart('admin/addservices/', array('role'=>'form', 'class'=>'form-horizontal'))?>

	<div class="form-group">
		<label class="col-sm-2 control-label">Service Title :</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="service_name" name="service_name" autofocus required>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<button type="submit" class="btn btn-default">Add Service</button>
		</div>
	</div>

<?php echo validation_errors(); ?>

<?php echo form_close(); ?>

<table class="table table-striped">
	<tr>
		<th>id</th>
		<th>Name</th>
		<th>Action</th>
	</tr>
	<?php $i=1; foreach ($service as $services):?>
			<tr class="warning">
				<td>
					<?php echo $i++; ?>
				</td>
				<td>
					<a href='<?php echo site_url()."admin/service_detail/$services->id" ?>'>
						<?php echo $services->name; ?>
					</a>
				</td>
					
				<td>
					<?php  echo anchor("admin/deleteservice/".$services->id,"Delete"); ?>
				</td>
			</tr>
	<?php endforeach; ?>
</table>