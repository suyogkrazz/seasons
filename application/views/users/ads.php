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
						<?php echo $detail[0]->video; ?>
					<?php else: ?>
						Video Not Available
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>