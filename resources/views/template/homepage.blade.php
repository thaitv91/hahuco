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



                        {{--<div class="block_ct">--}}
                        {{--<div class="title_ct"><span>Tin tức mới</span></div><!-- End .title_ct -->--}}

                        {{--<div class="news_home">--}}

                        {{--<div class="nh_l">--}}
                        {{--<figure>--}}
                        {{--<a href="tin-tuc/nhung-loi-ich-cua-ky-thuat-gia-cong-dot-dap-384/index.html">--}}
                        {{--<img class="lazy" data-original="/hahuco/uploads/baiviet/dot-dap-cnc-jpg-201707311145386Jamwaxhde_thum.jpg" alt="nhung loi ich cua ky thuat gia cong dot dap" width="194" height="149">--}}
                        {{--</a>--}}
                        {{--</figure>--}}
                        {{--<div class="info_nh">--}}
                        {{--<h4>--}}



                        {{--<a href="tin-tuc/nhung-loi-ich-cua-ky-thuat-gia-cong-dot-dap-384/index.html">--}}



                        {{--Những lợi ích của kỹ thuật gia công đột dập--}}


                        {{--</a>--}}



                        {{--</h4>--}}



                        {{--<div>--}}



                        {{--Hiện nay, kỹ thuật gia công đột dập ngày càng được sử dụng nhiều trong các nhà máy cơ khí mang lại hiệu quả cao trong quá trình sản xuất. Với kỹ thuật này, các bạn có thể đột được nhiều chất liệu có độ cứng cao như: sắt, inox, thép,..và nhiều dòng sản phẩ--}}


                        {{--</span>--}}



                        {{--</div><!-- End .info_nh -->--}}



                        {{--</div><!-- End .nh_l -->--}}



                        {{--<div class="nh_r">--}}



                        {{--<ul>--}}






                        {{--<li>--}}



                        {{--<a href="tin-tuc/tim-hieu-ky-thuat-gia-cong-chan-gap-382/index.html">--}}



                        {{--<h4>--}}



                        {{--Tìm hiểu kỹ thuật gia công chấn gấp--}}


                        {{--</h4>--}}



                        {{--</a>--}}



                        {{--</li>--}}






                        {{--<li>--}}



                        {{--<a href="tin-tuc/cat-laser-la-gi-uu-diem-cua-cat-laser-380/index.html">--}}



                        {{--<h4>--}}



                        {{--Cắt laser là gì? Ưu điểm của cắt laser--}}


                        {{--</h4>--}}



                        {{--</a>--}}



                        {{--</li>--}}






                        {{--<li>--}}



                        {{--<a href="tin-tuc/loi-ich-khi-su-dung-ban-thao-tac-inox-372/index.html">--}}



                        {{--<h4>--}}



                        {{--Lợi ích khi sử dụng bàn thao tác inox--}}


                        {{--</h4>--}}



                        {{--</a>--}}



                        {{--</li>--}}






                        {{--<li>--}}



                        {{--<a href="tin-tuc/uu-diem-cua-ke-de-hang-inox-intech-viet-nam-370/index.html">--}}



                        {{--<h4>--}}



                        {{--Ưu điểm của kệ để hàng inox Intech Việt Nam--}}


                        {{--</h4>--}}



                        {{--</a>--}}



                        {{--</li>--}}






                        {{--</ul>--}}



                        {{--</div><!-- End .nh_r -->--}}



                        {{--</div><!-- End .main_ct -->--}}



                        {{--</div><!-- End .block_ct -->--}}



                    </article><!-- End .content -->
                </div>
                <div class="col-lg-3 order-lg-first">
                    @widget('SidebarLeft')
                </div>
            </div>
        </div>
    </section>
@endsection
