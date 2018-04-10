@extends('layouts.app')

@section('content')
<!-- main content -->
<div class="page-inner">
    <div class="container space-global">
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="news-detail">
                    <h2>{{ $news->name }}</h2>
                    <div class="text">
                        @php echo $news->content @endphp
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="box-right">
                    <h3>Tin liên quan</h3>
                    <ul class="list-unstyled list-news">
                    	@foreach ($news->relatedPosts as $post)
                        <li class="d-flex">
                            <div class="img">
                                <a href="{{ route('homepage.news.show', ['news_slug' => $post->slug]) }}">
                                	<img src="{{ $post->thumbnail ? asset($post->thumbnail) : 'images/news.jpg' }}" alt="" />
                                </a>
                            </div>
                            <div class="text">
                                <h4 class="dotdotdot"><a href="{{ route('homepage.news.show', ['news_slug' => $post->slug]) }}">{{ $post->name }}</a></h4>
                                <div class="description dotdotdot">
                                   @php echo $post->exerpt @endphp
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div><!-- /.box-right-->
            </div>
        </div>
    </div>
</div>
    <!-- e: main content -->
@endsection