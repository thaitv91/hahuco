<section class="investment-sector bg-f4 space-global">
    <div class="container">
        <div class="header-box text-center">
            <div class="group">Hahuco</div>
            <h2>Danh mục sản phẩm</h2>
        </div>

        <div class="slide-navs dots-link">
            @foreach($terms as $term)
                <div class="item">
                    <div class="tile-investment d-flex">
                        {{--<div class="ico"><i class="ico-investment-1"></i></div>--}}
                        <div class="ico"><img src="/{{ $term->thumbnail }}"></div>
                        <div class="text">
                            <h4><a href="{{ route('homepage.product.showMore', $term->id) }}">{{ $term->name }}</a></h4>
                            <div class="desc">
                                {!! $term->excerpt !!}
                            </div>
                        </div>
                    </div><!-- /.tile-investment -->
                </div>
            @endforeach
        </div>
    </div>
</section><!-- /.investment-sector -->