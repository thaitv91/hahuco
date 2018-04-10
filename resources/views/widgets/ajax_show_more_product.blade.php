@foreach($products as $product)
<div class="col-lg-3 col-sm-6">
	<div class="tile-product">
		<div class="img">
			<a href="{{ route('homepage.product.show', ['term_slug' => $term->slug, 'product_slug' => $product->slug]) }}"><img src="{{ $product->thumbnail ? asset($product->thumbnail) : '/images/img-1.jpg' }}" alt="" /></a>
		</div>
		<h4><a href="{{ route('homepage.product.show', ['term_slug' => $term->slug, 'product_slug' => $product->slug]) }}">{{ $product->title}}</a></h4>
	</div><!-- /.tile-product -->
</div>
@endforeach