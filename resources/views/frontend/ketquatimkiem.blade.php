@extends('layouts.frontend')

@section('content')
    <div class="page-inner">
        
        <div class="container">

                <div class="search-form-page space-global mt-5">
                    <div class="header-box text-center">
                        <!-- <div class="group">Hahuco</div> -->
                        <h2>Kết quả tìm kiếm</h2>
                    </div>
                    <div class="col-lg-6 offset-lg-3">
                        <form action="{{ route('search') }}" id="form-search">
                            <input type="text" placeholder="Từ khóa tìm kiếm..!" name="keyword" class="form-control">
                            <button class="btn_s" type="submit"></button>
                        </form>
                    </div>
                </div>
                <div class="news-box">
                <!-- <div class="header-box">
                    <h2 class="title-page">Kết quả tìm kiếm</h2>
                </div> -->
                <div class="news-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="title-page sm">Tin tức ({{ $result_News->total() }})</h2>
                    </div>
                </div>
                <div class="row" id="list-news">
                    @foreach($result_News as $news)
                    <div class="col-lg-3 col-sm-6 mb-5">
                        <div class="tile-news">
                            <div class="img effect-img">
                                <a href="{{ route('homepage.news.show', $news->slug) }}"><img src="{{ $news->thumbnail ? $news->thumbnail : '/images/upload/news-1.jpg' }}" alt="{{ $news->name }}" /></a>
                            </div>
                            <div class="text">
                                <h4 class="title-sm"><a href="{{ route('homepage.news.show', $news->slug) }}">{{ $news->name }}</a></h4>
                                <p class="time">{{ $news->created_at->format('h:i d/m/Y') }}</p>
                                <div class="desc dotdotdot">
                                    {!! $news->excerpt !!}
                                </div>
                                <a href="{{ route('homepage.news.show', $news->slug) }}" class="btn-hahuco btn-outlight-red">Chi tiết</a>
                            </div>
                        </div><!-- /.tile-news -->
                    </div>
                    @endforeach
                </div>
                @if ($result_News->nextPageUrl())
                <div class="text-center btn-load-more space-global">
                    <a href="{{ route('searchNews', ['page'=>2, 'keyword' => $keyword]) }}"
                        id="btn-readmore-news"
                        onclick="loadMore(this, '#list-news'); return false;"
                        class="btn-hahuco btn-outlight-red">Xem thêm</a>
                 </div>
                @endif
                <div class="news-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="title-page sm">Sản phẩm ({{ $result_Products->total() }})</h2>
                    </div>
                </div>
                <div class="row" id="list-product">
                    @foreach($result_Products as $product)
                    <div class="col-lg-3 col-sm-6 mb-5">
                        <a href="{{ route('homepage.product.show', ['term_slug' => $product->term->slug, 'product_slug' => $product->slug]) }}" class="tile-product">
                            <div class="inner_prod">
                                <figure>
                                    <img src="{{ $product->thumbnail ? $product->thumbnail : '/images/upload/news-1.jpg' }}" alt="{{ $product->title }}" />
                                    <div class="mask_img"><i>Xem chi tiết</i></div>
                                </figure>
                                <h3><p>{{ $product->title }}</p></h3>
                                <div class="rating">
                                    <div class="ratebox" data-id="1" data-rating="{!! $product->getRated() !!}"></div>
                                </div>
                                <div class="dotdotdot desc">{{ $product->short_description }}</div>
                            </div><!-- End .inner_prod -->
                        </a>

                        
                    </div>
                    @endforeach
                </div>
                <div class="text-center btn-load-more space-global">
                    <a href="{{ route('searchProducts', ['page'=>2, 'keyword' => $keyword]) }}"
                        id="btn-readmore-product"
                        onclick="loadMore(this, '#list-product'); return false;"
                        class="btn-hahuco btn-outlight-red">Xem thêm</a>
                </div>
            </div><!-- /.news-box -->
        </div>
    </div><!-- /.page-inner -->
@endsection

@section('scripts')
<script type="text/javascript">
    function loadMore(index, id) {
        var url = $(index).attr('href');

        $.ajax({
            url : url
        }).done(function(data) {
            $(id).append(data.html);
            if (data.next_page_url != '' && data.next_page_url != null)
                $(index).attr('href', data.next_page_url);
            else 
                $(index).parent().remove();
        });
    }
</script>
@endsection
