@extends('layouts.admin')

@section('title')

@endsection

@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/testimonial.edit_testimonial')</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-8">
				<div class="box-body">
					<div class="form-group">
						<label for="name">@lang('admin/testimonial.name')</label>
						<input type="text" class="form-control" name="name" id="name" required="required" value="{{ $testimonial->name }}">
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="job">@lang('admin/testimonial.job')</label>
						<input type="text" class="form-control" name="job" id="job" required="required" value="{{ $testimonial->job }}">
						@if ($errors->has('job'))
						<span class="help-block">
							<strong>{{ $errors->first('job') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="content">@lang('admin/testimonial.content')</label>
						<textarea type="text" class="form-control my-editor" name="content" id="content" rows="15">{{ $testimonial->content }}</textarea>
						@if ($errors->has('content'))
						<span class="help-block">
							<strong>{{ $errors->first('content') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<div class="col-md-4">
				<div class="box-body">
					<div class="form-group">
						<label for="thumbnail">@lang('admin/testimonial.thumbnail')</label>
						<input type="file" id="thumbnail" name="thumbnail" class="form-control">
						<img src="{{ asset($testimonial->thumbnail) }}" class="img img-thumbnail" id="preview-thumbnail" width="675px" height="auto"  @if (!$testimonial->thumbnail) style="display: none" @endif>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">@lang('admin/general.update')</button>
						<a href="{{ route('admin.testimonial') }}" class="btn btn-default">@lang('admin/general.back')</a>
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