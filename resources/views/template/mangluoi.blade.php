@extends('layouts.app')

@section('content')
    <!-- main content -->
    <section class="section-img banner-networks space-global">
        <div class="container text-center">
            <h1>{!!  $page->getContentofField("mangluoi-header")  !!}</h1>
            <ul class="list-unstyled">
                <li><span class="btn-vbi text-uppercase">{{ $page->getContentofField("mangluoi-title-1") }}</span></li>
                <li><span class="btn-vbi text-uppercase">{{ $page->getContentofField("mangluoi-title-2") }}</span></li>
                <li><span class="btn-vbi text-uppercase">{{ $page->getContentofField("mangluoi-title-3") }}</span></li>
                <li><span class="btn-vbi btn-pink text-uppercase">Hotline: <strong>{{ $page->getContentofField("mangluoi-contact") }}</strong></span></li>
            </ul>
        </div>
    </section>
    @if($page->getContentofField("mangluoi-map-type") != '')
        @widget($page->getContentofField("mangluoi-network-map"), ['type' => $page->getContentofField("mangluoi-map-type")])
    @else
        @widget($page->getContentofField("mangluoi-network-map"))
    @endif
    <!-- e: main content -->
@endsection
