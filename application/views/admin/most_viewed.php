<?php echo form_open('admin/viewed', array('class'=>'form-horizontal')); ?>
<?php $records=$this->db->get('package')->result(); ?>

<div class="form-group">
	<label class="col-sm-2 control-label">Select package</label>
	<div class="col-sm-10">
		<select name="most" class="form-control">
			<?php foreach($records as $rows): ?>
				<option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-2"></div>
	<div class="col-sm-10">
		<button type="submit" class="btn btn-default">Add Most Viewed</button>
	</div>
</div>

<?php echo form_close(); ?>

<?php 
	$this->db->select("package.name,mostviewed.id");
	$this->db->from("package");
	$this->db->join("mostviewed", "mostviewed.package=package.id");
 	$results=$this->db->get()->result();
  ?>
<table class="table table-striped">
	<tr>
		<th>id</th>
		<th>Name</th>
		<th>Action</th>
	</tr>
<?php $i=1; foreach ($results as $pack): ?>
	<tr class="warning">
		<td>
			<?php echo $i++; ?>
		</td>
		<td>
				<?php echo $pack->name; ?>
		</td>
			
		<td>
			<?php  echo anchor("admin/delete_most/".$pack->id,"Delete"); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>