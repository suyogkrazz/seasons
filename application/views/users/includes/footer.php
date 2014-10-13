	<div class="footer">
		<div class="row">
			<div class="col-md-3">hey</div>
			<div class="col-md-3">hey</div>
			<div class="col-md-3">hey</div>
			<div class="col-md-3">hey</div>
		</div>		
	</div>

	<script type="text/javascript" src="<?php echo site_url().'assets/js/jquery-1.7.1.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/bootstrap.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/jarallax.js' ?>"></script>
		<script type="text/javascript" src="<?php echo site_url().'assets/js/jquery.nicescroll.js' ?>"></script>

	<script>
   init = function(){
      try {
  var jarallax = new Jarallax();
  jarallax.addAnimation(' .darkness',[{progress:'0%', top:'-20%'},{progress:'15%', top:'0%'},{progress:'30%', top:'-60%'}]);
  // jarallax.addAnimation(' .darkness1',[{progress:'10%', top:'100%'},{progress:'21%', top:'90%'},{progress:'41%', top:'-25%'},{progress:'45%', top:'-30%'}]);   
} 
catch (e) {
alert("ASd");
}
 }
    </script>
</body>
</html>