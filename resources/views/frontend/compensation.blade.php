@extends('layouts.app')

@section('content')
    <!-- main content -->
    <section class="indemnify-car">
        <div class="container">
            <h2 class="title text-center">bồi thường ô tô</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="tile-indemnify">
                        <div class="header-tile bg-1 d-flex align-items-center justify-content-center">
                            <i class="ico-indemnify-1"></i>
                        </div>
                        <div class="body-tile">
                            <h4 class="text-uppercase text-link">Làm gì khi xảy ra tai nạn</h4>
                            <ul class="list-unstyled">
                                <li>Kiểm tra an toàn đối với người</li>
                                <li>
                                    <p>Ghi lại những tổn thất</p>
                                    <div class="text bg-white">
                                        <p>*Tải bản ứng dụng trên điện thoại
                                            để nộp hồ sơ bồi thường</p>
                                        <a href="#"><img src="/images/app-store.png" alt="" /></a>
                                        <a href="#"><img src="/images/google-play.png" alt="" /></a>
                                    </div>
                                </li>
                                <li>Gọi cứu hộ</li>
                                <li>Gọi hotline của VBI <strong class="text-pink">19001566</strong></li>
                            </ul>
                        </div>
                    </div><!-- /.tile-indemnify -->
                </div>

                <div class="col-lg-4">
                    <div class="tile-indemnify">
                        <div class="header-tile bg-2 d-flex align-items-center justify-content-center">
                            <i class="ico-indemnify-2"></i>
                        </div>
                        <div class="body-tile">
                            <h4 class="text-uppercase text-link">Khai báo bồi thường online</h4>
                            <ul class="list-unstyled">
                                <li>Thông tin gì cần thu thập</li>
                                <li>Danh mục hồ sơ bồi thường</li>
                                <li>
                                    <p>Nộp hồ sơ bồi thường</p>
                                    <div class="text bg-white">
                                        <p>*Tải bản ứng dụng trên điện thoại
                                            để nộp hồ sơ bồi thường</p>
                                        <a href="#"><img src="/images/app-store.png" alt="" /></a>
                                        <a href="#"><img src="/images/google-play.png" alt="" /></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- /.tile-indemnify -->
                </div>

                <div class="col-lg-4">
                    <div class="tile-indemnify">
                        <div class="header-tile bg-3 d-flex align-items-center justify-content-center">
                            <i class="ico-indemnify-3"></i>
                        </div>
                        <div class="body-tile">
                            <h4 class="text-uppercase text-link">Theo dõi hồ sơ bồi thường</h4>
                            <div class="text bg-white">
                                <p>*Tải bản ứng dụng trên điện thoại
                                    để nộp hồ sơ bồi thường</p>
                                <a href="#"><img src="/images/app-store.png" alt="" /></a>
                                <a href="#"><img src="/images/google-play.png" alt="" /></a>
                            </div>
                        </div>
                    </div><!-- /.tile-indemnify -->
                </div>
            </div>
        </div>
    </section><!--/.indemnify-car-->

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
