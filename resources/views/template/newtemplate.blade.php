@extends('layouts.app')

@section('content')
    <div class="container space-global">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="news-detail">
                    <h2>{{ $page->title }}</h2>
                    <div class="text">
                        {!! $page->content !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
