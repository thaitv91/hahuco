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
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                </a>
                @if($logo)
                    <a class="navbar-brand" href="/"><img src="/{{ $logo }}" alt="Logo {{ $sitename }}"></a>
                @else
                    <a class="navbar-brand" href="/">{{ $sitename }}</a>
                @endif

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{--<ul class="navbar-nav ml-auto">--}}
                        {{--<li class="nav-item active">--}}
                            {{--<a class="nav-link" href="/">TRANG CHỦ</span></a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item dropdown">--}}
                            {{--<a class="nav-link dropdown-toggle" href="/gioi-thieu">--}}
                                {{--GIỚI THIỆU--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                                {{--<li>--}}
                                    {{--<a href="gioi-thieu/gia-tri-cot-loi/index.html" class="dropdown-item">Giá trị cốt lõi</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="gioi-thieu/chinh-sach-chat-luong/index.html" class="dropdown-item">Chính sách chất lượng</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="gioi-thieu/gioi-thieu-ve-kim-loai-tam-intech/index.html" class="dropdown-item">Giới thiệu về kim loại tấm Intech</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item dropdown">--}}
                            {{--<a class="nav-link dropdown-toggle" href="/san-pham/">--}}
                                {{--Sản phẩm--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                                {{--<li><a class="dropdown-item" href="gia-cong-dot-cnc/index.html">Gia công đột CNC</a></li>--}}
                                {{--<li><a class="dropdown-item" href="gia-cong-chan-gap-cnc/index.html">Gia công chấn gấp CNC</a>--}}
                                {{--</li>--}}
                                {{--<li><a class="dropdown-item" href="gia-cong-cat-laser/index.html">Gia công cắt laser</a></li>--}}
                                {{--<li><a class="dropdown-item" href="gia-ke-gia-ke-kho-hang/index.html">Giá kệ, giá kệ kho hàng</a></li>--}}
                                {{--<li><a class="dropdown-item" href="xe-day-xe-day-hang/index.html">Xe đẩy, xe đẩy hàng</a></li>--}}
                                {{--<li><a class="dropdown-item" href="ban-thao-tac-ban-inox/index.html">Bàn thao tác, Bàn Inox</a></li>--}}
                                {{--<li><a class="dropdown-item" href="thang-mang-cap-dien/index.html">Thang máng cáp điện</a></li>--}}
                                {{--<li><a class="dropdown-item" href="dot-dap-hang-loat/index.html">Đột dập hàng loạt</a></li>--}}
                                {{--<li><a class="dropdown-item" href="tu-dung-dung-cu/index.html">Tủ đựng dụng cụ</a></li>--}}
                                {{--<li><a class="dropdown-item" href="tu-phong-sach/index.html">Tủ phòng sạch</a></li>--}}
                                {{--<li><a class="dropdown-item" href="ban-an-cong-nghiep/index.html">Bàn ăn công nghiệp</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item"><a class="nav-link" href="/dich-vu">Dịch vụ</a></li>--}}
                        {{--<li class="nav-item"><a class="nav-link" href="/catalog">Catalogue</a></li>--}}
                        {{--<li class="nav-item"><a class="nav-link" href="/tin-tuc">Tin tức</a></li>--}}
                        {{--<li class="nav-item"><a class="nav-link" href="/tuyen-dung">Tuyển Dụng</a></li>--}}
                        {{--<li class="nav-item"><a class="nav-link" href="/lien-he">Liên hệ</a></li>--}}
                    {{--</ul>--}}
                    {{ MenuManager::getMenu('Header Menu', 'navbar-nav ml-auto', 'nav-item', 'nav-link') }}
                </div>

                <div class="search-header dropdown">
                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ico-search"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="inner">
                            <form action="{{ route('search') }}" id="form-search">
                                <input type="text" placeholder="Từ khóa tìm kiếm..!" name="keyword" class="form-control">
                                <button class="btn_s" type="submit"><i class="ico-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.search-header -->
            </div>
        </nav>
    </header>
    @yield("content")
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-4 mb-lg-0">
                        <div class="about-ft">
                            <h3 class="text-uppercase">Trụ sở chính</h3>
                            <ul class="ul_info_foot">
                                <li>
                                    <p><img alt="" src="/hahuco/imgs/layout/icon_foot_1.png" />{!! $trusochinh_address !!}</p>
                                    <p><img alt="" src="/hahuco/imgs/layout/icon_foot_2.png" /> Điện thoại: <a href="tel:{{ $hotline1 }}">{{ $hotline1 }}</a></p>
                                    <p><img alt="" src="/hahuco/imgs/layout/icon_foot_3.png" /> Email: <a href="mailto:{!! $email1 !!}">{!! $email1 !!}</a></p>
                                    <p><img alt="" src="/hahuco/imgs/layout/icon_foot_4.png" /> Hotline: <a href="tel:{{ $hotline2 }}">{{ $hotline2 }}</a></p>
                                </li>
                            </ul>
                        </div><!-- /.about-ft -->
                    </div>

                    <div class="col-md-4 mb-4 mb-lg-0">
                        <div class="about-ft">
                            <h3 class="text-uppercase">Xưởng sản xuất</h3>
                            <ul class="ul_info_foot">
                                <li>
                                    <p><img alt="" src="/hahuco/imgs/layout/icon_foot_1.png" /> Địa chỉ: Lô 6, Khu công nghiệp Lai Xá, Xã Kim Chung, Huyện Hoài Đức, TP.Hà Nội.</p>
                                    <p><img alt="" src="/hahuco/imgs/layout/icon_foot_2.png" /> Điện thoại: <a href="tel:{{ $hotline1 }}">{{ $hotline1 }}</a></p>
                                    <p><img alt="" src="/hahuco/imgs/layout/icon_foot_3.png" /> Email:  <a href="mailto:{!! $email2 !!}">{!! $email2 !!}</a></p>
                                    <p><img alt="" src="/hahuco/imgs/layout/icon_foot_4.png" /> Hotline: <a href="tel:{{ $hotline3 }}">{{ $hotline3 }}</a></p>
                                </li>
                            </ul>
                        </div><!-- /.about-ft -->
                    </div>

                    <div class="col-md-4 mb-4 mb-lg-0">
                        <h3 class="text-uppercase">Kết nối với chúng tôi</h3>
                        <div class="fb-page" data-href="https://www.facebook.com/www.hahuco.com.vn/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/www.hahuco.com.vn/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/www.hahuco.com.vn/">TỰ ĐỘNG HÓA Hahuco</a></blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.footer-top -->

        
           
            <!-- End .ul_info_foot --><!-- End .info_foot -->
        <div class="footer-bottom text-center">
            <div class="container">
                {!! $copyright !!}
            </div>
        </div><!-- End .foot_3 -->
    </footer><!-- End #footer -->
</div><!-- End #wrapper -->

<div class="hotline-fixed"><div><i class="ico-phone"></i><a href="tel:{{ $hotline1 }}"> Hotline: {{ $hotline1 }}</a></div></div>

{{--<div class="menu_mobile" style="visibility: hidden;">--}}

    {{--<span class="close_menu_mobile"></span>--}}

    {{--<div class="menu_accordion">--}}

        {{--<ul class="ul_ma_1">--}}

            {{--<li class="active"><a href="/">Trang chủ</a></li>--}}

            {{--<li>--}}
                {{--<a href="gioi-thieu/index.html">Giới Thiệu</a>--}}
                {{--<i class="arrown_menu_accordion" val="sub_ac_87"></i>--}}
                {{--<ul class="ul_ma_2" id="sub_ac_87" style="display:none;">--}}
                    {{--<li><a href="gioi-thieu/gia-tri-cot-loi/index.html">Giá trị cốt lõi</a></li>--}}
                    {{--<li><a href="gioi-thieu/chinh-sach-chat-luong/index.html">Chính sách chất lượng</a></li>--}}
                    {{--<li><a href="gioi-thieu/gioi-thieu-ve-kim-loai-tam-intech/index.html">Giới thiệu về kim loại tấm Intech</a></li>--}}
                {{--</ul><!-- End .ul_ma_2 -->--}}
            {{--</li>--}}

            {{--<li>--}}
                {{--<a href="san-pham/index.html">Sản phẩm</a>--}}
                {{--<i class="arrown_menu_accordion" val="sub_ac_78"></i>--}}

                {{--<ul class="ul_ma_2" id="sub_ac_78" style="display:none;">--}}
                    {{--<li>--}}

                        {{--<a href="gia-cong-dot-cnc/index.html">Gia công đột CNC</a>--}}


                    {{--</li>--}}


                    {{--<li>--}}

                        {{--<a href="gia-cong-chan-gap-cnc/index.html">Gia công chấn gấp CNC</a>--}}


                    {{--</li>--}}


                    {{--<li>--}}

                        {{--<a href="gia-cong-cat-laser/index.html">Gia công cắt laser</a>--}}


                    {{--</li>--}}


                    {{--<li>--}}

                        {{--<a href="gia-ke-gia-ke-kho-hang/index.html">Giá kệ, giá kệ kho hàng</a>--}}


                    {{--</li>--}}


                    {{--<li>--}}

                        {{--<a href="xe-day-xe-day-hang/index.html">Xe đẩy, xe đẩy hàng</a>--}}


                    {{--</li>--}}


                    {{--<li>--}}

                        {{--<a href="ban-thao-tac-ban-inox/index.html">Bàn thao tác, Bàn Inox</a>--}}


                    {{--</li>--}}


                    {{--<li>--}}

                        {{--<a href="thang-mang-cap-dien/index.html">Thang máng cáp điện</a>--}}


                    {{--</li>--}}


                    {{--<li>--}}

                        {{--<a href="dot-dap-hang-loat/index.html">Đột dập hàng loạt</a>--}}


                    {{--</li>--}}


                    {{--<li>--}}

                        {{--<a href="tu-dung-dung-cu/index.html">Tủ đựng dụng cụ</a>--}}


                    {{--</li>--}}


                    {{--<li>--}}

                        {{--<a href="tu-phong-sach/index.html">Tủ phòng sạch</a>--}}


                    {{--</li>--}}


                    {{--<li>--}}

                        {{--<a href="ban-an-cong-nghiep/index.html">Bàn ăn công nghiệp</a>--}}


                    {{--</li>--}}


                    {{--<li>--}}

                        {{--<a href="cnc/index.html">CNC</a>--}}


                    {{--</li>--}}
                {{--</ul><!-- End .ul_ma_2 -->--}}
            {{--</li>--}}

            {{--<li><a href="dich-vu/index.html">Dịch vụ</a></li>--}}

            {{--<li><a href="catalogue/index.html">Catalogue</a></li>--}}

            {{--<li><a href="tin-tuc/index.html">Tin tức</a></li>--}}

            {{--<li><a href="tuyen-dung/index.html">Tuyển Dụng</a></li>--}}

            {{--<li class="active"><a href="lien-he/index.html">Liên hệ</a></li>--}}

        {{--</ul><!-- End .ul_ma_1 -->--}}

    {{--</div><!-- End .menu_accordion -->--}}

{{--</div><!-- End .menu_mobile -->--}}

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
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12&appId=1723119761310275&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>

<!-- Mirrored from kimloaitamintech.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Apr 2018 05:06:35 GMT -->
</html>