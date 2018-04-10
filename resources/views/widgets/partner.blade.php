<section class="partners section-img">
    <div class="container">
        <h2 class="text-center title">@lang('frontend/home.partner')</h2>
        <div class="slider-partners arrows-gray">
            @foreach($partners as $partner)
            <div class="item">
                <div class="tile-partner">
                    <img src="/{{ $partner->thumbnail }}" alt="{{ $partner->name }}"/>
                    <div class="partner-title"><span>{{ $partner->name }}</span></div>
                </div><!-- /.tile-partner -->
            </div>
            @endforeach
        </div>
    </div>
</section><!-- /.partners -->