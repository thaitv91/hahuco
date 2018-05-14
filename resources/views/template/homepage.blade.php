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

    @widget('DanhMucSanPham')

    @widget('SanPhamNoiBat')

    @widget('SanPhamMoi')

    @widget('Testimonial')

    @widget('News')

    <section class="video-gallery  space-global">
        <div class="container">
            <div class="header-box text-center">
                <!-- <div class="group">Hahuco</div> -->
                <h2>Thư viện video</h2>
            </div>

            <script>
                $(document).ready(function() {
                    if($("#video_show").length){
                        $("#video_show").html('<iframe width="100%" height="100%" src="'+$("#a_video1").attr("val_link")+'" frameborder="0" allowfullscreen></iframe>');
                        $("#a_video1").addClass("active");
                        $(".a_video").click(function() {
                            var val_link=$(this).attr("val_link");
                            var val_id=$(this).attr("val_id");
                            $("#video_show").html('<iframe width="100%" height="100%" src="'+val_link+'?autoplay=1" frameborder="0" allowfullscreen></iframe>');
                            $(".a_video").removeClass("active");
                            $("#a_video"+val_id).addClass("active");;
                        });
                    }
                });
            </script>

            <div class="main_sb">
                <div class="row">
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <div class="video" id="video_show"></div>
                    </div>
                    <?php
                        $videos = \App\Models\Video::all();
                        $count = 0;
                    ?>
                    <div class="col-lg-5">
                        <div class="list_video">
                            <div class="slide-video dots-link">
                                @foreach($videos as $video)
		                            <?php $count++; ?>
                                    <div class="a_video" id="a_video{{ $count }}" val_id="{{ $count }}" val_link="{{ $video->video }}">
                                        <a href="JavaScript:void(0);">
                                            <div class="img">
                                                <img src="/{{ $video->thumbnail }}">
                                            </div>
                                            {{ $video->title }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div><!-- End .list_video -->
                    </div>
                </div>
                
                
            </div><!-- End .main_sb -->
        </div>
    </section><!-- /.video-gallery -->

    @widget('Partner')


    <section class="maps">
        <div class="map" id="map" style="height: 350px; width: 100%;"></div>
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

            var contentString = "{!!  $mapdes !!}";

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });

            google.maps.event.addListenerOnce(map, 'tilesloaded', function() {
                infowindow.open(map, marker);
            });
        }
    </script>

@endsection
