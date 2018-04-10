@extends('layouts.app')

@section('content')
<!-- main content -->
    <div class="container space-global">
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="news-detail">
                    <h2>{{ $recruitment->title }}</h2>
                    <div class="text">
                        @php echo $recruitment->body @endphp
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box-right">
                    <h3>Ngành nghề</h3>
                    <ul class="list-unstyled list-news">
                    	@foreach ($recruitment->relatedJob as $recruitment)
                        <li class="d-flex">
                            <div class="text">
                                <h4><a href="{{ route('recruitment.show', ['id' => $recruitment->id]) }}">{{ $recruitment->title }}</a></h4>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div><!-- /.box-right-->
                <div class="box-right">
                    <h3>Địa điểm</h3>
                    <ul class="list-unstyled list-news">
                        @foreach ($recruitment->relatedPlace as $recruitment)
                        <li class="d-flex">
                            <div class="text">
                                <h4><a href="{{ route('recruitment.show', ['id' => $recruitment->id]) }}">{{ $recruitment->title }}</a></h4>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div><!-- /.box-right-->
            </div>
        </div>
    </div>
    <!-- e: main content -->
@endsection