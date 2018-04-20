@extends('layouts.frontend')

@section('content')
    <section class="page-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article class="content">
                        <h1 class="title-page">Tags: {!! $tag_name !!}</h1><!-- End .title_ct -->

                        <div class="main_ct">
                            <div class="row">
                                @foreach($news as $new)
                                    <div class="col-md-3 col-sm-6">
                                        <a href="{{ route('homepage.dichvu.show', [ $new->slug]) }}" class="tile-product">
                                            <div class="inner_prod">
                                                <figure>
                                                    @if($new->thumbnail)
                                                    <img class="" src="/{{ $new->thumbnail }}" alt="{{ $new->name }}" width="185" height="140">
                                                    @endif
                                                    <div class="mask_img"><i>Xem chi tiết</i></div>
                                                </figure>
                                                <h3><p>{{ $new->name }}</p></h3>
                                                <div class="dotdotdot desc">{{ $new->experpt }}</div>
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

