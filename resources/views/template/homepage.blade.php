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
                <div class="group">Hahuco</div>
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
                <div class="video" id="video_show"></div>
                <div class="list_video">
                    <div class="slide-video dots-link">
                        <div class="a_video" id="a_video1" val_id="1" val_link="http://www.youtube.com/embed/zB4HksXlhAI">
                            <a href="JavaScript:void(0);">
                                <div class="img">
                                    <img src="hahuco/images/video/0.jpg">
                                </div>
                                Gia công chấn gấp cnc Intech Việt Nam                        
                            </a>
                        </div>

                        <div class="a_video" id="a_video2" val_id="2" val_link="http://www.youtube.com/embed/ziXz_R54ijQ">
                            <a href="JavaScript:void(0);">
                                <div class="img">
                                    <img src="hahuco/images/video/1.jpg">
                                </div>
                                Gia công đột dập CNC                        
                            </a>
                        </div>

                        <div class="a_video" id="a_video3" val_id="3" val_link="http://www.youtube.com/embed/6HAX73CLGKA">
                            <a href="JavaScript:void(0);">
                                <div class="img">
                                    <img src="hahuco/images/video/2.jpg">
                                </div>
                                Gia công chấn gấp CNC                        
                            </a>
                        </div>

                        <div class="a_video" id="a_video4" val_id="4" val_link="http://www.youtube.com/embed/be38W5SB1Ek">
                            <a href="JavaScript:void(0);">
                                <div class="img">
                                    <img src="hahuco/images/video/3.jpg">
                                </div>
                                Gia công cắt Laser                       
                            </a>
                        </div>

                        <div class="a_video" id="a_video5" val_id="5" val_link="http://www.youtube.com/embed/yydVXWIzZqQ">
                            <a href="JavaScript:void(0);">
                                <div class="img">
                                    <img src="hahuco/images/video/4.jpg">
                                </div>
                                Intech Việt Nam - 5 năm một chặng đường                       
                            </a>
                        </div>

                        <div class="a_video" id="a_video6" val_id="6" val_link="http://www.youtube.com/embed/2JVKWMSs5h0">
                            <a href="JavaScript:void(0);">
                                <div class="img">
                                    <img src="hahuco/images/video/5.jpg">
                                </div>
                                Kỷ niệm 5 năm thành lập Intech Việt Nam!                        
                            </a>
                        </div>

                        <div class="a_video" id="a_video7" val_id="7" val_link="http://www.youtube.com/embed/u7O9AinKhi0">
                            <a href="JavaScript:void(0);">
                                <div class="img">
                                    <img src="hahuco/images/video/6.jpg">
                                </div>
                                Gia công cắt Laser trên thép, inox                        
                            </a>
                        </div>

                        <div class="a_video" id="a_video8" val_id="8" val_link="http://www.youtube.com/embed/HBelvkEZmg4">
                            <a href="JavaScript:void(0);">
                                <div class="img">
                                    <img src="hahuco/images/video/7.jpg">
                                </div>
                                Tiệc tất niên 2017 Intech Việt Nam                       
                            </a>
                        </div>

                        <div class="a_video" id="a_video9" val_id="9" val_link="http://www.youtube.com/embed/gKPAk7EM8lg">
                            <a href="JavaScript:void(0);">
                                <div class="img">
                                    <img src="hahuco/images/video/8.jpg">
                                </div>
                                Gia công căt laser trên inox                        
                            </a>
                        </div>

                        <li class="a_video" id="a_video10" val_id="10" val_link="http://www.youtube.com/embed/w-zQm74MR2U">
                            <a href="JavaScript:void(0);">
                                <div class="img">
                                    <img src="hahuco/images/video/9.jpg">
                                </div>
                                Gia công chấn gấp kim loại tấm                        
                            </a>
                        </div>
                    </div>
                </div><!-- End .list_video -->
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
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>

@endsection
