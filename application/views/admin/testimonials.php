<h1 class="heading">Testimonials</h1>

<?php echo form_open_multipart('admin/addtestimonials/', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator'))?>
	
<div class="form-group">
	<label class="col-sm-2 control-label">Image :</label>
	<div class="col-sm-10 upload">Choose File
		<input type="file" id="file" name="file" accept="image/gif, image/jpeg, image/png" required/>
		<div class="help-block with-errors"></div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Name :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" placeholder="Who?" id ="name" class="form-control" name="name" required>
		<div class="help-block with-errors"></div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Post :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" placeholder="What?" id ="title" name="title" class="form-control" required>
		<div class="help-block with-errors"></div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Description :</label>
	<div class="col-sm-10">
		<textarea name="message" id="mess" class="form-control" rows="5" required></textarea>
		<div class="help-block">Maximum 40 words.</div>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-2"></div>
	<div class="col-sm-10">
		<button type="submit" class="btn btn-default">Submit</button>
	</div>
</div>

<?php echo form_close(); ?>

<hr />

<?php foreach ($testimonials as $testimonials):?> 
	<div class="row testimonials">
		<div >
			<?php  echo img(array(
			'src'=>'assets/images/testimonials/'.$testimonials->path,
			'height'=> 90,
			'width'=> 'auto'
			));?>
		</div>
		<strong><?php echo $testimonials->name; ?> | <?php echo $testimonials->title; ?></strong>
		<div class="welcom-mes1"><?php echo $testimonials->description; ?></div>
		<h5 class="btn btn-danger color log-label">
			<?php  echo anchor("admin/deletetestimonials/".$testimonials->id,"Delete"); ?>
		</h5>
	</div>
	<hr />
<?php endforeach; ?>