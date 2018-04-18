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
                    <h2 class="title-page">
                        <span>{!! $page->title !!}</span>
                    </h2>
                    @widget('DanhSachTuyenDung')
                </article><!-- End .content -->
            </div>
            <div class="col-lg-3 order-lg-first">
                @widget('SidebarLeft')
            </div>
        </div>
    </div>
    
@endsection
