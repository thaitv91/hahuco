<div class="main_ct">
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 col-sm-6">
                <a href="{{ route('homepage.product.show', [$product->slug]) }}" class="tile-product">
                    <div class="inner_prod">
                        <figure>
                            <img class="lazy" data-original="/{{ $product->thumbnail }}" alt="{{ $product->title }}" width="185" height="140">
                            <div class="mask_img"><i>Xem chi tiết</i></div>
                        </figure>
                        <h3><p>{{ $product->title }}</p></h3>
                        <div class="dotdotdot desc">{{ $product->short_description }}</div>
                    </div><!-- End .inner_prod -->
                </a>
            </div>
        @endforeach

        <div class="page">
            <div class="PageNum">
                {{ $products->links() }}
            </div>
            <div class="clear"></div>
        </div><!-- End .page -->
    </div>
</div><!-- End .main_ct -->