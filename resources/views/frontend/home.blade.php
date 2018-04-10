@extends('layouts.app')

@section('content')
    <!-- main content -->
    <section class="i-want section-img" style="background-image: url('images/upload/banner-home.jpg')">
        <div class="container text-white">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="slogan text-center text-uppercase">
                        <h4>Bảo Hiểm Vietinbank</h4>
                        <h3>Bảo toàn giá trị cuộc sống</h3>
                    </div>
                    <div class="text-center d-flex flex-wrap align-items-center justify-content-center">
                        <h2 class="title-i-want">@lang('frontend/home.we_want')</h2>
                        <a href="#" class="btn-vbi fz-24 btn-blue text-uppercase">@lang('frontend/home.buy_insurance')</a>
                        <a href="#" class="btn-vbi fz-24 btn-pink text-uppercase">@lang('frontend/home.compensation_assistance')</a>
                    </div>
                    <div class="hotline text-right"><span><i class="fa fa-phone"></i></span> 19001566</div>
                </div>
            </div>
        </div>
    </section><!-- /.i-want -->

    <section class="care-customer section-img">
        <div class="container">
            <h2 class="text-center title">@lang('frontend/home.care_customer')</h2>
            <div class="slider-customer arrows-gray">
                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="images/customer/customer-1.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Mạng lưới VBI</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>

                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="images/customer/customer-2.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Danh mục bệnh viện</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>

                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="images/customer/customer-3.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Mạng lưới nhà thuốc</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>

                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="images/customer/customer-4.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Gara/Cứu hộ</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>

                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="images/customer/customer-5.png" alt=""/></a></div>
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
                        <div class="img"><a href="#"><img src="images/customer/customer-2.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Danh mục bệnh viện</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>

                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="#"><img src="images/customer/customer-5.png" alt=""/></a></div>
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
                        <div class="img"><a href="#"><img src="images/customer/customer-2.png" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="#">Danh mục bệnh viện</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>
            </div><!-- /.slider-customer -->
        </div>
    </section><!-- /.care-customer -->

    @widget('testimonial');

    <section class="partners section-img">
        <div class="container">
            <h2 class="text-center title">@lang('frontend/home.partner')</h2>
            <div class="slider-partners arrows-gray">
                @foreach($partners as $partner)
                <div class="item">
                    <div class="tile-partner">
                        <img src="{{ $partner->thumbnail }}" alt="{{ $partner->name }}"/>
                    </div><!-- /.tile-partner -->
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- /.partners -->


    <section class="news text-white section-img">
        <div class="container">
            <h2 class="text-center title text-white">@lang('frontend/home.news')</h2>
            <div class="slider-news arrows-white-2">
                @foreach($news as $new)
                <div class="tile-news">
                    <div class="img">
                        <a href="{{ route('homepage.news.show', $new->slug) }}"><img src="{{ $new->thumbnail ? $new->thumbnail : '/images/upload/news-1.jpg' }}" alt="{{ $new->name }}" /></a>
                    </div>
                    <div class="text">
                        <h4><a href="{{ route('homepage.news.show', $new->slug) }}">{{ $new->name }}</a></h4>
                        <?php Carbon\Carbon::setLocale('vi'); ?>
                        <p class="time">{{ $new->created_at->format('h:i d/m/Y') }}</p>
                        <div class="description dotdotdot">
                            {!! $new->excerpt !!}
                        </div>
                    </div>
                </div><!-- /.tile-news -->
                @endforeach
            </div>
        </div>
    </section>

    @widget('Award')

    <div class="toggle-navright">
        <span class="clickable"><i class="fa fa-bars"></i></span>
    </div><!-- /.toggle-navleft -->

    <div class="nav-right-fixed text-white">
        <span class="close-nav"><i class="fa fa-angle-right"></i></span>
        <h4>Sản phẩm ưu đãi</h4>
        <a href="#" class="d-flex">
            <div class="img"><img src="images/customer/customer-1.png" /></div>
            <div class="text">
                <p class="name">Goi san pham</p>
                <div class="desc">
                    Mieu ta
                </div>
            </div>
        </a>
    </div><!-- /.nav-right-fixed -->
    <!-- e: main content -->
@endsection
