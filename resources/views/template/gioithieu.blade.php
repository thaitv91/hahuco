@extends('layouts.app')

@section('content')
    <!-- main content -->
    <section class="banner-only-img space-global">
        <div class="section-img" style="background-image: url('/{{ $page->thumbnail}}')"></div>
    </section>

    <section class="timeline">
        <div class="container">
            <h2 class="title text-center">{{ $page->title }}</h2>
            <div class="list">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-item order-lg-2">
                        <div class="img">
                            <img src="{!!  $page->getContentofField('gioithieu-tong-the-hinh-anh') != ''?
                                $page->getContentofField('gioithieu-tong-the-hinh-anh') :  
                                'images/upload/about-1.jpg' !!}" alt=""/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-item">
                        <div class="text">
                            <h4><a href="{!!  $page->getContentofField("gioithieu-tong-the-duong-dan")  !!}">{!!  $page->getContentofField("gioithieu-tong-the-title")  !!}</a></h4>
                            <div class="description">
                               {!!  $page->getContentofField("gioithieu-tong-the")  !!}
                            </div>
                            @if($page->getContentofField('gioithieu-tong-the-duong-dan') != '#')
                            <div class="view-more">
                                <a href="{!!  $page->getContentofField("gioithieu-tong-the-duong-dan")  !!}">xem thêm <i class="fa fa-angle-right"></i></a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-6 col-item">
                        <div class="img">
                            <img src="{!!  $page->getContentofField('gioithieu-tam-nhin-gia-tri-cot-loi-hinh-anh') != ''?
                                $page->getContentofField('gioithieu-tam-nhin-gia-tri-cot-loi-hinh-anh') :  
                                'images/upload/about-2.jpg' !!}" alt=""/>
                        </div>
                    </div>

                    <div class="col-lg-6 col-item">
                        <div class="text">
                            <h4><a href="{!!  $page->getContentofField('gioithieu-tam-nhin-gia-tri-cot-loi-duong-dan') !!}">{!!  $page->getContentofField("gioithieu-tam-nhin-gia-tri-cot-loi-title")  !!}</a></h4>
                            <div class="description">
                                {!!  $page->getContentofField("gioithieu-tam-nhin-gia-tri-cot-loi")  !!}
                            </div>
                            @if($page->getContentofField('gioithieu-tam-nhin-gia-tri-cot-loi-duong-dan') != '#')
                            <div class="view-more">
                                <a href="{!!  $page->getContentofField('gioithieu-tam-nhin-gia-tri-cot-loi-duong-dan') !!}">xem thêm <i class="fa fa-angle-right"></i></a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-6 col-item order-lg-2">
                        <div class="img">
                            <img src="{!!  $page->getContentofField('gioithieu-co-cau-quan-tri-hinh-anh') != ''?
                                $page->getContentofField('gioithieu-co-cau-quan-tri-hinh-anh') :  
                                'images/upload/about-2.jpg' !!}" alt=""/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-item">
                        <div class="text">
                            <h4><a href="{!!  $page->getContentofField('gioithieu-co-cau-quan-tri-duong-dan')  !!}">{!!  $page->getContentofField('gioithieu-co-cau-quan-tri-title')  !!}</a></h4>
                            <div class="description">
                                {!!  $page->getContentofField('gioithieu-co-cau-quan-tri')  !!}
                            </div>
                            @if($page->getContentofField('gioithieu-co-cau-quan-tri-duong-dan') != '#')
                            <div class="view-more">
                                <a href="{!!  $page->getContentofField('gioithieu-co-cau-quan-tri-duong-dan')  !!}">xem thêm <i class="fa fa-angle-right"></i></a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-6 col-item">
                        <div class="img">
                            <img src="{!!  $page->getContentofField('gioithieu-giai-thuong-va-danh-hieu-hinh-anh') != ''?
                                $page->getContentofField('gioithieu-giai-thuong-va-danh-hieu-hinh-anh') :  
                                'images/upload/about-2.jpg' !!}" alt=""/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-item">
                        <div class="text">
                            <h4><a href="{!!  $page->getContentofField('gioithieu-giai-thuong-va-danh-hieu-duong-dan')  !!}">{!!  $page->getContentofField('gioithieu-giai-thuong-va-danh-hieu-title')  !!}</a></h4>
                            <div class="description">
                                {!!  $page->getContentofField('gioithieu-giai-thuong-va-danh-hieu')  !!}
                            </div>
                            @if($page->getContentofField('gioithieu-giai-thuong-va-danh-hieu-duong-dan') != '#')
                            <div class="view-more">
                                <a href="{!!  $page->getContentofField('gioithieu-giai-thuong-va-danh-hieu-duong-dan')  !!}">xem thêm <i class="fa fa-angle-right"></i></a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                @if($page->getContentofField('gioithieu-ho-tro-cong-dong-title'))
                <div class="row align-items-center">
                    <div class="col-lg-6 col-item order-lg-2">
                        <div class="img">
                            <img src="{!!  $page->getContentofField('gioithieu-ho-tro-cong-dong-hinh-anh') != ''?
                                $page->getContentofField('gioithieu-ho-tro-cong-dong-hinh-anh') :  
                                'images/upload/about-5.jpg' !!}" alt=""/>                        </div>
                    </div>
                    <div class="col-lg-6 col-item">
                        <div class="text">
                            <h4><a href="{!!  $page->getContentofField('gioithieu-ho-tro-cong-dong-duong-dan')  !!}">{!!  $page->getContentofField('gioithieu-ho-tro-cong-dong-title')  !!}</a></h4>
                            <div class="description">
                                {!!  $page->getContentofField('gioithieu-ho-tro-cong-dong')  !!}
                            </div>
                            <div class="view-more">
                                <a href="{!!  $page->getContentofField('gioithieu-ho-tro-cong-dong-duong-dan')  !!}">xem thêm <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div><!-- /.list -->
        </div>
    </section>
    <!-- e: main content -->
@endsection
