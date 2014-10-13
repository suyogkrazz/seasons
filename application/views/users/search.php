
	<div class="row">
		<?php echo $this->session->flashdata('feedback');?>
		<?php if(!empty($records)): foreach($records as $row): ?>
			<div><?php echo anchor("ad/$row->id", $row->name); ?></div>
			<div><?php echo $row->info; ?></div>
		    <?php endforeach; ?>
		<?php endif; ?>
	</div>