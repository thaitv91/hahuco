<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ isset($title) ? $title : 'Vietinbank' }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="/favicon.png"/>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link type="text/css" href="/stylesheets/bootstrap.css" rel="stylesheet"/>
    <link type="text/css" href="/stylesheets/bootstrap-grid.css" rel="stylesheet"/>
    <link type="text/css" href="/stylesheets/bootstrap-reboot.css" rel="stylesheet"/>
    <link type="text/css" href="/stylesheets/bootstrap-4-navbar.css" rel="stylesheet"/>
    <link type="text/css" href="/stylesheets/slick.css" rel="stylesheet"/>
    <link type="text/css" href="/stylesheets/jquery.mCustomScrollbar.css" rel="stylesheet"/>
    <link type="text/css" href="/stylesheets/chung-timepicker.css" rel="stylesheet"/>
    <link type="text/css" href="/stylesheets/datepicker.css" rel="stylesheet"/>
    <link type="text/css" href="/stylesheets/style.css" rel="stylesheet"/>
    <link href="{{url('css/toastr.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

   {{--  Google Analytics --}}
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112823873-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-112823873-1');
        </script>

</head>
<body>
<!-- header -->
<header>
    <div class="header-top">
        <div class="container">
            <div class="d-flex justify-content-end">
                {{ MenuManager::getMenu('Header Menu', 'list-unstyled d-none d-md-block') }}
                <div class="header-right d-flex align-items-center">
                    <a href="/login">Đăng nhập</a>
                    <div class="language">
                        <a href="#"><img src="/images/english.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="d-flex align-items-end">
            {{--<div class="logo">--}}
                {{--<div class="slogan d-none d-xl-block">{{ $sitename ? $sitename : 'Bảo Hiểm Vietinbank' }}</div>--}}
                <a class="navbar-brand" href="/"><img src="/{{ $logo ? $logo : 'images/logo.png' }}" alt="VietinBank" /></a>
                <div class="slogan d-none d-xl-block">{{ $sitename ? $sitename : 'Bảo Hiểm Vietinbank' }}</div>
            </div>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{ MenuManager::getMenu('Main Menu', 'navbar-nav ml-auto', 'nav-item', 'nav-link', 'ico-menu') }}
                {{ MenuManager::getMenu('Header Menu', 'list-unstyled d-md-none navbar-nav', 'nav-item', 'nav-link') }}
            </div>
            <form action="{{ route('search') }}" id="form-search">
                <div class="search-header dropdown">
                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ico-search"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="inner">
                            <input type="text" class="form-control" name="keyword" placeholder="Search..."/>
                            <button type="submit"><i class="ico-search"></i></button>
                        </div>
                    </div>
                </div><!-- /.search-header -->
            </form>
        </div>
    </nav>
</header>
<!-- e: header -->

<!-- main content -->
@yield('content')
<!-- e: main content -->
<div class="hotline"><div><i class="ico-phone"></i><a href="tel:19001566"> Hotline: 19001566</a></div></div>
<!-- footer -->
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="box-footer">
                                <h3 class="toggle">Sản phẩm <i class="fa fa-angle-down"></i></h3>
                                {{ MenuManager::getMenu('San Pham', 'list-unstyled navs') }}
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="box-footer">
                                <h3 class="toggle">Bồi thường <i class="fa fa-angle-down"></i></h3>
                                {{ MenuManager::getMenu('Boi Thuong', 'list-unstyled navs') }}
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="box-footer">
                                <h3 class="toggle">Hỗ trợ khách hàng <i class="fa fa-angle-down"></i></h3>
                                {{ MenuManager::getMenu('Ho Tro Khach Hang', 'list-unstyled navs') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="box-footer aboutus">
                        <h3 class="toggle">Về chúng tôi <i class="fa fa-angle-down"></i></h3>
                        <div class="row navs">
                            <div class="col-md-6">
                                {{ MenuManager::getMenu('Ve Chung Toi', 'list-unstyled navs') }}
                            </div>
                            <div class="col-md-6">
                                {{ MenuManager::getMenu('Footer', 'list-unstyled') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.footer-top -->
    <div class="footer-center bg-white">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-start align-items-center">
                <div class="col-lg-4 text-center text-lg-left">
                    <div class="social">
                        @if($facebook)
                            <a href="{{ $facebook }}" class="facebook"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if($twitter)
                            <a href="{{ $twitter }}" class="twitter"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if($google)
                            <a href="{{ $google }}" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        @endif
                        @if($instagram)
                            <a href="{{ $instagram ? $instagram : '#' }}" class="youtube"><i class="fa fa-youtube"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-8" id="register-email">
                    <form method="POST" action="{{ route('email_registration.store') }}" id="form-register-email">
                        {{ csrf_field() }}
                        <div class="newsletter">
                            <input type="text" name="email" placeholder="Đăng ký nhận email bạn sẽ nhận ngay những chương trình ưu đãi mới nhất ..."/>
                            <span class="help-block">
                                <strong style="color: red" id="error-register-email"></strong>
                            </span>
                            <button type="submit">Đăng ký</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div><!-- /.footer-center -->
    <div class="footer-bottom text-center">
        <div class="container">
            {{ $copyright ? $copyright : '&copy; VBI giữ bản quyền nội dung trên website này.' }}
        </div>
    </div>
</footer>
<!-- e: footer -->

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAABstmYZWOOycZj4yBeJu23RV8z_hIV3c&libraries=places&callback=initialize"></script>
<script type="text/javascript" src="/js/popper.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/bootstrap-4-navbar.js"></script>
<script type="text/javascript" src="/js/jquery.smooth-scroll.js"></script>
<script type="text/javascript" src="/js/slick.js"></script>
<script type="text/javascript" src="/js/jquery.dotdotdot.js"></script>
<script type="text/javascript" src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="/js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="/js/datepicker.js"></script>
<script type="text/javascript" src="/js/chung-timepicker.js"></script>
<script type="text/javascript" src="/js/anime.min.js"></script>
<script type="text/javascript" src="/js/typed.min.js"></script>
<!--<script type="text/javascript" src="/js/jquery.appear.js"></script>-->
{{-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAABstmYZWOOycZj4yBeJu23RV8z_hIV3c&callback=initialize"></script> --}}
<script type="text/javascript" src="/plugins/validation/dist/jquery.validate.js">"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!--<script src="//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('js/jquery.number.js') }}"></script>
<script type="text/javascript" src="/js/custom.js"></script>
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
<script type="text/javascript">
    $('#form-register-email').on('submit', function(e){
        $.ajax({
            type : 'POST',
            url : $('#form-register-email').attr('action'),
            data : $('#form-register-email').serialize()
        }).done(function(response) {
            if (response.status == 0) {
                $('#error-register-email').empty();
                $('#error-register-email').text(response.message);
                $('input[name="email"]').val('');
            } else {
                $('#register-email').empty();
                var div = $('<div>', {
                    class : 'alert alert-success'
                }).appendTo($('#register-email'));
                var title = $('<h5>', {
                    text : response.message
                }).appendTo(div);
            }
        });
        e.preventDefault();
    });
</script>

<!-- Search -->
<script type="text/javascript">
    $('#form-search').on('submit', function(e) {
        e.preventDefault();
        console.log($(this).attr('action') + '?' + $(this).serialize());
        var url = $(this).attr('action') + '?' + $(this).serialize();
        var win = window.open(url, '_blank');
    });
</script>
@yield('scripts')
</body>
</html>