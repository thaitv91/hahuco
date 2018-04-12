@extends('layouts.frontend')

@section('content')
    <section class="page-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article>
                        <div class="title_ct"><span>{{ $product->title }}</span></div><!-- End .title_ct -->

                        <div class="info_prod_D">
                            <div class="ipD_l">
                                <a class="group1" href="/{{ $product->thumbnail }}">
                                    <img src="/{{ $product->thumbnail }}" alt="{{ $product->title }}">
                                </a>
                            </div><!-- End .ipD_l -->

                            <div class="ipD_r">
                                <h1 class="title_Detail">{{ $product->title }}</h1>

                                <ul class="list_prod_D">
                                    <li><span>Views</span>: {{ $product->view_count }}</li>

                                    <li><span>Ngày</span>: {{ $product->created_at }}</li>
                                </ul><!-- End .list_prod_D -->

                                <p class="tt_prod">{{ $product->short_description }}</p>
                            </div><!-- End .ipD_r -->
                        </div><!-- End .info_prod_D -->

                        <div class="title_prod_D">Thông tin chi tiết</div><!-- End .title_prod_D -->

                        <div class="f-detail clearfix">
                            <div style="text-align: justify;">{!! $product->mo_ta_san_pham  !!}</div>
                        </div><!-- End .f-detail -->

                        <div class="tag">
                            <span>Tags</span>
                            @foreach($tags as $tag)
                            <a target="_self" href="{{ route('homepage.product.tags', $tag->slug) }}">{{ $tag->name }}</a>
                            @endforeach
                        </div><!-- End .tag -->

                        <div class="block_ct" style="margin-top: 20px;">
                            <div class="title_ct">
                                <span>Sản phẩm cùng loại</span>
                            </div><!-- End .title_ct -->

                            <div class="main_ct">
                                @widget('TatCaSanPham', ['term_id' => $product->getTermID()])
                            </div><!-- End .main_ct -->

                        </div><!-- End .block_ct -->
                    </article><!-- End .content -->
                </div>
                <div class="col-lg-3 order-lg-first">
                    @widget('SidebarLeft')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(".group1").colorbox({rel:'group1', maxWidth:"90%", maxHeight:"90%"});
        });
    </script>
@endsection