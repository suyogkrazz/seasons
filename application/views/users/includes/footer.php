	<div class="footer">
		<div class="pine">Powered by <a href="http://pinesofts.com/">Pinesofts.com</a></div>	
	</div>

	<script type="text/javascript" src="<?php echo site_url().'assets/js/jquery-1.7.1.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/bootstrap.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/jarallax.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/jquery.nicescroll.js' ?>"></script>
		<script type="text/javascript" src="<?php echo site_url().'assets/js/validator.min.js' ?>"></script>

	<script>
   init = function(){
		  var jarallax = new Jarallax();
		  jarallax.addAnimation(' .darkness',[{progress:'0%', top:'0%'},{progress:'2%', top:'-10%'},{progress:'15%', top:'0%',marginLeft:"-1"},{progress:'22%', marginLeft:"-1"},{progress:'24%', marginLeft:"10000"},{progress:'50%', top:'10%'}]);
		jarallax.addAnimation(' .darkness1',[{progress:'26%', top:'0%'},{progress:'28%', top:'-10%',marginLeft:"-1"},{progress:'49%', top:'0%',marginLeft:"-1"},{progress:'50%', top:'10%',marginLeft:"10000"},{progress:'51%', top:'10%',marginLeft:"10000"}]);
	 	// jarallax.addAnimation('.darkness2',[{progress:'50%', top:'0%'}]);
		 }

    </script>

    <script type="text/javascript">
    	$('.carousel').carousel({
		  interval: false
		})
    </script>
    <script type="text/javascript">

$(document).ready(

  function() { 

    $("html").niceScroll();

  }

);
    </script>
</body>
</html>