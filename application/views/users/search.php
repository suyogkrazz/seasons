
	<div class="row">
		<?php echo $this->session->flashdata('feedback');?>
		<?php if(!empty($records)): foreach($records as $row): ?>
			<?php echo anchor("ad/$row->id", $row->name);
		      	  echo "</br>"; ?>
		    <?php endforeach; ?>
		<?php endif; ?>
	</div>