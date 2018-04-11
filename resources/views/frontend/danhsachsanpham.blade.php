@extends('layouts.frontend')

@section('content')
    <section class="page-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article class="content">
                        <div class="title_ct"><h1>{!! $term->name !!}</h1></div><!-- End .title_ct -->

                        <div class="info_catelogy">
                            <div class="f-detail clearfix">
                                {!! $term->description !!}
                            </div><!-- End .f-detail -->
                        </div><!-- End .info_catelogy -->

                        <div class="main_ct">
                            <div class="row">
                                @foreach($term->products as $product)
                                    <div class="col-md-3 col-sm-6">
                                        <a href="{{ route('homepage.product.show', [ $term->slug, $product->slug]) }}" class="tile-product">
                                            <div class="inner_prod">
                                                <figure>
                                                    <img class="lazy" data-original="{{ $product->thumbnail }}" alt="{{ $product->title }}" width="185" height="140">
                                                    <div class="mask_img"><i>Xem chi tiết</i></div>
                                                </figure>
                                                <h3><p>{{ $product->title }}</p></h3>
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

