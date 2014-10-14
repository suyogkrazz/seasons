<div class="faq-header">
	<div class="container">
		<h1><?php echo $detail[0]->name; ?></h1>
	</div>
</div>
<div class="qns container">
	<?php $image = $this->db->where('ad_id', $this->uri->segment(2))->order_by('id', 'desc')->limit(1)->get('package_image')->result(); ?>
	<div class="banner"><img src="<?php echo base_url('assets/images/'.$image[0]->path) ?>"></div>
	<div class="row separator">
		<div class="col-md-6 paddings">
			<div class="row">
			<?php if(!empty($images)): ?>
				<?php foreach($images as $img): ?>
					<div class="col-md-6 paddings banner-imgs"><img class="thumbnail" src="<?php echo base_url("assets/images/".$img->path); ?>"></div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-md-6 paddings banner-imgs"><img class="thumbnail" src="<?php echo base_url("assets/images/default.jpg"); ?>"></div>
			<?php endif; ?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="article">Info</div>
			<div class="article-desc">
				<?php echo $detail[0]->info; ?>
			</div>

			<div class="article">Article</div>
			<div class="article-desc">
				<?php echo $detail[0]->description; ?>
			</div>
			
			<div class="article">Other Medias</div>
			<div class="article-desc">
				<div class="row mem">
					<?php if(!empty($detail[0]->audio)): ?>
						<div class="medias">Audio</div>
						<audio controls>
					  		<source src="<?php echo base_url('assets/audio/'.$detail[0]->audio); ?>" type="audio/mpeg">
							Your browser does not support the audio element.
						</audio>
					<?php else: ?>
						Audio Not Available
					<?php endif; ?>
				</div>

				<div class="row mem">
					<div class="medias">Video</div>
					<?php if(!empty($detail[0]->video)): ?>
						<!-- Button trigger modal -->
						<a href="#" data-target=".bs-example-modal-lg" data-toggle="modal">Play this video</a>

						<!-- Modal -->
						<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel"><?php echo $detail[0]->name; ?></h4>
									</div>
									<div class="modal-body">
										<div class="container"><?php echo $detail[0]->video; ?></div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					<?php else: ?>
						Video Not Available
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>