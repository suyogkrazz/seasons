
// set info for cropping image using hidden fields
var inputFile;
$(document).ready(function() {
	var p = $("#uploadPreview");
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

	$("#uploadPreview").imgAreaSelect({
		// set crop ratio (optional)
	  		x1 : 47,
		 	y1 : 47,
		  	x2 : 481, 
		  	y2 : 281,
	   	aspectRatio: '3:1',
    	instance: true,
	   	onSelectStart: function(){
	        $(".imgareaselect-outer").show();
	        $(".imgareaselect-border1").show();
	        $(".imgareaselect-border2").show();
	        $(".imgareaselect-border3").show();
	        $(".imgareaselect-border4").show();
    	},
    	onSelectEnd: setInfo	                	
	});

	$('img#uploadPreview').load(function(){      
      	$(this).imgAreaSelect({
		 	x1 : 47,
		 	y1 : 47,
		  	x2 : 481, 
		  	y2 : 281,
		  	aspectRatio: '3:1',
			instance: true,
			onSelectStart: function(){
		        $(".imgareaselect-outer").show();
		        $(".imgareaselect-border1").show();
		        $(".imgareaselect-border2").show();
		        $(".imgareaselect-border3").show();
		        $(".imgareaselect-border4").show();
    		},
    		onSelectEnd: setInfo	                	
		});
		$('#x').val( 47);
		$('#y').val(47);
		$('#w').val(481);
		$('#h').val(281);
   	});
	

});
    
function setInfo(i, e) {
    	
   	var as= $('#chag_sort').val();
   	var x= e.x1 * as;
  	var y= e.y1 * as;
  	var w= e.width * as;
  	var h= e.height * as;
	$('#x').val(x);
	$('#y').val(y);
	$('#w').val(w);
	$('#h').val(h);
	if((e.x1==e.x2)&&(e.y1==e.y2)){
		$( 'img#uploadPreview' ).imgAreaSelect({
			instance: true,
			aspectRatio: '3:1', 
			x1 : 47,
		 	y1 : 47,
		  	x2 : 481, 
		  	y2 : 281,					
		});
	    $('#x').val( 47);
		$('#y').val(47);
		$('#w').val(481);
		$('#h').val( 281);
   	}
}



