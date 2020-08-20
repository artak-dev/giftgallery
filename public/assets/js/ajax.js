jQuery(document).ready(function(){
	var products = [], filterBy = 0;
	getInitProducts();

	function getInitProducts() {
		var products_input = document.querySelectorAll('.product-info');

		Object.values(products_input).forEach(e => {
			products.push({...e.dataset});
		})
	}

	if(localStorage.getItem('countofItemsonCart') == 0 || localStorage.getItem('countofItemsonCart') == null){
		$(".show-my-bag").removeAttr("data-keys");
		$(".items-count").hide();
	}else{
		$(".show-my-bag").attr('data-notify',localStorage.getItem('countofItemsonCart'));
		$(".show-my-bag").attr('data-keys',localStorage.getItem('keys'));
		$(".items-count").show().text(localStorage.getItem('countofItemsonCart'));
	}

	var URL = $('meta[name="_url"]').attr('content');
	
	//get product all images for modal 
	$(document).on("click", ".js-show-modal1", function() {	    
	    var id =  $(this).attr('data-key')
	   $.ajaxSetup({
	      headers: {
	          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	      }
	  });
	   jQuery.ajax({
	      url: URL+"/getProductById",
	      method: 'post',
	      dataType:'json',
	      data: {
	         id: id,
	      },
	      success: function(res){
	      	  $(".add-to-cart").attr('data-key',res.id);
	          $(".slick3-product-name").text(res.name);
	          $(".slick3-product-price").removeClass('sale');
	          $(".old-price-modal").remove();
	      	  if(res.old_price != undefined){
	          		$(".slick3-product-price").before(`<span class="mtext-106 cl2  old-price-modal">${res.old_price} Դրամ</span><br>`);	
	          		$(".slick3-product-price").addClass('sale').text(res.price+' Դրամ')
	      	  }
	          $(".slick3-product-price").text(res.price+' Դրամ');
	          $(".slick3-product-description").text(res.description);
	          // image section 1
	          $(".product-details-images-1").attr('data-thumb',URL+"/assets/images/products/"+res.image_1);
	          $(".product-details-images-1 img").attr('src',URL+"/assets/images/products/"+res.image_1);
	          $(".slick3-img0").attr('src',URL+"/assets/images/products/"+res.image_1);

	          // image section 2
	          $(".product-details-images-2").attr('data-thumb',URL+"/assets/images/products/"+res.image_2);
	          $(".product-details-images-2 img").attr('src',URL+"/assets/images/products/"+res.image_2);
	          $(".slick3-img1").attr('src',URL+"/assets/images/products/"+res.image_2);


	          // image section 3
	          $(".product-details-images-3").attr('data-thumb',URL+"/assets/images/products/"+res.image_3);
	          $(".product-details-images-3 img").attr('src',URL+"/assets/images/products/"+res.image_3);
	          $(".slick3-img2").attr('src',URL+"/assets/images/products/"+res.image_3);

	          $('.js-modal1').addClass('show-modal1');


	      }});
    });

	//gifts price filter functionality
	$(".filters-bthgfn").click(function(){

		$.ajaxSetup({
	      headers: {
	          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	      }
		});
	    jQuery.ajax({
	      	url: URL+"/productsFilter",
	     	method: 'post',
	     	dataType:'json',
	      	data: {
	        	orderBy:orderBy[key],
	        	skip:skip
	      	},
	      success: function(res){
	      	$(".isotope-grid").empty();
	      	$(".all-categorys").click();
	      	for (var i = 0; i < res.length; i++) {
		      	$(".isotope-grid").append(`
		      			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ${res[i]['class_name']}">

						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="${URL}/assets/images/products/${res[i].image}" alt="IMG-PRODUCT">

								<span class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-key="${res[i].id}">
									Տեսնել ավելին
								</span>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										${res[i].name}
									</a>

									<span class="stext-105 cl3">
										${res[i].price} Դրամ
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="${URL}/assets/images/icons/favorite.png" alt="ICON" width="30">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="${URL}/assets/images/icons/favorite2.png" alt="ICON" width="30">
									</a>
								</div>
							</div>
						</div>
					</div>
		      		`)
				}
	    }});
	})

	// Add to cart
	$(".add-to-cart").click(function(){
		var id = $(this).attr("data-key");
		$.ajaxSetup({
	      headers: {
	          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	      }
		});
	    jQuery.ajax({
	      	url: URL+"/getProductById",
	     	method: 'post',
	     	dataType:'json',
	      	data: {
	        	id:id,
	      	},
	      success: function(res){

	      	var existKeys = [];
	      	var keys      = $(".show-my-bag").attr('data-keys');
	      	var countofItemsonCart =  localStorage.getItem('countofItemsonCart')
	      	if(!countofItemsonCart){
	      		countofItemsonCart = 1
	      	}else{
	      		if(localStorage.getItem(res.id) == null){
	      			countofItemsonCart++;	
	      		}
	      	}
	      	res.count 	  = +$(".num-product").val();
	      	localStorage.setItem(res.id, JSON.stringify(res));
	      	if(keys == undefined){
	      		localStorage.setItem('countofItemsonCart', countofItemsonCart)
	      		localStorage.setItem('keys', JSON.stringify(res.id));
	      		$(".show-my-bag").attr('data-keys',res.id)
	      		$(".items-count").text(countofItemsonCart)
	      	}else{
	      		var existKeys = Array();
	      		var distinctKeys = keys
	      		keys = keys.split("|");
	      		for( i=0; i < keys.length; i++){
	      			existKeys[keys[i]] = keys[i];
	      			var check = existKeys[res.id];
	      			if(keys[i] == res.id){
	      				var existRow = JSON.parse(localStorage.getItem(keys[i]));
	      				existRow.count = +$(".num-product").val() + existRow.count  
	      				existRow.price = +existRow.count*existRow.price 
	      				localStorage.removeItem(keys[id]);
	      				localStorage.setItem(keys[id], JSON.stringify(existRow));
	      				continue;
	      			}
	      		}
	      		if(check == undefined){
      				distinctKeys = distinctKeys.concat("|",res.id)
	      		}

	      		localStorage.setItem('keys', distinctKeys);
	      		localStorage.setItem('countofItemsonCart', countofItemsonCart);
	      		$(".show-my-bag").attr('data-keys',distinctKeys);
		      	$(".show-my-bag").attr('data-notify', countofItemsonCart);
				$(".items-count").show().text(localStorage.getItem('countofItemsonCart'));
	      	}
	      		$(".items-count").show();
	      		$(".num-product").val(1);
	      
	    }});
	})

	$(".load-more").click(function(){
		var key = $(this).attr('data-key');
		var category_id = $(this).attr('data-category')
		var filtr = $(".how-active1").attr('data-filter');
		$.ajaxSetup({
	      headers: {
	          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	      }
		});
	    jQuery.ajax({
	      	url: URL+"/loadMore",
	     	method: 'post',
	     	dataType:'json',
	      	data: {
	        	key:key,
	        	category_id:category_id,
	      	},
	      	success: function(res){
	      		products = [...products, ...res];

	      		filters(filterBy);
	      		if(res == ""){
	      			$(".load-more").hide()
	      		}
	      		for (var i = 0; i < res.length; i++) {
	      			var style = "";
	      			key++;
				if(location.pathname == "/"){
	      			if(filtr != "*"){
		      			if(res[i]['class_name'] == filtr){
		      				style = "display:block;"
		      			}else{
		      				style = "display:none;"
		      			}
					}
	      		}
				}

			$(".load-more").attr('data-key',key);
			}
		})
	})

	$(".filters-btn").click(function(){
		var filterbyPrice  = $(this).attr('data-key');
		saleFilter(filterbyPrice);
	})

	$(".gender").change(function(){
		saleFilter();
	})

	function saleFilter(filterbyPrice = 0){
		$(".loading").show();
		var gender = +$(".gender").val();
		var skip = $(".load-more").attr("data-key");
		$.ajaxSetup({
	      headers: {
	          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	      }
		});
	    jQuery.ajax({
	      	url: URL+"/saleFilter",
	     	method: 'post',
	     	dataType:'json',
	      	data: {
	        	gender:gender,
	        	filterbyPrice:filterbyPrice,
	        	skip:skip
	      	},
	      	success: function(res){
	      		$(".isotope-grid").empty();
				for (var i = 0; i < res.length; i++) {
			      	$(".isotope-grid").append(`
			      			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ${res[i]['class_name']}">

							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="${URL}/assets/images/products/${res[i].image}" alt="IMG-PRODUCT">

									<span class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-key="${res[i].id}">
										Տեսնել ավելին
									</span>
								</div>

								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											${res[i].name}
										</a>

										<span class="stext-105 cl3 old-price">
											${res[i].price} Դրամ
										</span>
										<span class="stext-105 cl3 sale">
											${res[i].sale_price} Դրամ
										</span>
									</div>

									<div class="block2-txt-child2 flex-r p-t-3">
										<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
											<img class="icon-heart1 dis-block trans-04" src="${URL}/assets/images/icons/favorite.png" alt="ICON" width="30">
											<img class="icon-heart2 dis-block trans-04 ab-t-l" src="${URL}/assets/images/icons/favorite2.png" alt="ICON" width="30">
										</a>
									</div>
								</div>
							</div>
						</div>
			      		`)
				}
				$(".loading").hide();
			}
		})
	}
	$(".btn-filters").click(function () {
		 var filterbyPrice = $(this).attr('data-key');
		 filters(filterbyPrice);
	})

	function filters(filterbyPrice = 0,start = 0,end = 0){
		var sortData = [...products];

		filterBy = filterbyPrice;
		console.log(sortData, filterbyPrice);
		switch(filterbyPrice) {
			case '1':
			case 1:
				sortData.sort((a,b) => +a.current_price - +b.current_price);
			break;
			case '2':
			case 2:
				sortData.sort((a,b) => +a.current_price - +b.current_price).reverse()
			break;
		}

		$(".isotope-grid").empty();
		for (var i = 0; i < sortData.length; i++) {
  			if(!sortData[i].sale_price){
  				price = `<span class='stext-105 cl3'>${sortData[i].price}Դրամ </span>`;
  			}else{
  				price = `<span class='stext-105 cl3 old-price '>${sortData[i].price}Դրամ </span><span class='stext-105 cl3 sale '>${sortData[i].sale_price}Դրամ</span>`;
  			} 
	      	$(".isotope-grid").append(`
	      			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ${sortData[i]['class_name']}">

					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="${URL}/assets/images/products/${sortData[i].image}" alt="IMG-PRODUCT">

							<span class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-key="${sortData[i].id}">
								Տեսնել ավելին
							</span>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									${sortData[i].name}
								</a>	
								${price}
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="${URL}/assets/images/icons/favorite.png" alt="ICON" width="30">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="${URL}/assets/images/icons/favorite2.png" alt="ICON" width="30">
								</a>
							</div>
						</div>
					</div>
				</div>
	      		`)
				}
				$(".loading").hide();
			
		}

})

