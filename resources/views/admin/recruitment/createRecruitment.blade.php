@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/general.create') @lang('admin/recruitment.recruitment')</h3>
		</div>
		<form role="form" id="form-create" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
				<div class="col-md-8">
					<div class="box-body">
						<div class="form-group margin-bottom-30">
							<label  class="" for="name">@lang('admin/recruitment.title')</label>
							<input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
							@if($errors->has('title'))
							<span class="help-block">
								<strong class="text-danger">{{$errors->first('title')}}</strong>
							</span>
							@endif
						</div>

						<div class="form-group margin-bottom-30">
							<label  class="" for="excerpt">Mô tả</label>
							<textarea class="form-control" rows="5" id="excerpt" name="excerpt"></textarea>
							@if($errors->has('excerpt'))
								<span class="help-block">
								<strong class="text-danger">{{$errors->first('excerpt')}}</strong>
							</span>
							@endif
						</div>

						<div class="form-group margin-bottom-30">
							<label  class="" for="content">@lang('admin/recruitment.body')</label>
							<textarea class="form-control my-editor" rows="15" id="body" name="body"></textarea>
							@if($errors->has('body'))
							<span class="help-block">
								<strong class="text-danger">{{$errors->first('body')}}</strong>
							</span>
							@endif
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box-body">
						<div class="form-group margin-bottom-30">
							<label class="">@lang('admin/recruitment.thumbnail')</label>
							<input type="file" name="thumbnail" value="" id="thumbnail" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
							<img id="previewHolder" alt="" width="170px" height="100px"/>
							@if($errors->has('thumbnail'))
							<span class="help-block">
								<strong class="text-danger">{{$errors->first('thumbnail')}}</strong>
							</span>
							@endif
						</div>
						
						<div class="form-group margin-bottom-30">
							<button type="submit" class="btn btn-primary">@lang('admin/general.create')</button>
							<a href="{{ route('admin.recruitment.index') }}" type="submit" class="btn btn-default">@lang('admin/general.back')</a>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
				</div>
		</form>
	</div>
	<!-- /.box -->
</div>
@endsection
@section('scripts')
<script type="text/javascript">
   	function readURL(input) {
  		if (input.files && input.files[0]) {
		    var reader = new FileReader();
		    reader.onload = function(e) {
		      $('#previewHolder').attr('src', e.target.result);
		    }

		    reader.readAsDataURL(input.files[0]);
		    console.log(reader);
  		}
	}
 	$("#thumbnail").change(function() {
  	readURL(this);
	});
</script>
@endsection