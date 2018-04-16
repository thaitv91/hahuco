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

     <section class="investment-sector bg-f4 space-global">
        <div class="container">
            <div class="header-box text-center">
                <div class="group">Hahuco</div>
                <h2>Lĩnh vực đầu tư</h2>
            </div>

            <div class="slide-navs dots-link">
                <div class="item">
                    <div class="tile-investment d-flex">
                        <div class="ico"><i class="ico-investment-1"></i></div>
                        <div class="text">
                            <h4><a href="linh-vuc-dau-tu-bat-dong-san.html">Bất động sản</a></h4>
                            <div class="desc">
                                Các dự án về Bất động sản của
                                VIG Group được thực hiện bởi
                                Công ty Cổ phần Bất động sản
                                (VIG Land), là...
                            </div>
                        </div>
                    </div><!-- /.tile-investment -->
                </div>

                <div class="item">
                    <div class="tile-investment d-flex">
                        <div class="ico"><i class="ico-investment-2"></i></div>
                        <div class="text">
                            <h4><a href="linh-vuc-dau-tu-co-so-ha-tang.html">Cơ sở hạ tầng</a></h4>
                            <div class="desc">
                                VIG Group luôn tiên phong trong
                                các hoạt động đầu tư và phát
                                triển cơ sở hạ tầng. Với vai trò tư
                                vấn, cấu trúc dự án...
                            </div>
                        </div>
                    </div><!-- /.tile-investment -->
                </div>

                <div class="item">
                    <div class="tile-investment d-flex">
                        <div class="ico"><i class="ico-investment-3"></i></div>
                        <div class="text">
                            <h4><a href="linh-vuc-dau-tu-nong-nghiep.html">Nông nghiệp</a></h4>
                            <div class="desc">
                                Nông nghiệp là ngành có tiềm
                                năng và lợi thế nhất của Việt
                                Nam, đây là ngành duy nhất
                                xuất siêu và có...
                            </div>
                        </div>
                    </div><!-- /.tile-investment -->
                </div>

                <div class="item">
                    <div class="tile-investment d-flex">
                        <div class="ico"><i class="ico-investment-4"></i></div>
                        <div class="text">
                            <h4><a href="linh-vuc-dau-tu-san-pham-tai-chinh.html">Sản phẩm tài chính</a></h4>
                            <div class="desc">
                                Được xây dựng và hình thành từ
                                năm 2008, VIG Group có mối
                                quan hệ đối tác tốt với các ngân
                                hàng thương mại lớn
                            </div>
                        </div>
                    </div><!-- /.tile-investment -->
                </div>

                <div class="item">
                    <div class="tile-investment d-flex">
                        <div class="ico"><i class="ico-investment-5"></i></div>
                        <div class="text">
                            <h4><a href="linh-vuc-dau-tu-phat-trien-cong-dong.html">Phát triển cộng đồng</a></h4>
                            <div class="desc">
                                Những dự án gắn liền với phát
                                triển kinh tế địa phương, nâng
                                cao đời sống của cư dân trong
                                vùng kinh tế luôn được...
                            </div>
                        </div>
                    </div><!-- /.tile-investment -->
                </div>

                <div class="item">
                    <div class="tile-investment d-flex">
                        <div class="ico"><i class="ico-investment-6"></i></div>
                        <div class="text">
                            <h4><a href="linh-vuc-dau-tu-nang-luong.html">Năng lượng</a></h4>
                            <div class="desc">
                                Các nguồn năng lượng hóa
                                thạch ngày càng thiếu hụt và
                                hiện tượng nóng lên của trái
                                đất trở nên đáng Các nguồn năng lượng hóa
                                thạch ngày càng thiếu hụt và
                                hiện tượng nóng lên của trái
                                đất trở nên đáng...
                            </div>
                        </div>
                    </div><!-- /.tile-investment -->
                </div>

                <div class="item">
                    <div class="tile-investment d-flex">
                        <div class="ico"><i class="ico-investment-3"></i></div>
                        <div class="text">
                            <h4><a href="linh-vuc-dau-tu-nong-nghiep.html">Nông nghiệp</a></h4>
                            <div class="desc">
                                Nông nghiệp là ngành có tiềm
                                năng và lợi thế nhất của Việt
                                Nam, đây là ngành duy nhất
                                xuất siêu và có...
                            </div>
                        </div>
                    </div><!-- /.tile-investment -->
                </div>

                <div class="item">
                    <div class="tile-investment d-flex">
                        <div class="ico"><i class="ico-investment-4"></i></div>
                        <div class="text">
                            <h4><a href="linh-vuc-dau-tu-san-pham-tai-chinh.html">Sản phẩm tài chính</a></h4>
                            <div class="desc">
                                Được xây dựng và hình thành từ
                                năm 2008, VIG Group có mối
                                quan hệ đối tác tốt với các ngân
                                hàng thương mại lớn
                            </div>
                        </div>
                    </div><!-- /.tile-investment -->
                </div>

                <div class="item">
                    <div class="tile-investment d-flex">
                        <div class="ico"><i class="ico-investment-5"></i></div>
                        <div class="text">
                            <h4><a href="linh-vuc-dau-tu-phat-trien-cong-dong.html">Phát triển cộng đồng</a></h4>
                            <div class="desc">
                                Những dự án gắn liền với phát
                                triển kinh tế địa phương, nâng
                                cao đời sống của cư dân trong
                                vùng kinh tế luôn được...
                            </div>
                        </div>
                    </div><!-- /.tile-investment -->
                </div>

                <div class="item">
                    <div class="tile-investment d-flex">
                        <div class="ico"><i class="ico-investment-6"></i></div>
                        <div class="text">
                            <h4><a href="linh-vuc-dau-tu-nang-luong.html">Năng lượng</a></h4>
                            <div class="desc">
                                Các nguồn năng lượng hóa
                                thạch ngày càng thiếu hụt và
                                hiện tượng nóng lên của trái
                                đất trở nên đáng Các nguồn năng lượng hóa
                                thạch ngày càng thiếu hụt và
                                hiện tượng nóng lên của trái
                                đất trở nên đáng...
                            </div>
                        </div>
                    </div><!-- /.tile-investment -->
                </div>
            </div>
        </div>
    </section><!-- /.investment-sector -->

    @widget('SanPhamNoiBat')

    @widget('SanPhamMoi')

    <section class="testimonials space-global">
        <div class="container">
          <div class="header-box text-center">
                <div class="group">Hahuco</div>
                <h2>Khách hàng nói về chúng tôi</h2>
            </div>
          <div class="dots-link slider-testimonials">
            <div class="testimonial-item">
              <div class="text">Donec semper euismod nisi quis feugiat. Nullam finibus metus eget orci volutpat porta. Morbi quis arcu vulputate, dignissim mi ac, varius magna.<span><i class="ico-quote"></i></span></div>
              <div class="author"><img src="/hahuco/images/upload/testimonial-1.png" alt="Image" class="img-fluid">
                <h4 class="title-mon-b">BEN WILLSTONE</h4>
                <p>Businessman</p>
              </div>
            </div>
            <div class="testimonial-item">
              <div class="text">Proin sagittis elementum odio, sed blandit sapien mattis sed. Mauris ut scelerisque risus. Donec pretium nulla ullamcorper sem maximus, et vulputate sem malesuada.<span><i class="ico-quote"></i></span></div>
              <div class="author"><img src="/hahuco/images/upload/testimonial-2.png" alt="Image" class="img-fluid">
                <h4 class="title-mon-b">ALEX ROBOTO</h4>
                <p>Designer & Illustrator</p>
              </div>
            </div>
            <div class="testimonial-item">
              <div class="text">Nulla laoreet sed enim in pulvinar. Nunc nec mauris sed lorem scelerisque sagittis. Vivamus mauris nibh, volutpat suscipit posuere sit amet, vehicula.<span><i class="ico-quote"></i></span></div>
              <div class="author"><img src="/hahuco/images/upload/testimonial-3.png" alt="Image" class="img-fluid">
                <h4 class="title-mon-b">DANIEL ORMONE</h4>
                <p>Web Designer</p>
              </div>
            </div>
            <div class="testimonial-item">
              <div class="text">Donec semper euismod nisi quis feugiat. Nullam finibus metus eget orci volutpat porta. Morbi quis arcu vulputate, dignissim mi ac, varius magna.<span><i class="ico-quote"></i></span></div>
              <div class="author"><img src="/hahuco/images/upload/testimonial-1.png" alt="Image" class="img-fluid">
                <h4 class="title-mon-b">BEN WILLSTONE</h4>
                <p>Businessman</p>
              </div>
            </div>
            <div class="testimonial-item">
              <div class="text">Proin sagittis elementum odio, sed blandit sapien mattis sed. Mauris ut scelerisque risus. Donec pretium nulla ullamcorper sem maximus, et vulputate sem malesuada.<span><i class="ico-quote"></i></span></div>
              <div class="author"><img src="/hahuco/images/upload/testimonial-2.png" alt="Image" class="img-fluid">
                <h4 class="title-mon-b">ALEX ROBOTO</h4>
                <p>Designer & Illustrator</p>
              </div>
            </div>
            <div class="testimonial-item">
              <div class="text">Nulla laoreet sed enim in pulvinar. Nunc nec mauris sed lorem scelerisque sagittis. Vivamus mauris nibh, volutpat suscipit posuere sit amet, vehicula.<span><i class="ico-quote"></i></span></div>
              <div class="author"><img src="/hahuco/images/upload/testimonial-3.png" alt="Image" class="img-fluid">
                <h4 class="title-mon-b">DANIEL ORMONE</h4>
                <p>Web Designer</p>
              </div>
            </div>
          </div>
        </div>
      </section>


    {{--@widget('Award')--}}

    <section class="partners">
        <div class="container">
            <div class="header-box">
                <div class="group">CÁC Đối tác của</div>
                <h2>Hahuco</h2>
            </div>

            <div class="slider-partners">
                <div class="item">
                    <div class="tile-partner">
                        <img src="/hahuco/images/upload/vin-1.jpg" alt=""/>
                    </div><!-- /.tile-partner -->
                </div>

                <div class="item">
                    <div class="tile-partner">
                        <img src="/hahuco/images/upload/vin-2.jpg" alt=""/>
                    </div><!-- /.tile-partner -->
                </div>

                <div class="item">
                    <div class="tile-partner">
                        <img src="/hahuco/images/upload/vin-3.jpg" alt=""/>
                    </div><!-- /.tile-partner -->
                </div>

                <div class="item">
                    <div class="tile-partner">
                        <img src="/hahuco/images/upload/vin-4.jpg" alt=""/>
                    </div><!-- /.tile-partner -->
                </div>

                <div class="item">
                    <div class="tile-partner">
                        <img src="/hahuco/images/upload/vin-5.jpg" alt=""/>
                    </div><!-- /.tile-partner -->
                </div>
                
                <div class="item">
                    <div class="tile-partner">
                        <img src="/hahuco/images/upload/vin-6.jpg" alt=""/>
                    </div><!-- /.tile-partner -->
                </div>
            </div>
        </div>
    </section><!--/.partners -->

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
