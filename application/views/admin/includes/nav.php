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

						<div class="panel panel-default nav-panel">
							<div class="panel-heading nav-panel-heading">
								<li><a href="#medias" data-toggle="collapse" data-parent="#navaccordian"><span class="glyphicon glyphicon-picture fav-icon"></span>Media<span class="glyphicon glyphicon-chevron-down drop-up"></span></a></li>
							</div>
							<div class="panel-collapse collapse" id="medias">
								<div class="panel-body nav-panel-body">
									<li>
										<ul>
											<li>
												<a href="<?php echo base_url('admin/slider'); ?>">												
													<div class="mediapaneloption">
														Add Slider
													</div>												
												</a>
											</li>

											<li>
												<a href="<?php echo base_url('admin/album'); ?>">
													<div class="mediapaneloption">
														Add Album
													</div>
												</a>
											</li>

											<li>
												<a href="<?php echo base_url('admin/video'); ?>">
													<div class="mediapaneloption">
														Add Video
													</div>
												</a>
											</li>
										</ul>
									</li>
								</div>
							</div>
						</div>

					</div>

					<li><a href="<?php echo base_url('admin/file'); ?>"><span class="glyphicon glyphicon-file fav-icon"></span>Files</a></li>
					<li><a href="<?php echo base_url('admin/special'); ?>"><span class="glyphicon glyphicon-star fav-icon"></span>Create Special Offer</a></li>


				</ul>
			</nav>

		</div>