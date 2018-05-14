@extends('layouts.frontend')

@section('content')
    <section class="page-inner">
        <div class="breadcrumb-ov">
            <div class="container">
                {{ Breadcrumbs::render('dv-detail', $dichvu) }}
            </div>
        </div><!-- /.breadcrumb-ov -->

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article class="format-editor">
                        <div class="title_ct mb-4">
                            <span>Dịch vụ</span>
                            {!!  Share::currentPage()->facebook()->twitter()->googlePlus()  !!}
                        </div>
                        <h1 class="title_D">{{ $dichvu->name }}</h1>
                        {!! $dichvu->content !!}

                        <div class="tag">
                            <span>Tags</span>
                            @foreach($tags as $tag)
                                <a target="_self" href="{{ route('homepage.dichvu.tags', $tag->slug) }}">{{ $tag->name }}</a>
                            @endforeach
                        </div><!-- End .tag -->
                    </article><!-- End .content -->
                </div>
                <div class="col-lg-3 order-lg-first">
                    @widget('SidebarLeft')
                </div>
            </div>
        </div>
    </section>
@endsection