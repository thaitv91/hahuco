@extends('layouts.frontend')

@section('content')
    <section class="page-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article>
                        <div class="title_ct mb-4">
                            <span>Dịch vụ</span>
                        </div>
                        <h1 class="title_D">{{ $dichvu->name }}</h1>
                        {!! $dichvu->content !!}
                    </article><!-- End .content -->
                </div>
                <div class="col-lg-3 order-lg-first">
                    @widget('SidebarLeft')
                </div>
            </div>
        </div>
    </section>
@endsection