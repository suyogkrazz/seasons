<h1 class="heading">Add Homepage Sliders</h1>
<?php echo form_open_multipart('admin/addobjects/'.$this->uri->segment(3), array('data-toggle'=>'validator', 'class'=>'form-horizontal'))?>
 <div class="container-fluid eg-container" id="basic-example">
    <div class="row eg-main">
      <div class="col-sm-9">
        <div class="eg-wrapper">
          <img id="cropper" class="cropper" src="<?php echo base_url('assets/img/man.jpg'); ?>"   alt="Picture"/>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="eg-preview clearfix">
          <div class="preview preview-lg"></div>
          <div class="preview preview-md"></div>
          <div class="preview preview-sm"></div>
          <div class="preview preview-xs"></div>
        </div>
        <div class="eg-data">
          <div class="input-group">
            <span class="input-group-addon">X</span>
            <input class="form-control" id="dataX" type="text" name="x" placeholder="x">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Y</span>
            <input class="form-control" id="dataY" type="text" name="y" placeholder="y">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Width</span>
            <input class="form-control" id="dataW" type="text" name="w" placeholder="width">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Height</span>
            <input class="form-control" id="dataH" type="text" name="h" placeholder="height">
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix">
      <div class="eg-button">
        <button id="reset" type="button" class="btn btn-warning">Reset</button>
        <button id="reset-deep" type="button" class="btn  btn-warning">Reset (deep)</button>
        <button id="release" type="button" class="btn btn-primary">Release</button>
        <button id="destroy" type="button" class="btn btn-danger">Destroy</button>
        <button id="setData" type="button" class="btn btn-primary">Set Data</button>
      </div>
      <div class="row eg-input">
        <div class="col-md-6">
          <div class="input-group">
            <input class="form-control" id="showData" type="text" value="data...">
            <span class="input-group-btn">
              <button class="btn btn-info" id="getData" type="button">Get Data</button>
            </span>
          </div>
          <div class="input-group">
            <input class="form-control" id="showInfo" type="text" value="Info...">
            <span class="input-group-btn">
              <button class="btn btn-info" id="getImgInfo" type="button">Get Image Info</button>
            </span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-group">
            <input class="form-control" id="aspectRatio" name="aspectRatio" type="text" value="3:1">
            <span class="input-group-btn">
              <button class="btn btn-primary" id="setAspectRatio" type="button">Set Aspect Ratio</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>



	<div class="form-group">

	<label class="col-sm-2 control-label">Choose Image:</label>
	<div class="col-sm-9">
           	 <input type="file" id="uploadImagecrop" name="uploadImage" accept="image/gif, image/jpeg, image/png"  required/>
		<div class="help-block with-errors"></div>
	</div>
		<label class="col-sm-2 control-label">Name:</label>
		<div class="col-sm-9">
			<input type="text"  class="form-control" id ="description" name="name" placeholder="Name your image" required>
			<div class="help-block with-errors"></div>
		</div>
		<label class="col-sm-2 control-label">Slider Description:</label>
		<div class="col-sm-9">
			<input type="text"  class="form-control" id ="description" name="description" placeholder="Say some more or not">
			<div class="help-block with-errors"></div>
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
