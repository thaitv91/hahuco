@extends('layouts.admin')

@section('title')

@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Sửa Item: {{ $item->name }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('admin.menu.updateItem') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-body">
                            <div class="form-group margin-bottom-30">
                                <label  class="" for="name">Tiêu đề</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $item->name }}">
                                <input type="hidden" class="form-control" name="item_id" id="name" value="{{ $item->id }}">
                                {{ csrf_field() }}
                                @if($errors->has('name'))
                                    <span class="help-block">
									<strong class="text-danger">{{$errors->first('name')}}</strong>
								</span>
                                @endif
                            </div>

                            <div class="form-group margin-bottom-30">
                                <label  class="" for="link">Đường dẫn</label>
                                <input type="text" class="form-control" name="link" id="link" value="{{ $item->link }}">
                                @if($errors->has('link'))
                                    <span class="help-block">
									<strong class="text-danger">{{$errors->first('link')}}</strong>
								</span>
                                @endif
                            </div>

                            <div class="form-group margin-bottom-30">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
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
    </script>
@endsection