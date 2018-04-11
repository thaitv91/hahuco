<ul class="box_news">
    @foreach($recruitments as $recruitment)
        <li>
            <figure>
                <a href="{{ route('recruitment.show', $recruitment->slug) }}"><img src="/{{ $recruitment->thumbnail }}" alt="{{ $recruitment->title }}"></a>
            </figure>

            <div class="info_box_news">
                <h2><a href="{{ route('recruitment.show', $recruitment->slug) }}">{{ $recruitment->title }}</a></h2>
                <span>{!! $recruitment->excerpt !!}</span>
            </div><!-- End .info_box_news -->
        </li>
    @endforeach
</ul>
<div class="page">
    <div class="PageNum">
        {{ $recruitments->links() }}
    </div>
    <div class="clear"></div>
</div><!-- End .page -->