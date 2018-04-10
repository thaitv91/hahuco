  <section class="{{ $section_class }} text-white section-img {{ $config['addon_class'] }}">
    <div class="container">
        <h2 class="text-center title text-white">{{ $config['title'] }}</h2>
        <div class="slider-news arrows-white-2">
            @foreach($news as $new)
            <div class="tile-news">
                <a class="img" href="{{ route('homepage.news.show', $new->slug) }}" style="background-image: url('{{ $new->thumbnail }}')"></a>
                <div class="text">
                    <h4 class="dotdotdot"><a href="{{ route('homepage.news.show', $new->slug) }}">{{ $new->name }}</a></h4>
                    <?php Carbon\Carbon::setLocale('vi'); ?>
                    <p class="time">{{ $new->created_at->format('h:i d/m/Y') }}</p>
                    <div class="description dotdotdot">
                        {!! $new->excerpt !!}
                    </div>
                </div>
            </div><!-- /.tile-news -->
            @endforeach
        </div>
        @if ($config['readmore'])
        <hr>
        <div class="g-view-more">
            <a href="{{ route('homepage.news.category', $config['cate_slug']) }}" class="btn btn-outline-white text-uppercase">Xem thêm <i class="fa fa-angle-double-right"></i></a>
        </div>
        @endif
    </div>
</section>