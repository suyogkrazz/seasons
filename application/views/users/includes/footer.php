	<div class="footer">
		<div class="pine">Powered by <a href="http://pinesofts.com/">Pinesofts.com</a></div>	
	</div>

	<script type="text/javascript" src="<?php echo site_url().'assets/js/jquery-1.7.1.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/bootstrap.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/jarallax.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/jquery.nicescroll.js' ?>"></script>
	<script>
   init = function(){
      try {

		  var jarallax = new Jarallax();
		  jarallax.addAnimation(' .darkness',[{progress:'0%', top:'0%'},{progress:'5%', top:'-10%'},{progress:'15%', top:'0%'},{progress:'30%', top:'20%'}]);
		  // jarallax.addAnimation(' .darkness1',[{progress:'10%', top:'100%'},{progress:'21%', top:'90%'},{progress:'41%', top:'-25%'},{progress:'45%', top:'-30%'}]);   
		} 
		catch (e) {
		alert("ASd");
		}
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