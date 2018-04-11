<ul class="box_news">
    @foreach($dichvu as $dv)
    <li>
        <figure>
            <a href="{{ route('homepage.dichvu.show', $dv->slug) }}"><img src="/{{ $dv->image }}" alt="{{ $dv->name }}"></a>
        </figure>

        <div class="info_box_news">
            <h2><a href="{{ route('homepage.dichvu.show', $dv->slug) }}">{{ $dv->name }}</a></h2>
            <span>{!! $dv->excerpt !!}</span>
        </div><!-- End .info_box_news -->
    </li>
    @endforeach
</ul>
<div class="page">
    <div class="PageNum">
        {{ $dichvu->links() }}
    </div>
    <div class="clear"></div>
</div><!-- End .page -->