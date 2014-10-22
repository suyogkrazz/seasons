$(document).ready(function(){
$(function($) {

		    $.ajaxSetup({
		        data: {
		            csrf_test_name: $.cookie('csrf_cookie_name')
		        }
		    });

	
		});

$('#search').keyup(function(){
var base_url= $('#base_url').val();
var search_item1 = $('#search').val();

$.ajax({
				type:'POST',
			   	url: base_url+'home/search',
				data:{
					search_item:search_item1
				},
				dataType: 'json',
				success:function(data){

					$('#search_results').html("");
					if(data[0].uname=='emptysetfound'){
						$('#search_results').html("<div class='container not-found'> Content Not Found</div>");
					}
					else{
					$('#search_results').append("<div class='faq-header'>"+
							"<div class='container'>"+
								"<h1>Search result"+data[0].suff+" for "+data[0].item+
								"</h1></div>"+
						"</div>"+
					"<div class='container qns' id='contain'>");
	for(i=0;i<=data.length;i++){
	$('#contain').append("<div class='row search-row'>"+
					"<div class='col-md-3'>"+
						"<img class='thumbnail search-img' src='"+base_url+"assets/images/"+ data[i].img+"'>"+
					"</div>"+
					"<div class='col-md-9'>"+
								"<table class='table table-font'>"+
								  "<tr>"+
								
								  	"<td><a href='"+base_url+"ad/"+data[i].id+"'>"+data[i].name+"</a></td>"+
								 " </tr>"+
								  "<tr>"+
								  	"<td>"+data[i].description+"</td>"+
								  "</tr>"+
								"</table>"+
								"<div>"+
									"<button type='button' class='btn btn-success btn-costum'><a href='"+base_url+"ad/"+data[i].id+"'>View More</a></button>"+
								"</div>"+
						"</div>"+
				"</div>");
				}
		};

	$('#search_results').append("</div>");

				}, beforeSend : function (){
					  
                 $('#search_results').html("<img id='fix' src='"+base_url+"/assets/ajax_load.gif'>");

            },
				   error: function(jqXHR, textStatus, errorThrown){ 
      alert( jqXHR.responseText);
               
          }
		});
});
});