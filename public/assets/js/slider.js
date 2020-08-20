
    $(".js-show-filter").click(function(){
        $(".panel-filter").slideToggle()
    })

    $(".all-categorys").click(function(){
        $(this).addClass('how-active1');
        $(".category-filter").removeClass('how-active1');
        $(".isotope-item").show();
    })
    $(".category-filter").click(function(){
        $(".category-filter").removeClass('how-active1');
        $(".all-categorys").removeClass('how-active1');
        $(this).addClass('how-active1');
        var topeContainer = $('.isotope-grid');
            topeContainer = topeContainer[0].children
            
        var filter = $(this).attr('data-filter');
        $.each( topeContainer, function( key, value ) {
                if(!$(value).hasClass(filter)) {
                    $(value).hide()
                }else{
                    $(value).show()
                }

            });
    });