<section class="partners section-img">
    <div class="container">
        <div class="header-box text-center">
            <h2>Các đối tác của Chúng tôi</h2>
        </div>
        <div class="slider-partners arrows-gray">
            @foreach($partners as $partner)
            <div class="item">
                <div class="tile-partner">
                    <img src="/{{ $partner->thumbnail }}" alt="{{ $partner->name }}"/>
                </div><!-- /.tile-partner -->
            </div>
            @endforeach
        </div>
    </div>
</section><!-- /.partners -->