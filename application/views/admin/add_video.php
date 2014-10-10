<h1 class="heading">Media / Videos</h1>

<?php echo $this->session->flashdata('feedback');?>

<?php echo form_open('admin/add_video', array('data-toggle'=> 'validator')); ?>
	<h1>ADD VIDEO</h1>
	<div class="form-group">
		<input type="text" name="video_name" id="video_name" class="form-control" maxlength="35" placeholder="Video topic" required>
	</div>
	<div class="form-group">
		<textarea name="embed_code" id="embed_code" class="form-control" placeholder="embed-code" required><?php echo set_value('embed_code'); ?></textarea>
		<div class="help-block with-errors"></div>
	</div>

    <div class="submit">
		<button type="submit" class="btn btn-default">Submit</button>
	</div>
<?php echo form_close(); ?>
	<div class="row-separator"
		<?php if(!empty($records)): foreach($records as $row):?>
			<div>
					<?php echo $row->video_name."</br>"; 
					      echo $row->embed_code."</br>"; 
			 		echo anchor("admin/delete_video/$row->video_id", "<span class='glyphicon glyphicon glyphicon-trash'></span>");?> 
			</div></br>
			<?php endforeach;?>
	</div>

	<?php else : ?>
		<h4>No videos</h4>

	<?php endif;?>
