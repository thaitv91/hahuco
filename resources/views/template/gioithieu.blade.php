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
                    @if($page->thumbnail)
                    <figure class="img">
                        <img src="{{ $page->thumbnail }}" alt="Image">
                    </figure>
                    @endif
                    <div class="title_ct mb-4">
                        <span>{!! $page->title !!}</span>
                        {!!  Share::currentPage()->facebook()->twitter()->googlePlus()  !!}
                    </div>
                    <div class="text format-editor">
                        {!! $page->content !!}
                    </div>
                </article><!-- End .content -->
            </div>
            <div class="col-lg-3 order-lg-first">
                <div class="nav-sidebar">
                    <h3 class="title_sb">
                          <span>Giới thiệu</span>
                      </h3><!-- End .title_sb -->
                    <ul class="list-unstyled">
                        <?php $pages = \PackagePage\Pages\Models\Pages::where('page_categoryid' , '=', 2)->get()?>
                        @foreach($pages as $page)
                            <li><a href="{{ route('user.pages.index', $page->slug) }}">{{ $page->title }}</a></li>
                        @endforeach
                    </ul>
                </div><!-- /.nav-sidebar-->

                <div class="block_sb">
                    <h3 class="title_sb">
                        <span>Hỗ trợ trực tuyến</span>
                    </h3><!-- End .title_sb -->
                    <div class="hotline">
                        <ul>
                            <li>
                                <strong>Hotline 01</strong>
                                <p style="color:#333;">{!! $hotline1 !!}</p>
                            </li>
                            <li>
                                <strong>Hotline 02</strong>
                                <p style="color:#333;">{!! $hotline2 !!}</p>
                            </li>
                            <li>
                                <strong>Hotline 03</strong>
                                <p style="color:#333;">{!! $hotline3 !!}</p>
                            </li>
                        </ul>
                    </div><!-- End .hotline -->
                </div><!-- End .block_sb -->
            </div>
        </div>
    </div>
@endsection
