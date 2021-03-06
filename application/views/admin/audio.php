<h1 class="heading">Advertisement / Add Audio</h1>

<?php echo form_open_multipart('admin/add_audio', array('class'=>'form-horizontal', 'data-toggle'=>'validator')) ?>

<div class="form-group">
	<label class="col-sm-2 control-label">Choose mp3 file</label>
	<div class="col-sm-3">
		<input type="file" name="audio" required accept="audio/mp3">
	</div>
	<div class="col-sm-4">
		<div class="help-block with-errors"></div>
	</div>
</div>

<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">

<div class="form-group">
	<div class="col-sm-2"></div>
	<div class="col-sm-3">
		<input type="submit" value="Add" class="btn btn-primary">
	</div>
</div>

<?php echo form_close() ?>

<?php $ad = $this->db->where('id', $this->uri->segment(3))->get('package')->result() ?>

<?php if(empty($ad)): ?>
	<?php echo "404 Page Not Found"; exit(); ?>
<?php else: ?>
	<div class="sub-heading">Audio For <?php echo $ad[0]->name; ?></div>
	<?php if(!empty($ad[0]->audio)): ?>
		<div>
			<audio controls>
			  <source src="<?php echo base_url('assets/audio/'.$ad[0]->audio); ?>" type="audio/mpeg">
			Your browser does not support the audio element.
			</audio>
		</div>
		<div>
			<a href="<?php echo base_url('admin/remove_audio/'.$ad[0]->id) ?>" class="btn btn-warning">Delete</a>
		</div>
	<?php else: ?>
		No Audio Added.
	<?php endif; ?>
<?php endif; ?>