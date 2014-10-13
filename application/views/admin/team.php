<h1 class="heading">Add Team Members</h1>

<?php echo form_open_multipart('admin/add_member', array('class'=>'form-horizontal', 'data-toggle'=>'validator')) ?>

	<div class="form-group">
		<label class="col-sm-2 control-label">Name</label>
		<div class="col-sm-5">
			<input type="text" name="name" placeholder="Name of your staff" class="form-control" required>
		</div>
		<div class="col-sm-5">
			<div class="help-block with-errors"></div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Post</label>
		<div class="col-sm-5">
			<input type="text" name="post" placeholder="Role of your staff" class="form-control" required>
		</div>
		<div class="col-sm-5">
			<div class="help-block with-errors"></div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Image</label>
		<div class="col-sm-5">
			<input type="file" name="image" accept="image/gif, image/jpeg, image/png">
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">About</label>
		<div class="col-sm-5">
			<textarea name="about" id="about"></textarea>
			<script type="text/javascript">
				CKEDITOR.replace('about');
			</script>
		</div>
	</div>

	<DIV class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-3">
			<input type="submit" value="Submit" class="btn btn-primary">
		</div>
	</DIV>


<?php echo form_close(); ?>

<hr>

<div class="row">
	

	<?php if(!empty($team)): ?>
		<div class="sub-heading">Available Members</div>
		<?php foreach($team as $t): ?>
			<div class="col-md-6 margin-buttom">
				<div class="row mem">
					<div class="col-md-4 abt-img">
						<img src="<?php echo base_url('assets/images/'.$t->path); ?>" class="thumbanil">
					</div>
					<div class="col-md-8">
						<h3 class="members"><?php echo $t->name; ?></h3>
						<div class="post"><?php echo $t->post; ?></div>
						<div class="desc"><?php echo $t->about; ?></div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

	<?php else: ?>
		<div class="sub-heading">No Team Members Found</div>
	<?php endif; ?>

</div>