
<div class="row">
	<div class="container not-found"> 
		<?php echo $this->session->flashdata('feedback');?>
	</div>
	<?php if(!empty($records)): foreach($records as $row): ?>
		<div><?php echo anchor("ad/$row->id", $row->name); ?></div>
		<div><?php echo $row->info; ?></div>
	    <?php endforeach; ?>
	<?php endif; ?>
</div>
<!-- <div class="faq-header">
	<div class="container">
		<h1>Search reasults of Hotels</h1>
	</div>
</div>
<div class="container qns">
	<div class="row search-row">
		<div class="col-md-3">
			<img class="thumbnail search-img" src="<?php echo base_url("images/HD-Widescreen-Wallpapers-5.jpg") ?>">
		</div>
		<div class="col-md-9">
			<table class="table table-font">
			  <tr>
			  	<td>Name:</td>
			  	<td>Annapurna hotel</td>
			  </tr>
			  <tr>
			  	<td>Address:</td>
			  	<td>Lakeside,Pokhara</td>
			  </tr>
			  <tr>
			  	<td>Contact No:</td>
			  	<td>061-5284050,+977-98334958204</td>
			  </tr>
			</table>
			<div>
				<button type="button" class="btn btn-success btn-costum">View More</button>
			</div>
		</div>

	</div>
	<div class="row search-row">
		<div class="col-md-3">
			<img class="thumbnail search-img" src="<?php echo base_url("images/HD-Widescreen-Wallpapers-5.jpg") ?>">
		</div>
		<div class="col-md-9">
			<table class="table table-font">
			  <tr>
			  	<td>Name:</td>
			  	<td>Annapurna hotel</td>
			  </tr>
			  <tr>
			  	<td>Address:</td>
			  	<td>Lakeside,Pokhara</td>
			  </tr>
			  <tr>
			  	<td>Contact No:</td>
			  	<td>061-5284050,+977-98334958204</td>
			  </tr>
			</table>
			<div>
				<button type="button" class="btn btn-success btn-costum">View More</button>
			</div>
		</div>

	</div>
	<div class="row search-row">
		<div class="col-md-3">
			<img class="thumbnail search-img" src="<?php echo base_url("images/HD-Widescreen-Wallpapers-5.jpg") ?>">
		</div>
		<div class="col-md-9">
			<table class="table table-font">
			  <tr>
			  	<td>Name:</td>
			  	<td>Annapurna hotel</td>
			  </tr>
			  <tr>
			  	<td>Address:</td>
			  	<td>Lakeside,Pokhara</td>
			  </tr>
			  <tr>
			  	<td>Contact No:</td>
			  	<td>061-5284050,+977-98334958204</td>
			  </tr>
			</table>
			<div>
				<button type="button" class="btn btn-success btn-costum">View More</button>
			</div>
		</div>

	</div>
</div> -->