@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <div class="container">
                <div class="news-box">
                <div class="header-box">
                    <h2 class="text-link text-uppercase text-center">Kết quả tìm kiếm</h2>
                </div>
                <div class="news-box">
                    <div class="header-box d-flex justify-content-between align-items-center">
                        <h2 class="text-link text-uppercase">Tin tức ({{ $result_News->total() }})</h2>
                    </div>
                </div>
                <div class="row" id="list-news">
                    @foreach($result_News as $news)
                    <div class="col-lg-3 col-sm-6 mb-5">
                        <div class="tile-news">
                            <div class="img">
                                <a href="{{ route('homepage.news.show', $news->slug) }}"><img src="{{ $news->thumbnail ? $news->thumbnail : '/images/upload/news-1.jpg' }}" alt="{{ $news->name }}" /></a>
                            </div>
                            <div class="text">
                                <h4><a href="{{ route('homepage.news.show', $news->slug) }}">{{ $news->name }}</a></h4>
                                <p class="time">{{ $news->created_at->format('h:i d/m/Y') }}</p>
                                <div class="description">
                                    {!! $news->excerpt !!}
                                </div>
                                <div class="bottom d-flex justify-content-between align-items-center">
                                    <div class="view-more">
                                        <a href="{{ route('homepage.news.show', $news->slug) }}">Xem tiếp <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
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
                        class="btn-vbi btn-blue sm">Xem thêm</a>
                 </div>
                @endif
                <div class="news-box">
                    <div class="header-box d-flex justify-content-between align-items-center">
                        <h2 class="text-link text-uppercase">Sản phẩm ({{ $result_Products->total() }})</h2>
                    </div>
                </div>
                <div class="row" id="list-product">
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
                                        {{ $product->title }}
                                    </a>
                                </h4>

                            </div>
                        </div><!-- /.tile-news -->
                    </div>
                    @endforeach
                </div>
                <div class="text-center btn-load-more space-global">
                    <a href="{{ route('searchProducts', ['page'=>2, 'keyword' => $keyword]) }}"
                        id="btn-readmore-product"
                        onclick="loadMore(this, '#list-product'); return false;"
                        class="btn-vbi btn-blue sm">Xem thêm</a>
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
