<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="google-site-verification" content="0Aqnw36QedShF9MeA3Pixc8RZWREMp6E95iTecttMgw" />
    <link rel="shortcut icon" href="uploads/version/logo-ico-201712121314331AhdyXKwCJ.ico" />
    <base   />
    {{--<meta name="author" content="Thiết kế website bởi escovietnam.vn" />--}}
    {{--<meta name="web_author" content="Thiết kế website bởi escovietnam.vn" />--}}
    {!! SEO::generate() !!}
    <title>{{ isset($title) ? $title : 'Hahuco.com.vn' }}</title>


    {{--<meta name="description" content="Công ty Kim Loại Tấm Intech Việt Nam chuyên gia công kim loại và phân phối các thiết bị công nghiệp với chất lượng tốt nhất hiện nay." />--}}
    {{--<meta name="keywords" content="Kim loại tấm Intech Việt Nam, xe đẩy, xe đẩy hàng, giá kệ, giá kệ kho hàng, tủ đựng dụng cụ, bàn inox, bàn thao tác, gia công cắt laser, gia công đột cnc, chấn gấp cnc," />--}}
    {{--<meta property="og:title" content="CÔNG TY CỔ PHẦN KIM LOẠI TẤM INTECH VIỆT NAM"/>--}}
    {{--<meta property="og:type" content="website"/>--}}
    {{--<meta property="og:url" content="index.html"/>--}}
    {{--<meta property="og:image" content="/hahuco/imgs/noimage.png" />--}}
    {{--<meta property="og:description" content="Công ty Kim Loại Tấm Intech Việt Nam chuyên gia công kim loại và phân phối các thiết bị công nghiệp với chất lượng tốt nhất hiện nay."/>--}}
    
    <link type="text/css" href="/stylesheets/slick.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="/hahuco/templates/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/hahuco/templates/custom.css">
    <script src="/hahuco/scripts/jquery.js"></script>
    <script type="text/javascript" src="/js/slick.js"></script>
    <script type="text/javascript" src="/hahuco/scripts/jquery.dotdotdot.js"></script>
    <script type="text/javascript" src="/hahuco/scripts/custom.js"></script>
    <script type="text/javascript" src="/hahuco/scripts/bootstrap.js"></script>
    <!--[if IE 6]>
    <script src="scripts/DD_belatedPNG_0.0.8a.js"></script>
    <script>DD_belatedPNG.fix('img, div, span, a, h1, h2, h3, h4, h5, h6, p, table, input');</script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="scripts/selectivizr-min.js"></script>
    <script src="scripts/html5.js"></script>
    <link rel="stylesheet" type="text/css" href="templates/FIX_IE.css" />
    <![endif]-->
</head>
<body>
<div id="wrapper">
    <header id="header">
        <div class="banner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        @if($logo)
                            <a class="logo" href="/"><img src="/{{ $logo }}" alt="Logo {{ $sitename }}"></a>
                        @else
                            <a class="logo" href="/">{{ $sitename }}</a>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <div class="search">
                            <form action="http://kimloaitamintech.com/xu-ly.htm" method="post">
                                <input class="ipt_s box-sizing-fix" type="text" placeholder="Từ khóa tìm kiếm..!" name="search_tukhoa">
                                <input class="btn_s" type="submit" value="&nbsp;">
                            </form>
                        </div><!-- End .search -->
                    </div>
                </div>                
            </div><!-- End .container -->
        </div><!-- End .banner -->
        <nav class="nav_mn">
            <div class="container">
                <ul class="ul_mn clearfix d-none d-lg-block">
                    <li class="active"><a href="index.html">Trang chủ</a></li>
                    <li><a href="/gioi-thieu">Giới Thiệu</a>
                        <ul class="mn_child_01">
                            <li><a href="gioi-thieu/gia-tri-cot-loi/index.html">Giá trị cốt lõi</a>
                            </li>
                            <li><a href="gioi-thieu/chinh-sach-chat-luong/index.html">Chính sách chất lượng</a></li>
                            <li><a href="gioi-thieu/gioi-thieu-ve-kim-loai-tam-intech/index.html">Giới thiệu về kim loại tấm Intech</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/san-pham/">Sản phẩm</a>
                        <ul class="mn_child_01 mn_child_02">
                            <li><a href="gia-cong-dot-cnc/index.html">Gia công đột CNC</a></li>
                            <li><a href="gia-cong-chan-gap-cnc/index.html">Gia công chấn gấp CNC</a>
                            </li>
                            <li><a href="gia-cong-cat-laser/index.html">Gia công cắt laser</a></li>
                            <li><a href="gia-ke-gia-ke-kho-hang/index.html">Giá kệ, giá kệ kho hàng</a></li>
                            <li><a href="xe-day-xe-day-hang/index.html">Xe đẩy, xe đẩy hàng</a></li>
                            <li><a href="ban-thao-tac-ban-inox/index.html">Bàn thao tác, Bàn Inox</a></li>
                            <li><a href="thang-mang-cap-dien/index.html">Thang máng cáp điện</a></li>
                            <li><a href="dot-dap-hang-loat/index.html">Đột dập hàng loạt</a></li>
                            <li><a href="tu-dung-dung-cu/index.html">Tủ đựng dụng cụ</a></li>
                            <li><a href="tu-phong-sach/index.html">Tủ phòng sạch</a></li>
                            <li><a href="ban-an-cong-nghiep/index.html">Bàn ăn công nghiệp</a></li>
                        </ul>
                    </li>
                    <li><a href="/dich-vu">Dịch vụ</a></li>
                    <li><a href="/catalog">Catalogue</a></li>
                    <li><a href="/tin-tuc">Tin tức</a></li>
                    <li><a href="/tuyen-dung">Tuyển Dụng</a></li>
                    <li><a href="/lien-he">Liên hệ</a></li>
                </ul><!--End .ul_mn -->
                <a class="icon_menu_mobile" href="javascript:void(0)" val="0"></a>
            </div><!-- End .min_wrap -->
        </nav><!-- End .nav_mn -->
    </header><!-- End #header -->
    @yield("content")
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="about-ft">
                            <div class="text-center">
                                <h3>CÔNG TY CỔ PHẨN KIM LOẠI TẤM INTECH VIỆT NAM</h3>
                                <p>MST: 0107273031 do Sở Kế Hoạch Đầu Tư TP.Hà Nội cấp ngày 29/12/2015.</p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="ul_info_foot">
                                        <li><strong>Trụ sở chính</strong>

                                            <p><img alt="" src="/hahuco/imgs/layout/icon_foot_1.png" />{!! $trusochinh_address !!}</p>

                                            <p><img alt="" src="/hahuco/imgs/layout/icon_foot_2.png" /> Điện thoại: <a href="tel:{{ $hotline1 }}">{{ $hotline1 }}</a></p>

                                            <p><img alt="" src="/hahuco/imgs/layout/icon_foot_3.png" /> Email: <a href="mailto:{!! $email1 !!}">{!! $email1 !!}</a></p>

                                            <p><img alt="" src="/hahuco/imgs/layout/icon_foot_4.png" /> Hotline: <a href="tel:{{ $hotline2 }}">{{ $hotline2 }}</a></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="ul_info_foot">
                                        <li><strong>Xưởng sản xuất</strong>
                                            <p><img alt="" src="/hahuco/imgs/layout/icon_foot_1.png" /> Địa chỉ: Lô 6, Khu công nghiệp Lai Xá, Xã Kim Chung, Huyện Hoài Đức, TP.Hà Nội.</p>

                                            <p><img alt="" src="/hahuco/imgs/layout/icon_foot_2.png" /> Điện thoại: <a href="tel:{{ $hotline1 }}">{{ $hotline1 }}</a></p>

                                            <p><img alt="" src="/hahuco/imgs/layout/icon_foot_3.png" /> Email:  <a href="mailto:{!! $email2 !!}">{!! $email2 !!}</a></p>

                                            <p><img alt="" src="/hahuco/imgs/layout/icon_foot_4.png" /> Hotline: <a href="tel:{{ $hotline3 }}">{{ $hotline3 }}</a></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- /.about-ft -->
                    </div>

                    <div class="col-lg-4">
                        <ul class="links">
                            <li>
                                <a href="dich-vu/chinh-sach-quy-dinh-chung-395/index.html">Chính sách & quy định chung</a>
                            </li>
                            <li>
                                <a href="dich-vu/chinh-sach-mua-hang-va-thanh-toan-393/index.html">Chính sách mua hàng & thanh toán</a>
                            </li>
                            <li>
                                <a href="dich-vu/chinh-sach-van-chuyen-391/index.html">Chính sách vận chuyển</a>
                            </li>
                            <li>
                                <a href="dich-vu/chinh-sach-doi-tra-392/index.html">Chính sách đổi trả</a>
                            </li>
                            <li>
                                <a href="dich-vu/chinh-sach-bao-hang-394/index.html">Chính sách bảo hành</a>
                            </li>
                            <li>
                                <a href="dich-vu/chinh-sach-bao-mat-396/index.html">Chính sách bảo mật</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
           
            <!-- End .ul_info_foot --><!-- End .info_foot -->

            <div class="foot_2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                            <a href="http://intechvietnam.com/"><img alt="" height="87" src="uploads/noidung/images/logo-trang.png" width="200" /></a>​<br />
                            <img alt="" height="56" src="/hahuco/imgs/layout/img_foot_2.png" width="247" />
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                            <p><strong>Các mạng xã hội</strong></p>
                            <div class="mb-3">
                                <a href="{{ $facebook }}" rel="nofollow" style="font-size: 13px;" target="_blank">
                                    <img alt="facebook" height="38" src="/hahuco/imgs/layout/social_1.png" width="38" />
                                </a>
                                <a href="{{ $google }}" rel="nofollow" style="font-size: 13px;" target="_blank">
                                    <img alt="google" height="38" src="/hahuco/imgs/layout/social_2.png" width="38" />
                                </a>
                                <a href="{{ $twitter }}" rel="nofollow" style="font-size: 13px;" target="_blank">
                                    <img alt="tw" height="38" src="/hahuco/imgs/layout/social_3.png" width="38" /> 
                                </a>
                                <a href="{{ $instagram }}" rel="nofollow" style="font-size: 13px;" target="_blank">
                                    <img alt="youtube" height="38" src="/hahuco/imgs/layout/social_4.png" width="38" />
                                </a>
                            </div>

                            <a href="http://www.online.gov.vn/CustomWebsiteDisplay.aspx?DocId=37111" rel="nofollow" target="_blank"><img alt="" src="/hahuco/imgs/layout/dathongbao.png" /> </a>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <iframe allowfullscreen="" frameborder="0" height="210" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.3236314215123!2d105.7232675150002!3d21.0597325859816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134545188616895%3A0x67ce7722f9132f70!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gS2ltIExv4bqhaSBU4bqlbSBJbnRlY2ggVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1513213915154" style="border:0" width="100%"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .foot_2 -->        
        <div class="foot_3 text-center">
            <div class="container">
                {!! $copyright !!}
            </div>
        </div><!-- End .foot_3 -->
    </footer><!-- End #footer -->
</div><!-- End #wrapper -->

<div class="fixed_button">
    <ul>
        <li class="fb_email">
            <div class="inner_fb" style="line-height: 24px; text-indent: 0;">
                <div style="padding: 10px 0 0 10px; text-align: left !important; font-size: 11px;">
                    <a href="mailto:{!! $email1 !!}">{!! $email1 !!}</a>
                    <br>
                    <a href="mailto:{!! $email2 !!}">{!! $email2 !!}</a>
                </div>
            </div>
        </li>
        <li class="fb_website">
            <div class="inner_fb">
                <img src="{!! $qr_website !!}" alt="hahuco.com.vn">
            </div>
        </li>
        <li class="fb_hotline">
            <div class="inner_fb">
                <a href="tel:{{ $hotline2 }}">{{ $hotline2 }}</a>
                <br>
                <a href="tel:{{ $hotline3 }}">{{ $hotline3 }}</a>
            </div>
        </li>
        <li class="fb_support">

        </li>
    </ul>
</div><!-- End .fixed_button -->

<style>
    .f-detail a {
        color: #01712a !important;
    }
    @media only screen and (max-width: 768px) {
        .ipt_s {
            border: 1px solid #ccc !important;
            background: #f9f9f9 !important;
            color: #fff;
            width: 200px;
            height: 28px;
        }
        .btn_s {
            background-color: #048031 !important;
        }
    }
</style>


<div class="menu_mobile" style="visibility: hidden;">

    <span class="close_menu_mobile"></span>

    <div class="menu_accordion">

        <ul class="ul_ma_1">

            <li class="active"><a href="/">Trang chủ</a></li>

            <li>
                <a href="gioi-thieu/index.html">Giới Thiệu</a>
                <i class="arrown_menu_accordion" val="sub_ac_87"></i>
                <ul class="ul_ma_2" id="sub_ac_87" style="display:none;">
                    <li><a href="gioi-thieu/gia-tri-cot-loi/index.html">Giá trị cốt lõi</a></li>
                    <li><a href="gioi-thieu/chinh-sach-chat-luong/index.html">Chính sách chất lượng</a></li>
                    <li><a href="gioi-thieu/gioi-thieu-ve-kim-loai-tam-intech/index.html">Giới thiệu về kim loại tấm Intech</a></li>
                </ul><!-- End .ul_ma_2 -->
            </li>

            <li>
                <a href="san-pham/index.html">Sản phẩm</a>
                <i class="arrown_menu_accordion" val="sub_ac_78"></i>

                <ul class="ul_ma_2" id="sub_ac_78" style="display:none;">
                    <li>

                        <a href="gia-cong-dot-cnc/index.html">Gia công đột CNC</a>


                    </li>


                    <li>

                        <a href="gia-cong-chan-gap-cnc/index.html">Gia công chấn gấp CNC</a>


                    </li>


                    <li>

                        <a href="gia-cong-cat-laser/index.html">Gia công cắt laser</a>


                    </li>


                    <li>

                        <a href="gia-ke-gia-ke-kho-hang/index.html">Giá kệ, giá kệ kho hàng</a>


                    </li>


                    <li>

                        <a href="xe-day-xe-day-hang/index.html">Xe đẩy, xe đẩy hàng</a>


                    </li>


                    <li>

                        <a href="ban-thao-tac-ban-inox/index.html">Bàn thao tác, Bàn Inox</a>


                    </li>


                    <li>

                        <a href="thang-mang-cap-dien/index.html">Thang máng cáp điện</a>


                    </li>


                    <li>

                        <a href="dot-dap-hang-loat/index.html">Đột dập hàng loạt</a>


                    </li>


                    <li>

                        <a href="tu-dung-dung-cu/index.html">Tủ đựng dụng cụ</a>


                    </li>


                    <li>

                        <a href="tu-phong-sach/index.html">Tủ phòng sạch</a>


                    </li>


                    <li>

                        <a href="ban-an-cong-nghiep/index.html">Bàn ăn công nghiệp</a>


                    </li>


                    <li>

                        <a href="cnc/index.html">CNC</a>


                    </li>
                </ul><!-- End .ul_ma_2 -->
            </li>

            <li><a href="dich-vu/index.html">Dịch vụ</a></li>

            <li><a href="catalogue/index.html">Catalogue</a></li>

            <li><a href="tin-tuc/index.html">Tin tức</a></li>

            <li><a href="tuyen-dung/index.html">Tuyển Dụng</a></li>

            <li class="active"><a href="lien-he/index.html">Liên hệ</a></li>

        </ul><!-- End .ul_ma_1 -->

    </div><!-- End .menu_accordion -->

</div><!-- End .menu_mobile -->

<script>

    $(document).ready(function(e) {

        $(".arrown_menu_accordion").click(function() {

            var val=$(this).attr("val");

            $("#"+val).toggle();

        });

    });

</script>
<script type="text/javascript" defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAABstmYZWOOycZj4yBeJu23RV8z_hIV3c&libraries=places&callback=initialize"></script>
<script src="/hahuco/scripts/jquery.lazyload.min.js"></script>
<link rel="stylesheet" type="text/css" href="/hahuco/scripts/owl-carousel/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/hahuco/scripts/owl-carousel/owl.transitions.css">
<script src="/hahuco/scripts/owl-carousel/owl.carousel.js"></script>
<script src="/hahuco/scripts/frame_script.js"></script>
@yield('scripts')
</body>

<!-- Mirrored from kimloaitamintech.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Apr 2018 05:06:35 GMT -->
</html>