@extends('layouts.admin')

@section('name')

@endsection


@section('content')
<div class="col-md-12">
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-name">@lang('admin/general.create') @lang('admin/recruitment.resume')</h3>
		</div>
		<form role="form" id="form-create" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
				<div class="col-md-8">
					<div class="box-body">
						<div class="form-group margin-bottom-30">
							<label  class="" for="name">@lang('admin/recruitment.name') <span style="color: red;">*</span></label>
							<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
							@if($errors->has('name'))
							<span class="help-block">
								<strong class="text-danger">{{$errors->first('name')}}</strong>
							</span>
							@endif
						</div>
						<div class="form-group margin-bottom-30">
							<label  class="" for="content">@lang('admin/recruitment.description')</label>
							<textarea class="form-control my-editor" rows="5" id="description" name="description"></textarea>
							@if($errors->has('description'))
							<span class="help-block">
								<strong class="text-danger">{{$errors->first('description')}}</strong>
							</span>
							@endif
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box-body">
						<div class="form-group margin-bottom-30">
							<label class="">@lang('admin/recruitment.thumbnail') <span style="color: red;">*</span></label>
							<input type="file" name="thumbnail" value="" id="thumbnail" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg" required>
							<img id="previewHolder" alt="" width="170px" height="100px"/>
							@if($errors->has('thumbnail'))
							<span class="help-block">
								<strong class="text-danger">{{$errors->first('thumbnail')}}</strong>
							</span>
							@endif
						</div>
						<div class="form-group margin-bottom-30">
							<label class="">@lang('admin/recruitment.file_upload') <span style="color: red;">*</span></label>
							<input type="file" name="resume_format"  id="resume-format" class="required " data-errormsg="PhotoUploadErrorMsg" required>
							@if($errors->has('resume_format'))
							<span class="help-block">
								<strong class="text-danger">{{$errors->first('resume_format')}}</strong>
							</span>
							@endif
						</div>
						<div class="form-group margin-bottom-30">
							<button type="submit" class="btn btn-primary">@lang('admin/general.create')</button>
							<a href="{{ route('admin.recruitment.resume.index') }}" type="submit" class="btn btn-default">@lang('admin/general.back')</a>
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