<?php 
	$uri = $this->uri->segment(3);
	if(empty($uri)):
?>

<h1 class="heading">Add image to your album</h1>
Please select an <a href="<?php echo base_url('admin/album'); ?>">album</a> to add images to.
<?php else: ?>

<?php echo form_open_multipart('admin/addimages/', array('data-toggle'=>'validator'))?>
	
	<div class="form-group">
		<label for="file"></label>
		<input type="file" id="file" name="file[]" multiple="multiple" accept="image/gif, image/jpeg, image/png" required/>
		<div class="help-block with-errors"></div>
	</div>

	<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">

	<input type="submit" class="btn btn-default" value="Add Images" >

<?php echo form_close(); ?>


<?php $i=0; 
	$num = $this->db->get_where('images',array('album_id'=>$this->uri->segment(3)))->num_rows();
	foreach($album as $photos): $i++; if($i==1):?>
		<div class="row separator">
			<div class="col-md-4 news-col">
				<a class="example-image-link thumb" height="200" width="250" href="<?php echo base_url('assets/images/album/'.$photos->path); ?>" data-lightbox="example-set" >
				<img class="example-image" height="200" width="250" src="<?php echo base_url('assets/images/album/'.$photos->path); ?>" alt=""/></a>
				<div class="delete img-dlt">
					<?php  echo anchor("admin/deleteimage/$photos->id","<span class='glyphicon glyphicon glyphicon-trash'></span>"); ?>
				</div>						
			</div>
	<?php elseif($i == 3): $i = 0; ?>
			<div class="col-md-4 news-col">
				<a class="example-image-link thumb" height="200" width="250" href="<?php echo base_url('assets/images/album/'.$photos->path); ?>" data-lightbox="example-set" >
				<img class="example-image" height="200" width="250" src="<?php echo base_url('assets/images/album/'.$photos->path); ?>" alt=""/></a>
				<div class="delete img-dlt">
					<?php  echo anchor("admin/deleteimage/$photos->id","<span class='glyphicon glyphicon glyphicon-trash'></span>"); ?>
				</div>
			</div>
		</div>
	<?php else: ?>
			<div class="col-md-4 news-col">
				<a class="example-image-link thumb" height="200" width="250" href="<?php echo base_url('assets/images/album/'.$photos->path); ?>" data-lightbox="example-set" >
				<img class="example-image" height="200" width="250" src="<?php echo base_url('assets/images/album/'.$photos->path); ?>" alt=""/></a>
				<div class="delete img-dlt">
					<?php  echo anchor("admin/deleteimage/$photos->id","<span class='glyphicon glyphicon glyphicon-trash'></span>"); ?>
				</div>
			</div>
	<?php endif;
	endforeach;
	echo "<br />";
	if(($num%3) != 0):
		echo "</div>";
	endif;
	endif;
	?>