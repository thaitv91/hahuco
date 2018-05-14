<section class="product-highlights bg-f4 space-global">
    <div class="container">
        <div class="header-box text-center">
            <!-- <div class="group">Hahuco</div> -->
            <h2>Sản phẩm mới</h2>
        </div>

        <div class="slide-products arrows-gray">
            @foreach($products as $product)
                <a href="{{ route('homepage.product.show', [$product->slug]) }}" class="tile-product">
                    <div class="inner_prod">
                        <figure>
                            @if($product->thumbnail)
                            <img class="" src="/{{ $product->thumbnail }}" alt="{{ $product->title }}" width="185" height="140">
                            @endif
                            <div class="mask_img"><i>Xem chi tiết</i></div>
                        </figure>
                        <h3><p>{{ $product->title }}</p></h3>
                        <div class="rating">
                            <div class="ratebox" data-id="1" data-rating="{!! $product->getRated() !!}"></div>
                        </div>
                        <div class="desc">{{ $product->short_description }}</div>
                    </div><!-- End .inner_prod -->
                </a>
            @endforeach
        </div><!-- /.slide-products -->
    </div>
</section><!-- /.product-highlights -->