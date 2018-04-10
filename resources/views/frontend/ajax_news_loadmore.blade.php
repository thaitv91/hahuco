@foreach($listNews as $news)
<div class="col-lg-3 col-sm-6 mb-5">
    <div class="tile-news">
        <a class="img" href="{{ route('homepage.news.show', $news->slug) }}" style="background-image: url('/{{ $news->thumbnail }}')"></a>
        <div class="text">
            <h4><a href="{{ route('homepage.news.show', $news->slug) }}">{{ str_limit($news->name, $limit = 50, $end='...') }}</a></h4>
            <p class="time">{{ $news->created_at->format('h:i d/m/Y') }}</p>
            <div class="description">
                {!! str_limit(strip_tags($news->excerpt), $limit = 250, $end='...') !!}
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