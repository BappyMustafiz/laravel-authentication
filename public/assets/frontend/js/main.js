$(window).on('load', function () {
	$('#preloader').fadeOut('slow',function(){$(this).remove();});
    $('#wcModal').modal('show');
});

$(document).ready(function(){
    
        $(".product_filter > ul > li").hover(function() {
            $(this).find('.filter_megamenu').css({
                'opacity' : 1,
                'visibility' : 'visible'
            });
        }, function() {
            $(this).find('.filter_megamenu').css({
                'opacity' : 0,
                'visibility' : 'hidden'
            });
        });
        $('.product_fliter_btn button').click(function() {
            $('.filter_megamenu').css({
                'opacity' : 0,
                'visibility' : 'hidden'
            });
        })

        
        function topMargin() {
            var headerHeight = $('.header_area').outerHeight();
            $('.banner_area , .product_area , .product_single_area , .cart_area , .common_margin').css({
                'margin-top' : `${headerHeight}px`
            })
        }

        topMargin();
        $(window).resize(function() {
            topMargin();  
        });

        $('.toggler').click(function() {
            $('html').toggleClass('left_menu_open');
        });

        $('.toggler').click(function() {
            $('#wrap').toggleClass('open_nav');
            $('.mobile_menu').toggleClass('menu_open');
            $('.mobile_overlay').toggleClass('mobile_overlay_open');
            return false;
        });
        $('.mobile_overlay').click(function() {
            $('.mobile_menu').removeClass('menu_open');
            $('.mobile_overlay').removeClass('mobile_overlay_open');
            $('#wrap').removeClass('menu_open');
        });
        $('.header_search_icon').click(function() {
            $('.header_search').slideToggle();
        });
        $(window).on('scroll', function() {
            /*
            =========================================================================================
            2. NAVBAR 
            =========================================================================================
            */

            // if ($(window).scrollTop() > 28) {
            //     $(".header_area").addClass("fixed-top");
            // } else {
            //     $(".header_area").removeClass("fixed-top");
            // }

        });

        /*
        =========================================================================================
            RIGHT CART MENU
        =========================================================================================
        */

       $('.profile_ic').click(function(){
            $('.right_cart_menu').addClass('cart_open');
            $('.full_screen_overlay').addClass('overlay_open');
            return false;
        });

        $('.close_ic , .full_screen_overlay').click(function(){
            $('.right_cart_menu').removeClass('cart_open');
            $('.full_screen_overlay').removeClass('overlay_open');
        });

        function getbannerSettings() {
            return {
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: "<button class='arrow_left'><i class='lni lni-chevron-left'></i></button>",
                nextArrow: "<button class='arrow_right'><i class='lni lni-chevron-right'></i></button>",
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
    
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            }
        }

        function getSliderSettings() {
            return {
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 5,
                slidesToScroll: 5,
                prevArrow: "<button class='arrow_left'><i class='lni lni-chevron-left'></i></button>",
                nextArrow: "<button class='arrow_right'><i class='lni lni-chevron-right'></i></button>",
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
    
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                ]
            }
        }

        function commonSliderSettings() {
            return {
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 6,
                slidesToScroll: 6,
                prevArrow: false,
                nextArrow: false,
                // prevArrow: "<button class='arrow_left'><i class='lni lni-chevron-left'></i></button>",
                // nextArrow: "<button class='arrow_right'><i class='lni lni-chevron-right'></i></button>",
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
    
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                ]
            }
        }
        
        
        function instaSliderSettings() {
            return {
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 3,
                prevArrow: "<button class='arrow_left'><i class='lni lni-chevron-left'></i></button>",
                nextArrow: "<button class='arrow_right'><i class='lni lni-chevron-right'></i></button>",
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
    
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                ]
            }
        }

        setTimeout(function(){ 
            $('.banner_slider').slick(getbannerSettings());
            $('.banner_slider').show();

            $('.common_product_slider').slick(getSliderSettings());
            $('.common_product_slider').show();

            $('.common_slider').slick(commonSliderSettings());
            $('.common_slider').show();
            
            $('.insta_slider').slick(instaSliderSettings());
            $('.insta_slider').show();

            $('.campaign_slider').slick(getbannerSettings());
            $('.campaign_slider').show();

        }, 300);

    




    /*============================================
        PRODUCT PAGE
    ==============================================
    */

    $(document).on('click', '[data-toggle="collapse_slide"]', function(e) {
    e.preventDefault();
    list = $(this);
    var id = $(this).data('target');
    var hideCount = 0;
    for (let index = 0; index < list.length; index++) {
        const element = list[index];
        var elementId = $(element).data('target');
        if (id === elementId) {
            if ($(id).is(":visible")) { 
                $(id).slideUp();          
                hideCount++;
            } else {             
                $(id).slideDown();  
            }
        } else {
            $(elementId).slideUp();    
            hideCount++;
        }            
    } 
    });

    $('.product_filter_mobile > ul > li').click(function() {
        $(this).siblings().removeClass('active');
        $(this).toggleClass('active');
    });

    $('.p_f_c_inner > ul > li').click(function(e) {
        $(this).siblings().removeClass('active');
        $(this).toggleClass('active');
        e.preventDefault;
    });

    $('.filter_color_wrap > ul > li').click(function(e) {
        $(this).toggleClass('active');
        e.preventDefault;
    });

    $(document).mouseup(function(e) {
        $('.product_filter_content').each(function() {
            var dropdown = $(this);
            if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
                dropdown.slideUp();
            }
        });
    });

    $('.pwr_mobile').click(function() {
        $('body').addClass('open_left_cat');
    });

    $('.left_cat_mobile').click(function() {
        $('body').removeClass('open_left_cat');
    });

    $('.color_variation').each(function() {
        var allLi = $(this).find('li')
        $(allLi).click(function() {
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
        });
        if (allLi.length > 6 ) {
            $(this).addClass('multi_color');
            $(this).append( "<div class='arrow'></div>");
            $('.arrow').click(function() {
                $(this).parent().toggleClass('open')
            });
            $( `.color_variation li:nth-child(6)` ).after( "<div class='break'></div>");
        } 
    });

    /*==============================================
        PRODUCT SINGLE PAGE
    ================================================
    */
   $('.single_img').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: false,
    adaptiveHeight: true,
    infinite: false,
    useTransform: true,
    speed: 400,
    cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
});

$('.single_img_thumb').on('init', function(event, slick) {
        $('.single_img_thumb .slick-slide.slick-current').addClass('is-active');
    }).slick({
        vertical:true,
        verticalSwiping:true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 4,
        dots: false,
        focusOnSelect: false,
        infinite: false,
});

$('.single_img').on('afterChange', function(event, slick, currentSlide) {
    $('.single_img_thumb').slick('slickGoTo', currentSlide);
    var currrentNavSlideElem = '.single_img_thumb .slick-slide[data-slick-index="' + currentSlide + '"]';
    $('.single_img_thumb .slick-slide.is-active').removeClass('is-active');
    $(currrentNavSlideElem).addClass('is-active');
});

$('.single_img_thumb').on('click', '.slick-slide', function(event) {
    event.preventDefault();
    var goToSingleSlide = $(this).data('slick-index');
    $('.single_img').slick('slickGoTo', goToSingleSlide);
});

// $('.zoom_on_hover').zoom();

$('.variation  > ul > li').click(function() {
    $(this).siblings().removeClass('active');
    $(this).toggleClass('active');
});

/*============================================
    CART INCREASE DECREASE VALUE
==============================================
*/

$('.add').on('click', function() {
    var $qty = $(this).closest('.num_count').find('.qty');
    var currentVal = parseInt($qty.val());
    if (!isNaN(currentVal)) {
        $qty.val(currentVal + 1);
    }
});
$('.minus').on('click', function() {
    var $qty = $(this).closest('.num_count').find('.qty');
    var currentVal = parseInt($qty.val());
    if (!isNaN(currentVal) && currentVal > 0) {
        $qty.val(currentVal - 1);
    }
});
    /*
    ================================
        SINGLE PRODUCT MOBILE SLIDER
    ================================
    */  
   $('.single_img_mobile').slick({
        slidesToScroll: 1,
        slidesToShow: 5,
        rows: 0,
        dots: false,
        prevArrow: "<button class='arrow_left'><i class='lni lni-chevron-left'></i></button>",
        nextArrow: "<button class='arrow_right'><i class='lni lni-chevron-right'></i></button>",
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToScroll: 1,
                slidesToShow: 1
            }
        }, {
            breakpoint: 1024,
            settings: {
                slidesToScroll: 1,
                slidesToShow: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToScroll: 1,
                slidesToShow: 1
            }
        }]
    });

    /*
    ================================
      CHECKOUT PAGE
    ================================
    */ 

$('ul.tabs li').click(function(){
    var tab_id = $(this).attr('data-tab');

    $('ul.tabs li').removeClass('current');
    $('.tab-content').removeClass('current');

    $(this).addClass('current');
    $("#"+tab_id).addClass('current');
})

$(".info_form .form-group input").each(function(){
    // console.log(e);
    if( $(this).val() ) {
         $(this).parent().addClass('hasvalue');
      } else {
         $(this).parent().removeClass('hasvalue');
      }
});

$( '.info_form .form-group input' ).keyup(function() {
    if( $(this).val() ) {
        $(this).parent().addClass('hasvalue');
    } else {
        $(this).parent().removeClass('hasvalue');
    }
});

$(".info_form .form-group select").on("change",function(){
    if ( $(this).find('option:selected').val()) {
        $(this).parent().addClass('hasvalue');
    }else {
        $(this).parent().removeClass('hasvalue');
    }
});


$(document).on('click','.checkout_table_mobile .card-header button', function() {
    var hasCollapsed = $('.checkout_table_mobile .card-header button').hasClass('collapsed');
    if(hasCollapsed){
        $('#toggle_text').html(`Show order summary <i class="lni lni-chevron-down"></i>`);
    } else{
        $('#toggle_text').html(`hide order summary <i class="lni lni-chevron-up"></i>`);
    }
})

});

