@foreach($result_Products as $product)
<div class="col-lg-3 col-sm-6 mb-5">
    <div class="tile-news">
        <div class="img">
            <a href="{{ route('homepage.product.show', ['term_slug' => $product->term->slug, 'product_slug' => $product->slug]) }}">
                <img src="{{ $product->thumbnail ? $product->thumbnail : '/images/upload/news-1.jpg' }}" alt="{{ $product->title }}" />
            </a>
        </div>
        <div class="text">
            <h4>
                <a href="{{ route('homepage.product.show', ['term_slug' => $product->term->slug, 'product_slug' => $product->slug]) }}">
                    {{ str_limit($product->title, $limit=50, $end='...') }}
                </a>
            </h4>
            
        </div>
    </div><!-- /.tile-news -->
</div>
@endforeach