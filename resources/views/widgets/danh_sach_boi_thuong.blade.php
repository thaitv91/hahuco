<section class="news list-products text-white indemnify">
    <div class="container">
        <h2 class="title text-white">Tôi muốn hỗ trợ bồi thường...</h2>

        <div class="flex-wrap align-items-center row">
            @foreach($pages as $page)
                <div class="col">
                    <a class="tile-product text-white" href="/{{ $page->slug }}">
                        <div class="img">
                            <img src="/{{ $page->thumbnail }}" alt="" />
                        </div>
                        <h4>{{ $page->title }}</h4>
                    </a><!-- /.tile-product -->
                </div>
            @endforeach
        </div>
    </div>
</section><!-- /.list-prodcuts -->