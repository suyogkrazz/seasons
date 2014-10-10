<h1 class="heading">Special / Edit</h1>

<?php echo form_open('admin/special_edit_post',  array('role'=>'form', 'class'=>'form-horizontal')); ?>
<?php foreach($records as $rows): ?>

<div class="form-group">
	<label class="col-sm-2 control-label">Title :</label>
	<div class="col-sm-10">
		<input type="text" name="title" class="form-control" value="<?php echo $rows->name; ?>" required>
	</div>
</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Content :</label>
		<div class="col-sm-10">
			<textarea name="content" id="body" class="form-control">
				<?php echo $rows->content; ?>
			</textarea>
			<script>
		        CKEDITOR.replace( 'body' );
		    </script>
		</div>
    </div>

<input type="hidden" name="id" value="<?php echo $rows->id ?>">
<?php endforeach; ?>

	<div class="form-group">
    	<div class="col-sm-2"></div>
    	<div class="col-sm-10">
    		<div class="submit">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
    	</div>
    </div>

<?php echo validation_errors(); ?>

<?php echo form_close(); ?>