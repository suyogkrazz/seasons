<div class="faq-header">
	<div class="container">
		<h1>Contact Us</h1>
		<h3>Help us to give your feedback.</h3>
	</div>
</div>
<div class="container contac">
	<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Himalayan+Discovery+Nepal,+Pokhara,+Western+Region,+Nepal&amp;aq=0&amp;oq=himalayan+dis&amp;sll=37.0625,-95.677068&amp;sspn=33.02306,62.578125&amp;ie=UTF8&amp;hq=Himalayan+Discovery+Nepal,&amp;hnear=Pokhara,+Gandaki,+Western+Region,+Nepal&amp;ll=28.20817,83.971348&amp;spn=0.01345,0.032784&amp;t=m&amp;output=embed"></iframe>
	<div class="row contact">
		<div class="col-md-8 ">
			<div class="form-shadow">
				<h2 class="contact-us">Contact Us</h2>
				<?php echo form_open('send-message', array('class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
					<div class="form-group">
					  	<label class="col-sm-2 control-label">Your Name :</label>
					  	<div class="col-sm-10">
					    	<input type="text" name="name" class="form-control" placeholder="Name" required>
					    	<div class="help-block with-errors"></div>
					  	</div>
					 </div>

					<div class="form-group">
					  	<label class="col-sm-2 control-label">Your Email :</label>
					  	<div class="col-sm-10">
					    	<input type="email" name="email" pattern="^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$" data-error="Invalid Email" class="form-control" value="<?php echo set_value('email'); ?>" placeholder="Email" required>
					    	<div class="help-block with-errors"></div>
					  	</div>
					</div>

					<div class="form-group">	
						<label class="control-label message">Message</label>
						<textarea name="message" class="form-control" rows="10" id="message" required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<input type="submit" class="btn btn-success btn-modified submit-btn" value="Submit">
				<?php echo form_close(); ?>

			</div>
		</div>
		<div class="col-md-4">
			<div><h2 class="info">Our Info</h2></div>
			<div class="info-content">
				<h4>Suresh Lamsal(Alex)<br/></h4>
				Director,himalayan Discovery Nepal<br/>
				Trek & Expendition, Travel & Tours<br/>
				<h4>Phone No:</h4>
				+977 61 463927<br/>
				+977 985 602 5611<br/>
				<h4>Email:</h4>
				info@hdnpl.com<br/>
				tour2alex@gmail.com<br/>
				<h4>Postal Address:</h4>
				P.O.Box:224,Lake Side-6, Pokhara Nepal
			</div>

		</div>
	</div>
</div>