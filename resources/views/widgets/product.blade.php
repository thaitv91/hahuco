<section class="news list-products text-white">
    <div class="container">
        <h2 class="title text-white">Tôi muốn mua ...</h2>

        <div class="d-none d-lg-block">
            <ul class="flex-wrap row nav"  role="tablist" id="nav-tab">
                @foreach($terms as $key => $term)
                <li class="col">
                    <a class="tile-product text-white @if($key == 0) {{ 'active' }} @endif" id="tab-{{ $term->slug }}" data-toggle="tab" href="#tab-content-{{ $term->slug }}" role="tab" aria-controls="tab-content-1" aria-selected="true">
                        <div class="img">
                            <img src="/{{ $term->thumbnail }}" alt="{{ $term->name }}" />
                        </div>
                        <h4>{{ $term->name }}</h4>
                    </a><!-- /.tile-product -->
                </li>
                @endforeach
            </ul>

            <div class="tab-content"  id="nav-tabContent">
                @foreach($terms as $key => $term)
                <div class="tab-pane @if($key == 0) {{ 'active' }} @endif" id="tab-content-{{$term->slug}}" role="tabpanel" aria-labelledby="tab-{{ $term->slug }}">
                    <div class="row" id="term-product-{{ $term->id }}">
                        @foreach($term->getProducts() as $product)
                        <div class="col-lg-3 col-sm-6">
                            <div class="tile-product">
                                <div class="img">
                                    <a href="{{ route('homepage.product.show', ['term_slug' => $term->slug, 'product_slug' => $product->slug]) }}"><img src="{{ $product->thumbnail ? asset($product->thumbnail) : '/images/img-1.jpg' }}" alt="" /></a>
                                </div>
                                <h4><a href="{{ route('homepage.product.show', ['term_slug' => $term->slug, 'product_slug' => $product->slug]) }}">{{ $product->title}}</a></h4>
                            </div><!-- /.tile-product -->
                        </div>
                        @endforeach
                    </div>
                    @if (count($term->products) > 6)
                    <div class="text-center btn-load-more">
                        <a href="{{ route('homepage.product.showMore', ['term_id' => $term->id]) }}"
                           id="show-more-{{ $term->id }}"
                           onclick="showMore(this, {{$term->id}}, '#term-product-'); return false;"
                           class="btn-vbi btn-blue sm">Xem thêm</a>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>


        <div class="d-lg-none">
            @foreach($terms as $key => $term)
            <div id="accordion" class="custom-accordion">
                <div class="card">
                    <div class="card-header" id="heading{{$term->slug}}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$term->slug}}" aria-expanded="false" aria-controls="collapse{{$term->slug}}">
                                {{ $term->name }}
                                <i class="fa fa-plus"></i>
                                <i class="fa fa-minus"></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapse{{$term->slug}}" class="collapse" aria-labelledby="heading{{$term->slug}}" data-parent="#accordion">
                        <div class="card-body">
                            <div class="row" id="term-product-mobile-{{ $term->id }}">
                                @foreach($term->getProducts() as $product)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="tile-product">
                                        <div class="img">
                                            <a href="{{ route('homepage.product.show', ['term_slug' => $term->slug, 'product_slug' => $product->slug]) }}"><img src="{{ $product->thumbnail ? asset($product->thumbnail) : '/images/img-1.jpg' }}" alt="" /></a>
                                        </div>
                                        <h4><a href="{{ route('homepage.product.show', ['term_slug' => $term->slug, 'product_slug' => $product->slug]) }}">{{ $product->title}}</a></h4>
                                    </div><!-- /.tile-product -->
                                </div>
                                @endforeach
                            </div>
                            @if (count($term->products) > 6)
                            <div class="text-center btn-load-more">
                                <a href="{{ route('homepage.product.showMore', ['term_id' => $term->id]) }}"
                                   id="show-more-mobile-{{ $term->id }}"
                                   onclick="showMore(this, {{$term->id}}, '#term-product-mobile-'); return false;"
                                   class="btn-vbi btn-blue sm">Xem thêm</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!-- /.list-prodcuts -->
<script type="text/javascript">
    function showMore(index, term_id, id1) {
        var url = $(index).attr('href');
        $.ajax({
            url : url,
        }).done(function (data) {
            console.log(data);
            $(id1+term_id).append(data.html);
            if (data.next_page_url == null || data.next_page_url == '' )
                $(this).remove();
            else
                $(this).attr('href', data.next_page_url);
        })
    }
</script>