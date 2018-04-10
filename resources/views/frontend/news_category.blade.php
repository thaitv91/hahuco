@extends('layouts.app')

@section('content')
<div class="page-inner">
    <div class="container">
        <div class="row" id="list-news">
            @foreach($listNews as $news)
            <div class="col-lg-3 col-sm-6 mb-5">
                <div class="tile-news">
                    <a class="img" href="{{ route('homepage.news.show', $news->slug) }}" style="background-image: url('/{{ $news->thumbnail }}')"></a>
                    <div class="text">
                        <h4><a href="{{ route('homepage.news.show', $news->slug) }}">{{ $news->name }}</a></h4>
                        <p class="time">{{ $news->created_at->format('h:i d/m/Y') }}</p>
                        <div class="description">
                            {!! $news->excerpt !!}
                        </div>
                        <div class="bottom d-flex justify-content-between align-items-center">
                            <div class="social-news">
                                <a href="#" class="facebook-link"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="google-plus-link"><i class="fa fa-google-plus"></i></a>
                            </div>
                            <div class="view-more">
                                <a href="{{ route('homepage.news.show', $news->slug) }}">Xem tiếp <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.tile-news -->
            </div>
            @endforeach
            <div id="more-result" class="row">
                
            </div>
            @if ($listNews->nextPageUrl())
            <div class="header-box d-flex justify-content-between align-items-center" style="padding:15px 0; float: right;">
                <a href="{{ $listNews->nextPageUrl() }}" id="btn-readmore" class="btn-vbi btn-outline sm text-uppercase">Xem thêm
                    <i class="fa fa-angle-right"></i>
                    <i class="fa fa-angle-right"></i></a>
            </div>
            @endif
        </div>
    </div>
</div><!-- /.page-inner -->
@endsection

@section('scripts')
<script type="text/javascript">
    $('#btn-readmore').on('click', function(e) {
        e.preventDefault();
        var nextPageUrl = $(this).attr('href');
        $.ajax({
            url : nextPageUrl,
        }).done(function(data) {
            $('#more-result').append(data.html);
            if (data.nextPageUrl) {
                $('#btn-readmore').attr('href', data.nextPageUrl);
            } else {
                $('#btn-readmore').parent().remove();
            }
        });
    });
</script>
@endsection
