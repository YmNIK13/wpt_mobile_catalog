jQuery(function ($) {
    // tool tips
    $('.tooltips').tooltip();

    // popovers
    $('.popovers').popover();

    // bxslider

    // $('.bxslider').show();
    // $('.bxslider').bxSlider({
    //     minSlides: 4,
    //     maxSlides: 4,
    //     slideWidth: 276,
    //     slideMargin: 20
    // });

    $('<i id="back-to-top"></i>').appendTo($('body'));

    $(window).scroll(function () {

        if ($(this).scrollTop() != 0) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }

    });

    $('#back-to-top').click(function () {
        $('body,html').animate({scrollTop: 0}, 600);
    });


    var wow = new WOW(
        {
            boxClass:     'wow',      // default
            animateClass: 'animated', // default
            offset:       0          // default
        }
    )
    wow.init();

});

