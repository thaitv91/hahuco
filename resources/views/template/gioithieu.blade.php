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
                        <?php $pages = \PackagePage\Pages\Models\Pages::where('page_categoryid' , '=', 2)->get()?>
                        @foreach($pages as $page)
                            <li><a href="{{ route('user.pages.index', $page->slug) }}">{{ $page->title }}</a></li>
                        @endforeach
                    </ul>
                </div><!-- /.nav-sidebar-->
            </div>
        </div>
    </div>
@endsection
