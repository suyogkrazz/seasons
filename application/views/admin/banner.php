<?php if(!empty($ads)): ?>

<?php echo form_open('admin/banner_update', array('class'=>'form-horizontal')); ?>

<div class="form-group">
	<div class="row">
		<label class="col-sm-2 control-label">Select Ad</label>
		<div class="col-sm-7">
			<select name="ad_id" class="form-control">
				<?php foreach($ads as $ad): ?>
					<option value="<?php echo $ad->id; ?>"><?php echo $ad->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>	
</div>

<div class="form-group">
	<div class="row">
		<label class="col-sm-2 control-label">For</label>
		<div class="col-sm-7">
			<select name="banner" class="form-control">
				<option value="banner1">Banner 1</option>
				<option value="banner2">Banner 2</option>
				<option value="banner3">Banner 3</option>
				<option value="banner4">Banner 4</option>
				<option value="banner5">Banner 5</option>
			</select>
		</div>
	</div>	
</div>

<div class="form-group">
	<div class="col-sm-2"></div>
	<div class="col-sm-3">
		<input type="submit" value="Update" class="btn btn-primary">
	</div>
</div>

<?php echo form_close(); ?>

<?php else: ?>
	<div>No Advertisements to add.</div>

<?php endif; ?>

<?php for($i=1; $i<=5; $i++): ?>
	<hr>
	<?php echo "<strong>Banner ".$i."</strong>"; ?>
	<div class="row">
		<?php $bannerid = 'banner'.$i; ?>
		<?php foreach($banner as $ad): ?>
			<?php $name = $this->db->where('id', $ad->$bannerid)->get('package')->result(); ?>
		<?php endforeach; ?>
		<strong><?php echo $name[0]->name; ?></strong><br>
		<?php $image = $this->db->where('ad_id', $name[0]->id)->order_by('id','desc')->limit(1)->get('package_image')->result(); ?>
		<img src="<?php echo base_url('assets/images/'.$image[0]->path); ?>" height='100px' width="400px">
	</div>
<?php endfor; ?>