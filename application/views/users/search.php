
	<div class="row">
		<?php echo $this->session->flashdata('feedback');?>
		<?php if(!empty($records)): foreach($records as $row): ?>
			<?php echo $row->name."</br>"; 
				  echo $row->description;
				  echo $row->info."</br>"; 
		      	  echo "</br>"; ?>
		    <?php endforeach; ?>
		<?php endif; ?>
	</div>