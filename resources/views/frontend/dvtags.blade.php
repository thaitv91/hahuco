@extends('layouts.frontend')

@section('content')
    <section class="page-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article class="content">
                        <div class="title_ct"><h1>Tags: {!! $tag_name !!}</h1></div><!-- End .title_ct -->

                        <div class="main_ct">
                            <div class="row">
                                @foreach($dichvu as $dv)
                                    <div class="col-md-3 col-sm-6">
                                        <a href="{{ route('homepage.dichvu.show', [ $dv->slug]) }}" class="tile-product">
                                            <div class="inner_prod">
                                                <figure>
                                                    if($dv->image)
                                                    <img class="" src="/{{ $dv->image }}" alt="{{ $dv->name }}" width="185" height="140">
                                                    @endif
                                                    <div class="mask_img"><i>Xem chi tiết</i></div>
                                                </figure>
                                                <h3><p>{{ $dv->name }}</p></h3>
                                                <div class="dotdotdot desc">{{ $dv->experpt }}</div>
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

