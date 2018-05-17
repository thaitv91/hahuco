<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="google-site-verification" content="0Aqnw36QedShF9MeA3Pixc8RZWREMp6E95iTecttMgw" />
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="shortcut icon" href="uploads/version/logo-ico-201712121314331AhdyXKwCJ.ico" />
    <base   />
    {!! SEO::generate() !!}
    <title>{{ isset($title) ? $title : 'Hahuco.com.vn' }}</title>
    
    <link type="text/css" href="/stylesheets/slick.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="/hahuco/templates/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/hahuco/templates/custom.css">
    <script src="/hahuco/scripts/jquery.js"></script>
    <script type="text/javascript" src="/js/slick.js"></script>
    <script type="text/javascript" src="/hahuco/scripts/jquery.dotdotdot.js"></script>
    <script type="text/javascript" src="/hahuco/scripts/raterater.jquery.js"></script>
    <script type="text/javascript" src="/hahuco/scripts/custom.js"></script>
    <script type="text/javascript">
        @if (Session::has('postSuccess'))
        toastr.success('{{ Session::get('postSuccess') }}');
        @endif
        @if (Session::has('postError'))
        toastr.error('{{ Session::get('postError') }}');
        @endif
        @if (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @endif
        @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @endif
        @if (Session::has('warning'))
        toastr.warning('{{ Session::get('warning') }}');
        @endif
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            }
        });
    </script>
    <script type="text/javascript" src="/hahuco/scripts/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="/hahuco/scripts/colorbox-master/example1/colorbox.css">
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=972038916287872&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

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
                        <div class="fb-page" data-href="{{ $facebook }}" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="{{ $facebook }}" class="fb-xfbml-parse-ignore"><a href="{{ $facebook }}">TỰ ĐỘNG HÓA Hahuco</a></blockquote>
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

<!-- <div class="hotline-fixed"><div><i class="ico-phone"></i><a href="tel:{{ $hotline1 }}"> Hotline: {{ $hotline1 }}</a></div></div> -->

<div class="hotline-fixed d-none d-md-block">
    <img src="/hahuco/images/hahuco-hotline.png" class="">
</div>

<div class="pee-hotline d-md-none">
    <a href="tel:0934123128"><span><i class="phone is-animating"></i></span></a>
</div>

<span class="scrollTop clickable" style="display: none;"><i class="fa fa-angle-up"></i></span>

<script>

    $(document).ready(function(e) {

        $(".arrown_menu_accordion").click(function() {

            var val=$(this).attr("val");

            $("#"+val).toggle();

        });

    });

</script>
<script src="{{ asset('js/share.js') }}"></script>
<script type="text/javascript" defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAABstmYZWOOycZj4yBeJu23RV8z_hIV3c&libraries=places&callback=initialize"></script>
<script src="/hahuco/scripts/jquery.lazyload.min.js"></script>
<link rel="stylesheet" type="text/css" href="/hahuco/scripts/owl-carousel/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/hahuco/scripts/owl-carousel/owl.transitions.css">
<script src="/hahuco/scripts/owl-carousel/owl.carousel.js"></script>
<script src="/hahuco/scripts/frame_script.js"></script>
<script src="/hahuco/scripts/colorbox-master/jquery.colorbox-min.js"></script>
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