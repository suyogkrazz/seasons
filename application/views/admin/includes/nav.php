<div class="dashboard-wrapper">
	<div class="row">
		<nav class="nav navbar-default navigation">
			<div class="dashboard-topic">Fishtail Travel</div>
			<ul class="logout">
				<li class="settings"><a href="<?php echo base_url('admin/settings'); ?>"><span class="glyphicon glyphicon-cog"></span></a></li>
				<li><a href="<?php echo base_url('admin/logout'); ?>"><span class="glyphicon glyphicon-off"></span></a></li>
			</ul>
		</nav>
		<div class="col-md-3 sidebar">
			<div class="welcome">
				<div class="user-image">
					<?php $picture = $this->db->select('image')->get('admin')->result(); ?>
					<?php $picture = $picture[0]->image; ?>
					<?php if(strcmp($picture, '') != 0): ?>
						<img src="<?php echo base_url('assets/images/'.$picture); ?>" height="80px" width="80px">
					<?php else: ?>
						<img src="<?php echo base_url('assets/images/default.jpg'); ?>" height="80px" width="80px">
					<?php endif; ?>
				</div>
				<div class="username">Welcome <?php echo ucfirst($this->session->userdata('admin')); ?></div>
			</div>
			<nav>
				<ul class="sidebar-navigation">
					<li><a href="<?php echo base_url('admin'); ?>"><span class="glyphicon glyphicon-dashboard fav-icon"></span>Dashboard</a></li>
					<li><a href="<?php echo base_url('admin/aboutus'); ?>"><span class="glyphicon glyphicon-flag fav-icon"></span>About Us</a></li>
					<li><a href="<?php echo base_url('admin/slider'); ?>"><span class="glyphicon glyphicon-picture fav-icon"></span>Slider</a></li>
					<li><a href="<?php echo base_url('admin/banner'); ?>"><span class="glyphicon glyphicon-tag fav-icon"></span>Banner</a></li>
					<li><a href="<?php echo base_url('admin/team'); ?>"><span class="glyphicon glyphicon-user fav-icon"></span>Team</a></li>
					
					<div class="panel-group nav-panel-group" id="navaccordian">					
						<div class="panel panel-default nav-panel">
							<div class="panel-heading nav-panel-heading">
								<li><a href="#services" data-toggle="collapse" data-parent="#navaccordian"><span class="glyphicon glyphicon-ok-sign fav-icon"></span>Categories<span class="glyphicon glyphicon-chevron-down drop-up"></span></a></li>
							</div>
							<div class="panel-collapse collapse" id="services">
								<div class="panel-body nav-panel-body">
									<li>
										<ul>
											<li>
												<a href="<?php echo base_url('admin/services'); ?>">												
													<div class="paneloption">
														Add New
													</div>
												</a>
											</li>

											<?php $service = $this->db->order_by('id', 'desc')->get('categories')->result(); ?>
											<?php foreach($service as $service): ?>
											<li>
												<a href="<?php echo base_url('admin/service_detail/'.$service->id)?>">												
													<div class="paneloption">
														<?php echo $service->name; ?>
													</div>
												</a>
											</li>
											<?php endforeach; ?>
										</ul>
									</li>
								</div>
							</div>
						</div>

					</div>


				</ul>
			</nav>

		</div>