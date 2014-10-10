<h1 class="heading">Special Offer</h1>

<div class="panel-group" id="accordian">

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong><a href="#createspecial" data-toggle="collapse" data-parent="#accordian">Create Special Offer</a></strong>
		</div>

		<div class="panel-collapse collapse" id="createspecial">
			<div class="panel-body">
				<?php echo form_open_multipart('admin/special_create', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>

					<div class="form-group">
						<label class="col-sm-2 control-label">Special Title :</label>
						<div class="col-sm-10">
							<input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Choose Image :</LABEL>
						<div class="col-sm-10">
							<input type="file" id="file" name="file" accept="image/gif, image/jpeg, image/png" required/>
							<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Content :</label>
						<div class="col-sm-10">
							<textarea name="content" id="body" class="form-control">
								<?php echo set_value('content'); ?>
							</textarea>
							<script>
						        CKEDITOR.replace( 'body' );
						    </script>
						</div>
				    </div>

				    <div class="form-group">
				    	<div class="col-sm-2"></div>
				    	<div class="col-sm-10">
				    		<div class="submit">
								<button type="submit" class="btn btn-default">Submit</button>
							</div>
				    	</div>
				    </div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>

</div>

<?php 
	echo validation_errors(); 
?>

<?php $i=0; 
	$num = $this->db->get('special')->num_rows();
	foreach($records as $row): $i++; if($i==1):?>
		<div class="row separator">
			<div class="col-md-4 news-col">
				<div class="admin-news">
					<a href='<?php echo base_url("admin/special_edit/$row->id") ?>' class="tile">
					<?php 
						echo img(array(
									'src'=>'assets/images/special/'.$row->path,
									'class'=>'thumb',
									'height'=> 100,
									'width'=> 'auto'
								));
						echo "<div class='title'>".$row->name."</div>";
					?>
					</a>
					<hr />
					<div class="news-action action">
						<?php
							echo anchor("admin/special_delete/$row->id", "<span class='glyphicon glyphicon-trash'></span>", array('data-toggle'=>'tooltip', 'title'=>'Delete'));
							echo anchor("admin/special_edit/$row->id", "<span class='glyphicon glyphicon-pencil'></span>", array('data-toggle'=>'tooltip', 'title'=>'Edit'))
						?>
					</div>
				</div>
			</div>
	<?php elseif($i == 3): $i = 0; ?>
			<div class="col-md-4 news-col">
				<div class="admin-news">
					<a href='<?php echo base_url("admin/special_edit/$row->id") ?>' class="tile">
					<?php 
						echo img(array(
									'src'=>'assets/images/special/'.$row->path,
									'class'=>'thumb',
									'height'=> 100,
									'width'=> 'auto'
								));
						echo "<div class='title'>".$row->name."</div>";
					?>
					</a>
					<hr />
					<div class="news-action action">
						<?php
							echo anchor("admin/special_delete/$row->id", "<span class='glyphicon glyphicon-trash'></span>", array('data-toggle'=>'tooltip', 'title'=>'Delete'));
							echo anchor("admin/special_edit/$row->id", "<span class='glyphicon glyphicon-pencil'></span>", array('data-toggle'=>'tooltip', 'title'=>'Edit'))
						?>
					</div>
				</div>
			</div>
		</div>
	<?php else: ?>
			<div class="col-md-4 news-col">
				<div class="admin-news">
					<a href='<?php echo base_url("admin/special_edit/$row->id") ?>' class="tile">
					<?php 
						echo img(array(
									'src'=>'assets/images/special/'.$row->path,
									'class'=>'thumb',
									'height'=> 100,
									'width'=> 'auto'
								));
						echo "<div class='title'>".$row->name."</div>";
					?>
					</a>
					<hr />
					<div class="news-action action">
						<?php
							echo anchor("admin/special_delete/$row->id", "<span class='glyphicon glyphicon-trash'></span>", array('data-toggle'=>'tooltip', 'title'=>'Delete'));
							echo anchor("admin/special_edit/$row->id", "<span class='glyphicon glyphicon-pencil'></span>", array('data-toggle'=>'tooltip', 'title'=>'Edit'))
						?>
					</div>
				</div>
			</div>
	<?php endif;
	endforeach;
	echo "<br />";
	if(($num%3) != 0):
		echo "</div>";
	endif;
?>