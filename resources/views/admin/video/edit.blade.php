@extends('layouts.admin')

@section('title')

@endsection


@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Tạo Youtube Video</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="form-create" method="POST" action="{{ route('admin.video.update', ['id' => $video->id ]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-9">
                    <div class="box-body">

                        <div class="form-group margin-bottom-30">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" value="{{ $video->title }}" name="title" id="title" required="required">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group margin-bottom-30">
                            <label for="video">Youtube URL</label>
                            <input type="text" class="form-control" value="{{ $video->video }}" name="video" id="video" required="required">
                            @if ($errors->has('video'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('video') }}</strong>
                                </span>
                            @endif
                        </div>

                        @include('admin.include.seo')
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="col-md-3">
                    <div class="box-body">
                        <div class="form-group margin-bottom-30">
                            <label for="thumbnail">@lang('admin/product.thumbnail')</label>
                            <input type="file" name="thumbnail" id="thumbnail">
                            <img src="/{{ $video->thumbnail }}" style="margin-top: 10px" class="img img-thumbnail" id="preview-thumbnail" width="675px" height="auto">
                            @if ($errors->has('thumbnail'))
                                <span class="help-block">
							<strong>{{ $errors->first('thumbnail') }}</strong>
						</span>
                            @endif
                        </div>

                        <div class="form-group margin-bottom-30">
                            <button type="submit" class="btn btn-primary">@lang('admin/general.create')</button>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $('#thumbnail').on('change', function() {
            readURL(this, 'preview-thumbnail');
        });

        {{--$('#tags').tagsinput({--}}
        {{--typeaheadjs: {--}}
        {{--name: 'citynames',--}}
        {{--displayKey: 'name',--}}
        {{--valueKey: 'name',--}}
        {{--source: "{!! json_decode($tags) !!}"--}}
        {{--}--}}
        {{--});--}}
    </script>
@endsection