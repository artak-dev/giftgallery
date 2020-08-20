
(function ($) {
    "use strict";

    /*[ Load page ]
    ===========================================================*/
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div class="loader05"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
    });
    
    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height()/2;
    var URL = $('meta[name="_url"]').attr('content');
    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });


    /*==================================================================
    [ Fixed Header ]*/
    var headerDesktop = $('.container-menu-desktop');
    var wrapMenu = $('.wrap-menu-desktop');

    if($('.top-bar').length > 0) {
        var posWrapHeader = $('.top-bar').height();
    }
    else {
        var posWrapHeader = 0;
    }
    

    if($(window).scrollTop() > posWrapHeader) {
        $(headerDesktop).addClass('fix-menu-desktop');
        $(wrapMenu).css('top',0); 
    }  
    else {
        $(headerDesktop).removeClass('fix-menu-desktop');
        $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
    }

    $(window).on('scroll',function(){
        if($(this).scrollTop() > posWrapHeader) {
            $(headerDesktop).addClass('fix-menu-desktop');
            $(wrapMenu).css('top',0); 
        }  
        else {
            $(headerDesktop).removeClass('fix-menu-desktop');
            $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
        } 
    });


    /*==================================================================
    [ Menu mobile ]*/
    $('.btn-show-menu-mobile').on('click', function(){
        $(this).toggleClass('is-active');
        $('.menu-mobile').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu-m');

    for(var i=0; i<arrowMainMenu.length; i++){
        $(arrowMainMenu[i]).on('click', function(){
            $(this).parent().find('.sub-menu-m').slideToggle();
            $(this).toggleClass('turn-arrow-main-menu-m');
        })
    }

    $(window).resize(function(){
        if($(window).width() >= 992){
            if($('.menu-mobile').css('display') == 'block') {
                $('.menu-mobile').css('display','none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }

            $('.sub-menu-m').each(function(){
                if($(this).css('display') == 'block') { console.log('hello');
                    $(this).css('display','none');
                    $(arrowMainMenu).removeClass('turn-arrow-main-menu-m');
                }
            });
                
        }
    });


    /*==================================================================
    [ Show / hide modal search ]*/
    $('.js-show-modal-search').on('click', function(){
        $('.modal-search-header').addClass('show-modal-search');
        $(this).css('opacity','0');
    });

    $('.js-hide-modal-search').on('click', function(){
        $('.modal-search-header').removeClass('show-modal-search');
        $('.js-show-modal-search').css('opacity','1');
    });

    $('.container-search-header').on('click', function(e){
        e.stopPropagation();
    });


    /*==================================================================





    /*==================================================================
    [ Cart ]*/
    $('.show-my-bag').on('click',function(){
        var data = Array();
        var keys = localStorage.getItem('keys');
        if( keys != null){    
            keys = keys.split('|');
            if(keys.length > 1){

                for(i = 0; i < keys.length; i++){
                    data.push(JSON.parse(localStorage.getItem(keys[i])));
                }
            }else{
                if(keys != ""){
                    data.push(JSON.parse(localStorage.getItem(keys)));
                }
            }

        }

        var totalPrice = 0;
        if(data.length){
            for(var i = 0; i < data.length; i++){
                    totalPrice += data[i].price * data[i].count;
                    $(".all-bag-products").append(`
                            <li class="header-cart-item flex-w flex-t m-b-12 products-on-cart" data-key="${data[i].id}">
                                <div class="header-cart-item-img">
                                    <img src="${URL}/assets/images/products/${data[i].image}" alt="IMG">
                                </div>
                                <div class="header-cart-item-txt p-t-8">
                                    <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        ${data[i].name}
                                    </a>
                                    <span class="header-cart-item-info">
                                        արժեքը։${data[i].price}
                                    </span>
                                    <span class="header-cart-item-info count-of-product">
                                        Քանակը։${data[i].count} հատ
                                    </span>
                                     <span class="header-cart-item-info count-of-product delete-product-on-car" data-key="${data[i].id}" data-price = "${data[i].price * data[i].count}">
                                       <img  src = "${URL}/assets/images/icons/delete-icon.png" width = "25" >
                                    </span>
                                </div>
                            </li>
                        `)
            }
        }
        if( totalPrice == 0 ){
            $(".total-price").hide();
        }else{
            $(".total-price").text('Ընդհանուր: '+totalPrice+' Դրամ').show();
        }
        $(".total-price").attr('total-price',totalPrice);
        $('.js-panel-cart').addClass('show-header-cart');
    });


    $('.js-hide-cart').on('click',function(){
        $('.js-panel-cart').removeClass('show-header-cart');
        $(".all-bag-products").empty();
    });

    /*==================================================================
    [ Cart ]*/
    $('.js-show-sidebar').on('click',function(){
        $('.js-sidebar').addClass('show-sidebar');
    });

    $('.js-hide-sidebar').on('click',function(){
        $('.js-sidebar').removeClass('show-sidebar');
    });

    /*==================================================================
    [ +/- num product ]*/
    $(document).on("click", ".checkout-btn-num-product-down", function() {
        var id = $(this).attr("data-key");
        var numProduct = Number($(this).next().val());
            numProduct = numProduct - 1
        if(numProduct > 0){
        var item  = JSON.parse(localStorage.getItem(id));
            item.count = numProduct;
            localStorage.removeItem(id);
            localStorage.setItem(id,JSON.stringify(item));
                $(this).next().val(numProduct );
            var price = +$(this).attr('data-price');
            var totalPrice = numProduct * price;
            var subTotal = $(".subtotal-order").attr('data-total');
                subTotal = +subTotal - price;
                $(".subtotal-order").attr('data-total',subTotal).text(subTotal +' Դրամ');       
                $(this).parent().parent().parent().find('.column-5').text(totalPrice+' Դրամ')
        } 
    });
    $(document).on("click", ".checkout-btn-num-product-up", function() {
        var numProduct = Number($(this).prev().val());
        var id = $(this).attr("data-key");
            numProduct++
            $(this).prev().val(numProduct);
        var price = +$(this).attr('data-price');
        var totalPrice = numProduct * price;
        var subTotal = $(".subtotal-order").attr('data-total');
            subTotal = +subTotal + price;
            $(this).parent().parent().parent().find('.column-5').text(totalPrice+' Դրամ');
            $(".subtotal-order").attr('data-total',subTotal).text(subTotal +' Դրամ');
        var item  = JSON.parse(localStorage.getItem(id));
            item.count = numProduct;
            localStorage.removeItem(id);
            localStorage.setItem(id,JSON.stringify(item));

    });

    $(document).on("click", ".btn-num-product-up", function() {
        var numProduct = Number($(this).prev().val());
            numProduct++
            $(this).prev().val(numProduct);
    })    
    $(document).on("click", ".btn-num-product-down", function() {
        var numProduct = Number($(this).prev().val());
            numProduct - 1
               numProduct = numProduct - 1
        if(numProduct > 0){
            $(this).prev().val(numProduct);
        }
    })

    /*==================================================================
    [ Rating ]*/
    $('.wrap-rating').each(function(){
        var item = $(this).find('.item-rating');
        var rated = -1;
        var input = $(this).find('input');
        $(input).val(0);

        $(item).on('mouseenter', function(){
            var index = item.index(this);
            var i = 0;
            for(i=0; i<=index; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });

        $(item).on('click', function(){
            var index = item.index(this);
            rated = index;
            $(input).val(index+1);
        });

        $(this).on('mouseleave', function(){
            var i = 0;
            for(i=0; i<=rated; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });
    });
    
    $(document).on("click", ".delete-product-on-car", function() {
        var id = $(this).attr('data-key');
        var productPrice = +$(this).attr('data-price');
        var totalPrice = +$(".total-price").attr('total-price');
        var keys = localStorage.getItem('keys');
        var newKeys = [];
        var countofItemsonCart = +localStorage.getItem('countofItemsonCart');
        var product = JSON.parse( localStorage.getItem(id) );

        countofItemsonCart = countofItemsonCart - 1
        localStorage.removeItem(id);
        localStorage.setItem('countofItemsonCart',countofItemsonCart);
        keys = keys.split("|");
        keys = jQuery.grep(keys, function(value) {
          return value != id;
        });

        totalPrice = totalPrice - productPrice;
        newKeys = keys.join("|");
        $(".total-price").attr('total-price',totalPrice).text('Ընդհանուր: '+totalPrice+' Դրամ');
        $(this).parent().parent().slideUp();
        $(".show-my-bag").attr("data-keys",newKeys);
        localStorage.setItem('keys', newKeys);
        $(".items-count").text(countofItemsonCart)
        if(countofItemsonCart == 0 ){
            $(".items-count").hide();
            $(".show-my-bag").removeAttr("data-keys");
        }
    })

    if(location.pathname === "/view/cart"){
        var keys = localStorage.getItem('keys');
        if(keys.length){
            keys = JSON.stringify(keys.split("|"));
        }
        var orderSubTotal = 0;
        keys = JSON.parse(keys);
        for(var i = 0; i < keys.length; i++){
            var item = JSON.parse(localStorage.getItem(keys[i]));
            var totalPrice = item.count * item.price; 
            $(".table-shopping-cart tbody").append(`
                <tr class="table_head">
                    <th class = "column-1">
                        <div class="how-itemcart1">
                        <img src="${URL}/assets/images/products/${item.image}" alt="IMG" 
                        </div> 
                    </th>
                    <th class = "column-2">${item.name}</th>
                    <th class = "column-3">${item.price}</th>
                    <th class = "column-4">
                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                            <div class="checkout-btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" data-price="${item.price}" data-key="${item.id}">
                                <i class="fs-16 zmdi zmdi-minus"></i>
                            </div>
                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="${item.id}" value="${item.count}">
                            <div class="checkout-btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" data-price="${item.price}" data-key="${item.id}">
                                <i class="fs-16 zmdi zmdi-plus"></i>
                            </div>
                        </div>
                    </th>
                    <th class = "column-5">${totalPrice} Դրամ</th>
                </tr>
            `)
            orderSubTotal =  orderSubTotal + totalPrice;
        }

        $(".subtotal-order").text(orderSubTotal+' Դրամ');
        $(".subtotal-order").attr('data-total',orderSubTotal);
    }

    if(location.pathname === "/checkout"){
        var keys = localStorage.getItem('keys');
        var data = [];   
            keys = keys.split("|");
            for( i=0; i < keys.length; i++){
                
                var item = JSON.parse(localStorage.getItem(keys[i]));
                data.push({
                   id : item.id,
                   count : item.count
                });
            }
           data = JSON.stringify(data);
           $("#keys").val(data)
    }
    
    
   

})(jQuery);