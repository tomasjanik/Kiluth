/* Property of Kiluth | (c) 2016 Kiluth. */

$(document).ready(function () {
    //Menu button
    $(".menu").click(function () {
        $(".mobile-nav").fadeToggle();
    });
    //When Resize
    $(window).resize(function () {
        if ($(window).width() > 768) {}
        if ($(window).width() < 768) {
            $(".mobile-nav").fadeOut();
            $('.list-clients').fadeOut();
            $('.cover').fadeIn();
            $('.scroll-to-top').css("transition", "inherit");
            $('.scroll-to-top').fadeOut();
        }
    });
    //To top
    $('.scroll-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    });
    $('.scroll-to-top').hide();
    
    var lastScrollTop = 0;
    $(window).scroll(function (event) {
        if ($(window).width() > 1200) {
            var st = $(this).scrollTop();
            if (st > lastScrollTop) {
                // downscroll code
                $('.scroll-to-top').fadeIn();
                setTimeout(function () {
                    $('.scroll-to-top').css("transition", "all 0.3s ease");
                }, 500);
            } else {
                var pos = $(this).scrollTop();// upscroll code
                //reach top
                if (pos == 0) {
                    $('.scroll-to-top').css("transition", "none 0s ease");
                    $('.scroll-to-top').fadeOut();
                }
            }
            lastScrollTop = st;
        }
    });
    //Hold to redirect to admin page
    function redirectadmin() {
        window.location.href = "admin.php";
    }
    var timeoutId = 0;
    $('.hold-admin').mousedown(function () {
        timeoutId = setTimeout(redirectadmin, 2000);
    }).bind('mouseup mouseleave', function () {
        clearTimeout(timeoutId);
    });
    $(".hold-admin").on("taphold", function () {
        window.location.href = "admin.php";
    });
    //Filter Control
    $('.select').click(function () {
        $('.item').fadeOut();
        $("footer").animate({
            opacity: '0'
        });
        setTimeout(function () {
            $("footer").animate({
                opacity: '1'
            });
        }, 600);
        $('.link').removeClass("active");
        $(this).toggleClass("active");
    });
    $('.select-all').click(function () {
        setTimeout(function () {
            $('.item').fadeIn();
        }, 500);
    });
    //Tooltip
    $('[data-toggle="tooltip"]').tooltip();
});

$(window).on("load", function() {
    
});