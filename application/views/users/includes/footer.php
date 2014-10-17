	</div>
	<div class="footer">
	<div class="cata row">
		<div class="col-md-9">
			<a class="below" href="<?php echo base_url('about-us') ?>">About Us</a>
			<a class="below" href="<?php echo base_url('faqs') ?>">FAQ's</a>
			<a class="below" href="<?php echo base_url('contact-us') ?>">Contact Us</a>
		</div>
        
        <div class="col-md-3 powered">Powered by <a class="pines" href="http://pinesofts.com/">Pinesofts.com</a></div>
	</div>
	</div>

	<script type="text/javascript" src="<?php echo site_url().'assets/js/jquery-1.7.1.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/bootstrap.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/jarallax.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/jquery.nicescroll.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/validator.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.cookie.js')?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/ajax.js' ?>"></script>
	<script>

   init = function(){
		  var jarallax = new Jarallax();
		  jarallax.addAnimation(' .darkness',[{progress:'0%', top:'0%',opacity:'1'},{progress:'22%',opacity:'1'},{progress:'24%', opacity:'0'},{progress:'50%', top:'10%', opacity:'0'}]);
		jarallax.addAnimation(' .darkness1',[{progress:'24%', top:'0%',opacity:'1'},{progress:'49%',opacity:'1'},{progress:'50%', top:'10%',opacity:'0'},{progress:'51%', top:'10%',opacity:'0'}]);
	 	jarallax.addAnimation('.darkness2',[{progress:'40%', top:'10%',opacity:'1'},{progress:'50%', top:'5%',opacity:'1'},{progress:'69%', top:'-1%',opacity:'1'},{progress:'75%', top:'-1%',opacity:'0'}]);
	 	jarallax.addAnimation('.darkness3',[{progress:'75%', top:'0%',opacity:'1'},{progress:'80%', top:'-10%',opacity:'1'},{progress:'95%', top:'-10%',opacity:'1'},{progress:'96%', top:'-10%',opacity:'0'}]);
	 	jarallax.addAnimation('.darkness4',[{progress:'92%', top:'0%',opacity:'1'},{progress:'150%', top:'-10%',opacity:'1'}]);
		 }

    </script>

    <script type="text/javascript">
		$("#myModal").on('hidden.bs.modal', function (e) {
		    $("#myModal iframe").attr("src", $("#myModal iframe").attr("src"));
		});
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
$('.carousel').on('slide', function () {
  $('.carousel-inner > .item .carousel-caption').css('display','none');
})  
$('.carousel').on('slid', function () {
  $('.carousel-inner > .item.active .carousel-caption').fadeIn( "slow" );
})
$(function($) {
    // this bit needs to be loaded on every page where an ajax POST may happen
		    $.ajaxSetup({
		        data: {
		            csrf_test_name: $.cookie('csrf_cookie_name')
		        }
		    });

		    // now you can use plain old POST requests like always
		    $.post('site.com/controller/method', { name : 'Jerel' });
		});

    </script>
</body>
</html>