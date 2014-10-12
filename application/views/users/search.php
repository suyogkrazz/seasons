
	<div class="row">
		<?php echo $this->session->flashdata('feedback');?>
		<?php if(!empty($records)): foreach($records as $row): ?>
			<?php echo $row->name."</br>"; 
				  echo $row->id."</br>"; 
		      	  echo "</br>"; ?>

		    <?php endforeach; ?>
		<?php endif; ?>
	</div>