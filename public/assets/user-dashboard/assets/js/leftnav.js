/*
=================================================
    FUNCTIONS
=================================================
*/


function navSwitch(selector, listSelector = '.left_nav_list > li', finder = '.left_f_list', childSelector = '', childFinder = '') {
    // console.log(index);
    $($(selector).toggleClass('open'));
    list = $(listSelector);
    console.log(list);
    var id = $(selector).data('target');
    var hideCount = 0;
    for (let index = 0; index < list.length; index++) {
        const element = list[index];
        var elementId = $(element).find(finder).data('target');
        if (id === elementId) {
            if ($(id).is(":visible")) {
                $(id).slideUp();
                hideCount++;
            } else {
                $(id).slideDown();
            }
        } else {
            $(element).find('.left_f_list').removeClass('open');
            $(element).find('.left_f_list_level2').removeClass('open');
            $(element).find('.left_f_list_level3').removeClass('open');
            $(elementId).slideUp();
            hideCount++;
            if (childSelector && childFinder) {
                hideOtherNav(childSelector, childFinder)
            }
        }
    }
}

function showHideNav(selector, listSelector = '.left_nav_list > li', parentFinder = '[data-toggle="accordion"]', innerFinder = '.left_f_list') {
    $($(selector).parent().find(parentFinder).toggleClass('open'));
    var id = $(selector).parent().find(parentFinder).data('target');
    list = $(listSelector);
    var hideCount = 0;
    for (let index = 0; index < list.length; index++) {
        const element = list[index];
        var elementId = $(element).find(innerFinder).data('target');
        if (id === elementId) {
            $(id).show();
            var idOffset = $(id).offset().top;
            var idHeight = $(id).height();
            var windowHeight = $(window).height();
            var coputedHeight = idHeight / 3;
            totalOffset = idOffset + idHeight;

            if (totalOffset > windowHeight) {
                $(id).css({
                    'top': 'auto',
                    'bottom': -coputedHeight,
                });
            }
        } else {
            $(elementId).hide();
            hideCount++;
        }
    }
}

function hideOtherNav(selector = '.left_nav_list > li', finderSelector = '.left_f_list') {
    var list = $(selector);
    for (let index = 0; index < list.length; index++) {
        const element = list[index];
        var elementId = $(element).find(finderSelector).data('target');
        $($(element).find(finderSelector).removeClass('open'));
        $(elementId).hide();
    }
}

/*
=================================================
    DOCUMENT READY
=================================================
*/
$(document).ready(function () {

    $(document).on('click', '[data-toggle="accordion"]', function () {
        navSwitch(this, '.left_nav_list > li', '.left_f_list', '.left_nav_level2', '.left_f_list_level2');
    });

    $(document).on('click', '[data-toggle="accordion_level2"]', function () {
        navSwitch(this, '.left_nav_level2', '.left_f_list_level2', '.left_nav_level3', '.left_f_list_level3');
    });

    $(document).on('click', '[data-toggle="accordion_level3"]', function () {
        navSwitch(this, '.left_nav_level3', '.left_f_list_level3');
    });

    // hideOtherNav('.left_nav_list > li', '.left_f_list');

    $('.collapse_arrow span').click(function () {
        $('#wrapper').removeClass('right_menu_collapse');
        $('#wrapper').toggleClass('vertical_collpsed');
        $('.mobile_overlay').toggleClass('open');
        if ($('#wrapper').hasClass('vertical_collpsed')) {
            hideOtherNav('.left_nav_list > li', '.left_f_list');
            hideOtherNav('.left_nav_level2', '.left_f_list_level2');
            hideOtherNav('.left_nav_level3', '.left_f_list_level3');
        } else {
        }
        setTimeout(function() { 
            sameHeight ()
        }, 490);
    });
    
    $('.mobile_overlay').click(function () {
        $('.mobile_overlay').removeClass('open');
        $('#wrapper').addClass('vertical_collpsed');
    });

    $('.vertical_collpsed [data-toggle="accordion"] , .left_nav_list > li > .sub_accordion').hover(function () {

        if ($(".vertical_collpsed").length > 0) {
            showHideNav(this, '.left_nav_list > li', '[data-toggle="accordion"]', '.left_f_list');
        }

        if ($('body').hasClass('vertical_collpsed')) {
        } else {
        }

    }, function () {

        if ($(".vertical_collpsed").length > 0) {
            hideOtherNav('.left_nav_list > li', '.left_f_list');
            hideOtherNav('.left_nav_level2', '.left_f_list_level2');
            hideOtherNav('.left_nav_level3', '.left_f_list_level3');
        }
    });

    $('.collapse_arrow_right .mobile_setting').click(function () {
        $('body').addClass('vertical_collpsed');
        $('body').toggleClass('right_menu_collapse');
        if ($('body').hasClass('right_menu_collapse')) {
            hideOtherNav('.left_nav_list > li', '.left_f_list');
            hideOtherNav('.left_nav_level2', '.left_f_list_level2');
            hideOtherNav('.left_nav_level3', '.left_f_list_level3');
        }
    });


    // $('.right_nav_list > li').click(function() {
    //     $(this).find('.dropdown').toggle();
    //     $(this).siblings().find('.dropdown').hide();
    // });

    // $('.right_nav_list > li , .right_nav_list > li .dropdown').hover(function () {
    //     $('.right_nav_list > li .dropdown').show();
    // }, function () {
    //     $('.right_nav_list > li .dropdown').hide();
    // });

    $('.right_nav_list [data-toggle="accordion"] , .right_nav_list > li > .sub_accordion').hover(function () {
        if ($(".right_menu_collapse").length > 0) {
            showHideNav(this, '.right_nav_list > li', '[data-toggle="accordion"]', '.left_f_list');
        }
    }, function () {

        if ($(".vertical_collpsed").length > 0) {
            hideOtherNav('.right_nav_list > li', '.left_f_list');
            hideOtherNav('.left_nav_level2', '.left_f_list_level2');
            hideOtherNav('.left_nav_level3', '.left_f_list_level3');
        }
    });


    

});
