<ul class="box_news">
    @foreach($news as $new)
        <li>
            <figure>
                <a href="{{ route('homepage.news.show', $new->slug) }}"><img src="/{{ $new->thumbnail }}" alt="{{ $new->name }}"></a>
            </figure>

            <div class="info_box_news">
                <h2><a href="{{ route('homepage.news.show', $new->slug) }}">{{ $new->name }}</a></h2>
                <span>{!! $new->excerpt !!}</span>
            </div><!-- End .info_box_news -->
        </li>
    @endforeach
</ul>
<div class="page">
    <div class="PageNum">
        {{ $news->links() }}
    </div>
    <div class="clear"></div>
</div><!-- End .page -->