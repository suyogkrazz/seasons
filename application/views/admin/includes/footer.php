				</div>
			</div>

	<div class="admin-footer">
		Copyright &copy; <a href="<?php echo base_url(); ?>" target="_blank">fishtailadventures.com</a> | Developed by <a href="http://pinesofts.com/" target="_blank">PineSofts</a>.
	</div>

	<script type="text/javascript" src="<?php echo site_url().'assets/js/jquery.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/pack.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/cropper.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/bootstrap.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/validator.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/lightbox.js"); ?>"></script>

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

  <script>
  $(function() {
      var $cropper = $(".cropper"),
          $dataX = $("#dataX"),
          $dataY = $("#dataY"),
          $dataH = $("#dataH"),
          $dataW = $("#dataW"),
          cropper;

      $cropper.cropper({
        aspectRatio: 3 / 1,
        data: {
          x: 420,
          y: 50,
          width: 640,
          height: 360
        },
        preview: ".preview",

        // autoCrop: false,
        // dragCrop: false,
        // modal: false,
        // moveable: false,
        // resizeable: false,

        // maxWidth: 480,
        // maxHeight: 270,
        // minWidth: 160,
        // minHeight: 90,

        done: function(data) {
          $dataX.val(data.x);
          $dataY.val(data.y);
          $dataH.val(data.height);
          $dataW.val(data.width);
        },
        build: function(e) {
          console.log(e.type);
        },
        built: function(e) {
          console.log(e.type);
        },
        dragstart: function(e) {
          console.log(e.type);
        },
        dragmove: function(e) {
          console.log(e.type);
        },
        dragend: function(e) {
          console.log(e.type);
        }
      });

      cropper = $cropper.data("cropper");

      $cropper.on({
        "build.cropper": function(e) {
          console.log(e.type);
          // e.preventDefault();
        },
        "built.cropper": function(e) {
          console.log(e.type);
          // e.preventDefault();
        },
        "dragstart.cropper": function(e) {
          console.log(e.type);
          // e.preventDefault();
        },
        "dragmove.cropper": function(e) {
          console.log(e.type);
          // e.preventDefault();
        },
        "dragend.cropper": function(e) {
          console.log(e.type);
          // e.preventDefault();
        }
      });

      $("#enable").click(function() {
        $cropper.cropper("enable");
      });

      $("#disable").click(function() {
        $cropper.cropper("disable");
      });

      $("#reset").click(function() {
        $cropper.cropper("reset");
      });

      $("#reset-deep").click(function() {
        $cropper.cropper("reset", true);
      });

      $("#release").click(function() {
        $cropper.cropper("release");
      });

      $("#destroy").click(function() {
        $cropper.cropper("destroy");
      });

      $("#setData").click(function() {
        $cropper.cropper("setData", {
          x: $dataX.val(),
          y: $dataY.val(),
          width: $dataW.val(),
          height:$dataH.val()
        });
      });

      $("#setAspectRatio").click(function() {
        $cropper.cropper("setAspectRatio", $("#aspectRatio").val());
      });

      $("#setImgSrc").click(function() {
        $cropper.cropper("setImgSrc", $("#imgSrc").val());
      });

      $("#uploadImagecrop").change(function(){
          var p = $("#cropper");
    var _URL = window.URL || window.webkitURL;

        p.fadeOut();
        var ext = $('#uploadImagecrop').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
            // alert('invalid extension!');
            $("#uploadImagecrop").val("");
        }

        // prepare HTML5 FileReader
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImagecrop").files[0]);

        oFReader.onload = function (oFREvent) {
            // p.attr('src', oFREvent.target.result).fadeIn();
              $cropper.cropper("setImgSrc", oFREvent.target.result);
        };

         });
      $("#getImgInfo").click(function() {
        $("#showInfo").val(JSON.stringify($cropper.cropper("getImgInfo")));
      });

      $("#getData").click(function() {
        $("#showData").val(JSON.stringify($cropper.cropper("getData")));
      });
    });
  </script>
  <script type="text/javascript">

        var p = $("#cropper");
    var _URL = window.URL || window.webkitURL;

    // prepare instant preview
    $("#uploadImage").change(function(e){
        // fadeOut or hide preview
        var file, img,aw;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function () {
                // alert(this.width + " " + this.height);
                aw= (this.width)/700;
                $('#chag_sort').val(aw);
            };
            img.src = _URL.createObjectURL(file);
        }
        p.fadeOut();
        var ext = $('#uploadImage').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
            // alert('invalid extension!');
            $("#uploadImage").val("");
        }

        // prepare HTML5 FileReader
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            p.attr('src', oFREvent.target.result).fadeIn();
        };

    });
  </script>
</html>