<h1 class="heading">Dashboard</h1>

<div class="row">
	<div class="title-heading"><h2>Categories</h2></div>
	<?php $dash_services = $this->db->order_by('id', 'desc')->get('categories')->result(); ?>
	<?php foreach($dash_services as $dash): ?>
		<div class="col-md-3">
			<div class="services-home">
			<a href="<?php echo base_url('admin/service_detail/'.$dash->id) ?>">
				<div class="service-info-title"><?php echo $dash->name; ?></div>
				<div class="package-number">
					<?php $pack_num = $this->db->where('ad_id', $dash->id)->get('package')->num_rows; ?>
					<div class="row"><?php echo $pack_num; ?></div>
					<div class="row">Ads</div>
				</div>
			</a>
			</div>
		</div>
	<?php endforeach; ?>
	<div class="row">
		<a href="<?php echo base_url('admin/services') ?>">View All</a>
	</div>
</div>