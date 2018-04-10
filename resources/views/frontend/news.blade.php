@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <div class="container">
            @foreach($categories as $category)
                <div class="news-box">
                <div class="header-box d-flex justify-content-between align-items-center">
                    <h2 class="text-link text-uppercase">{!! $category->name !!}</h2>
                    <a href="{{ route('homepage.news.category', $category->slug) }}" class="btn-vbi btn-outline sm text-uppercase">Xem thêm <i class="fa fa-angle-right"></i></a>
                </div>
                <div class="row">
                    @foreach($category->getList() as $news)
                        <div class="col-lg-3 col-sm-6 mb-5">
                        <div class="tile-news">
                            <a class="img" href="{{ route('homepage.news.show', $news->slug) }}" style="background-image: url('{{ $news->thumbnail }}')"></a>
                            <div class="text">
                                <h4><a href="{{ route('homepage.news.show', $news->slug) }}">{{ $news->name }}</a></h4>
                                <p class="time">{{ $news->created_at->format('h:i d/m/Y') }}</p>
                                <div class="description">
                                    {!! $news->excerpt !!}
                                </div>
                                <div class="bottom d-flex justify-content-between align-items-center">
                                    <div class="social-news">
                                        <a href="#" class="facebook-link"><i class="fa fa-facebook"></i></a>
                                        <a href="#" class="google-plus-link"><i class="fa fa-google-plus"></i></a>
                                    </div>

                                    <div class="view-more">
                                        <a href="{{ route('homepage.news.show', $news->slug) }}">Xem tiếp <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.tile-news -->
                    </div>
                    @endforeach
                </div>
            </div><!-- /.news-box -->
            @endforeach
        </div>
    </div><!-- /.page-inner -->
@endsection
