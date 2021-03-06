
<?php if(!empty($records)): ?>
<div class="faq-header">
	<div class="container">
		<?php if(!empty($search_content)): ?>
			<h1>Search results for <?php echo $search_content; ?></h1>
		<?php else: ?>
			<?php $topic = $this->db->where('id', $this->uri->segment(2))->get('categories')->result(); ?>
			<h1><?php echo $topic[0]->name; ?></h1>
		<?php endif; ?>
	</div>
</div>
<div class="container qns">
	<?php foreach($records as $row): ?>
	<div class="row search-row">
		<div class="col-md-3">
			<?php $img = $this->db->where('ad_id', $row->id)->limit(1)->order_by('id', 'desc')->get('package_image')->result(); ?>
			<img class="thumbnail search-img" src="<?php echo base_url("assets/images/".$img[0]->path); ?>">
		</div>
		<div class="col-md-9">
			<table class="table table-font">
			  <tr>
			  	<td><?php echo anchor("ad/$row->id", $row->name); ?></td>
			  </tr>
			  <tr>
			  	<td><?php echo $row->info; ?></td>
			  </tr>
			  <tr>
			  	<td><?php echo word_limiter($row->description, 20); ?></td>
			  </tr>
			</table>
			<div>
				<button type="button" class="btn btn-success btn-costum"><?php echo anchor("ad/$row->id", 'View More'); ?></button>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
<?php else: ?>
	<div class="container not-found"> 
		Content Not Found
	</div>
<?php endif; ?>