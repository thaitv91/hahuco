<section class="education-program space-global">
    <div class="container">
        <h2 class="text-center title">Chương trình đào tạo</h2>
        <div class="slide-education arrows-gray">
            @foreach ($news as $item)
            <div class="item">
                <div class="tile-education">
                    <div class="img">
                        <a href="{{ route('homepage.news.show', ['news_slug' => $item->slug]) }}"><img src="{{ asset($item->thumbnail) }}" alt="Image" /></a>
                    </div>
                    <h4><a href="{{ route('homepage.news.show', ['news_slug' => $item->slug]) }}">{{ $item->name }}</a></h4>
                </div><!-- /.tile-education -->
            </div>
            @endforeach
        </div>
        @if ($config['readmore'])
        <hr>
        <div class="g-view-more">
            <a href="{{ route('homepage.news.category', $config['cate_slug']) }}" class="btn btn-primary text-uppercase">Xem thêm <i class="fa fa-angle-double-right"></i></a>
        </div>
        @endif
    </div>
    </section><!-- /.education-program -->