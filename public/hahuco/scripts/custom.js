$(window).ready(function(){
    // $('[data-toggle="tooltip"]').tooltip();
     $('.dotdotdot').dotdotdot();

    $('.slide-products').slick({
        arrows: true,
        autoplay: false,
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 4,
        infinite: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow:2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow:1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.slide-navs').slick({
        arrows: false,
        autoplay: false,
        dots: true,
        slidesPerRow: 3,
        rows:2,
        infinite: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow:2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow:1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    

    $('.slider-partners').slick({
        autoplay: true,
        autoplaySpeed:4000,
        infinite: true,
        speed: 300,
        variableWidth:true,
        slidesToScroll:1,
        slidesToShow:6,
        arrows:false,
        dots:false
    });

    $('.banner-slider').slick({
        arrows: true,
        dots: true,
        autoplay: true,
        autoplaySpeed:5000,
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $('.slider-testimonials').slick({
        dots: true, 
        slidesToShow: 3, 
        slidesToScroll:3, 
        nfinite:true,
        arrows:false, 
        responsive:[
            {
                breakpoint: 992,
                settings:{
                    slidesToShow: 2, 
                    slidesToScroll: 2
                }
            }, 
            {
                breakpoint: 576, 
                settings:{
                    slidesToShow: 1, 
                    slidesToScroll: 1
                }
            }
        ]
    });

    

    // $('.navbar-light .navbar-nav .dropdown-toggle').unbind("click");

    $(window).scroll(function () {
        var scroll = $(this).scrollTop();
        if (scroll >= 350) {
            $('body').addClass('fixed-header');
        } else {
            $('body').removeClass('fixed-header');
        }

    });

    // $('[data-toggle="datepicker"]').datepicker({
    //     'format':'dd/mm/yyyy'
    // });
    //
    // $('[data-toggle="timepicker"]').chungTimePicker();

});


