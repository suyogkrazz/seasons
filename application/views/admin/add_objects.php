<h1 class="heading">Add Homepage Sliders</h1>

<?php echo form_open_multipart('admin/addobjects/'.$this->uri->segment(3), array('data-toggle'=>'validator', 'class'=>'form-horizontal'))?>

	<div class="form-group">
		<label class="col-sm-2 control-label">Name:</label>
		<div class="col-sm-9">
			<input type="text"  class="form-control" id ="description" name="name" placeholder="Name your image" required>
			<div class="help-block with-errors"></div>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Slider Description:</label>
		<div class="col-sm-9">
			<input type="text"  class="form-control" id ="description" name="description" placeholder="Say some more or not">
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

	<div class="form-group">
		<label class="col-sm-2 control-label">For:</label>
		<div class="col-sm-9">
			<select name="slider" class="form-control">
				<option value="1">First Slider</option>
				<option value="2">Second Slider</option>
				<option value="3">Third Slider</option>
				<option value="4">Fourth Slider</option>
				<option value="5">Fifth Slider</option>
			</select>
		</div>
	</div>
 		
	<div class="submit">
		<div class="col-sm-2"></div>
		<div class="col-sm-1">
			<button type="submit" class="btn btn-default">Add</button>
		</div>
	</div>
<?php echo form_close(); ?>
<br>
<hr>
<h2 class="sub-heading">Sliders</h2>

<div class="panel-group" id="accordian">

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong><a href="#first" data-toggle="collapse" data-parent="#accordian">First Slider</a></strong>
		</div>

		<div class="panel-collapse collapse in" id="first">
			<div class="panel-body">
				<div class="slider-image">
					<?php foreach ($first as $slide):?> 
						<div class='description'>
							<?php echo "<strong>".$slide->name."</strong><br>"; ?>
							<?php echo $slide->description; ?>
						</div>
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
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong><a href="#second" data-toggle="collapse" data-parent="#accordian">Second Slider</a></strong>
		</div>

		<div class="panel-collapse collapse" id="second">
			<div class="panel-body">
				<div class="slider-image">
					<?php foreach ($second as $slide):?> 
						<div class='description'>
							<?php echo "<strong>".$slide->name."</strong><br>"; ?>
							<?php echo $slide->description; ?>
						</div>
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
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong><a href="#Third" data-toggle="collapse" data-parent="#accordian">Third Slider</a></strong>
		</div>

		<div class="panel-collapse collapse" id="Third">
			<div class="panel-body">
				<div class="slider-image">
					<?php foreach ($third as $slide):?> 
						<div class='description'>
							<?php echo "<strong>".$slide->name."</strong><br>"; ?>
							<?php echo $slide->description; ?>
						</div>
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
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong><a href="#Fourth" data-toggle="collapse" data-parent="#accordian">Fourth Slider</a></strong>
		</div>

		<div class="panel-collapse collapse" id="Fourth">
			<div class="panel-body">
				<div class="slider-image">
					<?php foreach ($fourth as $slide):?> 
						<div class='description'>
							<?php echo "<strong>".$slide->name."</strong><br>"; ?>
							<?php echo $slide->description; ?>
						</div>
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
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong><a href="#Fifth" data-toggle="collapse" data-parent="#accordian">Fifth Slider</a></strong>
		</div>

		<div class="panel-collapse collapse" id="Fifth">
			<div class="panel-body">
				<div class="slider-image">
					<?php foreach ($fifth as $slide):?> 
						<div class='description'>
							<?php echo "<strong>".$slide->name."</strong><br>"; ?>
							<?php echo $slide->description; ?>
						</div>
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
			</div>
		</div>
	</div>

</div>