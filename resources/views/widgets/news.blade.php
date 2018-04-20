<section class="news bg-f4 space-global">
    <div class="container">
        <div class="header-box text-center">
            <div class="group">Hahuco</div>
            <h2>Tin tức</h2>
        </div>

        <div class="row">
            @foreach($news as $new)
            <div class="col-lg-4 col-md-6">
                <div class="tile-news">
                    <div class="img effect-img">
                        <a href="{{ route('homepage.news.show', $new->slug) }}"><img src="{{ $new->thumbnail }}" alt="" onerror="this.src='/hahuco/images/img-default.jpg';" /></a>
                    </div>
                    <h4 class="title-sm"><a href="{{ route('homepage.news.show', $new->slug) }}">{{ $new->name }}</a></h4>
                    <?php Carbon\Carbon::setLocale('vi'); ?>
                    <p class="time">{{ $new->created_at->format('h:i d/m/Y') }}</p>
                    <div class="desc dotdotdot">
                        {!! $new->excerpt !!}
                    </div>
                    <a href="{{ route('homepage.news.show', $new->slug) }}" class="btn-hahuco btn-outlight-red">Chi tiết</a>
                </div><!-- /.tile-news -->
            </div>
            @endforeach
        </div>

        @if ($config['readmore'])
        <hr>
        <div class="g-view-more">
            <a href="{{ route('homepage.news.category', $config['cate_slug']) }}" class="btn btn-outline-white text-uppercase">Xem thêm <i class="fa fa-angle-double-right"></i></a>
        </div>
        @endif
    </div>
</section><!-- /.news -->