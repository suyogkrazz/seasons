<h1 class="heading">Dashboard</h1>

<div class="row">
	<div class="col-md-7">
		<div class="services">
			<div class="title-heading">
				<h2>Latest Packages</h2>
			</div>
			<?php foreach($service as $services): ?>
				<div class="row dashboard-services">
					<div class="col-md-1"></div>
					<div class="col-md-2 service-image">
						<?php $image = $this->admin_model->get_dashboard_image($services->id); ?>

						<?php foreach($image as $images): ?>

							<?php if(empty($images->path)): ?>
								<img src="<?php echo base_url('assets/images/default.jpg'); ?>" height="80px" width="80px">
							<?php else: ?>							
								<img src="<?php echo base_url('assets/images/'.$images->path); ?>" height="80px" width="80px">
							<?php endif; ?>

						<?php endforeach; ?>
					</div>

					<div class="col-md-9">
						<div class="service-title">
							<strong>Name : </strong><a href="<?php echo base_url('admin/edit_package/'.$services->id) ?>"><?php echo $services->name; ?></a>
						</div>

						<div class="service-price">
							<strong>Price :</strong> $ <?php echo $services->price; ?>
						</div>

						<div class="service-of">
							<strong>Package Of : </strong>
							<?php $service = $this->db->where('id', $services->service_id)->get('service')->result(); ?>
							<a href="<?php echo base_url('admin/service_detail/'.$service[0]->id) ?>"><?php echo $service[0]->name; ?></a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="col-md-5">
		<div class="row slider-images">
			<div class="title-heading">
				<h2>Slider Images</h2>
			</div>

			<?php foreach($slider as $slider): ?>
				<div class="col-md-4">
					<img src="<?php echo base_url('assets/images/'.$slider->path); ?>">
				</div>
			<?php endforeach; ?>
			<a href="<?php echo base_url('admin/slider') ?>">View All Images</a>
		</div>

		<div class="row gallery-row">
			<div class="dashboard-gallery">
				<div class="title-heading">
					<h2>Gallery</h2>
				</div>
				<a href="<?php echo base_url('admin/album'); ?>"><span class="glyphicon glyphicon-th-large"></span></a>
			</div>
		</div>

		<div class="row gallery-row">
			<div class="dashboard-news">
				<div class="title-heading">
					<h2>News</h2>
				</div>
				<a href="<?php echo base_url('admin/news'); ?>"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="title-heading"><h2>Services</h2></div>
	<?php $dash_services = $this->db->order_by('id', 'desc')->limit(4)->get('service')->result(); ?>
	<?php foreach($dash_services as $dash): ?>
		<div class="col-md-3">
			<div class="services-home">
				<div class="service-info-title"><a href="<?php echo base_url('admin/service_detail/'.$dash->id) ?>"><?php echo $dash->name; ?></a></div>
				<div class="package-number">
					<?php $pack_num = $this->db->where('service_id', $dash->id)->get('package')->num_rows; ?>
					<div class="row"><?php echo $pack_num; ?></div>
					<div class="row">Packages</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<div class="row">
		<a href="<?php echo base_url('admin/services') ?>">View All Services</a>
	</div>
</div>