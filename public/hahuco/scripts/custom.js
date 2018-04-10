$(window).ready(function(){
    // $('[data-toggle="tooltip"]').tooltip();
     $('.dotdotdot').dotdotdot();

    $('.slider-testimonial').slick({
        arrows: true,
        autoplay: true,
        dots: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow:1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.slider-partners').slick({
        arrows: true,
        autoplay: false,
        dots: false,
        slidesPerRow: 5,
        rows:3,
        infinite: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesPerRow: 4,
                    rows:3
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesPerRow: 3,
                    rows:2
                }
            },
            {
                breakpoint: 567,
                settings: {
                    slidesPerRow: 2,
                    rows:2
                }
            },
            {
                breakpoint: 360,
                settings: {
                    slidesPerRow: 1,
                    rows:2
                }
            }
        ]
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


    // $('.dotdotdot, .tile-news .text h4, .tile-news .text .description').dotdotdot();

    $('footer .toggle').click(function(){
        $(this).parent().toggleClass('show-nav-link');
    });

    $('.slider-customer').slick({
        arrows: true,
        autoplay: false,
        dots: false,
        slidesPerRow: 3,
        rows:2,
        infinite: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesPerRow: 2,
                    rows:2
                }
            },
            {
                breakpoint: 567,
                settings: {
                    slidesPerRow: 1,
                    rows:2
                }
            }
        ]
    });

    $('.slider-news').slick({
        arrows: true,
        autoplay: false,
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow:1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.toggle-navright span').click(function(){
        $(this).hide();
        $('.nav-right-fixed').addClass('show-nav');
    });

    $('.close-nav').click(function(){
        $('.nav-right-fixed').removeClass('show-nav');
        $('.toggle-navright span').show();
    });

    $('.slider-awards').slick({
        autoplay: true,
        autoplaySpeed:3000,
        infinite: true,
        speed: 300,
        variableWidth:true,
        slidesToScroll:1,
        arrows:false,
        dots:false
    });


    $('.btn-toggle-pro').click(function(){
        $(this).parent().toggleClass('hidden-pro');
    });

    $('.slider-download').slick({
        arrows: true,
        autoplay: false,
        dots: false,
        slidesToShow: 6,
        slidesToScroll: 6,
        infinite: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow:3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow:2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 368,
                settings: {
                    slidesToShow:1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.slide-education').slick({
        arrows: true,
        autoplay: false,
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
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

    $('#select-option-search').on('change', function (){
        var name = $(this).find('option:selected').attr('value');
        $('#result').empty();
        if (name == "GCN"){
            $('.searchtc .option-1').show();
            $('.searchtc .option-2').hide();
            $('.searchtc .option-3').hide();
            $('.searchtc .option-2').find('input:text').val('');
            $('.searchtc .option-3').find('input:text').val('');

            $('.searchtc .option-3').find('input:text').attr('disabled', true);
            $('.searchtc .option-2').find('input:text').attr('disabled', true);
            $('.searchtc .option-1').find('input:text').attr('disabled', false);
        }
        else if (name == "HOADON"){
            $('.searchtc .option-2').show();
            $('.searchtc .option-1').hide();
            $('.searchtc .option-3').hide();

            $('.searchtc .option-1').find('input:text').val('');
            $('.searchtc .option-3').find('input:text').val('');

            $('.searchtc .option-1').find('input:text').attr('disabled', true);
            $('.searchtc .option-3').find('input:text').attr('disabled', true);
            $('.searchtc .option-2').find('input:text').attr('disabled', false);
        } else {
            $('.searchtc .option-3').show();
            $('.searchtc .option-1').hide();
            $('.searchtc .option-2').hide();

            $('.searchtc .option-1').find('input:text').val('');
            $('.searchtc .option-2').find('input:text').val('');

            $('.searchtc .option-3').find('input:text').attr('disabled', false);
            $('.searchtc .option-1').find('input:text').attr('disabled', true);
            $('.searchtc .option-2').find('input:text').attr('disabled', true);
        }
    });

    $(window).scroll(function () {
        var scroll = $(this).scrollTop();
        if (scroll >= 350) {
            $('body').addClass('fixed-header');
        } else {
            $('body').removeClass('fixed-header');
        }

        if (scroll >= 750) {
            $('.product-promotion').addClass('hidden-pro');
        } else {
            $('.product-promotion').removeClass('hidden-pro');
        }
    });

    // $('[data-toggle="datepicker"]').datepicker({
    //     'format':'dd/mm/yyyy'
    // });
    //
    // $('[data-toggle="timepicker"]').chungTimePicker();

});


