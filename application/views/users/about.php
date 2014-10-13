<div class=container>
	<div class="row abt-wrapper">
		<div class="col-md-8 about-us">
		<h3>Who are We?</h3>
			<?php echo strip_tags($about[0]->description); ?>
		</div>
		<div class="col-md-4 abt-img">
			<img src="<?php echo base_url('assets/images/'.$about[0]->path); ?>">
		</div>
	</div>
	<div><h2>Our Team Members</h2></div>
		<?php $i=1; foreach($team as $t): ?>
		<?php if($i==1): $i++;?>
		<div class="row">
			<div class="col-md-6 margin-buttom">
				<div class="row mem">
					<div class="col-md-4 abt-img"><img class="thumbnail" src="<?php echo base_url('assets/images/'.$t->path); ?>"></div>
					<div class="col-md-8">
						<h3 class="members"><?php echo $t->name; ?></h3>
						<div class="post"><?php echo $t->post; ?></div>
						<div class="desc">
							<?php echo $t->about; ?>
						</div>
					</div>
				</div>
			</div>
		<?php else: $i=1;?>
			<div class="col-md-6 margin-buttom">
				<div class="row mem">
					<div class="col-md-4 abt-img"><img class="thumbnail" src="<?php echo base_url('assets/images/'.$t->path); ?>"></div>
					<div class="col-md-8">
						<h3 class="members"><?php echo $t->name; ?></h3>
						<div class="post"><?php echo $t->post; ?></div>
						<div class="desc">
							<?php echo $t->about; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php endforeach; ?>

		<?php 
			$num = $this->db->get('team')->num_rows;
			if($num%2!=0):
				echo "</div>";
			endif;
		?>
	</div>
</div> 