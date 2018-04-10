@extends('layouts.app')

@section('content')

    <!-- main content -->
    <section class="product-detail space-global">
        <div class="container">
            <div class="row space-global">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <div class="img-detail" style="background-image:url('{{ $product->thumbnail ? asset($product->thumbnail) : '/images/product-detail.jpg' }}');"></div>
                </div>
                <div class="col-lg-4">
                    <h2 class="mb-4">{{ $product->title }}</h2>
                    <div class="mb-4">
                        @php echo $product->diem_ban_hang; @endphp
                    </div>
                    <button class="btn btn-primary btn-block mb-3 text-uppercase"
                        onclick="window.location.href='{{ asset($product->url_tinh_phi) }}';">Tính phí bảo hiểm</button>
                    <button class="btn btn-primary btn-block mb-3 text-uppercase"
                        onclick="window.location.href='{{ asset($product->url_mua_ngay) }}';">Mua ngay</button>
                    <h3 class="text-right"><a href="tel:19001566"><i class="ico-hotline"></i> Hotline: 19001566</a></h3>
                </div>
            </div>

            <div class="info-product">
                <!-- info lager -->
                <div class="d-none d-lg-block">
                    <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-content-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                                <span class="btn btn-outline-secondary btn-sm"><i class="ico-info-product-normal"></i> Mô tả sản phẩm</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-content-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">
                                <span class="btn btn-outline-secondary btn-sm"><i class="ico-object-product-normal"></i> Đối tượng bảo hiểm</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-content-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">
                                <span class="btn btn-outline-secondary btn-sm"><i class="ico-benefit-product-normal"></i> Quyền lợi bảo hiểm</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-content-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">
                                <span class="btn btn-outline-secondary btn-sm"><i class="ico-profile-product-normal"></i> Hồ sơ bảo hiểm</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-content-5" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false">
                                <span class="btn btn-outline-secondary btn-sm"><i class="ico-useful-product-normal"></i> Thông tin hữu ích</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content bg-white" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-content-1">
                            <div class="row">
                                <div class="col-lg-12">
                                    @php echo $product->mo_ta_san_pham @endphp
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-content-2">
                            <div class="row">
                                <div class="col-lg-12">
                                    @php echo $product->doi_tuong_bao_hiem @endphp
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-content-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    @php echo $product->quyen_loi_bao_hiem @endphp
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tab-content-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>Tải ứng dụng bảo hiểm trực tuyến nhanh nhất trên apps MyVBI</h4>
                                    <div class="download-app">
                                        <a href="{{ $apple }}"><img src="/images/app-store.png" alt=""></a>
                                        <a href="{{ $android }}"><img src="/images/google-play.png" alt=""></a>
                                    </div>
                                    <strong>Mọi thắc mắc khác xin liện hệ 19001566</strong>
                                    @php echo $product->ho_so @endphp
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="tab-content-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    @php echo $product->thong_tin @endphp
                                    @if ($product->to_roi)
                                    Tờ rơi: <a href="/{{ $product->to_roi }}" download> Tải tại đây</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- e: info lager -->

                <!-- info medium & under -->
                <div class="d-block d-lg-none">
                    <div id="accordion" class="custom-accordion">
                        <div class="card">
                            <div class="card-header" id="heading1">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        <span class="ico-info-product"></span>
                                        Mô tả sản phẩm
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
                                <div class="card-body">
                                    @php echo $product->mo_ta_san_pham @endphp
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading2">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                        <span class="ico-object-product"></span>
                                        Đối tượng bảo hiểm
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
                                <div class="card-body">
                                    @php echo $product->doi_tuong_bao_hiem @endphp
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading3">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        <span class="ico-benefit-product"></span>
                                        Quyền lợi bảo hiểm
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                                <div class="card-body">
                                    @php echo $product->quyen_loi_bao_hiem @endphp
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading4">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                        <span class="ico-profile-product"></span>
                                        Hồ sơ bảo hiểm
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                                <div class="card-body">
                                    @php echo $product->ho_so @endphp 123213
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading5">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                        <span class="ico-useful-product"></span>
                                        Thông tin hữu ích
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
                                <div class="card-body">
                                    @php echo $product->thong_tin @endphp
                                    @if ($product->to_roi)
                                    Tờ rơi: <a href="/{{ $product->to_roi }}" download> Tải tại đây</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- e: info medium & under -->
            </div><!-- /.info-product -->
        </div>
    </section><!-- /.product-detail -->
    <section class="other-product space-global">
        <div class="container">
            <h2 class="text-center title">Sản phẩm liên quan</h2>
            <div class="row">
                @foreach ($product->relatedProducts as $otherProduct)
                <div class="col-md-3 col-sm-6">
                    <div class="tile-product">
                        <div class="img">
                            <a href="{{ route('homepage.product.show', ['product_slug' => $otherProduct->slug]) }}"><img src="{{ $otherProduct->thumbnail ? asset($otherProduct->thumbnail) : '/images/product-detail.jpg' }}" alt="Image"/> </a>
                        </div>
                        <h4>
                            <a href="{{ route('homepage.product.show', ['product_slug' => $otherProduct->slug]) }}">
                            {{ $otherProduct->title }}                            
                            </a>
                        </h4>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- /.other-product -->
    <section class="contact-us-v2 bg-v1">
        <form id="form-contact" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="container">
                <h2 class="title text-center text-white">Yêu cầu tư vấn trực tuyến</h2>
                @if (Session::has('success'))
                <div class="row form-group align-items-center alert alert-success">
                    <label class="">{{ Session::get('success') }}</label>
                </div>
                @endif
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                        <div class="row form-group align-items-center">
                            <label class="col-md-3">Họ và tên</label>
                            <div class="col-md-9">
                                <input name="name" type="text"  class="form-control" required placeholder="Họ và tên" />
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color: red">{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group align-items-center">
                            <label class="col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="email" type="text" class="form-control" required placeholder="Email"/>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong style="color: red">{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group align-items-center">
                            <label class="col-md-3">Điện thoại</label>
                            <div class="col-md-9">
                                <input name="phone" type="text" class="form-control" required placeholder="Điện thoại"/>
                                @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong style="color: red">{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group align-items-center">
                            <label class="col-md-3">Nội dung</label>
                            <div class="col-md-9">
                                <textarea name="content" class="form-control" required placeholder="Nội dung"></textarea>
                                @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong style="color: red">{{ $errors->first('content') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <label class="col-md-3 d-none d-md-block">&nbsp;</label>
                            <div class="text-center col-md-9">
                                <button type="submit" class="btn btn-primary text-uppercase">Gửi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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