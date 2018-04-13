@extends('layouts.frontend')

@section('content')
    @php $image = $page->getContentofField('homepage-banner-image') @endphp
    @if($page->getContentofField('homepage-banner-type') == 'Image')

    @elseif($page->getContentofField('homepage-banner-type') == 'Slider')
        @widget('ImageSlider', ['slider_slug' => $page->getContentofField('homepage-banner-slider')])

        <!-- html cua slider -->
    @elseif($page->getContentofField('homepage-banner-type') == 'Video')
        <!-- html cua video -->
        <section class="banner-video">
            <div class="video-play">
                <video autoplay="" muted width="100%" height="100%" loop>
                    <source src="{{ asset($page->getContentofField('homepage-banner-video')) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

        </section><!-- /.banner-video -->
    @endif
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article>
                        @widget('SanPhamNoiBat')

                        @widget('SanPhamMoi')
                    </article><!-- End .content -->
                </div>
                <div class="col-lg-3 order-lg-first">
                    @widget('SidebarLeft')
                </div>
            </div>
        </div>
    </section>

    {{--@widget('Award')--}}

    <section class="maps">
        <div class="map" id="map" style="height: 500px; width: 100%;"></div>
    </section>
@endsection

@section('scripts')

    <script type="text/javascript">
        function initialize() {
            initMap();
        }

        function initMap() {
            var uluru = {lat: 21.006172, lng: 105.911813};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>

@endsection
