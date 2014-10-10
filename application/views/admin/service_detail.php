<h1 class="heading">Service / Packages</h1>

<div class="submit">
	<div class="btn btn-default submit btn-log"><?php echo anchor('admin/add_events/'.$service[0]->id, "Add Package") ?></div>
</div>


<?php $serviceName = $this->db->where('id', $this->uri->segment(3))->get('service')->result(); ?>
<div class="sub-heading"><?php echo ucfirst($serviceName[0]->name); ?> Packages</div>
<table class="table table-striped">
	<tr>
		<th>id</th>
		<th>Name</th>
		<th>Action</th>
	</tr>
<?php $i=1; foreach ($package as $pack): ?>
	<tr class="warning">
		<td>
			<?php echo $i++; ?>
		</td>
		<td>
			<a href='<?php echo site_url()."admin/edit_package/$pack->id" ?>'>
				<?php echo $pack->name; ?>
			</a>
		</td>
			
		<td>
			<?php  echo anchor("admin/delete_package/".$pack->id,"Delete"); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>