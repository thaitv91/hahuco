@extends('layouts.app')

@section('content')
    <!-- main content -->
    <section class="banner-only-img">
        <div class="section-img" style="background-image: url('/{{ $page->thumbnail }}')"></div>
    </section>

    @widget($page->getContentofField("tuyendung-recruitment-search"))

    @widget( $page->getContentofField("tuyendung-recruitment-list"))
    
    @widget( $page->getContentofField("tuyendung-recruitment-resume"),['section_class' => 'testimonials', 'readmore' => true] )

    @widget( $page->getContentofField("tuyendung-van-hoa-doanh-nghiep") , ['cate_slug' => 'van-hoa-doanh-nghiep', 'title' => 'Văn Hóa Doanh Nghiệp', 'addon_class' => 'space-global','readmore' => true])
    
    @widget( $page->getContentofField("tuyendung-chuong-trinh-dao-tao") , ['title' => 'Chương trình đào tạo', 'readmore' => true])
   
    <!-- e: main content -->
@endsection
