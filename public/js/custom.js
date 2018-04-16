$(window).ready(function(){
    $('.next-section').smoothScroll();

    $('[data-toggle="tooltip"]').tooltip();

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
        arrows: false,
        dots: true,
        autoplay: true,
        autoplaySpeed:5000,
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    


    $('.dotdotdot, .tile-news .text h4, .tile-news .text .description').dotdotdot();

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

    $('[data-toggle="datepicker"]').datepicker({
        'format':'dd/mm/yyyy'
    });

    $('[data-toggle="timepicker"]').chungTimePicker();

    $('#form-indem-health').validate(
    {
        messages : {
            ho_ten_ndbh : {required : 'Nhập họ tên người được bảo hiểm'},
            cmnd : {required : 'Nhập chứng minh nhân dân'},
            ngay_sinh : {required : 'Nhập ngày sinh'},
            ho_ten_tb : {required : 'Nhập họ tên người yêu cầu trả tiền'},
            email_tb : {required : 'Nhập địa chỉ E-mail', email : 'E-mail không đúng định dạng'},
            dthoai_tb : {required : 'Nhập số điện thoại'},
            dieu_tri : {required : 'Chọn hình thức điều trị'},
            ngay_vv : {required : 'Ngày khám/Nhập viện'},
            ngay_rv : {required : 'Ngày kết thúc/Ra viện'},
            tinh_thanh_bv_ten : {required : 'Nhập Tỉnh/thành nơi khám chữa bệnh'},
            ten_bv : {required : 'Nhập tên cơ sở y tế'},
            chan_doan : {required : 'Nhập chuẩn đoán bệnh'},
            so_tien_ycbh : {required : 'Nhập số tiền yêu cầu bảo hiểm'},
            hinh_thuc_tt : {required : 'Chọn hình thức thanh toán'},
            nguoi_nhan_tt : {required : 'Nhập tên người thụ hưởng'},
            tai_khoan_tt : {required : 'Nhập số tài khoản ngân hàng'},
            ngan_hang_tt_ten : {required : 'Nhập tên ngân hàng/Chi nhánh'},

        }
    }
    );

    $('#form-indem-car').validate({
        messages : {
            // lincense_number : {required : 'Nhập biển số xe'},
            ho_ten_tb : {required : 'Nhập tên người thông báo'},
            email_tb : {required : 'Nhập địa chỉ E-mail người thông báo', email : 'E-mail không đúng định dạng'},
            ngay_tb : {required : 'Nhập ngày thông báo'},
            gio_tb : {required : 'Nhập giờ thông báo'},
            dthoai_tb : {required : 'Nhập số điện thoại người thông báo'},
            bien_xe : {required : 'Nhập biển số xe của người thông báo'},
            ngay_xr : {required : 'Nhập ngày xảy ra sự cố'},
            gio_xr : {required : 'Nhập giờ xảy ra sự cố'},
            tinh_thanh_ten : {required : 'Nhập Tỉnh/thành xảy ra sự cố'},
            quan_huyen_ten : {required : 'Nhập Quận/Huyện xảy ra sự cố'},
            dia_diem : {required : 'Nhập địa chỉ xảy ra sự cố cụ thể'},
            nguyen_nhan : {required : 'Nhập nguyên nhân xảy ra sự cố'},
            hau_qua : {required : 'Nhập hậu quả tổn thất sau sự cố'},
            ngay_gd : {required : 'Nhập ngày giám định'},
            gio_gd : {required : 'Nhập giờ giám định'},
            tinh_thanh_gd_ten : {required : 'Nhập Tỉnh/Thành giám định'},
            quan_huyen_gd_ten : {required : 'Nhập Quận/Huyện giám định'},
            dia_diem_gd : {required : 'Nhập địa nơi giám định cụ thể'},
            ho_ten_lhe : {required : 'Nhập họ tên người liên hệ'},
            dthoai_lhe : {required : 'Nhập số điện thoại liên hệ'},
            ma_gara : {required : 'Chọn ga-ra liên kết của VBI'},
            tinh_thanh_gara : {required : 'Nhập Tỉnh/Thành'},
            quan_huyen_gara : {required : 'Nhập Quận/Huyện'},
            ten_gara : {required : 'Nhập tên của ga-ra'},
            dchi_gara : {required : 'Địa chỉ của ga-ra'},
        }
    });

    (function ($) {
        $.fn.serializeFormJSON = function () {

            var o = {};
            var a = this.serializeArray();
            $.each(a, function () {
                if (o['"' + this.name + '"']) {
                    if (!o['"' + this.name + '"'].push) {
                        o['"' + this.name + '"'] = [o['"' + this.name + '"']];
                    }
                    o['"' + this.name + '"'].push(this.value || '');
                } else {
                    o['"' + this.name + '"'] = this.value || '';
                }
            });
            return o;
        };
    })(jQuery);

    $('#form-indem-health').on('submit', function(e) {
        e.preventDefault();
        var myForm = document.getElementById('form-indem-health');
        var formData = new FormData(myForm);

        var url = '/api/health-api';
        if ($('#form-indem-health').valid()){
            $('#btn-submit-health').addClass('hidden-block');
            $('.loading').removeClass('hidden-block');
            $.ajax({
                type        : 'POST',
                url         : url,
                data        : formData,
                processData: false,
                contentType: false
            })
                .done(function(status) {
                    if (status == 'SUCCESS'){
                        nextStep(4);
                    } else {
                        $('#form-indem-health')[0].reset();
                        $('#form-indem-health .step-1').removeClass('hidden-block');
                        $('#form-indem-health .step-3').addClass('hidden-block');
                        toastr.error(status);
                        moveTo('#form-indem-health');
                    }
            });
        }
    });

    $('#paying-method').on('change', function() {
        if ($(this).val() == 'CK'){
            $('#paying-number').html('Số tài khoản ngân hàng <span>*</span>');
            $( "input[name*='ngan_hang_tt_ten']" ).attr('disabled', false);
            $( "input[name*='ngan_hang_tt_ten']" ).val('');
            $( "input[name*='tai_khoan_tt']" ).val('');
            $( "input[name*='ngan_hang_tt_ten']" ).parent().parent().removeClass('hidden-block');
        } else {
            $('#paying-number').html('CMND/Hộ chiếu <span>*</span>');
            $( "input[name*='ngan_hang_tt_ten']" ).attr('disabled', true);
            $( "input[name*='ngan_hang_tt_ten']" ).val('');
            $( "input[name*='tai_khoan_tt']" ).val('');
            $( "input[name*='ngan_hang_tt_ten']" ).parent().parent().addClass('hidden-block');
        }
    });

    if ((typeof health_facilities) !== 'undefined')
        $("#health-facility").autocomplete({
            source: health_facilities,
        });

    $('#form-indem-car').on('submit', function(e) {
        e.preventDefault();
        var myForm = document.getElementById('form-indem-car');
        var formData = new FormData(myForm);

        var url = '/api/car-api';
        if ($('#form-indem-car').valid()) {
            $('#btn-submit-car').addClass('hidden-block');
            $('.loading').removeClass('hidden-block');
            $.ajax({
                type        : 'POST',
                url         : url,
                data        : formData,
                processData: false,
                contentType: false
            })
                .done(function(status) {
                    if (status == 'SUCCESS'){
                        next(5);
                    } else {
                        $('#form-indem-car')[0].reset();
                        $('#form-indem-car .step-1').removeClass('hidden-block');
                        $('#form-indem-car .step-4').addClass('hidden-block');
                        toastr.error(status);
                        moveTo('#form-indem-car');
                    }
            });
        }
    });

    $('#province').on('change', function() {
        var province_code = $(this).val();
        $.ajax({
            url : '/get-quan-huyen',
            data : {province_code : province_code}
        }).done(function(data) {
            $('#district').empty();
            $.each(data, function(index, value) {
                $('#district').append('<option value="'+value.code+'">'+value.name+'</option>');
            })
        });
    });

    $('#province-identification').on('change', function() {
        var province_code = $(this).val();
        $.ajax({
            url : '/get-quan-huyen',
            data : {province_code : province_code}
        }).done(function(data) {
            $('#district-identification').empty();
            $.each(data, function(index, value) {
                $('#district-identification').append('<option value="'+value.code+'">'+value.name+'</option>');
            })
        });
    });

    $('#province-garage').on('change', function() {
        var province_code = $(this).val();
        $.ajax({
            url : '/get-quan-huyen',
            data : {province_code : province_code}
        }).done(function(data) {
            $('#district-garage').empty();
            $.each(data, function(index, value) {
                $('#district-garage').append('<option value="'+value.code+'">'+value.name+'</option>');
            })
        });
    });

   $('.i-want .slogan h3').each(function(){
       $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
   });

   $('#money-require').number(true);

    anime.timeline({loop: true})
    .add({
        targets: '.i-want .slogan h3 .letter',
        translateX: [40,0],
        translateZ: 0,
        opacity: [0,1],
        easing: "easeOutExpo",
        duration: 6000,
        delay: function(el, i) {
            return 500 + 30 * i;
        }
    }).add({
        targets: '.i-want .slogan h3 .letter',
        translateX: [0,-30],
        opacity: [1,0],
        easing: "easeInExpo",
        duration: 1100,
        delay: function(el, i) {
            return 100 + 30 * i;
        }
    });
});


