<h1 class="heading">Add Homepage Sliders</h1>

<?php echo form_open_multipart('admin/addobjects/'.$this->uri->segment(3), array('data-toggle'=>'validator', 'class'=>'form-horizontal'))?>

	<div class="form-group">
		<label class="col-sm-2 control-label">Slider Description:</label>
		<div class="col-sm-9">
			<input type="text"  class="form-control" id ="description" name="description" required>
			<div class="help-block with-errors"></div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Slider Image:</label>
		<div class="col-sm-9">
			<input type="file" id="uploadImage" name="uploadImage" accept="image/gif, image/jpeg, image/png" required/>
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input id="chag_sort" type="hidden" name="chag_sort">
			<div>
				<img id="uploadPreview" width="700px" height="auto" style="display:none;"/>
			</div>
		</div>
	</div>
 		
	<div class="submit">
		<div class="col-sm-2"></div>
		<div class="col-sm-1">
			<button type="submit" class="btn btn-default">Add</button>
		</div>
	</div>
<?php echo form_close(); ?>
	<br/>
	<hr />
	<div class="slider-image">
		<?php foreach ($slider as $slide):?> 
			<div class='description'><?php echo $slide->description; ?></div>
			<div class='thumb'>
				<?php  echo img(array(
					'src'=>'assets/images/'.$slide->path,
					'class'=>'thumb',
					'height'=> 200,
					'width'=> 'auto'
				));?>
			</div>
			<div class="delete img-dlt">
				<?php  echo anchor("admin/deleteobject/".$slide->id,"<span class='glyphicon glyphicon glyphicon-trash'></span>"); ?>
			</div>

			<hr />
		<?php endforeach; ?>
	</div>	
