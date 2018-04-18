@extends('layouts.frontend')

@section('content')
    <section class="page-inner">

        <div class="breadcrumb-ov">
            <div class="container">
                {{ Breadcrumbs::render('tintuc-detail', $new) }}
            </div>
        </div><!-- /.breadcrumb-ov -->

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article>
                        <div class="title_ct mb-4">
                            <span>Tin tức</span>
                        </div>
                        <h1 class="title_D">{{ $new->name }}</h1>
                        {!! $new->content !!}

                        <div class="tag">
                            <span>Tags</span>
                            @foreach($tags as $tag)
                                <a target="_self" href="{{ route('homepage.news.tags', $tag->slug) }}">{{ $tag->name }}</a>
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