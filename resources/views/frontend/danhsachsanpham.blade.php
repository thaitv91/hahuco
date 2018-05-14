@extends('layouts.frontend')

@section('content')
    <section class="page-inner">

        <div class="breadcrumb-ov">
            <div class="container">
                {{ Breadcrumbs::render('sp-cate', $term) }}
            </div>
        </div><!-- /.breadcrumb-ov -->

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article class="content">
                        <div class="info_catelogy">
                            <div class="title_ct mb-4">
                                <span>{!! $term->name !!}</span>
                                {!!  Share::currentPage()->facebook()->twitter()->googlePlus()  !!}
                            </div><!-- End .title_ct -->
                            <div class="f-detail clearfix">
                                {!! $term->description !!}
                            </div><!-- End .f-detail -->
                        </div><!-- End .info_catelogy -->

                        <div class="main_ct">
                            <div class="row">
                                @foreach($term->products as $product)
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                        <a href="{{ route('homepage.product.show', [ $product->slug]) }}" class="tile-product">
                                            <div class="inner_prod">
                                                <figure>
                                                    <img class="" src="/{{ $product->thumbnail }}" alt="{{ $product->title }}" width="185" height="140">
                                                    <div class="mask_img"><i>Xem chi tiết</i></div>
                                                </figure>
                                                <h3><p>{{ $product->title }}</p></h3>
                                                <div class="rating">
                                                    <div class="ratebox" data-id="1" data-rating="{!! $product->getRated() !!}"></div>
                                                </div>
                                                <div class="dotdotdot desc">{{ $product->short_description }}</div>
                                            </div><!-- End .inner_prod -->
                                        </a>
                                    </div>
                                @endforeach
                            </div><!-- End .ul_prod -->

                        </div><!-- End .main_ct -->

                        <div class="page">

                            <div class="clear"></div>

                        </div><!-- End .page -->



                    </article><!-- End .content -->
                </div>
                <div class="col-lg-3 order-lg-first">
                    @widget('SidebarLeft')
                </div>
            </div>
        </div>
    </section>
@endsection

