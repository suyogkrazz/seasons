				</div>
			</div>

	<div class="admin-footer">
		Copyright &copy; <a href="<?php echo base_url(); ?>" target="_blank">fishtailadventures.com</a> | Developed by <a href="http://pinesofts.com/" target="_blank">PineSofts</a>.
	</div>

	<script type="text/javascript" src="<?php echo site_url().'assets/js/jquery.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/pack.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.cookie.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/bootstrap.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/validator.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/lightbox.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/crop.js"); ?>"></script>

<script type="text/javascript">
   $("#home .sidebar-navigation a:contains('Dashboard')").addClass('active');
   $("#aboutus .sidebar-navigation a:contains('About Us')").addClass('active');
   $("#media .sidebar-navigation a:contains('Slider')").addClass('active');
   $("#service .sidebar-navigation a:contains('Categories')").addClass('active');
   $("#service .sidebar-navigation #services").addClass('in');
   $("#files .sidebar-navigation a:contains('Files')").addClass('active');
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".action a").tooltip();
    });
</script>

<script type="text/javascript">
$("#imagePreview  ").hide();

$(function() {
    $("#uploadImage ").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
            	$("#imagePreview1").hide();
            	$("#imagePreview").show();

                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
   

</script>

<script type="text/javascript">
$("#chairmanPreview").hide();

$(function() {
    $("#uploadChairmanImage ").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
              $("#chairmanPreview1").hide();
              $("#chairmanPreview").show();

                $("#chairmanPreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
   

</script>

<script type="text/javascript">



	$("#mess").keypress(function() {
	var maxWords = 40;
    var $this, wordcount;
    $this = $(this);
    wordcount = $this.val().split(/\b[\s,\.-:;]*/).length;
    if (wordcount > maxWords) {
        jQuery(".word_count span").text("" + maxWords);
        alert("You've reached the maximum allowed words.");
        return false;
    } else {
        return jQuery(".word_count span").text(wordcount);
    }
});
jQuery('#mess').change(function() {
	var maxWords = 40;
    var words = $(this).val().split(/\b[\s,\.-:;]*/);
    // console.log(words.length);
    if (words.length > maxWords) {
        words.splice(maxWords);
        $(this).val(words.join(""));
        alert("You've reached the maximum allowed words. Extra words removed.");
    }
    // console.log(words.length);
});

</script>
</html>