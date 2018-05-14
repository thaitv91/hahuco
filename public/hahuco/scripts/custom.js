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
                    slidesPerRow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesPerRow: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesPerRow: 1
                }
            }
        ]
    });

    $('.slide-video').slick({
        arrows: true,
        autoplay: false,
        dots: false,
        // slidesToShow: 4, 
        // slidesToScroll:4, 
        slidesToShow: 3,
        centerPadding: "10px",
        draggable: false,
        infinite: true,
        pauseOnHover: false,
        swipe: false,
        touchMove: false,
        vertical: true,
        speed: 1000,
        autoplaySpeed: 2000,
        useTransform: true,
        cssEase: 'cubic-bezier(0.645, 0.045, 0.355,1.000)',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll:3 
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll:2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll:1
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
                breakpoint: 760, 
                settings:{
                    slidesToShow: 1, 
                    slidesToScroll: 1
                }
            }
        ]
    });

    $( '.ratebox' ).raterater( {
        submitFunction: 'rateAlert',
        allowChange: false,
        starWidth: 20,
        spaceWidth: 5,
        numStars: 5
    } );
    
    $('.scrollTop').click(function(){
        $("html, body").animate({ scrollTop: "0" });
    });

    // $('.navbar-light .navbar-nav .dropdown-toggle').unbind("click");

    $(window).scroll(function () {
        var scroll = $(this).scrollTop();
        if (scroll >= 350) {
            $('body').addClass('fixed-header');
            $('.scrollTop').show();
        } else {
            $('body').removeClass('fixed-header');
            $('.scrollTop').hide();
        }

    });

    // $('[data-toggle="datepicker"]').datepicker({
    //     'format':'dd/mm/yyyy'
    // });
    //
    // $('[data-toggle="timepicker"]').chungTimePicker();

});


