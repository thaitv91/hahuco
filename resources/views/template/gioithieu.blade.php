@extends('layouts.frontend')

@section('content')
    <div class="breadcrumb-ov">
        <div class="container">
            {{ Breadcrumbs::render('page', $page) }}
        </div>
    </div><!-- /.breadcrumb-ov -->
    
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <article class="single-article">
                    <figure class="img">
                        <img src="{{ $page->thumbnail }}" alt="Image">
                    </figure>
                    <h2 class="title-page">
                        <span>{!! $page->title !!}</span>
                    </h2>
                    <div class="text">
                        {!! $page->content !!}
                    </div>
                </article><!-- End .content -->
            </div>
            <div class="col-lg-3 order-lg-first">
                <div class="nav-sidebar">
                    <ul class="list-unstyled">
                        <li><a href="#">Giá trị cốt lõi</a></li>
                        <li><a href="#">Chính sách chất lượng</a></li>
                        <li><a href="#">Giới thiệu về kim loại tấm Intech</a></li>
                    </ul>
                </div><!-- /.nav-sidebar-->
            </div>
        </div>
    </div>
@endsection
