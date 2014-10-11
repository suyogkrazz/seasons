<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
</head>
<body>
	<?php echo $this->session->flashdata('feedback');?>
	<?php echo form_open('search/search_content') ?>
	<p>
		<label for="search_content">Search:</label>
		<input type="text" name="search_content" id="search_content"/>
	</p>
	<p>
		<input type="submit" name="search" id="search" value="search"/>
	</p>
	<?php echo form_close(); ?>

	<div class="row">
		<?php if(!empty($records)): foreach($records as $row): ?>
			<?php echo $row->discription."</br>"; 
				  echo $row->id."</br>"; 
		      	  echo "</br>"; ?>

		    <?php endforeach; ?>
		<?php endif; ?>
	</div>
</body>
</html>