<div class="container admin-login">
	<div class="row">
		<div class="log-wrapper">
			<div class="flash">
				<?php echo $this->session->flashdata('msg_login'); ?>	
			</div>
			<?php echo form_open("admin_login/recover_post", array('data-toggle'=>'validator')); ?>

				<div class="form-group">
					<label class="log-label">Enter New Password :</label>
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon log-icon glyphicon-lock"></span></div>
						<input type="password" name="password" data-minlength="6" placeholder="New Password" required class="form-control" >
					</div>
					<div class="help-block with-errors"></div>
					<?php echo form_error('password'); ?>
				</div>

				<input type="hidden" name="data" value="<?php echo $code; ?>">

				<div class="row">
					<div class="col-md-3">
						<input type="submit" class="btn btn-success" value="Recover">
					</div>
					<div class="col-md-5">
						<a href="<?php echo base_url('admin_login/recover_post') ?>">Login</a>
					</div>
				</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>