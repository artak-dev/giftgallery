$(document).ready(function() {
	var URL = $('meta[name="_url"]').attr('content');

    $('#ordersTable').DataTable( {
        paging:true,
        ajax: {
		    url: URL+"/showAllNewOrders",
		   	method:"post",
		   	dataSrc:'',
		   	headers:{  'X-CSRF-TOKEN':$('meta[name=_token]').attr("content") },
		   	dataType:"json",
		    data:{
            },
		},  
		"columns": [
			{ "data": "id" },
			{ "data": "status" },
			{ "data": "name" },
			{ "data": "image" },
            { "data": "count" },
            { "data": "price" },
            { "data": "info" },
            { "data": "paymenth" },
            { "data": "paymenth_price" },
		]

    } );    


    $('#readyToShippordersTable').DataTable( {
        ajax: {
		    url: URL+"/showAllreadyToShippOrders",
		   	method:"post",
		   	dataSrc:'',
		   	headers:{  'X-CSRF-TOKEN':$('meta[name=_token]').attr("content") },
		   	dataType:"json",
		    data:{
            },
		},  
		"columns": [
			{ "data": "id" },
			{ "data": "status" },
			{ "data": "name" },
			{ "data": "image" },
            { "data": "count" },
            { "data": "price" },
            { "data": "info" },
            { "data": "paymenth" },
            { "data": "paymenth_price" },
		]

    } );

$(".add-new-product").click(function(){
	$("#create-post").slideToggle()
})

	$(document).on("click", ".change-order-status", function() {	    
		var id = $(this).attr('data-key');
		var status = $(this).attr('data-status');
		 $.ajaxSetup({
	      headers: {
	          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	      }
	  });
	   jQuery.ajax({
	      url: URL+"/changeOrderStatus",
	      method: 'post',
	      dataType:'json',
	      data: {
	         id: id,
	         status:status,
	      },
	      success: function(res){
	    	
	      }
	    }) 
	})
} );