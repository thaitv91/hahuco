<section class="{{ $config['section_class'] }} text-white section-img {{ $config['addon_class'] }}">
    <div class="container">
        <h2 class="text-center title text-white">{{ $config['title'] }}</h2>
        <div class="slider-news arrows-white-2">
            @foreach($recruitments as $recruitment)
            <div class="tile-news">
                <a class="img" href="{{ route('recruitment.show', $recruitment->id) }}" style="background-image: url('{{ asset($recruitment->thumbnail) }}')"></a>
                <div class="text">
                    <h4 class="dotdotdot"><a class="text-white" href="{{ route('recruitment.show', $recruitment->id) }}">{{ $recruitment->title }}</a></h4>
                    <?php Carbon\Carbon::setLocale('vi'); ?>
                    <p class="time">{{ $recruitment->created_at->format('h:i d/m/Y') }}</p>
                    <div class="description dotdotdot">
                        {{ str_limit(strip_tags($recruitment->body), $limit=200, $end = '...') }}
                    </div>
                </div>
            </div><!-- /.tile-news -->
            @endforeach
        </div>
        @if ($config['readmore'])
        <hr>
        <div class="g-view-more">
            <a href="{{ route('recruitment.index') }}"  class="btn btn-outline-white text-uppercase">Xem thêm <i class="fa fa-angle-double-right"></i></a>
        </div>
        @endif
    </div>
</section>