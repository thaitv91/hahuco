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

    <section class="news list-products text-white">
        <div class="container">
            <h2 class="title text-white">Tôi muốn hỗ trợ bồi thường...</h2>

            <div class="flex-wrap align-items-center row">
                <div class="col">
                    <a class="tile-product text-white" href="/boi-thuong-oto">
                        <div class="img">
                            <img src="images/upload/product-1.jpg" alt="" />
                        </div>
                        <h4>Bảo hiểm Ô tô</h4>
                    </a><!-- /.tile-product -->
                </div>

                <div class="col">
                    <a class="tile-product text-white" id="tab-2" href="/boi-thuong-oto">
                        <div class="img">
                            <img src="images/upload/product-2.jpg" alt="" />
                        </div>
                        <h4>Bảo hiểm nhà tư nhân</h4>
                    </a><!-- /.tile-product -->
                </div>

                <div class="col">
                    <a class="tile-product text-white" id="tab-3" href="/boi-thuong-oto">
                        <div class="img">
                            <img src="images/upload/product-3.jpg" alt="" />
                        </div>
                        <h4>Bảo hiểm sức khỏe</h4>
                    </a><!-- /.tile-product -->
                </div>

                <div class="col">
                    <a class="tile-product text-white" id="tab-4" href="/boi-thuong-oto">
                        <div class="img">
                            <img src="images/upload/product-4.jpg" alt="" />
                        </div>
                        <h4>Bảo hiểm du lịch</h4>
                    </a><!-- /.tile-product -->
                </div>

                <div class="col">
                    <a class="tile-product text-white" id="tab-5" href="/boi-thuong-oto">
                        <div class="img">
                            <img src="images/upload/product-5.jpg" alt="" />
                        </div>
                        <h4>Bảo hiểm khàng hóa</h4>
                    </a><!-- /.tile-product -->
                </div>
            </div>
        </div>
    </section><!-- /.list-prodcuts -->

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
