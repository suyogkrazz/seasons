$(document).ready(function(){

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
								  	"<td>Name:</td>"+
								  	"<td><a href='"+base_url+"ad/"+data[i].id+"'>"+data[i].name+"</a></td>"+
								 " </tr>"+
								  "<tr>"+
								  	"<td>Info:</td>"+
								  	"<td>"+data[i].description+"</td>"+
								  "</tr>"+
								"</table>"+
								"<div>"+
									"<button type='button' class='btn btn-success btn-costum'><a href='"+base_url+"ad/"+data[i].id+"'>View More</a></button>"+
								"</div>"+
						"</div>"+
				"</div>");
		};

	$('#search_results').append("</div>");

				}, beforeSend : function (){
					          $('#search_results').html("");
                 $('#search_results').html("<img id='fix' src='"+base_url+"/assets/ajax_load.gif'>");

            },
				   error: function(jqXHR, textStatus, errorThrown){ 
      alert( jqXHR.responseText);
               
          }
		});
});
});