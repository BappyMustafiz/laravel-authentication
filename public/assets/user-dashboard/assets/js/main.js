
function sameHeight () {

    var left_length = $("#video_wrap").length;
    let left = 0
    if (left_length > 0) { 
        left = document.getElementById('video_wrap').getBoundingClientRect().height;
    }
    if (left_length > 0) { 
        document.getElementById('chat_wrap').style.height=left + 'px';
    }

}

$(document).ready(function(){
    /*
    =================================================
        DROPDOWN
    =================================================
    */

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
    =================================================
        TAB 
    =================================================
    */

    $('.tabs li , .tabs a').click(function () {
        // e.preventDefault();
        $(this).siblings().removeClass("active");
        $(this).addClass("active");
        $(".tab_content").removeClass("show");
        $($(this).attr("href")).addClass("show");
        //    alert($($(this).attr("href")));
    });

    $('.tabs ul li span').click(function () {

        if ($(this).parent().next().length > 0) {
            $(this).parent().next().addClass("active");
            $(this).parent().next().trigger('click');
        }

        if ($(this).parent().prev().length > 0) {
            $(this).parent().prev().addClass("active");
            $(this).parent().prev().trigger('click');
        }
        $(this).parent().remove();
        $($(this).parent().attr("href")).removeClass("show");
    });


    /*
    ===============================================
        ACCORDION 
    ===============================================
    */

    $(document).on('click', '[data-toggle="collapse"]', function () {
        $($(this).toggleClass('open'));
        let target = $($(this).data('target'));
        target.slideToggle();
    });
    $(document).on('click', '[data-toggle="collapse_noslide"]', function () {
        $($(this).toggleClass('open'));
        let target = $($(this).data('target'));
        target.toggle();
    });

    /*
    ===============================================
        MODAL
    ===============================================
    */

    // OPEN
    $('[data-modal-open]').on('click', function (e) {
        // var window_height = $(window).height();
        // var body_height = $('body').height();
        // if (body_height > window_height) {
        //     $('body').css('padding-right', '17px');
        //     $('.header_area').css('margin-right', '17px');
        // } else {
        //     $('body').css('padding-right', '0px');
        //     $('.header_area').css('margin-right', '0px');
        // }
        $('body').addClass('model_open');
        var targeted_modal_class = jQuery(this).attr('data-modal-open');
        $('[data-modal="' + targeted_modal_class + '"]').addClass('open_modal');
        e.preventDefault();
    });

    // CLOSE
    $('[data-modal-close] , .modal_overlay').on('click', function (e) {
        // $('body').css('padding-right', '0px');
        // $('.header_area').css('margin-right', '0px');
        $('body').removeClass('model_open');
        var targeted_modal_class = jQuery(this).attr('data-modal-close');
        $('[data-modal="' + targeted_modal_class + '"]').removeClass('open_modal');
        e.preventDefault();
    });


    // CHECKED IF CHECKBOX CHEEKED OR NOT
    $('.item_list .inner').click(function(e) {
        $(this).addClass('active');
        $(this).siblings().removeClass('active')

    });

    sameHeight ();


    function pinnedPost() {
        let pinnedPostHeight = $('.pinned_post_wrapper').outerHeight();
        let replyChatHeight = $('.reply_chat').outerHeight();
    
        $('.chat_head').css({
            top : `${pinnedPostHeight}px`,
            height: `calc(100% - ${pinnedPostHeight + replyChatHeight}px)`
        })
    }

    pinnedPost();

    $(window).resize(function() {
        sameHeight ();
        pinnedPost()
    });


});

