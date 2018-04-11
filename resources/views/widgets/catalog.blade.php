<ul class="box_news">
    @foreach($catalogs as $catalog)
        <li>
            <figure>
                <a href="/{{ $catalog->url_download }}"><img src="/{{ $catalog->thumbnail }}" alt="{{ $catalog->name }}"></a>
            </figure>

            <div class="info_box_news">
                <h2><a href="/{{ $catalog->url_download }}">{{ $catalog->name }}</a></h2>
                <span>{!! $catalog->description !!}</span>
            </div><!-- End .info_box_news -->
        </li>
    @endforeach
</ul>
<div class="page">
    <div class="PageNum">
        {{ $catalogs->links() }}
    </div>
    <div class="clear"></div>
</div><!-- End .page -->