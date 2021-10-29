// AJAX JS


function getSubCategories(page_url,id) {
	var cat_id = $("#cat_main").val();	
	$.ajax({
		url: page_url+'?main='+cat_id+'&cat='+id,
		type: "GET",
		dataType: "html",
		success: function (data, textStatus, xhr) {
			if(data != '0'){
				$("#cat_id").html(data);				
			}else{
				$("#cat_id").html('<option value=""> - SELECT - </option>');			}
		},
		error: function (data, textStatus, xhr) {
			// alert('Error:'+data);
		}
	});
}