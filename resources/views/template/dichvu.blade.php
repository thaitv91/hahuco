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
                <article>
                    <div class="title_ct mb-4">
                        <span>{!! $page->title !!}</span>
                        {!!  Share::currentPage()->facebook()->twitter()->googlePlus()  !!}
                    </div>
                    @widget('DanhSachDichVu')
                </article><!-- End .content -->
            </div>
            <div class="col-lg-3 order-lg-first">
                @widget('SidebarLeft')
            </div>
        </div>
    </div>
@endsection
