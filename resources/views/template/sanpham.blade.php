@extends('layouts.frontend')

@section('content')
    <section class="page-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article>
                        <div class="title_ct">
                            <span>{!! $page->title !!}</span>
                        </div>
                        {!! $page->content !!}

                        @widget('TatCaSanPham')
                    </article><!-- End .content -->
                </div>
                <div class="col-lg-3 order-lg-first">
                    @widget('SidebarLeft')
                </div>
            </div>
        </div>
    </section>
@endsection
