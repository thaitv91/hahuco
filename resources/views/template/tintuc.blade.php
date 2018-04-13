@extends('layouts.frontend')

@section('content')
    <section class="page-inner">
        <div class="container">
            {{ Breadcrumbs::render('page', $page) }}
            <div class="row">
                <div class="col-lg-9">
                    <article>
                        <div class="title_ct mb-4">
                            <span>{!! $page->title !!}</span>
                        </div>
                        @widget('DanhSachTinTuc')
                    </article><!-- End .content -->
                </div>
                <div class="col-lg-3 order-lg-first">
                    @widget('SidebarLeft')
                </div>
            </div>
        </div>
    </section>
@endsection
