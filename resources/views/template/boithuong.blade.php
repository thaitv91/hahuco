@extends('layouts.app')

@section('content')
    <!-- main content -->
    <div class="section-img banner-slogan indemnify" style="background-image: url('/{{ $page->thumbnail}}')">
        <div class="container">
            <div class="d-flex justify-content-center justify-content-lg-end">
                <div class="text text-center text-uppercase text-white">
                    <h4>{{ $page->getContentofField("boithuong-header-text-1") }}</h4>
                    <h1>{{ $page->getContentofField("boithuong-header-text-2") }}</h1>
                    <div class="desc">
                        {!!  $page->getContentofField("boithuong-header-description")  !!}
                    </div>
                </div>
            </div>
            <div class="download-app">
                <a href="{{ $apple }}"><img src="/images/app-store.png" alt=""></a>
                <a href="{{ $android }}"><img src="/images/google-play.png" alt=""></a>
            </div>
        </div>
    </div><!-- /.banner-text -->

    @widget($page->getContentofField("boithuong-ho-tro-boi-thuong"))

    @widget($page->getContentofField("boithuong-cham-soc-khach-hang"))
    <!-- e: main content -->
@endsection
