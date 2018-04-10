@extends('layouts.app')

@section('content')
    <!-- main content -->
    <section class="banner-slogan section-img mt-header" style="background-image: url('/images/banner-1.jpg')">
        <div class="container text-center">
            <h1>Câu slogan về trang sản phẩm</h1>
            <div class="description">
                Thông tin tạo niềm tin cho khách hàng
            </div>
        </div>
    </section><!-- /.banner-slogan -->

    <section class="news list-products text-white">
        <div class="container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-content-{{ $term->id }}" role="tabpanel" aria-labelledby="tab-{{ $term->id }}">
                    <div class="products">
                        <ul class="d-flex flex-wrap">
                            @foreach($term->products as $product)
                            <li>
                                <div class="tile-product mb-4 mb-lg-0">
                                    <div class="img">
                                        <a href="{{ route('homepage.product.show', ['category_slug'=>$term->category->slug, 'term_slug' => $term->slug, 'product_slug' => $product->slug]) }}">
                                            <img src="{{ $product->thumbnail ? asset($product->thumbnail) : '/images/img-1.jpg' }}" alt="" />
                                        </a>
                                    </div>
                                    <h4><a class="text-white" href="{{ route('homepage.product.show', ['category_slug'=>$term->category->slug, 'term_slug' => $term->slug, 'product_slug' => $product->slug]) }}">{{ $product->title}}</a></h4>
                                </div><!-- /.tile-product -->
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- /.products -->
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
