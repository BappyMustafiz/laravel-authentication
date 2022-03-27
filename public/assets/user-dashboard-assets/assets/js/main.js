$(document).ready(function(){






    
    /*
    =====================================
      HOME PRODUCT SLIDER
    =====================================
    */


    // $('.tab_slide').slick({
    //     slidesToScroll: 3,
    //     slidesToShow: 3,
    //     rtl: false,
    //     autoplay: true,
    //     rows: 0,
    //     dots: false,
    //     prevArrow: false,
    //     nextArrow: false
    // });










        // //TAB ARROW
        // var tab_selector, tablist, current_active, list_lenth;

        // tab_selector = '#myTab1';

        // tablist = $( tab_selector + ' .nav-tabs > li > a[data-toggle="tab"]' );

        // list_lenth = tablist.length;

        // $( tab_selector + ' > a.tab_nav').click(function(e) {
        
        // e.preventDefault(); // stop default action
        
        // $(tablist).each(function(index) {
            
        //     if ($(this).parent().hasClass('active')) {
            
        //     current_active = index; // check currently active tab
            
        //     }
            
        // });
        
        // if ($(this).hasClass("prev")) {  
            
        //     if (current_active !== 0) {
            
        //     // if active tab isn't the first tab show previous tab
        //     $(tablist[current_active - 1]).tab('show');
            
        //     } else {
            
        //     // if active tab is the first tab show last tab
        //     $(tablist[list_lenth - 1]).tab('show');
            
        //     }
            
        // } else if ($(this).hasClass("next")) {
            
        //     if (current_active != list_lenth - 1) {
            
        //     // if active tab isn't the last tab show next tab
        //     $(tablist[current_active + 1]).tab('show');
            
        //     } else {
            
        //     // if active tab is the last tab show first tab
        //     $(tablist[0]).tab('show');
            
        //     }
            
        // }
        
        // });


    
        var w = $(window).width();

        if (w > 767) {
            showHideNavigation();
        } else {

        }


        var headerHeight =  $('.header_area').outerHeight();
        // contentHeight();
        if (w > 767) {
            $(window).on('scroll', function () {
                // contentHeight();
            });
    
        } else {
            $('.video_thumbnail').css({
                top : 'auto'
            })
            $('.video_thumbnail .thumbnail_content').css({
                height : 'auto'
            })
        }

        /*
        =================================================
            WINDOW RESIZE
        =================================================
        */
        // $(window).resize(function () {
        //     contentHeight()
        //     showHideNavigation()
        // });

        $('.dropdown button').click(function () {
            $(this).parent().children('.dropdown_menu').toggleClass('open');
        });
    
        $(document).mouseup(function (e) {
            $('.dropdown').each(function () {
                var dropdown = $(this);
                if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
                    dropdown.find('.dropdown_menu').removeClass('open');
                }
            });
            // if the target of the click isn't the container nor a descendant of the container
        });



    /*
    ===============================================
        MODAL
    ===============================================
    */

    // OPEN
    $('[data-modal-open]').on('click', function (e) {

        $('body').addClass('model_open');
        var targeted_modal_class = jQuery(this).attr('data-modal-open');
        $('[data-modal="' + targeted_modal_class + '"]').addClass('open_modal');
        e.preventDefault();
    });
    // CLOSE
    $('[data-modal-close] , .modal_overlay').on('click', function (e) {
        $('body').removeClass('model_open');
        var targeted_modal_class = jQuery(this).attr('data-modal-close');
        $('[data-modal="' + targeted_modal_class + '"]').removeClass('open_modal');
        e.preventDefault();
    });

    $('.toggle').click(function() {
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


});

// function contentHeight() {
//     var windowScroll = $(window).scrollTop();
//     var sidelength = $(".video_thumbnail").length;
//     if (sidelength == true) {
//         var windowHeight =  $(window).height();
//         var titleHeight =  $('.video_thumbnail .title').outerHeight();
//         var headerHeight =  $('.header_area').outerHeight();
//         var withoutHeaderHeight = headerHeight + titleHeight;
//         if (windowScroll < headerHeight) {
//             $('.video_thumbnail').css({
//                 top : `${headerHeight}px`
//             })
//             $('.video_thumbnail .thumbnail_content').css({
//                 height : `${windowHeight - withoutHeaderHeight}px`
//             })
//         } else {
//             $('.video_thumbnail').css({
//                 top : '0px'
//             })
//             $('.video_thumbnail .thumbnail_content').css({
//                 height : `${windowHeight - titleHeight}px`
//             })
//         }
//     }
// }


function showHideNavigation() {
    $('.course_collapse').hide();
    $('.close_icon').click(function() {
        $('.main_video').css({
            width : '100%'
        })
        $('.course_collapse').show();
        $('.video_thumbnail').css({
            display : 'none'
        })
    });
    $('.course_collapse').click(function() {
        $('.main_video').css({
            width : '75%'
        })
        $('.course_collapse').hide();
        $('.video_thumbnail').css({
            display : 'block'
        })
    });
}