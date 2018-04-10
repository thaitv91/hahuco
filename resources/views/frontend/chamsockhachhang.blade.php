@extends('layouts.app')

@section('content')
    <!-- main content -->
    <section class="section-img banner-text mt-header" style="background-image: url('images/excellent-customer-service-skills.jpg')">
        <div class="container">
            <h1 class="text-center">Chúng tôi lắng nghe để hỗ trợ bạn tốt nhất</h1>
            <div class="text-right">
                <ul class="list-unstyled">
                    <li>Ưu thế 1 của dịch vụ chăm sóc KH</li>
                    <li>Ưu thế 2 của dịch vụ chăm sóc KH</li>
                    <li>Ưu thế 3 của dịch vụ chăm sóc KH</li>
                </ul>
                <h4>Hotline: 190088888</h4>
            </div>
        </div>
    </section>

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
                        <div class="img"><a href="#"><img src="images/customer/customer-6.png" alt=""/></a></div>
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

    <section class="news text-white">
        <div class="container">
            <h2 class="text-center title text-white">@lang('frontend/home.testimonials')</h2>
            <div class="slider-testimonial arrows-white dots-white">
                @foreach($testimonials as $testimonial)
                    <div class="item">
                        <div class="tile-testimonial d-flex">
                            <div class="img rounded-circle"><img class="rounded-circle" src="{{ $testimonial->thumbnail }}" alt="" /></div>
                            <div class="text">
                                <h4>{{ $testimonial->name }}</h4>
                                <h6>{{ $testimonial->job }}</h6>
                                <div class="description dotdotdot">
                                    {!! $testimonial->content  !!}
                                </div>
                            </div>
                        </div><!-- /.tile-testimonial -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- e: main content -->
@endsection
