@extends('layouts.app')

@section('content')
<div class="page-inner">
    <div class="container">
        <div class="row">
            @foreach($recruitments as $recruitment)
            <div class="col-lg-3 col-sm-6 mb-5">
                <div class="tile-news">
                    <a class="img" href="{{ route('recruitment.show', $recruitment->id) }}" style="background-image: url('/{{ $recruitment->thumbnail }}')"></a>
                    <div class="text">
                        <h4><a href="{{ route('recruitment.show', $recruitment->id) }}">{{ $recruitment->title }}</a></h4>
                        <p class="time">{{ $recruitment->created_at->format('h:i d/m/Y') }}</p>
                        <div class="description">
                            {!! str_limit(strip_tags($recruitment->body), $limit=200, $end = '...') !!}
                        </div>
                        <div class="bottom d-flex justify-content-between align-items-center">
                            <div class="view-more">
                                <a href="{{ route('recruitment.show', $recruitment->id) }}">Xem tiếp <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.tile-news -->
            </div>
            @endforeach
        </div>
    </div>
</div><!-- /.page-inner -->
@endsection
