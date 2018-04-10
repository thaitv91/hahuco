@extends('layouts.app')
@section('content');
<!-- main content -->
<div class="page-inner">
    <div class="container">
        <div class="news-box">
            @widget('RecruitmentSearch')
            <div class="header-box d-flex justify-content-between align-items-center">
                <h2 class="text-link text-uppercase">Kết quả tìm kiếm</h2>
                @if ($recruitments->nextPageUrl())
                <a href="{{ $recruitments->nextPageUrl() }}" class="btn-vbi btn-outline sm text-uppercase">Xem thêm <i class="fa fa-angle-right"></i></a>
                @endif
            </div>
            <div class="list-result-search">
                @foreach ($recruitments as $recruitment)
                <div class="row row-item">
                    <div class="col-sm-4 col-md-5 col-lg-2 mb-3 mb-sm-0">
                        <a href="{{ route('recruitment.show', ['id' => $recruitment->id]) }}"><img src="{{ asset($recruitment->thumbnail) }}" alt="Image"/></a>
                    </div>
                    <div class="col-sm-8 col-md-7 col-lg-10">
                        <h4><a href="{{ route('recruitment.show', ['id' => $recruitment->id]) }}">{{ $recruitment->title }}</a></h4>
                        <div class="desc dotdotdot">
                            <?php echo $recruitment->body ?>
                        </div>
                    </div>
                </div>
                @endforeach
            </div><!-- /.list-result-search -->
        </div>
    </div>
    <!-- e: main content -->
</div>
@endsection