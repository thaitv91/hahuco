@extends('layouts.frontend')

@section('content')
    <section class="page-inner">

        <div class="breadcrumb-ov">
            <div class="container">
                {{ Breadcrumbs::render('tuyendung-detail', $recruitment) }}
            </div>
        </div><!-- /.breadcrumb-ov -->

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article>
                        <div class="title_ct mb-4">
                            <span>Tuyển dụng</span>
                        </div>
                        <h1 class="title_D">{{ $recruitment->title }}</h1>
                        {!! $recruitment->body !!}
                    </article><!-- End .content -->
                </div>
                <div class="col-lg-3 order-lg-first">
                    @widget('SidebarLeft')
                </div>
            </div>
        </div>
    </section>
@endsection