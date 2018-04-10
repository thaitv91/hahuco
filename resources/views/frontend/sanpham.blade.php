@extends('layouts.app')

@section('content')
    <!-- main content -->
    <section class="banner-slogan section-img" style="background-image: url('images/banner-1.jpg')">
        <div class="container">
            <div class="text">
                <h1>Bảo hiểm oto Vietincar</h1>
                <h4>Giúp bạn an tâm trên mọi cuộc hành trình</h4>
            </div>
        </div>
    </section><!-- /.banner-slogan -->

    @widget('Product')

    <section class="care-customer section-img">
        <div class="container">
            <h2 class="text-center title">@lang('frontend/home.care_customer')</h2>
            <div class="slider-customer arrows-gray">
                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="/images/customer/customer-1.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Mạng lưới VBI</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>

                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="/images/customer/customer-2.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Danh mục bệnh viện</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>

                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="/images/customer/customer-3.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Mạng lưới nhà thuốc</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>

                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="/images/customer/customer-4.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Gara/Cứu hộ</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>

                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="/images/customer/customer-5.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Hướng dẫn lấy hóa đơn</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>

                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="/images/customer/customer-6.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Danh mục HS bồi thường</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>

                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="/images/customer/customer-2.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Danh mục bệnh viện</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>

                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="/images/customer/customer-5.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Hướng dẫn lấy hóa đơn</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>

                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="/images/customer/customer-6.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Danh mục HS bồi thường</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>

                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="/images/customer/customer-2.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Danh mục bệnh viện</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>
            </div><!-- /.slider-customer -->
        </div>
    </section><!-- /.care-customer -->
    <!-- e: main content -->
@endsection
