@extends('layouts.app')

@section('content')
    <!-- main content -->
    @php $image = $page->getContentofField('sanpham-banner-image') @endphp
    @if($page->getContentofField('sanpham-banner-type') == 'Image')

    <section class="banner-only-img">
        <div class="section-img" style="background-image: url('/{{ $image }}')"></div>
    </section><!-- /.banner-slogan -->
    @elseif($page->getContentofField('sanpham-banner-type') == 'Slider')
        @widget('ImageSlider')
    @elseif($page->getContentofField('homepage-banner-type') == 'Video')
        <section class="banner-video">
            <div class="video-play">
                <video autoplay="" muted width="100%" height="100%">
                    <source src="{{ asset($page->getContentofField('sanpham-banner-video')) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </section><!-- /.banner-video -->
    @endif
    @widget($page->getContentofField("sanpham-danh-sach-san-pham"))

    @widget($page->getContentofField("sanpham-cham-soc-khach-hang"))
    <!-- e: main content -->
@endsection
