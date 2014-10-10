<div class="container contac">
	<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Himalayan+Discovery+Nepal,+Pokhara,+Western+Region,+Nepal&amp;aq=0&amp;oq=himalayan+dis&amp;sll=37.0625,-95.677068&amp;sspn=33.02306,62.578125&amp;ie=UTF8&amp;hq=Himalayan+Discovery+Nepal,&amp;hnear=Pokhara,+Gandaki,+Western+Region,+Nepal&amp;ll=28.20817,83.971348&amp;spn=0.01345,0.032784&amp;t=m&amp;output=embed"></iframe>
	<div class="row contact">
		<div class="col-md-8 ">
			<div class="form-shadow">
				<h2 class="contact-us">Contact Us</h2>
				<?php $attributes = array('class' => 'form-horizontal', 'role' => 'form'); ?>
				<?php echo form_open('home/contact_us_post', $attributes); ?>
				<div class="form-group">
				  	<label class="col-sm-2 control-label">Your Name :</label>
				  	<div class="col-sm-10">
				    	<input type="name" class="form-control" value="<?php echo set_value('name'); ?>" placeholder="Name">
				  	</div>
				 </div>

				<div class="form-group">
				  	<label class="col-sm-2 control-label">Your Email :</label>
				  	<div class="col-sm-10">
				    	<input type="email" class="form-control" value="<?php echo set_value('email'); ?>" placeholder="Email">
				  	</div>
				</div>

				<div>	
					<label class="control-label message">Message</label>
						<textarea name="message" class="form-control" rows="10" id="message"><?php echo set_value('message'); ?></textarea>
				</div>
				<input type="submit" class="btn btn-success btn-modified submit-btn" value="Submit">
				<?php echo validation_errors(); ?>
				<?php echo form_close(); ?>

			</div>
		</div>
		<div class="col-md-4">
			<div><h2 class="info">Our Info</h2></div>
			<div class="info-content">
				<span class="suresh">Suresh Lamsal(Alex)<br/></span>
				Director,himalayan Discovery Nepal<br/>
				Trek & Expendition, Travel & Tours<br/>
				<span class="phone-nos">Phone No:</span><br/>
				+977 61 463927<br/>
				+977 985 602 5611<br/>
				<span class="phone-nos">Email:</span><br/>
				info@hdnpl.com<br/>
				tour2alex@gmail.com<br/>
				<span class="phone-nos">Postal Address:</span><br/>
				P.O.Box:224,Lake Side-6, Pokhara Nepal
			</div>

		</div>
	</div>
</div>