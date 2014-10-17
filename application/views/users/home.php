<div class="container-fluid ">
	<div class="container links">
		<ul class="go-quickly">
			<li>Go Quickly To<span class="glyphicon gly glyphicon-forward"></span></li>
			<li>Hotel(10)</li>
			<li>Cafe(9)</li>
			<li>Hospital(6)</li>
			<li>Restaurant(10)</li>
			<li>Radio(5)</li>
		</ul>
	</div>
	<div id="first-slider" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <?php $j=-1; foreach($first as $ol): ?>
		    <?php $j++; ?>
		   	<?php if($j==0): ?>
		    <li data-target="#first-slider" data-slide-to="<?php echo $j; ?>" class="active"></li>
		    <?php else :?>
		    <li data-target="#first-slider" data-slide-to="<?php echo $j; ?>"></li>
		    <?php endif; ?>
		<?php endforeach; ?>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	  	<?php $i=0; foreach($first as $slide): $i++; ?>
	  	<?php if($i==1): ?>
		    <div class="item active">
		      <img src="<?php echo base_url("assets/images/$slide->path") ?>">
		      <div class="carousel-caption">
		     	<a href="<?php echo base_url('ad/'.$slide->adid) ?>">
		       		<h3 class="topic1"><?php echo $slide->name; ?></h3>
		    		<p class="topic2"><?php echo $slide->description; ?></p>
		    	</a>
		      </div>
		    </div>
		<?php else: ?>
		    <div class="item">
		      <img src="<?php echo base_url("assets/images/$slide->path") ?>">
		      <div class="carousel-caption">
		     	<a href="<?php echo base_url('ad/'.$slide->adid) ?>">
		       		<h3 class="topic1"><?php echo $slide->name; ?></h3>
		    		<p class="topic2"><?php echo $slide->description; ?></p>
		    	</a>
		      </div>
		    </div>
		<?php endif; ?>
		<?php endforeach; ?>
	    
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#first-slider" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left"></span>
	  </a>
	  <a class="right carousel-control" href="#first-slider" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right"></span>
	  </a>
	</div>
	
	<?php if(!empty($banner[0]->banner1)): ?>
		<div class="ads darkness">		
			<?php $image = $this->db->where('ad_id', $banner[0]->banner1)->order_by('id', 'desc')->limit(1)->get('package_image')->result(); ?>
			<img src="<?php echo base_url('assets/images/'.$image[0]->path) ?>">
		</div>

		<div class="dark">
			<a href="<?php echo base_url('ad/'.$banner[0]->banner1) ?>">
				<?php $ban = $this->db->where('id', $banner[0]->banner1)->get('package')->result(); ?>
				<img src="<?php echo base_url('assets/images/banner/'.$ban[0]->banner) ?>">
			</a>
		</div>
	<?php else: ?>
		<div class="ads darkness">
			<img src="<?php echo base_url('assets/images/default.jpg'); ?>">
		</div>

		<div class="dark">
			<img src="<?php echo base_url('assets/images/default.jpg'); ?>">
		</div>
	<?php endif; ?>


	<div id="second-slider" class="carousel slide" data-ride="carousel">

	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <?php $j=-1; foreach($second as $ol): ?>
		    <?php $j++; ?>
		   	<?php if($j==0): ?>
		    <li data-target="#second-slider" data-slide-to="<?php echo $j; ?>" class="active"></li>
		    <?php else :?>
		    <li data-target="#second-slider" data-slide-to="<?php echo $j; ?>"></li>
		    <?php endif; ?>
		<?php endforeach; ?>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	  	<?php $i=0; foreach($second as $slide): $i++; ?>
	  	<?php if($i==1): ?>
		    <div class="item active">
		      <img src="<?php echo base_url("assets/images/$slide->path") ?>">
		      <div class="carousel-caption">
		      <a href="<?php echo base_url('ad/'.$slide->adid) ?>">
		       		<h3 class="topic1"><?php echo $slide->name; ?></h3>
		    		<p class="topic2"><?php echo $slide->description; ?></p>
		    	</a>
		      </div>
		    </div>
		<?php else: ?>
		    <div class="item">
		      <img src="<?php echo base_url("assets/images/$slide->path") ?>">
		      <div class="carousel-caption">
		      <a href="<?php echo base_url('ad/'.$slide->adid) ?>">
		       		<h3 class="topic1"><?php echo $slide->name; ?></h3>
		    		<p class="topic2"><?php echo $slide->description; ?></p>
		    	</a>
		      </div>
		    </div>
		<?php endif; ?>
		<?php endforeach; ?>
	    
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#second-slider" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left"></span>
	  </a>
	  <a class="right carousel-control" href="#second-slider" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right"></span>
	  </a>
	</div>

	<?php if(!empty($banner[0]->banner2)): ?>
		<div class="ads  darkness1">
			<?php $image = $this->db->where('ad_id', $banner[0]->banner2)->order_by('id', 'desc')->limit(1)->get('package_image')->result(); ?>
			<img src="<?php echo base_url('assets/images/'.$image[0]->path) ?>">
		</div>

		<div class="dark">
			<a href="<?php echo base_url('ad/'.$banner[0]->banner2) ?>">
				<?php $ban = $this->db->where('id', $banner[0]->banner2)->get('package')->result(); ?>
				<img src="<?php echo base_url('assets/images/banner/'.$ban[0]->banner) ?>">
			</a>
		</div>
	<?php else: ?>
		<div class="ads darkness1">
			<img src="<?php echo base_url('assets/images/default.jpg'); ?>">
		</div>

		<div class="dark">
			<img src="<?php echo base_url('assets/images/default.jpg'); ?>">
		</div>
	<?php endif; ?>

	<div id="third-slider" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <?php $j=-1; foreach($third as $ol): ?>
		    <?php $j++; ?>
		   	<?php if($j==0): ?>
		    <li data-target="#third-slider" data-slide-to="<?php echo $j; ?>" class="active"></li>
		    <?php else :?>
		    <li data-target="#third-slider" data-slide-to="<?php echo $j; ?>"></li>
		    <?php endif; ?>
		<?php endforeach; ?>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	  	<?php $i=0; foreach($third as $slide): $i++; ?>
	  	<?php if($i==1): ?>
		    <div class="item active">
		      <img src="<?php echo base_url("assets/images/$slide->path") ?>">
		      <div class="carousel-caption">
		      <a href="<?php echo base_url('ad/'.$slide->adid) ?>">
		       		<h3 class="topic1"><?php echo $slide->name; ?></h3>
		    		<p class="topic2"><?php echo $slide->description; ?></p>
		    	</a>
		      </div>
		    </div>
		<?php else: ?>
		    <div class="item">
		      <img src="<?php echo base_url("assets/images/$slide->path") ?>">
		      <div class="carousel-caption">
		      <a href="<?php echo base_url('ad/'.$slide->adid) ?>">
		       		<h3 class="topic1"><?php echo $slide->name; ?></h3>
		    		<p class="topic2"><?php echo $slide->description; ?></p>
		    	</a>
		      </div>
		    </div>
		<?php endif; ?>
		<?php endforeach; ?>
	    
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#third-slider" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left"></span>
	  </a>
	  <a class="right carousel-control" href="#third-slider" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right"></span>
	  </a>
	</div>

	<?php if(!empty($banner[0]->banner3)): ?>
		<div class="ads darkness2">
			<?php $images = $this->db->where('ad_id', $banner[0]->banner3)->order_by('id', 'desc')->limit(1)->get('package_image')->result(); ?>
				<img src="<?php echo base_url('assets/images/'.$images[0]->path) ?>">
		</div>
		<div class="dark">
			<a href="<?php echo base_url('ad/'.$banner[0]->banner3) ?>">
				<?php $ban = $this->db->where('id', $banner[0]->banner3)->get('package')->result(); ?>
				<img src="<?php echo base_url('assets/images/banner/'.$ban[0]->banner) ?>">
			</a>
		</div>
	<?php else: ?>
		<div class="ads darkness2">
			<img src="<?php echo base_url('assets/images/default.jpg'); ?>">
		</div>

		<div class="dark">
			<img src="<?php echo base_url('assets/images/default.jpg'); ?>">
		</div>
	<?php endif; ?>

	<div id="fourth-slider" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <?php $j=-1; foreach($fourth as $ol): ?>
		    <?php $j++; ?>
		   	<?php if($j==0): ?>
		    <li data-target="#fourth-slider" data-slide-to="<?php echo $j; ?>" class="active"></li>
		    <?php else :?>
		    <li data-target="#fourth-slider" data-slide-to="<?php echo $j; ?>"></li>
		    <?php endif; ?>
		<?php endforeach; ?>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	  	<?php $i=0; foreach($fourth as $slide): $i++; ?>
	  	<?php if($i==1): ?>
		    <div class="item active">
		      <img src="<?php echo base_url("assets/images/$slide->path") ?>">
		      <div class="carousel-caption">
		     <a href="<?php echo base_url('ad/'.$slide->adid) ?>">
		       		<h3 class="topic1"><?php echo $slide->name; ?></h3>
		    		<p class="topic2"><?php echo $slide->description; ?></p>
		    </a>
		      </div>
		    </div>
		<?php else: ?>
		    <div class="item">
		      <img src="<?php echo base_url("assets/images/$slide->path") ?>">
		      <div class="carousel-caption">
		      <a href="<?php echo base_url('ad/'.$slide->adid) ?>">
		       		<h3 class="topic1"><?php echo $slide->name; ?></h3>
		    		<p class="topic2"><?php echo $slide->description; ?></p>
		    </a>
		      </div>
		    </div>
		<?php endif; ?>
		<?php endforeach; ?>
	    
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#fourth-slider" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left"></span>
	  </a>
	  <a class="right carousel-control" href="#fourth-slider" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right"></span>
	  </a>
	</div>

	<?php if(!empty($banner[0]->banner4)): ?>
		<div class="ads darkness3">
			<?php $image = $this->db->where('ad_id', $banner[0]->banner4)->order_by('id', 'desc')->limit(1)->get('package_image')->result(); ?>		
			<img src="<?php echo base_url('assets/images/'.$image[0]->path) ?>">
		</div>
		<div class="dark">
			<a href="<?php echo base_url('ad/'.$banner[0]->banner4) ?>">
				<?php $ban = $this->db->where('id', $banner[0]->banner4)->get('package')->result(); ?>
				<img src="<?php echo base_url('assets/images/banner/'.$ban[0]->banner) ?>">
			</a>
		</div>
	<?php else: ?>
		<div class="ads darkness3">
			<img src="<?php echo base_url('assets/images/default.jpg'); ?>">
		</div>

		<div class="dark">
			<img src="<?php echo base_url('assets/images/default.jpg'); ?>">
		</div>
	<?php endif; ?>

	<div id="fifth-slider" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <?php $j=-1; foreach($fifth as $ol): ?>
		    <?php $j++; ?>
		   	<?php if($j==0): ?>
		    <li data-target="#fifth-slider" data-slide-to="<?php echo $j; ?>" class="active"></li>
		    <?php else :?>
		    <li data-target="#fifth-slider" data-slide-to="<?php echo $j; ?>"></li>
		    <?php endif; ?>
		<?php endforeach; ?>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	  	<?php $i=0; foreach($fifth as $slide): $i++; ?>
	  	<?php if($i==1): ?>
		    <div class="item active">
		      <img src="<?php echo base_url("assets/images/$slide->path") ?>">
		      <div class="carousel-caption">
		      <a href="<?php echo base_url('ad/'.$slide->adid) ?>">
		       		<h3 class="topic1"><?php echo $slide->name; ?></h3>
		    		<p class="topic2"><?php echo $slide->description; ?></p>
		    </a>
		      </div>
		    </div>
		<?php else: ?>
		    <div class="item">
		      <img src="<?php echo base_url("assets/images/$slide->path") ?>">
		      <div class="carousel-caption">
		      <a href="<?php echo base_url('ad/'.$slide->adid) ?>">
		       		<h3 class="topic1"><?php echo $slide->name; ?></h3>
		    		<p class="topic2"><?php echo $slide->description; ?></p>
		   	</a>
		      </div>
		    </div>
		<?php endif; ?>
		<?php endforeach; ?>
	    
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#fifth-slider" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left"></span>
	  </a>
	  <a class="right carousel-control" href="#fifth-slider" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right"></span>
	  </a>
	</div>

	<?php if(!empty($banner[0]->banner5)): ?>
		<div class="ads darkness4">
			<?php $image = $this->db->where('ad_id', $banner[0]->banner5)->order_by('id', 'desc')->limit(1)->get('package_image')->result(); ?>
			<img src="<?php echo base_url('assets/images/'.$image[0]->path) ?>">
		</div>
		<div class="dark">
			<a href="<?php echo base_url('ad/'.$banner[0]->banner5) ?>">
				<?php $ban = $this->db->where('id', $banner[0]->banner5)->get('package')->result(); ?>
				<img src="<?php echo base_url('assets/images/banner/'.$ban[0]->banner) ?>">
			</a>
		</div>
	<?php else: ?>
		<div class="ads darkness4">
			<img src="<?php echo base_url('assets/images/default.jpg'); ?>">
		</div>

		<div class="dark">
			<img src="<?php echo base_url('assets/images/default.jpg'); ?>">
		</div>
	<?php endif; ?>

</div>
